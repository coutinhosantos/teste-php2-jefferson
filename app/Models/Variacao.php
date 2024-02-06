<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variacao extends Model
{
    protected $fillable = ['id','estoque','preco','tipo_variacao','descricao_variacao','produto_id'];

    public function produto(){
        return $this->belongsTo(Produto::class);
    }
}
