<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-outline-primary me-2']) }}>
    {{ $slot }}
</button>
