<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'payment_for' => 'required|in:"Hosting","Domain"',
            'payment_type' => 'required|in:"First-payment","Renew"',
            'duration_type' => 'required|in:"Month","Year"',
            'payment_date' => 'required|date|before_or_equal:today',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|numeric|min:1',
            'hd_id' => 'required',

            
        ];
    }
}
