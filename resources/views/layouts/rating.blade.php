@props(['rating'])

<div class="rating">
    @for ($i = 0; $i < 5; $i++)
        @if ($i < $rating)
            <i class="fas fa-star text-warning"></i> {{-- Bintang penuh --}}
        @else
            <i class="far fa-star text-warning"></i> {{-- Bintang kosong --}}
        @endif
    @endfor
</div>