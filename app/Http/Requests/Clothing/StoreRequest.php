<?php

namespace App\Http\Requests\Clothing;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'price' => 'required|integer',
            'discount' => 'required|integer',
            'status_id' => 'required|integer',
            'category' => 'required',
            'catSize' => 'required',
            'brand' => 'required',

            'colors' => 'required',
            'colors.*.name' => 'string',

            'sizesAndQuantity' => 'required',
            'sizesAndQuantity.*.name' => 'string',
            'sizesAndQuantity.*.quantity' => 'integer',
        ];
    }
}
