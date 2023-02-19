<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Services\ReportService;
use App\Services\TaskService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        $tasks = TaskService::getPaginatedByUser(auth()->user()->id);
        $reports = ReportService::getAvailableReports();

        return view('task.index', compact('tasks', 'reports'));
    }

    public function add(): View
    {
        return view('task.add');
    }

    public function store(TaskStoreRequest $request, TaskService $taskService): RedirectResponse
    {
        $attributes = $request->validated();
        $taskService->create(auth()->user(), $attributes);
        session()->flash('success', __('Task was created successfully.'));

        return redirect()->route('task.index');
    }
}
