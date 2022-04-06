<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Disease;

class Plant extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function diseases() {
        return $this->hasMany(Disease::class, 'plant_id', 'id');
    }
}
