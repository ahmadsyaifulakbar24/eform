<?php

namespace App\Http\Resources\BusinessForm;

use App\Http\Resources\Param\ParamResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BusinessFormResource extends JsonResource
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
            'company_description' => $this->company_description,
            'province' => $this->province,
            'city' => [
                'id' => $this->city->id,
                'city' => $this->city->city,
            ],
            'kecamatan' => $this->kecamatan,
            'kelurahan' => $this->kelurahan,
        ];
    }
}
