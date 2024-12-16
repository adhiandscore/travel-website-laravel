@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between">
                    <h1 class="m-0">Tambah Peket Wisata</h1>
                    <a href="{{ route('admin.travel_packages.index') }}" class="btn btn-primary"> <i
                            class="fa fa-arrow-left"></i> </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card p-3">
                        <form method="post" action="{{ route('admin.travel_packages.store') }}">
                            @csrf
                            <div class="form-group row border-bottom pb-4">
                                <label for="type" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="type" id="type"
                                        value="{{ old('type') }}" placeholder="example: Paket Wisata Bali">
                                </div>
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="location" class="col-sm-2 col-form-label">Lokasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="location" id="location"
                                        value="{{ old('location') }}" placeholder="Exp: Bali, Lombok, Jogja">
                                </div>
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="destination" class="col-sm-2 col-form-label">Destinasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="destination" id="destination"
                                        value="{{ old('destination') }}" placeholder="Exp:Pantai, Pusat Belanja, Konser">
                                </div>
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="facility" class="col-sm-2 col-form-label">Fasilitas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="facility" id="facility"
                                        value="{{ old('facility') }}" placeholder="Exp: karaoke, bus ac, asuransi dll">
                                </div>
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="acomodation" class="col-sm-2 col-form-label">Akomodasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="acomodation" id="acomodation"
                                        value="{{ old('acomodation') }}" placeholder="Exp: Hotel, penginapan dll">
                                    
                                </div>
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="duration" class="col-sm-2 col-form-label">Durasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="duration" id="duration"
                                        value="{{ old('duration') }}" placeholder="Contoh 1 hari 1 malam">
                                </div>
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="price" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="price" id="price"
                                        value="{{ old('price') }}" placeholder="Harga dalam Rupiah (contoh: 5000000)">
                                </div>
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="7"
                                        placeholder="Masukkan deskripsi lengkap...">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="consumption" class="col-sm-2 col-form-label">Konsumsi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="consumption" id="consumption"
                                        value="{{ old('consumption') }}" placeholder="Exp: 3 Meals/Day">
                                </div>
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="souvenir" class="col-sm-2 col-form-label">Souvenir</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="souvenir" id="souvenir"
                                        value="{{ old('souvenir') }}" placeholder="Exp: T-Shirt, Keychain">
                                </div>
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="documentation" class="col-sm-2 col-form-label">Dokumentasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="documentation" id="documentation"
                                        value="{{ old('documentation') }}" placeholder="Exp: Photo, Video">
                                </div>
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="seat_capacity" class="col-sm-2 col-form-label">Jumlah Kursi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="seat_capacity" id="seat_capacity"
                                        value="{{ old('seat_capacity') }}"
                                        placeholder="Jumlah kursi yang tersedia (contoh: 20)">
                                </div>
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="bonus" class="col-sm-2 col-form-label">Bonus</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="bonus" id="bonus"
                                        value="{{ old('bonus') }}" placeholder="Exp: Free Spa, Free Ticket">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>

                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

@section('styles')
    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
