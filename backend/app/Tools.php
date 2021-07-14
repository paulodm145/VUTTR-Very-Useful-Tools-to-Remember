<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tools extends Model
{
    protected $table = 'tools';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'link', 'description'];

}
