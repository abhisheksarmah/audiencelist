<?php

namespace App\Http\Controllers;

use App\Attendee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendeeStatusChangeController extends Controller
{
    public function __invoke()
    {
        $requestDate = Carbon::createFromFormat('d/m/Y', request('date'))->format('Y-m-d');
        $attendee = Attendee::findOrFail(request()->id);
        $attendence = $attendee->attendences()->where('attendence_list_id', request()->list)->where('date', $requestDate)->first();
        if (!$attendence) {
            $attendee->attendences()->create([
                'attendence_list_id' => request('list'),
                'present' => true,
                'date' => $requestDate
            ]);
        } else {
            if ($attendence->present) {
                $attendence->present = false;
            } else {
                $attendence->present = true;
            }
            $attendence->save();
        }

        return redirect()->back();
    }
}
