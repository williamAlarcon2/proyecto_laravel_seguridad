<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Guia as Guia;

use App\Models\Guialevanteponedora as Guialevanteponedora;

class GuiaLevantePonedoraController extends Controller
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
      return view('Avicol/GuiaLevantePonedora/create');
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
      $guia->moduloGui = 'Ponedoras Levante';
      $guia->save();

      $guialevanteponedoras = new Guialevanteponedora;
      $guialevanteponedoras->semanaGul = 1;
      $guialevanteponedoras->avediatabGul = $request->avediatabGul;
      $guialevanteponedoras->graveactabGul = $request->graveactabGul;
      $guialevanteponedoras->pesotabGul = $request->pesotabGul;
      $guialevanteponedoras->convsemtabGul = $request->convsemtabGul;
      $guialevanteponedoras->gananciaaveriatGul = $request->gananciaaveriatGul;
      $guialevanteponedoras->idGuia = $guia->id;
      $guialevanteponedoras->save();
      $guialevanteponedoras1 = new Guialevanteponedora;
      $guialevanteponedoras1->semanaGul = 2;
      $guialevanteponedoras1->avediatabGul = $request->avediatabGul1;
      $guialevanteponedoras1->graveactabGul = $request->graveactabGul1;
      $guialevanteponedoras1->pesotabGul = $request->pesotabGul1;
      $guialevanteponedoras1->convsemtabGul = $request->convsemtabGul1;
      $guialevanteponedoras1->gananciaaveriatGul = $request->gananciaaveriatGul1;
      $guialevanteponedoras1->idGuia = $guia->id;
      $guialevanteponedoras1->save();
      $guialevanteponedoras2 = new Guialevanteponedora;
      $guialevanteponedoras2->semanaGul = 3;
      $guialevanteponedoras2->avediatabGul = $request->avediatabGul2;
      $guialevanteponedoras2->graveactabGul = $request->graveactabGul2;
      $guialevanteponedoras2->pesotabGul = $request->pesotabGul2;
      $guialevanteponedoras2->convsemtabGul = $request->convsemtabGul2;
      $guialevanteponedoras2->gananciaaveriatGul = $request->gananciaaveriatGul2;
      $guialevanteponedoras2->idGuia = $guia->id;
      $guialevanteponedoras2->save();
      $guialevanteponedoras3 = new Guialevanteponedora;
      $guialevanteponedoras3->semanaGul = 4;
      $guialevanteponedoras3->avediatabGul = $request->avediatabGul3;
      $guialevanteponedoras3->graveactabGul = $request->graveactabGul3;
      $guialevanteponedoras3->pesotabGul = $request->pesotabGul3;
      $guialevanteponedoras3->convsemtabGul = $request->convsemtabGul3;
      $guialevanteponedoras3->gananciaaveriatGul = $request->gananciaaveriatGul3;
      $guialevanteponedoras3->idGuia = $guia->id;
      $guialevanteponedoras3->save();
      $guialevanteponedoras4 = new Guialevanteponedora;
      $guialevanteponedoras4->semanaGul = 5;
      $guialevanteponedoras4->avediatabGul = $request->avediatabGul4;
      $guialevanteponedoras4->graveactabGul = $request->graveactabGul4;
      $guialevanteponedoras4->pesotabGul = $request->pesotabGul4;
      $guialevanteponedoras4->convsemtabGul = $request->convsemtabGul4;
      $guialevanteponedoras4->gananciaaveriatGul = $request->gananciaaveriatGul4;
      $guialevanteponedoras4->idGuia = $guia->id;
      $guialevanteponedoras4->save();
      $guialevanteponedoras5 = new Guialevanteponedora;
      $guialevanteponedoras5->semanaGul = 6;
      $guialevanteponedoras5->avediatabGul = $request->avediatabGul5;
      $guialevanteponedoras5->graveactabGul = $request->graveactabGul5;
      $guialevanteponedoras5->pesotabGul = $request->pesotabGul5;
      $guialevanteponedoras5->convsemtabGul = $request->convsemtabGul5;
      $guialevanteponedoras5->gananciaaveriatGul = $request->gananciaaveriatGul5;
      $guialevanteponedoras5->idGuia = $guia->id;
      $guialevanteponedoras5->save();
      $guialevanteponedoras6 = new Guialevanteponedora;
      $guialevanteponedoras6->semanaGul = 7;
      $guialevanteponedoras6->avediatabGul = $request->avediatabGul6;
      $guialevanteponedoras6->graveactabGul = $request->graveactabGul6;
      $guialevanteponedoras6->pesotabGul = $request->pesotabGul6;
      $guialevanteponedoras6->convsemtabGul = $request->convsemtabGul6;
      $guialevanteponedoras6->gananciaaveriatGul = $request->gananciaaveriatGul6;
      $guialevanteponedoras6->idGuia = $guia->id;
      $guialevanteponedoras6->save();
      $guialevanteponedoras7 = new Guialevanteponedora;
      $guialevanteponedoras7->semanaGul = 8;
      $guialevanteponedoras7->avediatabGul = $request->avediatabGul7;
      $guialevanteponedoras7->graveactabGul = $request->graveactabGul7;
      $guialevanteponedoras7->pesotabGul = $request->pesotabGul7;
      $guialevanteponedoras7->convsemtabGul = $request->convsemtabGul7;
      $guialevanteponedoras7->gananciaaveriatGul = $request->gananciaaveriatGul7;
      $guialevanteponedoras7->idGuia = $guia->id;
      $guialevanteponedoras7->save();
      $guialevanteponedoras8 = new Guialevanteponedora;
      $guialevanteponedoras8->semanaGul = 9;
      $guialevanteponedoras8->avediatabGul = $request->avediatabGul8;
      $guialevanteponedoras8->graveactabGul = $request->graveactabGul8;
      $guialevanteponedoras8->pesotabGul = $request->pesotabGul8;
      $guialevanteponedoras8->convsemtabGul = $request->convsemtabGul8;
      $guialevanteponedoras8->gananciaaveriatGul = $request->gananciaaveriatGul8;
      $guialevanteponedoras8->idGuia = $guia->id;
      $guialevanteponedoras8->save();
      $guialevanteponedoras9 = new Guialevanteponedora;
      $guialevanteponedoras9->semanaGul = 10;
      $guialevanteponedoras9->avediatabGul = $request->avediatabGul9;
      $guialevanteponedoras9->graveactabGul = $request->graveactabGul9;
      $guialevanteponedoras9->pesotabGul = $request->pesotabGul9;
      $guialevanteponedoras9->convsemtabGul = $request->convsemtabGul9;
      $guialevanteponedoras9->gananciaaveriatGul = $request->gananciaaveriatGul9;
      $guialevanteponedoras9->idGuia = $guia->id;
      $guialevanteponedoras9->save();
      $guialevanteponedoras10 = new Guialevanteponedora;
      $guialevanteponedoras10->semanaGul = 11;
      $guialevanteponedoras10->avediatabGul = $request->avediatabGul10;
      $guialevanteponedoras10->graveactabGul = $request->graveactabGul10;
      $guialevanteponedoras10->pesotabGul = $request->pesotabGul10;
      $guialevanteponedoras10->convsemtabGul = $request->convsemtabGul10;
      $guialevanteponedoras10->gananciaaveriatGul = $request->gananciaaveriatGul10;
      $guialevanteponedoras10->idGuia = $guia->id;
      $guialevanteponedoras10->save();
      $guialevanteponedoras11 = new Guialevanteponedora;
      $guialevanteponedoras11->semanaGul = 12;
      $guialevanteponedoras11->avediatabGul = $request->avediatabGul11;
      $guialevanteponedoras11->graveactabGul = $request->graveactabGul11;
      $guialevanteponedoras11->pesotabGul = $request->pesotabGul11;
      $guialevanteponedoras11->convsemtabGul = $request->convsemtabGul11;
      $guialevanteponedoras11->gananciaaveriatGul = $request->gananciaaveriatGul11;
      $guialevanteponedoras11->idGuia = $guia->id;
      $guialevanteponedoras11->save();
      $guialevanteponedoras12 = new Guialevanteponedora;
      $guialevanteponedoras12->semanaGul = 13;
      $guialevanteponedoras12->avediatabGul = $request->avediatabGul12;
      $guialevanteponedoras12->graveactabGul = $request->graveactabGul12;
      $guialevanteponedoras12->pesotabGul = $request->pesotabGul12;
      $guialevanteponedoras12->convsemtabGul = $request->convsemtabGul12;
      $guialevanteponedoras12->gananciaaveriatGul = $request->gananciaaveriatGul12;
      $guialevanteponedoras12->idGuia = $guia->id;
      $guialevanteponedoras12->save();
      $guialevanteponedoras13 = new Guialevanteponedora;
      $guialevanteponedoras13->semanaGul = 14;
      $guialevanteponedoras13->avediatabGul = $request->avediatabGul13;
      $guialevanteponedoras13->graveactabGul = $request->graveactabGul13;
      $guialevanteponedoras13->pesotabGul = $request->pesotabGul13;
      $guialevanteponedoras13->convsemtabGul = $request->convsemtabGul13;
      $guialevanteponedoras13->gananciaaveriatGul = $request->gananciaaveriatGul13;
      $guialevanteponedoras13->idGuia = $guia->id;
      $guialevanteponedoras13->save();
      $guialevanteponedoras14 = new Guialevanteponedora;
      $guialevanteponedoras14->semanaGul = 15;
      $guialevanteponedoras14->avediatabGul = $request->avediatabGul14;
      $guialevanteponedoras14->graveactabGul = $request->graveactabGul14;
      $guialevanteponedoras14->pesotabGul = $request->pesotabGul14;
      $guialevanteponedoras14->convsemtabGul = $request->convsemtabGul14;
      $guialevanteponedoras14->gananciaaveriatGul = $request->gananciaaveriatGul14;
      $guialevanteponedoras14->idGuia = $guia->id;
      $guialevanteponedoras14->save();
      $guialevanteponedoras15 = new Guialevanteponedora;
      $guialevanteponedoras15->semanaGul = 16;
      $guialevanteponedoras15->avediatabGul = $request->avediatabGul15;
      $guialevanteponedoras15->graveactabGul = $request->graveactabGul15;
      $guialevanteponedoras15->pesotabGul = $request->pesotabGul15;
      $guialevanteponedoras15->convsemtabGul = $request->convsemtabGul15;
      $guialevanteponedoras15->gananciaaveriatGul = $request->gananciaaveriatGul15;
      $guialevanteponedoras15->idGuia = $guia->id;
      $guialevanteponedoras15->save();
      $guialevanteponedoras16 = new Guialevanteponedora;
      $guialevanteponedoras16->semanaGul = 17;
      $guialevanteponedoras16->avediatabGul = $request->avediatabGul16;
      $guialevanteponedoras16->graveactabGul = $request->graveactabGul16;
      $guialevanteponedoras16->pesotabGul = $request->pesotabGul16;
      $guialevanteponedoras16->convsemtabGul = $request->convsemtabGul16;
      $guialevanteponedoras16->gananciaaveriatGul = $request->gananciaaveriatGul16;
      $guialevanteponedoras16->idGuia = $guia->id;
      $guialevanteponedoras16->save();

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

      $guialevanteponedoras = Guialevanteponedora::select('guialevanteponedoras.*')
                                                  ->join('guias', 'guias.id','=', 'guialevanteponedoras.idGuia')
                                                  ->where('idGuia','=', $id)
                                                  ->where('semanaGul','=', 1)
                                                  ->get();

      $guialevanteponedoras2 = Guialevanteponedora::select('guialevanteponedoras.*')
                                                  ->join('guias', 'guias.id','=', 'guialevanteponedoras.idGuia')
                                                  ->where('idGuia','=', $id)
                                                  ->where('semanaGul','=', 2)
                                                  ->get();

      $guialevanteponedoras3 = Guialevanteponedora::select('guialevanteponedoras.*')
                                                  ->join('guias', 'guias.id','=', 'guialevanteponedoras.idGuia')
                                                  ->where('idGuia','=', $id)
                                                  ->where('semanaGul','=', 3)
                                                  ->get();

      $guialevanteponedoras4 = Guialevanteponedora::select('guialevanteponedoras.*')
                                                  ->join('guias', 'guias.id','=', 'guialevanteponedoras.idGuia')
                                                  ->where('idGuia','=', $id)
                                                  ->where('semanaGul','=', 4)
                                                  ->get();

      $guialevanteponedoras5 = Guialevanteponedora::select('guialevanteponedoras.*')
                                                  ->join('guias', 'guias.id','=', 'guialevanteponedoras.idGuia')
                                                  ->where('idGuia','=', $id)
                                                  ->where('semanaGul','=', 5)
                                                  ->get();

      $guialevanteponedoras6 = Guialevanteponedora::select('guialevanteponedoras.*')
                                                  ->join('guias', 'guias.id','=', 'guialevanteponedoras.idGuia')
                                                  ->where('idGuia','=', $id)
                                                  ->where('semanaGul','=', 6)
                                                  ->get();

      $guialevanteponedoras7 = Guialevanteponedora::select('guialevanteponedoras.*')
                                                  ->join('guias', 'guias.id','=', 'guialevanteponedoras.idGuia')
                                                  ->where('idGuia','=', $id)
                                                  ->where('semanaGul','=', 7)
                                                  ->get();

      $guialevanteponedoras8 = Guialevanteponedora::select('guialevanteponedoras.*')
                                                  ->join('guias', 'guias.id','=', 'guialevanteponedoras.idGuia')
                                                  ->where('idGuia','=', $id)
                                                  ->where('semanaGul','=', 8)
                                                  ->get();

      $guialevanteponedoras9 = Guialevanteponedora::select('guialevanteponedoras.*')
                                                  ->join('guias', 'guias.id','=', 'guialevanteponedoras.idGuia')
                                                  ->where('idGuia','=', $id)
                                                  ->where('semanaGul','=', 9)
                                                  ->get();

      $guialevanteponedoras10 = Guialevanteponedora::select('guialevanteponedoras.*')
                                                  ->join('guias', 'guias.id','=', 'guialevanteponedoras.idGuia')
                                                  ->where('idGuia','=', $id)
                                                  ->where('semanaGul','=', 10)
                                                  ->get();

      $guialevanteponedoras11 = Guialevanteponedora::select('guialevanteponedoras.*')
                                                  ->join('guias', 'guias.id','=', 'guialevanteponedoras.idGuia')
                                                  ->where('idGuia','=', $id)
                                                  ->where('semanaGul','=', 11)
                                                  ->get();

      $guialevanteponedoras12 = Guialevanteponedora::select('guialevanteponedoras.*')
                                                  ->join('guias', 'guias.id','=', 'guialevanteponedoras.idGuia')
                                                  ->where('idGuia','=', $id)
                                                  ->where('semanaGul','=', 12)
                                                  ->get();

      $guialevanteponedoras13 = Guialevanteponedora::select('guialevanteponedoras.*')
                                                  ->join('guias', 'guias.id','=', 'guialevanteponedoras.idGuia')
                                                  ->where('idGuia','=', $id)
                                                  ->where('semanaGul','=', 13)
                                                  ->get();

      $guialevanteponedoras14 = Guialevanteponedora::select('guialevanteponedoras.*')
                                                  ->join('guias', 'guias.id','=', 'guialevanteponedoras.idGuia')
                                                  ->where('idGuia','=', $id)
                                                  ->where('semanaGul','=', 14)
                                                  ->get();

      $guialevanteponedoras15 = Guialevanteponedora::select('guialevanteponedoras.*')
                                                  ->join('guias', 'guias.id','=', 'guialevanteponedoras.idGuia')
                                                  ->where('idGuia','=', $id)
                                                  ->where('semanaGul','=', 15)
                                                  ->get();

      $guialevanteponedoras16 = Guialevanteponedora::select('guialevanteponedoras.*')
                                                  ->join('guias', 'guias.id','=', 'guialevanteponedoras.idGuia')
                                                  ->where('idGuia','=', $id)
                                                    ->where('semanaGul','=',16)
                                                    ->get();

      $guialevanteponedoras17 = Guialevanteponedora::select('guialevanteponedoras.*')
                                                  ->join('guias', 'guias.id','=', 'guialevanteponedoras.idGuia')
                                                  ->where('idGuia','=', $id)
                                                  ->where('semanaGul','=', 17)
                                                  ->get();

     return view('Avicol/GuiaLevantePonedora/update', compact('guias', 'guialevanteponedoras', 'guialevanteponedoras2','guialevanteponedoras3','guialevanteponedoras4','guialevanteponedoras5','guialevanteponedoras6','guialevanteponedoras7','guialevanteponedoras8','guialevanteponedoras9','guialevanteponedoras10','guialevanteponedoras11','guialevanteponedoras12','guialevanteponedoras13','guialevanteponedoras14','guialevanteponedoras15','guialevanteponedoras16','guialevanteponedoras17'));
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
      $guias = Guialevanteponedora::select('guialevanteponedoras.*','guias.nombreGui')
                                  ->join('guias', 'guias.id', '=', 'guialevanteponedoras.idGuia')
                                  ->where('idGuia', '=', $id)
                                  ->where('semanaGul','=', 1)
                                  ->get();

      $guias2 = Guialevanteponedora::select('guialevanteponedoras.*','guias.nombreGui')
                                    ->join('guias', 'guias.id', '=', 'guialevanteponedoras.idGuia')
                                    ->where('idGuia', '=', $id)
                                    ->where('semanaGul','=', 2)
                                    ->get();

      $guias3 = Guialevanteponedora::select('guialevanteponedoras.*','guias.nombreGui')
                                    ->join('guias', 'guias.id', '=', 'guialevanteponedoras.idGuia')
                                    ->where('idGuia', '=', $id)
                                    ->where('semanaGul','=', 3)
                                    ->get();

      $guias4 = Guialevanteponedora::select('guialevanteponedoras.*','guias.nombreGui')
                                    ->join('guias', 'guias.id', '=', 'guialevanteponedoras.idGuia')
                                    ->where('idGuia', '=', $id)
                                    ->where('semanaGul','=', 4)
                                    ->get();

      $guias5 = Guialevanteponedora::select('guialevanteponedoras.*','guias.nombreGui')
                                    ->join('guias', 'guias.id', '=', 'guialevanteponedoras.idGuia')
                                    ->where('idGuia', '=', $id)
                                    ->where('semanaGul','=', 5)
                                    ->get();

      $guias6 = Guialevanteponedora::select('guialevanteponedoras.*','guias.nombreGui')
                                    ->join('guias', 'guias.id', '=', 'guialevanteponedoras.idGuia')
                                    ->where('idGuia', '=', $id)
                                    ->where('semanaGul','=', 6)
                                    ->get();

      $guias7 = Guialevanteponedora::select('guialevanteponedoras.*','guias.nombreGui')
                                    ->join('guias', 'guias.id', '=', 'guialevanteponedoras.idGuia')
                                    ->where('idGuia', '=', $id)
                                    ->where('semanaGul','=', 7)
                                    ->get();

      $guias8 = Guialevanteponedora::select('guialevanteponedoras.*','guias.nombreGui')
                                    ->join('guias', 'guias.id', '=', 'guialevanteponedoras.idGuia')
                                    ->where('idGuia', '=', $id)
                                    ->where('semanaGul','=', 8)
                                    ->get();

      $guias9 = Guialevanteponedora::select('guialevanteponedoras.*','guias.nombreGui')
                                    ->join('guias', 'guias.id', '=', 'guialevanteponedoras.idGuia')
                                    ->where('idGuia', '=', $id)
                                    ->where('semanaGul','=', 9)
                                    ->get();

      $guias10 = Guialevanteponedora::select('guialevanteponedoras.*','guias.nombreGui')
                                    ->join('guias', 'guias.id', '=', 'guialevanteponedoras.idGuia')
                                    ->where('idGuia', '=', $id)
                                    ->where('semanaGul','=', 10)
                                    ->get();

      $guias11 = Guialevanteponedora::select('guialevanteponedoras.*','guias.nombreGui')
                                    ->join('guias', 'guias.id', '=', 'guialevanteponedoras.idGuia')
                                    ->where('idGuia', '=', $id)
                                    ->where('semanaGul','=', 11)
                                    ->get();

      $guias12 = Guialevanteponedora::select('guialevanteponedoras.*','guias.nombreGui')
                                    ->join('guias', 'guias.id', '=', 'guialevanteponedoras.idGuia')
                                    ->where('idGuia', '=', $id)
                                    ->where('semanaGul','=', 12)
                                    ->get();

      $guias13 = Guialevanteponedora::select('guialevanteponedoras.*','guias.nombreGui')
                                    ->join('guias', 'guias.id', '=', 'guialevanteponedoras.idGuia')
                                    ->where('idGuia', '=', $id)
                                    ->where('semanaGul','=', 13)
                                    ->get();

      $guias14 = Guialevanteponedora::select('guialevanteponedoras.*','guias.nombreGui')
                                    ->join('guias', 'guias.id', '=', 'guialevanteponedoras.idGuia')
                                    ->where('idGuia', '=', $id)
                                    ->where('semanaGul','=', 14)
                                    ->get();

      $guias15 = Guialevanteponedora::select('guialevanteponedoras.*','guias.nombreGui')
                                    ->join('guias', 'guias.id', '=', 'guialevanteponedoras.idGuia')
                                    ->where('idGuia', '=', $id)
                                    ->where('semanaGul','=', 15)
                                    ->get();

      $guias16 = Guialevanteponedora::select('guialevanteponedoras.*','guias.nombreGui')
                                    ->join('guias', 'guias.id', '=', 'guialevanteponedoras.idGuia')
                                    ->where('idGuia', '=', $id)
                                    ->where('semanaGul','=', 16)
                                    ->get();

      $guias17 = Guialevanteponedora::select('guialevanteponedoras.*','guias.nombreGui')
                                    ->join('guias', 'guias.id', '=', 'guialevanteponedoras.idGuia')
                                    ->where('idGuia', '=', $id)
                                    ->where('semanaGul','=', 17)
                                    ->get();

      foreach ($guias as $guia) {
          $guia->avediatabGul = $request->avediatabGul;
          $guia->graveactabGul = $request->graveactabGul;
          $guia->pesotabGul = $request->pesotabGul;
          $guia->convsemtabGul = $request->convsemtabGul;
          $guia->gananciaaveriatGul = $request->gananciaaveriatGul;
          $guia->idGuia = $id;
          $guia->save();
        }
        foreach ($guias2 as $guia2) {
          $guia2->avediatabGul = $request->avediatabGul1;
          $guia2->graveactabGul = $request->graveactabGul1;
          $guia2->pesotabGul = $request->pesotabGul1;
          $guia2->convsemtabGul = $request->convsemtabGul1;
          $guia2->gananciaaveriatGul = $request->gananciaaveriatGul1;
          $guia2->idGuia = $id;
          $guia2->save();
        }
        foreach ($guias3 as $guia3) {
          $guia3->avediatabGul = $request->avediatabGul2;
          $guia3->graveactabGul = $request->graveactabGul2;
          $guia3->pesotabGul = $request->pesotabGul2;
          $guia3->convsemtabGul = $request->convsemtabGul2;
          $guia3->gananciaaveriatGul = $request->gananciaaveriatGul2;
          $guia3->idGuia = $id;
          $guia3->save();
        }
        foreach ($guias4 as $guia4) {
          $guia4->avediatabGul = $request->avediatabGul3;
          $guia4->graveactabGul = $request->graveactabGul3;
          $guia4->pesotabGul = $request->pesotabGul3;
          $guia4->convsemtabGul = $request->convsemtabGul3;
          $guia4->gananciaaveriatGul = $request->gananciaaveriatGul3;
          $guia4->idGuia = $id;
          $guia4->save();
        }
        foreach ($guias5 as $guia5) {
          $guia5->avediatabGul = $request->avediatabGul4;
          $guia5->graveactabGul = $request->graveactabGul4;
          $guia5->pesotabGul = $request->pesotabGul4;
          $guia5->convsemtabGul = $request->convsemtabGul4;
          $guia5->gananciaaveriatGul = $request->gananciaaveriatGul4;
          $guia5->idGuia = $id;
          $guia5->save();
        }
        foreach ($guias6 as $guia6) {
          $guia6->avediatabGul = $request->avediatabGul5;
          $guia6->graveactabGul = $request->graveactabGul5;
          $guia6->pesotabGul = $request->pesotabGul5;
          $guia6->convsemtabGul = $request->convsemtabGul5;
          $guia6->gananciaaveriatGul = $request->gananciaaveriatGul5;
          $guia6->idGuia = $id;
          $guia6->save();
        }
        foreach ($guias7 as $guia7) {
          $guia7->avediatabGul = $request->avediatabGul6;
          $guia7->graveactabGul = $request->graveactabGul6;
          $guia7->pesotabGul = $request->pesotabGul6;
          $guia7->convsemtabGul = $request->convsemtabGul6;
          $guia7->gananciaaveriatGul = $request->gananciaaveriatGul6;
          $guia7->idGuia = $id;
          $guia7->save();
        }
        foreach ($guias8 as $guia8) {
          $guia8->avediatabGul = $request->avediatabGul7;
          $guia8->graveactabGul = $request->graveactabGul7;
          $guia8->pesotabGul = $request->pesotabGul7;
          $guia8->convsemtabGul = $request->convsemtabGul7;
          $guia8->gananciaaveriatGul = $request->gananciaaveriatGul7;
          $guia8->idGuia = $id;
          $guia8->save();
        }
        foreach ($guias9 as $guia9) {
          $guia9->avediatabGul = $request->avediatabGul8;
          $guia9->graveactabGul = $request->graveactabGul8;
          $guia9->pesotabGul = $request->pesotabGul8;
          $guia9->convsemtabGul = $request->convsemtabGul8;
          $guia9->gananciaaveriatGul = $request->gananciaaveriatGul8;
          $guia9->idGuia = $id;
          $guia9->save();
        }
        foreach ($guias10 as $guia10) {
          $guia10->avediatabGul = $request->avediatabGul9;
          $guia10->graveactabGul = $request->graveactabGul9;
          $guia10->pesotabGul = $request->pesotabGul9;
          $guia10->convsemtabGul = $request->convsemtabGul9;
          $guia10->gananciaaveriatGul = $request->gananciaaveriatGul9;
          $guia10->idGuia = $id;
          $guia10->save();
        }
        foreach ($guias11 as $guia11) {
          $guia11->avediatabGul = $request->avediatabGul10;
          $guia11->graveactabGul = $request->graveactabGul10;
          $guia11->pesotabGul = $request->pesotabGul10;
          $guia11->convsemtabGul = $request->convsemtabGul10;
          $guia11->gananciaaveriatGul = $request->gananciaaveriatGul10;
          $guia11->idGuia = $id;
          $guia11->save();
        }
        foreach ($guias12 as $guia12) {
          $guia12->avediatabGul = $request->avediatabGul11;
          $guia12->graveactabGul = $request->graveactabGul11;
          $guia12->pesotabGul = $request->pesotabGul11;
          $guia12->convsemtabGul = $request->convsemtabGul11;
          $guia12->gananciaaveriatGul = $request->gananciaaveriatGul11;
          $guia12->idGuia = $id;
          $guia12->save();
        }
        foreach ($guias13 as $guia13) {
          $guia13->avediatabGul = $request->avediatabGul12;
          $guia13->graveactabGul = $request->graveactabGul12;
          $guia13->pesotabGul = $request->pesotabGul12;
          $guia13->convsemtabGul = $request->convsemtabGul12;
          $guia13->gananciaaveriatGul = $request->gananciaaveriatGul12;
          $guia13->idGuia = $id;
          $guia13->save();
        }
        foreach ($guias14 as $guia14) {
          $guia14->avediatabGul = $request->avediatabGul13;
          $guia14->graveactabGul = $request->graveactabGul13;
          $guia14->pesotabGul = $request->pesotabGul13;
          $guia14->convsemtabGul = $request->convsemtabGul13;
          $guia14->gananciaaveriatGul = $request->gananciaaveriatGul13;
          $guia14->idGuia = $id;
          $guia14->save();
        }
        foreach ($guias15 as $guia15) {
          $guia15->avediatabGul = $request->avediatabGul14;
          $guia15->graveactabGul = $request->graveactabGul14;
          $guia15->pesotabGul = $request->pesotabGul14;
          $guia15->convsemtabGul = $request->convsemtabGul14;
          $guia15->gananciaaveriatGul = $request->gananciaaveriatGul14;
          $guia15->idGuia = $id;
          $guia15->save();
        }
        foreach ($guias16 as $guia16) {
          $guia16->avediatabGul = $request->avediatabGul15;
          $guia16->graveactabGul = $request->graveactabGul15;
          $guia16->pesotabGul = $request->pesotabGul15;
          $guia16->convsemtabGul = $request->convsemtabGul15;
          $guia16->gananciaaveriatGul = $request->gananciaaveriatGul15;
          $guia16->idGuia = $id;
          $guia16->save();
        }
        foreach ($guias17 as $guia17) {
          $guia17->avediatabGul = $request->avediatabGul16;
          $guia17->graveactabGul = $request->graveactabGul16;
          $guia17->pesotabGul = $request->pesotabGul16;
          $guia17->convsemtabGul = $request->convsemtabGul16;
          $guia17->gananciaaveriatGul = $request->gananciaaveriatGul16;
          $guia17->idGuia = $id;
          $guia17->save();
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
