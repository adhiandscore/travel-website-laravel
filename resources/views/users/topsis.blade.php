@extends('layouts.topsis')

@section('contentTopsis')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Preferensi Perjalanan Anda</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>Preferensi User</h4>
                    <table class="table">
                        <tr>
                            <th>Level Member</th>
                            <td>{{ auth()->user()->level ?? 'Belum diatur' }}</td>
                        </tr>
                        <tr>
                            <th>Lokasi Preferensi</th>
                            <td>{{ auth()->user()->location ?? 'Belum diatur' }}</td>
                        </tr>
                        <tr>
                            <th>Tipe Perjalanan</th>
                            <td>{{ auth()->user()->type ?? 'Belum diatur' }}</td>
                        </tr>
                        <tr>
                            <th>Maksimum Harga</th>
                            <td>Rp {{ number_format(auth()->user()->max_price ?? 0, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Minimum Durasi</th>
                            <td>{{ auth()->user()->min_duration ?? 0 }} hari</td>
                        </tr>
                    </table>
                </div>

                @if(isset($rankedPackages))
                <div class="col-md-6">
                    <h4>Rekomendasi Paket Travel</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Ranking</th>
                                    <th>Tipe</th>
                                    <th>Level</th>
                                    <th>Lokasi</th>
                                    <th>Fasilitas</th>
                                    <th>Durasi</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rankedPackages as $index => $package)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $package->type }}</td>
                                    <td>{{ $package->level }}</td>
                                    <td>{{ $package->location }}</td>
                                    <td>{{ $package->facility }}</td>
                                    <td>{{ $package->duration }} hari</td>
                                    <td>Rp {{ number_format($package->price, 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>

            @if(isset($error))
            <div class="alert alert-warning">
                {{ $error }}
            </div>
            @endif

            
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .card {
        margin-top: 20px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    .table th {
        background-color: #f8f9fa;
    }
</style>
@endsection
