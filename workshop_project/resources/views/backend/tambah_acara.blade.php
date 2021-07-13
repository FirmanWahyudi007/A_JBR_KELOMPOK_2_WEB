@extends('backend/layouts.template')
@section('titlepage')
    Acara
@endsection
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Tambah Yayasan</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @if ($errors->any())
    <div class="alert alert-danger" style="margin-top: 10px">
        <strong>Whoops!</strong> Ada Masalah dengan input anda.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ isset($acara)? route('acara.update',$acara->id) :route('acara.store') }}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        {!! isset($acara) ? method_field('PUT'):'' !!}
        <input type="hidden" name="id" value="{{ isset($acara) ? $acara->id : '' }}"> <br>
        <div class="card-body">
            <div class="form-group">
                <label for="acara">Acara</label>
                <input type="text" class="form-control" name="acara" id="acara" placeholder="Masukkan Nama Acara" value="{{ isset($acara) ? $acara->nama_acara : Request::old('acara') }}">
            </div>
            <div class="form-group">
                <label for="acara">Jam</label>
                <input type="time" class="form-control" name="jam" id="jam" placeholder="Masukkan Nama Acara" value="{{ isset($acara) ? $acara->jam_acara : Request::old('jam') }}">
            </div>
            <div class="form-group">
                <label>Date:</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal"value="{{ isset($acara) ? $acara->tanggal_acara : Request::old('tanggal') }}">
            </div>
            <div class="form-group">
                <label for="acara">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10">{{ isset($acara) ? $acara->deskripsi_acara : Request::old('deskripsi') }}</textarea>
            </div>
            <div class="form-group">
                <label for="acara">Link Acara</label>
                <input type="text" class="form-control" name="link" id="link" placeholder="Masukkan Nama Acara" value="{{ isset($acara) ? $acara->link_acara : Request::old('link') }}">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Thumbnail</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="thumbnail" onchange="previewFile(this)">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
            </div>
            <img id="previewImg"
                    src="{{ isset($acara) ? asset('images/thumbnail/'.$acara->thumbnail) : asset('images/default.png') }}"
                    alt="profile image" style="max-width: 130px; margin-top:20px;">
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
@push('js')
<!-- bs-custom-file-input -->
<script src="{{asset('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>
<script>
    function previewFile(input) {
        var file = $("input[type=file]").get(0).files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function () {
                $('#previewImg').attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush