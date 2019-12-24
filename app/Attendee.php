<?php

namespace App;

use App\Ticket;
use App\AttendenceList;
// use TicketStatusEnum;
use App\Enums\TicketStatusEnum;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    protected $guarded = [];

    public function attendencelist()
    {
        return $this->belongsTo(AttendenceList::class, 'attendence_list_id');
    }

    public function attendences()
    {
        return $this->hasMany(Attendence::class, 'attendee_id')->latest('date');
    }

    public function scopePresent($query, $status = true)
    {
        $query->whereHas('attendences', function ($query) use ($status) {
            $query->present($status);
        });
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['list'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('attendence_list_id',  $search);
            });
        })->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('ticket_id', 'like', '%' . $search . '%');
            });
        })->when($filters['date'] ?? null, function ($query, $date) {
            $query->whereHas('attendences', function ($query) use ($date) {
                $query->where('date', $date);
            });
        });
    }
}
