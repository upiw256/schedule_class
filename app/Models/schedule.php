<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class schedule extends Model
{
    use HasFactory;
    public function classroom(): BelongsTo
    {
        return $this->belongsTo(classroom::class);
    }
    public function teacher(): belongsTo
    {
        return $this->belongsTo(teacher::class);
    }
}
