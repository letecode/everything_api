<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class UpdateItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user() != null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'item_id' => ['required', 'uuid'],
            'item_category_id' => ['nullable', 'uuid'],
            'name' => ['required', 'max:250'],
            'summary' => ['nullable', 'string', 'max:250'],
            'description' => ['nullable', 'string', 'max:3000'],
            'cover' => ['nullable', 'file'],
            'images.*' => ['nullable', 'file'],
            'price' => ['nullable', 'numeric'],
            'currency' => ['nullable', 'string', 'max:10'],
            'address' => ['nullable', 'string', 'max:240'],
            'latitude' => ['nullable', 'numeric'],
            'longitude' => ['nullable', 'numeric'],
            'color' => ['nullable', 'string', 'max:7'],
            'is_published' => ['nullable', 'boolean'],
            'is_featured' => ['nullable', 'boolean'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
