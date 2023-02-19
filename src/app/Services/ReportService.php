<?php

namespace App\Services;

use App\Models\User;

class ReportService
{
    public const PDF_REPORT_ID = 1;
    public const CSV_REPORT_ID = 2;
    public const EXCEL_REPORT_ID = 3;

    public static function getAvailableReports(): array
    {
        return [
            self::PDF_REPORT_ID => __('PDF'),
            self::EXCEL_REPORT_ID => __('Excel'),
            self::CSV_REPORT_ID => __('CSV')
        ];
    }

    public static function getAvailableReportsIds(): array
    {
        return [self::PDF_REPORT_ID, self::CSV_REPORT_ID, self::EXCEL_REPORT_ID];
    }
}
