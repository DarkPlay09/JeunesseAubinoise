@props([
    'title',
    'label',
    'description',
    'image',
    'href' => '#',
    'variant' => 'storm',
])

<a href="{{ $href }}" class="group relative flex min-h-[430px] overflow-hidden rounded-3xl bg-safari-dark md:min-h-[520px]">
    <img
        src="{{ $image }}"
        alt="{{ $title }}"
        class="absolute inset-0 h-full w-full object-cover opacity-65 transition duration-700 group-hover:scale-105"
    >
    <span class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/45 to-transparent"></span>

    <div class="relative z-10 mt-auto w-full p-7 md:p-10">
        <span @class([
            'ja-label inline-flex rounded-full px-4 py-2 font-bold',
            'bg-white text-black' => $variant === 'safari',
            'bg-storm-blue text-white' => $variant !== 'safari',
        ])>
            {{ $label }}
        </span>

        <h3 class="mt-6 font-display text-3xl font-bold text-white md:text-5xl">
            {{ $title }}
        </h3>

        <p class="mt-4 max-w-md text-base leading-7 text-surface-variant">
            {{ $description }}
        </p>

        <span class="mt-8 inline-flex items-center gap-2 text-sm font-bold uppercase tracking-[0.1em] text-white transition group-hover:text-storm-blue">
            En savoir plus
            <span class="material-symbols-outlined transition group-hover:translate-x-1">arrow_forward</span>
        </span>
    </div>
</a>
