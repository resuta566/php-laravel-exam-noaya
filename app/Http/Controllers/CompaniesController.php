<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companies::paginate(10);
        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:companies',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100|max:2048',
        ]);
    
        $imageName = time().'.'.$request->logo->extension();
        $request->logo->move(public_path('storage'), $imageName);

        $newCompany = Companies::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => "storage/".$imageName,
            'website' => $request->website,
        ]);

        return redirect()
                ->route('companies.show', $newCompany->id)
                ->with('success', 'Company Created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Companies $company)
    {
        $employees = Employees::where('company_id', $company->id)->paginate(10);
        return view('admin.companies.show', compact('company', 'employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Companies $company)
    {        
        return view('admin.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Companies $company)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:companies,email,' . $company->id,
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100|max:2048',
        ]);
        
        $imageName = null;

        if ($request->logo) {
            $destinationPath = public_path();
            File::delete($destinationPath.'/'. $company->logo);

            $imageName = time().'.'.$request->logo->extension();
            
            $request->logo->move(public_path('storage'), $imageName);
        }
    

        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $imageName != null ? "storage/".$imageName : $company->logo,
            'website' => $request->website,
        ]);

        return redirect()
                ->route('companies.show', $company->id)
                ->with('success', 'Company Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Companies $company)
    {
        
        $destinationPath = public_path();
        File::delete($destinationPath.'/'. $company->logo);
        $deletedCompName = $company->name;
        $company->delete();

        return redirect()
                ->route('companies.index')
                ->with('success', 'Company '.$deletedCompName.' Deleted');
    }
}
