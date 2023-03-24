<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CampaignCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'user_id', 'category_id', 'name', 'description', 'amount', 'receiver'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'role_id', 'id');
    }
}
