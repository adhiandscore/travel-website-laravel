<div class="current-rating">
  <h3>Rating Saat Ini:</h3>
  @if($travel_package->rating)
    <div class="stars">
      @for ($i = 1; $i <= $travel_package->rating; $i++)
        <i class="fas fa-star"></i>
      @endfor
    </div>
  @else
    <h4>"Belum ada rating"</h4>
  @endif
</div>
