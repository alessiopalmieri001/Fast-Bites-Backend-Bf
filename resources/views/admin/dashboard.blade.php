@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    {{-- charts --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="container-fluid h-100 my-4">
        <div class="row h-100">
            <div class="col-auto h-100">
                <aside class="h-100 d-flex flex-column justify-content-between">
                    <nav class="h-100 px-4">
                        <ul class="list-unstyled mt-3">
                            <li class="nav-item my-4">
                                <a class="btn btn-outline-light" href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item my-4">
                                <a class="btn btn-outline-light" href="{{ route('admin.restaurants.index') }}">Il tuo ristorante</a>
                            </li>
                            {{-- Verifica se l'utente ha un ristorante, quindi mostra il link per il menu --}}
                            @if($user->restaurants)
                            <li class="nav-item my-4">
                                <a class="btn btn-outline-light" href="{{ route('admin.foods.index') }}">Il tuo menu</a>
                            </li>
                            {{-- Verifica se l'utente ha un ristorante, quindi mostra il link per il menu --}}
                            <li class="nav-item my-4">
                                <a class="btn btn-outline-light" href="{{ route('admin.orders.index') }}">I tuoi ordini</a>
                            </li>
                            @endif
                        </ul>
                    </nav>
                </aside>
            </div>

            <div class="col g-0 h-100">
                <main id="main-content" class="h-100 overflow-y-auto">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-5 col-12 glass p-4">
                            <h3 class="subtitle-2 ">Incassi degli ultimi sei mesi</h3>
                            <canvas id="line-chart" class="background-card p-4" style="height: 300px; padding:200px"></canvas>
                        </div>
            
                        <div class="col-lg-5 col-12 glass p-4">
                            <h3 class="subtitle-2 ">Status ordini</h3>
                            <canvas id="orders-doughnut-chart" class="background-card p-4" style="height: 100%;"></canvas>
                        </div>
            
                        <div class="col-lg-5 col-12 glass p-4">
                            <h3 class="subtitle-2 ">Andamento degli ordini negli ultimi 6 mesi</h3>
                            <canvas id="orders-line-chart" class="background-card p-4" style="height: 300px;"></canvas>
                        </div>
            
                        <div class="col-lg-5 col-12 glass p-4">
                            <h3 class="subtitle-2 ">Rapporto prezzo/quantità ordinata </h3>
                            <canvas id="foods-mixed-chart" class="background-card p-4" style="height: 300px;"></canvas>
                        </div>
                    </div>
                </main>
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
                    borderWidth: 1,
                    borderColor: 'rgb(31, 135, 88)',
                    backgroundColor: 'rgb(31, 135, 88)'
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
                    'rgba(255, 61, 61, 0.6)',
                    'rgba(39, 211, 131, 0.6)',
                    'rgba(255, 226, 7, 0.6)',
                ],
                borderColor: [
                    'rgb(255, 61, 61)',
                    'rgb(39, 211, 131)',
                    'rgb(255, 226, 7)',
                ],
                borderWidth: 1
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
                    borderWidth: 1,
                    borderColor: 'rgba(142, 250, 246, 1)',
                    backgroundColor: 'rgba(142, 250, 246, 1)'
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
                    borderColor: 'rgba(142, 250, 246, 1)',
                    backgroundColor: 'rgba(142, 250, 246, 0.2)'
                }, {
                    type: 'line',
                    label: 'Percentuale piatto ordinato',
                    data: dishesQuantityPercentage,
                    borderColor: 'rgb(255, 33, 33)',
                    backgroundColor: 'rgb(255, 33, 33)'
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
}

.background-card {
    background-color: white;
    border-radius: 25px;
}


</style>
