<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory, HasUlids;

    public function gym(){
        return $this->hasMany((gym::class));
    }
}
