<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Radnik;
use App\RadnoMesto;
use App\Poslodavac;

class RadniciController extends Controller
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
        $podaci = array('naslov' => 'Radnici', 'radniciActive' => 'active', 'radnici' => Radnik::orderBy('ime', 'asc')->paginate(3));
        return view('radnici.index')->with($podaci);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $podaci = array('radnaMesta' => RadnoMesto::all(), 'poslodavci' => Poslodavac::all());
        return view('radnici.create')->with($podaci);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['jmbg' => 'required|max:13|min:13', 'ime' => 'required|max:20', 'prezime' => 'required|max:30', 'godine' => 'required|max:3', 'datum_zaposlenja' => 'required|date', 'radno_mesto' => 'required|max:30', 'poslodavac' => 'required|max:13|min:13'], RadniciController::messages());
        
        $radnik = new Radnik();
        $radnik->JMBG = $request->input('jmbg');
        $radnik->ime = $request->input('ime');
        $radnik->prezime = $request->input('prezime');
        $radnik->godine = $request->input('godine');
        $datum = $request->input('datum_zaposlenja');
        $formatiranDatum = date("Y-m-d", strtotime($datum));
        $radnik->datum_zaposlenja = $formatiranDatum;
        $radnik->naziv_radnog_mesta = $request->input('radno_mesto');
        $radnik->JMBG_poslodavca = $request->input('poslodavac');
        $radnik->save();

        return redirect('/radnici')->with('success', 'Radnik je dodat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($jmbg)
    {
        $radnik = Radnik::find($jmbg);
        return view('radnici.show')->with('radnik', $radnik);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($jmbg)
    {
        $radnik = Radnik::find($jmbg);
        $radnaMesta = RadnoMesto::all();
        $datumZaposlenja = $radnik->datum_zaposlenja;
        $podaci = array('radnik' => $radnik, 'datumZaposlenja' => $datumZaposlenja, 'radnaMesta' => $radnaMesta);
        return view('radnici.edit')->with($podaci);
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
        $this->validate($request, ['jmbg' => 'required|max:13|min:13', 'ime' => 'required|max:20', 'prezime' => 'required|max:30', 'godine' => 'required|max:3', 'datum_zaposlenja' => 'required|date', 'radno_mesto' => 'required|max:30'], RadniciController::messages());

        $radnik = Radnik::find($jmbg);
        $radnik->JMBG = $jmbg;
        $radnik->ime = $request->input('ime');
        $radnik->prezime = $request->input('prezime');
        $radnik->godine = $request->input('godine');
        $datum = $request->input('datum_zaposlenja');
        $formatiranDatum = date("Y-m-d", strtotime($datum));
        $radnik->datum_zaposlenja = $formatiranDatum;
        $radnik->naziv_radnog_mesta = $request->input('radno_mesto');
        $radnik->save();

        return redirect('/radnici')->with('success', 'Radnik je izmenjen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($jmbg)
    {
        $radnik = Radnik::find($jmbg);
        $radnik->delete();
        
        return redirect('/radnici')->with('success', 'Radnik je uklonjen');
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
            'godine.max' => 'Godine ne smeju biti vece od 3 karaktera',
            'datum_zaposlenja.required' => 'Datum zaposlenja je obavezan',
            'datum_zaposlenja.date' => 'Datum zaposlenja mora biti u validnom formatu',
            'radno_mesto.required' => 'Radno mesto je obavezno',
            'radno_mesto.max' => 'Naziv radnog mesta ne sme biti veci od 30 karaktera',
            'poslodavac.required' => 'Poslodavac je obavezan',
            'poslodavac.max' => 'JMBG poslodavca mora biti tacno 13 karaktera',
            'poslodavac.min' => 'JMBG poslodavca mora biti tacno 13 karaktera'
        ];
    }
}