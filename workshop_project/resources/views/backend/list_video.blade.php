@extends('backend/layouts.template')
@section('content')
<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
    <div class="mdc-card p-0">
        <h6 class="card-title card-padding pb-0 border-bottom">List Video</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-left">#</th>
                        <th>Judul Video</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection
