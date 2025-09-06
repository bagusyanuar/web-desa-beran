<select
    {{ $attributes->merge(['class' => 'w-full border border-neutral-300 text-md p-[0.5rem] rounded-lg focus:outline-none focus:ring-0 focus:border-neutral-500']) }}
    x-bind="select2Bind">
    {{ $slot }}
</select>
