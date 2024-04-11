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
        </div>
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
    
    .subtitle-2 {
        font-family: 'Open Sans', sans-serif;
        color: white;
        font-size: 1.5rem;
    }
</style>
