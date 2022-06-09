<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'laudnry_id' => 'required',
            'item' => 'required|min:3',
            'delivery_price' => 'required',
            'service_price' => 'required',
            // 'item_price' => 'required',
            // 'total_price' => 'required',
            'status_orders_id' => 'required'
        ];
    }
}
