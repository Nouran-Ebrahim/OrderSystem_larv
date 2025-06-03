<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'client_id' => 'required|exists:clients,id',
            'items' => 'required|array|min:1',
            'items.*.name' => 'required|max:100',
            'items.*.quantity' => 'required|min:1|integer',
            'items.*.price' => 'required|min:0.5|max:99999999.99|numeric',
        ];
    }
    public function attributes()
    {
        $attributes = [
            'items.*.name' => 'Item name',
            'items.*.quantity' => 'Item quantity',
            'items.*.price' => 'Item price',
            'client_id'=>'Client',
        ];

        return $attributes;
    }
}
