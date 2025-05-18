<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignsAssignedToUser extends Model
{
    use HasFactory;

    protected $table = 'campaigns_assigned_to_users';

    protected $fillable = [
        'user_id',
        'campaign_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
