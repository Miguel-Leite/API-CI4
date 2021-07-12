<?php

namespace App\Models\Validator;

class Validator
{

    protected $validatorRegEx   = [
        'regex_bi_valid' => '/^[0-9]{9}+[aA-zZ]{2}+[0-9]{3}$/i',
        'regex_phone_valid' => '/^\+244[9]{1}+[0-9]{8}/i' 
    ];

    public function is_bi_valid($bi):bool
    {
        if(!preg_match($this->validatorRegEx['regex_bi_valid'], $bi))
        {
            return false;
        } else {
            return true;
        }
    }

    public function is_phone_valid($phone):bool
    {
        if(!preg_match($this->validatorRegEx['regex_phone_valid'], $phone))
        {
            return false;
        } else {
            return true;
        }
    }
}
