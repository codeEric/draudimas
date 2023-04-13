<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function carImage()
    {
        return $this->hasMany(CarImage::class);
    }

    public function scopeFilter(Builder $query, $filter)
    {
        if ($filter->brand != null) {
            $query->where('brand', 'like', "%$filter->brand%");
        }
        if ($filter->model != null) {
            $query->where('model', 'like', "%$filter->model%");
        }
        if ($filter->reg_number != null) {
            $query->where('reg_number', $filter->reg_number);
        }
    }
}
