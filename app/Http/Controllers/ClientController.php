<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ClientController extends Controller
{
    public function index()
    {
        return view('clients.index');
    }

    public function getClients()
    {
        $clients = Client::query();

        return Datatables::eloquent($clients)
            ->addColumn('company', function (Client $client) {
                return implode('<br>', $client->companies->pluck('name')->toArray());
            })
            ->addColumn('action', function (Client $client) {
                return ' <a href="' . route('clients.edit', $client->id) . '">
                         <img src="images/edit.png"></a><a href="' . route('clients.destroy', $client->id) . '">
                         <img src="images/delete.png" width="40px"></a>';
            })
            ->escapeColumns([])
            ->toJson();
    }

    public function store(Request $request)
    {
        $newClient = new Client();
        $newClient->name = $request->name;
        $newClient->email = $request->email;
        $newClient->phone = $request->phone;
        $newClient->save();

        foreach ($request->companies as $companyId) {
            $newClient->companies()->attach(
                $companyId
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
        $client = Client::query()->with('companies')->find($id);

        return view('clients.edit', compact('client'));
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
        Client::query()->find($id)->delete();

        return redirect()->back()->with(['success' => 'Delete client success!', Response::HTTP_OK]);
      }

    public function create()
    {
        return view('clients.create');
    }

    public function getClientsAjax()
    {
        return Client::select(['id', DB::raw("CONCAT(clients.name, ' ' ,clients.email) as name")])->get();
    }
}
