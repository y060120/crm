<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company;
use App\Http\Resources\CompanyResource;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companys = company::paginate(10);
        return view('company.index', compact('companys'))
               ->with('i', (request()->input('page',1)-1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $company = new company();
            $request->validate([
                'name' => 'required',
                'email'=> 'required|email',
                'logo' => 'dimensions:min_width=100,min_height=100'
            ]);
            $filename = $request->file('logo')->getClientOriginalName();
            $logoPath = $request->file('logo')->storeAs('public',$filename);

            $data = array(
                'name' => $request->name,
                'email'=> $request->email,
                'logo' => $filename,
                'website'=>$request->website
            );

            $company->fill($data);
            $company->save();

            return redirect()->route('company.index')
                ->with('success','Company Created Successfully');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(company $company)
    {
        return view('company.view', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(company $company)
    {
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, company $company)
    {           
            $request->validate([
                'name' => 'required',
                'email'=> 'required|email',
                'logo' => 'dimensions:min_width=100,min_height=100'            
            ]);      

            $filename = $request->file('logo')->getClientOriginalName();
            $logoPath = $request->file('logo')->storeAs('public',$filename);

           $data = array(
               'name' => $request->name,
               'email'=> $request->email,   
               'logo' => $filename,       
               'website'=>$request->website
           );
          
            $company->update($data);
     
            return redirect()->route('company.index')
                     ->with('success','Company Updated Successfully');          
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(company $company)
    {
        $company->delete();

        return redirect()->route('company.index')
               ->with('success','Company Deleted Successfully');

    }
}
