@extends('layouts.app')
@section('title')
     @lang('models/clientes.plural')
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>@lang('models/clientes.plural')</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('clientes.create')}}" class="btn btn-primary form-btn">Novo <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('clientes.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection



