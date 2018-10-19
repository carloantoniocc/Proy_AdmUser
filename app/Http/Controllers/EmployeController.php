<?php

namespace AdmUsers\Http\Controllers;

use AdmUsers\Employe;
use AdmUsers\Department;
use AdmUsers\Categorie;
use AdmUsers\Establishment;
use AdmUsers\PhoneModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeController extends Controller
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

        //dd($request);
        $employes = DB::table('employes')
            ->join('departments', 'employes.department_id', '=', 'departments.id')
            ->join('establishments', 'employes.establishment_id', '=', 'establishments.id')
            ->select('employes.*', 'departments.name as departamento', 'establishments.name as establecimiento');

        if ($request->name != null) {
            $employes = $employes->where('employes.name', 'LIKE', "%{$request->name}%" );
        }    


        if ($request->anexo != null) {
            $employes = $employes->where('employes.anexo', 'LIKE', "%{$request->anexo}%" );
        }           
        

        if ($request->ape_paterno != null) {
            $employes = $employes->where('employes.ape_paterno', 'LIKE', "%{$request->ape_paterno}%" );
        }   

        if ($request->ape_materno != null) {
            $employes = $employes->where('employes.ape_materno', 'LIKE', "%{$request->ape_materno}%" );
        } 

        if ($request->department_id != null and $request->department_id != 0) {
            $employes = $employes->where('employes.department_id', '=', $request->department_id );
        } 

        if ($request->establishment_id != null and $request->establishment_id != 0) {
            $employes = $employes->where('employes.establishment_id', '=', $request->establishment_id );
        } 


        if ($request->active != null) {
            $employes = $employes->where('employes.active', '=', $request->active);
        } 

        $employes = $employes->orderBy('email','desc')->paginate(10);



        return view('Employe.index',['employes'=> $employes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::select('id','name','active')->where('active',1)->orderBy('name')->get();
        $categories = Categorie::select('id','name','active')->where('active',1)->orderBy('id')->get();
        $establishments = Establishment::select('id','name','active')->where('active',1)->orderBy('id')->get();
        $phonemodels = PhoneModel::select('id','name','active')->where('active',1)->orderBy('id')->get();


        return view('Employe.create',compact('departments','categories','establishments','phonemodels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //dd($request);
        $employe = new Employe;
        //$employe->fecha_ingreso = "12/12/2017";
        $employe->ape_paterno = $request->ape_paterno;
        $employe->ape_materno = $request->ape_materno;
        $employe->name = $request->name;
        $employe->email = $request->email;
        $employe->anexo = $request->anexo;
        $employe->piso = $request->piso;
        $employe->active = $request->active;
        $employe->establishment_id = $request->establishment_id;
        $employe->department_id = $request->department_id;
        $employe->categorie_id = $request->categorie_id;
        $employe->phonemodel_id = $request->phonemodel_id;
        $employe->save();

        return redirect('/Employe')->with('message','store');

    }

    /**
     * Display the specified resource.
     *
     * @param  \AdmUsers\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(Employe $employe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \AdmUsers\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit(Employe $employe, $id)
    {
        

        $employes = Employe::find($id);
        $departments = Department::select('id','name','active')->where('active',1)->orderBy('id')->paginate(500);
        $establishments = Establishment::select('id','name','active')->where('active',1)->orderBy('id')->paginate(50);
        $categories = Categorie::select('id','name','active')->where('active',1)->orderBy('id')->paginate(10);
        $phonemodels = PhoneModel::select('id','name','active')->where('active',1)->orderBy('id')->paginate(10);

        //dd($employes);
        return view('Employe.edit',compact('employes','departments','establishments','categories','phonemodels'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \AdmUsers\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $employe = Employe::find($id);
        $employe->ape_paterno = $request->ape_paterno;
        $employe->ape_materno = $request->ape_materno;
        $employe->name = $request->name;
        $employe->email = $request->email;
        $employe->anexo = $request->anexo;
        $employe->piso = $request->piso;
        $employe->active = $request->active;
        $employe->establishment_id = $request->establishment_id;
        $employe->department_id = $request->department_id;
        $employe->categorie_id = $request->categorie_id;
        $employe->phonemodel_id = $request->phonemodel_id;
        $employe->save();

        //dd($employe);
        return redirect('/Employe')->with('message','update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \AdmUsers\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $employe)
    {
        //
    }

    public function search(Request $request)
    {

        $departments = Department::select('id','name','active')->where('active',1)->orderBy('name')->get();
        $establishments = Establishment::select('id','name','active')->where('active',1)->orderBy('id')->get();

        return view('Employe.search',compact('departments','establishments'));
    }

}
