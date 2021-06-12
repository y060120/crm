<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\company;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
         // fetch employees and their company details 

         $employees = employee::select('employees.emp_id','employees.email','employees.phone','employees.first_name','employees.last_name','c.name')
                        ->join('companies as c', 'c.comp_id', '=', 'employees.comp_id')
                        ->paginate(10);      
        
        return view('employee.index', compact('employees'))
               ->with('i', (request()->input('page',1)-1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companys = company::select('comp_id','name')->get();       
        return view('employee.create',compact('companys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $employee = new employee();
            $request->validate([
                'first_name' => 'required',
                'last_name'  => 'required',
                'comp_id'    => 'required',
                'email'      => 'required|email'                
            ]);
            

            $data = array(
                'first_name'    => $request->first_name,
                'last_name'     => $request->last_name,
                'email'         => $request->email,
                'comp_id'       => $request->comp_id,
                'phone'         => $request->phone
            );

            $employee->fill($data);
            $employee->save();

            return redirect()->route('employee.index')
                ->with('success','Employee Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, employee $employee)
    {        
        $companys = company::select('comp_id','name')->find($request->employee->comp_id);  
        return view('employee.view', compact('employee','companys'));        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(employee $employee)
    {
        $companys = company::select('comp_id','name')->get();  
        return view('employee.edit', compact('employee','companys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employee $employee)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'comp_id'    => 'required',
            'email'      => 'required|email'                
        ]);  

       $data = array(
        'first_name'    => $request->first_name,
        'last_name'     => $request->last_name,
        'email'         => $request->email,
        'comp_id'       => $request->comp_id,
        'phone'         => $request->phone
       );
      
        $employee->update($data);
 
        return redirect()->route('employee.index')
                 ->with('success','Employee Updated Successfully');       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(employee $employee)
    {
        $employee->delete();

        return redirect()->route('employee.index')
               ->with('success','Employee Deleted Successfully');
    }
}
