<div class="contact-form">
  <h2 class="form-title">Booking Sekarang</h2>
  <form action="{{ route('booking.store') }}" method="POST">
    @csrf
    <div class="form-row">
      <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" name="name" class="form-control" required />
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" required />
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label for="number_phone">No. HP</label>
        <input type="text" name="number_phone" class="form-control" required />
      </div>
      <div class="form-group">
        <label for="date">Tanggal</label>
        <input type="date" name="date" class="form-control" required />
      </div>
    </div>
    <div class="form-group">
      <label for="travel_package_id">Paket Wisata</label>
      <input type="hidden" name="travel_package_id" value="{{ $travel_package->id }}" />
      <p>{{ $travel_package->location }}, <span>{{ $travel_package->level }}</span></p>
    </div>
    <button type="submit" class="btn btn-booking">Booking Sekarang</button>
  </form>
</div>