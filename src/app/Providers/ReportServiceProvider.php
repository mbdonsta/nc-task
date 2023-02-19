<?php

namespace App\Providers;

use App\Contracts\ReportInterface;
use App\Reports\CsvReport;
use App\Reports\ExcelReport;
use App\Reports\PdfReport;
use App\Services\ReportService;
use Illuminate\Support\ServiceProvider;

class ReportServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ReportInterface::class, function ($app) {
            return match ((int)request('report_type')) {
                ReportService::CSV_REPORT_ID => new CsvReport(),
                ReportService::EXCEL_REPORT_ID => new ExcelReport(),
                default => new PdfReport(),
            };
        });
    }
}
