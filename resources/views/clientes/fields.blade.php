<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', __('models/clientes.fields.nome').':') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('models/clientes.fields.email').':') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefone', __('models/clientes.fields.telefone').':') !!}
    {!! Form::text('telefone', null, ['class' => 'form-control']) !!}
</div>

<!-- Mensagem Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('mensagem', __('models/clientes.fields.mensagem').':') !!}
    {!! Form::textarea('mensagem', null, ['class' => 'form-control']) !!}
</div>

<!-- Arquivo Anexo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('arquivo_anexo', __('models/clientes.fields.arquivo_anexo').':') !!}
    {!! Form::file('arquivo_anexo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Salvar'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('clientes.index') }}" class="btn btn-light">@lang('Cancelar')</a>
</div>
