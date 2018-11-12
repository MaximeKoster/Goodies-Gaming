<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';

    public function Catalogue()
    {
        return $this->hasOne('app\Model\Catalogue');
    }
    public function Users()
    {
        return $this->hasMany('app\Model\Users');
    }
}
