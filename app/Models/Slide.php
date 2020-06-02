<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = 'slide';
    public $fillable = ['slide_title','image','status'];

    public function getImg(){
//        $link = "upload/slide";
        return asset("upload/slide");
    }
}
