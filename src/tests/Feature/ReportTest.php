<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use App\Services\ReportService;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ReportTest extends TestCase
{
    use DatabaseTransactions;

    public function test_user_can_download_pdf_report(): void
    {
        $user = User::factory()->create();
        Task::factory()->count(10)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);

        $response = $this->post(route('report.generate'), [
            'from' => Carbon::now()->format('Y-m-d'),
            'to' => Carbon::now()->format('Y-m-d'),
            'report_type' => ReportService::PDF_REPORT_ID,
        ]);

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/pdf');
    }

    public function test_user_can_download_csv_report(): void
    {
        $user = User::factory()->create();
        Task::factory()->count(10)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);

        $response = $this->post(route('report.generate'), [
            'from' => Carbon::now()->format('Y-m-d'),
            'to' => Carbon::now()->format('Y-m-d'),
            'report_type' => ReportService::CSV_REPORT_ID,
        ]);

        $response->assertStatus(200);
        $response->assertHeader('content-type', 'text/csv; charset=UTF-8');
    }

    public function test_user_can_download_excel_report(): void
    {
        $user = User::factory()->create();
        Task::factory()->count(10)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);

        $response = $this->post(route('report.generate'), [
            'from' => Carbon::now()->format('Y-m-d'),
            'to' => Carbon::now()->format('Y-m-d'),
            'report_type' => ReportService::EXCEL_REPORT_ID,
        ]);

        $response->assertStatus(200);
        $response->assertHeader('content-type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    }
}
