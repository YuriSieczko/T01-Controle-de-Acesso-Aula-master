<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Noticia extends Model
{
    use HasFactory;
    use SoftDeletes;

    public const TABELA_NOTICIA = "noticias";

    public const CAMPO_DELETED_AT = "deleted_at";
    public const CAMPO_CREATED_AT = "created_at";
    public const CAMPO_UPDATED_AT = "updated_at";

    public const CAMPO_ID = "id";
    public const CAMPO_TITULO = "titulo";
    public const CAMPO_DESCRICAO = "descricao";
    public const CAMPO_USERID = "user_id";
    
    
}
