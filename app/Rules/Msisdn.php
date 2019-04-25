<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Msisdn implements Rule
{
    private $telcos;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->telcos = config('shopnsend.telcos');
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $result = false;

        foreach ($this->telcos as $telco) {
            $result = (preg_match("/" . $telco['regex'] . "/", $value)) ? true : false;

            if ($result) {
                break;
            }
        }
        
        return $result;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid Mobile Number.';
    }
}
