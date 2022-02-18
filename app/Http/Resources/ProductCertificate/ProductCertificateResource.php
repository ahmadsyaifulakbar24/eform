<?php

namespace App\Http\Resources\ProductCertificate;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCertificateResource extends JsonResource
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
            'path_url' => $this->path_url,
            'file_name' => $this->file_name,
        ];
    }
}
