<div class="table-responsive">
    <table class="table" id="clientes-table">
        <thead>
            <tr>
                <th>@lang('models/clientes.fields.nome')</th>
        <th>@lang('models/clientes.fields.email')</th>
        <th>@lang('models/clientes.fields.telefone')</th>
        <th>@lang('models/clientes.fields.mensagem')</th>
        <th>@lang('models/clientes.fields.arquivo_anexo')</th>
                <th colspan="3">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clientes as $cliente)
            <tr>
                       <td>{{ $cliente->nome }}</td>
            <td>{{ $cliente->email }}</td>
            <td>{{ $cliente->telefone }}</td>
            <td>{{ $cliente->mensagem }}</td>
            <td>{{ $cliente->arquivo_anexo }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['clientes.destroy', $cliente->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('clientes.show', [$cliente->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('clientes.edit', [$cliente->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("'.__('Deseja excluir?').'")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
