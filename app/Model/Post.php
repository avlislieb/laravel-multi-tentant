<?php

namespace App\Model;

use App\Observers\Tenant\TenantObserver;
use App\Scopes\Tenant\TenantScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['tenant_id', 'user_id', 'title', 'body'];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(app(TenantScope::class));

        static::observe(new TenantObserver);
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
