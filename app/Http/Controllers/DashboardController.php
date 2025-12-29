<?php

namespace App\Http\Controllers;

use App\Models\ProductivityLogChart;
use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

// This controller is responsible for getting the necessary data for the Dashboard page.
class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('dashboard', [
            // Mapping the data matching exactly what the frontend expects
            'initialTasks' => Task::with('category')
            ->where('user_id', Auth::id())
            ->latest()
            ->get()
            ->map(function ($task) {
                return [
                    'id'=> $task->id,
                    'title' => $task->title,
                    'category' => $task->category->name,
                    'priority' => $task->priority,
                    'status' => $task->status,
                    'dueDate' => $task->due_date
                ];
            }),
            'chartData' => ProductivityLogChart::where('user_id', Auth::id())
            ->latest('date')
            ->take(7)
            ->get()
            ->map(fn($log) => [
                'name' => date('D', strtotime($log->date)), // Converts '2023-10-25' to 'Mon'

            ])
            ->reverse()
            ->values()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required'|'string'|'max:50',
            'category' => 'required'|'string',
            'priority' => 'required'|'string',
            'status' => 'required'|'date',
        ]);

        
    }
}
