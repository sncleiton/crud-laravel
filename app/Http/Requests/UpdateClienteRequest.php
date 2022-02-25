<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Cliente;

class UpdateClienteRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|max:45',
            'telefone' => 'required|celular_com_ddd',
            'mensagem' => 'required',
            'arquivo_anexo' => 'required|mimes:doc,docx,pdf,odt,txt|max:500'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo "Nome" é obrigatório!',
            'nome.max' => 'Nome deve ter no maximo 255 caracteres!',
            'email.required' => 'O campo "Email" é obrigatório!',
            'email.email' => 'Email em formato inválido!',
            'telefone.required' => 'Campo telefone é obrigatório!',
            'telefone.celular_com_dd' => 'Telefone fora do padrão (99)99999-9999!',
            'mensagem.required' => 'O campo "Mensagem" é obrigatória!',
            'arquivo_anexo.required' => 'Anexar um arquivo é obrigatório!',
            'arquivo_anexo.mimes' => 'Extensão inválida de arquivo anexo!',
            'arquivo_anexo.max' => 'O tamanho do anexo excede o máximo de 500kb!',
        ];
    }
}
