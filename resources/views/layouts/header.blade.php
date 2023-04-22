<header class="mb-6 p-6 bg-white dark:bg-gray-800">
    <h1><a href="{{ route('home') }}" class="no-underline">{{ config('app.name') }}</a></h1>

    <div></div>

    <div class="mt-3 flex flex-row gap-2">
        <a href="https://github.com/pop-culture-studio" class="text-black dark:text-white no-underline inline-flex" target="_blank">
            <x-icon.github/>
        </a>
        <a href="{{ url('feed') }}" class="text-black dark:text-white no-underline inline-flex" target="_blank">
            <x-icon.rss/>
        </a>
    </div>
</header>
