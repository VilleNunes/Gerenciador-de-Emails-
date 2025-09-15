<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div {{ $attributes->class([
                'p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700',
            ]) }}>
               {{$slot}}
            </div>
        </div>
    </div>
</div>
