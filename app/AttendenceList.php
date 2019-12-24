<?php

namespace App;

use App\Attendee;
use Carbon\Carbon;
use App\Attendence;
use Illuminate\Database\Eloquent\Model;

class AttendenceList extends Model
{
    protected $guarded = [];

    protected $appends = [
        'start_date_formatted',
        'end_date_formatted',
        'created_at_formatted'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        });
    }

    public function attendees()
    {
        return $this->hasMany(Attendee::class, 'attendence_list_id');
    }

    public function getStartDateFormattedAttribute($value)
    {
        return !$this->start_date ? null : Carbon::parse($this->start_date)->format('d M, Y');
    }

    public function getEndDateFormattedAttribute($value)
    {
        return !$this->end_date ? null : Carbon::parse($this->end_date)->format('d M, Y');
    }

    public function getCreatedAtFormattedAttribute($value)
    {
        return !$this->created_at ? null : Carbon::parse($this->created_at)->format('d M, Y');
    }
}
