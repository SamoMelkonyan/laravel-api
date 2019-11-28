<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Http\Requests\CompaniesRequest;
use Illuminate\Support\Facades\Storage;

/**
 * Class CompaniesController
 * @package App\Http\Controllers\Api
 */
class CompaniesController extends Controller
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $companies = Company::latest()->paginate(10);
        return response()->json($companies);
    }
    public function all()
    {
        $companies = Company::latest()->get();
        return response()->json($companies);
    }

    /**
     * @param CompaniesRequest $request
     */
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

    }

    /**
     * @param Company $company
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Company $company)
    {
        return response()->json($company);
    }


    /**
     * @param CompaniesRequest $request
     * @param Company $company
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CompaniesRequest $request, Company $company)
    {
        $logo = $company->logo;
        if($request->file('logo') == null){
            $company->update($request->except('logo'));
        }else{
            Storage::delete("public/$logo");
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
        return response()->json([
            'image' => $logo
        ]);
    }

    /**
     * @param Company $company
     * @throws \Exception
     */
    public function destroy(Company $company)
    {
        Storage::delete("public/$company->logo");
        $company->delete();
    }
}
