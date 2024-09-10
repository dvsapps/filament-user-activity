<?php

namespace Edwink\FilamentUserActivity\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class UserActivityScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if(! auth()->user()->admin) {
            $builder->where('user_id', auth()->user()->id);
        }
    }
}
