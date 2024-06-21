<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeBoardController extends Controller
{
    public function index()
    {
        $notices = Notice::all();
        return view('notices.index', compact('notices'));
    }

    public function create()
    {
        return view('notices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'expiry_date' => 'nullable|date',
        ]);

        Notice::create($request->all());

        return redirect()->route('notices.index')
                         ->with('success', 'Notice created successfully.');
    }

    public function show(Notice $notice)
    {
        return view('notices.show', compact('notice'));
    }

    public function edit(Notice $notice)
    {
        return view('notices.edit', compact('notice'));
    }

    public function update(Request $request, Notice $notice)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'expiry_date' => 'nullable|date',
        ]);

        $notice->update($request->all());

        return redirect()->route('notices.index')
                         ->with('success', 'Notice updated successfully.');
    }

    public function destroy(Notice $notice)
    {
        $notice->delete();

        return redirect()->route('notices.index')
                         ->with('success', 'Notice deleted successfully.');
    }
}
