<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\File;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return array_merge(
            parent::toArray($request),
            [
                'photo_profile' => $this->photoProfile && File::exists(public_path('uploads'. $this->photoProfile->path)) ? asset('uploads'.$this->photoProfile->path) : asset('assets/images/image-solid.svg'),
            ]
        );
    }
}
