<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class friend extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'second_name',
        'surname',
        'dob',
        'number',
        'email',
        'notes',
        'img',
    ];

    public function scopeFilter($query, $filters = [])
    {
        if ($filters['name'] ?? false) {
            $query->where('name', 'like', '%' . request('name') . '%')
                ->orWhere('second_name', 'like', '%' . request('name') . '%');
        }
    }
}
