<?php

namespace App\Model;

use App\Observers\Tenant\TenantObserver;
use App\Scopes\Tenant\TenantScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Tenant\Traits\TenantTrait;

class Post extends Model
{
    use SoftDeletes, TenantTrait;

    protected $fillable = ['tenant_id', 'user_id', 'title', 'body'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
