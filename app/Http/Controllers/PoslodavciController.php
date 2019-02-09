<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poslodavac;

class PoslodavciController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $podaci = array('naslov' => 'Poslodavci', 'poslodavciActive' => 'active', 'poslodavci' => Poslodavac::orderBy('ime', 'asc')->paginate(3));
        return view('poslodavci.index')->with($podaci);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poslodavci.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['jmbg' => 'required|max:13|min:13', 'ime' => 'required|max:20', 'prezime' => 'required|max:30', 'godine' => 'required|max:3'], PoslodavciController::messages());

        $poslodavac = new Poslodavac();
        $poslodavac->JMBG = $request->input('jmbg');
        $poslodavac->ime = $request->input('ime');
        $poslodavac->prezime = $request->input('prezime');
        $poslodavac->godine = $request->input('godine');
        $poslodavac->save();

        return redirect('/poslodavci')->with('success', 'Poslodavac je dodat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($jmbg)
    {
        $poslodavac = Poslodavac::find($jmbg);
        return view('poslodavci.show')->with('poslodavac', $poslodavac);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($jmbg)
    {
        $poslodavac = Poslodavac::find($jmbg);
        return view('poslodavci.edit')->with('poslodavac', $poslodavac);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $jmbg)
    {
        $this->validate($request, ['ime' => 'required|max:20', 'prezime' => 'required|max:30', 'godine' => 'required|max:3'], PoslodavciController::messages());

        $poslodavac = Poslodavac::find($jmbg);
        $poslodavac->JMBG = $jmbg;
        $poslodavac->ime = $request->input('ime');
        $poslodavac->prezime = $request->input('prezime');
        $poslodavac->godine = $request->input('godine');
        $poslodavac->save();

        return redirect('/poslodavci')->with('success', 'Poslodavac je izmenjen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($jmbg)
    {
        $poslodavac = Poslodavac::find($jmbg);
        $poslodavac->delete();

        return redirect('/poslodavci')->with('success', 'Poslodavac je uklonjen');
    }

    public function messages() {
        return [
            'jmbg.required' => 'JMBG je obavezan',
            'jmbg.max' => 'JMBG mora biti tacno 13 karaktera',
            'jmbg.min' => 'JMBG mora biti tacno 13 karaktera',
            'ime.required' => 'Ime je obavezno',
            'ime.max' => 'Ime ne sme biti vece od 20 karaktera',
            'prezime.required' => 'Prezime je obavezno',
            'prezime.max' => 'Prezime ne sme biti vece od 30 karaktera',
            'godine.required' => 'Godine su obavezne',
            'godine.max' => 'Godine ne smeju biti vece od 3 karaktera'
        ];
    }
}
