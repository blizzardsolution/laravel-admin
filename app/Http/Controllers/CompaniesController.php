<?php namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     * GET /companies
     *
     * @return Response
     */
    public function index()
    {
        $companies = Companies::all();

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     * GET /companies/create
     *
     * @return Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     * POST /companies
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $image = Input::file('logo');
        $imageName = time().'.'. $image->getClientOriginalExtension();

        $image->move(public_path('/images'), $imageName);

        Companies::create([
            'name' => $request['name'],
            'address' => $request['address'],
            'logo' => $imageName,
        ]);

        return redirect()->route('companies.index')->with(['message' => 'Įrašas pridėtas']);

    }

    /**
     * Display the specified resource.
     * GET /companies/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $companies = Companies::find($id);
        return view('companies.show', compact('companies'));
    }

    /**
     * Show the form for editing the specified resource.
     * GET /companies/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $companies = Companies::findOrFail($id);
        return view('companies.edit', compact('companies'));
    }

    /**
     * Update the specified resource in storage.
     * PUT /companies/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
        $companies = Companies::findOrFail($id);
        $companies->update($request->all());
        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /companies/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $companies = Companies::findOrFail($id);
        $companies->delete();
        return redirect()->route('companies.index')->with(['message-delete' => 'Įrašas ištrintas']);
    }

}