<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    public function Cart()
    {
        return $this->hasOne('app\Model\Cart');
    }

}