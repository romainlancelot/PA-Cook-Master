<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquipmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->role_name() == 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'category' => '',
            'marque' => '',
            'key_features' => '',
            'colors' => '',
            'simple_description' => '',
            'warranty_url' => '',
            'height' => '',
            'width' => '',
            'depth' => '',
            'dimensional_guide_url' => '',
            'name_3d' => '',
            'manual_url' => '',
            'description' => 'required',
            'price' => 'required',
            'photos' => 'required',
            'availablequantity' => 'required',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
