<?php

namespace App\Http\Resources\BusinessForm;

use Illuminate\Http\Resources\Json\JsonResource;

class BusinessFormTotalByParamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if($this->category == 'business_type')  {
            $total = $this->business_form_many_business_type->count();
            $total_product = $this->business_form_through_business_type->count();
        } else if($this->category == 'business_fields') {
            $total = $this->business_form_many_business_fields->count();
            $total_product = $this->business_form_through_business_fields->count();
        } else if($this->category == 'industry') {
            $total = $this->business_form_many_industry->count();
            $total_product = $this->business_form_through_industry->count();
        } else if($this->category == 'annual_turnover') {
            $total = $this->business_form_many_annual_turnover->count();
            $total_product = $this->business_form_through_annual_turnover->count();
        }
        return [
            'id' => $this->id,
            'param' => $this->param,
            'order' => $this->order,
            'total' => $total,
            'total_product' => $total_product
        ];
    }
}
