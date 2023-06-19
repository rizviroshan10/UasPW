<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalTrainer extends Model
{
    use HasFactory;
    protected $table = 'jadwal_trainer';

    public function trainer() {
        return $this->hasOne(Trainer::class);
    }

    public function jadwal() {
        return $this->hasOne(Jadwal::class);
    }
}
