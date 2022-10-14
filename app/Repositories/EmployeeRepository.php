<?php

namespace App\Repositories;

interface EmployeeRepository
{
    public function getAll();
    public function getId($id);
    public function create($data);
    public function update($id, $data);
    public function delete($id);
}
