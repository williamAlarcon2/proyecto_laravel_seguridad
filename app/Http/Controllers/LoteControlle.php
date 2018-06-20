<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lote as Lote;
use App\Models\Variedad as Variedad;
use App\Models\Granja as Granja;
use App\Models\Sistemaexplotacion as Sistemaexplotacion;
use App\Models\Sublote as Sublote;
use Carbon\Carbon;

class LoteControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lotes = Lote::select('variedads.nombreVar', 'granjas.nombreGra', 'sistemaexplotacions.nombreSis','estados.nombreEst', 'lotes.*', 'sublotes.nombreSub')
                      ->join('estados' , 'estados.id' , '=' , 'lotes.idEstado')
                      ->join('variedads' , 'variedads.id' , '=' , 'lotes.idvariedad')
                      ->join('granjas' , 'granjas.id' , '=', 'lotes.idGranja')
                      ->join('sistemaexplotacions' , 'sistemaexplotacions.id' , '=', 'lotes.idSistema')
                      ->leftjoin('sublotes' , 'sublotes.idLote' , '=', 'lotes.id')
                      ->groupBy('nombreLot')
                      ->paginate(20);

      return view('Avicol/Lote/list', compact('lotes'));
    }
    public function indexsublotes($id)
    {
        $nomlot = Sublote::select('lotes.nombreLot')
                            ->join('lotes' , 'lotes.id' , '=' , 'sublotes.idLote')
                            ->where('lotes.id' , '=' , $id)
                            ->groupBy('nombreLot')
                            ->paginate(20);

        $sublotes = Sublote::select('lotes.nombreLot', 'sistemaexplotacions.nombreSis','estados.nombreEst','sublotes.*')
                            ->join('estados' , 'estados.id' , '=' , 'sublotes.idEstado')
                            ->join('lotes' , 'lotes.id' , '=' , 'sublotes.idLote')
                            ->join('sistemaexplotacions' , 'sistemaexplotacions.id' , '=' , 'sublotes.idSistema')
                            ->where('lotes.id' , '=' , $id)
                            ->paginate(20);

        return view('Avicol/Lote/listSublotes', compact('sublotes', 'nomlot'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $variedads = Variedad::select('nombreVar', 'id')
                               ->where('modulopVar', '=', 'Ponedoras')
                               ->get();

       $granjas = Granja::select('nombreGra', 'id')
                        ->where('modulopGra', '=', 'Ponedoras')
                        ->get();

       $sistemas = Sistemaexplotacion::select('nombreSis', 'id')->get();

       return view('Avicol/Lote/create' , compact('variedads' , 'granjas' , 'sistemas'));
    }

    public function consultasistemas()
    {
       $sistemas = Sistemaexplotacion::select('nombreSis', 'id')->get();

       echo json_encode($sistemas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $NombreSublote = $request->get('sublote');
        //Validaciones
        $messages = [
            'nombreLot.required' => 'El campo Nombre del Lote es obligatorio',
            'pollitasLot.required' => 'El campo Pollitas Recibidas es obligatorio',
            'encasetamientoLot.required' => 'Es obligatorio seleccionar una Fecha de Encasetamiento',
            'idVariedad.required' => 'Es obligatorio seleccionar una Variedad',
            'idGranja.required' => 'Es obligatorio seleccionar una Granja',
            'idSistema.required' => 'Es obligatorio seleccionar un Sistema de Explotacion',
        ];
        $rules = [
            'nombreLot' => 'required',
            'pollitasLot' => 'required|numeric',
            'encasetamientoLot' => 'required',
            'idVariedad' => 'required',
            'idGranja' => 'required',
            'idSistema' => 'required',
        ];

        $this->validate($request, $rules , $messages);

          if ($NombreSublote != Null) {
            $lotes = new Lote;
            $lotes->nombreLot = $request->nombreLot;
            $lotes->pollitasLot = $request->pollitasLot;
            $lotes->encasetamientoLot = $request->encasetamientoLot;
            $fecha = Carbon::parse($lotes->encasetamientoLot)->format('Y-m-d H:i:s');
            $lotes->encLot = $fecha;
            $lotes->idVariedad = $request->idVariedad;
            $lotes->idGranja = $request->idGranja;
            $lotes->idSistema = $request->idSistema;
            $lotes->idEstado = 5;
            $lotes->save();

                foreach ($request->get('sublote') as $sublote) {
                    $sublotes = new Sublote;
                    $sublotes->nombreSub =  $sublote['nombreSub'];
                    $sublotes->pollitasSub =  $sublote['pollitasSub'];
                    $sublotes->idSistema =  $sublote['idSistema'];
                    $sublotes->idLote  = $lotes->id;
                    $sublotes->idEstado = 5;
                    $sublotes->save();
                }

            return redirect('lotes');
          }
          if ($NombreSublote == Null) {
            $lotes = new Lote;
            $lotes->nombreLot = $request->nombreLot;
            $lotes->pollitasLot = $request->pollitasLot;
            $lotes->encasetamientoLot = $request->encasetamientoLot;
            $fecha = Carbon::parse($lotes->encasetamientoLot)->format('Y-m-d H:i:s');
            $lotes->encLot = $fecha;
            $lotes->idVariedad = $request->idVariedad;
            $lotes->idGranja = $request->idGranja;
            $lotes->idSistema = $request->idSistema;
            $lotes->idEstado = 5;
            $lotes->save();

            return redirect('lotes');
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
        $lotes = Lote::find($id);

        $lotevariedads =  Lote::select('lotes.*', 'variedads.nombreVar')
                                      ->join('variedads' , 'variedads.id' , '=' , 'lotes.idVariedad')
                                      ->where('lotes.id' , '=' , $id)
                                      ->get();

        $variedads = Variedad::select('nombreVar', 'id')
                              ->where('modulopVar', '=', 'Ponedoras')
                              ->get();

        $lotegranjas =  Lote::select('lotes.*', 'granjas.nombreGra')
                                      ->join('granjas' , 'granjas.id' , '=' , 'lotes.idGranja')
                                      ->where('lotes.id' , '=' , $id)
                                      ->get();

        $granjas = Granja::select('nombreGra', 'id')
                          ->where('modulopGra', '=', 'Ponedoras')
                          ->get();

        $lotesistemas =  Lote::select('lotes.*', 'sistemaexplotacions.nombreSis')
                                      ->join('sistemaexplotacions' , 'sistemaexplotacions.id' , '=' , 'lotes.idSistema')
                                      ->where('lotes.id' , '=' , $id)
                                      ->get();

        $sistemas = Sistemaexplotacion::select('nombreSis', 'id')->get();

        $sublotes = Sublote::select('sublotes.*', 'lotes.nombreLot')
                            ->join('lotes' , 'lotes.id' , '=' , 'sublotes.idLote')
                            ->where('sublotes.idLote' , '=' , $id)
                            ->groupBy('nombreLot')
                            ->get();



        return view('Avicol/Lote/update', compact('lotes', 'lotevariedads' ,'variedads','variedads' , 'lotegranjas', 'granjas', 'lotesistemas' , 'sistemas', 'sublotes'));
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
      $NombreSublote = $request->except(['sublotes']);

      //Validaciones
        $messages = [
            'nombreLot.required' => 'El campo Nombre del Lote es obligatorio',
            'pollitasLot.required' => 'El campo Pollitas Recibidas es obligatorio',
            'encasetamientoLot.required' => 'Es obligatorio seleccionar una Fecha de Encasetamiento',
        ];
        $rules = [
            'nombreLot' => 'required',
            'pollitasLot' => 'required|numeric',
            'encasetamientoLot' => 'required',
        ];
        $this->validate($request, $rules , $messages);

        $sub = Sublote::select('sublotes.id')
                                ->join('lotes' , 'lotes.id' , '=' , 'sublotes.idLote')
                                ->where('sublotes.idLote' , '=' , $id)
                                ->count();

        $idsublotes = Sublote::select('sublotes.id')
                                ->join('lotes' , 'lotes.id' , '=' , 'sublotes.idLote')
                                ->where('sublotes.idLote' , '=' , $id)
                                ->get();
        if ($sub == 0) {

            $lotes = Lote::find($id);
            $lotes->nombreLot = $request->nombreLot;
            $lotes->pollitasLot = $request->pollitasLot;
            $lotes->encasetamientoLot = $request->encasetamientoLot;
            $fecha = Carbon::parse($lotes->encasetamientoLot)->format('Y-m-d H:i:s');
            $lotes->encLot = $fecha;
            $lotes->idVariedad = $request->idVariedad;
            $lotes->idGranja = $request->idGranja;
            $lotes->idSistema = $request->idSistema;
            $lotes->save();

            if ($request->get('sublote') != null) {
              foreach ($request->get('sublote') as $sublote) {
                if ($sublote != null) {
                    $sublotes = new Sublote;
                    $sublotes->nombreSub =  $sublote['nombreSub'];
                    $sublotes->pollitasSub =  $sublote['pollitasSub'];
                    $sublotes->idSistema =  $sublote['idSistema'];
                    $sublotes->idLote  = $lotes->id;
                    $sublotes->idEstado = 5;
                    $sublotes->save();
                }

              }
            }

            return redirect('lotes');

        }elseif ($sub != 0) {

            $lotes = Lote::find($id);
            $lotes->nombreLot = $request->nombreLot;
            $lotes->pollitasLot = $request->pollitasLot;
            $lotes->encasetamientoLot = $request->encasetamientoLot;
            $fecha = Carbon::parse($lotes->encasetamientoLot)->format('Y-m-d H:i:s');
            $lotes->encLot = $fecha;
            $lotes->idVariedad = $request->idVariedad;
            $lotes->idGranja = $request->idGranja;
            $lotes->idSistema = $request->idSistema;
            $lotes->save();

         /* foreach ($idsublotes as $idsublote) {
                $destroysublote  = Sublote::find($idsublote->id)->delete();
            }*/

            if ($request->get('sublote') != null) {
              foreach ($request->get('sublote') as $sublote) {
                if ($sublote != null) {
                    $sublotes = new Sublote;
                    $sublotes->nombreSub =  $sublote['nombreSub'];
                    $sublotes->pollitasSub =  $sublote['pollitasSub'];
                    $sublotes->idSistema =  $sublote['idSistema'];
                    $sublotes->idLote  = $lotes->id;
                    $sublotes->idEstado = 5;
                    $sublotes->save();
                }
              }
            }

            return redirect('lotes');
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
        $sublotes = Sublote::select('sublotes.*', 'ponedoraslevantes.idSublote as idSL', 'ponedorasproduccions.idSublote as idSP')
                            ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.idSublote' , '=' , 'sublotes.id')
                            ->leftjoin('ponedorasproduccions' , 'ponedorasproduccions.idSublote', '=' , 'sublotes.id')
                            ->where('sublotes.id' , '=' , $id)
                            ->get();



        foreach ($sublotes as $sublote) {
          if($sublote->idSL != null || $sublote->idSP != null){
            echo  '<script languaje="Javascript"> alert("No es posible eliminar este Sublote ya que cuenta con un Levante o Produccion"); history.back(); </script>';
          }
          else{
              $sublotes = Sublote::find($id)->delete();
              return back();
          }
        }
    }

    public function search(Request $request)
    {
        $lotes = Lote::select('variedads.nombreVar', 'granjas.nombreGra', 'sistemaexplotacions.nombreSis', 'lotes.*')
                            ->join('variedads' , 'variedads.id' , '=' , 'lotes.idvariedad')
                            ->join('granjas' , 'granjas.id' , '=', 'lotes.idGranja')
                            ->join('sistemaexplotacions' , 'sistemaexplotacions.id' , '=', 'lotes.idSistema')
                            ->where('nombreLot','like','%'.$request->buscar.'%')
                            ->orWhere('pollitasLot','like','%'.$request->buscar.'%')
                            ->orWhere('encasetamientoLot','like','%'.$request->buscar.'%')
                            ->orWhere('nombreVar','like','%'.$request->buscar.'%')
                            ->orWhere('nombreGra','like','%'.$request->buscar.'%')
                            ->orWhere('nombreSis','like','%'.$request->buscar.'%')
                            ->paginate(20);

      return \View::make('Avicol/Lote/list', compact('lotes'));
    }

    public function searchsublote(Request $request)
    {

        $sublotes = Sublote::select('lotes.nombreLot', 'sistemaexplotacions.nombreSis' ,'sublotes.*')
                            ->join('lotes' , 'lotes.id' , '=' , 'sublotes.idLote')
                            ->join('sistemaexplotacions' , 'sistemaexplotacions.id' , '=' , 'sublotes.idSistema')
                            ->where('nombreSub','like','%'.$request->buscar.'%')
                            ->orWhere('pollitasSub','like','%'.$request->buscar.'%')
                            ->orWhere('nombreSis','like','%'.$request->buscar.'%')
                            ->orWhere('nombreLot','like','%'.$request->buscar.'%')
                            ->paginate(20);

      return \View::make('Avicol/Lote/listSublotes', compact('sublotes'));
    }
}
