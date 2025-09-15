<x-layouts.app>
    <x-slot name="header">
        <x-h2>
            {{ __('Email List') }}
        </x-h2>
    </x-slot>

    <x-card class="space-y-6">
        @unless ($emailLists->isEmpty() && empty($search))
        <div class="flex items-center justify-between">
            <x-nav-link :href="route('emailList.create')">
                {{ __('Create email list') }}
            </x-nav-link>
             <x-text-input id="title" class="block mt-1 w-1/4" placeholder="Search" type="text" name="search" :value="$search" required autofocus />
        </div>
        <x-table :headers="['id','name','count','acoes']" :items="$emailLists" />
        @else
        <div class="flex items-center justify-center">
            <x-nav-link :href="route('emailList.create')">
                {{ __('Create email list') }}
            </x-nav-link>
        </div>
        @endunless
    </x-card>
</x-layouts.app>