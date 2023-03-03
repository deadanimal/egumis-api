<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefPostcodeRule extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $table = 'REF_POSTCODE_RULE';
    public $timestamps = false;
}
