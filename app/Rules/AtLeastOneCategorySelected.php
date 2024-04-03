<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AtLeastOneCategorySelected implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Verifica se almeno un valore è selezionato
        return is_array($value) && count($value) > 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Seleziona almeno una categoria.';
    }
}
