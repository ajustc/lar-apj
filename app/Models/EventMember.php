<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'company_name',
        'participant_name',
        'participant_email',
        'participant_phone_number',
        'participant_avatar',
    ];

    public function rlEvent()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
