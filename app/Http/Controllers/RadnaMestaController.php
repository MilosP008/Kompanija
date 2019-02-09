<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RadnoMesto;

class RadnaMestaController extends Controller
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
        $podaci = array('naslov' => 'Radna mesta', 'radnaMestaActive' => 'active', 'radnaMesta' => RadnoMesto::orderBy('naziv', 'asc')->paginate(3));
        return view('radna_mesta.index')->with($podaci);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('radna_mesta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['naziv' => 'required|max:30'], RadnaMestaController::messages());

        $radnoMesto = new RadnoMesto();
        $radnoMesto->naziv = $request->input('naziv');
        $radnoMesto->save();

        return redirect('/radnamesta')->with('success', 'Radno mesto je dodato');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($naziv)
    {
        $radnoMesto = RadnoMesto::find($naziv);
        return view('radna_mesta.show')->with('radnoMesto', $radnoMesto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($naziv)
    {
        $radnoMesto = RadnoMesto::find($naziv);
        return view('radna_mesta.edit')->with('radnoMesto', $radnoMesto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $naziv)
    {
        $this->validate($request, ['naziv' => 'required|max:30'], RadnaMestaController::messages());

        $radnoMesto = RadnoMesto::find($naziv);
        $radnoMesto->naziv = $request->input('naziv');
        $radnoMesto->save();

        return redirect('/radnamesta')->with('success', 'Radno mesto je izmenjeno');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($naziv)
    {
        $radnoMesto = RadnoMesto::find($naziv);
        $radnoMesto->delete();

        return redirect('/radnamesta')->with('success', 'Radno mesto je uklonjeno');
    }

    public function messages() {
        return [
            'naziv.required' => 'Naziv je obavezan',
            'naziv.max' => 'Naziv ne sme biti veci od 30 karaktera'
        ];
    }
}
