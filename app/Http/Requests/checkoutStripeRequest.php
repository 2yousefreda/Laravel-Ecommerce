<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class checkoutStripeRequest extends FormRequest
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
            'name'=> ['required'],
            'email'=> ['required',Rule::email()],
            'address'=> ['required'],
            'phone'=> ['required'],
            'shipping'=> ['required'],
            'totalPrice'=> ['gt:0','nullable'],
            
        
        ];
    }
    public function messages(): array
    {
        return [
            
            
                'totalPrice.gt'=> 'Your cart is Empty '
            
               
           
        ];
    }
}
