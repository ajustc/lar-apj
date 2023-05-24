<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'startdate',
        'enddate',
    ];

    public function rlEventMembers()
    {
        return $this->hasMany(EventMember::class, 'event_id');
    }
}
