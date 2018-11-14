<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    public function Catalogue()
    {
        return $this->hasOne('app\Models\Catalogue');
    }

}
