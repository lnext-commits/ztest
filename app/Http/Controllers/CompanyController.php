<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('company.index',[
            'companies' => $companies
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.add');
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
            'company_name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:companies'],
            'website' => ['required', 'string',],
            'logo' => ['required'],
        ]);

        $data = $request->file();
        $filename = $data['logo']->getClientOriginalName();
        if ($filename){
            $data['logo']->move(Storage::path('/public/logo/_originals/'),$filename);
            $permitted_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $short = substr(str_shuffle($permitted_chars), 0, 11);
            $filenameSave = 'logo'. $short . '.'.$data['logo']->getClientOriginalExtension();
            $img = Image::make(Storage::path('public/logo/_originals/') . $filename)->widen(100);
            $img->save(Storage::path('public/logo/') . $filenameSave);
        }
        Company::create([
            'company_name' => $request->company_name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $filenameSave,
        ]);

        return redirect(route('company.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit',[
           'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'company_name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:companies,email,'.$company->id],
            'website' => ['required', 'string',],
            'logo' => ['required'],
        ]);
        $data = $request->file();
        $filename = $data['logo']->getClientOriginalName();
        if ($filename){
            $data['logo']->move(Storage::path('/public/logo/_originals/'),$filename);
            $permitted_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $short = substr(str_shuffle($permitted_chars), 0, 11);
            $filenameSave = 'logo'. $short . '.'.$data['logo']->getClientOriginalExtension();
            $img = Image::make(Storage::path('public/logo/_originals/') . $filename)->widen(100);
            $img->save(Storage::path('public/logo/') . $filenameSave);
        }
        $company->update([
            'company_name' => $request->company_name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $filenameSave,
        ]);
        return redirect(route('company.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        Employee::where('company_id',$company->id)->delete();
        $company->delete();
        return redirect(route('company.index'));
    }
}
