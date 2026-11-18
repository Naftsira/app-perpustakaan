<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ShowMemberDetail extends FormRequest
{
    public function authorize(): bool
    {
        $memberId = (int) $this->route('member');

        if ($memberId == 3) {
            abort(403, "Testing authorization: View Member ID=={$memberId} sengaja tidak diizinkan.");
        }

        return true;
    }
}
