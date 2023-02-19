@extends('layouts.app')

@section('title')
    {{ __('Tasks') }}
@stop

@section('content')
    <div class="py-10 container mx-auto">
        @if ($tasks->isEmpty())
            <div class="rounded p-5 bg-white">
                <p class="text-center mb-4">{{ __('You do not have created any tasks.') }}</p>
                <div class="text-center">
                    <a href="{{ route('task.add') }}" class="inline-block bg-green-500 text-white rounded px-10 py-3">{{ __('Create task') }}</a>
                </div>
            </div>
        @else
            @include('components.notices')
            <div class="rounded p-5 bg-white mb-3">
                <h3 class="text-2xl mb-4">{{ __('Generate report') }}</h3>
                <form action="{{ route('report.generate') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-4 gap-4">
                        <div>
                            <label for="date-from" class="sr-only">{{ __('Date from') }}</label>
                            <input
                                id="date-from"
                                name="from"
                                type="text"
                                class="relative block w-full appearance-none rounded border border-gray-300 px-3 py-2"
                                value="{{ old('from') }}"
                                placeholder="{{ __('Date from') }}">
                            <small>{{ __('Date must be in Y-m-d format.') }}</small>
                            @error('from')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="date-to" class="sr-only">{{ __('Date to') }}</label>
                            <input
                                id="date-to"
                                name="to"
                                type="text"
                                class="relative block w-full appearance-none rounded border border-gray-300 px-3 py-2"
                                value="{{ old('to') }}"
                                placeholder="{{ __('Date to') }}">
                            <small>{{ __('Date must be in Y-m-d format.') }}</small>
                            @error('to')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="report-type" class="sr-only">{{ __('Report type') }}</label>
                            <select
                                id="report-type"
                                name="report_type"
                                class="relative block w-full appearance-none rounded border border-gray-300 px-3 py-2"
                                placeholder="{{ __('Report type') }}">
                                <option value="">Report type</option>
                                @foreach($reports as $id => $report)
                                    <option value="{{ $id }}" {{ $id === (int)old('report_type') ? 'selected' : '' }}>
                                        {{ $report }}
                                    </option>
                                @endforeach
                            </select>
                            @error('report_type')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <button
                                type="submit"
                                class="w-full rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-white">
                                {{ __('Generate') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="rounded p-5 bg-white">
                <div class="flex justify-between mb-4 items-center">
                    <h1 class="text-3xl">{{ __('All tasks') }}</h1>
                    <a href="{{ route('task.add') }}" class="inline-block bg-green-500 text-white rounded px-10 py-3">{{ __('Create task') }}</a>
                </div>
                <hr>
                <table class="table-auto w-full">
                    <tr>
                        <th class="text-start px-4 py-2">{{ __('Task title') }}</th>
                        <th class="w-1/2 text-start px-4 py-2">{{ __('Task comment') }}</th>
                        <th class="text-start px-4 py-2">{{ __('Task date') }}</th>
                        <th class="text-center px-4 py-2">{{ __('Time spent, mins') }}</th>
                    </tr>
                    @foreach($tasks as $task)
                        <tr>
                            <td class="text-start px-4 py-2">{{ $task->title }}</td>
                            <td class="text-start px-4 py-2">{{ $task->comment }}</td>
                            <td class="text-start px-4 py-2">{{ $task->date }}</td>
                            <td class="text-center">{{ $task->minutes_spent }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="pagination mt-3">
                {{ $tasks->links() }}
            </div>
        @endif
    </div>
@stop
