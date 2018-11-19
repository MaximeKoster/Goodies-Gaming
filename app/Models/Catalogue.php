<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    protected $table = 'catalogue';

    public function Cart()
    {
        return $this->hasOne('app\Models\Cart');
    }
    public function Category()
    {
        return $this->hasOne('app\Models\Category');
    }
}
