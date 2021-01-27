<?php


namespace App\models;

use Illuminate\Database\Eloquent\Model;

class cobricaoFivModel
{
    protected $table = 'cobricaofivmodel';

    protected $fillable = ['name_criador ','data_aquisição ', 'matriz_doadora  ', 'reprodutor ','raca', 'categoria','matriz_receptora', 'n_embrioes','n_registro'];

}