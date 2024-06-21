<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OfficeTiming;

class OfficeTimingController extends Controller
{
    public function index()
    {
        $officeTimings = OfficeTiming::all();
        return view('office-timings.index', compact('officeTimings'));
    }

    public function create()
    {
        return view('office-timings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'shift' => 'required|string|max:255',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
        ]);

        OfficeTiming::create($request->all());

        return redirect()->route('office-timings.index')->with('success', 'Office Timing created successfully.');
    }

    public function show(OfficeTiming $officeTiming)
    {
        return view('office-timings.show', compact('officeTiming'));
    }

    public function edit(OfficeTiming $officeTiming)
    {
        return view('office-timings.edit', compact('officeTiming'));
    }

    public function update(Request $request, OfficeTiming $officeTiming)
    {
        $request->validate([
            'shift' => 'required|string|max:255',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
        ]);

        $officeTiming->update($request->all());

        return redirect()->route('office-timings.index')->with('success', 'Office Timing updated successfully.');
    }

    public function destroy(OfficeTiming $officeTiming)
    {
        $officeTiming->delete();

        return redirect()->route('office-timings.index')->with('success', 'Office Timing deleted successfully.');
    }
}
