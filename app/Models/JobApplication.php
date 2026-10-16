<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    public const STATUSES = [
        'wishlist',
        'applied',
        'interview',
        'offer',
        'rejected',
    ];

    protected $fillable = [
        'user_id',
        'job_title',
        'company_name',
        'location',
        'job_url',
        'status',
        'applied_date',
        'notes',
    ];

    protected $casts = [
        'applied_date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
