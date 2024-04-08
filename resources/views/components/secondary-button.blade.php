<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-8 py-2 bg-white border border-green-500 rounded-full font-semibold text-green-500 tracking-widest shadow-sm disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
