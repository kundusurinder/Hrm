<?php

namespace App\Modules\Pim\Repositories;

use DB;
use App\Repositories\EloquentRepository;
use App\User;
use Carbon\Carbon;
use App\Modules\Pim\Repositories\Interfaces\EmployeeRepositoryInterface;

class EmployeeRepository extends EloquentRepository implements EmployeeRepositoryInterface
{
    protected $allowedAttributes = ['model'];

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getQry($filter = array(), $columns = [])
    {
        $response = $this->model->whereNull('deleted_at');

        foreach ($filter as $key => $value) {
            $response->where($value['key'], $value['operator'], $value['value']);
        }

        if ($columns) {
            return $response->select($columns);
        }

        $response = $response->get();

        return $response;
    }

    public function getSelect2Data($filter = '', $offset = 0, $limit = 10)
    {
        $qry = DB::table('users')
            ->select('id', 'first_name', 'last_name', 'email');
        if ($filter) {
            $qry->whereRaw('CONCAT(first_name, " ", last_name) like ?', [$filter.'%'])
                ->orWhere('first_name', 'like', $filter.'%')
                ->orWhere('last_name', 'like', $filter.'%');
        }
        $total = $qry->count();
        $items = $qry->skip($offset)->take($limit)->get();
        return ['incomplete_results' => false, 'total_count' => $total, 'items' => $items];
    }

    public function getSelect2Selection($id)
    {
        $items = $this->model->find($id);
        return ['incomplete_results' => false, 'total_count' => 1, 'items' => $items];
    }
}
