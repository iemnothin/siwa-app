<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Carbon;

class Warga extends Model
{
    use HasFactory;
    protected $table = 'warga';

    protected $guarded = [];
    // public function getCreatedAtAttribute()
    // {
    //     return Carbon::parse($this->attributes['tanggal_lahir'])
    //         ->translatedFormat('1, d F Y');
    // }
}
