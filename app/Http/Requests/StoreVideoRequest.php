<?php

namespace Acada\Http\Requests;

use Acada\Http\Requests\Request;

class StoreVideoRequest extends Request
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
                 'title' => 'required|string|max:255',
                 'description' => 'required|string:500',
                 'url' => 'required|url',
                 'category' => 'required|string|max:255'
        ];
    }
}
