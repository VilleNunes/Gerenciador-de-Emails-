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
            <x-form>
                <x-text-input id="title" class="block mt-1 w-full" placeholder="Search" type="text" name="search"
                    :value="$search" required autofocus />
            </x-form>
        </div>
        <x-table :headers="['id','name','count','acoes']" :items="$emailLists" />
        <x-slot name="body">
            @foreach ($emailLists as $emailList)
            <tr class="even:bg-black/5 dark:even:bg-white/10">
                <td class="p-4">{{ $emailList->id }}</td>
                <td class="p-4">{{ $emailList->title }}</td>
                <td class="p-4">{{ $emailList->subscribers_count }}</td>
                <td class="p-4">
                    <x-nav-link :href="route('emailList.show', $emailList)">
                        {{ __('View') }}
                    </x-nav-link>
                </td>
            </tr>
            @endforeach
        </x-slot>        
        <x-table/>
        @else
        <div class="flex items-center justify-center">
            <x-nav-link :href="route('emailList.create')">
                {{ __('Create email list') }}
            </x-nav-link>
        </div>
        @endunless
    </x-card>
</x-layouts.app>