@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-[#626F47] dark:border-[#AEC8A4] text-start text-base font-medium text-[#3B3B1A] dark:text-[#E7EFC7] bg-[#AEC8A4]/20 dark:bg-[#3B3B1A]/40 focus:outline-none focus:border-[#8A784E] dark:focus:border-[#E7EFC7] transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-400 dark:text-gray-400 hover:text-[#AEC8A4] dark:hover:text-[#AEC8A4] hover:bg-[#E7EFC7]/10 dark:hover:bg-[#E7EFC7]/10 hover:border-[#626F47] dark:hover:border-[#8A784E] focus:outline-none focus:text-[#3B3B1A] dark:focus:text-[#AEC8A4] focus:border-[#626F47] dark:focus:border-[#8A784E] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>