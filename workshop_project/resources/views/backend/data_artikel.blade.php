@extends('backend/layouts.template')
@section('content')
<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
    <div class="mdc-card p-0">
        <h6 class="card-title card-padding pb-0 border-bottom">Data Donasi</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-left">#</th>
                        <th>Url</th>
                        <th>Sampul</th>
                        <th>Judul</th>
                        <th>Isi Artikel</th>
                        <th>Tanggal</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['artikel'] as $artikel)
                    <tr>
                        <td>{{ $artikel->id}}</td>
                        <td>{{ $artikel->url_artikel}}</td>
                        <td>{{ $artikel->sampul}}</td>
                        <td>{{ $artikel->judul_artikel}}</td>
                        <td>{{ $artikel->isi_artikel}}</td>
                        <td>{{ $artikel->tanggal}}</td>
                        <td><a href="{{route('artikel.edit', $artikel->id)}}"><i class="fa fa-edit"></i> Edit</a>
                        <form action="{{route('artikel.destroy', $artikel->id)}}" method="post">
                    @csrf
                    @method('delete')
                        <button class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda ingin menghapusnya ?')"><i class="fa fa-trash"></i> Hapus</button>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
