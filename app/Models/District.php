<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = 'reg_districts';

    public function regencies()
    {
        return $this->belongsTo(Regencies::class, 'regencies_id');
    }

    public function villages()
    {
        return $this->hasMany(Village::class, 'district_id');
    }
}
