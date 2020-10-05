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
            'account_id' => 'required|integer',
            'status' => 'sometimes|string',
            'label' => 'required|string',
            'confirmed_delivery_date' => 'sometimes|string',
            'confirmed_delivery_time' => 'sometimes|string',
            'choosen_delivery_date' => 'required|string',
            'choosen_delivery_time' => 'required|string',
            'payment' => 'required|string',
            'active_contact' => 'required|string',
            'reciever_name' => 'required|string',
            'delivery_address' => 'required|string',
            'customer_message' => 'sometimes|string',
            'admin_remarks' => 'sometimes|string',
            'total_amount' => 'required|integer',
            'delivery_fee' => 'required|integer',
            'overall_payment' => 'required|integer'
            
        ];
    }
}
