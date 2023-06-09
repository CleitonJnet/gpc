<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['path','tenancy_id'];

    public function tenancy()
    {
        return $this->belongsTo(Tenancy::class);
    }

}
