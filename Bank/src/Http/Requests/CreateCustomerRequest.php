<?php

namespace Smile\Bank\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'mobile'     => 'required|string|max:20|unique:customers,mobile',
            'email'      => 'required|email|unique:customers,email',
        ];
    }
}
