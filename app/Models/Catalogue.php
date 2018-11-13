<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    protected $table = 'catalogue';

    public function Cart()
    {
        return $this->hasOne('app\Model\Cart');
    }
    public function Category()
    {
        return $this->hasOne('app\Model\Category');
    }
}
