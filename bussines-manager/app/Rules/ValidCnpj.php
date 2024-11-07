<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidCnpj implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pattern = '/^\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}$/
';
        if(!preg_match($pattern, $value)) {
            dd($value);
            $fail('the field :attribute is not valid');
        }
    }
}
