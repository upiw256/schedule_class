<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class lesson extends Model
{
    public function teachers(): HasMany
    {
        return $this->hasMany(teacher::class);
    }

    public function classroom(): HasMany
    {
        return $this->hasMany(classroom::class);
    }
    use HasFactory;
}
