<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaundryRequest extends FormRequest
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
            'user_id' => 'required',
            'name' => 'required|min:3|unique:laundries',
            'address' => 'required|min:5|max:150',
            'longlat' => 'required|min:5|unique:laundries'
        ];
    }
}
