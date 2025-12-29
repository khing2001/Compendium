<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use App\Models\Test;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        return Inertia::render('progress/index', [ // The use of props is for rendering it in our front-end side. For example, here, we have this public function index, Inertia renders to progress/index, a prop.
            'current' => Progress::latest()->first(),
            'achievedTasks' => Progress::all(),
        ]);
    }

    public function complete()
    {
        return Inertia::render('progress/complete', ['message' => 'Task completed!',]);
    }

    public function create(Request $request)
    {
        return Inertia::render('progress/create', []); //progress/progresscreate is in the format [foldername]/[pagename.tsx]
    }

    public function updateCurrentProgress(Request $request)
    {   
        //validate is built-in function, its like a dictionary but with rules instead of values
        $validated = $request->validate([
            'name' => 'required|string|max:50',
        ]);
        
        $current = Progress::latest()->first();
        if ($current){
            $current->update(['name' => $validated['name']]);
        } else {
            Progress::create(['name' => $validated['name']]);
        }

        return back();

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        //dd(vars: $request);
        $request->validate([
            'domain' => 'required|string|max:255',
            'progress' => 'required|string|max:100',
            'learnings' => 'string|nullable'
        ]);

        Progress::create($request->all());
        return redirect()->route('progress.index')->with('message', 'Progressed!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(Progress $progress){
        return Inertia::render('progress/edit', compact('progress'));
    }

    public function update(Request $request, Progress $progress){
        $validated = $request->validate([
            'domain' => 'required|string|max:255',
            'progress' => 'required|string|max:100',
            'learnings' => 'string|nullable'
        ]);

        $progress->update($validated);

        return redirect()->route('progress.index')->with('sucess', 'Progress updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Progress::findOrFail($id)->delete();

        return back()->with('message', 'Task deleted successfully.');
    }
}
