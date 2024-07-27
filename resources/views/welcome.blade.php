@extends('layouts.UserTemplate')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts/dist/apexcharts.css">
@endsection

@section('content')
<div class="container">
  <h2>Monthly Revenue Chart</h2>
  <div id="chart"></div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var options = {
      chart: {
        type: 'bar',
        height: 350
      },
      series: [{
        name: 'Total Revenue',
        data: $total,
      }],
      xaxis: {
        categories: $months,
        title: {
          text: 'Month'
        }
      },
      yaxis: {
        title: {
          text: 'Revenue'
        }
      },
      title: {
        text: 'Monthly Revenue',
        align: 'center'
      }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
  });
</script>
@endsection