@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row mt-2">
        <div class="col">
            <h2 class="title">
                Sei loggato!
            </h2>
            <h4 class="subtitle text-center">
                Benvenuto nella tua dashboard
            </h4>
        </div>
    </div>
@endsection

<style lang="scss" scoped>
    .title {
      font-family: 'Paytone One', sans-serif;
      font-size: 3rem;
      color: white;
      text-align: center;
      margin-bottom: 20px;
    }
    
    .subtitle {
        font-family: 'Open Sans', sans-serif;
        color: white;
        font-size: 1.5rem;
    }
</style>
