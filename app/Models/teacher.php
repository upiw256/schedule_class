<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class teacher extends Model
{
    use HasFactory;
    public function classroom(): HasMany
    {
        return $this->hasMany(classroom::class);
    }
    public function schedule(): HasMany
    {
        return $this->HasMany(schedule::class);
    }
    public function lesson(): hasMany
    {
        return $this->hasMany(Lesson::class);
    }

}
