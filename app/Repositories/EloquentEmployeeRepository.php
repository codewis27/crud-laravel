<?php

namespace App\Repositories;

use App\Models\Employee;

class EloquentEmployeeRepository implements EmployeeRepository
{
    public function getId($id)
    {
        return Employee::find($id);
    }

    public function getAll()
    {
        return Employee::all();
    }

    public function create($data)
    {
        return Employee::create($data);
    }

    public function update($id, $data)
    {
        return Employee::find($id)->update($data);
    }

    public function delete($id)
    {
        return Employee::find($id)->delete();
    }
}
