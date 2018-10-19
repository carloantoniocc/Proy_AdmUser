<?php

namespace AdmUsers\Http\Controllers;

use AdmUsers\PhoneModel;
use Illuminate\Http\Request;

class PhoneModelController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {

        $phonemodels = PhoneModel::Search($request->name)->select('id','name','active')->orderBy('id')->paginate(10);
        return view('PhoneModel.index',compact('phonemodels'));
    }

    public function create()
    {
        return view('PhoneModel.create');
    }


    public function store(Request $request)
    {
        //Validacion
        //dd($request);
        
        //Almacenamiento
        $phonemodel = new PhoneModel;
        $phonemodel->name = $request->name;
        $phonemodel->active = $request->active;
        $phonemodel->save();




        //Redireccion
        //return 'Se ha almacenado el establecimiento';
        return redirect('/PhoneModel')->with('message','store');
    }


    public function edit($id)
    {

        $phonemodel = PhoneModel::find($id);
        return view('PhoneModel.edit',compact('phonemodel'));

    }

    public function update(Request $request, $id)
    {
        //dd($request);
        $phonemodel = PhoneModel::find($id);
        $phonemodel->name = $request->input('name');
        $phonemodel->active = $request->input('active');
            
        $phonemodel->save();           
        
        return redirect('/PhoneModel')->with('message','update');

    }



}
