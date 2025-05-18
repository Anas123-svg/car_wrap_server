<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'time',
        'budget',
        'status',
        'multiple_drivers',
        'wrap_type',
        'start_date',
        'end_date',
        'locations',
    ];

    protected $casts = [
        'multiple_drivers' => 'boolean',
        'budget' => 'decimal:6',
        'locations' => 'array',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'campaigns_assigned_to_users')
                    ->withPivot('status')
                    ->withTimestamps();
    }
}
