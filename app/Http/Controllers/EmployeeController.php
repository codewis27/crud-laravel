<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Repositories\EmployeeRepository;

class EmployeeController extends Controller
{
    protected $employeerepository;

    public function __construct(EmployeeRepository $employeerepository)
    {
        $this->employeerepository = $employeerepository;
    }

    public function index()
    {
        $title = "Employees Data";
        $data = $this->employeerepository->getAll();
        return view('employee.employee', compact('data', 'title'));
    }

    public function create()
    {
        $title = "Insert Data";
        return view('employee.create', compact('title'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $this->employeerepository->create($request->all());
        return redirect()->route('employee')->with('success', 'Insert Success');;
    }

    public function edit($id)
    {
        $title = "Update Data";
        $data = $this->employeerepository->getId($id);
        return view('employee.edit', compact('data', 'title'));
    }

    public function update(UpdateEmployeeRequest $request, $id)
    {
        $this->employeerepository->update($id, $request->all());
        return redirect()->route('employee')->with('success', 'Update Success');
    }

    public function delete($id)
    {
        $this->employeerepository->delete($id);
        return redirect()->route('employee')->with('success', 'Delete Success');
    }
}
