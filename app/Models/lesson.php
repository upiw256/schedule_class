<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class lesson extends Model
{
    public function teacher():BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function classroom():BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }
    use HasFactory;
}
