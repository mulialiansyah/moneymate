<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SavingTransaction extends Model
{
    protected $fillable = [
        'saving_goal_id',
        'amount',
        'saving_date',
        'note',
    ];

    public function savingGoal(): BelongsTo
    {
        return $this->belongsTo(SavingGoal::class);
    }
}