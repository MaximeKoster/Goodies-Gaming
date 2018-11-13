<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    public function Catalogue()
    {
        return $this->hasOne('app\Model\Catalogue');
    }

}
