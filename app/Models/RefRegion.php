<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefRegion extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $table = 'REF_REGION';
    public $timestamps = false;
}
