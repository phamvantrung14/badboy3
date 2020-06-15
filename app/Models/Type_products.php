<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_products extends Model
{
    protected $table = 'type_products';
    public $fillable = ['name','slug','description','image'];
    public function getTypeProductUrl()
    {
        return url("/type-pd/{$this->__get("slug")}");
    }
    public function Products()
    {
        return $this->hasMany("App\Models\Products","id_type");
    }
}
