<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepairQuoteRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'device_model' => ['required', 'string', 'max:255'],
            'service_needed' => ['required', 'string', 'max:255'],
            'inquiry_type' => ['nullable', 'string', 'max:100'],
            'product_id' => ['nullable', 'integer'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
