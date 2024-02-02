<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class classroom extends Model
{
    use HasFactory;
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(teacher::class);
    }

    public function schedule(): HasMany
    {
        return $this->hasMany(schedule::class);
    }
    public function lesson(): HasManyThrough
    {
        return $this->HasManyThrough(lesson::class, teacher::class);
    }
}
