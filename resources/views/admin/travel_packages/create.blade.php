@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between">
                    <h1 class="m-0">Tambah Peket Wisata</h1>
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
                    <div class="card p-3">
                        <form method="post" action="{{ route('admin.travel_packages.store') }}">
                            @csrf
                            <div class="form-group row border-bottom pb-4">
                                <label for="type" class="col-sm-2 col-form-label">Tipe</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="type" value="{{ old('type') }}" id="type" placeholder="example: 4D5N">
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="type" class="col-sm-2 col-form-label">Kelas</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="level" value="{{ old('level') }}" id="level" placeholder="Paket Gold, Paket Silver, Paket Bronze">
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="Location" class="col-sm-2 col-form-label">Lokasi</label>
                                <div class="col-sm-10">
                                <input text="text" class="form-control" id="Location" name="location" value="{{ old('location') }}" placeholder="example: Bali, Indonesia">
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="facility" class="col-sm-2 col-form-label">Fasilitas</label>
                                <div class="col-sm-10">
                                <input text="number" class="form-control" id="facility" name="facility" value="{{ old('facility') }}" placeholder="Fasilitas">
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="duration" class="col-sm-2 col-form-label">Durasi</label>
                                <div class="col-sm-10">
                                <input text="number" class="form-control" id="duration" name="duration" value="{{ old('duration') }}" placeholder="duration">
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="price" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-10">
                                <input text="number" class="form-control" id="price" name="price" value="{{ old('price') }}" placeholder="example: 300">
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="description" name="type" id="description" cols="30" rows="7" placeholder="Description text...">{{ old('description') }}</textarea>
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
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
