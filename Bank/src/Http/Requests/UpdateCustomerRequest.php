<?php

namespace Smile\Bank\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UpdateCustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'string|max:50',
            'last_name'  => 'string|max:50',
            'mobile'     => 'string|max:20|unique:customers,mobile,' . $this->customer,
            'email'      => 'email|unique:customers,email,' . $this->customer,
        ];
    }
}
