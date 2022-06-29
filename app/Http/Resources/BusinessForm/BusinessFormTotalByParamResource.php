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
        return [
            // 'id' => $this->id,
            // 'province' => $this->province,
            // 'total' => $this->business_form->count(),
            // 'total_product' => ''
        ];
    }
}
