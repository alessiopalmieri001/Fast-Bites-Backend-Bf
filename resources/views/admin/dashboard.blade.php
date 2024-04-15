@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
<div class="container py-5">
    <div class="row">
        <div class="col">
            <h2 class="title">
                Sei loggato!
            </h2>
            <h4 class="subtitle-2 text-center">
                Benvenuto nella tua dashboard.
            </h4>
            <canvas id="myChart"></canvas>
        </div>
    </div> 
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
        }]
    },
    options: {
        scales: {
        y: {
            beginAtZero: true
        }
        }
    }
    });
</script>

</script>
@endsection



<style lang="scss" scoped>
    .title {
        font-family: 'Paytone One', sans-serif;
        font-size: 3rem;
        color: white;
        text-align: center;
        margin-bottom: 20px;
    }
    
    .subtitle-2 {
        font-family: 'Open Sans', sans-serif;
        color: white;
        font-size: 1.5rem;
    }
</style>
