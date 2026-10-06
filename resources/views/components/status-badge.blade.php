@props(['status'])

@php
    // Menentukan warna badge berdasarkan nilai status
    $theme = match(strtolower($status)) {
        'aktif' => 'bg-green-100 text-green-800',
        'non-aktif', 'nonaktif' => 'bg-red-100 text-red-800',
        default => 'bg-gray-100 text-gray-800',
    };
@endphp

<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $theme }}">
    {{ ucfirst($status) }}
</span>