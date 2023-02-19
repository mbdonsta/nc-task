<div class="relative bg-white">
    <div class="px-6">
        <div class="flex items-center justify-between py-6 md:justify-start md:space-x-10">
            <div class="flex lg:w-0 lg:flex-1">
                <a href="#" class="text-4xl">{{ __('Tasker') }}</a>
            </div>
            <form class="inline" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="hover:underline p-3">{{ __('Logout') }}</button>
            </form>
        </div>
    </div>
</div>
