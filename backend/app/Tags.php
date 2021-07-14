<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'tags';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'tool_id'];
}
