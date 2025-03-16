<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            
                "totalPrice"=> ['gt:0'],
               "isEmpty"=>["boolean"],
               "suptotal"=>["integer"],
               "shipping"=>["integer"],
               
           
        ];
    }
    public function messages(): array
    {
        return [
            
               'totalPrice.gt'=> 'Your cart is empty'
               
           
        ];
    }
}
