<?php

namespace App\Tenant;

class ManagerTenant
{
    public function getTenantIdentify()
    {
        return auth()->user()->Tenant->id;
    }
}
