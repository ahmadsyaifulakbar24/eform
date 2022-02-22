<?php

namespace App\Http\Resources\BusinessForm;

use App\Http\Resources\Param\ParamResource;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\ProductCertificate\ProductCertificateResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BusinessFormDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'company_name' => $this->company_name,
            'since' => $this->since,
            'business_type' => new ParamResource($this->business_type),
            'business_fields' => new ParamResource($this->business_fields),
            'industry' => new ParamResource($this->industry),
            'main_product' => $this->main_product,
            'capital' => $this->capital,
            'annual_turnover' => $this->annual_turnover,
            'total_employee' => $this->total_employee,
            'company_description' => $this->company_description,
            'province' => $this->province,
            'city' => [
                'id' => $this->city->id,
                'city' => $this->city->city,
            ],
            'kecamatan' => $this->kecamatan,
            'kelurahan' => $this->kelurahan,
            'address' => $this->address,
            'postal_code' => $this->postal_code,
            'company_image_url' => $this->company_image_url,
            'contact_name' => $this->contact_name,
            'nik' => $this->nik,
            'phone' => $this->phone,
            'email' => $this->email,
            'website' => $this->website,
            'business_activity' => new ParamResource($this->business_activity),
            'company_npwp_url' => $this->company_npwp_url,
            'company_akta_url' => $this->company_akta_url,
            'nib_url' => $this->nib_url,
            'director_ktp_url' => $this->director_ktp_url,
            'sk_kemenkumham_url' => $this->sk_kemenkumham_url,
            'npwp_url' => $this->npwp_url,
            'ktp_url' => $this->ktp_url,
            'photo_with_ktp_url' => $this->photo_with_ktp_url,
            'product_certificate' => ProductCertificateResource::collection($this->product_certificate_data),
            'product_information' => $this->product_information,
            'product' => ProductResource::collection($this->product),
            'status_ukm' => $this->status_ukm,
        ];
    }
}
