<?php

namespace App\Reports;

use App\Exports\TasksExport;
use Excel;
use App\Contracts\ReportInterface;
use Illuminate\Database\Eloquent\Collection;

class ExcelReport implements ReportInterface
{
    private const FILENAME = 'task-report.xlsx';

    public function generate(Collection $tasks)
    {
        return Excel::download(new TasksExport($tasks), self::FILENAME);
    }
}
