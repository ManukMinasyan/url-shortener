<?php

namespace App\Http\Requests\Url;

use Illuminate\Foundation\Http\FormRequest;

class UrlStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'long_url' => 'required|active_url',
            'custom_url' => 'nullable|unique:urls,short_url|max:250'
        ];
    }
}