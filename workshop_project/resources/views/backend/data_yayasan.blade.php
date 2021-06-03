@extends('backend/layouts.template')
@section('content')
<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
    <div class="mdc-card p-0">
        <h6 class="card-title card-padding pb-0 border-bottom">Data Yayasan</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-left">#</th>
                        <th>Nama Yayasan</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($yayasan as $item)   
                    <tr>
                        <td>{{ $item->nama_yayasan }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->no_telp }}</td>
                        <td>
                            <div>
                                <form action="{{ route('yayasan.destroy',$item->id) }}" method="POST">
                                <a href="{{ route('yayasan.edit',$item->id) }}" class="btn btn-warning">
                                <i class="fa fa-edit"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Pakah Anda Yakin Ingin Menghapus Data Ini?')">
                                <i class="fa fa-trash-o"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                   @endforeach                
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
