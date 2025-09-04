<x-layouts.app>
    <x-slot name="header">
       <x-h2>
             {{ __('Email List') }}
       </x-h2>
    </x-slot>

    <x-card>
        @forelse ($emailLists as $item)
        @empty
            <div class="flex items-center justify-center">
                <x-nav-link :href="route('emailList.create')">
                    {{ __('Create email list') }}
                </x-nav-link>
            </div>
        @endforelse
    </x-card>
</x-layouts.app>
