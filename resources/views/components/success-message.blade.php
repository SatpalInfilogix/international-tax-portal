@props(['message'])

@if ($message)
    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 7000)"
        class="p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 text-sm">{{ $message }}</p>
@endif
