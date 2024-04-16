@extends('layouts.app')

@section('page-title', 'Ordini')

@section('main-content')
    <section class="container">
        <div class="mb-2">
            <h1 class="text-center text-light title">I tuoi ordini</h1>
            
        </div>

            
        <div class="row ">
            <div class="my-4">
                <div class="row order-header table-responsive">
                    <div class="col">
                        <button class="table-btn btn btn-outline-light" onclick="orderBy('id', this)">
                            ID <i class="fas fa-sort"></i>
                        </button>
                    </div>
                    <div class="col">
                        <button class="table-btn btn btn-outline-light" onclick="orderBy('name', this)">
                            Cliente <i class="fas fa-sort"></i>
                        </button>
                    </div>
                    <div class="col">
                        <button class="table-btn btn btn-outline-light" onclick="orderBy('status', this)">
                            Stato <i class="fas fa-sort"></i>
                        </button>
                    </div>
                    <div class="col">
                        <button class="table-btn btn btn-outline-light" onclick="orderBy('created_at', this)">
                            Data <i class="fas fa-sort"></i>
                        </button>
                    </div>
                    <div class="col">
                        <button class="table-btn btn btn-outline-light" onclick="orderBy('total', this)">
                            Totale <i class="fas fa-sort"></i>
                        </button>
                    </div>
                    <div class="col d-flex justify-content-center m-0">
                        <button class="table-btn btn btn-outline-light m-0" onclick="resetFilters(this)">Resetta Filtri</button>
                    </div>
                </div>
                <div id="table-content" class="d-flex flex-column table-responsive overflow-y-auto" style="max-height: 600px">
                    @foreach ($user->restaurants->orders as $order)
                        <div class="row order align-items-baseline">
                            <div class="col">
                                <span>{{ $order->id }}</span>
                            </div>

                            <div class="col">
                                <span>{{ $order->name }}</span>
                            </div>

                            <div class="col">
                                <span class="order-pill">{{ $order->status }}</span>
                            </div>

                            <div class="col">
                                <span>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y - H:i:s') }}</span>
                            </div>

                            <div class="col">
                                <span>€ {{ number_format($order->total, 2) }}</span>
                            </div>

                            <div class="col d-flex justify-content-center">
                                <button class="button-style-ordini" onclick="window.location='{{ route('admin.orders.show', $order->id) }}'">Vedi</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        const originalOrders = {!! json_encode($user->restaurants->orders) !!};

        function resetFilters(button) {
        // Riordina gli ordini nella sequenza originale
        const orders = [...originalOrders];

        // Render gli ordini riordinati
        renderOrders(orders);

        // Rimuovi la classe "active" da tutti i pulsanti dei filtri
        document.querySelectorAll('.table-btn').forEach(btn => {
            btn.classList.remove('active');
        });

        // Aggiungi la classe "active" al pulsante di reset
        button.classList.add('active');
    }

        let sortOrder = 'asc'; // Default sort order
        
        function orderBy(column, button) {
            const orders = {!! json_encode($user->restaurants->orders) !!};
            orders.sort((a, b) => {
                const valA = column === 'created_at' ? new Date(a[column]).getTime() : a[column];
                const valB = column === 'created_at' ? new Date(b[column]).getTime() : b[column];

                if (sortOrder === 'asc') {
                    return valA > valB ? 1 : -1;
                } else {
                    return valA < valB ? 1 : -1;
                }
            });

            // Reverse sort order for next click
            sortOrder = sortOrder === 'asc' ? 'desc' : 'asc';

            // Rimuovi la classe "active" da tutti i pulsanti dei filtri
            document.querySelectorAll('.table-btn').forEach(btn => {
                btn.classList.remove('active');
            });

            // Toggle della classe "active" sul pulsante del filtro
            button.classList.add('active');

            // Render sorted orders
            renderOrders(orders);
            }

        function formatCreatedAt(dateString) {
            const date = new Date(dateString);
            const day = date.getDate();
            const month = date.getMonth() + 1;
            const year = date.getFullYear();
            const hours = date.getHours();
            const minutes = date.getMinutes();
            const seconds = date.getSeconds();

            return `${day}/${month}/${year} - ${hours}:${minutes}:${seconds}`;
        }

        function renderOrders(orders) {
            const tableContent = document.getElementById('table-content');
            tableContent.innerHTML = '';

            orders.forEach(order => {
                const row = document.createElement('div');
                row.classList.add('row', 'order', 'align-items-baseline');

                const cols = ['id', 'name', 'status', 'created_at', 'total'];

                cols.forEach(col => {
                    const colElement = document.createElement('div');
                    colElement.classList.add('col');
                    const span = document.createElement('span');
                    span.textContent = col === 'created_at' ? formatCreatedAt(order[col]) : (col === 'total' ? `€ ${order[col].toFixed(2)}` : order[col]);
                    colElement.appendChild(span);
                    row.appendChild(colElement);
                });

                const actionCol = document.createElement('div');
                actionCol.classList.add('col');
                const button = document.createElement('button');
                button.classList.add('button-style-1');
                button.textContent = 'Vedi';
                button.onclick = () => {
                    window.location = '{{ route('admin.orders.show', '') }}/' + order.id;
                };
                actionCol.appendChild(button);
                row.appendChild(actionCol);

                tableContent.appendChild(row);
            });
        }
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
             

.button-style-ordini {
    display: inline-block;
    text-decoration: none;
    color: rgb(0, 0, 0);
    border: 1px solid transparent;
    padding: 8px 45px;
    cursor: pointer;
    border-radius: 24px;
    background-color: white;
    transition:
        background-color 0.3s ease,
        border-color 0.3s ease;
}

.button-style-ordini:hover {
    color: white;
    background-color: transparent;
    border: 1px solid white;
}

.button-style-ordini a {
    text-decoration: none;
}

</style>
