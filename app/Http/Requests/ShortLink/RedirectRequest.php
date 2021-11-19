<?php

namespace App\Http\Requests\ShortLink;

use Illuminate\Foundation\Http\FormRequest;

class RedirectRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            //
        ];
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->route()->parameter('token');
    }
}
