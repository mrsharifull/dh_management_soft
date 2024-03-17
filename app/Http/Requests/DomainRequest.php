<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DomainRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_id' => 'required|exists:companies,id',
            'hosting_id' => 'nullable|exists:hostings,id',
            'name' => 'required',
            'admin_url' => 'required|url',
            'username' => 'nullable',
            'email' => 'required|email',
            'password' => 'required',
            'purchase_date' => 'required|date',
            'expire_date' => 'nullable|date',
            'renew_data' => 'nullable|date',
            'note' => 'nullable',
        ];
    }
}