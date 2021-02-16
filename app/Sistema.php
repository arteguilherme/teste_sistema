<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descricao',
        'sigla',
        'email',
        'url',
        'status',
    ];

    public function justificativa()
    {
        return $this->hasMany(Justificativa::class, 'justificativa_id');
    }

}
