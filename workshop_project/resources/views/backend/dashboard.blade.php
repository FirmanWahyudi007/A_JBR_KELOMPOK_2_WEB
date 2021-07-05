@extends('backend/layouts.template')
@section('titlepage')
    Dashboard
@endsection
@section('content')
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ $donasi }}</h3>
        <p>Donasi</p>
      </div>
      <div class="icon">
        <i class="fas fa-donate"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{ $yayasan }}</h3>
        <p>Yayasan</p>
      </div>
      <div class="icon">
        <i class="fas fa-building"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{ $video }}</h3>
        <p>Video</p>
      </div>
      <div class="icon">
        <i class="fas fa-video"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>{{ $artikel }}</h3>
        <p>Artikel</p>
      </div>
      <div class="icon">
        <i class="fas fa-edit"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-7 col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-chart-pie mr-1"></i>
          Donasi
        </h3>
      </div>
      <div class="card-body">
        <div class="tab-content p-0">
          <canvas id="canvas" height="300" style="height: 300px;"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('css')
    <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endpush
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
  var year = <?php echo $year; ?>;
  var chart = <?php echo $chart; ?>;
  var barChartData = {
      labels: year,
      datasets: [{
          label: 'Donasi',
          backgroundColor: "aquamarine",
          data: chart
      }]
  };

  window.onload = function() {
      var ctx = document.getElementById("canvas").getContext("2d");
      window.myBar = new Chart(ctx, {
          type: 'bar',
          data: barChartData,
          options: {
              elements: {
                  rectangle: {
                      borderWidth: 2,
                      borderColor: '#c1c1c1',
                      borderSkipped: 'bottom'
                  }
              },
              responsive: true,
              title: {
                  display: true,
                  text: 'Yearly User Joined'
              }
          }
      });
  };
</script>
@endpush