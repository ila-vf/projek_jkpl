@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-xs font-semibold dark:text-white']) }}>
    {{ $value ?? $slot }}
</label>
