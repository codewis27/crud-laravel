<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Repositories\EmployeeRepository;

class EmployeeController extends Controller
{
    protected $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function index()
    {
        $title = "Employees Data";
        $data = $this->employeeRepository->getAll();
        return view('employee.employee', compact('data', 'title'));
    }

    public function create()
    {
        $title = "Insert Data";
        return view('employee.create', compact('title'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $this->employeeRepository->create($request->all());
        return redirect()->route('employee.index')->with('success', 'Insert Success');;
    }

    public function edit($id)
    {
        $title = "Update Data";
        $data = $this->employeeRepository->getId($id);
        return view('employee.edit', compact('data', 'title'));
    }

    public function update(UpdateEmployeeRequest $request, $id)
    {
        $this->employeeRepository->update($id, $request->all());
        return redirect()->route('employee.index')->with('success', 'Update Success');
    }

    public function destroy($id)
    {
        $this->employeeRepository->delete($id);
        return redirect()->route('employee.index')->with('success', 'Delete Success');
    }
}
