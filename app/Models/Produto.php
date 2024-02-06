<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['id','nome','sku','fotos','descricao'];

    public function variacao(){
        return $this->hasOne(Variacao::class);
    }
}
