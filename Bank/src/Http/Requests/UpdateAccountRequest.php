<?php

namespace Smile\Bank\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UpdateAccountRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'balance' => 'numeric|min:0',
            'status'  => 'in:active,inactive',
        ];
    }
}
