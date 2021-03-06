<?php

namespace App\Repositories;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CategoryRepository implements CategoryRepositoryInterface
{

    protected $table;

    public function __construct()
    {
        $this->table = 'categories';
    }

    public function getCategoriesByTenantUuid(string $uuid)
    {
        return DB::table($this->table)
                ->join('tenants', 'tenants.id', '=', 'categories.tenant_id')
                ->where('tenant.uuid', $uuid)
                ->select('categories.*')
                ->get();
    }

    // se quiser paginar basta trocar o get pelo paginate
    public function getCategoriesByTenantId(int $idTenant)
    {
        return DB::table($this->table)->where('tenant_id', $idTenant)->get();
    }

   /* public function getCategoryByUrl(string $url)
    {
        return DB::table($this->table)->where('url', $url)->first();
    }*/

    public function getCategoryByUuid(string $uuid)
    {
        return DB::table($this->table)
                    ->where('uuid', $uuid)
                    ->first();
    }

}