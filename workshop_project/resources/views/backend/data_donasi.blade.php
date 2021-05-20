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
                        <th>Tanggal</th>
                        <th>Nama Donasi</th>
                        <th>Penerima</th>
                        <th>Dana Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left">1</td>
                        <td>05/01/2021</td>
                        <td>Donasi untuk Yayasan Nanda Delisha</td>
                        <td>Yayasan Nanda Delisha</td>
                        <td>Rp.5,958,104.00</td>
                    </tr>
                    <tr>
                        <td class="text-left">2</td>
                        <td>17/02/2021</td>
                        <td>Anak-anak Dengan Autisme Perlu Sekolah</td>
                        <td>Anak - anak Autisme</td>
                        <td>Rp.4,500,000.00</td>
                    </tr>
                    <tr>
                        <td class="text-left">3</td>
                        <td>03/03/2021</td>
                        <td>Donasi Untuk Rumah Belajar Autis Sarwahita</td>
                        <td>Rumah Belajar Autis Sarwahita</td>
                        <td>Rp.10,500,000.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
