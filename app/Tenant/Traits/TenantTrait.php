<?php


namespace App\Tenant\Traits;


use App\Observers\Tenant\TenantObserver;
use App\Scopes\Tenant\TenantScope;

trait TenantTrait
{

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(app(TenantScope::class));

        static::observe(new TenantObserver);
    }

}
