<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * Class ShortLinkResource
 * @package App\Http\Resources
 *
 * @property-read  string $url
 * @property-read  string $token
 */
class ShortLinkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'url' => $this->url,
            'token' => $this->token,
        ];
    }
}
