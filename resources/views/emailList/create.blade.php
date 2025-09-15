<x-layouts.app>
    <x-slot name="header">
       <x-h2>
             {{ __('Email List > Create') }}
       </x-h2>
    </x-slot>

    <x-card>
       <x-form post>
        <div>
            <x-input-label for="name" :value="__('Title')" />

            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
         <div>
            <x-input-label for="file" :value="__('Email List')" />

            <x-text-input id="file" type='file' class="block mt-1 p-2 w-full"   :value="old('file')" required autofocus />

            <x-input-error :messages="$errors->get('file')" class="mt-2" />
        </div>

       

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Create') }}
            </x-primary-button>
        </div>
       </x-form>
    </x-card>
</x-layouts.app>
