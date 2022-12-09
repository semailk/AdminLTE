<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('companies.index');
    }

    public function getCompanies()
    {
        $companies = Company::query();

        return Datatables::eloquent($companies)
            ->addColumn('client', function (Company $company) {
                return implode('<br>', $company->clients->pluck('name')->toArray());
            })
            ->addColumn('action', function (Company $company) {
                return '<a href="' . route('companies.edit', $company->id) . '"> <img src="images/edit.png"></a>
                <a href="'. route('companies.destroy', $company->id) .'">
                         <img src="images/delete.png" width="40px"></a>';
            })
            ->escapeColumns([])
            ->toJson();
    }

    public function create()
    {
        return \view('companies.create');
    }

    public function store(Request $request)
    {
        $newCompany = new Company();
        $newCompany->name = $request->name;
        $newCompany->save();

        foreach ($request->clients as $clientId) {
            $newCompany->clients()->attach(
                $clientId
            );
        }

        return response()->json(['status' => 'success'], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $company = Company::query()->with('clients')->find($id);

        return \view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        Company::query()->find($id)->delete();

        return redirect()->back()->with(['success' => 'Delete company success!', Response::HTTP_OK]);

    }

    public function getCompaniesAjax()
    {
        return Client::select(['id', "name"])->get();
    }
}
