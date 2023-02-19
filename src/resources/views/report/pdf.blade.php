<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Tasks report') }}</title>
    <style>
        h1 {
            margin-bottom: 50px;
            text-align: center;
        }

        table {
            width: 100%;
        }

        table tr th,
        table tr td {
            padding: 5px;
            vertical-align: top;
            font-size: 12px;
            text-align: left;
            border-bottom: 1px solid #ececec;
        }

        .text-right {
            text-align: right;
        }

        .fixed-width {
            width: 100px;
        }
    </style>
</head>
<body>
    <h1>{{ __('Tasks report') }}</h1>
    <table>
        <tr>
            <th>{{ __('Task title') }}</th>
            <th>{{ __('Task comment') }}</th>
            <th class="date fixed-width">{{ __('Task date') }}</th>
            <th class="fixed-width">{{ __('Time spent, mins') }}</th>
        </tr>
        @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->comment }}</td>
                <td>{{ $task->date }}</td>
                <td>{{ $task->minutes_spent }}</td>
            </tr>
        @endforeach
        <tr>
            <th colspan="3" class="text-right">
                {{ __('Total:') }}
            </th>
            <td>{{ $tasks->sum('minutes_spent') }}</td>
        </tr>
    </table>
</body>
</html>
