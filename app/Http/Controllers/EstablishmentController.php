<?php

namespace AdmUsers\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use AdmUsers\Establishment;
use Illuminate\Http\Request;
use App\Http\Auth;
use AdmUsers\Comuna;
use AdmUsers\TipoEstab;


class EstablishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
        //Controladores de usuarios
        //$this->middleware('admin');
    }


    public function index(Request $request)
    {

        $establishments = Establishment::Search($request->name)->select('id','code','name','active')->orderBy('id')->paginate(10);
        return view('Establishment.index',compact('establishments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comunas     = Comuna::where('active',1)->orderBy('name')->get();
        $tipos       = TipoEstab::where('active',1)->orderBy('name')->get();        
        
        return view('Establishment.create', compact('comunas','tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validator = validator::make($request->all(), [
            'code' => 'required|string|max:150|unique:establishments',
            'name' => 'required|string|max:150|unique:establishments',
            'tipo' => 'required',
            'comuna' => 'required',
            'direccion' => 'required|string|max:150',
        ]);

        if ($validator->fails()) {
            return redirect('/Establishment/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        else 
        {
            //dd($request);
            $establishment = new Establishment;
            
            $establishment->code = $request->input('code');
            $establishment->name = $request->input('name');
            $establishment->tipo_id = $request->input('tipo');
            $establishment->comuna_id = $request->input('comuna');
            $establishment->direccion = $request->input('direccion');
            $establishment->X = $request->input('x');
            $establishment->Y = $request->input('y');
            $establishment->active = $request->input('active');
        
            $establishment->save();           
            
            return redirect('/Establishment')->with('message','store');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return view('Establishment.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $establishment = Establishment::find($id);
        $comunas     = Comuna::where('active',1)->orderBy('name')->get();
        $tipos       = TipoEstab::where('active',1)->orderBy('name')->get();;

        return view('Establishment.edit',compact('establishment','comunas','tipos'));

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

        $validator = validator::make($request->all(), [
            'code' => 'required|string|max:150|unique:establishments,code,'.$id,
            'name' => 'required|string|max:150|unique:establishments,name,'.$id,
            'tipo' => 'required',
            'comuna' => 'required',
            'direccion' => 'required|string|max:150',
        ]);
        
        if ($validator->fails()) {
            return redirect('Establishment/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
        else 
        {
            $establishment = Establishment::find($id);
            
            $establishment->code = $request->input('code');
            $establishment->name = $request->input('name');
            $establishment->tipo_id = $request->input('tipo');
            $establishment->comuna_id = $request->input('comuna');
            $establishment->direccion = $request->input('direccion');
            $establishment->x = $request->input('x');
            $establishment->y = $request->input('y');
            $establishment->active = $request->input('active');
        
            $establishment->save();           
            
            return redirect('/Establishment')->with('message','update');
        }

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
