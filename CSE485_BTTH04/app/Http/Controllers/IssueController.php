<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = Issue::with('computer')->paginate(10);
        $computers = Computer::all();
        return view('issues.index', compact('issues', 'computers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required',
            'status' => 'required'
        ]);

        Issue::create($request->all());
        return redirect()->route('issues.index')->with('success', 'Thêm sự cố thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $issue = Issue::findOrFail($id);

        $request->validate([
            'computer_id' => 'required',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required',
            'status' => 'required'
        ]);

        $issue->update(($request->all()));
        return redirect()->route('issues.index')->with('success', 'cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $issue = Issue::findOrFail($id);
        $issue->delete();
        return redirect()->route('issues.index')->with('success', 'xoá thành công');
    }
}