<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Guia as Guia;

use App\Models\Guiaproduccion as Guiaproduccion;

class GuiaProduccionPonedoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Avicol/GuiaProduccionPonedora/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //Validaciones
        $messages = [
            'nombreGui.required' => 'El campo Nombre es obligatorio',
            'nombreGui.unique' => 'El moduloGui ingresado ya se encuentra registrado',
        ];
        $rules = [
            'nombreGui' => 'required|unique:guias',
        ];

        $this->validate($request, $rules , $messages);

        $guia = new Guia;
        $guia->nombreGui = $request->nombreGui;
        $guia->moduloGui = 'Ponedoras Produccion';
        $guia->save();

        $guiaproduccionponedoras = new Guiaproduccion;
        $guiaproduccionponedoras->semanaGup = 1;
        $guiaproduccionponedoras->tbGup = $request->tbGup;
        $guiaproduccionponedoras->tb1Gup = $request->tb1Gup;
        $guiaproduccionponedoras->tb2Gup = $request->tb2Gup;
        $guiaproduccionponedoras->real4Gup = $request->real4Gup;
        $guiaproduccionponedoras->tab1Gup = $request->tab1Gup;
        $guiaproduccionponedoras->real5Gup = $request->real5Gup;
        $guiaproduccionponedoras->tab2Gup = $request->tab2Gup;
        $guiaproduccionponedoras->prodtbGup = $request->prodtbGup;
        $guiaproduccionponedoras->haatabGup = $request->haatabGup;
        $guiaproduccionponedoras->grtbGup = $request->grtbGup;
        $guiaproduccionponedoras->pesohuevotablaGup = $request->pesohuevotablaGup;
        $guiaproduccionponedoras->idGuia = $guia->id;
        $guiaproduccionponedoras->save();
        $guiaproduccionponedoras1 = new Guiaproduccion;
        $guiaproduccionponedoras1->semanaGup = 2;
        $guiaproduccionponedoras1->tbGup = $request->tbGup1;
        $guiaproduccionponedoras1->tb1Gup = $request->tb1Gup1;
        $guiaproduccionponedoras1->tb2Gup = $request->tb2Gup1;
        $guiaproduccionponedoras1->real4Gup = $request->real4Gup1;
        $guiaproduccionponedoras1->tab1Gup = $request->tab1Gup1;
        $guiaproduccionponedoras1->real5Gup = $request->real5Gup1;
        $guiaproduccionponedoras1->tab2Gup = $request->tab2Gup1;
        $guiaproduccionponedoras1->prodtbGup = $request->prodtbGup1;
        $guiaproduccionponedoras1->haatabGup = $request->haatabGup1;
        $guiaproduccionponedoras1->grtbGup = $request->grtbGup1;
        $guiaproduccionponedoras1->pesohuevotablaGup = $request->pesohuevotablaGup1;
        $guiaproduccionponedoras1->idGuia = $guia->id;
        $guiaproduccionponedoras1->save();
        $guiaproduccionponedoras2 = new Guiaproduccion;
        $guiaproduccionponedoras2->semanaGup = 3;
        $guiaproduccionponedoras2->tbGup = $request->tbGup2;
        $guiaproduccionponedoras2->tb1Gup = $request->tb1Gup2;
        $guiaproduccionponedoras2->tb2Gup = $request->tb2Gup2;
        $guiaproduccionponedoras2->real4Gup = $request->real4Gup2;
        $guiaproduccionponedoras2->tab1Gup = $request->tab1Gup2;
        $guiaproduccionponedoras2->real5Gup = $request->real5Gup2;
        $guiaproduccionponedoras2->tab2Gup = $request->tab2Gup2;
        $guiaproduccionponedoras2->prodtbGup = $request->prodtbGup2;
        $guiaproduccionponedoras2->haatabGup = $request->haatabGup2;
        $guiaproduccionponedoras2->grtbGup = $request->grtbGup2;
        $guiaproduccionponedoras2->pesohuevotablaGup = $request->pesohuevotablaGup2;
        $guiaproduccionponedoras2->idGuia = $guia->id;
        $guiaproduccionponedoras2->save();
        $guiaproduccionponedoras3 = new Guiaproduccion;
        $guiaproduccionponedoras3->semanaGup = 4;
        $guiaproduccionponedoras3->tbGup = $request->tbGup3;
        $guiaproduccionponedoras3->tb1Gup = $request->tb1Gup3;
        $guiaproduccionponedoras3->tb2Gup = $request->tb2Gup3;
        $guiaproduccionponedoras3->real4Gup = $request->real4Gup3;
        $guiaproduccionponedoras3->tab1Gup = $request->tab1Gup3;
        $guiaproduccionponedoras3->real5Gup = $request->real5Gup3;
        $guiaproduccionponedoras3->tab2Gup = $request->tab2Gup3;
        $guiaproduccionponedoras3->prodtbGup = $request->prodtbGup3;
        $guiaproduccionponedoras3->haatabGup = $request->haatabGup3;
        $guiaproduccionponedoras3->grtbGup = $request->grtbGup3;
        $guiaproduccionponedoras3->pesohuevotablaGup = $request->pesohuevotablaGup3;
        $guiaproduccionponedoras3->idGuia = $guia->id;
        $guiaproduccionponedoras3->save();
        $guiaproduccionponedoras4 = new Guiaproduccion;
        $guiaproduccionponedoras4->semanaGup = 5;
        $guiaproduccionponedoras4->tbGup = $request->tbGup4;
        $guiaproduccionponedoras4->tb1Gup = $request->tb1Gup4;
        $guiaproduccionponedoras4->tb2Gup = $request->tb2Gup4;
        $guiaproduccionponedoras4->real4Gup = $request->real4Gup4;
        $guiaproduccionponedoras4->tab1Gup = $request->tab1Gup4;
        $guiaproduccionponedoras4->real5Gup = $request->real5Gup4;
        $guiaproduccionponedoras4->tab2Gup = $request->tab2Gup4;
        $guiaproduccionponedoras4->prodtbGup = $request->prodtbGup4;
        $guiaproduccionponedoras4->haatabGup = $request->haatabGup4;
        $guiaproduccionponedoras4->grtbGup = $request->grtbGup4;
        $guiaproduccionponedoras4->pesohuevotablaGup = $request->pesohuevotablaGup4;
        $guiaproduccionponedoras4->idGuia = $guia->id;
        $guiaproduccionponedoras4->save();
        $guiaproduccionponedoras5 = new Guiaproduccion;
        $guiaproduccionponedoras5->semanaGup = 6;
        $guiaproduccionponedoras5->tbGup = $request->tbGup5;
        $guiaproduccionponedoras5->tb1Gup = $request->tb1Gup5;
        $guiaproduccionponedoras5->tb2Gup = $request->tb2Gup5;
        $guiaproduccionponedoras5->real4Gup = $request->real4Gup5;
        $guiaproduccionponedoras5->tab1Gup = $request->tab1Gup5;
        $guiaproduccionponedoras5->real5Gup = $request->real5Gup5;
        $guiaproduccionponedoras5->tab2Gup = $request->tab2Gup5;
        $guiaproduccionponedoras5->prodtbGup = $request->prodtbGup5;
        $guiaproduccionponedoras5->haatabGup = $request->haatabGup5;
        $guiaproduccionponedoras5->grtbGup = $request->grtbGup5;
        $guiaproduccionponedoras5->pesohuevotablaGup = $request->pesohuevotablaGup5;
        $guiaproduccionponedoras5->idGuia = $guia->id;
        $guiaproduccionponedoras5->save();
        $guiaproduccionponedoras6 = new Guiaproduccion;
        $guiaproduccionponedoras6->semanaGup = 7;
        $guiaproduccionponedoras6->tbGup = $request->tbGup6;
        $guiaproduccionponedoras6->tb1Gup = $request->tb1Gup6;
        $guiaproduccionponedoras6->tb2Gup = $request->tb2Gup6;
        $guiaproduccionponedoras6->real4Gup = $request->real4Gup6;
        $guiaproduccionponedoras6->tab1Gup = $request->tab1Gup6;
        $guiaproduccionponedoras6->real5Gup = $request->real5Gup6;
        $guiaproduccionponedoras6->tab2Gup = $request->tab2Gup6;
        $guiaproduccionponedoras6->prodtbGup = $request->prodtbGup6;
        $guiaproduccionponedoras6->haatabGup = $request->haatabGup6;
        $guiaproduccionponedoras6->grtbGup = $request->grtbGup6;
        $guiaproduccionponedoras6->pesohuevotablaGup = $request->pesohuevotablaGup6;
        $guiaproduccionponedoras6->idGuia = $guia->id;
        $guiaproduccionponedoras6->save();
        $guiaproduccionponedoras7 = new Guiaproduccion;
        $guiaproduccionponedoras7->semanaGup = 8;
        $guiaproduccionponedoras7->tbGup = $request->tbGup7;
        $guiaproduccionponedoras7->tb1Gup = $request->tb1Gup7;
        $guiaproduccionponedoras7->tb2Gup = $request->tb2Gup7;
        $guiaproduccionponedoras7->real4Gup = $request->real4Gup7;
        $guiaproduccionponedoras7->tab1Gup = $request->tab1Gup7;
        $guiaproduccionponedoras7->real5Gup = $request->real5Gup7;
        $guiaproduccionponedoras7->tab2Gup = $request->tab2Gup7;
        $guiaproduccionponedoras7->prodtbGup = $request->prodtbGup7;
        $guiaproduccionponedoras7->haatabGup = $request->haatabGup7;
        $guiaproduccionponedoras7->grtbGup = $request->grtbGup7;
        $guiaproduccionponedoras7->pesohuevotablaGup = $request->pesohuevotablaGup7;
        $guiaproduccionponedoras7->idGuia = $guia->id;
        $guiaproduccionponedoras7->save();
        $guiaproduccionponedoras8 = new Guiaproduccion;
        $guiaproduccionponedoras8->semanaGup = 9;
        $guiaproduccionponedoras8->tbGup = $request->tbGup8;
        $guiaproduccionponedoras8->tb1Gup = $request->tb1Gup8;
        $guiaproduccionponedoras8->tb2Gup = $request->tb2Gup8;
        $guiaproduccionponedoras8->real4Gup = $request->real4Gup8;
        $guiaproduccionponedoras8->tab1Gup = $request->tab1Gup8;
        $guiaproduccionponedoras8->real5Gup = $request->real5Gup8;
        $guiaproduccionponedoras8->tab2Gup = $request->tab2Gup8;
        $guiaproduccionponedoras8->prodtbGup = $request->prodtbGup8;
        $guiaproduccionponedoras8->haatabGup = $request->haatabGup8;
        $guiaproduccionponedoras8->grtbGup = $request->grtbGup8;
        $guiaproduccionponedoras8->pesohuevotablaGup = $request->pesohuevotablaGup8;
        $guiaproduccionponedoras8->idGuia = $guia->id;
        $guiaproduccionponedoras8->save();
        $guiaproduccionponedoras9 = new Guiaproduccion;
        $guiaproduccionponedoras9->semanaGup = 10;
        $guiaproduccionponedoras9->tbGup = $request->tbGup9;
        $guiaproduccionponedoras9->tb1Gup = $request->tb1Gup9;
        $guiaproduccionponedoras9->tb2Gup = $request->tb2Gup9;
        $guiaproduccionponedoras9->real4Gup = $request->real4Gup9;
        $guiaproduccionponedoras9->tab1Gup = $request->tab1Gup9;
        $guiaproduccionponedoras9->real5Gup = $request->real5Gup9;
        $guiaproduccionponedoras9->tab2Gup = $request->tab2Gup9;
        $guiaproduccionponedoras9->prodtbGup = $request->prodtbGup9;
        $guiaproduccionponedoras9->haatabGup = $request->haatabGup9;
        $guiaproduccionponedoras9->grtbGup = $request->grtbGup9;
        $guiaproduccionponedoras9->pesohuevotablaGup = $request->pesohuevotablaGup9;
        $guiaproduccionponedoras9->idGuia = $guia->id;
        $guiaproduccionponedoras9->save();
        $guiaproduccionponedoras10 = new Guiaproduccion;
        $guiaproduccionponedoras10->semanaGup = 11;
        $guiaproduccionponedoras10->tbGup = $request->tbGup10;
        $guiaproduccionponedoras10->tb1Gup = $request->tb1Gup10;
        $guiaproduccionponedoras10->tb2Gup = $request->tb2Gup10;
        $guiaproduccionponedoras10->real4Gup = $request->real4Gup10;
        $guiaproduccionponedoras10->tab1Gup = $request->tab1Gup10;
        $guiaproduccionponedoras10->real5Gup = $request->real5Gup10;
        $guiaproduccionponedoras10->tab2Gup = $request->tab2Gup10;
        $guiaproduccionponedoras10->prodtbGup = $request->prodtbGup10;
        $guiaproduccionponedoras10->haatabGup = $request->haatabGup10;
        $guiaproduccionponedoras10->grtbGup = $request->grtbGup10;
        $guiaproduccionponedoras10->pesohuevotablaGup = $request->pesohuevotablaGup10;
        $guiaproduccionponedoras10->idGuia = $guia->id;
        $guiaproduccionponedoras10->save();
        $guiaproduccionponedoras11 = new Guiaproduccion;
        $guiaproduccionponedoras11->semanaGup = 12;
        $guiaproduccionponedoras11->tbGup = $request->tbGup11;
        $guiaproduccionponedoras11->tb1Gup = $request->tb1Gup11;
        $guiaproduccionponedoras11->tb2Gup = $request->tb2Gup11;
        $guiaproduccionponedoras11->real4Gup = $request->real4Gup11;
        $guiaproduccionponedoras11->tab1Gup = $request->tab1Gup11;
        $guiaproduccionponedoras11->real5Gup = $request->real5Gup11;
        $guiaproduccionponedoras11->tab2Gup = $request->tab2Gup11;
        $guiaproduccionponedoras11->prodtbGup = $request->prodtbGup11;
        $guiaproduccionponedoras11->haatabGup = $request->haatabGup11;
        $guiaproduccionponedoras11->grtbGup = $request->grtbGup11;
        $guiaproduccionponedoras11->pesohuevotablaGup = $request->pesohuevotablaGup11;
        $guiaproduccionponedoras11->idGuia = $guia->id;
        $guiaproduccionponedoras11->save();
        $guiaproduccionponedoras12 = new Guiaproduccion;
        $guiaproduccionponedoras12->semanaGup = 13;
        $guiaproduccionponedoras12->tbGup = $request->tbGup12;
        $guiaproduccionponedoras12->tb1Gup = $request->tb1Gup12;
        $guiaproduccionponedoras12->tb2Gup = $request->tb2Gup12;
        $guiaproduccionponedoras12->real4Gup = $request->real4Gup12;
        $guiaproduccionponedoras12->tab1Gup = $request->tab1Gup12;
        $guiaproduccionponedoras12->real5Gup = $request->real5Gup12;
        $guiaproduccionponedoras12->tab2Gup = $request->tab2Gup12;
        $guiaproduccionponedoras12->prodtbGup = $request->prodtbGup12;
        $guiaproduccionponedoras12->haatabGup = $request->haatabGup12;
        $guiaproduccionponedoras12->grtbGup = $request->grtbGup12;
        $guiaproduccionponedoras12->pesohuevotablaGup = $request->pesohuevotablaGup12;
        $guiaproduccionponedoras12->idGuia = $guia->id;
        $guiaproduccionponedoras12->save();
        $guiaproduccionponedoras13 = new Guiaproduccion;
        $guiaproduccionponedoras13->semanaGup = 14;
        $guiaproduccionponedoras13->tbGup = $request->tbGup13;
        $guiaproduccionponedoras13->tb1Gup = $request->tb1Gup13;
        $guiaproduccionponedoras13->tb2Gup = $request->tb2Gup13;
        $guiaproduccionponedoras13->real4Gup = $request->real4Gup13;
        $guiaproduccionponedoras13->tab1Gup = $request->tab1Gup13;
        $guiaproduccionponedoras13->real5Gup = $request->real5Gup13;
        $guiaproduccionponedoras13->tab2Gup = $request->tab2Gup13;
        $guiaproduccionponedoras13->prodtbGup = $request->prodtbGup13;
        $guiaproduccionponedoras13->haatabGup = $request->haatabGup13;
        $guiaproduccionponedoras13->grtbGup = $request->grtbGup13;
        $guiaproduccionponedoras13->pesohuevotablaGup = $request->pesohuevotablaGup13;
        $guiaproduccionponedoras13->idGuia = $guia->id;
        $guiaproduccionponedoras13->save();
        $guiaproduccionponedoras14 = new Guiaproduccion;
        $guiaproduccionponedoras14->semanaGup = 15;
        $guiaproduccionponedoras14->tbGup = $request->tbGup14;
        $guiaproduccionponedoras14->tb1Gup = $request->tb1Gup14;
        $guiaproduccionponedoras14->tb2Gup = $request->tb2Gup14;
        $guiaproduccionponedoras14->real4Gup = $request->real4Gup14;
        $guiaproduccionponedoras14->tab1Gup = $request->tab1Gup14;
        $guiaproduccionponedoras14->real5Gup = $request->real5Gup14;
        $guiaproduccionponedoras14->tab2Gup = $request->tab2Gup14;
        $guiaproduccionponedoras14->prodtbGup = $request->prodtbGup14;
        $guiaproduccionponedoras14->haatabGup = $request->haatabGup14;
        $guiaproduccionponedoras14->grtbGup = $request->grtbGup14;
        $guiaproduccionponedoras14->pesohuevotablaGup = $request->pesohuevotablaGup14;
        $guiaproduccionponedoras14->idGuia = $guia->id;
        $guiaproduccionponedoras14->save();
        $guiaproduccionponedoras15 = new Guiaproduccion;
        $guiaproduccionponedoras15->semanaGup = 16;
        $guiaproduccionponedoras15->tbGup = $request->tbGup15;
        $guiaproduccionponedoras15->tb1Gup = $request->tb1Gup15;
        $guiaproduccionponedoras15->tb2Gup = $request->tb2Gup15;
        $guiaproduccionponedoras15->real4Gup = $request->real4Gup15;
        $guiaproduccionponedoras15->tab1Gup = $request->tab1Gup15;
        $guiaproduccionponedoras15->real5Gup = $request->real5Gup15;
        $guiaproduccionponedoras15->tab2Gup = $request->tab2Gup15;
        $guiaproduccionponedoras15->prodtbGup = $request->prodtbGup15;
        $guiaproduccionponedoras15->haatabGup = $request->haatabGup15;
        $guiaproduccionponedoras15->grtbGup = $request->grtbGup15;
        $guiaproduccionponedoras15->pesohuevotablaGup = $request->pesohuevotablaGup15;
        $guiaproduccionponedoras15->idGuia = $guia->id;
        $guiaproduccionponedoras15->save();
        $guiaproduccionponedoras16 = new Guiaproduccion;
        $guiaproduccionponedoras16->semanaGup = 17;
        $guiaproduccionponedoras16->tbGup = $request->tbGup16;
        $guiaproduccionponedoras16->tb1Gup = $request->tb1Gup16;
        $guiaproduccionponedoras16->tb2Gup = $request->tb2Gup16;
        $guiaproduccionponedoras16->real4Gup = $request->real4Gup16;
        $guiaproduccionponedoras16->tab1Gup = $request->tab1Gup16;
        $guiaproduccionponedoras16->real5Gup = $request->real5Gup16;
        $guiaproduccionponedoras16->tab2Gup = $request->tab2Gup16;
        $guiaproduccionponedoras16->prodtbGup = $request->prodtbGup16;
        $guiaproduccionponedoras16->haatabGup = $request->haatabGup16;
        $guiaproduccionponedoras16->grtbGup = $request->grtbGup16;
        $guiaproduccionponedoras16->pesohuevotablaGup = $request->pesohuevotablaGup16;
        $guiaproduccionponedoras16->idGuia = $guia->id;
        $guiaproduccionponedoras16->save();
        $guiaproduccionponedoras17 = new Guiaproduccion;
        $guiaproduccionponedoras17->semanaGup = 18;
        $guiaproduccionponedoras17->tbGup = $request->tbGup17;
        $guiaproduccionponedoras17->tb1Gup = $request->tb1Gup17;
        $guiaproduccionponedoras17->tb2Gup = $request->tb2Gup17;
        $guiaproduccionponedoras17->real4Gup = $request->real4Gup17;
        $guiaproduccionponedoras17->tab1Gup = $request->tab1Gup17;
        $guiaproduccionponedoras17->real5Gup = $request->real5Gup17;
        $guiaproduccionponedoras17->tab2Gup = $request->tab2Gup17;
        $guiaproduccionponedoras17->prodtbGup = $request->prodtbGup17;
        $guiaproduccionponedoras17->haatabGup = $request->haatabGup17;
        $guiaproduccionponedoras17->grtbGup = $request->grtbGup17;
        $guiaproduccionponedoras17->pesohuevotablaGup = $request->pesohuevotablaGup17;
        $guiaproduccionponedoras17->idGuia = $guia->id;
        $guiaproduccionponedoras17->save();
        $guiaproduccionponedoras18 = new Guiaproduccion;
        $guiaproduccionponedoras18->semanaGup = 19;
        $guiaproduccionponedoras18->tbGup = $request->tbGup18;
        $guiaproduccionponedoras18->tb1Gup = $request->tb1Gup18;
        $guiaproduccionponedoras18->tb2Gup = $request->tb2Gup18;
        $guiaproduccionponedoras18->real4Gup = $request->real4Gup18;
        $guiaproduccionponedoras18->tab1Gup = $request->tab1Gup18;
        $guiaproduccionponedoras18->real5Gup = $request->real5Gup18;
        $guiaproduccionponedoras18->tab2Gup = $request->tab2Gup18;
        $guiaproduccionponedoras18->prodtbGup = $request->prodtbGup18;
        $guiaproduccionponedoras18->haatabGup = $request->haatabGup18;
        $guiaproduccionponedoras18->grtbGup = $request->grtbGup18;
        $guiaproduccionponedoras18->pesohuevotablaGup = $request->pesohuevotablaGup18;
        $guiaproduccionponedoras18->idGuia = $guia->id;
        $guiaproduccionponedoras18->save();
        $guiaproduccionponedoras19 = new Guiaproduccion;
        $guiaproduccionponedoras19->semanaGup = 20;
        $guiaproduccionponedoras19->tbGup = $request->tbGup19;
        $guiaproduccionponedoras19->tb1Gup = $request->tb1Gup19;
        $guiaproduccionponedoras19->tb2Gup = $request->tb2Gup19;
        $guiaproduccionponedoras19->real4Gup = $request->real4Gup19;
        $guiaproduccionponedoras19->tab1Gup = $request->tab1Gup19;
        $guiaproduccionponedoras19->real5Gup = $request->real5Gup19;
        $guiaproduccionponedoras19->tab2Gup = $request->tab2Gup19;
        $guiaproduccionponedoras19->prodtbGup = $request->prodtbGup19;
        $guiaproduccionponedoras19->haatabGup = $request->haatabGup19;
        $guiaproduccionponedoras19->grtbGup = $request->grtbGup19;
        $guiaproduccionponedoras19->pesohuevotablaGup = $request->pesohuevotablaGup19;
        $guiaproduccionponedoras19->idGuia = $guia->id;
        $guiaproduccionponedoras19->save();
        $guiaproduccionponedoras20 = new Guiaproduccion;
        $guiaproduccionponedoras20->semanaGup = 21;
        $guiaproduccionponedoras20->tbGup = $request->tbGup20;
        $guiaproduccionponedoras20->tb1Gup = $request->tb1Gup20;
        $guiaproduccionponedoras20->tb2Gup = $request->tb2Gup20;
        $guiaproduccionponedoras20->real4Gup = $request->real4Gup20;
        $guiaproduccionponedoras20->tab1Gup = $request->tab1Gup20;
        $guiaproduccionponedoras20->real5Gup = $request->real5Gup20;
        $guiaproduccionponedoras20->tab2Gup = $request->tab2Gup20;
        $guiaproduccionponedoras20->prodtbGup = $request->prodtbGup20;
        $guiaproduccionponedoras20->haatabGup = $request->haatabGup20;
        $guiaproduccionponedoras20->grtbGup = $request->grtbGup20;
        $guiaproduccionponedoras20->pesohuevotablaGup = $request->pesohuevotablaGup20;
        $guiaproduccionponedoras20->idGuia = $guia->id;
        $guiaproduccionponedoras20->save();
        $guiaproduccionponedoras21 = new Guiaproduccion;
        $guiaproduccionponedoras21->semanaGup = 22;
        $guiaproduccionponedoras21->tbGup = $request->tbGup21;
        $guiaproduccionponedoras21->tb1Gup = $request->tb1Gup21;
        $guiaproduccionponedoras21->tb2Gup = $request->tb2Gup21;
        $guiaproduccionponedoras21->real4Gup = $request->real4Gup21;
        $guiaproduccionponedoras21->tab1Gup = $request->tab1Gup21;
        $guiaproduccionponedoras21->real5Gup = $request->real5Gup21;
        $guiaproduccionponedoras21->tab2Gup = $request->tab2Gup21;
        $guiaproduccionponedoras21->prodtbGup = $request->prodtbGup21;
        $guiaproduccionponedoras21->haatabGup = $request->haatabGup21;
        $guiaproduccionponedoras21->grtbGup = $request->grtbGup21;
        $guiaproduccionponedoras21->pesohuevotablaGup = $request->pesohuevotablaGup21;
        $guiaproduccionponedoras21->idGuia = $guia->id;
        $guiaproduccionponedoras21->save();
        $guiaproduccionponedoras22 = new Guiaproduccion;
        $guiaproduccionponedoras22->semanaGup = 23;
        $guiaproduccionponedoras22->tbGup = $request->tbGup22;
        $guiaproduccionponedoras22->tb1Gup = $request->tb1Gup22;
        $guiaproduccionponedoras22->tb2Gup = $request->tb2Gup22;
        $guiaproduccionponedoras22->real4Gup = $request->real4Gup22;
        $guiaproduccionponedoras22->tab1Gup = $request->tab1Gup22;
        $guiaproduccionponedoras22->real5Gup = $request->real5Gup22;
        $guiaproduccionponedoras22->tab2Gup = $request->tab2Gup22;
        $guiaproduccionponedoras22->prodtbGup = $request->prodtbGup22;
        $guiaproduccionponedoras22->haatabGup = $request->haatabGup22;
        $guiaproduccionponedoras22->grtbGup = $request->grtbGup22;
        $guiaproduccionponedoras22->pesohuevotablaGup = $request->pesohuevotablaGup22;
        $guiaproduccionponedoras22->idGuia = $guia->id;
        $guiaproduccionponedoras22->save();
        $guiaproduccionponedoras23 = new Guiaproduccion;
        $guiaproduccionponedoras23->semanaGup = 24;
        $guiaproduccionponedoras23->tbGup = $request->tbGup23;
        $guiaproduccionponedoras23->tb1Gup = $request->tb1Gup23;
        $guiaproduccionponedoras23->tb2Gup = $request->tb2Gup23;
        $guiaproduccionponedoras23->real4Gup = $request->real4Gup23;
        $guiaproduccionponedoras23->tab1Gup = $request->tab1Gup23;
        $guiaproduccionponedoras23->real5Gup = $request->real5Gup23;
        $guiaproduccionponedoras23->tab2Gup = $request->tab2Gup23;
        $guiaproduccionponedoras23->prodtbGup = $request->prodtbGup23;
        $guiaproduccionponedoras23->haatabGup = $request->haatabGup23;
        $guiaproduccionponedoras23->grtbGup = $request->grtbGup23;
        $guiaproduccionponedoras23->pesohuevotablaGup = $request->pesohuevotablaGup23;
        $guiaproduccionponedoras23->idGuia = $guia->id;
        $guiaproduccionponedoras23->save();
        $guiaproduccionponedoras24 = new Guiaproduccion;
        $guiaproduccionponedoras24->semanaGup = 25;
        $guiaproduccionponedoras24->tbGup = $request->tbGup24;
        $guiaproduccionponedoras24->tb1Gup = $request->tb1Gup24;
        $guiaproduccionponedoras24->tb2Gup = $request->tb2Gup24;
        $guiaproduccionponedoras24->real4Gup = $request->real4Gup24;
        $guiaproduccionponedoras24->tab1Gup = $request->tab1Gup24;
        $guiaproduccionponedoras24->real5Gup = $request->real5Gup24;
        $guiaproduccionponedoras24->tab2Gup = $request->tab2Gup24;
        $guiaproduccionponedoras24->prodtbGup = $request->prodtbGup24;
        $guiaproduccionponedoras24->haatabGup = $request->haatabGup24;
        $guiaproduccionponedoras24->grtbGup = $request->grtbGup24;
        $guiaproduccionponedoras24->pesohuevotablaGup = $request->pesohuevotablaGup24;
        $guiaproduccionponedoras24->idGuia = $guia->id;
        $guiaproduccionponedoras24->save();
        $guiaproduccionponedoras25 = new Guiaproduccion;
        $guiaproduccionponedoras25->semanaGup = 26;
        $guiaproduccionponedoras25->tbGup = $request->tbGup25;
        $guiaproduccionponedoras25->tb1Gup = $request->tb1Gup25;
        $guiaproduccionponedoras25->tb2Gup = $request->tb2Gup25;
        $guiaproduccionponedoras25->real4Gup = $request->real4Gup25;
        $guiaproduccionponedoras25->tab1Gup = $request->tab1Gup25;
        $guiaproduccionponedoras25->real5Gup = $request->real5Gup25;
        $guiaproduccionponedoras25->tab2Gup = $request->tab2Gup25;
        $guiaproduccionponedoras25->prodtbGup = $request->prodtbGup25;
        $guiaproduccionponedoras25->haatabGup = $request->haatabGup25;
        $guiaproduccionponedoras25->grtbGup = $request->grtbGup25;
        $guiaproduccionponedoras25->pesohuevotablaGup = $request->pesohuevotablaGup25;
        $guiaproduccionponedoras25->idGuia = $guia->id;
        $guiaproduccionponedoras25->save();
        $guiaproduccionponedoras26 = new Guiaproduccion;
        $guiaproduccionponedoras26->semanaGup = 27;
        $guiaproduccionponedoras26->tbGup = $request->tbGup26;
        $guiaproduccionponedoras26->tb1Gup = $request->tb1Gup26;
        $guiaproduccionponedoras26->tb2Gup = $request->tb2Gup26;
        $guiaproduccionponedoras26->real4Gup = $request->real4Gup26;
        $guiaproduccionponedoras26->tab1Gup = $request->tab1Gup26;
        $guiaproduccionponedoras26->real5Gup = $request->real5Gup26;
        $guiaproduccionponedoras26->tab2Gup = $request->tab2Gup26;
        $guiaproduccionponedoras26->prodtbGup = $request->prodtbGup26;
        $guiaproduccionponedoras26->haatabGup = $request->haatabGup26;
        $guiaproduccionponedoras26->grtbGup = $request->grtbGup26;
        $guiaproduccionponedoras26->pesohuevotablaGup = $request->pesohuevotablaGup26;
        $guiaproduccionponedoras26->idGuia = $guia->id;
        $guiaproduccionponedoras26->save();
        $guiaproduccionponedoras27 = new Guiaproduccion;
        $guiaproduccionponedoras27->semanaGup = 28;
        $guiaproduccionponedoras27->tbGup = $request->tbGup27;
        $guiaproduccionponedoras27->tb1Gup = $request->tb1Gup27;
        $guiaproduccionponedoras27->tb2Gup = $request->tb2Gup27;
        $guiaproduccionponedoras27->real4Gup = $request->real4Gup27;
        $guiaproduccionponedoras27->tab1Gup = $request->tab1Gup27;
        $guiaproduccionponedoras27->real5Gup = $request->real5Gup27;
        $guiaproduccionponedoras27->tab2Gup = $request->tab2Gup27;
        $guiaproduccionponedoras27->prodtbGup = $request->prodtbGup27;
        $guiaproduccionponedoras27->haatabGup = $request->haatabGup27;
        $guiaproduccionponedoras27->grtbGup = $request->grtbGup27;
        $guiaproduccionponedoras27->pesohuevotablaGup = $request->pesohuevotablaGup27;
        $guiaproduccionponedoras27->idGuia = $guia->id;
        $guiaproduccionponedoras27->save();
        $guiaproduccionponedoras28 = new Guiaproduccion;
        $guiaproduccionponedoras28->semanaGup = 29;
        $guiaproduccionponedoras28->tbGup = $request->tbGup28;
        $guiaproduccionponedoras28->tb1Gup = $request->tb1Gup28;
        $guiaproduccionponedoras28->tb2Gup = $request->tb2Gup28;
        $guiaproduccionponedoras28->real4Gup = $request->real4Gup28;
        $guiaproduccionponedoras28->tab1Gup = $request->tab1Gup28;
        $guiaproduccionponedoras28->real5Gup = $request->real5Gup28;
        $guiaproduccionponedoras28->tab2Gup = $request->tab2Gup28;
        $guiaproduccionponedoras28->prodtbGup = $request->prodtbGup28;
        $guiaproduccionponedoras28->haatabGup = $request->haatabGup28;
        $guiaproduccionponedoras28->grtbGup = $request->grtbGup28;
        $guiaproduccionponedoras28->pesohuevotablaGup = $request->pesohuevotablaGup28;
        $guiaproduccionponedoras28->idGuia = $guia->id;
        $guiaproduccionponedoras28->save();
        $guiaproduccionponedoras29 = new Guiaproduccion;
        $guiaproduccionponedoras29->semanaGup = 30;
        $guiaproduccionponedoras29->tbGup = $request->tbGup29;
        $guiaproduccionponedoras29->tb1Gup = $request->tb1Gup29;
        $guiaproduccionponedoras29->tb2Gup = $request->tb2Gup29;
        $guiaproduccionponedoras29->real4Gup = $request->real4Gup29;
        $guiaproduccionponedoras29->tab1Gup = $request->tab1Gup29;
        $guiaproduccionponedoras29->real5Gup = $request->real5Gup29;
        $guiaproduccionponedoras29->tab2Gup = $request->tab2Gup29;
        $guiaproduccionponedoras29->prodtbGup = $request->prodtbGup29;
        $guiaproduccionponedoras29->haatabGup = $request->haatabGup29;
        $guiaproduccionponedoras29->grtbGup = $request->grtbGup29;
        $guiaproduccionponedoras29->pesohuevotablaGup = $request->pesohuevotablaGup29;
        $guiaproduccionponedoras29->idGuia = $guia->id;
        $guiaproduccionponedoras29->save();
        $guiaproduccionponedoras30 = new Guiaproduccion;
        $guiaproduccionponedoras30->semanaGup = 31;
        $guiaproduccionponedoras30->tbGup = $request->tbGup30;
        $guiaproduccionponedoras30->tb1Gup = $request->tb1Gup30;
        $guiaproduccionponedoras30->tb2Gup = $request->tb2Gup30;
        $guiaproduccionponedoras30->real4Gup = $request->real4Gup30;
        $guiaproduccionponedoras30->tab1Gup = $request->tab1Gup30;
        $guiaproduccionponedoras30->real5Gup = $request->real5Gup30;
        $guiaproduccionponedoras30->tab2Gup = $request->tab2Gup30;
        $guiaproduccionponedoras30->prodtbGup = $request->prodtbGup30;
        $guiaproduccionponedoras30->haatabGup = $request->haatabGup30;
        $guiaproduccionponedoras30->grtbGup = $request->grtbGup30;
        $guiaproduccionponedoras30->pesohuevotablaGup = $request->pesohuevotablaGup30;
        $guiaproduccionponedoras30->idGuia = $guia->id;
        $guiaproduccionponedoras30->save();
        $guiaproduccionponedoras31 = new Guiaproduccion;
        $guiaproduccionponedoras31->semanaGup = 32;
        $guiaproduccionponedoras31->tbGup = $request->tbGup31;
        $guiaproduccionponedoras31->tb1Gup = $request->tb1Gup31;
        $guiaproduccionponedoras31->tb2Gup = $request->tb2Gup31;
        $guiaproduccionponedoras31->real4Gup = $request->real4Gup31;
        $guiaproduccionponedoras31->tab1Gup = $request->tab1Gup31;
        $guiaproduccionponedoras31->real5Gup = $request->real5Gup31;
        $guiaproduccionponedoras31->tab2Gup = $request->tab2Gup31;
        $guiaproduccionponedoras31->prodtbGup = $request->prodtbGup31;
        $guiaproduccionponedoras31->haatabGup = $request->haatabGup31;
        $guiaproduccionponedoras31->grtbGup = $request->grtbGup31;
        $guiaproduccionponedoras31->pesohuevotablaGup = $request->pesohuevotablaGup31;
        $guiaproduccionponedoras31->idGuia = $guia->id;
        $guiaproduccionponedoras31->save();
        $guiaproduccionponedoras32 = new Guiaproduccion;
        $guiaproduccionponedoras32->semanaGup = 33;
        $guiaproduccionponedoras32->tbGup = $request->tbGup32;
        $guiaproduccionponedoras32->tb1Gup = $request->tb1Gup32;
        $guiaproduccionponedoras32->tb2Gup = $request->tb2Gup32;
        $guiaproduccionponedoras32->real4Gup = $request->real4Gup32;
        $guiaproduccionponedoras32->tab1Gup = $request->tab1Gup32;
        $guiaproduccionponedoras32->real5Gup = $request->real5Gup32;
        $guiaproduccionponedoras32->tab2Gup = $request->tab2Gup32;
        $guiaproduccionponedoras32->prodtbGup = $request->prodtbGup32;
        $guiaproduccionponedoras32->haatabGup = $request->haatabGup32;
        $guiaproduccionponedoras32->grtbGup = $request->grtbGup32;
        $guiaproduccionponedoras32->pesohuevotablaGup = $request->pesohuevotablaGup32;
        $guiaproduccionponedoras32->idGuia = $guia->id;
        $guiaproduccionponedoras32->save();
        $guiaproduccionponedoras33 = new Guiaproduccion;
        $guiaproduccionponedoras33->semanaGup = 34;
        $guiaproduccionponedoras33->tbGup = $request->tbGup33;
        $guiaproduccionponedoras33->tb1Gup = $request->tb1Gup33;
        $guiaproduccionponedoras33->tb2Gup = $request->tb2Gup33;
        $guiaproduccionponedoras33->real4Gup = $request->real4Gup33;
        $guiaproduccionponedoras33->tab1Gup = $request->tab1Gup33;
        $guiaproduccionponedoras33->real5Gup = $request->real5Gup33;
        $guiaproduccionponedoras33->tab2Gup = $request->tab2Gup33;
        $guiaproduccionponedoras33->prodtbGup = $request->prodtbGup33;
        $guiaproduccionponedoras33->haatabGup = $request->haatabGup33;
        $guiaproduccionponedoras33->grtbGup = $request->grtbGup33;
        $guiaproduccionponedoras33->pesohuevotablaGup = $request->pesohuevotablaGup33;
        $guiaproduccionponedoras33->idGuia = $guia->id;
        $guiaproduccionponedoras33->save();
        $guiaproduccionponedoras34 = new Guiaproduccion;
        $guiaproduccionponedoras34->semanaGup = 35;
        $guiaproduccionponedoras34->tbGup = $request->tbGup34;
        $guiaproduccionponedoras34->tb1Gup = $request->tb1Gup34;
        $guiaproduccionponedoras34->tb2Gup = $request->tb2Gup34;
        $guiaproduccionponedoras34->real4Gup = $request->real4Gup34;
        $guiaproduccionponedoras34->tab1Gup = $request->tab1Gup34;
        $guiaproduccionponedoras34->real5Gup = $request->real5Gup34;
        $guiaproduccionponedoras34->tab2Gup = $request->tab2Gup34;
        $guiaproduccionponedoras34->prodtbGup = $request->prodtbGup34;
        $guiaproduccionponedoras34->haatabGup = $request->haatabGup34;
        $guiaproduccionponedoras34->grtbGup = $request->grtbGup34;
        $guiaproduccionponedoras34->pesohuevotablaGup = $request->pesohuevotablaGup34;
        $guiaproduccionponedoras34->idGuia = $guia->id;
        $guiaproduccionponedoras34->save();
        $guiaproduccionponedoras35 = new Guiaproduccion;
        $guiaproduccionponedoras35->semanaGup = 36;
        $guiaproduccionponedoras35->tbGup = $request->tbGup35;
        $guiaproduccionponedoras35->tb1Gup = $request->tb1Gup35;
        $guiaproduccionponedoras35->tb2Gup = $request->tb2Gup35;
        $guiaproduccionponedoras35->real4Gup = $request->real4Gup35;
        $guiaproduccionponedoras35->tab1Gup = $request->tab1Gup35;
        $guiaproduccionponedoras35->real5Gup = $request->real5Gup35;
        $guiaproduccionponedoras35->tab2Gup = $request->tab2Gup35;
        $guiaproduccionponedoras35->prodtbGup = $request->prodtbGup35;
        $guiaproduccionponedoras35->haatabGup = $request->haatabGup35;
        $guiaproduccionponedoras35->grtbGup = $request->grtbGup35;
        $guiaproduccionponedoras35->pesohuevotablaGup = $request->pesohuevotablaGup35;
        $guiaproduccionponedoras35->idGuia = $guia->id;
        $guiaproduccionponedoras35->save();
        $guiaproduccionponedoras36 = new Guiaproduccion;
        $guiaproduccionponedoras36->semanaGup = 37;
        $guiaproduccionponedoras36->tbGup = $request->tbGup36;
        $guiaproduccionponedoras36->tb1Gup = $request->tb1Gup36;
        $guiaproduccionponedoras36->tb2Gup = $request->tb2Gup36;
        $guiaproduccionponedoras36->real4Gup = $request->real4Gup36;
        $guiaproduccionponedoras36->tab1Gup = $request->tab1Gup36;
        $guiaproduccionponedoras36->real5Gup = $request->real5Gup36;
        $guiaproduccionponedoras36->tab2Gup = $request->tab2Gup36;
        $guiaproduccionponedoras36->prodtbGup = $request->prodtbGup36;
        $guiaproduccionponedoras36->haatabGup = $request->haatabGup36;
        $guiaproduccionponedoras36->grtbGup = $request->grtbGup36;
        $guiaproduccionponedoras36->pesohuevotablaGup = $request->pesohuevotablaGup36;
        $guiaproduccionponedoras36->idGuia = $guia->id;
        $guiaproduccionponedoras36->save();
        $guiaproduccionponedoras37 = new Guiaproduccion;
        $guiaproduccionponedoras37->semanaGup = 38;
        $guiaproduccionponedoras37->tbGup = $request->tbGup37;
        $guiaproduccionponedoras37->tb1Gup = $request->tb1Gup37;
        $guiaproduccionponedoras37->tb2Gup = $request->tb2Gup37;
        $guiaproduccionponedoras37->real4Gup = $request->real4Gup37;
        $guiaproduccionponedoras37->tab1Gup = $request->tab1Gup37;
        $guiaproduccionponedoras37->real5Gup = $request->real5Gup37;
        $guiaproduccionponedoras37->tab2Gup = $request->tab2Gup37;
        $guiaproduccionponedoras37->prodtbGup = $request->prodtbGup37;
        $guiaproduccionponedoras37->haatabGup = $request->haatabGup37;
        $guiaproduccionponedoras37->grtbGup = $request->grtbGup37;
        $guiaproduccionponedoras37->pesohuevotablaGup = $request->pesohuevotablaGup37;
        $guiaproduccionponedoras37->idGuia = $guia->id;
        $guiaproduccionponedoras37->save();
        $guiaproduccionponedoras38 = new Guiaproduccion;
        $guiaproduccionponedoras38->semanaGup = 39;
        $guiaproduccionponedoras38->tbGup = $request->tbGup38;
        $guiaproduccionponedoras38->tb1Gup = $request->tb1Gup38;
        $guiaproduccionponedoras38->tb2Gup = $request->tb2Gup38;
        $guiaproduccionponedoras38->real4Gup = $request->real4Gup38;
        $guiaproduccionponedoras38->tab1Gup = $request->tab1Gup38;
        $guiaproduccionponedoras38->real5Gup = $request->real5Gup38;
        $guiaproduccionponedoras38->tab2Gup = $request->tab2Gup38;
        $guiaproduccionponedoras38->prodtbGup = $request->prodtbGup38;
        $guiaproduccionponedoras38->haatabGup = $request->haatabGup38;
        $guiaproduccionponedoras38->grtbGup = $request->grtbGup38;
        $guiaproduccionponedoras38->pesohuevotablaGup = $request->pesohuevotablaGup38;
        $guiaproduccionponedoras38->idGuia = $guia->id;
        $guiaproduccionponedoras38->save();
        $guiaproduccionponedoras39 = new Guiaproduccion;
        $guiaproduccionponedoras39->semanaGup = 40;
        $guiaproduccionponedoras39->tbGup = $request->tbGup39;
        $guiaproduccionponedoras39->tb1Gup = $request->tb1Gup39;
        $guiaproduccionponedoras39->tb2Gup = $request->tb2Gup39;
        $guiaproduccionponedoras39->real4Gup = $request->real4Gup39;
        $guiaproduccionponedoras39->tab1Gup = $request->tab1Gup39;
        $guiaproduccionponedoras39->real5Gup = $request->real5Gup39;
        $guiaproduccionponedoras39->tab2Gup = $request->tab2Gup39;
        $guiaproduccionponedoras39->prodtbGup = $request->prodtbGup39;
        $guiaproduccionponedoras39->haatabGup = $request->haatabGup39;
        $guiaproduccionponedoras39->grtbGup = $request->grtbGup39;
        $guiaproduccionponedoras39->pesohuevotablaGup = $request->pesohuevotablaGup39;
        $guiaproduccionponedoras39->idGuia = $guia->id;
        $guiaproduccionponedoras39->save();
        $guiaproduccionponedoras40 = new Guiaproduccion;
        $guiaproduccionponedoras40->semanaGup = 41;
        $guiaproduccionponedoras40->tbGup = $request->tbGup40;
        $guiaproduccionponedoras40->tb1Gup = $request->tb1Gup40;
        $guiaproduccionponedoras40->tb2Gup = $request->tb2Gup40;
        $guiaproduccionponedoras40->real4Gup = $request->real4Gup40;
        $guiaproduccionponedoras40->tab1Gup = $request->tab1Gup40;
        $guiaproduccionponedoras40->real5Gup = $request->real5Gup40;
        $guiaproduccionponedoras40->tab2Gup = $request->tab2Gup40;
        $guiaproduccionponedoras40->prodtbGup = $request->prodtbGup40;
        $guiaproduccionponedoras40->haatabGup = $request->haatabGup40;
        $guiaproduccionponedoras40->grtbGup = $request->grtbGup40;
        $guiaproduccionponedoras40->pesohuevotablaGup = $request->pesohuevotablaGup40;
        $guiaproduccionponedoras40->idGuia = $guia->id;
        $guiaproduccionponedoras40->save();
        $guiaproduccionponedoras41 = new Guiaproduccion;
        $guiaproduccionponedoras41->semanaGup = 42;
        $guiaproduccionponedoras41->tbGup = $request->tbGup41;
        $guiaproduccionponedoras41->tb1Gup = $request->tb1Gup41;
        $guiaproduccionponedoras41->tb2Gup = $request->tb2Gup41;
        $guiaproduccionponedoras41->real4Gup = $request->real4Gup41;
        $guiaproduccionponedoras41->tab1Gup = $request->tab1Gup41;
        $guiaproduccionponedoras41->real5Gup = $request->real5Gup41;
        $guiaproduccionponedoras41->tab2Gup = $request->tab2Gup41;
        $guiaproduccionponedoras41->prodtbGup = $request->prodtbGup41;
        $guiaproduccionponedoras41->haatabGup = $request->haatabGup41;
        $guiaproduccionponedoras41->grtbGup = $request->grtbGup41;
        $guiaproduccionponedoras41->pesohuevotablaGup = $request->pesohuevotablaGup41;
        $guiaproduccionponedoras41->idGuia = $guia->id;
        $guiaproduccionponedoras41->save();
        $guiaproduccionponedoras42 = new Guiaproduccion;
        $guiaproduccionponedoras42->semanaGup = 43;
        $guiaproduccionponedoras42->tbGup = $request->tbGup42;
        $guiaproduccionponedoras42->tb1Gup = $request->tb1Gup42;
        $guiaproduccionponedoras42->tb2Gup = $request->tb2Gup42;
        $guiaproduccionponedoras42->real4Gup = $request->real4Gup42;
        $guiaproduccionponedoras42->tab1Gup = $request->tab1Gup42;
        $guiaproduccionponedoras42->real5Gup = $request->real5Gup42;
        $guiaproduccionponedoras42->tab2Gup = $request->tab2Gup42;
        $guiaproduccionponedoras42->prodtbGup = $request->prodtbGup42;
        $guiaproduccionponedoras42->haatabGup = $request->haatabGup42;
        $guiaproduccionponedoras42->grtbGup = $request->grtbGup42;
        $guiaproduccionponedoras42->pesohuevotablaGup = $request->pesohuevotablaGup42;
        $guiaproduccionponedoras42->idGuia = $guia->id;
        $guiaproduccionponedoras42->save();
        $guiaproduccionponedoras43 = new Guiaproduccion;
        $guiaproduccionponedoras43->semanaGup = 44;
        $guiaproduccionponedoras43->tbGup = $request->tbGup43;
        $guiaproduccionponedoras43->tb1Gup = $request->tb1Gup43;
        $guiaproduccionponedoras43->tb2Gup = $request->tb2Gup43;
        $guiaproduccionponedoras43->real4Gup = $request->real4Gup43;
        $guiaproduccionponedoras43->tab1Gup = $request->tab1Gup43;
        $guiaproduccionponedoras43->real5Gup = $request->real5Gup43;
        $guiaproduccionponedoras43->tab2Gup = $request->tab2Gup43;
        $guiaproduccionponedoras43->prodtbGup = $request->prodtbGup43;
        $guiaproduccionponedoras43->haatabGup = $request->haatabGup43;
        $guiaproduccionponedoras43->grtbGup = $request->grtbGup43;
        $guiaproduccionponedoras43->pesohuevotablaGup = $request->pesohuevotablaGup43;
        $guiaproduccionponedoras43->idGuia = $guia->id;
        $guiaproduccionponedoras43->save();
        $guiaproduccionponedoras44 = new Guiaproduccion;
        $guiaproduccionponedoras44->semanaGup = 45;
        $guiaproduccionponedoras44->tbGup = $request->tbGup44;
        $guiaproduccionponedoras44->tb1Gup = $request->tb1Gup44;
        $guiaproduccionponedoras44->tb2Gup = $request->tb2Gup44;
        $guiaproduccionponedoras44->real4Gup = $request->real4Gup44;
        $guiaproduccionponedoras44->tab1Gup = $request->tab1Gup44;
        $guiaproduccionponedoras44->real5Gup = $request->real5Gup44;
        $guiaproduccionponedoras44->tab2Gup = $request->tab2Gup44;
        $guiaproduccionponedoras44->prodtbGup = $request->prodtbGup44;
        $guiaproduccionponedoras44->haatabGup = $request->haatabGup44;
        $guiaproduccionponedoras44->grtbGup = $request->grtbGup44;
        $guiaproduccionponedoras44->pesohuevotablaGup = $request->pesohuevotablaGup44;
        $guiaproduccionponedoras44->idGuia = $guia->id;
        $guiaproduccionponedoras44->save();
        $guiaproduccionponedoras45 = new Guiaproduccion;
        $guiaproduccionponedoras45->semanaGup = 46;
        $guiaproduccionponedoras45->tbGup = $request->tbGup45;
        $guiaproduccionponedoras45->tb1Gup = $request->tb1Gup45;
        $guiaproduccionponedoras45->tb2Gup = $request->tb2Gup45;
        $guiaproduccionponedoras45->real4Gup = $request->real4Gup45;
        $guiaproduccionponedoras45->tab1Gup = $request->tab1Gup45;
        $guiaproduccionponedoras45->real5Gup = $request->real5Gup45;
        $guiaproduccionponedoras45->tab2Gup = $request->tab2Gup45;
        $guiaproduccionponedoras45->prodtbGup = $request->prodtbGup45;
        $guiaproduccionponedoras45->haatabGup = $request->haatabGup45;
        $guiaproduccionponedoras45->grtbGup = $request->grtbGup45;
        $guiaproduccionponedoras45->pesohuevotablaGup = $request->pesohuevotablaGup45;
        $guiaproduccionponedoras45->idGuia = $guia->id;
        $guiaproduccionponedoras45->save();
        $guiaproduccionponedoras46 = new Guiaproduccion;
        $guiaproduccionponedoras46->semanaGup = 47;
        $guiaproduccionponedoras46->tbGup = $request->tbGup46;
        $guiaproduccionponedoras46->tb1Gup = $request->tb1Gup46;
        $guiaproduccionponedoras46->tb2Gup = $request->tb2Gup46;
        $guiaproduccionponedoras46->real4Gup = $request->real4Gup46;
        $guiaproduccionponedoras46->tab1Gup = $request->tab1Gup46;
        $guiaproduccionponedoras46->real5Gup = $request->real5Gup46;
        $guiaproduccionponedoras46->tab2Gup = $request->tab2Gup46;
        $guiaproduccionponedoras46->prodtbGup = $request->prodtbGup46;
        $guiaproduccionponedoras46->haatabGup = $request->haatabGup46;
        $guiaproduccionponedoras46->grtbGup = $request->grtbGup46;
        $guiaproduccionponedoras46->pesohuevotablaGup = $request->pesohuevotablaGup46;
        $guiaproduccionponedoras46->idGuia = $guia->id;
        $guiaproduccionponedoras46->save();
        $guiaproduccionponedoras47 = new Guiaproduccion;
        $guiaproduccionponedoras47->semanaGup = 48;
        $guiaproduccionponedoras47->tbGup = $request->tbGup47;
        $guiaproduccionponedoras47->tb1Gup = $request->tb1Gup47;
        $guiaproduccionponedoras47->tb2Gup = $request->tb2Gup47;
        $guiaproduccionponedoras47->real4Gup = $request->real4Gup47;
        $guiaproduccionponedoras47->tab1Gup = $request->tab1Gup47;
        $guiaproduccionponedoras47->real5Gup = $request->real5Gup47;
        $guiaproduccionponedoras47->tab2Gup = $request->tab2Gup47;
        $guiaproduccionponedoras47->prodtbGup = $request->prodtbGup47;
        $guiaproduccionponedoras47->haatabGup = $request->haatabGup47;
        $guiaproduccionponedoras47->grtbGup = $request->grtbGup47;
        $guiaproduccionponedoras47->pesohuevotablaGup = $request->pesohuevotablaGup47;
        $guiaproduccionponedoras47->idGuia = $guia->id;
        $guiaproduccionponedoras47->save();
        $guiaproduccionponedoras48 = new Guiaproduccion;
        $guiaproduccionponedoras48->semanaGup = 49;
        $guiaproduccionponedoras48->tbGup = $request->tbGup48;
        $guiaproduccionponedoras48->tb1Gup = $request->tb1Gup48;
        $guiaproduccionponedoras48->tb2Gup = $request->tb2Gup48;
        $guiaproduccionponedoras48->real4Gup = $request->real4Gup48;
        $guiaproduccionponedoras48->tab1Gup = $request->tab1Gup48;
        $guiaproduccionponedoras48->real5Gup = $request->real5Gup48;
        $guiaproduccionponedoras48->tab2Gup = $request->tab2Gup48;
        $guiaproduccionponedoras48->prodtbGup = $request->prodtbGup48;
        $guiaproduccionponedoras48->haatabGup = $request->haatabGup48;
        $guiaproduccionponedoras48->grtbGup = $request->grtbGup48;
        $guiaproduccionponedoras48->pesohuevotablaGup = $request->pesohuevotablaGup48;
        $guiaproduccionponedoras48->idGuia = $guia->id;
        $guiaproduccionponedoras48->save();
        $guiaproduccionponedoras49 = new Guiaproduccion;
        $guiaproduccionponedoras49->semanaGup = 50;
        $guiaproduccionponedoras49->tbGup = $request->tbGup49;
        $guiaproduccionponedoras49->tb1Gup = $request->tb1Gup49;
        $guiaproduccionponedoras49->tb2Gup = $request->tb2Gup49;
        $guiaproduccionponedoras49->real4Gup = $request->real4Gup49;
        $guiaproduccionponedoras49->tab1Gup = $request->tab1Gup49;
        $guiaproduccionponedoras49->real5Gup = $request->real5Gup49;
        $guiaproduccionponedoras49->tab2Gup = $request->tab2Gup49;
        $guiaproduccionponedoras49->prodtbGup = $request->prodtbGup49;
        $guiaproduccionponedoras49->haatabGup = $request->haatabGup49;
        $guiaproduccionponedoras49->grtbGup = $request->grtbGup49;
        $guiaproduccionponedoras49->pesohuevotablaGup = $request->pesohuevotablaGup49;
        $guiaproduccionponedoras49->idGuia = $guia->id;
        $guiaproduccionponedoras49->save();
        $guiaproduccionponedoras50 = new Guiaproduccion;
        $guiaproduccionponedoras50->semanaGup = 51;
        $guiaproduccionponedoras50->tbGup = $request->tbGup50;
        $guiaproduccionponedoras50->tb1Gup = $request->tb1Gup50;
        $guiaproduccionponedoras50->tb2Gup = $request->tb2Gup50;
        $guiaproduccionponedoras50->real4Gup = $request->real4Gup50;
        $guiaproduccionponedoras50->tab1Gup = $request->tab1Gup50;
        $guiaproduccionponedoras50->real5Gup = $request->real5Gup50;
        $guiaproduccionponedoras50->tab2Gup = $request->tab2Gup50;
        $guiaproduccionponedoras50->prodtbGup = $request->prodtbGup50;
        $guiaproduccionponedoras50->haatabGup = $request->haatabGup50;
        $guiaproduccionponedoras50->grtbGup = $request->grtbGup50;
        $guiaproduccionponedoras50->pesohuevotablaGup = $request->pesohuevotablaGup50;
        $guiaproduccionponedoras50->idGuia = $guia->id;
        $guiaproduccionponedoras50->save();
        $guiaproduccionponedoras51 = new Guiaproduccion;
        $guiaproduccionponedoras51->semanaGup = 52;
        $guiaproduccionponedoras51->tbGup = $request->tbGup51;
        $guiaproduccionponedoras51->tb1Gup = $request->tb1Gup51;
        $guiaproduccionponedoras51->tb2Gup = $request->tb2Gup51;
        $guiaproduccionponedoras51->real4Gup = $request->real4Gup51;
        $guiaproduccionponedoras51->tab1Gup = $request->tab1Gup51;
        $guiaproduccionponedoras51->real5Gup = $request->real5Gup51;
        $guiaproduccionponedoras51->tab2Gup = $request->tab2Gup51;
        $guiaproduccionponedoras51->prodtbGup = $request->prodtbGup51;
        $guiaproduccionponedoras51->haatabGup = $request->haatabGup51;
        $guiaproduccionponedoras51->grtbGup = $request->grtbGup51;
        $guiaproduccionponedoras51->pesohuevotablaGup = $request->pesohuevotablaGup51;
        $guiaproduccionponedoras51->idGuia = $guia->id;
        $guiaproduccionponedoras51->save();
        $guiaproduccionponedoras52 = new Guiaproduccion;
        $guiaproduccionponedoras52->semanaGup = 53;
        $guiaproduccionponedoras52->tbGup = $request->tbGup52;
        $guiaproduccionponedoras52->tb1Gup = $request->tb1Gup52;
        $guiaproduccionponedoras52->tb2Gup = $request->tb2Gup52;
        $guiaproduccionponedoras52->real4Gup = $request->real4Gup52;
        $guiaproduccionponedoras52->tab1Gup = $request->tab1Gup52;
        $guiaproduccionponedoras52->real5Gup = $request->real5Gup52;
        $guiaproduccionponedoras52->tab2Gup = $request->tab2Gup52;
        $guiaproduccionponedoras52->prodtbGup = $request->prodtbGup52;
        $guiaproduccionponedoras52->haatabGup = $request->haatabGup52;
        $guiaproduccionponedoras52->grtbGup = $request->grtbGup52;
        $guiaproduccionponedoras52->pesohuevotablaGup = $request->pesohuevotablaGup52;
        $guiaproduccionponedoras52->idGuia = $guia->id;
        $guiaproduccionponedoras52->save();
        $guiaproduccionponedoras53 = new Guiaproduccion;
        $guiaproduccionponedoras53->semanaGup = 54;
        $guiaproduccionponedoras53->tbGup = $request->tbGup53;
        $guiaproduccionponedoras53->tb1Gup = $request->tb1Gup53;
        $guiaproduccionponedoras53->tb2Gup = $request->tb2Gup53;
        $guiaproduccionponedoras53->real4Gup = $request->real4Gup53;
        $guiaproduccionponedoras53->tab1Gup = $request->tab1Gup53;
        $guiaproduccionponedoras53->real5Gup = $request->real5Gup53;
        $guiaproduccionponedoras53->tab2Gup = $request->tab2Gup53;
        $guiaproduccionponedoras53->prodtbGup = $request->prodtbGup53;
        $guiaproduccionponedoras53->haatabGup = $request->haatabGup53;
        $guiaproduccionponedoras53->grtbGup = $request->grtbGup53;
        $guiaproduccionponedoras53->pesohuevotablaGup = $request->pesohuevotablaGup53;
        $guiaproduccionponedoras53->idGuia = $guia->id;
        $guiaproduccionponedoras53->save();
        $guiaproduccionponedoras54 = new Guiaproduccion;
        $guiaproduccionponedoras54->semanaGup = 55;
        $guiaproduccionponedoras54->tbGup = $request->tbGup54;
        $guiaproduccionponedoras54->tb1Gup = $request->tb1Gup54;
        $guiaproduccionponedoras54->tb2Gup = $request->tb2Gup54;
        $guiaproduccionponedoras54->real4Gup = $request->real4Gup54;
        $guiaproduccionponedoras54->tab1Gup = $request->tab1Gup54;
        $guiaproduccionponedoras54->real5Gup = $request->real5Gup54;
        $guiaproduccionponedoras54->tab2Gup = $request->tab2Gup54;
        $guiaproduccionponedoras54->prodtbGup = $request->prodtbGup54;
        $guiaproduccionponedoras54->haatabGup = $request->haatabGup54;
        $guiaproduccionponedoras54->grtbGup = $request->grtbGup54;
        $guiaproduccionponedoras54->pesohuevotablaGup = $request->pesohuevotablaGup54;
        $guiaproduccionponedoras54->idGuia = $guia->id;
        $guiaproduccionponedoras54->save();
        $guiaproduccionponedoras55 = new Guiaproduccion;
        $guiaproduccionponedoras55->semanaGup = 56;
        $guiaproduccionponedoras55->tbGup = $request->tbGup55;
        $guiaproduccionponedoras55->tb1Gup = $request->tb1Gup55;
        $guiaproduccionponedoras55->tb2Gup = $request->tb2Gup55;
        $guiaproduccionponedoras55->real4Gup = $request->real4Gup55;
        $guiaproduccionponedoras55->tab1Gup = $request->tab1Gup55;
        $guiaproduccionponedoras55->real5Gup = $request->real5Gup55;
        $guiaproduccionponedoras55->tab2Gup = $request->tab2Gup55;
        $guiaproduccionponedoras55->prodtbGup = $request->prodtbGup55;
        $guiaproduccionponedoras55->haatabGup = $request->haatabGup55;
        $guiaproduccionponedoras55->grtbGup = $request->grtbGup55;
        $guiaproduccionponedoras55->pesohuevotablaGup = $request->pesohuevotablaGup55;
        $guiaproduccionponedoras55->idGuia = $guia->id;
        $guiaproduccionponedoras55->save();
        $guiaproduccionponedoras56 = new Guiaproduccion;
        $guiaproduccionponedoras56->semanaGup = 57;
        $guiaproduccionponedoras56->tbGup = $request->tbGup56;
        $guiaproduccionponedoras56->tb1Gup = $request->tb1Gup56;
        $guiaproduccionponedoras56->tb2Gup = $request->tb2Gup56;
        $guiaproduccionponedoras56->real4Gup = $request->real4Gup56;
        $guiaproduccionponedoras56->tab1Gup = $request->tab1Gup56;
        $guiaproduccionponedoras56->real5Gup = $request->real5Gup56;
        $guiaproduccionponedoras56->tab2Gup = $request->tab2Gup56;
        $guiaproduccionponedoras56->prodtbGup = $request->prodtbGup56;
        $guiaproduccionponedoras56->haatabGup = $request->haatabGup56;
        $guiaproduccionponedoras56->grtbGup = $request->grtbGup56;
        $guiaproduccionponedoras56->pesohuevotablaGup = $request->pesohuevotablaGup56;
        $guiaproduccionponedoras56->idGuia = $guia->id;
        $guiaproduccionponedoras56->save();
        $guiaproduccionponedoras57 = new Guiaproduccion;
        $guiaproduccionponedoras57->semanaGup = 58;
        $guiaproduccionponedoras57->tbGup = $request->tbGup57;
        $guiaproduccionponedoras57->tb1Gup = $request->tb1Gup57;
        $guiaproduccionponedoras57->tb2Gup = $request->tb2Gup57;
        $guiaproduccionponedoras57->real4Gup = $request->real4Gup57;
        $guiaproduccionponedoras57->tab1Gup = $request->tab1Gup57;
        $guiaproduccionponedoras57->real5Gup = $request->real5Gup57;
        $guiaproduccionponedoras57->tab2Gup = $request->tab2Gup57;
        $guiaproduccionponedoras57->prodtbGup = $request->prodtbGup57;
        $guiaproduccionponedoras57->haatabGup = $request->haatabGup57;
        $guiaproduccionponedoras57->grtbGup = $request->grtbGup57;
        $guiaproduccionponedoras57->pesohuevotablaGup = $request->pesohuevotablaGup57;
        $guiaproduccionponedoras57->idGuia = $guia->id;
        $guiaproduccionponedoras57->save();
        $guiaproduccionponedoras58 = new Guiaproduccion;
        $guiaproduccionponedoras58->semanaGup = 59;
        $guiaproduccionponedoras58->tbGup = $request->tbGup58;
        $guiaproduccionponedoras58->tb1Gup = $request->tb1Gup58;
        $guiaproduccionponedoras58->tb2Gup = $request->tb2Gup58;
        $guiaproduccionponedoras58->real4Gup = $request->real4Gup58;
        $guiaproduccionponedoras58->tab1Gup = $request->tab1Gup58;
        $guiaproduccionponedoras58->real5Gup = $request->real5Gup58;
        $guiaproduccionponedoras58->tab2Gup = $request->tab2Gup58;
        $guiaproduccionponedoras58->prodtbGup = $request->prodtbGup58;
        $guiaproduccionponedoras58->haatabGup = $request->haatabGup58;
        $guiaproduccionponedoras58->grtbGup = $request->grtbGup58;
        $guiaproduccionponedoras58->pesohuevotablaGup = $request->pesohuevotablaGup58;
        $guiaproduccionponedoras58->idGuia = $guia->id;
        $guiaproduccionponedoras58->save();
        $guiaproduccionponedoras59 = new Guiaproduccion;
        $guiaproduccionponedoras59->semanaGup = 60;
        $guiaproduccionponedoras59->tbGup = $request->tbGup59;
        $guiaproduccionponedoras59->tb1Gup = $request->tb1Gup59;
        $guiaproduccionponedoras59->tb2Gup = $request->tb2Gup59;
        $guiaproduccionponedoras59->real4Gup = $request->real4Gup59;
        $guiaproduccionponedoras59->tab1Gup = $request->tab1Gup59;
        $guiaproduccionponedoras59->real5Gup = $request->real5Gup59;
        $guiaproduccionponedoras59->tab2Gup = $request->tab2Gup59;
        $guiaproduccionponedoras59->prodtbGup = $request->prodtbGup59;
        $guiaproduccionponedoras59->haatabGup = $request->haatabGup59;
        $guiaproduccionponedoras59->grtbGup = $request->grtbGup59;
        $guiaproduccionponedoras59->pesohuevotablaGup = $request->pesohuevotablaGup59;
        $guiaproduccionponedoras59->idGuia = $guia->id;
        $guiaproduccionponedoras59->save();
        $guiaproduccionponedoras60 = new Guiaproduccion;
        $guiaproduccionponedoras60->semanaGup = 61;
        $guiaproduccionponedoras60->tbGup = $request->tbGup60;
        $guiaproduccionponedoras60->tb1Gup = $request->tb1Gup60;
        $guiaproduccionponedoras60->tb2Gup = $request->tb2Gup60;
        $guiaproduccionponedoras60->real4Gup = $request->real4Gup60;
        $guiaproduccionponedoras60->tab1Gup = $request->tab1Gup60;
        $guiaproduccionponedoras60->real5Gup = $request->real5Gup60;
        $guiaproduccionponedoras60->tab2Gup = $request->tab2Gup60;
        $guiaproduccionponedoras60->prodtbGup = $request->prodtbGup60;
        $guiaproduccionponedoras60->haatabGup = $request->haatabGup60;
        $guiaproduccionponedoras60->grtbGup = $request->grtbGup60;
        $guiaproduccionponedoras60->pesohuevotablaGup = $request->pesohuevotablaGup60;
        $guiaproduccionponedoras60->idGuia = $guia->id;
        $guiaproduccionponedoras60->save();
        $guiaproduccionponedoras61 = new Guiaproduccion;
        $guiaproduccionponedoras61->semanaGup = 62;
        $guiaproduccionponedoras61->tbGup = $request->tbGup61;
        $guiaproduccionponedoras61->tb1Gup = $request->tb1Gup61;
        $guiaproduccionponedoras61->tb2Gup = $request->tb2Gup61;
        $guiaproduccionponedoras61->real4Gup = $request->real4Gup61;
        $guiaproduccionponedoras61->tab1Gup = $request->tab1Gup61;
        $guiaproduccionponedoras61->real5Gup = $request->real5Gup61;
        $guiaproduccionponedoras61->tab2Gup = $request->tab2Gup61;
        $guiaproduccionponedoras61->prodtbGup = $request->prodtbGup61;
        $guiaproduccionponedoras61->haatabGup = $request->haatabGup61;
        $guiaproduccionponedoras61->grtbGup = $request->grtbGup61;
        $guiaproduccionponedoras61->pesohuevotablaGup = $request->pesohuevotablaGup61;
        $guiaproduccionponedoras61->idGuia = $guia->id;
        $guiaproduccionponedoras61->save();
        $guiaproduccionponedoras62 = new Guiaproduccion;
        $guiaproduccionponedoras62->semanaGup = 63;
        $guiaproduccionponedoras62->tbGup = $request->tbGup62;
        $guiaproduccionponedoras62->tb1Gup = $request->tb1Gup62;
        $guiaproduccionponedoras62->tb2Gup = $request->tb2Gup62;
        $guiaproduccionponedoras62->real4Gup = $request->real4Gup62;
        $guiaproduccionponedoras62->tab1Gup = $request->tab1Gup62;
        $guiaproduccionponedoras62->real5Gup = $request->real5Gup62;
        $guiaproduccionponedoras62->tab2Gup = $request->tab2Gup62;
        $guiaproduccionponedoras62->prodtbGup = $request->prodtbGup62;
        $guiaproduccionponedoras62->haatabGup = $request->haatabGup62;
        $guiaproduccionponedoras62->grtbGup = $request->grtbGup62;
        $guiaproduccionponedoras62->pesohuevotablaGup = $request->pesohuevotablaGup62;
        $guiaproduccionponedoras62->idGuia = $guia->id;
        $guiaproduccionponedoras62->save();
        $guiaproduccionponedoras63 = new Guiaproduccion;
        $guiaproduccionponedoras63->semanaGup = 64;
        $guiaproduccionponedoras63->tbGup = $request->tbGup63;
        $guiaproduccionponedoras63->tb1Gup = $request->tb1Gup63;
        $guiaproduccionponedoras63->tb2Gup = $request->tb2Gup63;
        $guiaproduccionponedoras63->real4Gup = $request->real4Gup63;
        $guiaproduccionponedoras63->tab1Gup = $request->tab1Gup63;
        $guiaproduccionponedoras63->real5Gup = $request->real5Gup63;
        $guiaproduccionponedoras63->tab2Gup = $request->tab2Gup63;
        $guiaproduccionponedoras63->prodtbGup = $request->prodtbGup63;
        $guiaproduccionponedoras63->haatabGup = $request->haatabGup63;
        $guiaproduccionponedoras63->grtbGup = $request->grtbGup63;
        $guiaproduccionponedoras63->pesohuevotablaGup = $request->pesohuevotablaGup63;
        $guiaproduccionponedoras63->idGuia = $guia->id;
        $guiaproduccionponedoras63->save();
        $guiaproduccionponedoras64 = new Guiaproduccion;
        $guiaproduccionponedoras64->semanaGup = 65;
        $guiaproduccionponedoras64->tbGup = $request->tbGup64;
        $guiaproduccionponedoras64->tb1Gup = $request->tb1Gup64;
        $guiaproduccionponedoras64->tb2Gup = $request->tb2Gup64;
        $guiaproduccionponedoras64->real4Gup = $request->real4Gup64;
        $guiaproduccionponedoras64->tab1Gup = $request->tab1Gup64;
        $guiaproduccionponedoras64->real5Gup = $request->real5Gup64;
        $guiaproduccionponedoras64->tab2Gup = $request->tab2Gup64;
        $guiaproduccionponedoras64->prodtbGup = $request->prodtbGup64;
        $guiaproduccionponedoras64->haatabGup = $request->haatabGup64;
        $guiaproduccionponedoras64->grtbGup = $request->grtbGup64;
        $guiaproduccionponedoras64->pesohuevotablaGup = $request->pesohuevotablaGup64;
        $guiaproduccionponedoras64->idGuia = $guia->id;
        $guiaproduccionponedoras64->save();
        $guiaproduccionponedoras65 = new Guiaproduccion;
        $guiaproduccionponedoras65->semanaGup = 66;
        $guiaproduccionponedoras65->tbGup = $request->tbGup65;
        $guiaproduccionponedoras65->tb1Gup = $request->tb1Gup65;
        $guiaproduccionponedoras65->tb2Gup = $request->tb2Gup65;
        $guiaproduccionponedoras65->real4Gup = $request->real4Gup65;
        $guiaproduccionponedoras65->tab1Gup = $request->tab1Gup65;
        $guiaproduccionponedoras65->real5Gup = $request->real5Gup65;
        $guiaproduccionponedoras65->tab2Gup = $request->tab2Gup65;
        $guiaproduccionponedoras65->prodtbGup = $request->prodtbGup65;
        $guiaproduccionponedoras65->haatabGup = $request->haatabGup65;
        $guiaproduccionponedoras65->grtbGup = $request->grtbGup65;
        $guiaproduccionponedoras65->pesohuevotablaGup = $request->pesohuevotablaGup65;
        $guiaproduccionponedoras65->idGuia = $guia->id;
        $guiaproduccionponedoras65->save();
        $guiaproduccionponedoras66 = new Guiaproduccion;
        $guiaproduccionponedoras66->semanaGup = 67;
        $guiaproduccionponedoras66->tbGup = $request->tbGup66;
        $guiaproduccionponedoras66->tb1Gup = $request->tb1Gup66;
        $guiaproduccionponedoras66->tb2Gup = $request->tb2Gup66;
        $guiaproduccionponedoras66->real4Gup = $request->real4Gup66;
        $guiaproduccionponedoras66->tab1Gup = $request->tab1Gup66;
        $guiaproduccionponedoras66->real5Gup = $request->real5Gup66;
        $guiaproduccionponedoras66->tab2Gup = $request->tab2Gup66;
        $guiaproduccionponedoras66->prodtbGup = $request->prodtbGup66;
        $guiaproduccionponedoras66->haatabGup = $request->haatabGup66;
        $guiaproduccionponedoras66->grtbGup = $request->grtbGup66;
        $guiaproduccionponedoras66->pesohuevotablaGup = $request->pesohuevotablaGup66;
        $guiaproduccionponedoras66->idGuia = $guia->id;
        $guiaproduccionponedoras66->save();
        $guiaproduccionponedoras67 = new Guiaproduccion;
        $guiaproduccionponedoras67->semanaGup = 68;
        $guiaproduccionponedoras67->tbGup = $request->tbGup67;
        $guiaproduccionponedoras67->tb1Gup = $request->tb1Gup67;
        $guiaproduccionponedoras67->tb2Gup = $request->tb2Gup67;
        $guiaproduccionponedoras67->real4Gup = $request->real4Gup67;
        $guiaproduccionponedoras67->tab1Gup = $request->tab1Gup67;
        $guiaproduccionponedoras67->real5Gup = $request->real5Gup67;
        $guiaproduccionponedoras67->tab2Gup = $request->tab2Gup67;
        $guiaproduccionponedoras67->prodtbGup = $request->prodtbGup67;
        $guiaproduccionponedoras67->haatabGup = $request->haatabGup67;
        $guiaproduccionponedoras67->grtbGup = $request->grtbGup67;
        $guiaproduccionponedoras67->pesohuevotablaGup = $request->pesohuevotablaGup67;
        $guiaproduccionponedoras67->idGuia = $guia->id;
        $guiaproduccionponedoras67->save();
        $guiaproduccionponedoras68 = new Guiaproduccion;
        $guiaproduccionponedoras68->semanaGup = 69;
        $guiaproduccionponedoras68->tbGup = $request->tbGup68;
        $guiaproduccionponedoras68->tb1Gup = $request->tb1Gup68;
        $guiaproduccionponedoras68->tb2Gup = $request->tb2Gup68;
        $guiaproduccionponedoras68->real4Gup = $request->real4Gup68;
        $guiaproduccionponedoras68->tab1Gup = $request->tab1Gup68;
        $guiaproduccionponedoras68->real5Gup = $request->real5Gup68;
        $guiaproduccionponedoras68->tab2Gup = $request->tab2Gup68;
        $guiaproduccionponedoras68->prodtbGup = $request->prodtbGup68;
        $guiaproduccionponedoras68->haatabGup = $request->haatabGup68;
        $guiaproduccionponedoras68->grtbGup = $request->grtbGup68;
        $guiaproduccionponedoras68->pesohuevotablaGup = $request->pesohuevotablaGup68;
        $guiaproduccionponedoras68->idGuia = $guia->id;
        $guiaproduccionponedoras68->save();
        $guiaproduccionponedoras69 = new Guiaproduccion;
        $guiaproduccionponedoras69->semanaGup = 70;
        $guiaproduccionponedoras69->tbGup = $request->tbGup69;
        $guiaproduccionponedoras69->tb1Gup = $request->tb1Gup69;
        $guiaproduccionponedoras69->tb2Gup = $request->tb2Gup69;
        $guiaproduccionponedoras69->real4Gup = $request->real4Gup69;
        $guiaproduccionponedoras69->tab1Gup = $request->tab1Gup69;
        $guiaproduccionponedoras69->real5Gup = $request->real5Gup69;
        $guiaproduccionponedoras69->tab2Gup = $request->tab2Gup69;
        $guiaproduccionponedoras69->prodtbGup = $request->prodtbGup69;
        $guiaproduccionponedoras69->haatabGup = $request->haatabGup69;
        $guiaproduccionponedoras69->grtbGup = $request->grtbGup69;
        $guiaproduccionponedoras69->pesohuevotablaGup = $request->pesohuevotablaGup69;
        $guiaproduccionponedoras69->idGuia = $guia->id;
        $guiaproduccionponedoras69->save();
        $guiaproduccionponedoras70 = new Guiaproduccion;
        $guiaproduccionponedoras70->semanaGup = 71;
        $guiaproduccionponedoras70->tbGup = $request->tbGup70;
        $guiaproduccionponedoras70->tb1Gup = $request->tb1Gup70;
        $guiaproduccionponedoras70->tb2Gup = $request->tb2Gup70;
        $guiaproduccionponedoras70->real4Gup = $request->real4Gup70;
        $guiaproduccionponedoras70->tab1Gup = $request->tab1Gup70;
        $guiaproduccionponedoras70->real5Gup = $request->real5Gup70;
        $guiaproduccionponedoras70->tab2Gup = $request->tab2Gup70;
        $guiaproduccionponedoras70->prodtbGup = $request->prodtbGup70;
        $guiaproduccionponedoras70->haatabGup = $request->haatabGup70;
        $guiaproduccionponedoras70->grtbGup = $request->grtbGup70;
        $guiaproduccionponedoras70->pesohuevotablaGup = $request->pesohuevotablaGup70;
        $guiaproduccionponedoras70->idGuia = $guia->id;
        $guiaproduccionponedoras70->save();
        $guiaproduccionponedoras71 = new Guiaproduccion;
        $guiaproduccionponedoras71->semanaGup = 72;
        $guiaproduccionponedoras71->tbGup = $request->tbGup71;
        $guiaproduccionponedoras71->tb1Gup = $request->tb1Gup71;
        $guiaproduccionponedoras71->tb2Gup = $request->tb2Gup71;
        $guiaproduccionponedoras71->real4Gup = $request->real4Gup71;
        $guiaproduccionponedoras71->tab1Gup = $request->tab1Gup71;
        $guiaproduccionponedoras71->real5Gup = $request->real5Gup71;
        $guiaproduccionponedoras71->tab2Gup = $request->tab2Gup71;
        $guiaproduccionponedoras71->prodtbGup = $request->prodtbGup71;
        $guiaproduccionponedoras71->haatabGup = $request->haatabGup71;
        $guiaproduccionponedoras71->grtbGup = $request->grtbGup71;
        $guiaproduccionponedoras71->pesohuevotablaGup = $request->pesohuevotablaGup71;
        $guiaproduccionponedoras71->idGuia = $guia->id;
        $guiaproduccionponedoras71->save();
        $guiaproduccionponedoras72 = new Guiaproduccion;
        $guiaproduccionponedoras72->semanaGup = 73;
        $guiaproduccionponedoras72->tbGup = $request->tbGup72;
        $guiaproduccionponedoras72->tb1Gup = $request->tb1Gup72;
        $guiaproduccionponedoras72->tb2Gup = $request->tb2Gup72;
        $guiaproduccionponedoras72->real4Gup = $request->real4Gup72;
        $guiaproduccionponedoras72->tab1Gup = $request->tab1Gup72;
        $guiaproduccionponedoras72->real5Gup = $request->real5Gup72;
        $guiaproduccionponedoras72->tab2Gup = $request->tab2Gup72;
        $guiaproduccionponedoras72->prodtbGup = $request->prodtbGup72;
        $guiaproduccionponedoras72->haatabGup = $request->haatabGup72;
        $guiaproduccionponedoras72->grtbGup = $request->grtbGup72;
        $guiaproduccionponedoras72->pesohuevotablaGup = $request->pesohuevotablaGup72;
        $guiaproduccionponedoras72->idGuia = $guia->id;
        $guiaproduccionponedoras72->save();
        $guiaproduccionponedoras73 = new Guiaproduccion;
        $guiaproduccionponedoras73->semanaGup = 74;
        $guiaproduccionponedoras73->tbGup = $request->tbGup73;
        $guiaproduccionponedoras73->tb1Gup = $request->tb1Gup73;
        $guiaproduccionponedoras73->tb2Gup = $request->tb2Gup73;
        $guiaproduccionponedoras73->real4Gup = $request->real4Gup73;
        $guiaproduccionponedoras73->tab1Gup = $request->tab1Gup73;
        $guiaproduccionponedoras73->real5Gup = $request->real5Gup73;
        $guiaproduccionponedoras73->tab2Gup = $request->tab2Gup73;
        $guiaproduccionponedoras73->prodtbGup = $request->prodtbGup73;
        $guiaproduccionponedoras73->haatabGup = $request->haatabGup73;
        $guiaproduccionponedoras73->grtbGup = $request->grtbGup73;
        $guiaproduccionponedoras73->pesohuevotablaGup = $request->pesohuevotablaGup73;
        $guiaproduccionponedoras73->idGuia = $guia->id;
        $guiaproduccionponedoras73->save();
        $guiaproduccionponedoras74 = new Guiaproduccion;
        $guiaproduccionponedoras74->semanaGup = 75;
        $guiaproduccionponedoras74->tbGup = $request->tbGup74;
        $guiaproduccionponedoras74->tb1Gup = $request->tb1Gup74;
        $guiaproduccionponedoras74->tb2Gup = $request->tb2Gup74;
        $guiaproduccionponedoras74->real4Gup = $request->real4Gup74;
        $guiaproduccionponedoras74->tab1Gup = $request->tab1Gup74;
        $guiaproduccionponedoras74->real5Gup = $request->real5Gup74;
        $guiaproduccionponedoras74->tab2Gup = $request->tab2Gup74;
        $guiaproduccionponedoras74->prodtbGup = $request->prodtbGup74;
        $guiaproduccionponedoras74->haatabGup = $request->haatabGup74;
        $guiaproduccionponedoras74->grtbGup = $request->grtbGup74;
        $guiaproduccionponedoras74->pesohuevotablaGup = $request->pesohuevotablaGup74;
        $guiaproduccionponedoras74->idGuia = $guia->id;
        $guiaproduccionponedoras74->save();
        $guiaproduccionponedoras75 = new Guiaproduccion;
        $guiaproduccionponedoras75->semanaGup = 76;
        $guiaproduccionponedoras75->tbGup = $request->tbGup75;
        $guiaproduccionponedoras75->tb1Gup = $request->tb1Gup75;
        $guiaproduccionponedoras75->tb2Gup = $request->tb2Gup75;
        $guiaproduccionponedoras75->real4Gup = $request->real4Gup75;
        $guiaproduccionponedoras75->tab1Gup = $request->tab1Gup75;
        $guiaproduccionponedoras75->real5Gup = $request->real5Gup75;
        $guiaproduccionponedoras75->tab2Gup = $request->tab2Gup75;
        $guiaproduccionponedoras75->prodtbGup = $request->prodtbGup75;
        $guiaproduccionponedoras75->haatabGup = $request->haatabGup75;
        $guiaproduccionponedoras75->grtbGup = $request->grtbGup75;
        $guiaproduccionponedoras75->pesohuevotablaGup = $request->pesohuevotablaGup75;
        $guiaproduccionponedoras75->idGuia = $guia->id;
        $guiaproduccionponedoras75->save();
        $guiaproduccionponedoras76 = new Guiaproduccion;
        $guiaproduccionponedoras76->semanaGup = 77;
        $guiaproduccionponedoras76->tbGup = $request->tbGup76;
        $guiaproduccionponedoras76->tb1Gup = $request->tb1Gup76;
        $guiaproduccionponedoras76->tb2Gup = $request->tb2Gup76;
        $guiaproduccionponedoras76->real4Gup = $request->real4Gup76;
        $guiaproduccionponedoras76->tab1Gup = $request->tab1Gup76;
        $guiaproduccionponedoras76->real5Gup = $request->real5Gup76;
        $guiaproduccionponedoras76->tab2Gup = $request->tab2Gup76;
        $guiaproduccionponedoras76->prodtbGup = $request->prodtbGup76;
        $guiaproduccionponedoras76->haatabGup = $request->haatabGup76;
        $guiaproduccionponedoras76->grtbGup = $request->grtbGup76;
        $guiaproduccionponedoras76->pesohuevotablaGup = $request->pesohuevotablaGup76;
        $guiaproduccionponedoras76->idGuia = $guia->id;
        $guiaproduccionponedoras76->save();
        $guiaproduccionponedoras77 = new Guiaproduccion;
        $guiaproduccionponedoras77->semanaGup = 78;
        $guiaproduccionponedoras77->tbGup = $request->tbGup77;
        $guiaproduccionponedoras77->tb1Gup = $request->tb1Gup77;
        $guiaproduccionponedoras77->tb2Gup = $request->tb2Gup77;
        $guiaproduccionponedoras77->real4Gup = $request->real4Gup77;
        $guiaproduccionponedoras77->tab1Gup = $request->tab1Gup77;
        $guiaproduccionponedoras77->real5Gup = $request->real5Gup77;
        $guiaproduccionponedoras77->tab2Gup = $request->tab2Gup77;
        $guiaproduccionponedoras77->prodtbGup = $request->prodtbGup77;
        $guiaproduccionponedoras77->haatabGup = $request->haatabGup77;
        $guiaproduccionponedoras77->grtbGup = $request->grtbGup77;
        $guiaproduccionponedoras77->pesohuevotablaGup = $request->pesohuevotablaGup77;
        $guiaproduccionponedoras77->idGuia = $guia->id;
        $guiaproduccionponedoras77->save();
        $guiaproduccionponedoras78 = new Guiaproduccion;
        $guiaproduccionponedoras78->semanaGup = 79;
        $guiaproduccionponedoras78->tbGup = $request->tbGup78;
        $guiaproduccionponedoras78->tb1Gup = $request->tb1Gup78;
        $guiaproduccionponedoras78->tb2Gup = $request->tb2Gup78;
        $guiaproduccionponedoras78->real4Gup = $request->real4Gup78;
        $guiaproduccionponedoras78->tab1Gup = $request->tab1Gup78;
        $guiaproduccionponedoras78->real5Gup = $request->real5Gup78;
        $guiaproduccionponedoras78->tab2Gup = $request->tab2Gup78;
        $guiaproduccionponedoras78->prodtbGup = $request->prodtbGup78;
        $guiaproduccionponedoras78->haatabGup = $request->haatabGup78;
        $guiaproduccionponedoras78->grtbGup = $request->grtbGup78;
        $guiaproduccionponedoras78->pesohuevotablaGup = $request->pesohuevotablaGup78;
        $guiaproduccionponedoras78->idGuia = $guia->id;
        $guiaproduccionponedoras78->save();
        $guiaproduccionponedoras79 = new Guiaproduccion;
        $guiaproduccionponedoras79->semanaGup = 80;
        $guiaproduccionponedoras79->tbGup = $request->tbGup79;
        $guiaproduccionponedoras79->tb1Gup = $request->tb1Gup79;
        $guiaproduccionponedoras79->tb2Gup = $request->tb2Gup79;
        $guiaproduccionponedoras79->real4Gup = $request->real4Gup79;
        $guiaproduccionponedoras79->tab1Gup = $request->tab1Gup79;
        $guiaproduccionponedoras79->real5Gup = $request->real5Gup79;
        $guiaproduccionponedoras79->tab2Gup = $request->tab2Gup79;
        $guiaproduccionponedoras79->prodtbGup = $request->prodtbGup79;
        $guiaproduccionponedoras79->haatabGup = $request->haatabGup79;
        $guiaproduccionponedoras79->grtbGup = $request->grtbGup79;
        $guiaproduccionponedoras79->pesohuevotablaGup = $request->pesohuevotablaGup79;
        $guiaproduccionponedoras79->idGuia = $guia->id;
        $guiaproduccionponedoras79->save();
        $guiaproduccionponedoras80 = new Guiaproduccion;
        $guiaproduccionponedoras80->semanaGup = 81;
        $guiaproduccionponedoras80->tbGup = $request->tbGup80;
        $guiaproduccionponedoras80->tb1Gup = $request->tb1Gup80;
        $guiaproduccionponedoras80->tb2Gup = $request->tb2Gup80;
        $guiaproduccionponedoras80->real4Gup = $request->real4Gup80;
        $guiaproduccionponedoras80->tab1Gup = $request->tab1Gup80;
        $guiaproduccionponedoras80->real5Gup = $request->real5Gup80;
        $guiaproduccionponedoras80->tab2Gup = $request->tab2Gup80;
        $guiaproduccionponedoras80->prodtbGup = $request->prodtbGup80;
        $guiaproduccionponedoras80->haatabGup = $request->haatabGup80;
        $guiaproduccionponedoras80->grtbGup = $request->grtbGup80;
        $guiaproduccionponedoras80->pesohuevotablaGup = $request->pesohuevotablaGup80;
        $guiaproduccionponedoras80->idGuia = $guia->id;
        $guiaproduccionponedoras80->save();
        $guiaproduccionponedoras81 = new Guiaproduccion;
        $guiaproduccionponedoras81->semanaGup = 82;
        $guiaproduccionponedoras81->tbGup = $request->tbGup81;
        $guiaproduccionponedoras81->tb1Gup = $request->tb1Gup81;
        $guiaproduccionponedoras81->tb2Gup = $request->tb2Gup81;
        $guiaproduccionponedoras81->real4Gup = $request->real4Gup81;
        $guiaproduccionponedoras81->tab1Gup = $request->tab1Gup81;
        $guiaproduccionponedoras81->real5Gup = $request->real5Gup81;
        $guiaproduccionponedoras81->tab2Gup = $request->tab2Gup81;
        $guiaproduccionponedoras81->prodtbGup = $request->prodtbGup81;
        $guiaproduccionponedoras81->haatabGup = $request->haatabGup81;
        $guiaproduccionponedoras81->grtbGup = $request->grtbGup81;
        $guiaproduccionponedoras81->pesohuevotablaGup = $request->pesohuevotablaGup81;
        $guiaproduccionponedoras81->idGuia = $guia->id;
        $guiaproduccionponedoras81->save();
        $guiaproduccionponedoras82 = new Guiaproduccion;
        $guiaproduccionponedoras82->semanaGup = 83;
        $guiaproduccionponedoras82->tbGup = $request->tbGup82;
        $guiaproduccionponedoras82->tb1Gup = $request->tb1Gup82;
        $guiaproduccionponedoras82->tb2Gup = $request->tb2Gup82;
        $guiaproduccionponedoras82->real4Gup = $request->real4Gup82;
        $guiaproduccionponedoras82->tab1Gup = $request->tab1Gup82;
        $guiaproduccionponedoras82->real5Gup = $request->real5Gup82;
        $guiaproduccionponedoras82->tab2Gup = $request->tab2Gup82;
        $guiaproduccionponedoras82->prodtbGup = $request->prodtbGup82;
        $guiaproduccionponedoras82->haatabGup = $request->haatabGup82;
        $guiaproduccionponedoras82->grtbGup = $request->grtbGup82;
        $guiaproduccionponedoras82->pesohuevotablaGup = $request->pesohuevotablaGup82;
        $guiaproduccionponedoras82->idGuia = $guia->id;
        $guiaproduccionponedoras82->save();
        $guiaproduccionponedoras83 = new Guiaproduccion;
        $guiaproduccionponedoras83->semanaGup = 84;
        $guiaproduccionponedoras83->tbGup = $request->tbGup83;
        $guiaproduccionponedoras83->tb1Gup = $request->tb1Gup83;
        $guiaproduccionponedoras83->tb2Gup = $request->tb2Gup83;
        $guiaproduccionponedoras83->real4Gup = $request->real4Gup83;
        $guiaproduccionponedoras83->tab1Gup = $request->tab1Gup83;
        $guiaproduccionponedoras83->real5Gup = $request->real5Gup83;
        $guiaproduccionponedoras83->tab2Gup = $request->tab2Gup83;
        $guiaproduccionponedoras83->prodtbGup = $request->prodtbGup83;
        $guiaproduccionponedoras83->haatabGup = $request->haatabGup83;
        $guiaproduccionponedoras83->grtbGup = $request->grtbGup83;
        $guiaproduccionponedoras83->pesohuevotablaGup = $request->pesohuevotablaGup83;
        $guiaproduccionponedoras83->idGuia = $guia->id;
        $guiaproduccionponedoras83->save();
        $guiaproduccionponedoras84 = new Guiaproduccion;
        $guiaproduccionponedoras84->semanaGup = 85;
        $guiaproduccionponedoras84->tbGup = $request->tbGup84;
        $guiaproduccionponedoras84->tb1Gup = $request->tb1Gup84;
        $guiaproduccionponedoras84->tb2Gup = $request->tb2Gup84;
        $guiaproduccionponedoras84->real4Gup = $request->real4Gup84;
        $guiaproduccionponedoras84->tab1Gup = $request->tab1Gup84;
        $guiaproduccionponedoras84->real5Gup = $request->real5Gup84;
        $guiaproduccionponedoras84->tab2Gup = $request->tab2Gup84;
        $guiaproduccionponedoras84->prodtbGup = $request->prodtbGup84;
        $guiaproduccionponedoras84->haatabGup = $request->haatabGup84;
        $guiaproduccionponedoras84->grtbGup = $request->grtbGup84;
        $guiaproduccionponedoras84->pesohuevotablaGup = $request->pesohuevotablaGup84;
        $guiaproduccionponedoras84->idGuia = $guia->id;
        $guiaproduccionponedoras84->save();
        $guiaproduccionponedoras85 = new Guiaproduccion;
        $guiaproduccionponedoras85->semanaGup = 86;
        $guiaproduccionponedoras85->tbGup = $request->tbGup85;
        $guiaproduccionponedoras85->tb1Gup = $request->tb1Gup85;
        $guiaproduccionponedoras85->tb2Gup = $request->tb2Gup85;
        $guiaproduccionponedoras85->real4Gup = $request->real4Gup85;
        $guiaproduccionponedoras85->tab1Gup = $request->tab1Gup85;
        $guiaproduccionponedoras85->real5Gup = $request->real5Gup85;
        $guiaproduccionponedoras85->tab2Gup = $request->tab2Gup85;
        $guiaproduccionponedoras85->prodtbGup = $request->prodtbGup85;
        $guiaproduccionponedoras85->haatabGup = $request->haatabGup85;
        $guiaproduccionponedoras85->grtbGup = $request->grtbGup85;
        $guiaproduccionponedoras85->pesohuevotablaGup = $request->pesohuevotablaGup85;
        $guiaproduccionponedoras85->idGuia = $guia->id;
        $guiaproduccionponedoras85->save();
        $guiaproduccionponedoras86 = new Guiaproduccion;
        $guiaproduccionponedoras86->semanaGup = 87;
        $guiaproduccionponedoras86->tbGup = $request->tbGup86;
        $guiaproduccionponedoras86->tb1Gup = $request->tb1Gup86;
        $guiaproduccionponedoras86->tb2Gup = $request->tb2Gup86;
        $guiaproduccionponedoras86->real4Gup = $request->real4Gup86;
        $guiaproduccionponedoras86->tab1Gup = $request->tab1Gup86;
        $guiaproduccionponedoras86->real5Gup = $request->real5Gup86;
        $guiaproduccionponedoras86->tab2Gup = $request->tab2Gup86;
        $guiaproduccionponedoras86->prodtbGup = $request->prodtbGup86;
        $guiaproduccionponedoras86->haatabGup = $request->haatabGup86;
        $guiaproduccionponedoras86->grtbGup = $request->grtbGup86;
        $guiaproduccionponedoras86->pesohuevotablaGup = $request->pesohuevotablaGup86;
        $guiaproduccionponedoras86->idGuia = $guia->id;
        $guiaproduccionponedoras86->save();
        $guiaproduccionponedoras87 = new Guiaproduccion;
        $guiaproduccionponedoras87->semanaGup = 88;
        $guiaproduccionponedoras87->tbGup = $request->tbGup87;
        $guiaproduccionponedoras87->tb1Gup = $request->tb1Gup87;
        $guiaproduccionponedoras87->tb2Gup = $request->tb2Gup87;
        $guiaproduccionponedoras87->real4Gup = $request->real4Gup87;
        $guiaproduccionponedoras87->tab1Gup = $request->tab1Gup87;
        $guiaproduccionponedoras87->real5Gup = $request->real5Gup87;
        $guiaproduccionponedoras87->tab2Gup = $request->tab2Gup87;
        $guiaproduccionponedoras87->prodtbGup = $request->prodtbGup87;
        $guiaproduccionponedoras87->haatabGup = $request->haatabGup87;
        $guiaproduccionponedoras87->grtbGup = $request->grtbGup87;
        $guiaproduccionponedoras87->pesohuevotablaGup = $request->pesohuevotablaGup87;
        $guiaproduccionponedoras87->idGuia = $guia->id;
        $guiaproduccionponedoras87->save();
        $guiaproduccionponedoras88 = new Guiaproduccion;
        $guiaproduccionponedoras88->semanaGup = 89;
        $guiaproduccionponedoras88->tbGup = $request->tbGup88;
        $guiaproduccionponedoras88->tb1Gup = $request->tb1Gup88;
        $guiaproduccionponedoras88->tb2Gup = $request->tb2Gup88;
        $guiaproduccionponedoras88->real4Gup = $request->real4Gup88;
        $guiaproduccionponedoras88->tab1Gup = $request->tab1Gup88;
        $guiaproduccionponedoras88->real5Gup = $request->real5Gup88;
        $guiaproduccionponedoras88->tab2Gup = $request->tab2Gup88;
        $guiaproduccionponedoras88->prodtbGup = $request->prodtbGup88;
        $guiaproduccionponedoras88->haatabGup = $request->haatabGup88;
        $guiaproduccionponedoras88->grtbGup = $request->grtbGup88;
        $guiaproduccionponedoras88->pesohuevotablaGup = $request->pesohuevotablaGup88;
        $guiaproduccionponedoras88->idGuia = $guia->id;
        $guiaproduccionponedoras88->save();
        $guiaproduccionponedoras89 = new Guiaproduccion;
        $guiaproduccionponedoras89->semanaGup = 90;
        $guiaproduccionponedoras89->tbGup = $request->tbGup89;
        $guiaproduccionponedoras89->tb1Gup = $request->tb1Gup89;
        $guiaproduccionponedoras89->tb2Gup = $request->tb2Gup89;
        $guiaproduccionponedoras89->real4Gup = $request->real4Gup89;
        $guiaproduccionponedoras89->tab1Gup = $request->tab1Gup89;
        $guiaproduccionponedoras89->real5Gup = $request->real5Gup89;
        $guiaproduccionponedoras89->tab2Gup = $request->tab2Gup89;
        $guiaproduccionponedoras89->prodtbGup = $request->prodtbGup89;
        $guiaproduccionponedoras89->haatabGup = $request->haatabGup89;
        $guiaproduccionponedoras89->grtbGup = $request->grtbGup89;
        $guiaproduccionponedoras89->pesohuevotablaGup = $request->pesohuevotablaGup89;
        $guiaproduccionponedoras89->idGuia = $guia->id;
        $guiaproduccionponedoras89->save();
        $guiaproduccionponedoras90 = new Guiaproduccion;
        $guiaproduccionponedoras90->semanaGup = 91;
        $guiaproduccionponedoras90->tbGup = $request->tbGup90;
        $guiaproduccionponedoras90->tb1Gup = $request->tb1Gup90;
        $guiaproduccionponedoras90->tb2Gup = $request->tb2Gup90;
        $guiaproduccionponedoras90->real4Gup = $request->real4Gup90;
        $guiaproduccionponedoras90->tab1Gup = $request->tab1Gup90;
        $guiaproduccionponedoras90->real5Gup = $request->real5Gup90;
        $guiaproduccionponedoras90->tab2Gup = $request->tab2Gup90;
        $guiaproduccionponedoras90->prodtbGup = $request->prodtbGup90;
        $guiaproduccionponedoras90->haatabGup = $request->haatabGup90;
        $guiaproduccionponedoras90->grtbGup = $request->grtbGup90;
        $guiaproduccionponedoras90->pesohuevotablaGup = $request->pesohuevotablaGup90;
        $guiaproduccionponedoras90->idGuia = $guia->id;
        $guiaproduccionponedoras90->save();
        $guiaproduccionponedoras91 = new Guiaproduccion;
        $guiaproduccionponedoras91->semanaGup = 92;
        $guiaproduccionponedoras91->tbGup = $request->tbGup91;
        $guiaproduccionponedoras91->tb1Gup = $request->tb1Gup91;
        $guiaproduccionponedoras91->tb2Gup = $request->tb2Gup91;
        $guiaproduccionponedoras91->real4Gup = $request->real4Gup91;
        $guiaproduccionponedoras91->tab1Gup = $request->tab1Gup91;
        $guiaproduccionponedoras91->real5Gup = $request->real5Gup91;
        $guiaproduccionponedoras91->tab2Gup = $request->tab2Gup91;
        $guiaproduccionponedoras91->prodtbGup = $request->prodtbGup91;
        $guiaproduccionponedoras91->haatabGup = $request->haatabGup91;
        $guiaproduccionponedoras91->grtbGup = $request->grtbGup91;
        $guiaproduccionponedoras91->pesohuevotablaGup = $request->pesohuevotablaGup91;
        $guiaproduccionponedoras91->idGuia = $guia->id;
        $guiaproduccionponedoras91->save();
        $guiaproduccionponedoras92 = new Guiaproduccion;
        $guiaproduccionponedoras92->semanaGup = 93;
        $guiaproduccionponedoras92->tbGup = $request->tbGup92;
        $guiaproduccionponedoras92->tb1Gup = $request->tb1Gup92;
        $guiaproduccionponedoras92->tb2Gup = $request->tb2Gup92;
        $guiaproduccionponedoras92->real4Gup = $request->real4Gup92;
        $guiaproduccionponedoras92->tab1Gup = $request->tab1Gup92;
        $guiaproduccionponedoras92->real5Gup = $request->real5Gup92;
        $guiaproduccionponedoras92->tab2Gup = $request->tab2Gup92;
        $guiaproduccionponedoras92->prodtbGup = $request->prodtbGup92;
        $guiaproduccionponedoras92->haatabGup = $request->haatabGup92;
        $guiaproduccionponedoras92->grtbGup = $request->grtbGup92;
        $guiaproduccionponedoras92->pesohuevotablaGup = $request->pesohuevotablaGup92;
        $guiaproduccionponedoras92->idGuia = $guia->id;
        $guiaproduccionponedoras92->save();
        $guiaproduccionponedoras93 = new Guiaproduccion;
        $guiaproduccionponedoras93->semanaGup = 94;
        $guiaproduccionponedoras93->tbGup = $request->tbGup93;
        $guiaproduccionponedoras93->tb1Gup = $request->tb1Gup93;
        $guiaproduccionponedoras93->tb2Gup = $request->tb2Gup93;
        $guiaproduccionponedoras93->real4Gup = $request->real4Gup93;
        $guiaproduccionponedoras93->tab1Gup = $request->tab1Gup93;
        $guiaproduccionponedoras93->real5Gup = $request->real5Gup93;
        $guiaproduccionponedoras93->tab2Gup = $request->tab2Gup93;
        $guiaproduccionponedoras93->prodtbGup = $request->prodtbGup93;
        $guiaproduccionponedoras93->haatabGup = $request->haatabGup93;
        $guiaproduccionponedoras93->grtbGup = $request->grtbGup93;
        $guiaproduccionponedoras93->pesohuevotablaGup = $request->pesohuevotablaGup93;
        $guiaproduccionponedoras93->idGuia = $guia->id;
        $guiaproduccionponedoras93->save();
        $guiaproduccionponedoras94 = new Guiaproduccion;
        $guiaproduccionponedoras94->semanaGup = 95;
        $guiaproduccionponedoras94->tbGup = $request->tbGup94;
        $guiaproduccionponedoras94->tb1Gup = $request->tb1Gup94;
        $guiaproduccionponedoras94->tb2Gup = $request->tb2Gup94;
        $guiaproduccionponedoras94->real4Gup = $request->real4Gup94;
        $guiaproduccionponedoras94->tab1Gup = $request->tab1Gup94;
        $guiaproduccionponedoras94->real5Gup = $request->real5Gup94;
        $guiaproduccionponedoras94->tab2Gup = $request->tab2Gup94;
        $guiaproduccionponedoras94->prodtbGup = $request->prodtbGup94;
        $guiaproduccionponedoras94->haatabGup = $request->haatabGup94;
        $guiaproduccionponedoras94->grtbGup = $request->grtbGup94;
        $guiaproduccionponedoras94->pesohuevotablaGup = $request->pesohuevotablaGup94;
        $guiaproduccionponedoras94->idGuia = $guia->id;
        $guiaproduccionponedoras94->save();
        $guiaproduccionponedoras95 = new Guiaproduccion;
        $guiaproduccionponedoras95->semanaGup = 96;
        $guiaproduccionponedoras95->tbGup = $request->tbGup95;
        $guiaproduccionponedoras95->tb1Gup = $request->tb1Gup95;
        $guiaproduccionponedoras95->tb2Gup = $request->tb2Gup95;
        $guiaproduccionponedoras95->real4Gup = $request->real4Gup95;
        $guiaproduccionponedoras95->tab1Gup = $request->tab1Gup95;
        $guiaproduccionponedoras95->real5Gup = $request->real5Gup95;
        $guiaproduccionponedoras95->tab2Gup = $request->tab2Gup95;
        $guiaproduccionponedoras95->prodtbGup = $request->prodtbGup95;
        $guiaproduccionponedoras95->haatabGup = $request->haatabGup95;
        $guiaproduccionponedoras95->grtbGup = $request->grtbGup95;
        $guiaproduccionponedoras95->pesohuevotablaGup = $request->pesohuevotablaGup95;
        $guiaproduccionponedoras95->idGuia = $guia->id;
        $guiaproduccionponedoras95->save();
        $guiaproduccionponedoras96 = new Guiaproduccion;
        $guiaproduccionponedoras96->semanaGup = 97;
        $guiaproduccionponedoras96->tbGup = $request->tbGup96;
        $guiaproduccionponedoras96->tb1Gup = $request->tb1Gup96;
        $guiaproduccionponedoras96->tb2Gup = $request->tb2Gup96;
        $guiaproduccionponedoras96->real4Gup = $request->real4Gup96;
        $guiaproduccionponedoras96->tab1Gup = $request->tab1Gup96;
        $guiaproduccionponedoras96->real5Gup = $request->real5Gup96;
        $guiaproduccionponedoras96->tab2Gup = $request->tab2Gup96;
        $guiaproduccionponedoras96->prodtbGup = $request->prodtbGup96;
        $guiaproduccionponedoras96->haatabGup = $request->haatabGup96;
        $guiaproduccionponedoras96->grtbGup = $request->grtbGup96;
        $guiaproduccionponedoras96->pesohuevotablaGup = $request->pesohuevotablaGup96;
        $guiaproduccionponedoras96->idGuia = $guia->id;
        $guiaproduccionponedoras96->save();
        $guiaproduccionponedoras97 = new Guiaproduccion;
        $guiaproduccionponedoras97->semanaGup = 98;
        $guiaproduccionponedoras97->tbGup = $request->tbGup97;
        $guiaproduccionponedoras97->tb1Gup = $request->tb1Gup97;
        $guiaproduccionponedoras97->tb2Gup = $request->tb2Gup97;
        $guiaproduccionponedoras97->real4Gup = $request->real4Gup97;
        $guiaproduccionponedoras97->tab1Gup = $request->tab1Gup97;
        $guiaproduccionponedoras97->real5Gup = $request->real5Gup97;
        $guiaproduccionponedoras97->tab2Gup = $request->tab2Gup97;
        $guiaproduccionponedoras97->prodtbGup = $request->prodtbGup97;
        $guiaproduccionponedoras97->haatabGup = $request->haatabGup97;
        $guiaproduccionponedoras97->grtbGup = $request->grtbGup97;
        $guiaproduccionponedoras97->pesohuevotablaGup = $request->pesohuevotablaGup97;
        $guiaproduccionponedoras97->idGuia = $guia->id;
        $guiaproduccionponedoras97->save();
        $guiaproduccionponedoras98 = new Guiaproduccion;
        $guiaproduccionponedoras98->semanaGup = 99;
        $guiaproduccionponedoras98->tbGup = $request->tbGup98;
        $guiaproduccionponedoras98->tb1Gup = $request->tb1Gup98;
        $guiaproduccionponedoras98->tb2Gup = $request->tb2Gup98;
        $guiaproduccionponedoras98->real4Gup = $request->real4Gup98;
        $guiaproduccionponedoras98->tab1Gup = $request->tab1Gup98;
        $guiaproduccionponedoras98->real5Gup = $request->real5Gup98;
        $guiaproduccionponedoras98->tab2Gup = $request->tab2Gup98;
        $guiaproduccionponedoras98->prodtbGup = $request->prodtbGup98;
        $guiaproduccionponedoras98->haatabGup = $request->haatabGup98;
        $guiaproduccionponedoras98->grtbGup = $request->grtbGup98;
        $guiaproduccionponedoras98->pesohuevotablaGup = $request->pesohuevotablaGup98;
        $guiaproduccionponedoras98->idGuia = $guia->id;
        $guiaproduccionponedoras98->save();
        $guiaproduccionponedoras99 = new Guiaproduccion;
        $guiaproduccionponedoras99->semanaGup = 100;
        $guiaproduccionponedoras99->tbGup = $request->tbGup99;
        $guiaproduccionponedoras99->tb1Gup = $request->tb1Gup99;
        $guiaproduccionponedoras99->tb2Gup = $request->tb2Gup99;
        $guiaproduccionponedoras99->real4Gup = $request->real4Gup99;
        $guiaproduccionponedoras99->tab1Gup = $request->tab1Gup99;
        $guiaproduccionponedoras99->real5Gup = $request->real5Gup99;
        $guiaproduccionponedoras99->tab2Gup = $request->tab2Gup99;
        $guiaproduccionponedoras99->prodtbGup = $request->prodtbGup99;
        $guiaproduccionponedoras99->haatabGup = $request->haatabGup99;
        $guiaproduccionponedoras99->grtbGup = $request->grtbGup99;
        $guiaproduccionponedoras99->pesohuevotablaGup = $request->pesohuevotablaGup99;
        $guiaproduccionponedoras99->idGuia = $guia->id;
        $guiaproduccionponedoras99->save();

        return redirect('guias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guias = Guia::find($id);

        $gp = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 1)
                              ->get();

        $gp2 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 2)
                              ->get();

        $gp3 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 3)
                              ->get();

        $gp4 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 4)
                              ->get();

        $gp5 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 5)
                              ->get();

        $gp6 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 6)
                              ->get();

        $gp7 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 7)
                              ->get();

        $gp8 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 8)
                              ->get();

        $gp9 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 9)
                              ->get();

        $gp10 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 10)
                              ->get();

        $gp11 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 11)
                              ->get();

        $gp12 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 12)
                              ->get();

        $gp13 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 13)
                              ->get();

        $gp14 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 14)
                              ->get();

        $gp15 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 15)
                              ->get();

        $gp16 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 16)
                              ->get();

        $gp17 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 17)
                              ->get();

        $gp18 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 18)
                              ->get();

        $gp19 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 19)
                              ->get();

        $gp20 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 20)
                              ->get();

        $gp21 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 21)
                              ->get();

        $gp22 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 22)
                              ->get();

        $gp23 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 23)
                              ->get();

        $gp24 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 24)
                              ->get();

        $gp25 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 25)
                              ->get();

        $gp26 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 26)
                              ->get();

        $gp27 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 27)
                              ->get();

        $gp28 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 28)
                              ->get();

        $gp29 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 29)
                              ->get();

        $gp30 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 30)
                              ->get();

        $gp31 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 31)
                              ->get();

        $gp32 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 32)
                              ->get();

        $gp33 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 33)
                              ->get();

        $gp34 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 34)
                              ->get();

        $gp35 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 35)
                              ->get();

        $gp36 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 36)
                              ->get();

        $gp37 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 37)
                              ->get();

        $gp38 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 38)
                              ->get();

        $gp39 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 39)
                              ->get();

        $gp40 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 40)
                              ->get();

        $gp41 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 41)
                              ->get();

        $gp42 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 42)
                              ->get();

        $gp43 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 43)
                              ->get();

        $gp44 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 44)
                              ->get();

        $gp45 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 45)
                              ->get();

        $gp46 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 46)
                              ->get();

        $gp47 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 47)
                              ->get();

        $gp48 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 48)
                              ->get();

        $gp49 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 49)
                              ->get();

        $gp50 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 50)
                              ->get();

        $gp51 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 51)
                              ->get();

        $gp52 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 52)
                              ->get();

        $gp53 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 53)
                              ->get();

        $gp54 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 54)
                              ->get();

        $gp55 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 55)
                              ->get();

        $gp56 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 56)
                              ->get();

        $gp57 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 57)
                              ->get();

        $gp58 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 58)
                              ->get();

        $gp59 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 59)
                              ->get();

        $gp60 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 60)
                              ->get();

        $gp61 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 61)
                              ->get();

        $gp62 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 62)
                              ->get();

        $gp63 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 63)
                              ->get();

        $gp64 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 64)
                              ->get();

        $gp65 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 65)
                              ->get();

        $gp66 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 66)
                              ->get();

        $gp67 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 67)
                              ->get();

        $gp68 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 68)
                              ->get();

        $gp69 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 69)
                              ->get();

        $gp70 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 70)
                              ->get();

        $gp71 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 71)
                              ->get();

        $gp72 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 72)
                              ->get();

        $gp73 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 73)
                              ->get();

        $gp74 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 74)
                              ->get();

        $gp75 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 75)
                              ->get();

        $gp76 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 76)
                              ->get();

        $gp77 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 77)
                              ->get();

        $gp78 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 78)
                              ->get();

        $gp79 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 79)
                              ->get();

        $gp80 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 80)
                              ->get();

        $gp81 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 81)
                              ->get();

        $gp82 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 82)
                              ->get();

        $gp83 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 83)
                              ->get();

        $gp84 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 84)
                              ->get();

        $gp85 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 85)
                              ->get();

        $gp86 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 86)
                              ->get();

        $gp87 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 87)
                              ->get();

        $gp88 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 88)
                              ->get();

        $gp89 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 89)
                              ->get();

        $gp90 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 90)
                              ->get();

        $gp91 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 91)
                              ->get();

        $gp92 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 92)
                              ->get();

        $gp93 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 93)
                              ->get();

        $gp94 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 94)
                              ->get();

        $gp95 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 95)
                              ->get();

        $gp96 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 96)
                              ->get();

        $gp97 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 97)
                              ->get();

        $gp98 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 98)
                              ->get();

        $gp99 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 99)
                              ->get();

        $gp100 = Guiaproduccion::select('guiaproduccions.*')
                              ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                              ->where('idGuia','=', $id)
                              ->where('semanaGup','=', 100)
                              ->get();

        return view('Avicol/GuiaProduccionPonedora/update', compact('guias', 'gp', 'gp2','gp3','gp4','gp5','gp6','gp7','gp8','gp9','gp10','gp11','gp12','gp13','gp14','gp15','gp16','gp17', 'gp18', 'gp19','gp20','gp21','gp22','gp23','gp24','gp25','gp26','gp27','gp28','gp29','gp30','gp31','gp32','gp33','gp34', 'gp35', 'gp36','gp37','gp38','gp39','gp40','gp41','gp42','gp43','gp44','gp45','gp46','gp47','gp48','gp49','gp50','gp51', 'gp52', 'gp53','gp54','gp55','gp56','gp57','gp58','gp59','gp60','gp61','gp62','gp63','gp64','gp65','gp66','gp67','gp68', 'gp69', 'gp70','gp71','gp72','gp73','gp74','gp75','gp76','gp77','gp78','gp79','gp80','gp81','gp82','gp83','gp84','gp85', 'gp86', 'gp87','gp88','gp89','gp90','gp91','gp92','gp93','gp94','gp95','gp96','gp97','gp98','gp99','gp100'));

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
          $guias = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 1)
                                ->get();

          $guias2 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 2)
                                ->get();

          $guias3 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 3)
                                ->get();

          $guias4 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 4)
                                ->get();

          $guias5 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 5)
                                ->get();

          $guias6 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 6)
                                ->get();

          $guias7 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 7)
                                ->get();

          $guias8 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 8)
                                ->get();

          $guias9 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 9)
                                ->get();

          $guias10 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 10)
                                ->get();

          $guias11 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 11)
                                ->get();

          $guias12 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 12)
                                ->get();

          $guias13 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 13)
                                ->get();

          $guias14 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 14)
                                ->get();

          $guias15 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 15)
                                ->get();

          $guias16 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 16)
                                ->get();

          $guias17 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 17)
                                ->get();

          $guias18 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 18)
                                ->get();

          $guias19 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 19)
                                ->get();

          $guias20 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 20)
                                ->get();

          $guias21 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 21)
                                ->get();

          $guias22 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 22)
                                ->get();

          $guias23 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 23)
                                ->get();

          $guias24 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 24)
                                ->get();

          $guias25 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 25)
                                ->get();

          $guias26 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 26)
                                ->get();

          $guias27 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 27)
                                ->get();

          $guias28 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 28)
                                ->get();

          $guias29 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 29)
                                ->get();

          $guias30 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 30)
                                ->get();

          $guias31 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 31)
                                ->get();

          $guias32 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 32)
                                ->get();

          $guias33 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 33)
                                ->get();

          $guias34 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 34)
                                ->get();

          $guias35 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 35)
                                ->get();

          $guias36 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 36)
                                ->get();

          $guias37 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 37)
                                ->get();

          $guias38 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 38)
                                ->get();

          $guias39 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 39)
                                ->get();

          $guias40 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 40)
                                ->get();

          $guias41 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 41)
                                ->get();

          $guias42 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 42)
                                ->get();

          $guias43 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 43)
                                ->get();

          $guias44 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 44)
                                ->get();

          $guias45 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 45)
                                ->get();

          $guias46 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 46)
                                ->get();

          $guias47 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 47)
                                ->get();

          $guias48 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 48)
                                ->get();

          $guias49 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 49)
                                ->get();

          $guias50 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 50)
                                ->get();

          $guias51 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 51)
                                ->get();

          $guias52 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 52)
                                ->get();

          $guias53 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 53)
                                ->get();

          $guias54 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 54)
                                ->get();

          $guias55 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 55)
                                ->get();

          $guias56 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 56)
                                ->get();

          $guias57 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 57)
                                ->get();

          $guias58 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 58)
                                ->get();

          $guias59 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 59)
                                ->get();

          $guias60 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 60)
                                ->get();

          $guias61 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 61)
                                ->get();

          $guias62 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 62)
                                ->get();

          $guias63 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 63)
                                ->get();

          $guias64 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 64)
                                ->get();

          $guias65 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 65)
                                ->get();

          $guias66 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 66)
                                ->get();

          $guias67 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 67)
                                ->get();

          $guias68 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 68)
                                ->get();

          $guias69 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 69)
                                ->get();

          $guias70 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 70)
                                ->get();

          $guias71 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 71)
                                ->get();

          $guias72 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 72)
                                ->get();

          $guias73 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 73)
                                ->get();

          $guias74 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 74)
                                ->get();

          $guias75 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 75)
                                ->get();

          $guias76 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 76)
                                ->get();

          $guias77 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 77)
                                ->get();

          $guias78 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 78)
                                ->get();

          $guias79 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 79)
                                ->get();

          $guias80 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 80)
                                ->get();

          $guias81 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 81)
                                ->get();

          $guias82 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 82)
                                ->get();

          $guias83 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 83)
                                ->get();

          $guias84 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 84)
                                ->get();

          $guias85 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 85)
                                ->get();

          $guias86 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 86)
                                ->get();

          $guias87 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 87)
                                ->get();

          $guias88 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 88)
                                ->get();

          $guias89 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 89)
                                ->get();

          $guias90 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 90)
                                ->get();

          $guias91 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 91)
                                ->get();

          $guias92 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 92)
                                ->get();

          $guias93 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 93)
                                ->get();

          $guias94 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 94)
                                ->get();

          $guias95 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 95)
                                ->get();

          $guias96 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 96)
                                ->get();

          $guias97 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 97)
                                ->get();

          $guias98 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 98)
                                ->get();

          $guias99 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 99)
                                ->get();

          $guias100 = Guiaproduccion::select('guiaproduccions.*','guias.nombreGui')
                                ->join('guias', 'guias.id','=', 'guiaproduccions.idGuia')
                                ->where('idGuia','=', $id)
                                ->where('semanaGup','=', 100)
                                ->get();

          foreach ($guias as $guia) {
              $guia->tbGup = $request->tbGup;
              $guia->tb1Gup = $request->tb1Gup;
              $guia->tb2Gup = $request->tb2Gup;
              $guia->real4Gup = $request->real4Gup;
              $guia->tab1Gup = $request->tab1Gup;
              $guia->real5Gup = $request->real5Gup;
              $guia->tab2Gup = $request->tab2Gup;
              $guia->prodtbGup = $request->prodtbGup;
              $guia->haatabGup = $request->haatabGup;
              $guia->grtbGup = $request->grtbGup;
              $guia->pesohuevotablaGup = $request->pesohuevotablaGup;
              $guia->idGuia = $id;
              $guia->save();
            }
            foreach ($guias2 as $guia2) {
              $guia2->tbGup = $request->tbGup1;
              $guia2->tb1Gup = $request->tb1Gup1;
              $guia2->tb2Gup = $request->tb2Gup1;
              $guia2->real4Gup = $request->real4Gup1;
              $guia2->tab1Gup = $request->tab1Gup1;
              $guia2->real5Gup = $request->real5Gup1;
              $guia2->tab2Gup = $request->tab2Gup1;
              $guia2->prodtbGup = $request->prodtbGup1;
              $guia2->haatabGup = $request->haatabGup1;
              $guia2->grtbGup = $request->grtbGup1;
              $guia2->pesohuevotablaGup = $request->pesohuevotablaGup1;
              $guia2->idGuia = $id;
              $guia2->save();
            }
            foreach ($guias3 as $guia3) {
              $guia3->tbGup = $request->tbGup2;
              $guia3->tb1Gup = $request->tb1Gup2;
              $guia3->tb2Gup = $request->tb2Gup2;
              $guia3->real4Gup = $request->real4Gup2;
              $guia3->tab1Gup = $request->tab1Gup2;
              $guia3->real5Gup = $request->real5Gup2;
              $guia3->tab2Gup = $request->tab2Gup2;
              $guia3->prodtbGup = $request->prodtbGup2;
              $guia3->haatabGup = $request->haatabGup2;
              $guia3->grtbGup = $request->grtbGup2;
              $guia3->pesohuevotablaGup = $request->pesohuevotablaGup2;
              $guia3->idGuia = $id;
              $guia3->save();
            }
            foreach ($guias4 as $guia4) {
              $guia4->tbGup = $request->tbGup3;
              $guia4->tb1Gup = $request->tb1Gup3;
              $guia4->tb2Gup = $request->tb2Gup3;
              $guia4->real4Gup = $request->real4Gup3;
              $guia4->tab1Gup = $request->tab1Gup3;
              $guia4->real5Gup = $request->real5Gup3;
              $guia4->tab2Gup = $request->tab2Gup3;
              $guia4->prodtbGup = $request->prodtbGup3;
              $guia4->haatabGup = $request->haatabGup3;
              $guia4->grtbGup = $request->grtbGup3;
              $guia4->pesohuevotablaGup = $request->pesohuevotablaGup3;
              $guia4->idGuia = $id;
              $guia4->save();
            }
            foreach ($guias5 as $guia5) {
              $guia5->tbGup = $request->tbGup4;
              $guia5->tb1Gup = $request->tb1Gup4;
              $guia5->tb2Gup = $request->tb2Gup4;
              $guia5->real4Gup = $request->real4Gup4;
              $guia5->tab1Gup = $request->tab1Gup4;
              $guia5->real5Gup = $request->real5Gup4;
              $guia5->tab2Gup = $request->tab2Gup4;
              $guia5->prodtbGup = $request->prodtbGup4;
              $guia5->haatabGup = $request->haatabGup4;
              $guia5->grtbGup = $request->grtbGup4;
              $guia5->pesohuevotablaGup = $request->pesohuevotablaGup4;
              $guia5->idGuia = $id;
              $guia5->save();
            }
            foreach ($guias6 as $guia6) {
              $guia6->tbGup = $request->tbGup5;
              $guia6->tb1Gup = $request->tb1Gup5;
              $guia6->tb2Gup = $request->tb2Gup5;
              $guia6->real4Gup = $request->real4Gup5;
              $guia6->tab1Gup = $request->tab1Gup5;
              $guia6->real5Gup = $request->real5Gup5;
              $guia6->tab2Gup = $request->tab2Gup5;
              $guia6->prodtbGup = $request->prodtbGup5;
              $guia6->haatabGup = $request->haatabGup5;
              $guia6->grtbGup = $request->grtbGup5;
              $guia6->pesohuevotablaGup = $request->pesohuevotablaGup5;
              $guia6->idGuia = $id;
              $guia6->save();
            }
            foreach ($guias7 as $guia7) {
              $guia7->tbGup = $request->tbGup6;
              $guia7->tb1Gup = $request->tb1Gup6;
              $guia7->tb2Gup = $request->tb2Gup6;
              $guia7->real4Gup = $request->real4Gup6;
              $guia7->tab1Gup = $request->tab1Gup6;
              $guia7->real5Gup = $request->real5Gup6;
              $guia7->tab2Gup = $request->tab2Gup6;
              $guia7->prodtbGup = $request->prodtbGup6;
              $guia7->haatabGup = $request->haatabGup6;
              $guia7->grtbGup = $request->grtbGup6;
              $guia7->pesohuevotablaGup = $request->pesohuevotablaGup6;
              $guia7->idGuia = $id;
              $guia7->save();
            }
            foreach ($guias8 as $guia8) {
              $guia8->tbGup = $request->tbGup7;
              $guia8->tb1Gup = $request->tb1Gup7;
              $guia8->tb2Gup = $request->tb2Gup7;
              $guia8->real4Gup = $request->real4Gup7;
              $guia8->tab1Gup = $request->tab1Gup7;
              $guia8->real5Gup = $request->real5Gup7;
              $guia8->tab2Gup = $request->tab2Gup7;
              $guia8->prodtbGup = $request->prodtbGup7;
              $guia8->haatabGup = $request->haatabGup7;
              $guia8->grtbGup = $request->grtbGup7;
              $guia8->pesohuevotablaGup = $request->pesohuevotablaGup7;
              $guia8->idGuia = $id;
              $guia8->save();
            }
            foreach ($guias9 as $guia9) {
              $guia9->tbGup = $request->tbGup8;
              $guia9->tb1Gup = $request->tb1Gup8;
              $guia9->tb2Gup = $request->tb2Gup8;
              $guia9->real4Gup = $request->real4Gup8;
              $guia9->tab1Gup = $request->tab1Gup8;
              $guia9->real5Gup = $request->real5Gup8;
              $guia9->tab2Gup = $request->tab2Gup8;
              $guia9->prodtbGup = $request->prodtbGup8;
              $guia9->haatabGup = $request->haatabGup8;
              $guia9->grtbGup = $request->grtbGup8;
              $guia9->pesohuevotablaGup = $request->pesohuevotablaGup8;
              $guia9->idGuia = $id;
              $guia9->save();
            }
            foreach ($guias10 as $guia10) {
              $guia10->tbGup = $request->tbGup9;
              $guia10->tb1Gup = $request->tb1Gup9;
              $guia10->tb2Gup = $request->tb2Gup9;
              $guia10->real4Gup = $request->real4Gup9;
              $guia10->tab1Gup = $request->tab1Gup9;
              $guia10->real5Gup = $request->real5Gup9;
              $guia10->tab2Gup = $request->tab2Gup9;
              $guia10->prodtbGup = $request->prodtbGup9;
              $guia10->haatabGup = $request->haatabGup9;
              $guia10->grtbGup = $request->grtbGup9;
              $guia10->pesohuevotablaGup = $request->pesohuevotablaGup9;
              $guia10->idGuia = $id;
              $guia10->save();
            }
            foreach ($guias11 as $guia11) {
              $guia11->tbGup = $request->tbGup10;
              $guia11->tb1Gup = $request->tb1Gup10;
              $guia11->tb2Gup = $request->tb2Gup10;
              $guia11->real4Gup = $request->real4Gup10;
              $guia11->tab1Gup = $request->tab1Gup10;
              $guia11->real5Gup = $request->real5Gup10;
              $guia11->tab2Gup = $request->tab2Gup10;
              $guia11->prodtbGup = $request->prodtbGup10;
              $guia11->haatabGup = $request->haatabGup10;
              $guia11->grtbGup = $request->grtbGup10;
              $guia11->pesohuevotablaGup = $request->pesohuevotablaGup10;
              $guia11->idGuia = $id;
              $guia11->save();
            }
            foreach ($guias12 as $guia12) {
              $guia12->tbGup = $request->tbGup11;
              $guia12->tb1Gup = $request->tb1Gup11;
              $guia12->tb2Gup = $request->tb2Gup11;
              $guia12->real4Gup = $request->real4Gup11;
              $guia12->tab1Gup = $request->tab1Gup11;
              $guia12->real5Gup = $request->real5Gup11;
              $guia12->tab2Gup = $request->tab2Gup11;
              $guia12->prodtbGup = $request->prodtbGup11;
              $guia12->haatabGup = $request->haatabGup11;
              $guia12->grtbGup = $request->grtbGup11;
              $guia12->pesohuevotablaGup = $request->pesohuevotablaGup11;
              $guia12->idGuia = $id;
              $guia12->save();
            }
            foreach ($guias13 as $guia13) {
              $guia13->tbGup = $request->tbGup12;
              $guia13->tb1Gup = $request->tb1Gup12;
              $guia13->tb2Gup = $request->tb2Gup12;
              $guia13->real4Gup = $request->real4Gup12;
              $guia13->tab1Gup = $request->tab1Gup12;
              $guia13->real5Gup = $request->real5Gup12;
              $guia13->tab2Gup = $request->tab2Gup12;
              $guia13->prodtbGup = $request->prodtbGup12;
              $guia13->haatabGup = $request->haatabGup12;
              $guia13->grtbGup = $request->grtbGup12;
              $guia13->pesohuevotablaGup = $request->pesohuevotablaGup12;
              $guia13->idGuia = $id;
              $guia13->save();
            }
            foreach ($guias14 as $guia14) {
              $guia14->tbGup = $request->tbGup13;
              $guia14->tb1Gup = $request->tb1Gup13;
              $guia14->tb2Gup = $request->tb2Gup13;
              $guia14->real4Gup = $request->real4Gup13;
              $guia14->tab1Gup = $request->tab1Gup13;
              $guia14->real5Gup = $request->real5Gup13;
              $guia14->tab2Gup = $request->tab2Gup13;
              $guia14->prodtbGup = $request->prodtbGup13;
              $guia14->haatabGup = $request->haatabGup13;
              $guia14->grtbGup = $request->grtbGup13;
              $guia14->pesohuevotablaGup = $request->pesohuevotablaGup13;
              $guia14->idGuia = $id;
              $guia14->save();
            }
            foreach ($guias15 as $guia15) {
              $guia15->tbGup = $request->tbGup14;
              $guia15->tb1Gup = $request->tb1Gup14;
              $guia15->tb2Gup = $request->tb2Gup14;
              $guia15->real4Gup = $request->real4Gup14;
              $guia15->tab1Gup = $request->tab1Gup14;
              $guia15->real5Gup = $request->real5Gup14;
              $guia15->tab2Gup = $request->tab2Gup14;
              $guia15->prodtbGup = $request->prodtbGup14;
              $guia15->haatabGup = $request->haatabGup14;
              $guia15->grtbGup = $request->grtbGup14;
              $guia15->pesohuevotablaGup = $request->pesohuevotablaGup14;
              $guia15->idGuia = $id;
              $guia15->save();
            }
            foreach ($guias16 as $guia16) {
              $guia16->tbGup = $request->tbGup15;
              $guia16->tb1Gup = $request->tb1Gup15;
              $guia16->tb2Gup = $request->tb2Gup15;
              $guia16->real4Gup = $request->real4Gup15;
              $guia16->tab1Gup = $request->tab1Gup15;
              $guia16->real5Gup = $request->real5Gup15;
              $guia16->tab2Gup = $request->tab2Gup15;
              $guia16->prodtbGup = $request->prodtbGup15;
              $guia16->haatabGup = $request->haatabGup15;
              $guia16->grtbGup = $request->grtbGup15;
              $guia16->pesohuevotablaGup = $request->pesohuevotablaGup15;
              $guia16->idGuia = $id;
              $guia16->save();
            }
            foreach ($guias17 as $guia17) {
              $guia17->tbGup = $request->tbGup16;
              $guia17->tb1Gup = $request->tb1Gup16;
              $guia17->tb2Gup = $request->tb2Gup16;
              $guia17->real4Gup = $request->real4Gup16;
              $guia17->tab1Gup = $request->tab1Gup16;
              $guia17->real5Gup = $request->real5Gup16;
              $guia17->tab2Gup = $request->tab2Gup16;
              $guia17->prodtbGup = $request->prodtbGup16;
              $guia17->haatabGup = $request->haatabGup16;
              $guia17->grtbGup = $request->grtbGup16;
              $guia17->pesohuevotablaGup = $request->pesohuevotablaGup16;
              $guia17->idGuia = $id;
              $guia17->save();
            }
            foreach ($guias18 as $guia18) {
              $guia18->tbGup = $request->tbGup17;
              $guia18->tb1Gup = $request->tb1Gup17;
              $guia18->tb2Gup = $request->tb2Gup17;
              $guia18->real4Gup = $request->real4Gup17;
              $guia18->tab1Gup = $request->tab1Gup17;
              $guia18->real5Gup = $request->real5Gup17;
              $guia18->tab2Gup = $request->tab2Gup17;
              $guia18->prodtbGup = $request->prodtbGup17;
              $guia18->haatabGup = $request->haatabGup17;
              $guia18->grtbGup = $request->grtbGup17;
              $guia18->pesohuevotablaGup = $request->pesohuevotablaGup17;
              $guia18->idGuia = $id;
              $guia18->save();
              }
              foreach ($guias19 as $guia19) {
                $guia19->tbGup = $request->tbGup18;
                $guia19->tb1Gup = $request->tb1Gup18;
                $guia19->tb2Gup = $request->tb2Gup18;
                $guia19->real4Gup = $request->real4Gup18;
                $guia19->tab1Gup = $request->tab1Gup18;
                $guia19->real5Gup = $request->real5Gup18;
                $guia19->tab2Gup = $request->tab2Gup18;
                $guia19->prodtbGup = $request->prodtbGup18;
                $guia19->haatabGup = $request->haatabGup18;
                $guia19->grtbGup = $request->grtbGup18;
                $guia19->pesohuevotablaGup = $request->pesohuevotablaGup18;
                $guia19->idGuia = $id;
                $guia19->save();
              }
              foreach ($guias20 as $guia20) {
                $guia20->tbGup = $request->tbGup19;
                $guia20->tb1Gup = $request->tb1Gup19;
                $guia20->tb2Gup = $request->tb2Gup19;
                $guia20->real4Gup = $request->real4Gup19;
                $guia20->tab1Gup = $request->tab1Gup19;
                $guia20->real5Gup = $request->real5Gup19;
                $guia20->tab2Gup = $request->tab2Gup19;
                $guia20->prodtbGup = $request->prodtbGup19;
                $guia20->haatabGup = $request->haatabGup19;
                $guia20->grtbGup = $request->grtbGup19;
                $guia20->pesohuevotablaGup = $request->pesohuevotablaGup19;
                $guia20->idGuia = $id;
                $guia20->save();
              }
              foreach ($guias21 as $guia21) {
                $guia21->tbGup = $request->tbGup20;
                $guia21->tb1Gup = $request->tb1Gup20;
                $guia21->tb2Gup = $request->tb2Gup20;
                $guia21->real4Gup = $request->real4Gup20;
                $guia21->tab1Gup = $request->tab1Gup20;
                $guia21->real5Gup = $request->real5Gup20;
                $guia21->tab2Gup = $request->tab2Gup20;
                $guia21->prodtbGup = $request->prodtbGup20;
                $guia21->haatabGup = $request->haatabGup20;
                $guia21->grtbGup = $request->grtbGup20;
                $guia21->pesohuevotablaGup = $request->pesohuevotablaGup20;
                $guia21->idGuia = $id;
                $guia21->save();
              }
              foreach ($guias22 as $guia22) {
                $guia22->tbGup = $request->tbGup21;
                $guia22->tb1Gup = $request->tb1Gup21;
                $guia22->tb2Gup = $request->tb2Gup21;
                $guia22->real4Gup = $request->real4Gup21;
                $guia22->tab1Gup = $request->tab1Gup21;
                $guia22->real5Gup = $request->real5Gup21;
                $guia22->tab2Gup = $request->tab2Gup21;
                $guia22->prodtbGup = $request->prodtbGup21;
                $guia22->haatabGup = $request->haatabGup21;
                $guia22->grtbGup = $request->grtbGup21;
                $guia22->pesohuevotablaGup = $request->pesohuevotablaGup21;
                $guia22->idGuia = $id;
                $guia22->save();
              }
              foreach ($guias23 as $guia23) {
                $guia23->tbGup = $request->tbGup22;
                $guia23->tb1Gup = $request->tb1Gup22;
                $guia23->tb2Gup = $request->tb2Gup22;
                $guia23->real4Gup = $request->real4Gup22;
                $guia23->tab1Gup = $request->tab1Gup22;
                $guia23->real5Gup = $request->real5Gup22;
                $guia23->tab2Gup = $request->tab2Gup22;
                $guia23->prodtbGup = $request->prodtbGup22;
                $guia23->haatabGup = $request->haatabGup22;
                $guia23->grtbGup = $request->grtbGup22;
                $guia23->pesohuevotablaGup = $request->pesohuevotablaGup22;
                $guia23->idGuia = $id;
                $guia23->save();
              }
              foreach ($guias24 as $guia24) {
                $guia24->tbGup = $request->tbGup23;
                $guia24->tb1Gup = $request->tb1Gup23;
                $guia24->tb2Gup = $request->tb2Gup23;
                $guia24->real4Gup = $request->real4Gup23;
                $guia24->tab1Gup = $request->tab1Gup23;
                $guia24->real5Gup = $request->real5Gup23;
                $guia24->tab2Gup = $request->tab2Gup23;
                $guia24->prodtbGup = $request->prodtbGup23;
                $guia24->haatabGup = $request->haatabGup23;
                $guia24->grtbGup = $request->grtbGup23;
                $guia24->pesohuevotablaGup = $request->pesohuevotablaGup23;
                $guia24->idGuia = $id;
                $guia24->save();
              }
              foreach ($guias25 as $guia25) {
                $guia25->tbGup = $request->tbGup24;
                $guia25->tb1Gup = $request->tb1Gup24;
                $guia25->tb2Gup = $request->tb2Gup24;
                $guia25->real4Gup = $request->real4Gup24;
                $guia25->tab1Gup = $request->tab1Gup24;
                $guia25->real5Gup = $request->real5Gup24;
                $guia25->tab2Gup = $request->tab2Gup24;
                $guia25->prodtbGup = $request->prodtbGup24;
                $guia25->haatabGup = $request->haatabGup24;
                $guia25->grtbGup = $request->grtbGup24;
                $guia25->pesohuevotablaGup = $request->pesohuevotablaGup24;
                $guia25->idGuia = $id;
                $guia25->save();
              }
              foreach ($guias26 as $guia26) {
                $guia26->tbGup = $request->tbGup25;
                $guia26->tb1Gup = $request->tb1Gup25;
                $guia26->tb2Gup = $request->tb2Gup25;
                $guia26->real4Gup = $request->real4Gup25;
                $guia26->tab1Gup = $request->tab1Gup25;
                $guia26->real5Gup = $request->real5Gup25;
                $guia26->tab2Gup = $request->tab2Gup25;
                $guia26->prodtbGup = $request->prodtbGup25;
                $guia26->haatabGup = $request->haatabGup25;
                $guia26->grtbGup = $request->grtbGup25;
                $guia26->pesohuevotablaGup = $request->pesohuevotablaGup25;
                $guia26->idGuia = $id;
                $guia26->save();
              }
              foreach ($guias27 as $guia27) {
                $guia27->tbGup = $request->tbGup26;
                $guia27->tb1Gup = $request->tb1Gup26;
                $guia27->tb2Gup = $request->tb2Gup26;
                $guia27->real4Gup = $request->real4Gup26;
                $guia27->tab1Gup = $request->tab1Gup26;
                $guia27->real5Gup = $request->real5Gup26;
                $guia27->tab2Gup = $request->tab2Gup26;
                $guia27->prodtbGup = $request->prodtbGup26;
                $guia27->haatabGup = $request->haatabGup26;
                $guia27->grtbGup = $request->grtbGup26;
                $guia27->pesohuevotablaGup = $request->pesohuevotablaGup26;
                $guia27->idGuia = $id;
                $guia27->save();
              }
              foreach ($guias28 as $guia28) {
                $guia28->tbGup = $request->tbGup27;
                $guia28->tb1Gup = $request->tb1Gup27;
                $guia28->tb2Gup = $request->tb2Gup27;
                $guia28->real4Gup = $request->real4Gup27;
                $guia28->tab1Gup = $request->tab1Gup27;
                $guia28->real5Gup = $request->real5Gup27;
                $guia28->tab2Gup = $request->tab2Gup27;
                $guia28->prodtbGup = $request->prodtbGup27;
                $guia28->haatabGup = $request->haatabGup27;
                $guia28->grtbGup = $request->grtbGup27;
                $guia28->pesohuevotablaGup = $request->pesohuevotablaGup27;
                $guia28->idGuia = $id;
                $guia28->save();
              }
              foreach ($guias29 as $guia29) {
                $guia29->tbGup = $request->tbGup28;
                $guia29->tb1Gup = $request->tb1Gup28;
                $guia29->tb2Gup = $request->tb2Gup28;
                $guia29->real4Gup = $request->real4Gup28;
                $guia29->tab1Gup = $request->tab1Gup28;
                $guia29->real5Gup = $request->real5Gup28;
                $guia29->tab2Gup = $request->tab2Gup28;
                $guia29->prodtbGup = $request->prodtbGup28;
                $guia29->haatabGup = $request->haatabGup28;
                $guia29->grtbGup = $request->grtbGup28;
                $guia29->pesohuevotablaGup = $request->pesohuevotablaGup28;
                $guia29->idGuia = $id;
                $guia29->save();
              }
              foreach ($guias30 as $guia30) {
                $guia30->tbGup = $request->tbGup29;
                $guia30->tb1Gup = $request->tb1Gup29;
                $guia30->tb2Gup = $request->tb2Gup29;
                $guia30->real4Gup = $request->real4Gup29;
                $guia30->tab1Gup = $request->tab1Gup29;
                $guia30->real5Gup = $request->real5Gup29;
                $guia30->tab2Gup = $request->tab2Gup29;
                $guia30->prodtbGup = $request->prodtbGup29;
                $guia30->haatabGup = $request->haatabGup29;
                $guia30->grtbGup = $request->grtbGup29;
                $guia30->pesohuevotablaGup = $request->pesohuevotablaGup29;
                $guia30->idGuia = $id;
                $guia30->save();
              }
              foreach ($guias31 as $guia31) {
                $guia31->tbGup = $request->tbGup30;
                $guia31->tb1Gup = $request->tb1Gup30;
                $guia31->tb2Gup = $request->tb2Gup30;
                $guia31->real4Gup = $request->real4Gup30;
                $guia31->tab1Gup = $request->tab1Gup30;
                $guia31->real5Gup = $request->real5Gup30;
                $guia31->tab2Gup = $request->tab2Gup30;
                $guia31->prodtbGup = $request->prodtbGup30;
                $guia31->haatabGup = $request->haatabGup30;
                $guia31->grtbGup = $request->grtbGup30;
                $guia31->pesohuevotablaGup = $request->pesohuevotablaGup30;
                $guia31->idGuia = $id;
                $guia31->save();
              }
              foreach ($guias32 as $guia32) {
                $guia32->tbGup = $request->tbGup31;
                $guia32->tb1Gup = $request->tb1Gup31;
                $guia32->tb2Gup = $request->tb2Gup31;
                $guia32->real4Gup = $request->real4Gup31;
                $guia32->tab1Gup = $request->tab1Gup31;
                $guia32->real5Gup = $request->real5Gup31;
                $guia32->tab2Gup = $request->tab2Gup31;
                $guia32->prodtbGup = $request->prodtbGup31;
                $guia32->haatabGup = $request->haatabGup31;
                $guia32->grtbGup = $request->grtbGup31;
                $guia32->pesohuevotablaGup = $request->pesohuevotablaGup31;
                $guia32->idGuia = $id;
                $guia32->save();
              }
              foreach ($guias33 as $guia33) {
                $guia33->tbGup = $request->tbGup32;
                $guia33->tb1Gup = $request->tb1Gup32;
                $guia33->tb2Gup = $request->tb2Gup32;
                $guia33->real4Gup = $request->real4Gup32;
                $guia33->tab1Gup = $request->tab1Gup32;
                $guia33->real5Gup = $request->real5Gup32;
                $guia33->tab2Gup = $request->tab2Gup32;
                $guia33->prodtbGup = $request->prodtbGup32;
                $guia33->haatabGup = $request->haatabGup32;
                $guia33->grtbGup = $request->grtbGup32;
                $guia33->pesohuevotablaGup = $request->pesohuevotablaGup32;
                $guia33->idGuia = $id;
                $guia33->save();
              }
              foreach ($guias34 as $guia34) {
                $guia34->tbGup = $request->tbGup33;
                $guia34->tb1Gup = $request->tb1Gup33;
                $guia34->tb2Gup = $request->tb2Gup33;
                $guia34->real4Gup = $request->real4Gup33;
                $guia34->tab1Gup = $request->tab1Gup33;
                $guia34->real5Gup = $request->real5Gup33;
                $guia34->tab2Gup = $request->tab2Gup33;
                $guia34->prodtbGup = $request->prodtbGup33;
                $guia34->haatabGup = $request->haatabGup33;
                $guia34->grtbGup = $request->grtbGup33;
                $guia34->pesohuevotablaGup = $request->pesohuevotablaGup33;
                $guia34->idGuia = $id;
                $guia34->save();
              }
              foreach ($guias35 as $guia35) {
                $guia35->tbGup = $request->tbGup34;
                $guia35->tb1Gup = $request->tb1Gup34;
                $guia35->tb2Gup = $request->tb2Gup34;
                $guia35->real4Gup = $request->real4Gup34;
                $guia35->tab1Gup = $request->tab1Gup34;
                $guia35->real5Gup = $request->real5Gup34;
                $guia35->tab2Gup = $request->tab2Gup34;
                $guia35->prodtbGup = $request->prodtbGup34;
                $guia35->haatabGup = $request->haatabGup34;
                $guia35->grtbGup = $request->grtbGup34;
                $guia35->pesohuevotablaGup = $request->pesohuevotablaGup34;
                $guia35->idGuia = $id;
                $guia35->save();
              }
              foreach ($guias36 as $guia36) {
                $guia36->tbGup = $request->tbGup35;
                $guia36->tb1Gup = $request->tb1Gup35;
                $guia36->tb2Gup = $request->tb2Gup35;
                $guia36->real4Gup = $request->real4Gup35;
                $guia36->tab1Gup = $request->tab1Gup35;
                $guia36->real5Gup = $request->real5Gup35;
                $guia36->tab2Gup = $request->tab2Gup35;
                $guia36->prodtbGup = $request->prodtbGup35;
                $guia36->haatabGup = $request->haatabGup35;
                $guia36->grtbGup = $request->grtbGup35;
                $guia36->pesohuevotablaGup = $request->pesohuevotablaGup35;
                $guia36->idGuia = $id;
                $guia36->save();
              }
              foreach ($guias37 as $guia37) {
                $guia37->tbGup = $request->tbGup36;
                $guia37->tb1Gup = $request->tb1Gup36;
                $guia37->tb2Gup = $request->tb2Gup36;
                $guia37->real4Gup = $request->real4Gup36;
                $guia37->tab1Gup = $request->tab1Gup36;
                $guia37->real5Gup = $request->real5Gup36;
                $guia37->tab2Gup = $request->tab2Gup36;
                $guia37->prodtbGup = $request->prodtbGup36;
                $guia37->haatabGup = $request->haatabGup36;
                $guia37->grtbGup = $request->grtbGup36;
                $guia37->pesohuevotablaGup = $request->pesohuevotablaGup36;
                $guia37->idGuia = $id;
                $guia37->save();
              }
              foreach ($guias38 as $guia38) {
                $guia38->tbGup = $request->tbGup37;
                $guia38->tb1Gup = $request->tb1Gup37;
                $guia38->tb2Gup = $request->tb2Gup37;
                $guia38->real4Gup = $request->real4Gup37;
                $guia38->tab1Gup = $request->tab1Gup37;
                $guia38->real5Gup = $request->real5Gup37;
                $guia38->tab2Gup = $request->tab2Gup37;
                $guia38->prodtbGup = $request->prodtbGup37;
                $guia38->haatabGup = $request->haatabGup37;
                $guia38->grtbGup = $request->grtbGup37;
                $guia38->pesohuevotablaGup = $request->pesohuevotablaGup37;
                $guia38->idGuia = $id;
                $guia38->save();
              }
              foreach ($guias39 as $guia39) {
                $guia39->tbGup = $request->tbGup38;
                $guia39->tb1Gup = $request->tb1Gup38;
                $guia39->tb2Gup = $request->tb2Gup38;
                $guia39->real4Gup = $request->real4Gup38;
                $guia39->tab1Gup = $request->tab1Gup38;
                $guia39->real5Gup = $request->real5Gup38;
                $guia39->tab2Gup = $request->tab2Gup38;
                $guia39->prodtbGup = $request->prodtbGup38;
                $guia39->haatabGup = $request->haatabGup38;
                $guia39->grtbGup = $request->grtbGup38;
                $guia39->pesohuevotablaGup = $request->pesohuevotablaGup38;
                $guia39->idGuia = $id;
                $guia39->save();
              }
              foreach ($guias40 as $guia40) {
                $guia40->tbGup = $request->tbGup39;
                $guia40->tb1Gup = $request->tb1Gup39;
                $guia40->tb2Gup = $request->tb2Gup39;
                $guia40->real4Gup = $request->real4Gup39;
                $guia40->tab1Gup = $request->tab1Gup39;
                $guia40->real5Gup = $request->real5Gup39;
                $guia40->tab2Gup = $request->tab2Gup39;
                $guia40->prodtbGup = $request->prodtbGup39;
                $guia40->haatabGup = $request->haatabGup39;
                $guia40->grtbGup = $request->grtbGup39;
                $guia40->pesohuevotablaGup = $request->pesohuevotablaGup39;
                $guia40->idGuia = $id;
                $guia40->save();
              }
              foreach ($guias41 as $guia41) {
                $guia41->tbGup = $request->tbGup40;
                $guia41->tb1Gup = $request->tb1Gup40;
                $guia41->tb2Gup = $request->tb2Gup40;
                $guia41->real4Gup = $request->real4Gup40;
                $guia41->tab1Gup = $request->tab1Gup40;
                $guia41->real5Gup = $request->real5Gup40;
                $guia41->tab2Gup = $request->tab2Gup40;
                $guia41->prodtbGup = $request->prodtbGup40;
                $guia41->haatabGup = $request->haatabGup40;
                $guia41->grtbGup = $request->grtbGup40;
                $guia41->pesohuevotablaGup = $request->pesohuevotablaGup40;
                $guia41->idGuia = $id;
                $guia41->save();
              }
              foreach ($guias42 as $guia42) {
                $guia42->tbGup = $request->tbGup41;
                $guia42->tb1Gup = $request->tb1Gup41;
                $guia42->tb2Gup = $request->tb2Gup41;
                $guia42->real4Gup = $request->real4Gup41;
                $guia42->tab1Gup = $request->tab1Gup41;
                $guia42->real5Gup = $request->real5Gup41;
                $guia42->tab2Gup = $request->tab2Gup41;
                $guia42->prodtbGup = $request->prodtbGup41;
                $guia42->haatabGup = $request->haatabGup41;
                $guia42->grtbGup = $request->grtbGup41;
                $guia42->pesohuevotablaGup = $request->pesohuevotablaGup41;
                $guia42->idGuia = $id;
                $guia42->save();
              }
              foreach ($guias43 as $guia43) {
                $guia43->tbGup = $request->tbGup42;
                $guia43->tb1Gup = $request->tb1Gup42;
                $guia43->tb2Gup = $request->tb2Gup42;
                $guia43->real4Gup = $request->real4Gup42;
                $guia43->tab1Gup = $request->tab1Gup42;
                $guia43->real5Gup = $request->real5Gup42;
                $guia43->tab2Gup = $request->tab2Gup42;
                $guia43->prodtbGup = $request->prodtbGup42;
                $guia43->haatabGup = $request->haatabGup42;
                $guia43->grtbGup = $request->grtbGup42;
                $guia43->pesohuevotablaGup = $request->pesohuevotablaGup42;
                $guia43->idGuia = $id;
                $guia43->save();
              }
              foreach ($guias44 as $guia44) {
                $guia44->tbGup = $request->tbGup43;
                $guia44->tb1Gup = $request->tb1Gup43;
                $guia44->tb2Gup = $request->tb2Gup43;
                $guia44->real4Gup = $request->real4Gup43;
                $guia44->tab1Gup = $request->tab1Gup43;
                $guia44->real5Gup = $request->real5Gup43;
                $guia44->tab2Gup = $request->tab2Gup43;
                $guia44->prodtbGup = $request->prodtbGup43;
                $guia44->haatabGup = $request->haatabGup43;
                $guia44->grtbGup = $request->grtbGup43;
                $guia44->pesohuevotablaGup = $request->pesohuevotablaGup43;
                $guia44->idGuia = $id;
                $guia44->save();
              }
              foreach ($guias45 as $guia45) {
                $guia45->tbGup = $request->tbGup44;
                $guia45->tb1Gup = $request->tb1Gup44;
                $guia45->tb2Gup = $request->tb2Gup44;
                $guia45->real4Gup = $request->real4Gup44;
                $guia45->tab1Gup = $request->tab1Gup44;
                $guia45->real5Gup = $request->real5Gup44;
                $guia45->tab2Gup = $request->tab2Gup44;
                $guia45->prodtbGup = $request->prodtbGup44;
                $guia45->haatabGup = $request->haatabGup44;
                $guia45->grtbGup = $request->grtbGup44;
                $guia45->pesohuevotablaGup = $request->pesohuevotablaGup44;
                $guia45->idGuia = $id;
                $guia45->save();
            }
              foreach ($guias46 as $guia46) {
                $guia46->tbGup = $request->tbGup45;
                $guia46->tb1Gup = $request->tb1Gup45;
                $guia46->tb2Gup = $request->tb2Gup45;
                $guia46->real4Gup = $request->real4Gup45;
                $guia46->tab1Gup = $request->tab1Gup45;
                $guia46->real5Gup = $request->real5Gup45;
                $guia46->tab2Gup = $request->tab2Gup45;
                $guia46->prodtbGup = $request->prodtbGup45;
                $guia46->haatabGup = $request->haatabGup45;
                $guia46->grtbGup = $request->grtbGup45;
                $guia46->pesohuevotablaGup = $request->pesohuevotablaGup45;
                $guia46->idGuia = $id;
                $guia46->save();
              }
              foreach ($guias47 as $guia47) {
                $guia47->tbGup = $request->tbGup46;
                $guia47->tb1Gup = $request->tb1Gup46;
                $guia47->tb2Gup = $request->tb2Gup46;
                $guia47->real4Gup = $request->real4Gup46;
                $guia47->tab1Gup = $request->tab1Gup46;
                $guia47->real5Gup = $request->real5Gup46;
                $guia47->tab2Gup = $request->tab2Gup46;
                $guia47->prodtbGup = $request->prodtbGup46;
                $guia47->haatabGup = $request->haatabGup46;
                $guia47->grtbGup = $request->grtbGup46;
                $guia47->pesohuevotablaGup = $request->pesohuevotablaGup46;
                $guia47->idGuia = $id;
                $guia47->save();
              }
              foreach ($guias48 as $guia48) {
                $guia48->tbGup = $request->tbGup47;
                $guia48->tb1Gup = $request->tb1Gup47;
                $guia48->tb2Gup = $request->tb2Gup47;
                $guia48->real4Gup = $request->real4Gup47;
                $guia48->tab1Gup = $request->tab1Gup47;
                $guia48->real5Gup = $request->real5Gup47;
                $guia48->tab2Gup = $request->tab2Gup47;
                $guia48->prodtbGup = $request->prodtbGup47;
                $guia48->haatabGup = $request->haatabGup47;
                $guia48->grtbGup = $request->grtbGup47;
                $guia48->pesohuevotablaGup = $request->pesohuevotablaGup47;
                $guia48->idGuia = $id;
                $guia48->save();
              }
              foreach ($guias49 as $guia49) {
                $guia49->tbGup = $request->tbGup48;
                $guia49->tb1Gup = $request->tb1Gup48;
                $guia49->tb2Gup = $request->tb2Gup48;
                $guia49->real4Gup = $request->real4Gup48;
                $guia49->tab1Gup = $request->tab1Gup48;
                $guia49->real5Gup = $request->real5Gup48;
                $guia49->tab2Gup = $request->tab2Gup48;
                $guia49->prodtbGup = $request->prodtbGup48;
                $guia49->haatabGup = $request->haatabGup48;
                $guia49->grtbGup = $request->grtbGup48;
                $guia49->pesohuevotablaGup = $request->pesohuevotablaGup48;
                $guia49->idGuia = $id;
                $guia49->save();
              }
              foreach ($guias50 as $guia50) {
                $guia50->tbGup = $request->tbGup49;
                $guia50->tb1Gup = $request->tb1Gup49;
                $guia50->tb2Gup = $request->tb2Gup49;
                $guia50->real4Gup = $request->real4Gup49;
                $guia50->tab1Gup = $request->tab1Gup49;
                $guia50->real5Gup = $request->real5Gup49;
                $guia50->tab2Gup = $request->tab2Gup49;
                $guia50->prodtbGup = $request->prodtbGup49;
                $guia50->haatabGup = $request->haatabGup49;
                $guia50->grtbGup = $request->grtbGup49;
                $guia50->pesohuevotablaGup = $request->pesohuevotablaGup49;
                $guia50->idGuia = $id;
                $guia50->save();
              }
              foreach ($guias51 as $guia51) {
                $guia51->tbGup = $request->tbGup50;
                $guia51->tb1Gup = $request->tb1Gup50;
                $guia51->tb2Gup = $request->tb2Gup50;
                $guia51->real4Gup = $request->real4Gup50;
                $guia51->tab1Gup = $request->tab1Gup50;
                $guia51->real5Gup = $request->real5Gup50;
                $guia51->tab2Gup = $request->tab2Gup50;
                $guia51->prodtbGup = $request->prodtbGup50;
                $guia51->haatabGup = $request->haatabGup50;
                $guia51->grtbGup = $request->grtbGup50;
                $guia51->pesohuevotablaGup = $request->pesohuevotablaGup50;
                $guia51->idGuia = $id;
                $guia51->save();
              }
              foreach ($guias52 as $guia52) {
                $guia52->tbGup = $request->tbGup51;
                $guia52->tb1Gup = $request->tb1Gup51;
                $guia52->tb2Gup = $request->tb2Gup51;
                $guia52->real4Gup = $request->real4Gup51;
                $guia52->tab1Gup = $request->tab1Gup51;
                $guia52->real5Gup = $request->real5Gup51;
                $guia52->tab2Gup = $request->tab2Gup51;
                $guia52->prodtbGup = $request->prodtbGup51;
                $guia52->haatabGup = $request->haatabGup51;
                $guia52->grtbGup = $request->grtbGup51;
                $guia52->pesohuevotablaGup = $request->pesohuevotablaGup51;
                $guia52->idGuia = $id;
                $guia52->save();
              }
              foreach ($guias53 as $guia53) {
                $guia53->tbGup = $request->tbGup52;
                $guia53->tb1Gup = $request->tb1Gup52;
                $guia53->tb2Gup = $request->tb2Gup52;
                $guia53->real4Gup = $request->real4Gup52;
                $guia53->tab1Gup = $request->tab1Gup52;
                $guia53->real5Gup = $request->real5Gup52;
                $guia53->tab2Gup = $request->tab2Gup52;
                $guia53->prodtbGup = $request->prodtbGup52;
                $guia53->haatabGup = $request->haatabGup52;
                $guia53->grtbGup = $request->grtbGup52;
                $guia53->pesohuevotablaGup = $request->pesohuevotablaGup52;
                $guia53->idGuia = $id;
                $guia53->save();
              }
              foreach ($guias54 as $guia54) {
                $guia54->tbGup = $request->tbGup53;
                $guia54->tb1Gup = $request->tb1Gup53;
                $guia54->tb2Gup = $request->tb2Gup53;
                $guia54->real4Gup = $request->real4Gup53;
                $guia54->tab1Gup = $request->tab1Gup53;
                $guia54->real5Gup = $request->real5Gup53;
                $guia54->tab2Gup = $request->tab2Gup53;
                $guia54->prodtbGup = $request->prodtbGup53;
                $guia54->haatabGup = $request->haatabGup53;
                $guia54->grtbGup = $request->grtbGup53;
                $guia54->pesohuevotablaGup = $request->pesohuevotablaGup53;
                $guia54->idGuia = $id;
                $guia54->save();
              }
              foreach ($guias55 as $guia55) {
                $guia55->tbGup = $request->tbGup54;
                $guia55->tb1Gup = $request->tb1Gup54;
                $guia55->tb2Gup = $request->tb2Gup54;
                $guia55->real4Gup = $request->real4Gup54;
                $guia55->tab1Gup = $request->tab1Gup54;
                $guia55->real5Gup = $request->real5Gup54;
                $guia55->tab2Gup = $request->tab2Gup54;
                $guia55->prodtbGup = $request->prodtbGup54;
                $guia55->haatabGup = $request->haatabGup54;
                $guia55->grtbGup = $request->grtbGup54;
                $guia55->pesohuevotablaGup = $request->pesohuevotablaGup54;
                $guia55->idGuia = $id;
                $guia55->save();
              }
              foreach ($guias56 as $guia56) {
                $guia56->tbGup = $request->tbGup55;
                $guia56->tb1Gup = $request->tb1Gup55;
                $guia56->tb2Gup = $request->tb2Gup55;
                $guia56->real4Gup = $request->real4Gup55;
                $guia56->tab1Gup = $request->tab1Gup55;
                $guia56->real5Gup = $request->real5Gup55;
                $guia56->tab2Gup = $request->tab2Gup55;
                $guia56->prodtbGup = $request->prodtbGup55;
                $guia56->haatabGup = $request->haatabGup55;
                $guia56->grtbGup = $request->grtbGup55;
                $guia56->pesohuevotablaGup = $request->pesohuevotablaGup55;
                $guia56->idGuia = $id;
                $guia56->save();
              }
              foreach ($guias57 as $guia57) {
                $guia57->tbGup = $request->tbGup56;
                $guia57->tb1Gup = $request->tb1Gup56;
                $guia57->tb2Gup = $request->tb2Gup56;
                $guia57->real4Gup = $request->real4Gup56;
                $guia57->tab1Gup = $request->tab1Gup56;
                $guia57->real5Gup = $request->real5Gup56;
                $guia57->tab2Gup = $request->tab2Gup56;
                $guia57->prodtbGup = $request->prodtbGup56;
                $guia57->haatabGup = $request->haatabGup56;
                $guia57->grtbGup = $request->grtbGup56;
                $guia57->pesohuevotablaGup = $request->pesohuevotablaGup56;
                $guia57->idGuia = $id;
                $guia57->save();
              }
              foreach ($guias58 as $guia58) {
                $guia58->tbGup = $request->tbGup57;
                $guia58->tb1Gup = $request->tb1Gup57;
                $guia58->tb2Gup = $request->tb2Gup57;
                $guia58->real4Gup = $request->real4Gup57;
                $guia58->tab1Gup = $request->tab1Gup57;
                $guia58->real5Gup = $request->real5Gup57;
                $guia58->tab2Gup = $request->tab2Gup57;
                $guia58->prodtbGup = $request->prodtbGup57;
                $guia58->haatabGup = $request->haatabGup57;
                $guia58->grtbGup = $request->grtbGup57;
                $guia58->pesohuevotablaGup = $request->pesohuevotablaGup57;
                $guia58->idGuia = $id;
                $guia58->save();
              }
              foreach ($guias59 as $guia59) {
                $guia59->tbGup = $request->tbGup58;
                $guia59->tb1Gup = $request->tb1Gup58;
                $guia59->tb2Gup = $request->tb2Gup58;
                $guia59->real4Gup = $request->real4Gup58;
                $guia59->tab1Gup = $request->tab1Gup58;
                $guia59->real5Gup = $request->real5Gup58;
                $guia59->tab2Gup = $request->tab2Gup58;
                $guia59->prodtbGup = $request->prodtbGup58;
                $guia59->haatabGup = $request->haatabGup58;
                $guia59->grtbGup = $request->grtbGup58;
                $guia59->pesohuevotablaGup = $request->pesohuevotablaGup58;
                $guia59->idGuia = $id;
                $guia59->save();
              }
              foreach ($guias60 as $guia60) {
                $guia60->tbGup = $request->tbGup59;
                $guia60->tb1Gup = $request->tb1Gup59;
                $guia60->tb2Gup = $request->tb2Gup59;
                $guia60->real4Gup = $request->real4Gup59;
                $guia60->tab1Gup = $request->tab1Gup59;
                $guia60->real5Gup = $request->real5Gup59;
                $guia60->tab2Gup = $request->tab2Gup59;
                $guia60->prodtbGup = $request->prodtbGup59;
                $guia60->haatabGup = $request->haatabGup59;
                $guia60->grtbGup = $request->grtbGup59;
                $guia60->pesohuevotablaGup = $request->pesohuevotablaGup59;
                $guia60->idGuia = $id;
                $guia60->save();
              }
              foreach ($guias61 as $guia61) {
                $guia61->tbGup = $request->tbGup60;
                $guia61->tb1Gup = $request->tb1Gup60;
                $guia61->tb2Gup = $request->tb2Gup60;
                $guia61->real4Gup = $request->real4Gup60;
                $guia61->tab1Gup = $request->tab1Gup60;
                $guia61->real5Gup = $request->real5Gup60;
                $guia61->tab2Gup = $request->tab2Gup60;
                $guia61->prodtbGup = $request->prodtbGup60;
                $guia61->haatabGup = $request->haatabGup60;
                $guia61->grtbGup = $request->grtbGup60;
                $guia61->pesohuevotablaGup = $request->pesohuevotablaGup60;
                $guia61->idGuia = $id;
                $guia61->save();
              }
              foreach ($guias62 as $guia62) {
                $guia62->tbGup = $request->tbGup61;
                $guia62->tb1Gup = $request->tb1Gup61;
                $guia62->tb2Gup = $request->tb2Gup61;
                $guia62->real4Gup = $request->real4Gup61;
                $guia62->tab1Gup = $request->tab1Gup61;
                $guia62->real5Gup = $request->real5Gup61;
                $guia62->tab2Gup = $request->tab2Gup61;
                $guia62->prodtbGup = $request->prodtbGup61;
                $guia62->haatabGup = $request->haatabGup61;
                $guia62->grtbGup = $request->grtbGup61;
                $guia62->pesohuevotablaGup = $request->pesohuevotablaGup61;
                $guia62->idGuia = $id;
                $guia62->save();
              }
              foreach ($guias63 as $guia63) {
                $guia63->tbGup = $request->tbGup62;
                $guia63->tb1Gup = $request->tb1Gup62;
                $guia63->tb2Gup = $request->tb2Gup62;
                $guia63->real4Gup = $request->real4Gup62;
                $guia63->tab1Gup = $request->tab1Gup62;
                $guia63->real5Gup = $request->real5Gup62;
                $guia63->tab2Gup = $request->tab2Gup62;
                $guia63->prodtbGup = $request->prodtbGup62;
                $guia63->haatabGup = $request->haatabGup62;
                $guia63->grtbGup = $request->grtbGup62;
                $guia63->pesohuevotablaGup = $request->pesohuevotablaGup62;
                $guia63->idGuia = $id;
                $guia63->save();
              }
              foreach ($guias64 as $guia64) {
                $guia64->tbGup = $request->tbGup63;
                $guia64->tb1Gup = $request->tb1Gup63;
                $guia64->tb2Gup = $request->tb2Gup63;
                $guia64->real4Gup = $request->real4Gup63;
                $guia64->tab1Gup = $request->tab1Gup63;
                $guia64->real5Gup = $request->real5Gup63;
                $guia64->tab2Gup = $request->tab2Gup63;
                $guia64->prodtbGup = $request->prodtbGup63;
                $guia64->haatabGup = $request->haatabGup63;
                $guia64->grtbGup = $request->grtbGup63;
                $guia64->pesohuevotablaGup = $request->pesohuevotablaGup63;
                $guia64->idGuia = $id;
                $guia64->save();
              }
              foreach ($guias65 as $guia65) {
                $guia65->tbGup = $request->tbGup64;
                $guia65->tb1Gup = $request->tb1Gup64;
                $guia65->tb2Gup = $request->tb2Gup64;
                $guia65->real4Gup = $request->real4Gup64;
                $guia65->tab1Gup = $request->tab1Gup64;
                $guia65->real5Gup = $request->real5Gup64;
                $guia65->tab2Gup = $request->tab2Gup64;
                $guia65->prodtbGup = $request->prodtbGup64;
                $guia65->haatabGup = $request->haatabGup64;
                $guia65->grtbGup = $request->grtbGup64;
                $guia65->pesohuevotablaGup = $request->pesohuevotablaGup64;
                $guia65->idGuia = $id;
                $guia65->save();
              }
              foreach ($guias66 as $guia66) {
                $guia66->tbGup = $request->tbGup65;
                $guia66->tb1Gup = $request->tb1Gup65;
                $guia66->tb2Gup = $request->tb2Gup65;
                $guia66->real4Gup = $request->real4Gup65;
                $guia66->tab1Gup = $request->tab1Gup65;
                $guia66->real5Gup = $request->real5Gup65;
                $guia66->tab2Gup = $request->tab2Gup65;
                $guia66->prodtbGup = $request->prodtbGup65;
                $guia66->haatabGup = $request->haatabGup65;
                $guia66->grtbGup = $request->grtbGup65;
                $guia66->pesohuevotablaGup = $request->pesohuevotablaGup65;
                $guia66->idGuia = $id;
                $guia66->save();
              }
              foreach ($guias67 as $guia67) {
                $guia67->tbGup = $request->tbGup66;
                $guia67->tb1Gup = $request->tb1Gup66;
                $guia67->tb2Gup = $request->tb2Gup66;
                $guia67->real4Gup = $request->real4Gup66;
                $guia67->tab1Gup = $request->tab1Gup66;
                $guia67->real5Gup = $request->real5Gup66;
                $guia67->tab2Gup = $request->tab2Gup66;
                $guia67->prodtbGup = $request->prodtbGup66;
                $guia67->haatabGup = $request->haatabGup66;
                $guia67->grtbGup = $request->grtbGup66;
                $guia67->pesohuevotablaGup = $request->pesohuevotablaGup66;
                $guia67->idGuia = $id;
                $guia67->save();
              }
              foreach ($guias68 as $guia68) {
                $guia68->tbGup = $request->tbGup67;
                $guia68->tb1Gup = $request->tb1Gup67;
                $guia68->tb2Gup = $request->tb2Gup67;
                $guia68->real4Gup = $request->real4Gup67;
                $guia68->tab1Gup = $request->tab1Gup67;
                $guia68->real5Gup = $request->real5Gup67;
                $guia68->tab2Gup = $request->tab2Gup67;
                $guia68->prodtbGup = $request->prodtbGup67;
                $guia68->haatabGup = $request->haatabGup67;
                $guia68->grtbGup = $request->grtbGup67;
                $guia68->pesohuevotablaGup = $request->pesohuevotablaGup67;
                $guia68->idGuia = $id;
                $guia68->save();
              }
              foreach ($guias69 as $guia69) {
                $guia69->tbGup = $request->tbGup68;
                $guia69->tb1Gup = $request->tb1Gup68;
                $guia69->tb2Gup = $request->tb2Gup68;
                $guia69->real4Gup = $request->real4Gup68;
                $guia69->tab1Gup = $request->tab1Gup68;
                $guia69->real5Gup = $request->real5Gup68;
                $guia69->tab2Gup = $request->tab2Gup68;
                $guia69->prodtbGup = $request->prodtbGup68;
                $guia69->haatabGup = $request->haatabGup68;
                $guia69->grtbGup = $request->grtbGup68;
                $guia69->pesohuevotablaGup = $request->pesohuevotablaGup68;
                $guia69->idGuia = $id;
                $guia69->save();
              }
              foreach ($guias70 as $guia70) {
                $guia70->tbGup = $request->tbGup69;
                $guia70->tb1Gup = $request->tb1Gup69;
                $guia70->tb2Gup = $request->tb2Gup69;
                $guia70->real4Gup = $request->real4Gup69;
                $guia70->tab1Gup = $request->tab1Gup69;
                $guia70->real5Gup = $request->real5Gup69;
                $guia70->tab2Gup = $request->tab2Gup69;
                $guia70->prodtbGup = $request->prodtbGup69;
                $guia70->haatabGup = $request->haatabGup69;
                $guia70->grtbGup = $request->grtbGup69;
                $guia70->pesohuevotablaGup = $request->pesohuevotablaGup69;
                $guia70->idGuia = $id;
                $guia70->save();
              }
              foreach ($guias71 as $guia71) {
                $guia71->tbGup = $request->tbGup70;
                $guia71->tb1Gup = $request->tb1Gup70;
                $guia71->tb2Gup = $request->tb2Gup70;
                $guia71->real4Gup = $request->real4Gup70;
                $guia71->tab1Gup = $request->tab1Gup70;
                $guia71->real5Gup = $request->real5Gup70;
                $guia71->tab2Gup = $request->tab2Gup70;
                $guia71->prodtbGup = $request->prodtbGup70;
                $guia71->haatabGup = $request->haatabGup70;
                $guia71->grtbGup = $request->grtbGup70;
                $guia71->pesohuevotablaGup = $request->pesohuevotablaGup70;
                $guia71->idGuia = $id;
                $guia71->save();
              }
              foreach ($guias72 as $guia72) {
                $guia72->tbGup = $request->tbGup71;
                $guia72->tb1Gup = $request->tb1Gup71;
                $guia72->tb2Gup = $request->tb2Gup71;
                $guia72->real4Gup = $request->real4Gup71;
                $guia72->tab1Gup = $request->tab1Gup71;
                $guia72->real5Gup = $request->real5Gup71;
                $guia72->tab2Gup = $request->tab2Gup71;
                $guia72->prodtbGup = $request->prodtbGup71;
                $guia72->haatabGup = $request->haatabGup71;
                $guia72->grtbGup = $request->grtbGup71;
                $guia72->pesohuevotablaGup = $request->pesohuevotablaGup71;
                $guia72->idGuia = $id;
                $guia72->save();
              }
              foreach ($guias73 as $guia73) {
                $guia73->tbGup = $request->tbGup72;
                $guia73->tb1Gup = $request->tb1Gup72;
                $guia73->tb2Gup = $request->tb2Gup72;
                $guia73->real4Gup = $request->real4Gup72;
                $guia73->tab1Gup = $request->tab1Gup72;
                $guia73->real5Gup = $request->real5Gup72;
                $guia73->tab2Gup = $request->tab2Gup72;
                $guia73->prodtbGup = $request->prodtbGup72;
                $guia73->haatabGup = $request->haatabGup72;
                $guia73->grtbGup = $request->grtbGup72;
                $guia73->pesohuevotablaGup = $request->pesohuevotablaGup72;
                $guia73->idGuia = $id;
                $guia73->save();
              }
              foreach ($guias74 as $guia74) {
                $guia74->tbGup = $request->tbGup73;
                $guia74->tb1Gup = $request->tb1Gup73;
                $guia74->tb2Gup = $request->tb2Gup73;
                $guia74->real4Gup = $request->real4Gup73;
                $guia74->tab1Gup = $request->tab1Gup73;
                $guia74->real5Gup = $request->real5Gup73;
                $guia74->tab2Gup = $request->tab2Gup73;
                $guia74->prodtbGup = $request->prodtbGup73;
                $guia74->haatabGup = $request->haatabGup73;
                $guia74->grtbGup = $request->grtbGup73;
                $guia74->pesohuevotablaGup = $request->pesohuevotablaGup73;
                $guia74->idGuia = $id;
                $guia74->save();
              }
              foreach ($guias75 as $guia75) {
                $guia75->tbGup = $request->tbGup74;
                $guia75->tb1Gup = $request->tb1Gup74;
                $guia75->tb2Gup = $request->tb2Gup74;
                $guia75->real4Gup = $request->real4Gup74;
                $guia75->tab1Gup = $request->tab1Gup74;
                $guia75->real5Gup = $request->real5Gup74;
                $guia75->tab2Gup = $request->tab2Gup74;
                $guia75->prodtbGup = $request->prodtbGup74;
                $guia75->haatabGup = $request->haatabGup74;
                $guia75->grtbGup = $request->grtbGup74;
                $guia75->pesohuevotablaGup = $request->pesohuevotablaGup74;
                $guia75->idGuia = $id;
                $guia75->save();
              }
              foreach ($guias76 as $guia76) {
                $guia76->tbGup = $request->tbGup75;
                $guia76->tb1Gup = $request->tb1Gup75;
                $guia76->tb2Gup = $request->tb2Gup75;
                $guia76->real4Gup = $request->real4Gup75;
                $guia76->tab1Gup = $request->tab1Gup75;
                $guia76->real5Gup = $request->real5Gup75;
                $guia76->tab2Gup = $request->tab2Gup75;
                $guia76->prodtbGup = $request->prodtbGup75;
                $guia76->haatabGup = $request->haatabGup75;
                $guia76->grtbGup = $request->grtbGup75;
                $guia76->pesohuevotablaGup = $request->pesohuevotablaGup75;
                $guia76->idGuia = $id;
                $guia76->save();
              }
              foreach ($guias77 as $guia77) {
                $guia77->tbGup = $request->tbGup76;
                $guia77->tb1Gup = $request->tb1Gup76;
                $guia77->tb2Gup = $request->tb2Gup76;
                $guia77->real4Gup = $request->real4Gup76;
                $guia77->tab1Gup = $request->tab1Gup76;
                $guia77->real5Gup = $request->real5Gup76;
                $guia77->tab2Gup = $request->tab2Gup76;
                $guia77->prodtbGup = $request->prodtbGup76;
                $guia77->haatabGup = $request->haatabGup76;
                $guia77->grtbGup = $request->grtbGup76;
                $guia77->pesohuevotablaGup = $request->pesohuevotablaGup76;
                $guia77->idGuia = $id;
                $guia77->save();
              }
              foreach ($guias78 as $guia78) {
                $guia78->tbGup = $request->tbGup77;
                $guia78->tb1Gup = $request->tb1Gup77;
                $guia78->tb2Gup = $request->tb2Gup77;
                $guia78->real4Gup = $request->real4Gup77;
                $guia78->tab1Gup = $request->tab1Gup77;
                $guia78->real5Gup = $request->real5Gup77;
                $guia78->tab2Gup = $request->tab2Gup77;
                $guia78->prodtbGup = $request->prodtbGup77;
                $guia78->haatabGup = $request->haatabGup77;
                $guia78->grtbGup = $request->grtbGup77;
                $guia78->pesohuevotablaGup = $request->pesohuevotablaGup77;
                $guia78->idGuia = $id;
                $guia78->save();
              }
              foreach ($guias79 as $guia79) {
                $guia79->tbGup = $request->tbGup78;
                $guia79->tb1Gup = $request->tb1Gup78;
                $guia79->tb2Gup = $request->tb2Gup78;
                $guia79->real4Gup = $request->real4Gup78;
                $guia79->tab1Gup = $request->tab1Gup78;
                $guia79->real5Gup = $request->real5Gup78;
                $guia79->tab2Gup = $request->tab2Gup78;
                $guia79->prodtbGup = $request->prodtbGup78;
                $guia79->haatabGup = $request->haatabGup78;
                $guia79->grtbGup = $request->grtbGup78;
                $guia79->pesohuevotablaGup = $request->pesohuevotablaGup78;
                $guia79->idGuia = $id;
                $guia79->save();
              }
              foreach ($guias80 as $guia80) {
                $guia80->tbGup = $request->tbGup79;
                $guia80->tb1Gup = $request->tb1Gup79;
                $guia80->tb2Gup = $request->tb2Gup79;
                $guia80->real4Gup = $request->real4Gup79;
                $guia80->tab1Gup = $request->tab1Gup79;
                $guia80->real5Gup = $request->real5Gup79;
                $guia80->tab2Gup = $request->tab2Gup79;
                $guia80->prodtbGup = $request->prodtbGup79;
                $guia80->haatabGup = $request->haatabGup79;
                $guia80->grtbGup = $request->grtbGup79;
                $guia80->pesohuevotablaGup = $request->pesohuevotablaGup79;
                $guia80->idGuia = $id;
                $guia80->save();
              }
              foreach ($guias81 as $guia81) {
                $guia81->tbGup = $request->tbGup80;
                $guia81->tb1Gup = $request->tb1Gup80;
                $guia81->tb2Gup = $request->tb2Gup80;
                $guia81->real4Gup = $request->real4Gup80;
                $guia81->tab1Gup = $request->tab1Gup80;
                $guia81->real5Gup = $request->real5Gup80;
                $guia81->tab2Gup = $request->tab2Gup80;
                $guia81->prodtbGup = $request->prodtbGup80;
                $guia81->haatabGup = $request->haatabGup80;
                $guia81->grtbGup = $request->grtbGup80;
                $guia81->pesohuevotablaGup = $request->pesohuevotablaGup80;
                $guia81->idGuia = $id;
                $guia81->save();
              }
              foreach ($guias82 as $guia82) {
                $guia82->tbGup = $request->tbGup81;
                $guia82->tb1Gup = $request->tb1Gup81;
                $guia82->tb2Gup = $request->tb2Gup81;
                $guia82->real4Gup = $request->real4Gup81;
                $guia82->tab1Gup = $request->tab1Gup81;
                $guia82->real5Gup = $request->real5Gup81;
                $guia82->tab2Gup = $request->tab2Gup81;
                $guia82->prodtbGup = $request->prodtbGup81;
                $guia82->haatabGup = $request->haatabGup81;
                $guia82->grtbGup = $request->grtbGup81;
                $guia82->pesohuevotablaGup = $request->pesohuevotablaGup81;
                $guia82->idGuia = $id;
                $guia82->save();
              }
              foreach ($guias83 as $guia83) {
                $guia83->tbGup = $request->tbGup82;
                $guia83->tb1Gup = $request->tb1Gup82;
                $guia83->tb2Gup = $request->tb2Gup82;
                $guia83->real4Gup = $request->real4Gup82;
                $guia83->tab1Gup = $request->tab1Gup82;
                $guia83->real5Gup = $request->real5Gup82;
                $guia83->tab2Gup = $request->tab2Gup82;
                $guia83->prodtbGup = $request->prodtbGup82;
                $guia83->haatabGup = $request->haatabGup82;
                $guia83->grtbGup = $request->grtbGup82;
                $guia83->pesohuevotablaGup = $request->pesohuevotablaGup82;
                $guia83->idGuia = $id;
                $guia83->save();
              }
              foreach ($guias84 as $guia84) {
                $guia84->tbGup = $request->tbGup83;
                $guia84->tb1Gup = $request->tb1Gup83;
                $guia84->tb2Gup = $request->tb2Gup83;
                $guia84->real4Gup = $request->real4Gup83;
                $guia84->tab1Gup = $request->tab1Gup83;
                $guia84->real5Gup = $request->real5Gup83;
                $guia84->tab2Gup = $request->tab2Gup83;
                $guia84->prodtbGup = $request->prodtbGup83;
                $guia84->haatabGup = $request->haatabGup83;
                $guia84->grtbGup = $request->grtbGup83;
                $guia84->pesohuevotablaGup = $request->pesohuevotablaGup83;
                $guia84->idGuia = $id;
                $guia84->save();
              }
              foreach ($guias85 as $guia85) {
                $guia85->tbGup = $request->tbGup84;
                $guia85->tb1Gup = $request->tb1Gup84;
                $guia85->tb2Gup = $request->tb2Gup84;
                $guia85->real4Gup = $request->real4Gup84;
                $guia85->tab1Gup = $request->tab1Gup84;
                $guia85->real5Gup = $request->real5Gup84;
                $guia85->tab2Gup = $request->tab2Gup84;
                $guia85->prodtbGup = $request->prodtbGup84;
                $guia85->haatabGup = $request->haatabGup84;
                $guia85->grtbGup = $request->grtbGup84;
                $guia85->pesohuevotablaGup = $request->pesohuevotablaGup84;
                $guia85->idGuia = $id;
                $guia85->save();
              }
              foreach ($guias86 as $guia86) {
                $guia86->tbGup = $request->tbGup85;
                $guia86->tb1Gup = $request->tb1Gup85;
                $guia86->tb2Gup = $request->tb2Gup85;
                $guia86->real4Gup = $request->real4Gup85;
                $guia86->tab1Gup = $request->tab1Gup85;
                $guia86->real5Gup = $request->real5Gup85;
                $guia86->tab2Gup = $request->tab2Gup85;
                $guia86->prodtbGup = $request->prodtbGup85;
                $guia86->haatabGup = $request->haatabGup85;
                $guia86->grtbGup = $request->grtbGup85;
                $guia86->pesohuevotablaGup = $request->pesohuevotablaGup85;
                $guia86->idGuia = $id;
                $guia86->save();
              }
              foreach ($guias87 as $guia87) {
                $guia87->tbGup = $request->tbGup86;
                $guia87->tb1Gup = $request->tb1Gup86;
                $guia87->tb2Gup = $request->tb2Gup86;
                $guia87->real4Gup = $request->real4Gup86;
                $guia87->tab1Gup = $request->tab1Gup86;
                $guia87->real5Gup = $request->real5Gup86;
                $guia87->tab2Gup = $request->tab2Gup86;
                $guia87->prodtbGup = $request->prodtbGup86;
                $guia87->haatabGup = $request->haatabGup86;
                $guia87->grtbGup = $request->grtbGup86;
                $guia87->pesohuevotablaGup = $request->pesohuevotablaGup86;
                $guia87->idGuia = $id;
                $guia87->save();
              }
              foreach ($guias88 as $guia88) {
                $guia88->tbGup = $request->tbGup87;
                $guia88->tb1Gup = $request->tb1Gup87;
                $guia88->tb2Gup = $request->tb2Gup87;
                $guia88->real4Gup = $request->real4Gup87;
                $guia88->tab1Gup = $request->tab1Gup87;
                $guia88->real5Gup = $request->real5Gup87;
                $guia88->tab2Gup = $request->tab2Gup87;
                $guia88->prodtbGup = $request->prodtbGup87;
                $guia88->haatabGup = $request->haatabGup87;
                $guia88->grtbGup = $request->grtbGup87;
                $guia88->pesohuevotablaGup = $request->pesohuevotablaGup87;
                $guia88->idGuia = $id;
                $guia88->save();
              }
              foreach ($guias89 as $guia89) {
                $guia89->tbGup = $request->tbGup88;
                $guia89->tb1Gup = $request->tb1Gup88;
                $guia89->tb2Gup = $request->tb2Gup88;
                $guia89->real4Gup = $request->real4Gup88;
                $guia89->tab1Gup = $request->tab1Gup88;
                $guia89->real5Gup = $request->real5Gup88;
                $guia89->tab2Gup = $request->tab2Gup88;
                $guia89->prodtbGup = $request->prodtbGup88;
                $guia89->haatabGup = $request->haatabGup88;
                $guia89->grtbGup = $request->grtbGup88;
                $guia89->pesohuevotablaGup = $request->pesohuevotablaGup88;
                $guia89->idGuia = $id;
                $guia89->save();
              }
              foreach ($guias90 as $guia90) {
                $guia90->tbGup = $request->tbGup89;
                $guia90->tb1Gup = $request->tb1Gup89;
                $guia90->tb2Gup = $request->tb2Gup89;
                $guia90->real4Gup = $request->real4Gup89;
                $guia90->tab1Gup = $request->tab1Gup89;
                $guia90->real5Gup = $request->real5Gup89;
                $guia90->tab2Gup = $request->tab2Gup89;
                $guia90->prodtbGup = $request->prodtbGup89;
                $guia90->haatabGup = $request->haatabGup89;
                $guia90->grtbGup = $request->grtbGup89;
                $guia90->pesohuevotablaGup = $request->pesohuevotablaGup89;
                $guia90->idGuia = $id;
                $guia90->save();
              }
              foreach ($guias91 as $guia91) {
                $guia91->tbGup = $request->tbGup90;
                $guia91->tb1Gup = $request->tb1Gup90;
                $guia91->tb2Gup = $request->tb2Gup90;
                $guia91->real4Gup = $request->real4Gup90;
                $guia91->tab1Gup = $request->tab1Gup90;
                $guia91->real5Gup = $request->real5Gup90;
                $guia91->tab2Gup = $request->tab2Gup90;
                $guia91->prodtbGup = $request->prodtbGup90;
                $guia91->haatabGup = $request->haatabGup90;
                $guia91->grtbGup = $request->grtbGup90;
                $guia91->pesohuevotablaGup = $request->pesohuevotablaGup90;
                $guia91->idGuia = $id;
                $guia91->save();
              }
              foreach ($guias92 as $guia92) {
                $guia92->tbGup = $request->tbGup91;
                $guia92->tb1Gup = $request->tb1Gup91;
                $guia92->tb2Gup = $request->tb2Gup91;
                $guia92->real4Gup = $request->real4Gup91;
                $guia92->tab1Gup = $request->tab1Gup91;
                $guia92->real5Gup = $request->real5Gup91;
                $guia92->tab2Gup = $request->tab2Gup91;
                $guia92->prodtbGup = $request->prodtbGup91;
                $guia92->haatabGup = $request->haatabGup91;
                $guia92->grtbGup = $request->grtbGup91;
                $guia92->pesohuevotablaGup = $request->pesohuevotablaGup91;
                $guia92->idGuia = $id;
                $guia92->save();
              }
              foreach ($guias93 as $guia93) {
                $guia93->tbGup = $request->tbGup92;
                $guia93->tb1Gup = $request->tb1Gup92;
                $guia93->tb2Gup = $request->tb2Gup92;
                $guia93->real4Gup = $request->real4Gup92;
                $guia93->tab1Gup = $request->tab1Gup92;
                $guia93->real5Gup = $request->real5Gup92;
                $guia93->tab2Gup = $request->tab2Gup92;
                $guia93->prodtbGup = $request->prodtbGup92;
                $guia93->haatabGup = $request->haatabGup92;
                $guia93->grtbGup = $request->grtbGup92;
                $guia93->pesohuevotablaGup = $request->pesohuevotablaGup92;
                $guia93->idGuia = $id;
                $guia93->save();
              }
              foreach ($guias94 as $guia94) {
                $guia94->tbGup = $request->tbGup93;
                $guia94->tb1Gup = $request->tb1Gup93;
                $guia94->tb2Gup = $request->tb2Gup93;
                $guia94->real4Gup = $request->real4Gup93;
                $guia94->tab1Gup = $request->tab1Gup93;
                $guia94->real5Gup = $request->real5Gup93;
                $guia94->tab2Gup = $request->tab2Gup93;
                $guia94->prodtbGup = $request->prodtbGup93;
                $guia94->haatabGup = $request->haatabGup93;
                $guia94->grtbGup = $request->grtbGup93;
                $guia94->pesohuevotablaGup = $request->pesohuevotablaGup93;
                $guia94->idGuia = $id;
                $guia94->save();
              }
              foreach ($guias95 as $guia95) {
                $guia95->tbGup = $request->tbGup94;
                $guia95->tb1Gup = $request->tb1Gup94;
                $guia95->tb2Gup = $request->tb2Gup94;
                $guia95->real4Gup = $request->real4Gup94;
                $guia95->tab1Gup = $request->tab1Gup94;
                $guia95->real5Gup = $request->real5Gup94;
                $guia95->tab2Gup = $request->tab2Gup94;
                $guia95->prodtbGup = $request->prodtbGup94;
                $guia95->haatabGup = $request->haatabGup94;
                $guia95->grtbGup = $request->grtbGup94;
                $guia95->pesohuevotablaGup = $request->pesohuevotablaGup94;
                $guia95->idGuia = $id;
                $guia95->save();
              }
              foreach ($guias96 as $guia96) {
                $guia96->tbGup = $request->tbGup95;
                $guia96->tb1Gup = $request->tb1Gup95;
                $guia96->tb2Gup = $request->tb2Gup95;
                $guia96->real4Gup = $request->real4Gup95;
                $guia96->tab1Gup = $request->tab1Gup95;
                $guia96->real5Gup = $request->real5Gup95;
                $guia96->tab2Gup = $request->tab2Gup95;
                $guia96->prodtbGup = $request->prodtbGup95;
                $guia96->haatabGup = $request->haatabGup95;
                $guia96->grtbGup = $request->grtbGup95;
                $guia96->pesohuevotablaGup = $request->pesohuevotablaGup95;
                $guia96->idGuia = $id;
                $guia96->save();
              }
              foreach ($guias97 as $guia97) {
                $guia97->tbGup = $request->tbGup96;
                $guia97->tb1Gup = $request->tb1Gup96;
                $guia97->tb2Gup = $request->tb2Gup96;
                $guia97->real4Gup = $request->real4Gup96;
                $guia97->tab1Gup = $request->tab1Gup96;
                $guia97->real5Gup = $request->real5Gup96;
                $guia97->tab2Gup = $request->tab2Gup96;
                $guia97->prodtbGup = $request->prodtbGup96;
                $guia97->haatabGup = $request->haatabGup96;
                $guia97->grtbGup = $request->grtbGup96;
                $guia97->pesohuevotablaGup = $request->pesohuevotablaGup96;
                $guia97->idGuia = $id;
                $guia97->save();
              }
              foreach ($guias98 as $guia98) {
                $guia98->tbGup = $request->tbGup97;
                $guia98->tb1Gup = $request->tb1Gup97;
                $guia98->tb2Gup = $request->tb2Gup97;
                $guia98->real4Gup = $request->real4Gup97;
                $guia98->tab1Gup = $request->tab1Gup97;
                $guia98->real5Gup = $request->real5Gup97;
                $guia98->tab2Gup = $request->tab2Gup97;
                $guia98->prodtbGup = $request->prodtbGup97;
                $guia98->haatabGup = $request->haatabGup97;
                $guia98->grtbGup = $request->grtbGup97;
                $guia98->pesohuevotablaGup = $request->pesohuevotablaGup97;
                $guia98->idGuia = $id;
                $guia98->save();
              }
              foreach ($guias99 as $guia99) {
                $guia99->tbGup = $request->tbGup98;
                $guia99->tb1Gup = $request->tb1Gup98;
                $guia99->tb2Gup = $request->tb2Gup98;
                $guia99->real4Gup = $request->real4Gup98;
                $guia99->tab1Gup = $request->tab1Gup98;
                $guia99->real5Gup = $request->real5Gup98;
                $guia99->tab2Gup = $request->tab2Gup98;
                $guia99->prodtbGup = $request->prodtbGup98;
                $guia99->haatabGup = $request->haatabGup98;
                $guia99->grtbGup = $request->grtbGup98;
                $guia99->pesohuevotablaGup = $request->pesohuevotablaGup98;
                $guia99->idGuia = $id;
                $guia99->save();
              }
              foreach ($guias100 as $guia100) {
                $guia100->tbGup = $request->tbGup99;
                $guia100->tb1Gup = $request->tb1Gup99;
                $guia100->tb2Gup = $request->tb2Gup99;
                $guia100->real4Gup = $request->real4Gup99;
                $guia100->tab1Gup = $request->tab1Gup99;
                $guia100->real5Gup = $request->real5Gup99;
                $guia100->tab2Gup = $request->tab2Gup99;
                $guia100->prodtbGup = $request->prodtbGup99;
                $guia100->haatabGup = $request->haatabGup99;
                $guia100->grtbGup = $request->grtbGup99;
                $guia100->pesohuevotablaGup = $request->pesohuevotablaGup99;
                $guia100->idGuia = $id;
                $guia100->save();
            }

            return redirect('guias');
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
