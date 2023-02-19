<?php

namespace App\Reports;

use PDF;
use App\Contracts\ReportInterface;
use Illuminate\Database\Eloquent\Collection;

class PdfReport implements ReportInterface
{
    private const FILENAME = 'task-report.pdf';

    public function generate(Collection $tasks)
    {
        return PDF::loadView('report.pdf', ['tasks' => $tasks])->download(self::FILENAME);
    }
}
