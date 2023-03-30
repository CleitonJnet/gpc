<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenancy extends Model
{
    protected $fillable = ['title','type_rent','street','number','neighborhood','city','state','size','rooms','bathroom','park','pet','furniture','elevator','transport','feature','rent','condominium','IPTU','firefighting','tot_all'];

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }
}
