<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-2 bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800 rounded-full font-semibold text-white tracking-widest transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
