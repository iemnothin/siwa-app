<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    use HasFactory;
    protected $table = 'citizens';


    public function gender()
    {
        return $this->belongsTo(Gender::class, 'jenis_kelamin_id', 'id');
    }
    public function maritalStatus()
    {
        return $this->belongsTo(MaritalStatus::class, 'status_perkawinan_id', 'id');
    }
    public function religion()
    {
        return $this->belongsTo(Religion::class, 'agama_id', 'id');
    }
    public function job()
    {
        return $this->belongsTo(Job::class, 'pekerjaan_id', 'id');
    }
    public function citizenship()
    {
        return $this->belongsTo(Citizenship::class, 'kewarganegaraan_id', 'id');
    }

    protected $guarded = [];
}
