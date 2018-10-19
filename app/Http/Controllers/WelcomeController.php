<?php

namespace AdmUsers\Http\Controllers;

use AdmUsers\Employe;
use AdmUsers\Department;
use AdmUsers\Establishment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cookie;



class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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


            $employes = $employes->where('employes.active', '=', 1 );
            $employes = $employes->orderBy('email','desc')->paginate(10);


        
            
        return view('welcome',['employes'=> $employes]);
    }


    public function search()
    {

        $departments = Department::select('id','name','active')->where('active',1)->orderBy('name')->get();
        $establishments = Establishment::select('id','name','active')->where('active',1)->orderBy('id')->get();

        return view('Welcome.search',compact('departments','establishments'));

    }


}
