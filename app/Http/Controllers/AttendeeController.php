<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Attendence;
use Inertia\Inertia;
use App\AttendenceList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\ValidationException;

class AttendeeController extends Controller
{
    public function index(Request $request)
    {
        $list = AttendenceList::where('id', request()->list)->firstOrFail();
        $requestDate = Carbon::createFromFormat('d/m/Y', request('date'))->format('Y-m-d');

        // if (Gate::denies('create-audience', [$requestDate, $list->start_date, $list->end_date])) {
        //     abort(403);
        // }

        $this->validate($request, [
            'list' => 'required',
            'date' => [
                'required',
                'date_format:d/m/Y',
            ],
        ]);

        $request = request()->all();
        if (!array_key_exists('list', $request) || !array_key_exists('date', $request)) {
            throw new \InvalidArgumentException('Please provide necessary arguments to view the results', 400);
        }
        $filters = request()->all('list', 'date', 'search');
        $range = [$list->start_date, $list->end_date];
        $todayDate = now()->format('d/m/Y');
        $previousDate = Carbon::createFromFormat('d/m/Y', request('date'))->addDay(-1)->format('Y-m-d');
        $attendees = DB::table('attendees')
            ->leftJoin('attendences', function ($join) use ($requestDate) {
                $join->on('attendees.id', '=', 'attendences.attendee_id')
                    ->where('attendences.attendence_list_id', request('list'))
                    ->where('attendences.date', $requestDate);
            })
            ->join('attendence_lists', function ($join) use ($requestDate) {
                $join->on('attendees.attendence_list_id', '=', 'attendence_lists.id')
                    ->whereRaw('? between start_date and end_date', [$requestDate]);
            })
            ->where('attendees.attendence_list_id', request('list'))
            ->select(
                'attendees.id',
                'attendees.name',
                'attendees.ticket_id',
                'attendences.present'
            )->paginate();

        return Inertia::render(
            'Audience',
            [
                'filters' => $filters,
                'attendees' => $attendees,
                'total_attendees' => $total = $attendees->total(),
                'total_present' =>  $present = Attendence::filter(array_merge(request()->only(['list']), ['date' => $requestDate]))->present()->count(),
                'total_absent' => $total - $present,
                'total_yesterday' => Attendence::filter(request()->only(['list']))->where('date', $previousDate)->present()->count(),
                "date" => [
                    'formatted' => request()->has('date') ? Carbon::createFromFormat('d/m/Y', request()->date)->format('d M, Y') : now()->format('d M, Y'),
                    'database' => $todayDate,
                    'range' => $range
                ],
                "event_name" => $list->name,
                "can" => [
                    'create-audience' => Gate::allows('create-audience', [$requestDate, $list->start_date, $list->end_date])
                ]
            ]
        );
    }
    public function create()
    {
        $list = AttendenceList::where('id', request()->list)->firstOrFail();
        $requestDate = Carbon::createFromFormat('d/m/Y', request('date'))->format('Y-m-d');
        if (Gate::denies('create-audience', [$requestDate, $list->start_date, $list->end_date])) {
            abort(403);
        }
        return Inertia::render('Create', [
            'filters' => request()->all('list', 'date'),
            "event_name" => AttendenceList::where('id', request()->list)->pluck('name')->firstOrFail()
        ]);
    }
}
