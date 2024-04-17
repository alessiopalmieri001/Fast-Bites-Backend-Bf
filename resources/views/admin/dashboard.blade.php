@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    {{-- charts --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="container">
        <div class="mb-2">
            <h1 class="text-center m-4 text-light title">Dashboard</h1>
        </div>
        <div class="row justify-content-center g-2">
            <!-- Totale incassi -->
            <div class="col-lg-3 col-md-6 col-sm-12 p-4">
                <div class="card background-card p-3">
                    <h5 class="card-title text-center">Tot. incassi</h5>
                    <h2 class="card-text text-center" id="total-incassi"></h2>
                </div>
            </div>
            

            <!-- Totale ordini consegnati -->
            <div class="col-lg-3 col-md-6 col-sm-12 p-4">
                <div class="card background-card p-3">
                    <h5 class="card-title text-center">Tot. ordini consegnati</h5>
                    <h2 class="card-text text-center" id="total-delivered"></h2>
                </div>
            </div>

            <!-- Totale ordini in preparazione -->
            <div class="col-lg-3 col-md-6 col-sm-12 p-4">
                <div class="card background-card p-3">
                    <h5 class="card-title text-center">Tot. ordini in preparazione</h5>
                    <h2 class="card-text text-center" id="total-preparation"></h2>
                </div>
            </div>

            <!-- Totale ordini in transito -->
            <div class="col-lg-3 col-md-6 col-sm-12 p-4">
                <div class="card background-card p-3">
                    <h5 class="card-title text-center">Tot. ordini in transito</h5>
                    <h2 class="card-text text-center" id="total-transit"></h2>
                </div>
            </div>
        </div>

        </div>
    
        <div class="row justify-content-center g-0">
            <div class="col-lg-5 col-12 glass p-4">
                <h3 class="subtitle-2 pb-2">Incassi degli ultimi sei mesi</h3>
                <canvas id="line-chart" class="background-card p-4" style="height: 300px; padding:200px"></canvas>
            </div>

            <div class="col-lg-5 col-12 glass p-4">
                <h3 class="subtitle-2 pb-2 ">Status ordini</h3>
                <canvas id="orders-doughnut-chart" class="background-card p-4" style="height: 100%;"></canvas>
            </div>

            <div class="col-lg-5 col-12 glass p-4">
                <h3 class="subtitle-2 pb-2">Andamento degli ordini negli ultimi 6 mesi</h3>
                <canvas id="orders-line-chart" class="background-card p-4" style="height: 300px; padding:200px;"></canvas>
            </div>

            <div class="col-lg-5 col-12 glass p-4">
                <h3 class="subtitle-2 pb-2">Rapporto prezzo/quantità ordinata </h3>
                <canvas id="foods-mixed-chart" class="background-card p-4" style="height: 300px; padding:200px;"></canvas>
            </div>
        </div>
    </div>

    <script>
        let orders = {!! json_encode($orders) !!};

        // line chart
        const line = document.getElementById('line-chart');
        let lastSixMonths = [];
        let lastSixMonthsIncoming = [0.00, 0.00, 0.00, 0.00, 0.00, 0.00];
        let lastSixMonthsPending = [0.00, 0.00, 0.00, 0.00, 0.00, 0.00];
        let lastSixMonthsTotal = [0.00, 0.00, 0.00, 0.00, 0.00, 0.00];
        let incomingTotal = [0.00, 0.00]
        for (let i = 0; i < 6; i++) {
            lastSixMonths.push(new Date(new Date().setMonth(new Date().getMonth() - i)).getMonth() + 1)
        }

        lastSixMonths = lastSixMonths.reverse();

        orders.forEach(order => {
            if (order.status !== 'rejected') {
                incomingTotal[1] += order.total;
            }
            if (order.status !== 'rejected' && order.status !== 'pending') {
                incomingTotal[0] += order.total
            }
            if (lastSixMonths.includes(new Date(order.created_at).getMonth() + 1)) {
                lastSixMonthsTotal[lastSixMonths.indexOf(new Date(order.created_at)
                    .getMonth() + 1)] += order.total;

                if (order.status !== 'rejected') {
                    lastSixMonthsPending[lastSixMonths.indexOf(new Date(order.created_at).getMonth() +
                        1)] += order.total
                }

                if (order.status !== 'rejected' && order.status !== 'pending') {
                    lastSixMonthsIncoming[lastSixMonths.indexOf(new Date(order.created_at).getMonth() +
                        1)] += order.total
                }

            }
        })

        lastSixMonths.forEach((month, i) => {
            switch (month) {
                case 1:
                    lastSixMonths[i] = 'Gennaio';
                    break;
                case 2:
                    lastSixMonths[i] = 'Febbraio';
                    break;
                case 3:
                    lastSixMonths[i] = 'Marzo';
                    break;
                case 4:
                    lastSixMonths[i] = 'Aprile';
                    break;
                case 5:
                    lastSixMonths[i] = 'Maggio';
                    break;
                case 6:
                    lastSixMonths[i] = 'Giugno';
                    break;
                case 7:
                    lastSixMonths[i] = 'Luglio';
                    break;
                case 8:
                    lastSixMonths[i] = 'Agosto';
                    break;
                case 9:
                    lastSixMonths[i] = 'Settembre';
                    break;
                case 10:
                    lastSixMonths[i] = 'Ottobre';
                    break;
                case 11:
                    lastSixMonths[i] = 'Novembre';
                    break;
                case 12:
                    lastSixMonths[i] = 'Dicembre';
                    break;
                default:
                    break;
            }
        })
        
        new Chart(line, {
            type: 'line',
            data: {
                labels: lastSixMonths,
                datasets: [{
                    label: 'Totale netto',
                    data: lastSixMonthsIncoming,
                    hoverBorderWidth: 5,
                    borderWidth: 2,
                    borderColor: 'rgb(245, 142, 31)',
                    backgroundColor: 'rgb(245, 142, 31)',
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

        
        //TOTALE INCASSI
        console.log('Totale incassi: ' + incomingTotal[0].toFixed(2) + '€');
        document.getElementById('total-incassi').innerText = '€ ' + incomingTotal[0].toFixed(2);


        // doughnut chart
        const ordersDoughnut = document.getElementById('orders-doughnut-chart');
        const orderStatuses = {
            'Consegnato': 0,
            'In preparazione': 0,
            'In transito': 0 // Rimuovi lo spazio extra dopo 'In transito'
        };

        for (let order of orders) {
            if (order.status in orderStatuses) {
                orderStatuses[order.status]++;
            }
        }

        let doughnutData = {
            labels: Object.keys(orderStatuses), // Usa Object.keys per ottenere le chiavi dell'oggetto
            datasets: [{
                label: 'Ordini',
                data: Object.values(orderStatuses), // Usa Object.values per ottenere i valori dell'oggetto
                backgroundColor: [
                    'rgba(246, 143, 31, 0.6)',
                    'rgba(203, 51, 50, 0.6)',
                    'rgba(255, 226, 7, 0.6)',
                ],
                borderColor: [
                    'rgba(246, 143, 31, 0.6)',
                    'rgba(203, 51, 50, 0.6)',
                    'rgb(255, 226, 7)',
                ],
                borderWidth: 2,
            }]
        };

        new Chart(ordersDoughnut, {
            type: 'doughnut',
            data: doughnutData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        //TOTALE DEGLI ORDINI
        const ordersDelivered = orders.filter(order => order.status === 'Consegnato');
        console.log('Ordini consegnati:', ordersDelivered.length);
        document.getElementById('total-delivered').innerText = ordersDelivered.length;

        const ordersPending = orders.filter(order => order.status === 'In preparazione');
        console.log('Ordini in preparazione:', ordersPending.length);
        document.getElementById('total-preparation').innerText = ordersPending.length;

        const ordersTransit = orders.filter(order => order.status === 'In transito');
        console.log('Ordini in transito:', ordersTransit.length);
        document.getElementById('total-transit').innerText = ordersTransit.length;

        //line chart
        const ordersLine = document.getElementById('orders-line-chart');
        lastSixMonths = [];
        for (let i = 0; i < 6; i++) {
            lastSixMonths.push(new Date(new Date().setMonth(new Date().getMonth() - i)).getMonth() + 1)
        }

        let ordersInLastSixMonth = [0, 0, 0, 0, 0, 0]

        orders.forEach(order => {
            let month = new Date(order.created_at).getMonth() + 1
            lastSixMonths.indexOf(month) !== -1 ? ordersInLastSixMonth[lastSixMonths.indexOf(month)] += 1 : null
        })

        lastSixMonths.forEach((month, i) => {
            switch (month) {
                case 1:
                    lastSixMonths[i] = 'Gennaio';
                    break;
                case 2:
                    lastSixMonths[i] = 'Febbraio';
                    break;
                case 3:
                    lastSixMonths[i] = 'Marzo';
                    break;
                case 4:
                    lastSixMonths[i] = 'Aprile';
                    break;
                case 5:
                    lastSixMonths[i] = 'Maggio';
                    break;
                case 6:
                    lastSixMonths[i] = 'Giugno';
                    break;
                case 7:
                    lastSixMonths[i] = 'Luglio';
                    break;
                case 8:
                    lastSixMonths[i] = 'Agosto';
                    break;
                case 9:
                    lastSixMonths[i] = 'Settembre';
                    break;
                case 10:
                    lastSixMonths[i] = 'Ottobre';
                    break;
                case 11:
                    lastSixMonths[i] = 'Novembre';
                    break;
                case 12:
                    lastSixMonths[i] = 'Dicembre';
                    break;
                default:
                    break;
            }
        })
        lastSixMonths = lastSixMonths.reverse()
        ordersInLastSixMonth = ordersInLastSixMonth.reverse()

        new Chart(ordersLine, {
            type: 'line',
            data: {
                labels: lastSixMonths,
                datasets: [{
                    label: 'Ordini',
                    data: ordersInLastSixMonth,
                    borderWidth: 2,
                    borderColor: 'rgb(245, 142, 31)',
                    backgroundColor: 'rgb(245, 142, 31)'
                }]
            },
            options: {
                tension:0.8,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        
        
        // foods mixed chart
        const foods = {!! json_encode($restaurant->foods) !!};
        let dishesQuanity = [];
        let totalQuantity = 0;
        foods.forEach(dish => {
            dishesQuanity.push(0)
        })
        orders.forEach(order => {
            order.foods.forEach(dish => {
                totalQuantity += dish.pivot.quantity
                foods.forEach((d, i) => {
                    if (d.name === dish.name) {
                        dishesQuanity[i] += dish.pivot.quantity
                    }
                })
            })
        })
        let dishesQuantityPercentage = dishesQuanity.map(dish => {
            return (dish / totalQuantity) * 100
        })
        const dishesMixed = document.getElementById('foods-mixed-chart');

        const dishesMixedChart = new Chart(dishesMixed, {
            data: {
                datasets: [{
                    type: 'bar',
                    label: 'Prezzo',
                    data: foods.map(dish => dish.price),
                    borderWidth: 2,
                    borderColor: 'rgb(245, 142, 31, 0.6)',
                    backgroundColor: 'rgb(245, 142, 31, 0.6)'
                }, {
                    type: 'line',
                    label: 'Percentuale piatto ordinato',
                    data: dishesQuantityPercentage,
                    borderColor: 'rgb(203, 51, 50)',
                    backgroundColor: 'rgb(203, 51, 50)'
                }],
                labels: foods.map(dish => dish.name)
            },
            options: {
                tension:0.4,
                onHover: (e) => {
                    const canvasPosition = Chart.helpers.getRelativePosition(e, dishesMixedChart);
                    const dataX = dishesMixedChart.scales.x.getValueForPixel(canvasPosition.x);
                    const dataY = dishesMixedChart.scales.y.getValueForPixel(canvasPosition.y);
                    if (foods.map(dish => dish.price)[dataX] >= dataY && dataY >= 0) {
                        dishesMixed.style.cursor = 'pointer';
                    } else {
                        dishesMixed.style.cursor = 'default';
                    }
                },
                onClick: (e) => {
                    const canvasPosition = Chart.helpers.getRelativePosition(e, dishesMixedChart);
                    const dataX = dishesMixedChart.scales.x.getValueForPixel(canvasPosition.x);
                    const dataY = dishesMixedChart.scales.y.getValueForPixel(canvasPosition.y);
                    if (foods.map(dish => dish.price)[dataX] >= dataY) location.href =
                        `/admin/foods/${foods[dataX].id}`
                },
            }
        });
    </script>

    <style scoped>
        #service-buttons {
            height: auto;
            max-height: 45%;
        }
    </style>
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
    font-size: 1rem;
    text-align: center
}

.background-card {
    background-color: white;
    border-radius: 25px;
}

.card-text {
    font-family: 'Paytone One', sans-serif;
    font-size: 1rem;

}
</style>
