<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends Model
{
    use HasFactory;

    /**
     * Get the subject that owns the Topic
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * Get all of the sub_topics for the Topic
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sub_topics(): HasMany
    {
        return $this->hasMany(SubTopic::class);
    }
}
