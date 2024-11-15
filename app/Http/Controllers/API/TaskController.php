<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function filter(Request $request)
    {
        $query = Task::query();

        // Filter by created_at
        if ($request->has('created_at')) {
            $query->whereDate('created_at',$request->input('created_at'));
        }

        // Filter by contact
        if ($request->has('contact')) {
            $query->where('contact', $request->input('contact'));
        }

        // Filter by manager
        if ($request->has('manager')) {
            $query->where('manager', $request->input('manager'));
        }

        // Search by text (title or email)
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%$search%")
                  ->orWhere('email', 'LIKE', "%$search%");
            });
        }

        // Filter by status
        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }

        // Get filtered results
        $tasks = $query->get();

        return response()->json([
            'success' => true,
            'data' => $tasks,
        ]);
    }
}
