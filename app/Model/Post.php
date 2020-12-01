<?php

namespace App\Model;

use App\Scopes\Tenant\TenantScope;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Post extends Model
{
    protected $fillable = ['tenant_id', 'user_id', 'title', 'body'];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(app(TenantScope::class));
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
