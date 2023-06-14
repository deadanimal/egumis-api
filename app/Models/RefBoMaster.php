<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefBoMaster extends Model
{
    protected $guarded = ['id'];
    public $table = 'REF_BO_MASTER';
    public $timestamps = false;

    public function appRfdBo()
    {
        return $this->hasOne(AppRfdBo::class, 'boMasterId');
    }
    
    public function entity()
    {
        return $this->belongsTo(RefEntityMaster::class, 'entity_code', 'entity_code');
    }
}
