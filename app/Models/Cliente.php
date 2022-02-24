<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Cliente
 * @package App\Models
 * @version February 24, 2022, 4:05 pm UTC
 *
 * @property string $nome
 * @property string $email
 * @property string $telefone
 * @property string $mensagem
 * @property string $arquivo_anexo
 * @property string $ip
 */
class Cliente extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'clientes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nome',
        'email',
        'telefone',
        'mensagem',
        'arquivo_anexo',
        'ip'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'email' => 'string',
        'telefone' => 'string',
        'mensagem' => 'string',
        'arquivo_anexo' => 'string',
        'ip' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required|string|max:255',
        'email' => 'required|string|max:45',
        'telefone' => 'required|string|max:45',
        'mensagem' => 'required|string',
        'arquivo_anexo' => 'required|string|max:255',
        'ip' => 'required|string|max:45',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
