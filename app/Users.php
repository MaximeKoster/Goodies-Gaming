<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    public function Cart()
    {
        return $this->hasOne('app\Model\Cart');
    }

}
