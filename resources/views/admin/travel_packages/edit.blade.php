@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between">
                    <h1 class="m-0">Edit Paket Wisata</h1>
                    <a href="{{ route('admin.travel_packages.index') }}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> </a>
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
                    <div class="card">
                        <div class="card-body p-0">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($travel_package->galleries as $gallery)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $gallery->name }}</td>
                                        <td>
                                            <a href="{{ Storage::url($gallery->images) }}" target="_blank">
                                                <img width="100" src="{{ Storage::url($gallery->images) }}" alt="{{ $gallery->name }}">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.travel_packages.galleries.edit', [$travel_package,$gallery]) }}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> </a>
                                            <form onclick="return confirm('are you sure ?');" class="d-inline-block" action="{{ route('admin.travel_packages.galleries.destroy', [$travel_package,$gallery]) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="4">Gallery Kosong</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card p-3">
                        <form method="post" action="{{ route('admin.travel_packages.galleries.store', [$travel_package]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row border-bottom pb-4">
                                <label for="name" class="col-sm-2 col-form-label">Nama Destinasi</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name" placeholder="example: Kuta">
                                </div>
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="images" class="col-sm-2 col-form-label">Images</label>
                                <div class="col-sm-10">
                                <input type="file" class="form-control" name="images" value="{{ old('images') }}" id="images">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>

                    <div class="card p-3">
                        <form method="post" action="{{ route('admin.travel_packages.update', [$travel_package]) }}">
                            @csrf
                            @method('put')
                            <div class="form-group row border-bottom pb-4">
                                <label for="type" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="type" value="{{ old('type', $travel_package->type) }}" id="type" placeholder="example: Paket Wisata Bali">
                                </div>
                            </div>
                            
                            <div class="form-group row border-bottom pb-4">
                                <label for="Location" class="col-sm-2 col-form-label">Lokasi</label>
                                <div class="col-sm-10">
                                <input text="text" class="form-control" id="Location" name="location" value="{{ old('location', $travel_package->location) }}" placeholder="example: Bali, Indonesia">
                                </div>
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="destination" class="col-sm-2 col-form-label">Destinasi</label>
                                <div class="col-sm-10">
                                <input text="text" class="form-control" id="destination" name="destination" value="{{ old('destination', $travel_package->destination) }}" placeholder="example: pusat perbelanjaan, konser">
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="facility" class="col-sm-2 col-form-label">Fasilitas</label>
                                <div class="col-sm-10">
                                <input text="number" class="form-control" id="facility" name="facility" value="{{ old('facility', $travel_package->facility) }}" placeholder="facility">
                                </div>
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="acomodation" class="col-sm-2 col-form-label">Akomodasi</label>
                                <div class="col-sm-10">
                                <input text="text" class="form-control" id="acomodation" name="acomodation" value="{{ old('acomodation', $travel_package->acomodation) }}" placeholder="acomodation">
                                </div>
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="duration" class="col-sm-2 col-form-label">Durasi</label>
                                <div class="col-sm-10">
                                <input text="text" class="duration" id="duration" name="duration" value="{{ old('duration', $travel_package->duration) }}" placeholder="duration">
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="price" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-10">
                                <input text="number" class="form-control" id="price" name="price" value="{{ old('price', $travel_package->price) }}" placeholder="example: 300">
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="description" name="type" id="description" cols="30" rows="7" placeholder="Description text...">{{ old('description', $travel_package->description) }}</textarea>
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
                            <button type="submit" class="btn btn-success">Save</button>
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
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
