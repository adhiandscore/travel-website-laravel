<section class="rating-section py-8">
  <div class="rating-container mx-auto max-w-lg">
    <div class="card rating-card bg-white shadow-md rounded-lg p-6">
      <form action="{{ route('travel_packages.rate', $travel_package->id) }}" method="POST" class="rating-form flex flex-col items-center">
        @csrf
        <div class="flex gap-2">
          @for ($i = 5; $i >= 1; $i--)
          <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" required class="hidden" />
          <label for="star{{ $i }}" class="text-gray-400 text-2xl hover:text-secondary transition-colors cursor-pointer">
            <i class="fas fa-star"></i>
          </label>
          @endfor
        </div>
        <button type="submit" class="mt-4 bg-primary text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">Rate</button>
      </form>
      @if ($errors->any())
      <div class="alert alert-danger mt-4 bg-red-100 text-red-700 p-4 rounded">
        {{ $errors->first() }}
      </div>
      @endif
    </div>
  </div>
</section>