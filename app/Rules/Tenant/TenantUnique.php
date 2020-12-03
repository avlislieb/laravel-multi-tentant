<?php

namespace App\Rules\Tenant;

use App\Tenant\ManagerTenant;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TenantUnique implements Rule
{
    private $table;

    /**
     * Create a new rule instance.
     *
     * @param Model $table_
     */
    public function __construct(Model $table_)
    {
        $this->table = $table_;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $tenantId = app(ManagerTenant::class)->getTenantIdentify();

        $result = $this->table->where($attribute, $value)
                    ->where('tenant_id', $tenantId)
                    ->limit(1)->first();

        return is_null($result);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O valor para :attribute ja esta em uso!';
    }
}
