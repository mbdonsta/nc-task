@if (session()->has('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">{{ __('Success!') }}</span> {{ session()->get('success') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="p-4 mb-4 text-sm text-white rounded-lg bg-red-400" role="alert">
        <span class="font-medium">{{ __('Error!') }}</span> {{ session()->get('error') }}
    </div>
@endif
