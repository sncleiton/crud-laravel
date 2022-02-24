@extends('layouts.app')
@section('title')
    @lang('models/clientes.singular') 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
        <h1>@lang('models/clientes.singular')</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('clientes.index') }}"
                 class="btn btn-primary form-btn float-right">Voltar</a>
        </div>
      </div>
   @include('stisla-templates::common.errors')
    <div class="section-body">
           <div class="card">
            <div class="card-body">
                    @include('clientes.show_fields')
            </div>
            </div>
    </div>
    </section>
@endsection

