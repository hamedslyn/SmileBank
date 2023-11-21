<?php

namespace Smile\Bank\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAccountRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'account_number' => 'required|string|unique:accounts,account_number',
            'balance'        => 'required|numeric|min:0',
            'status'         => 'required|in:active,inactive',
            'customer_id'    => 'required|exists:customers,id',
        ];
    }
}
