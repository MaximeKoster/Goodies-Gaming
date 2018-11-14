<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';

    public function Catalogue()
    {
        return $this->hasOne('app\Models\Catalogue');
    }
    public function Users()
    {
        return $this->hasMany('app\Models\User');
    }
}
