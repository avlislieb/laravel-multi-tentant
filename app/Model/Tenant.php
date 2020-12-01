<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = ['name', 'uuid'];

    public function User()
    {
        return  $this->hasMany(User::class);
    }
}
