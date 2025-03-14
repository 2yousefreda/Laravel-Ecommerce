<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name'=> ['required','min:3','max:255'],
            'price'=> ['required','gt:0'],
            'quantity'=> ['required','gt:0'],
            'description'=> ['string','min:0','max:255','nullable'],    
            'category_id'=> ['required','exists:categories,id'],
            'imagepath'=> ['required','mimes:jpeg,jpg,png,gif'],
        ];
    }
}
