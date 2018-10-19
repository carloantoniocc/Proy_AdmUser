<?php

namespace AdmUsers\Http\Controllers;

use Illuminate\Http\Request;
use AdmUsers\Department;
use App\Http\Auth;



class DepartmentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        //dd($request->name);
        $departments = Department::Search($request->name)->select('id','name','active')->orderBy('id')->paginate(10);
        return view('Department.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validacion
        //dd($request);
        
        //Almacenamiento
        $department = new Department;
        $department->name = $request->name;
        $department->active = $request->active;
        $department->save();




        //Redireccion
        //return 'Se ha almacenado el establecimiento';
        return redirect('/Department')->with('message','store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
        return view('Department.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $department = Department::find($id);
        return view('Department.edit',compact('department'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $department = Department::find($id);
        $department->name = $request->input('name');
        $department->active = $request->input('active');
            
        $department->save();           
        
        return redirect('/Department')->with('message','update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
