<?php

namespace App;

use App\Enums\AttendenceStatusEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    protected $guarded = [];

    public function scopePresent($query, $status = true)
    {
        if ($status) {
            $query->where('present', AttendenceStatusEnum::Yes);
        } else {
            $query->where('present', AttendenceStatusEnum::No);
        }
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['list'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('attendence_list_id',  $search);
            });
        })->when($filters['date'] ?? null, function ($query, $date) {
            $query->where(function ($query) use ($date) {
                $query->where('date', $date);
            });
        });
    }

    public function scopeAvail($query)
    {
        $query->whereBetween('date', [$this->attendencelist->start_date, $this->attendencelist->end_date]);
    }
}
