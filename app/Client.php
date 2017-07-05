<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];

    public function getPhoneAttribute($phone)
    {
        return $this->localizePhoneNumber($phone);
    }

    private function localizePhoneNumber($phone)
    {
        //formats a phone number regardless of how it's entered
        $numbers_only = preg_replace("/[^\d]/", "", $phone);

        return preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $numbers_only);
    }
}
