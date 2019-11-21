<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Http\Requests\CompaniesRequest;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        $companies = Company::latest()->paginate(10);
        return response()->json($companies);
//        return view('companies.index', compact('companies'));
    }

//    public function create()
//    {
//        return view('companies.create');
//    }

    public function store(CompaniesRequest $request)
    {
        $logo = null;

        if ($request->file('logo') != null) {
            $logo = $request
                ->file('logo')
                ->store('uploads', 'public');
        }

        Company::create(
            array_merge(
                $request->except('logo'),
                ['logo' => $logo]
            )
        );
        return response()->json([
            'success' => true,
        ]);
//        return  redirect()->route('companies.index')
//            ->with('success_message', 'The company has been successfully added');
    }

    public function show(Company $company)
    {
    return response()->json($company);
//        return view('companies.show', compact('company'));
    }

//    public function edit(Company $company)
//    {
//        return view('companies.edit', compact('company'));
//    }

    public function update(CompaniesRequest $request, Company $company)
    {
        if($request->file('logo') == null){
            $company->update($request->except('logo'));
        }else{
            Storage::delete("public/$company->logo");
            $logo = $request
                ->file('logo')
                ->store('uploads', 'public');
            $company->update(
                    array_merge(
                        $request->except('logo'),
                        ['logo' => $logo]
                    )
                );
        }
//        return  redirect()
//            ->route('companies.index')
//            ->with('success_message', 'The company has been successfully edited');
    }

    public function destroy(Company $company)
    {
        Storage::delete("public/$company->logo");
        $company->delete();
        return  redirect()
            ->route('companies.index')
            ->with('success_message', 'The company has been successfully removed');
    }
}
