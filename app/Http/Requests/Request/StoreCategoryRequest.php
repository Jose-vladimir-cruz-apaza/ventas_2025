<?php

namespace App\Http\Requests\Request;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name'=>'required|unique:categories,name',     
            'description' => 'nullable', 
            'imagen' => 'nullable',                
            'state' => 'nullable',        
        ];        
    }

    public function messages(): array
    {
        return [
            'name.required'=>'El nombre es requerido',
            'name.unique'=>'El nombre es debe ser unico',            
        ];        
    }
}
