@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
  <h1>Seja bem vindo(a) {{{ Auth::user()->name }}}!</h1>

  <!-- Icon Cards-->
  <div class="row">
    <div class="col-sm-3">
      <div class="alert alert-white alert-outline">
        <div class="alert-message">
          <h3>26 alunos matriculados</h3>
          <hr>
          <button class="btn btn-primary btn-small">Ver detalhes</button>
        </div>
      </div>
    </div>

    <div class="col-sm-3">
      <div class="alert alert-white alert-outline">
        <div class="alert-message">
          <h3>11 alunos transferidos</h3>
          <hr>
          <button class="btn btn-primary btn-small">Ver detalhes</button>
        </div>
      </div>
    </div>

    <div class="col-sm-3">
      <div class="alert alert-white alert-outline">
        <div class="alert-message">
          <h3>123 turmas</h3>
          <hr>
          <button class="btn btn-primary btn-small">Ver detalhes</button>
        </div>
      </div>
    </div>

    <div class="col-sm-3">
      <div class="alert alert-white alert-outline">
        <div class="alert-message">
          <h3>13 atendimentos</h3>
          <hr>
          <button class="btn btn-primary btn-small">Ver detalhes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Area Chart Example-->
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header card-header-inverse">
          <div class="card-header-title">
            <h4>Matrículas nos últimos 6 meses</h4>
            Atualizado quarta feira às 11:59 PM
          </div>
        </div>
        <div class="card-body">
          <canvas id="myAreaChart" width="100%" height="15"></canvas>
        </div>
      </div>
    </div>
  </div>

@endsection


@section('js')
  <script>
    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["Mar 1", "Mar 2", "Mar 3", "Mar 4", "Mar 5", "Mar 6", "Mar 7", "Mar 8", "Mar 9", "Mar 10", "Mar 11", "Mar 12", "Mar 13"],
        datasets: [{
          label: "Sessions",
          lineTension: 0.3,
          backgroundColor: "rgba(2,117,216,0.2)",
          borderColor: "rgba(2,117,216,1)",
          pointRadius: 5,
          pointBackgroundColor: "rgba(2,117,216,1)",
          pointBorderColor: "rgba(255,255,255,0.8)",
          pointHoverRadius: 5,
          pointHoverBackgroundColor: "rgba(2,117,216,1)",
          pointHitRadius: 50,
          pointBorderWidth: 2,
          data: [10000, 30162, 26263, 18394, 18287, 28682, 31274, 33259, 25849, 24159, 32651, 31984, 38451],
        }],
      },
      options: {
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              min: 0,
              max: 40000,
              maxTicksLimit: 5
            },
            gridLines: {
              color: "rgba(0, 0, 0, .125)",
            }
          }],
        },
        legend: {
          display: false
        }
      }
    });
  </script>
@endsection