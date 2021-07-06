@extends('frontend/layouts.template')
@section('content')
<div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Donate</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- popular_causes_area_start  -->
<div class="popular_causes_area pt-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6">
                <div class="single_cause">
                    <div class="thumb">
                        <img src="{{ asset('images/'.$donasi->banner)}}" alt="">
                    </div>
                    <div class="causes_content">
                        <div class="custom_progress_bar">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100"
                                    aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('donasi',$donasi->id)}}">
                            <h2>{{ $donasi->nama_donasi }}</h2>
                        </a>
                        <h4>{{ $donasi->penerima }}</h4>
                        <form action="{{ route('donate') }}" method="post">
                            {!! csrf_field() !!}
                            <input type="hidden" name="donasi" value="1">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nominal">Nominal</label>
                                <input type="text" name="nominal" id="nominal" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Donate</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection