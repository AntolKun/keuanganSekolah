@extends('layouts.UserTemplate')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@latest/dist/apexcharts.css">
@endsection

@section('content')
<div class="container mt-5">
  <h4 class="mb-4">Pendapatan dan Pengeluaran</h4>
  <div id="donut-chart"></div>
  <!-- Debugging: Tampilkan nilai pendapatan dan pengeluaran -->
  <p>Pendapatan: Rp. {{ number_format($totalRevenue, 2, ',', '.') }}</p>
  <p>Pengeluaran: Rp. {{ number_format($totalExpenses, 2, ',', '.') }}</p>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // console.log('Total Revenue:', <?php echo $totalRevenue; ?>);
    // console.log('Total Expenses:', <?php echo $totalExpenses; ?>);

    var options = {
      series: [<?php echo $totalRevenue; ?>, <?php echo $totalExpenses; ?>],
      chart: {
        type: 'donut',
        height: 350
      },
      labels: ['Pendapatan', 'Pengeluaran'],
      colors: ['#00E396', '#FF4560'],
      plotOptions: {
        pie: {
          donut: {
            size: '75%'
          }
        }
      },
      dataLabels: {
        enabled: true
      },
      legend: {
        position: 'bottom'
      },
      responsive: [{
        breakpoint: 480,
        options: {
          chart: {
            width: 300
          },
          legend: {
            position: 'bottom'
          }
        }
      }]
    };

    var chart = new ApexCharts(document.querySelector("#donut-chart"), options);
    chart.render();
  });
</script>
@endsection