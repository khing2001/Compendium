<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Journal extends Model
{
    protected $table = 'journals';

    protected $fillable = ['user_id', 'learning_journal', 'heart_journal', 'questions', 'quotes'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
