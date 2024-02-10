<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'day',
        'hour',
        'allergies',
        'phone',
        'user_id',
        'credit_card_id',
        'commensals'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
