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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left">1</td>
                        <td>Yayasan Nanda Delisha</td>
                        <td>Tamansari, Kec. Bondowoso, Kabupaten Bondowoso</td>
                        <td>02123546450</td>
                    </tr>
                    <tr>
                        <td class="text-left">2</td>
                        <td>Rumah Belajar Autis Sarwahita</td>
                        <td>Peguyangan, Kec. Denpasar Utara, Kota Denpasar, Bali</td>
                        <td>02168029431</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
