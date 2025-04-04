<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefFilenameSeq extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $table = 'REF_FILENAME_SEQ';
    public $timestamps = false;
}
