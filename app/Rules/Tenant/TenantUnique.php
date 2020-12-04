<?php

namespace App\Rules\Tenant;

use App\Tenant\ManagerTenant;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TenantUnique implements Rule
{
    private $table;
    private $column;
    private $columnValue;

    /**
     * Create a new rule instance.
     *
     * @param Model $table_
     * @param string $columnValue_
     * @param string $column_
     */
    public function __construct(Model $table_, string $columnValue_ = null, string $column_ = 'id')
    {
        $this->table = $table_;
        $this->column = $column_;
        $this->columnValue = $columnValue_;
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
        if ($result && $result->{$this->column} == $this->columnValue) {
            return true;
        }
        return false;
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
