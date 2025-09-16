<x-layouts.app>
    <x-slot name="header">
        <x-h2>
            {{ __('Email List') }} > {{ $emailList->title ?? 'Subscribers' }}
        </x-h2>
    </x-slot>

    <x-card class="space-y-6">
        <div class="flex items-center justify-between">
            <x-nav-link :href="route('subscribers.create')">
                {{ __('Create subscriber') }}
            </x-nav-link>
            <x-form>
                <x-text-input id="title" class="block mt-1 w-full" placeholder="Search" type="text" name="search"
                    :value="$search" autofocus />
            </x-form>
        </div>

        <x-table :headers="['ID','Name','#Subscribers','Actions']" :items="$subscribers">
            <x-slot name="body">
                @foreach ($subscribers as $subscriber)
                <tr class="even:bg-black/5 dark:even:bg-white/10">
                    <td class="p-4">{{ $subscriber->id }}</td>
                    <td class="p-4">{{ $subscriber->name }}</td>
                    <td class="p-4">{{ $subscriber->email }}</td>
                    <td class="p-4">
                    </td>
                </tr>
                @endforeach
            </x-slot>
        </x-table>
    </x-card>
</x-layouts.app>