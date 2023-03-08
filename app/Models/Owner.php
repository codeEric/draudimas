<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Owner extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function car()
    {
        return $this->hasMany(Car::class);
    }

    public function scopeFilter(Builder $query, $filter)
    {
        if ($filter->name != null) {
            $query->where('name', 'like', "%$filter->name%");
        }
        if ($filter->surname != null) {
            $query->where('surname', 'like', "%$filter->surname%");
        }
    }
}
