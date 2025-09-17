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
            <x-form class="flex gap-3 items-center justify-center" x-data x-ref="form">
                <span class="flex items-center gap-3">
                    <input id="checkboxPrimary" @click='$refs.form.submit()' type="checkbox"
                        class="before:content[''] peer relative size-4 appearance-none overflow-hidden rounded-sm border border-outline bg-surface-alt before:absolute before:inset-0 checked:border-primary checked:before:bg-primary focus:outline-2 focus:outline-offset-2 focus:outline-outline-strong checked:focus:outline-primary active:outline-offset-0 disabled:cursor-not-allowed dark:border-outline-dark dark:bg-surface-dark-alt dark:checked:border-primary-dark dark:checked:before:bg-primary-dark dark:focus:outline-outline-dark-strong dark:checked:focus:outline-primary-dark" />
                    <p>Trashed</p>
                </span>
                <x-text-input id="title" class="block mt-1 w-full" placeholder="Search" type="text" name="search"
                    :value="$search" autofocus />

            </x-form>
        </div>

        <x-table :headers="['ID','Name','email','Actions']" :items="$subscribers">
            <x-slot name="body">
                @foreach ($subscribers as $subscriber)
                <tr class="even:bg-black/5 dark:even:bg-white/10">
                    <td class="p-4">{{ $subscriber->id }}</td>
                    <td class="p-4">{{ $subscriber->name }}</td>
                    <td class="p-4">{{ $subscriber->email }}</td>
                    <td class="p-4">
                        <x-form :action='route("subscriber.destroy",$subscriber)' delete>
                            <x-primary-button type="submit">{{__('Delete')}}</x-primary-button>
                        </x-form>
                    </td>
                </tr>
                @endforeach
            </x-slot>
        </x-table>
    </x-card>
</x-layouts.app>