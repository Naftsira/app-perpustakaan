<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ShowMemberDetail extends FormRequest
{
    public function authorize(): bool
    {
        return (int) $this->route('member') === 1;
    }
}
