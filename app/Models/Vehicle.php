<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;

class Vehicle extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'user_id',
        'name',
        'vehicle_no',
        'vehicle_type',
        'vehicle_images',
    ];

    protected $casts = [
        'vehicle_images' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
