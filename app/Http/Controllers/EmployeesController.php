<?php namespace App\Http\Controllers;

use App\Http\Middleware\VerifyCsrfToken;
use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Companies;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EmployeesController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /employees
	 *
	 * @return Response
	 */
	public function index()
	{

        $employees = Employees::all();
        return view('employees.index', compact('employees'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /employees/create
	 *
	 * @return Response
	 */
	public function create()
	{

        $employees = Employees::all()->toArray();

        return view('employees.create', compact('employees'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /employees
	 *
	 * @return Response
	 */
    public function store(StoreEmployeeRequest $request)
    {
        Employees::create($request->all());
        return redirect()->route('employees.index')->with(['message' => 'Įrašas pridėtas']);
    }

	/**
	 * Display the specified resource.
	 * GET /employees/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
    {
        $employees = Employees::find($id);
        return view('employees.show', compact('employees'));
    }

	/**
	 * Show the form for editing the specified resource.
	 * GET /employees/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $employees = Employees::findOrFail($id);
        return view('employees.edit', compact('employees'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /employees/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{

        $employees = Employees::findOrFail($id);
        $employees->update($request->all());
        return redirect()->route('employees.index');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /employees/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $employees = Employees::findOrFail($id);
        $employees->delete();
        return redirect()->route('employees.index')->with(['message-delete' => 'Įrašas ištrintas']);
	}

}