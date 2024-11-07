<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidCpf implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pattern = '/^\d{3}\.\d{3}\.\d{3}-\d{2}$/';

        if(!preg_match($pattern, $value)) {
            $fail('the field :attribute is not a valid CPF');
        }
    }
}