<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employees = Employee::with('employee');

        if ($request->has('last_name')) {
            $employees->where('last_name', $request->last_name);
        }

        if ($request->has('first_name')) {
            $employees->where('first_name', $request->first_name);
        }

        if ($request->has('gender')) {
            $employees->where('gender', $request->gender);
        }
        
        if ($request->has('birth_date')) {
            $employees->where('birth_date', $request->birth_date);
        }

        if ($request->has('hire_date')) {
            $employees->where('hire_date', $request->hire_date);
        }

        return $employees->get();
    }
       
    

    // $keyword = $request->keyword;
    // return Employee::where("first_name", "LIKE", "%$keyword%")->get();

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = Employee::create ([
            'first_name' => $request->first_name,
            'last_name' => $request ->last_name,
            'birth_date' => $request ->birth_date,
            'gender' => $request ->gender,
            'hire_date' => $request ->hire_date,
        ]);
        return response ()->json ([
           'data'=>$employee
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return response ()->json ([
            'data'=>$employee
         ]);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
      
        $employee->update($request->all());
        return response ()->json ([
            'data'=>$employee
         ]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return 204;
    }
}
