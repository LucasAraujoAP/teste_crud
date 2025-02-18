<?php
// app/Http/Requests/StoreProductRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'sku' => 'required|numeric|unique:products,sku',
            'value' => 'required|numeric|min:0|decimal:0,2'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome do produto é obrigatório',
            'name.max' => 'O nome não pode ter mais que 255 caracteres',
            'sku.required' => 'O SKU é obrigatório',
            'sku.numeric' => 'O SKU deve conter apenas números',
            'sku.unique' => 'Este SKU já está em uso',
            'value.required' => 'O valor é obrigatório',
            'value.numeric' => 'O valor deve ser um número',
            'value.min' => 'O valor não pode ser negativo',
            'value.decimal' => 'O valor deve ter no máximo 2 casas decimais'
        ];
    }
}