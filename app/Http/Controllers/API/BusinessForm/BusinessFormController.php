<?php

namespace App\Http\Controllers\API\BusinessForm;

use App\Helpers\FileHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\BusinessForm\BusinessFormDetailResource;
use App\Models\BusinessForm;
use App\Models\Param;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class BusinessFormController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'company_name' => ['required', 'string'],
            'since' => ['required', 'string'],
            'business_type_id' => [
                'required', 
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'business_type');
                }), 
            ],
            'business_fields_id' => [
                'required', 
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'business_fields');
                }), 
            ],
            'industry_id' => [
                'required', 
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'industry');
                }), 
            ],
            'main_product' => ['required', 'string'],
            'capital' => ['required', 'string'],
            'annual_turnover' => ['required', 'string'],
            'total_employee' => ['required', 'string'],
            'company_description' => ['required', 'string'],
            'province_id' => ['required', 'exists:provinces,id'],
            'city_id' => [
                'required',
                Rule::exists('cities', 'id')->where(function($query) use ($request) {
                    return $query->where('province_id', $request->province_id);
                })
            ],
            'address' => ['required', 'string'],
            'kecamatan' => ['required', 'string'],
            'kelurahan' => ['required', 'string'],
            'postal_code' => ['required', 'integer'],
            'company_image' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:5120'],
            'contact_name' => ['required', 'string'],
            'nik' => ['required', 'numeric', 'digits:16'],
            'field_npwp' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'email'],
            'website' => ['nullable', 'string'],
            'business_activity_id' => [
                'required',
                Rule::exists('params', 'id')->where(function($query){
                    return $query->where('category', 'business_activity');
                })
            ],
        ]);

        $ba_alias = Param::find($request->business_activity_id)->alias;
        $request->validate([
            // IF != perseorangan;
            'company_npwp' => [
                Rule::requiredIf($ba_alias != 'perseorangan'),
                'file',
                'max:5120'
            ],
            'company_akta' => [
                Rule::requiredIf($ba_alias != 'perseorangan'),
                'file',
                'max:5120'
            ],
            'nib' => [
                Rule::requiredIf($ba_alias != 'perseorangan'),
                'file',
                'max:5120'
            ],
            'director_ktp' => [
                Rule::requiredIf($ba_alias != 'perseorangan'),
                'file',
                'max:5120'
            ],
            'sk_kemenkumham' => [
                Rule::requiredIf($ba_alias != 'perseorangan'),
                'file',
                'max:5120'
            ],

            // IF perseorangan;
            'npwp' => [
                Rule::requiredIf($ba_alias == 'perseorangan'),
                'file',
                'max:5120'
            ],
            'ktp' => [
                Rule::requiredIf($ba_alias == 'perseorangan'),
                'file',
                'max:5120'
            ],
            'photo_with_ktp' => [
                Rule::requiredIf($ba_alias == 'perseorangan'),
                'file',
                'max:5120'
            ],

            'product_certificate' => ['nullable', 'array'],
            'product_certificate.*' => ['required_with:product_certificate', 'file'],

            // 'product_information' => ['required', 'boolean'],

            // product field
            'product' => [
                Rule::requiredIf($request->product_information == 1),
                'array',
                'max:3' 
            ],
            'product.*.name' => ['required_with:product', 'string'],
            'product.*.description' => ['required_with:product', 'string'],
            'product.*.price' => ['required_with:product', 'integer'],
            'product.*.sku' => ['nullable', 'string'],
            'product.*.front_image' => ['required_with:product', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:5120'],
            'product.*.side_image' => ['required_with:product', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:5120'],
            'product.*.top_image' => ['required_with:product', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:5120'],
            'product.*.back_image' => ['required_with:product', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:5120'],
            
            'status_ukm' => ['required', 'string'],
            'account_lpse' => ['required', 'in:ada,tidak'],
            'lpse_name' => [
                Rule::requiredIf($request->account_lpse == 'ada'), 
                'string'
            ],
            'registered_lkpp' => ['required', 'in:ya,tidak'],
        ]);

        
        $input = $request->except([
            'product',
            'product_certificate',
            'product_information',
            'company_npwp',
            'company_akta',
            'nib',
            'director_ktp',
            'sk_kemenkumham',
            'npwp',
            'ktp',
            'photo_with_ktp',
            'lpse_name'
        ]);
        $input['product_information'] = 1;
        $input['company_image'] = FileHelpers::upload_file('files', $request->company_image);
        if($request->account_lpse == 'ada') {
            $input['lpse_name'] = $request->lpse_name;
        }
        if($ba_alias != 'perseorangan') {
            $input['company_npwp'] = FileHelpers::upload_file('files', $request->company_npwp);
            $input['company_akta'] = FileHelpers::upload_file('files', $request->company_akta);
            $input['nib'] = FileHelpers::upload_file('files', $request->nib);
            $input['director_ktp'] = FileHelpers::upload_file('files', $request->director_ktp);
            $input['sk_kemenkumham'] = FileHelpers::upload_file('files', $request->sk_kemenkumham);
        } else if($ba_alias == 'perseorangan') {
            $input['npwp'] = FileHelpers::upload_file('files', $request->npwp);
            $input['ktp'] = FileHelpers::upload_file('files', $request->ktp);
            $input['photo_with_ktp'] = FileHelpers::upload_file('files', $request->photo_with_ktp);
            if($request->nib) {
                $input['nib'] = FileHelpers::upload_file('files', $request->nib);
            }
        }

        $result = DB::transaction(function() use ($request, $input) {
            // insert business form
            $business_form = BusinessForm::create($input);
            
            // insert product certificate
            if(!empty($request->product_certificate)) {
                foreach($request->product_certificate as $product_certificate) {
                    $file_name = $product_certificate->getClientOriginalName();
                    $path = FileHelpers::upload_file('files', $product_certificate);
                    $product_certificates[] = [
                        'path' => $path,
                        'file_name' => $file_name,
                        'type' => 'product_certificate'
                    ];
                }
                $business_form->product_certificate()->createMany($product_certificates);
            }
    
            // insert product
            foreach($request->product as $product) {
    
                $front_image_path = FileHelpers::upload_file('product', $product['front_image']);
                $side_image_path = FileHelpers::upload_file('product', $product['side_image']);
                $top_image_path = FileHelpers::upload_file('product', $product['top_image']);
                $back_image_path = FileHelpers::upload_file('product', $product['back_image']);
    
                $products[] = [
                    'name' => $product['name'],
                    'description' => $product['description'],
                    'price' => $product['price'],
                    'sku' => !empty($product['sku']) ? $product['sku'] : null,
                    'front_image' => $front_image_path,
                    'side_image' => $side_image_path,
                    'top_image' => $top_image_path,
                    'back_image' => $back_image_path,
                ];
            }
            $business_form->product()->createMany($products);
    
            return ResponseFormatter::success(new BusinessFormDetailResource($business_form), 'success create business form data');
        });
        return $result;
    }

    public function get(Request $request)
    {
        $request->validate([
            'province_id' => ['nullable', 'exists:provinces,id'],
            'business_type_id' => [
                'nullable', 
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'business_type');
                }), 
            ],
            'business_fields_id' => [
                'nullable', 
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'business_fields');
                }), 
            ],
            'industry_id' => [
                'nullable', 
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'industry');
                }), 
            ],
            'annual_turnover' => ['nullable', 'string'],
            'limit_page' => ['required', 'boolean'],
            'limit' => ['nullable', 'integer'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
            'search' => ['nullable', 'string'],
        ]);
        $limit = $request->input('limit', 10);

        $business_form = BusinessForm::query();
        if($request->province_id) {
            $business_form->where('province_id', $request->province_id);
        }

        if($request->business_type_id) {
            $business_form->where('business_type_id', $request->business_type_id);
        }

        if($request->business_fields_id) {
            $business_form->where('business_fields_id', $request->business_fields_id);
        }

        if($request->industry_id) {
            $business_form->where('industry_id', $request->industry_id);
        }

        if($request->annual_turnover) {
            $business_form->where('annual_turnover', $request->annual_turnover);
        }

        if($request->start_date) {
            $business_form->where('created_at', '>=', $request->start_date);
        }

        if($request->end_date) {
            $business_form->where('created_at', '<=', $request->end_date);
        }

        if($request->search) {
            $business_form->where('company_name', 'like', '%'.$request->search.'%');
        }
        $business_form->orderBy('created_at', 'desc');
        if($request->limit_page == 1) {
            $result = $business_form->paginate($limit);
        } else {
            $result = $business_form->get();
        }
        return ResponseFormatter::success(BusinessFormDetailResource::collection($result)->response()->getData(true), 'success get bussines form data');
    }

    public function show(BusinessForm $business_form)
    {
        return ResponseFormatter::success(new BusinessFormDetailResource($business_form), 'success get business form data');
    }

    public function total_all()
    {
        $result = BusinessForm::count();
        return ResponseFormatter::success($result, 'success get total business form data');
    }

    public function total_by_province()
    {
        $result = DB::table('vw_total_business_form_by_province')->orderBy('id', 'asc')->get();
        return ResponseFormatter::success($result, 'success get total business form by province data');
    }

    public function total_by_business_type()
    {
        $result = DB::table('vw_total_business_form_by_business_type')->orderBy('order', 'asc')->get();
        return ResponseFormatter::success($result, 'success get total business form by business type data');
    }

    public function total_by_business_fields()
    {
        $result = DB::table('vw_total_business_form_by_business_fields')->orderBy('order', 'asc')->get();
        return ResponseFormatter::success($result, 'success get total business form by business fields data');
    }

    public function total_by_industry()
    {
        $result = DB::table('vw_total_business_form_by_industry')->orderBy('order', 'asc')->get();
        return ResponseFormatter::success($result, 'success get total business form by industry data');
    }

    public function total_by_annual_turnover()
    {
        $result = DB::table('vw_total_business_form_by_annual_turnover')->orderBy('order', 'asc')->get();
        return ResponseFormatter::success($result, 'success get total business form by annual turnover data');
    }

    public function total_by_image_product()
    {
        $result = [
            'found' => BusinessForm::where('product_information', 1)->count(),
            'not_found' => BusinessForm::where('product_information', 0)->count(),
        ];

        return ResponseFormatter::success($result, 'success get total business form by image product');
    }
}
