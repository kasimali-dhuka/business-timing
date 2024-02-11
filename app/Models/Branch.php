<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'name',
        'images',
        'sunday_time',
        'monday_time',
        'tuesday_time',
        'wednesday_time',
        'thursday_time',
        'friday_time',
        'saturday_time',
    ];

    public function business() {
        return $this->belongsTo(Business::class);
    }
}
