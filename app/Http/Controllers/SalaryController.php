<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $salary = $request->salary;
        return Salary::where("salary", "LIKE", "%$salary%")->get()->paginate(4);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $salary = Salary::create([
            'emp_no' => $request->emp_no,
            'salary' => $request->salary,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
        ]);

        return response()->json([
            'data' => $salary 
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show(Salary $salary)
    {
        return response()->json([
            'data' => $salary 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function edit(Salary $salary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salary $salary)
    {
        $salary->update($request->all());

        return response()->json([
            'data' => $salary 
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary $salary)
    {
        $salary->delete();
        return response()->json([
            'message' => 'salary deleted'
        ], 204);
    }
}
