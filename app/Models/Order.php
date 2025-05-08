<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'gig_id',
        'quantity',
        'total_price',
        'status',
    ];

    // Relationship to buyer
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship to gig
    public function gig()
    {
        return $this->belongsTo(Gig::class);
    }
}
