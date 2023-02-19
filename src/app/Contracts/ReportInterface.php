<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface ReportInterface
{
    public function generate(Collection $tasks);
}
