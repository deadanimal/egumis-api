<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaLang extends Model
{
    protected $connection = "mysql";
    protected $guarded = ['id'];
    public $table = 'MA_LANG';
    public $timestamps = false;
}
