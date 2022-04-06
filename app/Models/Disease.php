<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Plant;

class Disease extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function plant() {
        return $this->hasOne(Plant::class, 'id', 'plant_id');
    }
}
