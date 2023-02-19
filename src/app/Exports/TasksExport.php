<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TasksExport implements FromCollection, WithHeadings
{
    private Collection $tasks;

    public function __construct(Collection $tasks)
    {
        $this->tasks = $tasks;
    }

    public function headings(): array
    {
        return [
            __('Task title'),
            __('Task comment'),
            __('Task date'),
            __('Time spent, mins')
        ];
    }

    public function collection(): Collection|\Illuminate\Support\Collection
    {
        return $this->tasks->map(function ($task) {
            return [
                $task->title,
                $task->comment,
                $task->date,
                $task->minutes_spent,
            ];
        });
    }

    public function prepareRows($rows): array
    {
        $rows[] = [null, null, 'Total:', $this->tasks->sum('minutes_spent')];

        return $rows;
    }
}
