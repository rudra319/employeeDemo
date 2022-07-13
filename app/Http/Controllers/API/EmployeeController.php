<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        // return Employee::latest('id')->paginate(50)->toArray();
        return EmployeeResource::collection(Employee::latest('id')->paginate(50));
    }

    public function store(EmployeeStoreRequest $request)
    {
        $fileName = time().'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('upload'), $fileName);
        $arr = $request->validated();
        $arr['photo'] = $fileName;
        $employee = Employee::create($arr);
        return new EmployeeResource($employee);
    }

    public function show(Employee $employee)
    {
        return new EmployeeResource($employee);
    }

    public function updateEmp(EmployeeUpdateRequest $request, $id)
    {
        $employee = Employee::find($id);
        $arr = $request->validated();
        if(!empty($request->photo)){
            $fileName = time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('upload'), $fileName);
            $arr['photo'] = $fileName;
        }
        
        $employee->update($arr);
        return new EmployeeResource($employee);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->noContent();
    }

}
