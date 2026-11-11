<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_email' => ['required', 'email', 'max:255'],
            'customer_phone' => ['required', 'string', 'max:50'],
            'fulfillment_type' => ['required', 'in:pickup,delivery,shipping'],
            'delivery_address' => ['required_if:fulfillment_type,delivery,shipping', 'nullable', 'string', 'max:500'],
            'notes' => ['nullable', 'string', 'max:1000'],
            'age_confirmed' => ['accepted'],
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'age_confirmed.accepted' => 'You must confirm that you are 21 years of age or older with a valid government photo ID.',
            'delivery_address.required_if' => 'A delivery address is required for local delivery or shipping.',
        ];
    }
}
