<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use App\AttendenceList;
use Illuminate\Support\Facades\DB;
use Spatie\SimpleExcel\SimpleExcelReader;
use Illuminate\Validation\ValidationException;

class AttendenceListController extends Controller
{
    public function index()
    {
        $lists = AttendenceList::where('organiser_id', auth()->id())->filter(request()->only(['search']))->orderByDesc('created_at')->paginate();

        return Inertia::render(
            'Welcome',
            [
                'filters' => request()->only(['search']),
                'lists' => $lists,
                "date" => [
                    'database' => now()->format('d/m/Y')
                ],
            ]
        );
    }
    public function create()
    {
        $startDate = today()->format('d/m/Y');
        $endDate = today()->addDay(5)->format('d/m/Y');
        return Inertia::render('AttendenceLists/Create', [
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'start_date' => ['required', 'date_format:d/m/Y', 'before_or_equal:end_date'],
            'end_date' => ['required', 'date_format:d/m/Y', 'after_or_equal:start_date'],
            'file' => ['required']
        ]);

        DB::transaction(function () use ($request) {
            $attendenceList = AttendenceList::create([
                'name' => request('name'),
                'organiser_id' => auth()->id(),
                'start_date' => Carbon::createFromFormat('d/m/Y', request('start_date'))->format('Y-m-d'),
                'end_date' => Carbon::createFromFormat('d/m/Y', request('end_date'))->format('Y-m-d'),
            ]);

            if ($request->hasFile('file') && $request->file('file')->isValid()) {
                $extension = $request->file->getClientOriginalExtension();
                $fileName = 'tmp' . round(microtime(true) * 1000) . '.' . $extension;
                $path = $request->file->storeAs('temp', $fileName);
            }

            $rows = SimpleExcelReader::create(storage_path('app/' . $path))
                ->getRows()
                ->filter(function (array $rowProperties) {
                    return collect($rowProperties)->contains(["NAME", "ID"]);
                });
            if ($rows->count() > 0) {
                $rows->each(function (array $rowProperties) use ($attendenceList) {
                    $attendenceList->attendees()->create([
                        'name' => $rowProperties['NAME'],
                        'ticket_id' => $rowProperties['ID']
                    ]);
                });
            } else {
                $error = ValidationException::withMessages([
                    'file' => ['the given excel has incorrect header fields. Please follow the instructions listed above.']
                ]);
                throw $error;
            }
            $rows->each(function (array $rowProperties) use ($attendenceList) {
                $attendenceList->attendees()->create([
                    'name' => $rowProperties['NAME'],
                    'ticket_id' => $rowProperties['ID']
                ]);
            });
        });
        return redirect()->back();
    }
}
