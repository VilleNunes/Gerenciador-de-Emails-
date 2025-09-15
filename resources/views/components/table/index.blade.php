@props(['headers', 'items'])

<div class="overflow-hidden w-full overflow-x-auto rounded-sm border border-neutral-300 dark:border-neutral-700">
    <table class="w-full text-left text-sm text-neutral-600 dark:text-neutral-300">
        <thead
            class="border-b border-neutral-300 bg-neutral-50 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">
            <tr>
               @foreach ($headers as $header)
                <th scope="col" class="px-6 py-4">{{ $header }}</th>
               @endforeach
            </tr>
        </thead>
        <tbody class="divide-y divide-neutral-300 dark:divide-neutral-700">

            @foreach ($items as $item)
            <tr class="even:bg-black/5 dark:even:bg-white/10">
                <td class="p-4">{{ $item->id }}</td>
                <td class="p-4">{{$item->title}}</td>
                <td class="p-4">alice.brown@penguinui.com</td>
                <td class="p-4"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>