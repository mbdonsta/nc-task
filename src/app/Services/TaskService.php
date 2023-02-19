<?php

namespace App\Services;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class TaskService {
    public function create(User $user, array $attributes): Task
    {
        return $user->tasks()->create($attributes);
    }

    public static function getPaginatedByUser(int $userId, int $itemsPerPage = 6): LengthAwarePaginator
    {
        return Task::where('user_id', $userId)->paginate($itemsPerPage);
    }

    public static function getAllByUser(int $userId, string $dateFrom = '', string $dateTo = ''): Collection
    {
        $tasks = Task::where('user_id', $userId);

        if ($dateFrom) {
            $tasks = $tasks->where('date', '>=', $dateFrom);
        }

        if ($dateTo) {
            $tasks = $tasks->where('date', '<=', $dateTo);
        }

        return $tasks->orderBy('date', 'asc')->get();
    }
}
