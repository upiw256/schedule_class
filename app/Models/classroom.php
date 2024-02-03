<?php

namespace App\Models;

use Filament\Forms\Components\HasManyRepeater;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

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
    public function lesson(): hasMany
    {
        return $this->hasMany(lesson::class);
    }
}
