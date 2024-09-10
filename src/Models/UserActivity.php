<?php

namespace Edwink\FilamentUserActivity\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Edwink\FilamentUserActivity\Models\Scopes\UserActivityScope;

class UserActivity extends Model
{
    protected $fillable = [
        'user_id', 'url',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function getTable()
    {
        return config('filament-user-activity.table.name');
    }

    /**
     * Get the user that owns the UserActivity
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(config('filament-user-activity.model'));
    }

    protected static function booted(): void
    {
        static::addGlobalScope(new UserActivityScope);
    }
}
