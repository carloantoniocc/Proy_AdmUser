<?php

namespace AdmUsers\Http\Controllers;

use AdmUsers\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {

        $categories = Categorie::Search($request->name)->select('id','name','active')->orderBy('id')->paginate(10);
        return view('Categorie.index',compact('categories'));
    }

    public function create()
    {
        return view('Categorie.create');
    }

    public function store(Request $request)
    {
        //Validacion
        //dd($request);
        
        //Almacenamiento
        $categorie = new Categorie;
        $categorie->name = $request->name;
        $categorie->active = $request->active;
        $categorie->save();

        //Redireccion
        //return 'Se ha almacenado el establecimiento';
        return redirect('/Categorie')->with('message','store');
    }


    public function edit($id)
    {

        $categorie = Categorie::find($id);
        return view('Categorie.edit',compact('categorie'));

    }


    public function update(Request $request, $id)
    {
        //dd($request);
        $categorie = Categorie::find($id);
        $categorie->name = $request->input('name');
        $categorie->active = $request->input('active');
            
        $categorie->save();           
        
        return redirect('/Categorie')->with('message','update');

    }

}
