<!-- Nome Field -->
<div class="form-group">
    {!! Form::label('nome', __('models/clientes.fields.nome').':') !!}
    <p>{{ $cliente->nome }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('models/clientes.fields.email').':') !!}
    <p>{{ $cliente->email }}</p>
</div>

<!-- Telefone Field -->
<div class="form-group">
    {!! Form::label('telefone', __('models/clientes.fields.telefone').':') !!}
    <p>{{ $cliente->telefone }}</p>
</div>

<!-- Mensagem Field -->
<div class="form-group">
    {!! Form::label('mensagem', __('models/clientes.fields.mensagem').':') !!}
    <p>{{ $cliente->mensagem }}</p>
</div>

<!-- Arquivo Anexo Field -->
<div class="form-group">
    {!! Form::label('arquivo_anexo', __('models/clientes.fields.arquivo_anexo').':') !!}
    <p>{{ $cliente->arquivo_anexo }}</p>
</div>

