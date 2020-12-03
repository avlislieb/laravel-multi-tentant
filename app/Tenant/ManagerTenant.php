<?php

namespace App\Tenant;

class ManagerTenant
{
    /**
     * @return mixed
     */
    public function getTenantIdentify()
    {
        return auth()->user()->Tenant->id;
    }
}
