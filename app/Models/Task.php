<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'description',
        'endDate',
        'priority',
        'status',
        'creator_user',
        'responsible_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'responsible_user', 'id');
    }

    public function userAdmin()
    {
        return $this->belongsTo(User::class, 'creator_user', 'id');
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
        return $filter->apply($builder);
    }
}
