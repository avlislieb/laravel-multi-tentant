<?php

namespace App\Scopes\Tenant;

use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TenantScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $tenantId = app(ManagerTenant::class)->getTenantIdentify();
        $builder->where('tenant_id', $tenantId);
    }

    public function getTenantIdentify()
    {
        return auth()->user()->Tenant->id;
    }
}


