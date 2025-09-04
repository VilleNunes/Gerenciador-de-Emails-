<x-layouts.app>
    <x-slot name="header">
       <x-h2>
             {{ __('Email List Create') }}
       </x-h2>
    </x-slot>

    <x-card>
        @forelse ($emailLists as $item)
        @empty
           
        @endforelse
    </x-card>
</x-layouts.app>
