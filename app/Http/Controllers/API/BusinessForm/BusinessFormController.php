<?php

namespace App\Http\Controllers\API\BusinessForm;

use App\Helpers\FileHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\BusinessForm\BusinessFormDetailResource;
use App\Http\Resources\BusinessForm\BusinessFormResource;
use App\Models\BusinessForm;
use App\Models\Param;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\Pure;

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
            'company_image' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg'],
            'contact_name' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'email'],
            'website' => ['required', 'url'],
            'business_activity_id' => [
                'required',
                Rule::exists('params', 'id')->where(function($query){
                    return $query->where('category', 'business_activity');
                })
            ],
        ]);

        $ba_alias = Param::find($request->business_activity_id)->alias;
        $request->validate([
            // IF != Perorangan;
            'company_npwp' => [
                Rule::requiredIf($ba_alias != 'perorangan'),
                'file'
            ],
            'company_akta' => [
                Rule::requiredIf($ba_alias != 'perorangan'),
                'file'
            ],
            'nib' => [
                Rule::requiredIf($ba_alias != 'perorangan'),
                'file'
            ],
            'director_ktp' => [
                Rule::requiredIf($ba_alias != 'perorangan'),
                'file'
            ],
            'sk_kemenkumham' => [
                Rule::requiredIf($ba_alias != 'perorangan'),
                'file'
            ],

            // IF Perorangan;
            'npwp' => [
                Rule::requiredIf($ba_alias == 'perorangan'),
                'file'
            ],
            'ktp' => [
                Rule::requiredIf($ba_alias == 'perorangan'),
                'file'
            ],
            'photo_with_ktp' => [
                Rule::requiredIf($ba_alias == 'perorangan'),
                'file'
            ],

            'product_certificate' => ['nullable', 'array'],
            'product_certificate.*' => ['required_with:product_certificate', 'file'],

            'product_information' => ['required', 'boolean'],

            // product field
            'product' => [
                Rule::requiredIf($request->product_information == 1),
                'array',
                'max:3' 
            ],
            'product.*.name' => ['required_with:product', 'string'],
            'product.*.description' => ['required_with:product', 'string'],
            'product.*.price' => ['required_with:product', 'integer'],
            'product.*.sku' => ['required_with:product', 'string'],
            'product.*.front_image' => ['required_with:product', 'image', 'mimes:jpg,png,jpeg,gif,svg'],
            'product.*.side_image' => ['required_with:product', 'image', 'mimes:jpg,png,jpeg,gif,svg'],
            'product.*.top_image' => ['required_with:product', 'image', 'mimes:jpg,png,jpeg,gif,svg'],
            'product.*.back_image' => ['required_with:product', 'image', 'mimes:jpg,png,jpeg,gif,svg'],
        ]);

        $input = $request->except([
            'product',
            'product_certificate',
            'company_npwp',
            'company_akta',
            'nib',
            'director_ktp',
            'sk_kemenkumham',
            'npwp',
            'ktp',
            'photo_with_ktp'
        ]);
        $input['company_image'] = FileHelpers::upload_file('files', $request->company_image);
        if($ba_alias != 'perorangan') {
            $input['company_npwp'] = FileHelpers::upload_file('files', $request->company_npwp);
            $input['company_akta'] = FileHelpers::upload_file('files', $request->company_akta);
            $input['nib'] = FileHelpers::upload_file('files', $request->nib);
            $input['director_ktp'] = FileHelpers::upload_file('files', $request->director_ktp);
            $input['sk_kemenkumham'] = FileHelpers::upload_file('files', $request->sk_kemenkumham);
        } else if($ba_alias == 'perorangan') {
            $input['npwp'] = FileHelpers::upload_file('files', $request->npwp);
            $input['ktp'] = FileHelpers::upload_file('files', $request->ktp);
            $input['photo_with_ktp'] = FileHelpers::upload_file('files', $request->photo_with_ktp);
        }
        
        // return $input;
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
        if($request->product_information == 1) {
            foreach($request->product as $product) {

                $front_image_path = FileHelpers::upload_file('product', $product['front_image']);
                $side_image_path = FileHelpers::upload_file('product', $product['side_image']);
                $top_image_path = FileHelpers::upload_file('product', $product['top_image']);
                $back_image_path = FileHelpers::upload_file('product', $product['back_image']);

                $products[] = [
                    'name' => $product['name'],
                    'description' => $product['description'],
                    'price' => $product['price'],
                    'sku' => $product['sku'],
                    'front_image' => $front_image_path,
                    'side_image' => $side_image_path,
                    'top_image' => $top_image_path,
                    'back_image' => $back_image_path,
                ];
            }
            $business_form->product()->createMany($products);
        }

        return ResponseFormatter::success(new BusinessFormDetailResource($business_form), 'success create business form data');
    }

    public function get(Request $request)
    {
        $request->validate([
            'limit' => ['nullable', 'integer']
        ]);
        $limit = $request->input('limit', 10);
        $business_form = BusinessForm::query();
        $result = $business_form->paginate($limit);
        return ResponseFormatter::success(BusinessFormResource::collection($result)->response()->getData(true), 'success get bussines form data');
    }

    public function show(BusinessForm $business_form)
    {
        return ResponseFormatter::success(new BusinessFormDetailResource($business_form), 'success get business form data');
    }
}
