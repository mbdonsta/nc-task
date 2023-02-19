<?php

namespace App\Http\Controllers;

use App\Contracts\ReportInterface;
use App\Http\Requests\ReportGenerateRequest;
use App\Services\TaskService;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function generate(ReportGenerateRequest $request, ReportInterface $report)
    {
        $attributes = $request->validated();
        $tasks = TaskService::getAllByUser(auth()->user()->id, $attributes['from'], $attributes['to']);

        if ($tasks->isEmpty()) {
            session()->flash('error', __("There are no tasks for report from " . $attributes['from'] . " to " . $attributes['to'] . "."));

            return redirect()->route('task.index');
        }

        return $report->generate($tasks);
    }
}
