<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ponedoraslevante as Ponedoraslevante;
use App\Models\Lote as Lote;
use App\Models\Sublote as Sublote;
use App\Models\Guia as Guia;
use App\Models\Guialevanteponedora as GuiaLevantePonedora;
use App\Models\PonedoraslevanteSemanal as PonedoraslevanteSemanal;
use Carbon\Carbon;

class PonedoraslevanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ponedoraslevantes = Ponedoraslevante::select('sublotes.nombreSub' , 'sublot.nombreLot' , 'lotes.nombreLot', 'lotes.pollitasLot', 'lotes.encasetamientoLot', 'sublot.pollitasLot as polsub', 'sublot.encasetamientoLot as encsub', 'sublot.nombreLot as nomlot', 'granjas.nombreGra', 'granjas.alturaGra' , 'municipios.nombreMun' , 'departamentos.nombreDep' , 'pais.nombrePai', 'climas.nombreCli', 'empresas.nombreEmp', 'zonas.nombreZon', 'variedads.nombreVar', 'sistemaexplotacions.nombreSis',          'grasub.nombreGra as nomgra', 'grasub.alturaGra as altgra' , 'munsub.nombreMun as nommun' , 'depsub.nombreDep as nomdep' , 'paisub.nombrePai as nompai', 'clisub.nombreCli as nomcli', 'empsub.nombreEmp as nomemp', 'zonsub.nombreZon as nomzon', 'varsub.nombreVar as nomvar', 'sissub.nombreSis as nomsis', 'guias.nombreGui' , 'ponedoraslevantes.*')
                                              ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                              ->leftjoin('sublotes' , 'sublotes.id' , '=' , 'ponedoraslevantes.idSublote')
                                              ->leftjoin('lotes as sublot', 'sublot.id' ,  '=' , 'sublotes.idLote')
                                              ->leftjoin('variedads' , 'variedads.id' , '=' , 'lotes.idVariedad')
                                              ->leftjoin('granjas' , 'granjas.id' , '=' , 'lotes.idGranja')
                                              ->leftjoin('sistemaexplotacions' , 'sistemaexplotacions.id' , '=' , 'lotes.idSistema')
                                              ->leftjoin('municipios' , 'municipios.id' , '=' , 'granjas.idMunicipio')
                                              ->leftjoin('departamentos' , 'departamentos.id' , '=' , 'municipios.idDepartamento')
                                              ->leftjoin('pais' , 'pais.id' , '=' , 'departamentos.idPais')
                                              ->leftjoin('climas' , 'climas.id' , '=' , 'granjas.idClima')
                                              ->leftjoin('empresas' , 'empresas.id' , '=' , 'granjas.idEmpresa')
                                              ->leftjoin('zonas' , 'zonas.id' , '=' , 'granjas.idZona')
                                              ->leftjoin('variedads as varsub' , 'varsub.id' , '=' , 'sublot.idVariedad')
                                              ->leftjoin('granjas as grasub' , 'grasub.id' , '=' , 'sublot.idGranja')
                                              ->leftjoin('sistemaexplotacions as sissub' , 'sissub.id' , '=' , 'sublot.idSistema')
                                              ->leftjoin('municipios as munsub' , 'munsub.id' , '=' , 'grasub.idMunicipio')
                                              ->leftjoin('departamentos as depsub' , 'depsub.id' , '=' , 'munsub.idDepartamento')
                                              ->leftjoin('pais as paisub' , 'paisub.id' , '=' , 'depsub.idPais')
                                              ->leftjoin('climas as clisub' , 'clisub.id' , '=' , 'grasub.idClima')
                                              ->leftjoin('empresas as empsub' , 'empsub.id' , '=' , 'grasub.idEmpresa')
                                              ->leftjoin('zonas as zonsub' , 'zonsub.id' , '=' , 'grasub.idZona')
                                              ->join('guias' , 'guias.id' , '=' , 'ponedoraslevantes.idGuia')
                                              ->where('lotes.idEstado','=', 3)
                                              ->orwhere('sublotes.idEstado' , '=' , 3)
                                              ->paginate(20);


        $modal = PonedoraslevanteSemanal::select('guialevanteponedoras.*')
                                        ->leftjoin('ponedoraslevantes', 'ponedoraslevantes.id','=', 'ponedoraslevante_semanals.idLevante')
                                        ->leftjoin('guias', 'guias.id', '=', 'ponedoraslevantes.idGuia')
                                        ->leftjoin('lotes', 'lotes.id', '=', 'ponedoraslevantes.idLote')
                                        ->leftjoin('guialevanteponedoras', 'guialevanteponedoras.idGuia', '=', 'guias.id')
                                        ->get();

      return view('Avicol/PonedorasLevante/list', compact('ponedoraslevantes', 'modal'));
    }

    public function indexProduccion()
    {

  /*      $ponedoraslevantes = Lote::select('ponedoraslevantes.programaPle', 'ponedoraslevantes.fotoPle', 'ponedoraslevantes.despiquePle', 'ponedoraslevantes.trasladoPle', 'ponedoraslevantes.inicioluzPle', 'ponedoraslevantes.finluzPle','granjas.nombreGra', 'granjas.alturaGra' , 'municipios.nombreMun' , 'departamentos.nombreDep' , 'pais.nombrePai', 'climas.nombreCli', 'empresas.nombreEmp', 'zonas.nombreZon', 'variedads.nombreVar', 'sistemaexplotacions.nombreSis','guias.nombreGui' , 'lotes.*')
                                  ->join('variedads' , 'variedads.id' , '=' , 'lotes.idVariedad')
                                  ->join('granjas' , 'granjas.id' , '=' , 'lotes.idGranja')
                                  ->join('sistemaexplotacions' , 'sistemaexplotacions.id' , '=' , 'lotes.idSistema')
                                  ->join('municipios' , 'municipios.id' , '=' , 'granjas.idMunicipio')
                                  ->join('departamentos' , 'departamentos.id' , '=' , 'municipios.idDepartamento')
                                  ->join('pais' , 'pais.id' , '=' , 'departamentos.idPais')
                                  ->join('climas' , 'climas.id' , '=' , 'granjas.idClima')
                                  ->join('empresas' , 'empresas.id' , '=' , 'granjas.idEmpresa')
                                  ->join('zonas' , 'zonas.id' , '=' , 'granjas.idZona')
                                  ->join('ponedoraslevantes' , 'ponedoraslevantes.idLote' , '=' , 'lotes.id')
                                  ->join('guias' , 'guias.id' , '=' , 'ponedoraslevantes.idGuia')
                                  ->where('lotes.idEstado','=', 4)
                                  ->paginate(20);*/
          $ponedoraslevantes = Ponedoraslevante::select('sublotes.nombreSub' , 'sublot.nombreLot' , 'lotes.nombreLot', 'lotes.pollitasLot', 'lotes.encasetamientoLot', 'sublot.pollitasLot as polsub', 'sublot.encasetamientoLot as encsub', 'sublot.nombreLot as nomlot', 'granjas.nombreGra', 'granjas.alturaGra' , 'municipios.nombreMun' , 'departamentos.nombreDep' , 'pais.nombrePai', 'climas.nombreCli', 'empresas.nombreEmp', 'zonas.nombreZon', 'variedads.nombreVar', 'sistemaexplotacions.nombreSis',          'grasub.nombreGra as nomgra', 'grasub.alturaGra as altgra' , 'munsub.nombreMun as nommun' , 'depsub.nombreDep as nomdep' , 'paisub.nombrePai as nompai', 'clisub.nombreCli as nomcli', 'empsub.nombreEmp as nomemp', 'zonsub.nombreZon as nomzon', 'varsub.nombreVar as nomvar', 'sissub.nombreSis as nomsis', 'guias.nombreGui' , 'ponedoraslevantes.*')
                                                ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                                ->leftjoin('sublotes' , 'sublotes.id' , '=' , 'ponedoraslevantes.idSublote')
                                                ->leftjoin('lotes as sublot', 'sublot.id' ,  '=' , 'sublotes.idLote')
                                                ->leftjoin('variedads' , 'variedads.id' , '=' , 'lotes.idVariedad')
                                                ->leftjoin('granjas' , 'granjas.id' , '=' , 'lotes.idGranja')
                                                ->leftjoin('sistemaexplotacions' , 'sistemaexplotacions.id' , '=' , 'lotes.idSistema')
                                                ->leftjoin('municipios' , 'municipios.id' , '=' , 'granjas.idMunicipio')
                                                ->leftjoin('departamentos' , 'departamentos.id' , '=' , 'municipios.idDepartamento')
                                                ->leftjoin('pais' , 'pais.id' , '=' , 'departamentos.idPais')
                                                ->leftjoin('climas' , 'climas.id' , '=' , 'granjas.idClima')
                                                ->leftjoin('empresas' , 'empresas.id' , '=' , 'granjas.idEmpresa')
                                                ->leftjoin('zonas' , 'zonas.id' , '=' , 'granjas.idZona')
                                                ->leftjoin('variedads as varsub' , 'varsub.id' , '=' , 'sublot.idVariedad')
                                                ->leftjoin('granjas as grasub' , 'grasub.id' , '=' , 'sublot.idGranja')
                                                ->leftjoin('sistemaexplotacions as sissub' , 'sissub.id' , '=' , 'sublot.idSistema')
                                                ->leftjoin('municipios as munsub' , 'munsub.id' , '=' , 'grasub.idMunicipio')
                                                ->leftjoin('departamentos as depsub' , 'depsub.id' , '=' , 'munsub.idDepartamento')
                                                ->leftjoin('pais as paisub' , 'paisub.id' , '=' , 'depsub.idPais')
                                                ->leftjoin('climas as clisub' , 'clisub.id' , '=' , 'grasub.idClima')
                                                ->leftjoin('empresas as empsub' , 'empsub.id' , '=' , 'grasub.idEmpresa')
                                                ->leftjoin('zonas as zonsub' , 'zonsub.id' , '=' , 'grasub.idZona')
                                                ->join('guias' , 'guias.id' , '=' , 'ponedoraslevantes.idGuia')
                                                ->where('lotes.idEstado','=', 4)
                                                ->orwhere('sublotes.idEstado' , '=' , 4)
                                                ->paginate(20);

      return view('Avicol/PonedorasLevante/listlotes', compact('ponedoraslevantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

      $lotes = Lote::where('nombreLot','=',$request->buscar)->get();

      return \View::make('Avicol/PonedorasLevante/create', compact('lotes'));
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
            'idGuia.required' => 'Es obligatorio seleccionar una Guia',
        ];
        $rules = [
            'idGuia' => 'required',
        ];

        $this->validate($request, $rules , $messages);

        $ponedoraslevantes = new Ponedoraslevante;
        $programano = $request->programaPle;
        $iniciodescenso = $request->inicioluzPle;

        $consulta1 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 1)
                          ->get();
        $consulta2 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 2)
                          ->get();
        $consulta3 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 3)
                          ->get();
        $consulta4 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 4)
                          ->get();
        $consulta5 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 5)
                          ->get();
        $consulta6 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 6)
                          ->get();
        $consulta7 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 7)
                          ->get();
        $consulta8 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 8)
                          ->get();
        $consulta9 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 9)
                          ->get();
        $consulta10 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 10)
                          ->get();
        $consulta11 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 11)
                          ->get();
        $consulta12 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 12)
                          ->get();
        $consulta13 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 13)
                          ->get();
        $consulta14 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 14)
                          ->get();
        $consulta15 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 15)
                          ->get();
        $consulta16 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 16)
                          ->get();
        $consulta17 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 17)
                          ->get();
        if ($request->nombreLot != null) {
          $busqueda = Ponedoraslevante::where('idLote' , '=' , $request->idLote)
                                  ->count() + 1;
        }

        if ($request->nombreSub != null) {
          $busqueda = Ponedoraslevante::where('idSublote' , '=' , $request->idSublote)
                                  ->count() + 1;
        }


        if ($busqueda == 1) {
          if ($request->nombreLot != null && $request->nombreSub == null) {
            if ($programano == 'No') {

              $ponedoraslevantes->programaPle  = $request->programaPle;
              $ponedoraslevantes->fotoPle  = $request->fotoPle;
              $ponedoraslevantes->despiquePle  = $request->despiquePle;
              $ponedoraslevantes->trasladoPle  = $request->trasladoPle;
              $ponedoraslevantes->idLote = $request->idLote;
              $ponedoraslevantes->idGuia = $request->idGuia;
              $ponedoraslevantes->save();

              $lotes = Lote::find($ponedoraslevantes->idLote);
              $lotes->idEstado = 3;
              $lotes->save();
            }
            if ($iniciodescenso != Null) {

                $ponedoraslevantes->programaPle  = 'Si';
                $ponedoraslevantes->fotoPle  = $request->fotoPle;
                $ponedoraslevantes->despiquePle  = $request->despiquePle;
                $ponedoraslevantes->trasladoPle  = $request->trasladoPle;
                $ponedoraslevantes->idLote = $request->idLote;
                $ponedoraslevantes->inicioluzPle = $request->inicioluzPle;
                $ponedoraslevantes->finluzPle = $request->finluzPle;
                $ponedoraslevantes->idGuia = $request->idGuia;
                $ponedoraslevantes->save();

                $lotes = Lote::find($ponedoraslevantes->idLote);
                $lotes->idEstado = 3;
                $lotes->save();
            }
            if ($iniciodescenso == Null) {

                $ponedoraslevantes->fotoPle  = $request->fotoPle;
                $ponedoraslevantes->despiquePle  = $request->despiquePle;
                $ponedoraslevantes->trasladoPle  = $request->trasladoPle;
                $ponedoraslevantes->idLote = $request->idLote;
                $ponedoraslevantes->idGuia = $request->idGuia;
                $ponedoraslevantes->save();

                $lotes = Lote::find($request->idLote);
                $lotes->idEstado = 3;
                $lotes->save();
            }
          }

          if ($request->nombreSub != null) {
            if ($programano == 'No') {

              $ponedoraslevantes->programaPle  = $request->programaPle;
              $ponedoraslevantes->fotoPle  = $request->fotoPle;
              $ponedoraslevantes->despiquePle  = $request->despiquePle;
              $ponedoraslevantes->trasladoPle  = $request->trasladoPle;
              $ponedoraslevantes->idSublote = $request->idSublote;
              $ponedoraslevantes->idGuia = $request->idGuia;
              $ponedoraslevantes->save();

              $sublotes = Sublote::find($request->idSublote);
              $sublotes->idEstado = 3;
              $sublotes->save();
            }
            if ($iniciodescenso != Null) {

                $ponedoraslevantes->programaPle  = 'Si';
                $ponedoraslevantes->fotoPle  = $request->fotoPle;
                $ponedoraslevantes->despiquePle  = $request->despiquePle;
                $ponedoraslevantes->trasladoPle  = $request->trasladoPle;
                $ponedoraslevantes->idSublote = $request->idSublote;
                $ponedoraslevantes->inicioluzPle = $request->inicioluzPle;
                $ponedoraslevantes->finluzPle = $request->finluzPle;
                $ponedoraslevantes->idGuia = $request->idGuia;
                $ponedoraslevantes->save();

                $sublotes = Sublote::find($request->idSublote);
                $sublotes->idEstado = 3;
                $sublotes->save();
            }
            if ($iniciodescenso == Null) {

                $ponedoraslevantes->fotoPle  = $request->fotoPle;
                $ponedoraslevantes->despiquePle  = $request->despiquePle;
                $ponedoraslevantes->trasladoPle  = $request->trasladoPle;
                $ponedoraslevantes->idSublote = $request->idSublote;
                $ponedoraslevantes->idGuia = $request->idGuia;
                $ponedoraslevantes->save();

                $sublotes = Sublote::find($request->idSublote);
                $sublotes->idEstado = 3;
                $sublotes->save();
            }
          }


          $semanals = new PonedoraslevanteSemanal;
          $semanals->semanaPle = 1;
          $semanals->fdsPle = $request->fdsPle;
          $semanals->avesmuertasPle = $request->avesmuertasPle;
          $semanals->mortalidadPle = $request->mortalidadPle;
          $semanals->seleccionPle = $request->seleccionPle;
          $semanals->otrosPle = $request->otrosPle;
          $totalacu = $request->mortalidadPle + $request->seleccionPle + $request->otrosPle;
          $semanals->acuPle = $totalacu;
          $totalsaldoaves = $request->pollitasLot - $semanals->acuPle;
          $semanals->saldoavesPle = $totalsaldoaves;
          $semanals->alimentoPle = $request->alimentoPle;
          $semanals->consumoPle = $request->consumoPle;
          $totalavediareal = $request->consumoPle / $semanals->saldoavesPle / 7;
          $semanals->avediarealPle = $totalavediareal;
          $semanals->kacumPle = $request->consumoPle;
          $totalgraveac = $semanals->kacumPle / $semanals->saldoavesPle;
          $semanals->graveacPle = $totalgraveac;
          $totalmortsem = $request->mortalidadPle / $request->pollitasLot;
          $semanals->mortsemPle = $totalmortsem;
          $totalmortacu = $request->mortalidadPle / $request->pollitasLot;
          $semanals->mortacuPle = $totalmortacu;
          $totalselsem = $request->seleccionPle / $request->pollitasLot;
          $semanals->selsemPle = $totalselsem;
          $semanals->pesoPle = $request->pesoPle;
          $semanals->uniformidadPle = $request->uniformidadPle;
          $semanals->coeficientePle = $request->coeficientePle;
          $semanals->observacionesPle = $request->observacionesPle;
          $semanals->idLevante = $ponedoraslevantes->id;

          $totalmsacu = ($request->mortalidadPle + $request->seleccionPle) / $request->pollitasLot;
          $semanals->msacuPle = $totalmsacu;
          foreach ($consulta1 as $Consulta1) {
            if ($semanals->avediarealPle != null && $Consulta1->avediatabGul != null) {
              $totalcumplconsgrad = ($semanals->avediarealPle / $Consulta1->avediatabGul) - 1;
              $semanals->cumplconsgradPle = $totalcumplconsgrad;
            }
            if ($semanals->pesoPle != null && $Consulta1->avediatabGul != null) {
              $totalcumplpeso = ($semanals->pesoPle / $Consulta1->pesotabGul) - 1;
              $semanals->cumplpesoPle = $totalcumplpeso;
            }
            if ($semanals->graveacPle != null && $Consulta1->graveactabGul != null) {
              $totalcumplconsumoacm = ($semanals->graveacPle / $Consulta1->graveactabGul) - 1;
              $semanals->cumplconsumoacmPle = $totalcumplconsumoacm;
            }
          }

          $semanals->save();
          $semanals1 = new PonedoraslevanteSemanal;
          $semanals1->semanaPle = 2;
          $semanals1->fdsPle = $request->fdsPle1;
          $semanals1->avesmuertasPle = $request->avesmuertasPle1;
          $semanals1->mortalidadPle = $request->mortalidadPle1;
          $semanals1->seleccionPle = $request->seleccionPle1;
          $semanals1->otrosPle = $request->otrosPle1;
          $totalacu1 = $request->mortalidadPle1 + $request->seleccionPle1 + $request->otrosPle1 + $semanals->acuPle;
          $semanals1->acuPle = $totalacu1;
          $totalsaldoaves1 = $request->pollitasLot - $semanals1->acuPle;
          $semanals1->saldoavesPle = $totalsaldoaves1;
          $semanals1->alimentoPle = $request->alimentoPle1;
          $semanals1->consumoPle = $request->consumoPle1;
          $totalavediareal1 = $request->consumoPle1 / $semanals1->saldoavesPle / 7;
          $semanals1->avediarealPle = $totalavediareal1;
          $total1 = $request->consumoPle1 + $semanals->kacumPle;
          $semanals1->kacumPle = $total1;
          $totalgraveac1 = $semanals1->kacumPle / $semanals1->saldoavesPle;
          $semanals1->graveacPle = $totalgraveac1;
          $totalmortsem1 = $request->mortalidadPle1 / $semanals->saldoavesPle;
          $semanals1->mortsemPle = $totalmortsem1;
          $totalmortacu1 = ($semanals->mortalidadPle + $request->mortalidadPle1) / $request->pollitasLot;
          $semanals1->mortacuPle = $totalmortacu1;
          $totalselsem1 = $request->seleccionPle1 / $semanals->saldoavesPle;
          $semanals1->selsemPle = $totalselsem1;
          $semanals1->pesoPle = $request->pesoPle1;
          $totalgananciaavediar1 = $request->pesoPle1 - $semanals->pesoPle;
          $semanals1->gananciaavediarPle = $totalgananciaavediar1;
          $semanals1->uniformidadPle = $request->uniformidadPle1;
          $semanals1->coeficientePle = $request->coeficientePle1;
          $semanals1->observacionesPle = $request->observacionesPle1;
          $semanals1->idLevante = $ponedoraslevantes->id;

          $totalmsacu1 = ($semanals->mortalidadPle + $semanals->seleccionPle + $request->mortalidadPle1 + $request->seleccionPle1) / $request->pollitasLot;
          $semanals1->msacuPle = $totalmsacu1;
          foreach ($consulta2 as $Consulta2) {
            if ($semanals1->gananciaavediarPle != null && $Consulta2->gananciaaveriatGul != null) {
              $totalcumpgananave = ($semanals1->gananciaavediarPle / $Consulta2->gananciaaveriatGul) - 1;
              $semanals1->cumpgananavesemanaPle = $totalcumpgananave;
            }
            if ($semanals1->avediarealPle != null && $Consulta2->avediatabGul != null) {
              $totalcumplconsgrad1 = ($semanals1->avediarealPle / $Consulta2->avediatabGul) - 1;
              $semanals1->cumplconsgradPle = $totalcumplconsgrad1;
            }
            if ($semanals1->pesoPle != null && $Consulta2->avediatabGul != null) {
              $totalcumplpeso1 = ($semanals1->pesoPle / $Consulta2->pesotabGul) - 1;
              $semanals1->cumplpesoPle = $totalcumplpeso1;
            }
            if ($semanals1->graveacPle != null && $Consulta2->graveactabGul != null) {
              $totalcumplconsumoacm1 = ($semanals1->graveacPle / $Consulta2->graveactabGul) - 1;
              $semanals1->cumplconsumoacmPle = $totalcumplconsumoacm1;
            }
          }
          if ($semanals1->graveacPle != $semanals->graveacPle && $semanals1->pesoPle != $semanals->pesoPle) {
            $totalconvsem1 = ($semanals1->graveacPle - $semanals->graveacPle) / ($semanals1->pesoPle - $semanals->pesoPle);
            $semanals1->convsemPle = $totalconvsem1;
          }

          $semanals1->save();
          $semanals2 = new PonedoraslevanteSemanal;
          $semanals2->semanaPle = 3;
          $semanals2->fdsPle = $request->fdsPle2;
          $semanals2->avesmuertasPle = $request->avesmuertasPle2;
          $semanals2->mortalidadPle = $request->mortalidadPle2;
          $semanals2->seleccionPle = $request->seleccionPle2;
          $semanals2->otrosPle = $request->otrosPle2;
          $totalacu2 = $request->mortalidadPle2 + $request->seleccionPle2 + $request->otrosPle2 + $semanals1->acuPle;
          $semanals2->acuPle = $totalacu2;
          $totalsaldoaves2 = $request->pollitasLot - $semanals2->acuPle;
          $semanals2->saldoavesPle = $totalsaldoaves2;
          $semanals2->alimentoPle = $request->alimentoPle2;
          $semanals2->consumoPle = $request->consumoPle2;
          $totalavediareal2 = $request->consumoPle2 / $semanals2->saldoavesPle / 7;
          $semanals2->avediarealPle = $totalavediareal2;
          $total2 = $request->consumoPle2 + $semanals1->kacumPle;
          $semanals2->kacumPle = $total2;
          $totalgraveac2 = $semanals2->kacumPle / $semanals2->saldoavesPle;
          $semanals2->graveacPle = $totalgraveac2;
          $totalmortsem2 = $request->mortalidadPle2 / $semanals1->saldoavesPle;
          $semanals2->mortsemPle = $totalmortsem2;
          $totalmortacu2 = ($semanals->mortalidadPle + $semanals1->mortalidadPle + $request->mortalidadPle2) / $request->pollitasLot;
          $semanals2->mortacuPle = $totalmortacu2;
          $totalselsem2 = $request->seleccionPle2 / $semanals1->saldoavesPle;
          $semanals2->selsemPle = $totalselsem2;
          $semanals2->pesoPle = $request->pesoPle2;
          $totalgananciaavediar2 = $request->pesoPle2 - $semanals1->pesoPle;
          $semanals2->gananciaavediarPle = $totalgananciaavediar2;
          $semanals2->uniformidadPle = $request->uniformidadPle2;
          $semanals2->coeficientePle = $request->coeficientePle2;
          $semanals2->observacionesPle = $request->observacionesPle2;
          $semanals2->idLevante = $ponedoraslevantes->id;

          $totalmsacu2 = ($semanals->mortalidadPle + $semanals->seleccionPle + $semanals1->mortalidadPle + $semanals1->seleccionPle + $request->mortalidadPle2 + $request->seleccionPle2) / $request->pollitasLot;
          $semanals2->msacuPle = $totalmsacu2;
          foreach ($consulta3 as $Consulta3) {
            if ($semanals2->gananciaavediarPle != null && $Consulta3->gananciaaveriatGul != null) {
              $totalcumpgananave3 = ($semanals2->gananciaavediarPle / $Consulta3->gananciaaveriatGul) - 1;
              $semanals2->cumpgananavesemanaPle = $totalcumpgananave3;
            }
            if ($semanals2->avediarealPle != null && $Consulta3->avediatabGul != null) {
              $totalcumplconsgrad2 = ($semanals2->avediarealPle / $Consulta3->avediatabGul) - 1;
              $semanals2->cumplconsgradPle = $totalcumplconsgrad2;
            }
            if ($semanals2->pesoPle != null && $Consulta3->avediatabGul != null) {
              $totalcumplpeso2 = ($semanals2->pesoPle / $Consulta3->pesotabGul) - 1;
              $semanals2->cumplpesoPle = $totalcumplpeso2;
            }
            if ($semanals2->graveacPle != null && $Consulta3->graveactabGul != null) {
              $totalcumplconsumoacm2 = ($semanals2->graveacPle / $Consulta3->graveactabGul) - 1;
              $semanals2->cumplconsumoacmPle = $totalcumplconsumoacm2;
            }
          }
          if ($semanals2->graveacPle != $semanals1->graveacPle && $semanals2->pesoPle != $semanals1->pesoPle) {
            $totalconvsem2 = ($semanals2->graveacPle - $semanals1->graveacPle) / ($semanals2->pesoPle - $semanals1->pesoPle);
            $semanals2->convsemPle = $totalconvsem2;
          }

          $semanals2->save();
          $semanals3 = new PonedoraslevanteSemanal;
          $semanals3->semanaPle = 4;
          $semanals3->fdsPle = $request->fdsPle3;
          $semanals3->avesmuertasPle = $request->avesmuertasPle3;
          $semanals3->mortalidadPle = $request->mortalidadPle3;
          $semanals3->seleccionPle = $request->seleccionPle3;
          $semanals3->otrosPle = $request->otrosPle3;
          $totalacu3 = $request->mortalidadPle3 + $request->seleccionPle3 + $request->otrosPle3 + $semanals2->acuPle;
          $semanals3->acuPle = $totalacu3;
          $totalsaldoaves3 = $request->pollitasLot - $semanals3->acuPle;
          $semanals3->saldoavesPle = $totalsaldoaves3;
          $semanals3->alimentoPle = $request->alimentoPle3;
          $semanals3->consumoPle = $request->consumoPle3;
          $totalavediareal3 = $request->consumoPle3 / $semanals3->saldoavesPle / 7;
          $semanals3->avediarealPle = $totalavediareal3;
          $total3 = $request->consumoPle3 + $semanals2->kacumPle;
          $semanals3->kacumPle = $total3;
          $totalgraveac3 = $semanals3->kacumPle / $semanals3->saldoavesPle;
          $semanals3->graveacPle = $totalgraveac3;
          $totalmortsem3 = $request->mortalidadPle3 / $semanals2->saldoavesPle;
          $semanals3->mortsemPle = $totalmortsem3;
          $totalmortacu3 = ($semanals->mortalidadPle + $semanals1->mortalidadPle + $semanals2->mortalidadPle + $request->mortalidadPle3) / $request->pollitasLot;
          $semanals3->mortacuPle = $totalmortacu3;
          $totalselsem3 = $request->seleccionPle3 / $semanals2->saldoavesPle;
          $semanals3->selsemPle = $totalselsem3;
          $semanals3->pesoPle = $request->pesoPle3;
          $totalgananciaavediar3 = $request->pesoPle3 - $semanals2->pesoPle;
          $semanals3->gananciaavediarPle = $totalgananciaavediar3;
          $semanals3->uniformidadPle = $request->uniformidadPle3;
          $semanals3->coeficientePle = $request->coeficientePle3;
          $semanals3->observacionesPle = $request->observacionesPle3;
          $semanals3->idLevante = $ponedoraslevantes->id;

          $totalmsacu3 = ($semanals->mortalidadPle + $semanals->seleccionPle + $semanals1->mortalidadPle + $semanals1->seleccionPle + $semanals2->mortalidadPle + $semanals2->seleccionPle + $request->mortalidadPle3 + $request->seleccionPle3) / $request->pollitasLot;
          $semanals3->msacuPle = $totalmsacu3;
          foreach ($consulta4 as $Consulta4) {
            if ($semanals3->gananciaavediarPle != null && $Consulta4->gananciaaveriatGul != null) {
              $totalcumpgananave4 = ($semanals3->gananciaavediarPle / $Consulta4->gananciaaveriatGul) - 1;
              $semanals3->cumpgananavesemanaPle = $totalcumpgananave4;
            }
            if ($semanals3->avediarealPle != null && $Consulta4->avediatabGul != null) {
              $totalcumplconsgrad3 = ($semanals3->avediarealPle / $Consulta4->avediatabGul) - 1;
              $semanals3->cumplconsgradPle = $totalcumplconsgrad3;
            }
            if ($semanals3->pesoPle != null && $Consulta4->avediatabGul != null) {
              $totalcumplpeso3 = ($semanals3->pesoPle / $Consulta4->pesotabGul) - 1;
              $semanals3->cumplpesoPle = $totalcumplpeso3;
            }
            if ($semanals3->graveacPle != null && $Consulta4->graveactabGul != null) {
              $totalcumplconsumoacm3 = ($semanals3->graveacPle / $Consulta4->graveactabGul) - 1;
              $semanals3->cumplconsumoacmPle = $totalcumplconsumoacm3;
            }
          }
          if ($semanals3->graveacPle != $semanals2->graveacPle && $semanals3->pesoPle != $semanals2->pesoPle) {
            $totalconvsem3 = ($semanals3->graveacPle - $semanals2->graveacPle) / ($semanals3->pesoPle - $semanals2->pesoPle);
            $semanals3->convsemPle = $totalconvsem3;
          }


          $semanals3->save();
          $semanals4 = new PonedoraslevanteSemanal;
          $semanals4->semanaPle = 5;
          $semanals4->fdsPle = $request->fdsPle4;
          $semanals4->avesmuertasPle = $request->avesmuertasPle4;
          $semanals4->mortalidadPle = $request->mortalidadPle4;
          $semanals4->seleccionPle = $request->seleccionPle4;
          $semanals4->otrosPle = $request->otrosPle4;
          $totalacu4 = $request->mortalidadPle4 + $request->seleccionPle4 + $request->otrosPle4 + $semanals3->acuPle;
          $semanals4->acuPle = $totalacu4;
          $totalsaldoaves4 = $request->pollitasLot - $semanals4->acuPle;
          $semanals4->saldoavesPle = $totalsaldoaves4;
          $semanals4->alimentoPle = $request->alimentoPle4;
          $semanals4->consumoPle = $request->consumoPle4;
          $totalavediareal4 = $request->consumoPle4 / $semanals4->saldoavesPle / 7;
          $semanals4->avediarealPle = $totalavediareal4;
          $total4 = $request->consumoPle4 + $semanals3->kacumPle;
          $semanals4->kacumPle = $total4;
          $totalgraveac4 = $semanals4->kacumPle / $semanals4->saldoavesPle;
          $semanals4->graveacPle = $totalgraveac4;
          $totalmortsem4 = $request->mortalidadPle4 / $semanals3->saldoavesPle;
          $semanals4->mortsemPle = $totalmortsem4;
          $totalmortacu4 = ($semanals->mortalidadPle + $semanals1->mortalidadPle + $semanals2->mortalidadPle + $semanals3->mortalidadPle + $request->mortalidadPle4) / $request->pollitasLot;
          $semanals4->mortacuPle = $totalmortacu4;
          $totalselsem4 = $request->seleccionPle4 / $semanals3->saldoavesPle;
          $semanals4->selsemPle = $totalselsem4;
          $semanals4->pesoPle = $request->pesoPle4;
          $totalgananciaavediar4 = $request->pesoPle4 - $semanals3->pesoPle;
          $semanals4->gananciaavediarPle = $totalgananciaavediar4;
          $semanals4->uniformidadPle = $request->uniformidadPle4;
          $semanals4->coeficientePle = $request->coeficientePle4;
          $semanals4->observacionesPle = $request->observacionesPle4;
          $semanals4->idLevante = $ponedoraslevantes->id;

          $totalmsacu4 = ($semanals->mortalidadPle + $semanals->seleccionPle + $semanals1->mortalidadPle + $semanals1->seleccionPle + $semanals2->mortalidadPle + $semanals2->seleccionPle + $semanals3->mortalidadPle + $semanals3->seleccionPle + $request->mortalidadPle4 + $request->seleccionPle4) / $request->pollitasLot;
          $semanals4->msacuPle = $totalmsacu4;
          foreach ($consulta5 as $Consulta5) {
            if ($semanals4->gananciaavediarPle != null && $Consulta4->gananciaaveriatGul != null) {
              $totalcumpgananave5 = ($semanals4->gananciaavediarPle / $Consulta5->gananciaaveriatGul) - 1;
              $semanals4->cumpgananavesemanaPle = $totalcumpgananave5;
            }
            if ($semanals4->avediarealPle != null && $Consulta5->avediatabGul != null) {
              $totalcumplconsgrad4 = ($semanals4->avediarealPle / $Consulta5->avediatabGul) - 1;
              $semanals4->cumplconsgradPle = $totalcumplconsgrad4;
            }
            if ($semanals4->pesoPle != null && $Consulta5->avediatabGul != null) {
              $totalcumplpeso4 = ($semanals4->pesoPle / $Consulta5->pesotabGul) - 1;
              $semanals4->cumplpesoPle = $totalcumplpeso4;
            }
            if ($semanals4->graveacPle != null && $Consulta5->graveactabGul != null) {
              $totalcumplconsumoacm4 = ($semanals4->graveacPle / $Consulta5->graveactabGul) - 1;
              $semanals4->cumplconsumoacmPle = $totalcumplconsumoacm4;
            }
          }
          if ($semanals4->graveacPle != $semanals3->graveacPle && $semanals4->pesoPle != $semanals3->pesoPle) {
            $totalconvsem4 = ($semanals4->graveacPle - $semanals3->graveacPle) / ($semanals4->pesoPle - $semanals3->pesoPle);
            $semanals4->convsemPle = $totalconvsem4;
          }

          $semanals4->save();
          $semanals5 = new PonedoraslevanteSemanal;
          $semanals5->semanaPle = 6;
          $semanals5->fdsPle = $request->fdsPle5;
          $semanals5->avesmuertasPle = $request->avesmuertasPle5;
          $semanals5->mortalidadPle = $request->mortalidadPle5;
          $semanals5->seleccionPle = $request->seleccionPle5;
          $semanals5->otrosPle = $request->otrosPle5;
          $totalacu5 = $request->mortalidadPle5 + $request->seleccionPle5 + $request->otrosPle5 + $semanals4->acuPle;
          $semanals5->acuPle = $totalacu5;
          $totalsaldoaves5 = $request->pollitasLot - $semanals5->acuPle;
          $semanals5->saldoavesPle = $totalsaldoaves5;
          $semanals5->alimentoPle = $request->alimentoPle5;
          $semanals5->consumoPle = $request->consumoPle5;
          $totalavediareal5 = $request->consumoPle5 / $semanals5->saldoavesPle / 7;
          $semanals5->avediarealPle = $totalavediareal5;
          $total5 = $request->consumoPle5 + $semanals4->kacumPle;
          $semanals5->kacumPle = $total5;
          $totalgraveac5 = $semanals5->kacumPle / $semanals5->saldoavesPle;
          $semanals5->graveacPle = $totalgraveac5;
          $totalmortsem5 = $request->mortalidadPle5 / $semanals4->saldoavesPle;
          $semanals5->mortsemPle = $totalmortsem5;
          $totalmortacu5 = ($semanals->mortalidadPle + $semanals1->mortalidadPle + $semanals2->mortalidadPle + $semanals3->mortalidadPle + $semanals4->mortalidadPle + $request->mortalidadPle5) / $request->pollitasLot;
          $semanals5->mortacuPle = $totalmortacu5;
          $totalselsem5 = $request->seleccionPle5 / $semanals4->saldoavesPle;
          $semanals5->selsemPle = $totalselsem5;
          $semanals5->pesoPle = $request->pesoPle5;
          $totalgananciaavediar5 = $request->pesoPle5 - $semanals4->pesoPle;
          $semanals5->gananciaavediarPle = $totalgananciaavediar5;
          $semanals5->uniformidadPle = $request->uniformidadPle5;
          $semanals5->coeficientePle = $request->coeficientePle5;
          $semanals5->observacionesPle = $request->observacionesPle5;
          $semanals5->idLevante = $ponedoraslevantes->id;

          $totalmsacu5 = ($semanals->mortalidadPle + $semanals->seleccionPle + $semanals1->mortalidadPle + $semanals1->seleccionPle + $semanals2->mortalidadPle + $semanals2->seleccionPle + $semanals3->mortalidadPle + $semanals3->seleccionPle + $semanals4->mortalidadPle + $semanals4->seleccionPle + $request->mortalidadPle5 + $request->seleccionPle5) / $request->pollitasLot;
          $semanals5->msacuPle = $totalmsacu5;
          foreach ($consulta6 as $Consulta6) {
            if ($semanals5->gananciaavediarPle != null && $Consulta6->gananciaaveriatGul != null) {
              $totalcumpgananave6 = ($semanals5->gananciaavediarPle / $Consulta6->gananciaaveriatGul) - 1;
              $semanals5->cumpgananavesemanaPle = $totalcumpgananave6;
            }
            if ($semanals5->avediarealPle != null && $Consulta6->avediatabGul != null) {
              $totalcumplconsgrad5 = ($semanals5->avediarealPle / $Consulta6->avediatabGul) - 1;
              $semanals5->cumplconsgradPle = $totalcumplconsgrad5;
            }
            if ($semanals5->pesoPle != null && $Consulta6->avediatabGul != null) {
              $totalcumplpeso5 = ($semanals5->pesoPle / $Consulta6->pesotabGul) - 1;
              $semanals5->cumplpesoPle = $totalcumplpeso5;
            }
            if ($semanals5->graveacPle != null && $Consulta6->graveactabGul != null) {
              $totalcumplconsumoacm5 = ($semanals5->graveacPle / $Consulta6->graveactabGul) - 1;
              $semanals5->cumplconsumoacmPle = $totalcumplconsumoacm5;
            }
          }
          if ($semanals5->graveacPle != $semanals4->graveacPle && $semanals5->pesoPle != $semanals4->pesoPle) {
            $totalconvsem5 = ($semanals5->graveacPle - $semanals4->graveacPle) / ($semanals5->pesoPle - $semanals4->pesoPle);
            $semanals5->convsemPle = $totalconvsem5;
          }

          $semanals5->save();
          $semanals6 = new PonedoraslevanteSemanal;
          $semanals6->semanaPle = 7;
          $semanals6->fdsPle = $request->fdsPle6;
          $semanals6->avesmuertasPle = $request->avesmuertasPle6;
          $semanals6->mortalidadPle = $request->mortalidadPle6;
          $semanals6->seleccionPle = $request->seleccionPle6;
          $semanals6->otrosPle = $request->otrosPle6;
          $totalacu6 = $request->mortalidadPle6 + $request->seleccionPle6 + $request->otrosPle6 + $semanals5->acuPle;
          $semanals6->acuPle = $totalacu6;
          $totalsaldoaves6 = $request->pollitasLot - $semanals6->acuPle;
          $semanals6->saldoavesPle = $totalsaldoaves6;
          $semanals6->alimentoPle = $request->alimentoPle6;
          $semanals6->consumoPle = $request->consumoPle6;
          $totalavediareal6 = $request->consumoPle6 / $semanals6->saldoavesPle / 7;
          $semanals6->avediarealPle = $totalavediareal6;
          $total6 = $request->consumoPle6 + $semanals5->kacumPle;
          $semanals6->kacumPle = $total6;
          $totalgraveac6 = $semanals6->kacumPle / $semanals6->saldoavesPle;
          $semanals6->graveacPle = $totalgraveac6;
          $totalmortsem6 = $request->mortalidadPle6 / $semanals5->saldoavesPle;
          $semanals6->mortsemPle = $totalmortsem6;
          $totalmortacu6 = ($semanals->mortalidadPle + $semanals1->mortalidadPle + $semanals2->mortalidadPle + $semanals3->mortalidadPle + $semanals4->mortalidadPle + $semanals5->mortalidadPle + $request->mortalidadPle6) / $request->pollitasLot;
          $semanals6->mortacuPle = $totalmortacu6;
          $totalselsem6 = $request->seleccionPle6 / $semanals5->saldoavesPle;
          $semanals6->selsemPle = $totalselsem6;
          $semanals6->pesoPle = $request->pesoPle6;
          $totalgananciaavediar6 = $request->pesoPle6 - $semanals5->pesoPle;
          $semanals6->gananciaavediarPle = $totalgananciaavediar6;
          $semanals6->uniformidadPle = $request->uniformidadPle6;
          $semanals6->coeficientePle = $request->coeficientePle6;
          $semanals6->observacionesPle = $request->observacionesPle6;
          $semanals6->idLevante = $ponedoraslevantes->id;

          $totalmsacu6 = ($semanals->mortalidadPle + $semanals->seleccionPle + $semanals1->mortalidadPle + $semanals1->seleccionPle + $semanals2->mortalidadPle + $semanals2->seleccionPle + $semanals3->mortalidadPle + $semanals3->seleccionPle + $semanals4->mortalidadPle + $semanals4->seleccionPle + $semanals5->mortalidadPle + $semanals5->seleccionPle + $request->mortalidadPle6 + $request->seleccionPle6) / $request->pollitasLot;
          $semanals6->msacuPle = $totalmsacu6;
          foreach ($consulta7 as $Consulta7) {
            if ($semanals6->gananciaavediarPle != null && $Consulta7->gananciaaveriatGul != null) {
              $totalcumpgananave7 = ($semanals6->gananciaavediarPle / $Consulta7->gananciaaveriatGul) - 1;
              $semanals6->cumpgananavesemanaPle = $totalcumpgananave7;
            }
            if ($semanals6->avediarealPle != null && $Consulta7->avediatabGul != null) {
              $totalcumplconsgrad6 = ($semanals6->avediarealPle / $Consulta7->avediatabGul) - 1;
              $semanals6->cumplconsgradPle = $totalcumplconsgrad6;
            }
            if ($semanals6->pesoPle != null && $Consulta7->avediatabGul != null) {
              $totalcumplpeso6 = ($semanals6->pesoPle / $Consulta7->pesotabGul) - 1;
              $semanals6->cumplpesoPle = $totalcumplpeso6;
            }
            if ($semanals6->graveacPle != null && $Consulta7->graveactabGul != null) {
              $totalcumplconsumoacm6 = ($semanals6->graveacPle / $Consulta7->graveactabGul) - 1;
              $semanals6->cumplconsumoacmPle = $totalcumplconsumoacm6;
            }
          }
          if ($semanals6->graveacPle != $semanals5->graveacPle && $semanals6->pesoPle != $semanals5->pesoPle) {
            $totalconvsem6 = ($semanals6->graveacPle - $semanals5->graveacPle) / ($semanals6->pesoPle - $semanals5->pesoPle);
            $semanals6->convsemPle = $totalconvsem6;
          }

          $semanals6->save();
          $semanals7 = new PonedoraslevanteSemanal;
          $semanals7->semanaPle = 8;
          $semanals7->fdsPle = $request->fdsPle7;
          $semanals7->avesmuertasPle = $request->avesmuertasPle7;
          $semanals7->mortalidadPle = $request->mortalidadPle7;
          $semanals7->seleccionPle = $request->seleccionPle7;
          $semanals7->otrosPle = $request->otrosPle7;
          $totalacu7 = $request->mortalidadPle7 + $request->seleccionPle7 + $request->otrosPle7 + $semanals6->acuPle;
          $semanals7->acuPle = $totalacu7;
          $totalsaldoaves7 = $request->pollitasLot - $semanals7->acuPle;
          $semanals7->saldoavesPle = $totalsaldoaves7;
          $semanals7->alimentoPle = $request->alimentoPle7;
          $semanals7->consumoPle = $request->consumoPle7;
          $totalavediareal7 = $request->consumoPle7 / $semanals7->saldoavesPle / 7;
          $semanals7->avediarealPle = $totalavediareal7;
          $total7 = $request->consumoPle7 + $semanals6->kacumPle;
          $semanals7->kacumPle = $total7;
          $totalgraveac7 = $semanals7->kacumPle / $semanals7->saldoavesPle;
          $semanals7->graveacPle = $totalgraveac7;
          $totalmortsem7 = $request->mortalidadPle7 / $semanals6->saldoavesPle;
          $semanals7->mortsemPle = $totalmortsem7;
          $totalmortacu7 = ($semanals->mortalidadPle + $semanals1->mortalidadPle + $semanals2->mortalidadPle + $semanals3->mortalidadPle + $semanals4->mortalidadPle + $semanals5->mortalidadPle + $semanals6->mortalidadPle + $request->mortalidadPle7) / $request->pollitasLot;
          $semanals7->mortacuPle = $totalmortacu7;
          $totalselsem7 = $request->seleccionPle7 / $semanals6->saldoavesPle;
          $semanals7->selsemPle = $totalselsem7;
          $semanals7->pesoPle = $request->pesoPle7;
          $totalgananciaavediar7 = $request->pesoPle7 - $semanals6->pesoPle;
          $semanals7->gananciaavediarPle = $totalgananciaavediar7;
          $semanals7->uniformidadPle = $request->uniformidadPle7;
          $semanals7->coeficientePle = $request->coeficientePle7;
          $semanals7->observacionesPle = $request->observacionesPle7;
          $semanals7->idLevante = $ponedoraslevantes->id;

          $totalmsacu7 = ($semanals->mortalidadPle + $semanals->seleccionPle + $semanals1->mortalidadPle + $semanals1->seleccionPle + $semanals2->mortalidadPle + $semanals2->seleccionPle + $semanals3->mortalidadPle + $semanals3->seleccionPle + $semanals4->mortalidadPle + $semanals4->seleccionPle + $semanals5->mortalidadPle + $semanals5->seleccionPle + $semanals6->mortalidadPle + $semanals6->seleccionPle + $request->mortalidadPle7 + $request->seleccionPle7) / $request->pollitasLot;
          $semanals7->msacuPle = $totalmsacu7;
          foreach ($consulta8 as $Consulta8) {
            if ($semanals7->gananciaavediarPle != null && $Consulta8->gananciaaveriatGul != null) {
              $totalcumpgananave8 = ($semanals7->gananciaavediarPle / $Consulta8->gananciaaveriatGul) - 1;
              $semanals7->cumpgananavesemanaPle = $totalcumpgananave8;
            }
            if ($semanals7->avediarealPle != null && $Consulta8->avediatabGul != null) {
              $totalcumplconsgrad7 = ($semanals7->avediarealPle / $Consulta8->avediatabGul) - 1;
              $semanals7->cumplconsgradPle = $totalcumplconsgrad7;
            }
            if ($semanals7->pesoPle != null && $Consulta8->avediatabGul != null) {
              $totalcumplpeso7 = ($semanals7->pesoPle / $Consulta8->pesotabGul) - 1;
              $semanals7->cumplpesoPle = $totalcumplpeso7;
            }
            if ($semanals7->graveacPle != null && $Consulta8->graveactabGul != null) {
              $totalcumplconsumoacm7 = ($semanals7->graveacPle / $Consulta8->graveactabGul) - 1;
              $semanals7->cumplconsumoacmPle = $totalcumplconsumoacm7;
            }
          }
          if ($semanals7->graveacPle != $semanals6->graveacPle && $semanals7->pesoPle != $semanals6->pesoPle) {
            $totalconvsem7 = ($semanals7->graveacPle - $semanals6->graveacPle) / ($semanals7->pesoPle - $semanals6->pesoPle);
            $semanals7->convsemPle = $totalconvsem7;
          }


          $semanals7->save();
          $semanals8 = new PonedoraslevanteSemanal;
          $semanals8->semanaPle = 9;
          $semanals8->fdsPle = $request->fdsPle8;
          $semanals8->avesmuertasPle = $request->avesmuertasPle8;
          $semanals8->mortalidadPle = $request->mortalidadPle8;
          $semanals8->seleccionPle = $request->seleccionPle8;
          $semanals8->otrosPle = $request->otrosPle8;
          $totalacu8 = $request->mortalidadPle8 + $request->seleccionPle8 + $request->otrosPle8 + $semanals7->acuPle;
          $semanals8->acuPle = $totalacu8;
          $totalsaldoaves8 = $request->pollitasLot - $semanals8->acuPle;
          $semanals8->saldoavesPle = $totalsaldoaves8;
          $semanals8->alimentoPle = $request->alimentoPle8;
          $semanals8->consumoPle = $request->consumoPle8;
          $totalavediareal8 = $request->consumoPle8 / $semanals8->saldoavesPle / 7;
          $semanals8->avediarealPle = $totalavediareal8;
          $total8 = $request->consumoPle8 + $semanals7->kacumPle;
          $semanals8->kacumPle = $total8;
          $totalgraveac8 = $semanals8->kacumPle / $semanals8->saldoavesPle;
          $semanals8->graveacPle = $totalgraveac8;
          $totalmortsem8 = $request->mortalidadPle8 / $semanals7->saldoavesPle;
          $semanals8->mortsemPle = $totalmortsem8;
          $totalmortacu8 = ($semanals->mortalidadPle + $semanals1->mortalidadPle + $semanals2->mortalidadPle + $semanals3->mortalidadPle + $semanals4->mortalidadPle + $semanals5->mortalidadPle + $semanals6->mortalidadPle + $semanals7->mortalidadPle + $request->mortalidadPle8) / $request->pollitasLot;
          $semanals8->mortacuPle = $totalmortacu8;
          $totalselsem8 = $request->seleccionPle8 / $semanals7->saldoavesPle;
          $semanals8->selsemPle = $totalselsem8;
          $semanals8->pesoPle = $request->pesoPle8;
          $totalgananciaavediar8 = $request->pesoPle8 - $semanals7->pesoPle;
          $semanals8->gananciaavediarPle = $totalgananciaavediar8;
          $semanals8->uniformidadPle = $request->uniformidadPle8;
          $semanals8->coeficientePle = $request->coeficientePle8;
          $semanals8->observacionesPle = $request->observacionesPle8;
          $semanals8->idLevante = $ponedoraslevantes->id;

          $totalmsacu8 = ($semanals->mortalidadPle + $semanals->seleccionPle + $semanals1->mortalidadPle + $semanals1->seleccionPle + $semanals2->mortalidadPle + $semanals2->seleccionPle + $semanals3->mortalidadPle + $semanals3->seleccionPle + $semanals4->mortalidadPle + $semanals4->seleccionPle + $semanals5->mortalidadPle + $semanals5->seleccionPle + $semanals6->mortalidadPle + $semanals6->seleccionPle + $semanals7->mortalidadPle + $semanals7->seleccionPle + $request->mortalidadPle8 + $request->seleccionPle8) / $request->pollitasLot;
          $semanals8->msacuPle = $totalmsacu8;
          foreach ($consulta9 as $Consulta9) {
            if ($semanals8->gananciaavediarPle != null && $Consulta9->gananciaaveriatGul != null) {
              $totalcumpgananave9 = ($semanals8->gananciaavediarPle / $Consulta9->gananciaaveriatGul) - 1;
              $semanals8->cumpgananavesemanaPle = $totalcumpgananave9;
            }
            if ($semanals8->avediarealPle != null && $Consulta9->avediatabGul != null) {
              $totalcumplconsgrad8 = ($semanals8->avediarealPle / $Consulta9->avediatabGul) - 1;
              $semanals8->cumplconsgradPle = $totalcumplconsgrad8;
            }
            if ($semanals8->pesoPle != null && $Consulta9->avediatabGul != null) {
              $totalcumplpeso8 = ($semanals8->pesoPle / $Consulta9->pesotabGul) - 1;
              $semanals8->cumplpesoPle = $totalcumplpeso8;
            }
            if ($semanals8->graveacPle != null && $Consulta9->graveactabGul != null) {
              $totalcumplconsumoacm8 = ($semanals8->graveacPle / $Consulta9->graveactabGul) - 1;
              $semanals8->cumplconsumoacmPle = $totalcumplconsumoacm8;
            }
          }
          if ($semanals8->graveacPle != $semanals7->graveacPle && $semanals8->pesoPle != $semanals7->pesoPle) {
            $totalconvsem8 = ($semanals8->graveacPle - $semanals7->graveacPle) / ($semanals8->pesoPle - $semanals7->pesoPle);
            $semanals8->convsemPle = $totalconvsem8;
          }


          $semanals8->save();
          $semanals9 = new PonedoraslevanteSemanal;
          $semanals9->semanaPle = 10;
          $semanals9->fdsPle = $request->fdsPle9;
          $semanals9->avesmuertasPle = $request->avesmuertasPle9;
          $semanals9->mortalidadPle = $request->mortalidadPle9;
          $semanals9->seleccionPle = $request->seleccionPle9;
          $semanals9->otrosPle = $request->otrosPle9;
          $totalacu9 = $request->mortalidadPle9 + $request->seleccionPle9 + $request->otrosPle9 + $semanals8->acuPle;
          $semanals9->acuPle = $totalacu9;
          $totalsaldoaves9 = $request->pollitasLot - $semanals9->acuPle;
          $semanals9->saldoavesPle = $totalsaldoaves9;
          $semanals9->alimentoPle = $request->alimentoPle9;
          $semanals9->consumoPle = $request->consumoPle9;
          $totalavediareal9 = $request->consumoPle9 / $semanals9->saldoavesPle / 7;
          $semanals9->avediarealPle = $totalavediareal9;
          $total9 = $request->consumoPle9 + $semanals8->kacumPle;
          $semanals9->kacumPle = $total9;
          $totalgraveac9 = $semanals9->kacumPle / $semanals9->saldoavesPle;
          $semanals9->graveacPle = $totalgraveac9;
          $totalmortsem9 = $request->mortalidadPle9 / $semanals8->saldoavesPle;
          $semanals9->mortsemPle = $totalmortsem9;
          $totalmortacu9 = ($semanals->mortalidadPle + $semanals1->mortalidadPle + $semanals2->mortalidadPle + $semanals3->mortalidadPle + $semanals4->mortalidadPle + $semanals5->mortalidadPle + $semanals6->mortalidadPle + $semanals7->mortalidadPle + $semanals8->mortalidadPle + $request->mortalidadPle9) / $request->pollitasLot;
          $semanals9->mortacuPle = $totalmortacu9;
          $totalselsem9 = $request->seleccionPle9 / $semanals8->saldoavesPle;
          $semanals9->selsemPle = $totalselsem9;
          $semanals9->pesoPle = $request->pesoPle9;
          $totalgananciaavediar9 = $request->pesoPle9 - $semanals8->pesoPle;
          $semanals9->gananciaavediarPle = $totalgananciaavediar9;
          $semanals9->uniformidadPle = $request->uniformidadPle9;
          $semanals9->coeficientePle = $request->coeficientePle9;
          $semanals9->observacionesPle = $request->observacionesPle9;
          $semanals9->idLevante = $ponedoraslevantes->id;

          $totalmsacu9 = ($semanals->mortalidadPle + $semanals->seleccionPle + $semanals1->mortalidadPle + $semanals1->seleccionPle + $semanals2->mortalidadPle + $semanals2->seleccionPle + $semanals3->mortalidadPle + $semanals3->seleccionPle + $semanals4->mortalidadPle + $semanals4->seleccionPle + $semanals5->mortalidadPle + $semanals5->seleccionPle + $semanals6->mortalidadPle + $semanals6->seleccionPle + $semanals7->mortalidadPle + $semanals7->seleccionPle + $semanals8->mortalidadPle + $semanals8->seleccionPle + $request->mortalidadPle9 + $request->seleccionPle9) / $request->pollitasLot;
          $semanals9->msacuPle = $totalmsacu9;
          foreach ($consulta10 as $Consulta10) {
            if ($semanals9->gananciaavediarPle != null && $Consulta10->gananciaaveriatGul != null) {
              $totalcumpgananave10 = ($semanals9->gananciaavediarPle / $Consulta10->gananciaaveriatGul) - 1;
              $semanals9->cumpgananavesemanaPle = $totalcumpgananave10;
            }
            if ($semanals9->avediarealPle != null && $Consulta10->avediatabGul != null) {
              $totalcumplconsgrad9 = ($semanals9->avediarealPle / $Consulta10->avediatabGul) - 1;
              $semanals9->cumplconsgradPle = $totalcumplconsgrad9;
            }
            if ($semanals9->pesoPle != null && $Consulta10->avediatabGul != null) {
              $totalcumplpeso9 = ($semanals9->pesoPle / $Consulta10->pesotabGul) - 1;
              $semanals9->cumplpesoPle = $totalcumplpeso9;
            }
            if ($semanals9->graveacPle != null && $Consulta10->graveactabGul != null) {
              $totalcumplconsumoacm9 = ($semanals9->graveacPle / $Consulta10->graveactabGul) - 1;
              $semanals9->cumplconsumoacmPle = $totalcumplconsumoacm9;
            }
          }
          if ($semanals9->graveacPle != $semanals8->graveacPle && $semanals9->pesoPle != $semanals8->pesoPle) {
            $totalconvsem9 = ($semanals9->graveacPle - $semanals8->graveacPle) / ($semanals9->pesoPle - $semanals8->pesoPle);
            $semanals9->convsemPle = $totalconvsem9;
          }


          $semanals9->save();
          $semanals10 = new PonedoraslevanteSemanal;
          $semanals10->semanaPle = 11;
          $semanals10->fdsPle = $request->fdsPle10;
          $semanals10->avesmuertasPle = $request->avesmuertasPle10;
          $semanals10->mortalidadPle = $request->mortalidadPle10;
          $semanals10->seleccionPle = $request->seleccionPle10;
          $semanals10->otrosPle = $request->otrosPle10;
          $totalacu10 = $request->mortalidadPle10 + $request->seleccionPle10 + $request->otrosPle10 + $semanals9->acuPle;
          $semanals10->acuPle = $totalacu10;
          $totalsaldoaves10 = $request->pollitasLot - $semanals10->acuPle;
          $semanals10->saldoavesPle = $totalsaldoaves10;
          $semanals10->alimentoPle = $request->alimentoPle10;
          $semanals10->consumoPle = $request->consumoPle10;
          $totalavediareal10 = $request->consumoPle10 / $semanals10->saldoavesPle / 7;
          $semanals10->avediarealPle = $totalavediareal10;
          $total10 = $request->consumoPle10 + $semanals9->kacumPle;
          $semanals10->kacumPle = $total10;
          $totalgraveac10 = $semanals10->kacumPle / $semanals10->saldoavesPle;
          $semanals10->graveacPle = $totalgraveac10;
          $totalmortsem10 = $request->mortalidadPle10 / $semanals9->saldoavesPle;
          $semanals10->mortsemPle = $totalmortsem10;
          $totalmortacu10 = ($semanals->mortalidadPle + $semanals1->mortalidadPle + $semanals2->mortalidadPle + $semanals3->mortalidadPle + $semanals4->mortalidadPle + $semanals5->mortalidadPle + $semanals6->mortalidadPle + $semanals7->mortalidadPle + $semanals8->mortalidadPle + $semanals9->mortalidadPle + $request->mortalidadPle10) / $request->pollitasLot;
          $semanals10->mortacuPle = $totalmortacu10;
          $totalselsem10 = $request->seleccionPle10 / $semanals9->saldoavesPle;
          $semanals10->selsemPle = $totalselsem10;
          $semanals10->pesoPle = $request->pesoPle10;
          $totalgananciaavediar10 = $request->pesoPle10 - $semanals9->pesoPle;
          $semanals10->gananciaavediarPle = $totalgananciaavediar10;
          $semanals10->uniformidadPle = $request->uniformidadPle10;
          $semanals10->coeficientePle = $request->coeficientePle10;
          $semanals10->observacionesPle = $request->observacionesPle10;
          $semanals10->idLevante = $ponedoraslevantes->id;

          $totalmsacu10 = ($semanals->mortalidadPle + $semanals->seleccionPle + $semanals1->mortalidadPle + $semanals1->seleccionPle + $semanals2->mortalidadPle + $semanals2->seleccionPle + $semanals3->mortalidadPle + $semanals3->seleccionPle + $semanals4->mortalidadPle + $semanals4->seleccionPle + $semanals5->mortalidadPle + $semanals5->seleccionPle + $semanals6->mortalidadPle + $semanals6->seleccionPle + $semanals7->mortalidadPle + $semanals7->seleccionPle + $semanals8->mortalidadPle + $semanals8->seleccionPle + $semanals9->mortalidadPle + $semanals9->seleccionPle + $request->mortalidadPle10 + $request->seleccionPle10) / $request->pollitasLot;
          $semanals10->msacuPle = $totalmsacu10;
          foreach ($consulta11 as $Consulta11) {
            if ($semanals10->gananciaavediarPle != null && $Consulta11->gananciaaveriatGul != null) {
              $totalcumpgananave11 = ($semanals10->gananciaavediarPle / $Consulta11->gananciaaveriatGul) - 1;
              $semanals10->cumpgananavesemanaPle = $totalcumpgananave11;
            }
            if ($semanals10->avediarealPle != null && $Consulta11->avediatabGul != null) {
              $totalcumplconsgrad10 = ($semanals10->avediarealPle / $Consulta11->avediatabGul) - 1;
              $semanals10->cumplconsgradPle = $totalcumplconsgrad10;
            }
            if ($semanals10->pesoPle != null && $Consulta11->avediatabGul != null) {
              $totalcumplpeso10 = ($semanals10->pesoPle / $Consulta11->pesotabGul) - 1;
              $semanals10->cumplpesoPle = $totalcumplpeso10;
            }
            if ($semanals10->graveacPle != null && $Consulta11->graveactabGul != null) {
              $totalcumplconsumoacm10 = ($semanals10->graveacPle / $Consulta11->graveactabGul) - 1;
              $semanals10->cumplconsumoacmPle = $totalcumplconsumoacm10;
            }
          }
          if ($semanals10->graveacPle != $semanals9->graveacPle && $semanals10->pesoPle != $semanals9->pesoPle) {
            $totalconvsem10 = ($semanals10->graveacPle - $semanals9->graveacPle) / ($semanals10->pesoPle - $semanals9->pesoPle);
            $semanals10->convsemPle = $totalconvsem10;
          }

          $semanals10->save();
          $semanals11 = new PonedoraslevanteSemanal;
          $semanals11->semanaPle = 12;
          $semanals11->fdsPle = $request->fdsPle11;
          $semanals11->avesmuertasPle = $request->avesmuertasPle11;
          $semanals11->mortalidadPle = $request->mortalidadPle11;
          $semanals11->seleccionPle = $request->seleccionPle11;
          $semanals11->otrosPle = $request->otrosPle11;
          $totalacu11 = $request->mortalidadPle11 + $request->seleccionPle11 + $request->otrosPle11 + $semanals10->acuPle;
          $semanals11->acuPle = $totalacu11;
          $totalsaldoaves11 = $request->pollitasLot - $semanals11->acuPle;
          $semanals11->saldoavesPle = $totalsaldoaves11;
          $semanals11->alimentoPle = $request->alimentoPle11;
          $semanals11->consumoPle = $request->consumoPle11;
          $totalavediareal11 = $request->consumoPle11 / $semanals11->saldoavesPle / 7;
          $semanals11->avediarealPle = $totalavediareal11;
          $total11 = $request->consumoPle11 + $semanals10->kacumPle;
          $semanals11->kacumPle = $total11;
          $totalgraveac11 = $semanals11->kacumPle / $semanals11->saldoavesPle;
          $semanals11->graveacPle = $totalgraveac11;
          $totalmortsem11 = $request->mortalidadPle11 / $semanals10->saldoavesPle;
          $semanals11->mortsemPle = $totalmortsem11;
          $totalmortacu11 = ($semanals->mortalidadPle + $semanals1->mortalidadPle + $semanals2->mortalidadPle + $semanals3->mortalidadPle + $semanals4->mortalidadPle + $semanals5->mortalidadPle + $semanals6->mortalidadPle + $semanals7->mortalidadPle + $semanals8->mortalidadPle + $semanals9->mortalidadPle + $semanals10->mortalidadPle + $request->mortalidadPle11) / $request->pollitasLot;
          $semanals11->mortacuPle = $totalmortacu11;
          $totalselsem11 = $request->seleccionPle11 / $semanals10->saldoavesPle;
          $semanals11->selsemPle = $totalselsem11;
          $semanals11->pesoPle = $request->pesoPle11;
          $totalgananciaavediar11 = $request->pesoPle11 - $semanals10->pesoPle;
          $semanals11->gananciaavediarPle = $totalgananciaavediar11;
          $semanals11->uniformidadPle = $request->uniformidadPle11;
          $semanals11->coeficientePle = $request->coeficientePle11;
          $semanals11->observacionesPle = $request->observacionesPle11;
          $semanals11->idLevante = $ponedoraslevantes->id;

          $totalmsacu11 = ($semanals->mortalidadPle + $semanals->seleccionPle + $semanals1->mortalidadPle + $semanals1->seleccionPle + $semanals2->mortalidadPle + $semanals2->seleccionPle + $semanals3->mortalidadPle + $semanals3->seleccionPle + $semanals4->mortalidadPle + $semanals4->seleccionPle + $semanals5->mortalidadPle + $semanals5->seleccionPle + $semanals6->mortalidadPle + $semanals6->seleccionPle + $semanals7->mortalidadPle + $semanals7->seleccionPle + $semanals8->mortalidadPle + $semanals8->seleccionPle + $semanals9->mortalidadPle + $semanals9->seleccionPle + $semanals10->mortalidadPle + $semanals10->seleccionPle + $request->mortalidadPle11 + $request->seleccionPle11) / $request->pollitasLot;
          $semanals11->msacuPle = $totalmsacu11;
          foreach ($consulta12 as $Consulta12) {
            if ($semanals11->gananciaavediarPle != null && $Consulta12->gananciaaveriatGul != null) {
              $totalcumpgananave12 = ($semanals11->gananciaavediarPle / $Consulta12->gananciaaveriatGul) - 1;
              $semanals11->cumpgananavesemanaPle = $totalcumpgananave12;
            }
            if ($semanals11->avediarealPle != null && $Consulta12->avediatabGul != null) {
              $totalcumplconsgrad11 = ($semanals11->avediarealPle / $Consulta12->avediatabGul) - 1;
              $semanals11->cumplconsgradPle = $totalcumplconsgrad11;
            }
            if ($semanals11->pesoPle != null && $Consulta12->avediatabGul != null) {
              $totalcumplpeso11 = ($semanals11->pesoPle / $Consulta12->pesotabGul) - 1;
              $semanals11->cumplpesoPle = $totalcumplpeso11;
            }
            if ($semanals11->graveacPle != null && $Consulta12->graveactabGul != null) {
              $totalcumplconsumoacm11 = ($semanals11->graveacPle / $Consulta12->graveactabGul) - 1;
              $semanals11->cumplconsumoacmPle = $totalcumplconsumoacm11;
            }
          }
          if ($semanals11->graveacPle != $semanals10->graveacPle && $semanals11->pesoPle != $semanals10->pesoPle) {
            $totalconvsem11 = ($semanals11->graveacPle - $semanals10->graveacPle) / ($semanals11->pesoPle - $semanals10->pesoPle);
            $semanals11->convsemPle = $totalconvsem11;
          }


          $semanals11->save();
          $semanals12 = new PonedoraslevanteSemanal;
          $semanals12->semanaPle = 13;
          $semanals12->fdsPle = $request->fdsPle12;
          $semanals12->avesmuertasPle = $request->avesmuertasPle12;
          $semanals12->mortalidadPle = $request->mortalidadPle12;
          $semanals12->seleccionPle = $request->seleccionPle12;
          $semanals12->otrosPle = $request->otrosPle12;
          $totalacu12 = $request->mortalidadPle12 + $request->seleccionPle12 + $request->otrosPle12 + $semanals11->acuPle;
          $semanals12->acuPle = $totalacu12;
          $totalsaldoaves12 = $request->pollitasLot - $semanals12->acuPle;
          $semanals12->saldoavesPle = $totalsaldoaves12;
          $semanals12->alimentoPle = $request->alimentoPle12;
          $semanals12->consumoPle = $request->consumoPle12;
          $totalavediareal12 = $request->consumoPle12 / $semanals12->saldoavesPle / 7;
          $semanals12->avediarealPle = $totalavediareal12;
          $total12 = $request->consumoPle12 + $semanals11->kacumPle;
          $semanals12->kacumPle = $total12;
          $totalgraveac12 = $semanals12->kacumPle / $semanals12->saldoavesPle;
          $semanals12->graveacPle = $totalgraveac12;
          $totalmortsem12 = $request->mortalidadPle12 / $semanals11->saldoavesPle;
          $semanals12->mortsemPle = $totalmortsem12;
          $totalmortacu12 = ($semanals->mortalidadPle + $semanals1->mortalidadPle + $semanals2->mortalidadPle + $semanals3->mortalidadPle + $semanals4->mortalidadPle + $semanals5->mortalidadPle + $semanals6->mortalidadPle + $semanals7->mortalidadPle + $semanals8->mortalidadPle + $semanals9->mortalidadPle + $semanals10->mortalidadPle + $semanals11->mortalidadPle + $request->mortalidadPle12) / $request->pollitasLot;
          $semanals12->mortacuPle = $totalmortacu12;
          $totalselsem12 = $request->seleccionPle12 / $semanals11->saldoavesPle;
          $semanals12->selsemPle = $totalselsem12;
          $semanals12->pesoPle = $request->pesoPle12;
          $totalgananciaavediar12 = $request->pesoPle12 - $semanals11->pesoPle;
          $semanals12->gananciaavediarPle = $totalgananciaavediar12;
          $semanals12->uniformidadPle = $request->uniformidadPle12;
          $semanals12->coeficientePle = $request->coeficientePle12;
          $semanals12->observacionesPle = $request->observacionesPle12;
          $semanals12->idLevante = $ponedoraslevantes->id;

          $totalmsacu12 = ($semanals->mortalidadPle + $semanals->seleccionPle + $semanals1->mortalidadPle + $semanals1->seleccionPle + $semanals2->mortalidadPle + $semanals2->seleccionPle + $semanals3->mortalidadPle + $semanals3->seleccionPle + $semanals4->mortalidadPle + $semanals4->seleccionPle + $semanals5->mortalidadPle + $semanals5->seleccionPle + $semanals6->mortalidadPle + $semanals6->seleccionPle + $semanals7->mortalidadPle + $semanals7->seleccionPle + $semanals8->mortalidadPle + $semanals8->seleccionPle + $semanals9->mortalidadPle + $semanals9->seleccionPle + $semanals10->mortalidadPle + $semanals10->seleccionPle + $semanals11->mortalidadPle + $semanals11->seleccionPle + $request->mortalidadPle12 + $request->seleccionPle12) / $request->pollitasLot;
          $semanals12->msacuPle = $totalmsacu12;
          foreach ($consulta13 as $Consulta13) {
            if ($semanals12->gananciaavediarPle != null && $Consulta13->gananciaaveriatGul != null) {
              $totalcumpgananave13 = ($semanals12->gananciaavediarPle / $Consulta13->gananciaaveriatGul) - 1;
              $semanals12->cumpgananavesemanaPle = $totalcumpgananave13;
            }
            if ($semanals12->avediarealPle != null && $Consulta13->avediatabGul != null) {
              $totalcumplconsgrad12 = ($semanals12->avediarealPle / $Consulta13->avediatabGul) - 1;
              $semanals12->cumplconsgradPle = $totalcumplconsgrad12;
            }
            if ($semanals12->pesoPle != null && $Consulta13->avediatabGul != null) {
              $totalcumplpeso12 = ($semanals12->pesoPle / $Consulta13->pesotabGul) - 1;
              $semanals12->cumplpesoPle = $totalcumplpeso12;
            }
            if ($semanals12->graveacPle != null && $Consulta13->graveactabGul != null) {
              $totalcumplconsumoacm12 = ($semanals12->graveacPle / $Consulta13->graveactabGul) - 1;
              $semanals12->cumplconsumoacmPle = $totalcumplconsumoacm12;
            }
          }
          if ($semanals12->graveacPle != $semanals11->graveacPle && $semanals12->pesoPle != $semanals11->pesoPle) {
            $totalconvsem12 = ($semanals12->graveacPle - $semanals11->graveacPle) / ($semanals12->pesoPle - $semanals11->pesoPle);
            $semanals12->convsemPle = $totalconvsem12;
          }


          $semanals12->save();
          $semanals13 = new PonedoraslevanteSemanal;
          $semanals13->semanaPle = 14;
          $semanals13->fdsPle = $request->fdsPle13;
          $semanals13->avesmuertasPle = $request->avesmuertasPle13;
          $semanals13->mortalidadPle = $request->mortalidadPle13;
          $semanals13->seleccionPle = $request->seleccionPle13;
          $semanals13->otrosPle = $request->otrosPle13;
          $totalacu13 = $request->mortalidadPle13 + $request->seleccionPle13 + $request->otrosPle13 + $semanals12->acuPle;
          $semanals13->acuPle = $totalacu13;
          $totalsaldoaves13 = $request->pollitasLot - $semanals13->acuPle;
          $semanals13->saldoavesPle = $totalsaldoaves13;
          $semanals13->alimentoPle = $request->alimentoPle13;
          $semanals13->consumoPle = $request->consumoPle13;
          $totalavediareal13 = $request->consumoPle13 / $semanals13->saldoavesPle / 7;
          $semanals13->avediarealPle = $totalavediareal13;
          $total13 = $request->consumoPle13 + $semanals12->kacumPle;
          $semanals13->kacumPle = $total13;
          $totalgraveac13 = $semanals13->kacumPle / $semanals13->saldoavesPle;
          $semanals13->graveacPle = $totalgraveac13;
          $totalmortsem13 = $request->mortalidadPle13 / $semanals12->saldoavesPle;
          $semanals13->mortsemPle = $totalmortsem13;
          $totalmortacu13 = ($semanals->mortalidadPle + $semanals1->mortalidadPle + $semanals2->mortalidadPle + $semanals3->mortalidadPle + $semanals4->mortalidadPle + $semanals5->mortalidadPle + $semanals6->mortalidadPle + $semanals7->mortalidadPle + $semanals8->mortalidadPle + $semanals9->mortalidadPle + $semanals10->mortalidadPle + $semanals11->mortalidadPle + $semanals12->mortalidadPle + $request->mortalidadPle13) / $request->pollitasLot;
          $semanals13->mortacuPle = $totalmortacu13;
          $totalselsem13 = $request->seleccionPle13 / $semanals12->saldoavesPle;
          $semanals13->selsemPle = $totalselsem13;
          $semanals13->pesoPle = $request->pesoPle13;
          $totalgananciaavediar13 = $request->pesoPle13 - $semanals12->pesoPle;
          $semanals13->gananciaavediarPle = $totalgananciaavediar13;
          $semanals13->uniformidadPle = $request->uniformidadPle13;
          $semanals13->coeficientePle = $request->coeficientePle13;
          $semanals13->observacionesPle = $request->observacionesPle13;
          $semanals13->idLevante = $ponedoraslevantes->id;

          $totalmsacu13 = ($semanals->mortalidadPle + $semanals->seleccionPle + $semanals1->mortalidadPle + $semanals1->seleccionPle + $semanals2->mortalidadPle + $semanals2->seleccionPle + $semanals3->mortalidadPle + $semanals3->seleccionPle + $semanals4->mortalidadPle + $semanals4->seleccionPle + $semanals5->mortalidadPle + $semanals5->seleccionPle + $semanals6->mortalidadPle + $semanals6->seleccionPle + $semanals7->mortalidadPle + $semanals7->seleccionPle + $semanals8->mortalidadPle + $semanals8->seleccionPle + $semanals9->mortalidadPle + $semanals9->seleccionPle + $semanals10->mortalidadPle + $semanals10->seleccionPle + $semanals11->mortalidadPle + $semanals11->seleccionPle + $semanals12->mortalidadPle + $semanals12->seleccionPle + $request->mortalidadPle13 + $request->seleccionPle13) / $request->pollitasLot;
          $semanals13->msacuPle = $totalmsacu13;
          foreach ($consulta14 as $Consulta14) {
            if ($semanals13->gananciaavediarPle != null && $Consulta14->gananciaaveriatGul != null) {
              $totalcumpgananave14 = ($semanals13->gananciaavediarPle / $Consulta14->gananciaaveriatGul) - 1;
              $semanals13->cumpgananavesemanaPle = $totalcumpgananave14;
            }
            if ($semanals13->avediarealPle != null && $Consulta14->avediatabGul != null) {
              $totalcumplconsgrad13 = ($semanals13->avediarealPle / $Consulta14->avediatabGul) - 1;
              $semanals13->cumplconsgradPle = $totalcumplconsgrad13;
            }
            if ($semanals13->pesoPle != null && $Consulta14->avediatabGul != null) {
              $totalcumplpeso13 = ($semanals13->pesoPle / $Consulta14->pesotabGul) - 1;
              $semanals13->cumplpesoPle = $totalcumplpeso13;
            }
            if ($semanals13->graveacPle != null && $Consulta14->graveactabGul != null) {
              $totalcumplconsumoacm13 = ($semanals13->graveacPle / $Consulta14->graveactabGul) - 1;
              $semanals13->cumplconsumoacmPle = $totalcumplconsumoacm13;
            }
          }
          if ($semanals13->graveacPle != $semanals12->graveacPle && $semanals13->pesoPle != $semanals12->pesoPle) {
            $totalconvsem13 = ($semanals13->graveacPle - $semanals12->graveacPle) / ($semanals13->pesoPle - $semanals12->pesoPle);
            $semanals13->convsemPle = $totalconvsem13;
          }

          $semanals13->save();
          $semanals14 = new PonedoraslevanteSemanal;
          $semanals14->semanaPle = 15;
          $semanals14->fdsPle = $request->fdsPle14;
          $semanals14->avesmuertasPle = $request->avesmuertasPle14;
          $semanals14->mortalidadPle = $request->mortalidadPle14;
          $semanals14->seleccionPle = $request->seleccionPle14;
          $semanals14->otrosPle = $request->otrosPle14;
          $totalacu14 = $request->mortalidadPle14 + $request->seleccionPle14 + $request->otrosPle14 + $semanals13->acuPle;
          $semanals14->acuPle = $totalacu14;
          $totalsaldoaves14 = $request->pollitasLot - $semanals14->acuPle;
          $semanals14->saldoavesPle = $totalsaldoaves14;
          $semanals14->alimentoPle = $request->alimentoPle14;
          $semanals14->consumoPle = $request->consumoPle14;
          $totalavediareal14 = $request->consumoPle14 / $semanals14->saldoavesPle / 7;
          $semanals14->avediarealPle = $totalavediareal14;
          $total14 = $request->consumoPle14 + $semanals13->kacumPle;
          $semanals14->kacumPle = $total14;
          $totalgraveac14 = $semanals14->kacumPle / $semanals14->saldoavesPle;
          $semanals14->graveacPle = $totalgraveac14;
          $totalmortsem14 = $request->mortalidadPle14 / $semanals13->saldoavesPle;
          $semanals14->mortsemPle = $totalmortsem14;
          $totalmortacu14 = ($semanals->mortalidadPle + $semanals1->mortalidadPle + $semanals2->mortalidadPle + $semanals3->mortalidadPle + $semanals4->mortalidadPle + $semanals5->mortalidadPle + $semanals6->mortalidadPle + $semanals7->mortalidadPle + $semanals8->mortalidadPle + $semanals9->mortalidadPle + $semanals10->mortalidadPle + $semanals11->mortalidadPle + $semanals12->mortalidadPle + $semanals13->mortalidadPle + $request->mortalidadPle14) / $request->pollitasLot;
          $semanals14->mortacuPle = $totalmortacu14;
          $totalselsem14 = $request->seleccionPle14 / $semanals13->saldoavesPle;
          $semanals14->selsemPle = $totalselsem14;
          $semanals14->pesoPle = $request->pesoPle14;
          $totalgananciaavediar14 = $request->pesoPle14 - $semanals13->pesoPle;
          $semanals14->gananciaavediarPle = $totalgananciaavediar14;
          $semanals14->uniformidadPle = $request->uniformidadPle14;
          $semanals14->coeficientePle = $request->coeficientePle14;
          $semanals14->observacionesPle = $request->observacionesPle14;
          $semanals14->idLevante = $ponedoraslevantes->id;

          $totalmsacu14 = ($semanals->mortalidadPle + $semanals->seleccionPle + $semanals1->mortalidadPle + $semanals1->seleccionPle + $semanals2->mortalidadPle + $semanals2->seleccionPle + $semanals3->mortalidadPle + $semanals3->seleccionPle + $semanals4->mortalidadPle + $semanals4->seleccionPle + $semanals5->mortalidadPle + $semanals5->seleccionPle + $semanals6->mortalidadPle + $semanals6->seleccionPle + $semanals7->mortalidadPle + $semanals7->seleccionPle + $semanals8->mortalidadPle + $semanals8->seleccionPle + $semanals9->mortalidadPle + $semanals9->seleccionPle + $semanals10->mortalidadPle + $semanals10->seleccionPle + $semanals11->mortalidadPle + $semanals11->seleccionPle + $semanals12->mortalidadPle + $semanals12->seleccionPle + $semanals13->mortalidadPle + $semanals13->seleccionPle + $request->mortalidadPle14 + $request->seleccionPle14) / $request->pollitasLot;
          $semanals14->msacuPle = $totalmsacu14;
          foreach ($consulta15 as $Consulta15) {
            if ($semanals14->gananciaavediarPle != null && $Consulta15->gananciaaveriatGul != null) {
              $totalcumpgananave15 = ($semanals14->gananciaavediarPle / $Consulta15->gananciaaveriatGul) - 1;
              $semanals14->cumpgananavesemanaPle = $totalcumpgananave15;
            }
            if ($semanals14->avediarealPle != null && $Consulta15->avediatabGul != null) {
              $totalcumplconsgrad14 = ($semanals14->avediarealPle / $Consulta15->avediatabGul) - 1;
              $semanals14->cumplconsgradPle = $totalcumplconsgrad14;
            }
            if ($semanals14->pesoPle != null && $Consulta15->avediatabGul != null) {
              $totalcumplpeso14 = ($semanals14->pesoPle / $Consulta15->pesotabGul) - 1;
              $semanals14->cumplpesoPle = $totalcumplpeso14;
            }
            if ($semanals14->graveacPle != null && $Consulta15->graveactabGul != null) {
              $totalcumplconsumoacm14 = ($semanals14->graveacPle / $Consulta15->graveactabGul) - 1;
              $semanals14->cumplconsumoacmPle = $totalcumplconsumoacm14;
            }
          }
          if ($semanals14->graveacPle != $semanals13->graveacPle && $semanals14->pesoPle != $semanals13->pesoPle) {
            $totalconvsem14 = ($semanals14->graveacPle - $semanals13->graveacPle) / ($semanals14->pesoPle - $semanals13->pesoPle);
            $semanals14->convsemPle = $totalconvsem14;
          }


          $semanals14->save();
          $semanals15 = new PonedoraslevanteSemanal;
          $semanals15->semanaPle = 16;
          $semanals15->fdsPle = $request->fdsPle15;
          $semanals15->avesmuertasPle = $request->avesmuertasPle15;
          $semanals15->mortalidadPle = $request->mortalidadPle15;
          $semanals15->seleccionPle = $request->seleccionPle15;
          $semanals15->otrosPle = $request->otrosPle15;
          $totalacu15 = $request->mortalidadPle15 + $request->seleccionPle15 + $request->otrosPle15 + $semanals14->acuPle;
          $semanals15->acuPle = $totalacu15;
          $totalsaldoaves15 = $request->pollitasLot - $semanals15->acuPle;
          $semanals15->saldoavesPle = $totalsaldoaves15;
          $semanals15->alimentoPle = $request->alimentoPle15;
          $semanals15->consumoPle = $request->consumoPle15;
          $totalavediareal15 = $request->consumoPle15 / $semanals15->saldoavesPle / 7;
          $semanals15->avediarealPle = $totalavediareal15;
          $total15 = $request->consumoPle15 + $semanals14->kacumPle;
          $semanals15->kacumPle = $total15;
          $totalgraveac15 = $semanals15->kacumPle / $semanals15->saldoavesPle;
          $semanals15->graveacPle = $totalgraveac15;
          $totalmortsem15 = $request->mortalidadPle15 / $semanals14->saldoavesPle;
          $semanals15->mortsemPle = $totalmortsem15;
          $totalmortacu15 = ($semanals->mortalidadPle + $semanals1->mortalidadPle + $semanals2->mortalidadPle + $semanals3->mortalidadPle + $semanals4->mortalidadPle + $semanals5->mortalidadPle + $semanals6->mortalidadPle + $semanals7->mortalidadPle + $semanals8->mortalidadPle + $semanals9->mortalidadPle + $semanals10->mortalidadPle + $semanals11->mortalidadPle + $semanals12->mortalidadPle + $semanals13->mortalidadPle + $semanals14->mortalidadPle + $request->mortalidadPle15) / $request->pollitasLot;
          $semanals15->mortacuPle = $totalmortacu15;
          $totalselsem15 = $request->seleccionPle15 / $semanals14->saldoavesPle;
          $semanals15->selsemPle = $totalselsem15;
          $semanals15->pesoPle = $request->pesoPle15;
          $totalgananciaavediar15 = $request->pesoPle15 - $semanals14->pesoPle;
          $semanals15->gananciaavediarPle = $totalgananciaavediar15;
          $semanals15->uniformidadPle = $request->uniformidadPle15;
          $semanals15->coeficientePle = $request->coeficientePle15;
          $semanals15->observacionesPle = $request->observacionesPle15;
          $semanals15->idLevante = $ponedoraslevantes->id;

          $totalmsacu15 = ($semanals->mortalidadPle + $semanals->seleccionPle + $semanals1->mortalidadPle + $semanals1->seleccionPle + $semanals2->mortalidadPle + $semanals2->seleccionPle + $semanals3->mortalidadPle + $semanals3->seleccionPle + $semanals4->mortalidadPle + $semanals4->seleccionPle + $semanals5->mortalidadPle + $semanals5->seleccionPle + $semanals6->mortalidadPle + $semanals6->seleccionPle + $semanals7->mortalidadPle + $semanals7->seleccionPle + $semanals8->mortalidadPle + $semanals8->seleccionPle + $semanals9->mortalidadPle + $semanals9->seleccionPle + $semanals10->mortalidadPle + $semanals10->seleccionPle + $semanals11->mortalidadPle + $semanals11->seleccionPle + $semanals12->mortalidadPle + $semanals12->seleccionPle + $semanals13->mortalidadPle + $semanals13->seleccionPle + $semanals14->mortalidadPle + $semanals14->seleccionPle + $request->mortalidadPle15 + $request->seleccionPle15) / $request->pollitasLot;
          $semanals15->msacuPle = $totalmsacu15;
          foreach ($consulta16 as $Consulta16) {
            if ($semanals15->gananciaavediarPle != null && $Consulta16->gananciaaveriatGul != null) {
              $totalcumpgananave16 = ($semanals15->gananciaavediarPle / $Consulta16->gananciaaveriatGul) - 1;
              $semanals15->cumpgananavesemanaPle = $totalcumpgananave16;
            }
            if ($semanals15->avediarealPle != null && $Consulta16->avediatabGul != null) {
              $totalcumplconsgrad15 = ($semanals15->avediarealPle / $Consulta16->avediatabGul) - 1;
              $semanals15->cumplconsgradPle = $totalcumplconsgrad15;
            }
            if ($semanals15->pesoPle != null && $Consulta16->avediatabGul != null) {
              $totalcumplpeso15 = ($semanals15->pesoPle / $Consulta16->pesotabGul) - 1;
              $semanals15->cumplpesoPle = $totalcumplpeso15;
            }
            if ($semanals15->graveacPle != null && $Consulta16->graveactabGul != null) {
              $totalcumplconsumoacm15 = ($semanals15->graveacPle / $Consulta16->graveactabGul) - 1;
              $semanals15->cumplconsumoacmPle = $totalcumplconsumoacm15;
            }
          }
          if ($semanals15->graveacPle != $semanals14->graveacPle && $semanals15->pesoPle != $semanals14->pesoPle) {
            $totalconvsem15 = ($semanals15->graveacPle - $semanals14->graveacPle) / ($semanals15->pesoPle - $semanals14->pesoPle);
            $semanals15->convsemPle = $totalconvsem15;
          }

          $semanals15->save();
          $semanals16 = new PonedoraslevanteSemanal;
          $semanals16->semanaPle = 17;
          $semanals16->fdsPle = $request->fdsPle16;
          $semanals16->avesmuertasPle = $request->avesmuertasPle16;
          $semanals16->mortalidadPle = $request->mortalidadPle16;
          $semanals16->seleccionPle = $request->seleccionPle16;
          $semanals16->otrosPle = $request->otrosPle16;
          $totalacu16 = $request->mortalidadPle16 + $request->seleccionPle16 + $request->otrosPle16 + $semanals15->acuPle;
          $semanals16->acuPle = $totalacu16;
          $totalsaldoaves16 = $request->pollitasLot - $semanals16->acuPle;
          $semanals16->saldoavesPle = $totalsaldoaves16;
          $semanals16->alimentoPle = $request->alimentoPle16;
          $semanals16->consumoPle = $request->consumoPle16;
          $totalavediareal16 = $request->consumoPle16 / $semanals16->saldoavesPle / 7;
          $semanals16->avediarealPle = $totalavediareal16;
          $total16 = $request->consumoPle16 + $semanals15->kacumPle;
          $semanals16->kacumPle = $total16;
          $totalgraveac16 = $semanals16->kacumPle / $semanals16->saldoavesPle;
          $semanals16->graveacPle = $totalgraveac16;
          $totalmortsem16 = $request->mortalidadPle16 / $semanals15->saldoavesPle;
          $semanals16->mortsemPle = $totalmortsem16;
          $totalmortacu16 = ($semanals->mortalidadPle + $semanals1->mortalidadPle + $semanals2->mortalidadPle + $semanals3->mortalidadPle + $semanals4->mortalidadPle + $semanals5->mortalidadPle + $semanals6->mortalidadPle + $semanals7->mortalidadPle + $semanals8->mortalidadPle + $semanals9->mortalidadPle + $semanals10->mortalidadPle + $semanals11->mortalidadPle + $semanals12->mortalidadPle + $semanals13->mortalidadPle + $semanals14->mortalidadPle + $semanals15->mortalidadPle + $request->mortalidadPle16) / $request->pollitasLot;
          $semanals16->mortacuPle = $totalmortacu16;
          $totalselsem16 = $request->seleccionPle16 / $semanals15->saldoavesPle;
          $semanals16->selsemPle = $totalselsem16;
          $semanals16->pesoPle = $request->pesoPle16;
          $totalgananciaavediar16 = $request->pesoPle16 - $semanals15->pesoPle;
          $semanals16->gananciaavediarPle = $totalgananciaavediar16;
          $semanals16->uniformidadPle = $request->uniformidadPle16;
          $semanals16->coeficientePle = $request->coeficientePle16;
          $semanals16->observacionesPle = $request->observacionesPle16;
          $semanals16->idLevante = $ponedoraslevantes->id;

          $totalmsacu16 = ($semanals->mortalidadPle + $semanals->seleccionPle + $semanals1->mortalidadPle + $semanals1->seleccionPle + $semanals2->mortalidadPle + $semanals2->seleccionPle + $semanals3->mortalidadPle + $semanals3->seleccionPle + $semanals4->mortalidadPle + $semanals4->seleccionPle + $semanals5->mortalidadPle + $semanals5->seleccionPle + $semanals6->mortalidadPle + $semanals6->seleccionPle + $semanals7->mortalidadPle + $semanals7->seleccionPle + $semanals8->mortalidadPle + $semanals8->seleccionPle + $semanals9->mortalidadPle + $semanals9->seleccionPle + $semanals10->mortalidadPle + $semanals10->seleccionPle + $semanals11->mortalidadPle + $semanals11->seleccionPle + $semanals12->mortalidadPle + $semanals12->seleccionPle + $semanals13->mortalidadPle + $semanals13->seleccionPle + $semanals14->mortalidadPle + $semanals14->seleccionPle + $semanals15->mortalidadPle + $semanals15->seleccionPle + $request->mortalidadPle16 + $request->seleccionPle16) / $request->pollitasLot;
          $semanals16->msacuPle = $totalmsacu16;
          foreach ($consulta17 as $Consulta17) {
            if ($semanals16->gananciaavediarPle != null && $Consulta16->gananciaaveriatGul != null) {
              $totalcumpgananave17 = ($semanals16->gananciaavediarPle / $Consulta16->gananciaaveriatGul) - 1;
              $semanals16->cumpgananavesemanaPle = $totalcumpgananave17;
            }
            if ($semanals16->avediarealPle != null && $Consulta17->avediatabGul != null) {
              $totalcumplconsgrad16 = ($semanals16->avediarealPle / $Consulta17->avediatabGul) - 1;
              $semanals16->cumplconsgradPle = $totalcumplconsgrad16;
            }
            if ($semanals16->pesoPle != null && $Consulta17->avediatabGul != null) {
              $totalcumplpeso16 = ($semanals16->pesoPle / $Consulta17->pesotabGul) - 1;
              $semanals16->cumplpesoPle = $totalcumplpeso16;
            }
            if ($semanals16->graveacPle != null && $Consulta17->graveactabGul != null) {
              $totalcumplconsumoacm16 = ($semanals16->graveacPle / $Consulta17->graveactabGul) - 1;
              $semanals16->cumplconsumoacmPle = $totalcumplconsumoacm16;
            }
          }
          if ($semanals16->graveacPle != $semanals15->graveacPle && $semanals16->pesoPle != $semanals15->pesoPle) {
            $totalconvsem16 = ($semanals16->graveacPle - $semanals15->graveacPle) / ($semanals16->pesoPle - $semanals15->pesoPle);
            $semanals16->convsemPle = $totalconvsem16;
          }

          $semanals16->save();

           return redirect('ponedoraslevantes');
        }

        if ($busqueda == 2 && $request->nombreLot != null) {
          echo  '<script languaje="Javascript"> alert("Este Lote o Sublote ya fue registrado anteriormente"); history.back(); </script>';
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
         $ponedoraslevantes = Ponedoraslevante::find($id);
//dd($ponedoraslevantes);
        $lotes = Ponedoraslevante::select('sublotes.nombreSub' , 'sublot.nombreLot' , 'lotes.nombreLot', 'lotes.pollitasLot', 'lotes.encasetamientoLot', 'sublot.pollitasLot as polsub', 'sublot.encasetamientoLot as encsub', 'sublot.nombreLot as nomlot', 'granjas.nombreGra', 'granjas.alturaGra' , 'municipios.nombreMun' , 'departamentos.nombreDep' , 'pais.nombrePai', 'climas.nombreCli', 'empresas.nombreEmp', 'zonas.nombreZon', 'variedads.nombreVar', 'sistemaexplotacions.nombreSis',          'grasub.nombreGra as nomgra', 'grasub.alturaGra as altgra' , 'munsub.nombreMun as nommun' , 'depsub.nombreDep as nomdep' , 'paisub.nombrePai as nompai', 'clisub.nombreCli as nomcli', 'empsub.nombreEmp as nomemp', 'zonsub.nombreZon as nomzon', 'varsub.nombreVar as nomvar', 'sissub.nombreSis as nomsis', 'guias.nombreGui' , 'ponedoraslevantes.*')
                                              ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                              ->leftjoin('sublotes' , 'sublotes.id' , '=' , 'ponedoraslevantes.idSublote')
                                              ->leftjoin('lotes as sublot', 'sublot.id' ,  '=' , 'sublotes.idLote')
                                              ->leftjoin('variedads' , 'variedads.id' , '=' , 'lotes.idVariedad')
                                              ->leftjoin('granjas' , 'granjas.id' , '=' , 'lotes.idGranja')
                                              ->leftjoin('sistemaexplotacions' , 'sistemaexplotacions.id' , '=' , 'lotes.idSistema')
                                              ->leftjoin('municipios' , 'municipios.id' , '=' , 'granjas.idMunicipio')
                                              ->leftjoin('departamentos' , 'departamentos.id' , '=' , 'municipios.idDepartamento')
                                              ->leftjoin('pais' , 'pais.id' , '=' , 'departamentos.idPais')
                                              ->leftjoin('climas' , 'climas.id' , '=' , 'granjas.idClima')
                                              ->leftjoin('empresas' , 'empresas.id' , '=' , 'granjas.idEmpresa')
                                              ->leftjoin('zonas' , 'zonas.id' , '=' , 'granjas.idZona')
                                              ->leftjoin('variedads as varsub' , 'varsub.id' , '=' , 'sublot.idVariedad')
                                              ->leftjoin('granjas as grasub' , 'grasub.id' , '=' , 'sublot.idGranja')
                                              ->leftjoin('sistemaexplotacions as sissub' , 'sissub.id' , '=' , 'sublot.idSistema')
                                              ->leftjoin('municipios as munsub' , 'munsub.id' , '=' , 'grasub.idMunicipio')
                                              ->leftjoin('departamentos as depsub' , 'depsub.id' , '=' , 'munsub.idDepartamento')
                                              ->leftjoin('pais as paisub' , 'paisub.id' , '=' , 'depsub.idPais')
                                              ->leftjoin('climas as clisub' , 'clisub.id' , '=' , 'grasub.idClima')
                                              ->leftjoin('empresas as empsub' , 'empsub.id' , '=' , 'grasub.idEmpresa')
                                              ->leftjoin('zonas as zonsub' , 'zonsub.id' , '=' , 'grasub.idZona')
                                              ->join('guias' , 'guias.id' , '=' , 'ponedoraslevantes.idGuia')
                                              ->where('ponedoraslevantes.id','=',$id)
                                              ->get();


        $ponedoraslevantesguia =  Ponedoraslevante::select('ponedoraslevantes.*', 'guias.nombreGui')
                                                  ->join('guias' , 'guias.id' , '=' , 'ponedoraslevantes.idGuia')
                                                  ->where('ponedoraslevantes.id' , '=' , $id)
                                                  ->get();

        $guia = Guia::select('nombreGui', 'id')
                      ->where('moduloGui', '=', 'Ponedoras Levante')
                      ->get();

         $semanallevantes1 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.idLote', '=' , $ponedoraslevantes->idLote)
                                    ->where('semanaPle' , '=' , 1)
                                    ->where('ponedoraslevantes.id','=',$id)
                                    ->get();
         $semanallevantes2 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.idLote', '=' , $ponedoraslevantes->idLote)
                                    ->where('semanaPle' , '=' , 2)
                                    ->where('ponedoraslevantes.id','=',$id)
                                    ->get();
         $semanallevantes3 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.idLote', '=' , $ponedoraslevantes->idLote)
                                    ->where('semanaPle' , '=' , 3)
                                    ->where('ponedoraslevantes.id','=',$id)
                                    ->get();
        $semanallevantes4 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.idLote', '=' , $ponedoraslevantes->idLote)
                                    ->where('semanaPle' , '=' , 4)
                                    ->where('ponedoraslevantes.id','=',$id)
                                    ->get();
        $semanallevantes5 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.idLote', '=' , $ponedoraslevantes->idLote)
                                    ->where('semanaPle' , '=' , 5)
                                    ->where('ponedoraslevantes.id','=',$id)
                                    ->get();
        $semanallevantes6 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.idLote', '=' , $ponedoraslevantes->idLote)
                                    ->where('semanaPle' , '=' , 6)
                                    ->where('ponedoraslevantes.id','=',$id)
                                    ->get();
        $semanallevantes7 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.idLote', '=' , $ponedoraslevantes->idLote)
                                    ->where('semanaPle' , '=' , 7)
                                    ->where('ponedoraslevantes.id','=',$id)
                                    ->get();
        $semanallevantes8 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.idLote', '=' , $ponedoraslevantes->idLote)
                                    ->where('semanaPle' , '=' , 8)
                                    ->where('ponedoraslevantes.id','=',$id)
                                    ->get();
        $semanallevantes9 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.idLote', '=' , $ponedoraslevantes->idLote)
                                    ->where('semanaPle' , '=' , 9)
                                    ->where('ponedoraslevantes.id','=',$id)
                                    ->get();
        $semanallevantes10 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.idLote', '=' , $ponedoraslevantes->idLote)
                                    ->where('semanaPle' , '=' , 10)
                                    ->where('ponedoraslevantes.id','=',$id)
                                    ->get();
        $semanallevantes11 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.idLote', '=' , $ponedoraslevantes->idLote)
                                    ->where('semanaPle' , '=' , 11)
                                    ->where('ponedoraslevantes.id','=',$id)
                                    ->get();
        $semanallevantes12 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.idLote', '=' , $ponedoraslevantes->idLote)
                                    ->where('semanaPle' , '=' , 12)
                                    ->where('ponedoraslevantes.id','=',$id)
                                    ->get();
        $semanallevantes13 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.idLote', '=' , $ponedoraslevantes->idLote)
                                    ->where('semanaPle' , '=' , 13)
                                    ->where('ponedoraslevantes.id','=',$id)
                                    ->get();
        $semanallevantes14 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.idLote', '=' , $ponedoraslevantes->idLote)
                                    ->where('semanaPle' , '=' , 14)
                                    ->where('ponedoraslevantes.id','=',$id)
                                    ->get();
        $semanallevantes15 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.idLote', '=' , $ponedoraslevantes->idLote)
                                    ->where('semanaPle' , '=' , 15)
                                    ->where('ponedoraslevantes.id','=',$id)
                                    ->get();
        $semanallevantes16 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.idLote', '=' , $ponedoraslevantes->idLote)
                                    ->where('semanaPle' , '=' , 16)
                                    ->where('ponedoraslevantes.id','=',$id)
                                    ->get();
        $semanallevantes17 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.idLote', '=' , $ponedoraslevantes->idLote)
                                    ->where('semanaPle' , '=' , 17)
                                    ->where('ponedoraslevantes.id','=',$id)
                                    ->get();


        return view('Avicol/PonedorasLevante/update', compact('ponedoraslevantes', 'semanallevantes1', 'semanallevantes2', 'semanallevantes3', 'semanallevantes4' , 'semanallevantes5', 'semanallevantes6', 'semanallevantes7', 'semanallevantes8', 'semanallevantes9', 'semanallevantes10', 'semanallevantes11', 'semanallevantes12' , 'semanallevantes13' , 'semanallevantes14' , 'semanallevantes15', 'semanallevantes16', 'semanallevantes17', 'lotes','encasetamientoLot','ponedoraslevantesguia','guia'));
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
        $semanallevantes1 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*' , 'ponedoraslevantes.programaPle', 'ponedoraslevantes.fotoPle', 'ponedoraslevantes.despiquePle', 'ponedoraslevantes.trasladoPle', 'ponedoraslevantes.inicioluzPle', 'ponedoraslevantes.finluzPle')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.id', '=' , $id)
                                    ->where('semanaPle' , '=' , 1)
                                    ->get();
        $semanallevantes2 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*' , 'ponedoraslevantes.programaPle', 'ponedoraslevantes.fotoPle', 'ponedoraslevantes.despiquePle', 'ponedoraslevantes.trasladoPle', 'ponedoraslevantes.inicioluzPle', 'ponedoraslevantes.finluzPle')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.id', '=' , $id)
                                    ->where('semanaPle' , '=' , 2)
                                    ->get();
        $semanallevantes3 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*' , 'ponedoraslevantes.programaPle', 'ponedoraslevantes.fotoPle', 'ponedoraslevantes.despiquePle', 'ponedoraslevantes.trasladoPle', 'ponedoraslevantes.inicioluzPle', 'ponedoraslevantes.finluzPle')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.id', '=' , $id)
                                    ->where('semanaPle' , '=' , 3)
                                    ->get();
        $semanallevantes4 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*' , 'ponedoraslevantes.programaPle', 'ponedoraslevantes.fotoPle', 'ponedoraslevantes.despiquePle', 'ponedoraslevantes.trasladoPle', 'ponedoraslevantes.inicioluzPle', 'ponedoraslevantes.finluzPle')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.id', '=' , $id)
                                    ->where('semanaPle' , '=' , 4)
                                    ->get();
        $semanallevantes5 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*' , 'ponedoraslevantes.programaPle', 'ponedoraslevantes.fotoPle', 'ponedoraslevantes.despiquePle', 'ponedoraslevantes.trasladoPle', 'ponedoraslevantes.inicioluzPle', 'ponedoraslevantes.finluzPle')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.id', '=' , $id)
                                    ->where('semanaPle' , '=' , 5)
                                    ->get();
        $semanallevantes6 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*' , 'ponedoraslevantes.programaPle', 'ponedoraslevantes.fotoPle', 'ponedoraslevantes.despiquePle', 'ponedoraslevantes.trasladoPle', 'ponedoraslevantes.inicioluzPle', 'ponedoraslevantes.finluzPle')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.id', '=' , $id)
                                    ->where('semanaPle' , '=' , 6)
                                    ->get();
        $semanallevantes7 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*' , 'ponedoraslevantes.programaPle', 'ponedoraslevantes.fotoPle', 'ponedoraslevantes.despiquePle', 'ponedoraslevantes.trasladoPle', 'ponedoraslevantes.inicioluzPle', 'ponedoraslevantes.finluzPle')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.id', '=' , $id)
                                    ->where('semanaPle' , '=' , 7)
                                    ->get();
        $semanallevantes8 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*' , 'ponedoraslevantes.programaPle', 'ponedoraslevantes.fotoPle', 'ponedoraslevantes.despiquePle', 'ponedoraslevantes.trasladoPle', 'ponedoraslevantes.inicioluzPle', 'ponedoraslevantes.finluzPle')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.id', '=' , $id)
                                    ->where('semanaPle' , '=' , 8)
                                    ->get();
        $semanallevantes9 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*' , 'ponedoraslevantes.programaPle', 'ponedoraslevantes.fotoPle', 'ponedoraslevantes.despiquePle', 'ponedoraslevantes.trasladoPle', 'ponedoraslevantes.inicioluzPle', 'ponedoraslevantes.finluzPle')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.id', '=' , $id)
                                    ->where('semanaPle' , '=' , 9)
                                    ->get();
        $semanallevantes10 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*' , 'ponedoraslevantes.programaPle', 'ponedoraslevantes.fotoPle', 'ponedoraslevantes.despiquePle', 'ponedoraslevantes.trasladoPle', 'ponedoraslevantes.inicioluzPle', 'ponedoraslevantes.finluzPle')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.id', '=' , $id)
                                    ->where('semanaPle' , '=' , 10)
                                    ->get();
        $semanallevantes11 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*' , 'ponedoraslevantes.programaPle', 'ponedoraslevantes.fotoPle', 'ponedoraslevantes.despiquePle', 'ponedoraslevantes.trasladoPle', 'ponedoraslevantes.inicioluzPle', 'ponedoraslevantes.finluzPle')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.id', '=' , $id)
                                    ->where('semanaPle' , '=' , 11)
                                    ->get();
        $semanallevantes12 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*' , 'ponedoraslevantes.programaPle', 'ponedoraslevantes.fotoPle', 'ponedoraslevantes.despiquePle', 'ponedoraslevantes.trasladoPle', 'ponedoraslevantes.inicioluzPle', 'ponedoraslevantes.finluzPle')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.id', '=' , $id)
                                    ->where('semanaPle' , '=' , 12)
                                    ->get();
        $semanallevantes13 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*' , 'ponedoraslevantes.programaPle', 'ponedoraslevantes.fotoPle', 'ponedoraslevantes.despiquePle', 'ponedoraslevantes.trasladoPle', 'ponedoraslevantes.inicioluzPle', 'ponedoraslevantes.finluzPle')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.id', '=' , $id)
                                    ->where('semanaPle' , '=' , 13)
                                    ->get();
        $semanallevantes14 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*' , 'ponedoraslevantes.programaPle', 'ponedoraslevantes.fotoPle', 'ponedoraslevantes.despiquePle', 'ponedoraslevantes.trasladoPle', 'ponedoraslevantes.inicioluzPle', 'ponedoraslevantes.finluzPle')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.id', '=' , $id)
                                    ->where('semanaPle' , '=' , 14)
                                    ->get();
        $semanallevantes15 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*' , 'ponedoraslevantes.programaPle', 'ponedoraslevantes.fotoPle', 'ponedoraslevantes.despiquePle', 'ponedoraslevantes.trasladoPle', 'ponedoraslevantes.inicioluzPle', 'ponedoraslevantes.finluzPle')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.id', '=' , $id)
                                    ->where('semanaPle' , '=' , 15)
                                    ->get();
        $semanallevantes16 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*' , 'ponedoraslevantes.programaPle', 'ponedoraslevantes.fotoPle', 'ponedoraslevantes.despiquePle', 'ponedoraslevantes.trasladoPle', 'ponedoraslevantes.inicioluzPle', 'ponedoraslevantes.finluzPle')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.id', '=' , $id)
                                    ->where('semanaPle' , '=' , 16)
                                    ->get();
        $semanallevantes17 =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*' , 'ponedoraslevantes.programaPle', 'ponedoraslevantes.fotoPle', 'ponedoraslevantes.despiquePle', 'ponedoraslevantes.trasladoPle', 'ponedoraslevantes.inicioluzPle', 'ponedoraslevantes.finluzPle')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                    ->where('ponedoraslevantes.id', '=' , $id)
                                    ->where('semanaPle' , '=' , 17)
                                    ->get();

        $lotes =  Ponedoraslevante::select('ponedoraslevantes.*')->where('ponedoraslevantes.id', '=' , $id)->get();

        $consulta1 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 1)
                          ->get();
        $consulta2 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 2)
                          ->get();
        $consulta3 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 3)
                          ->get();
        $consulta4 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 4)
                          ->get();
        $consulta5 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 5)
                          ->get();
        $consulta6 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 6)
                          ->get();
        $consulta7 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 7)
                          ->get();
        $consulta8 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 8)
                          ->get();
        $consulta9 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 9)
                          ->get();
        $consulta10 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 10)
                          ->get();
        $consulta11 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 11)
                          ->get();
        $consulta12 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 12)
                          ->get();
        $consulta13 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 13)
                          ->get();
        $consulta14 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 14)
                          ->get();
        $consulta15 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 15)
                          ->get();
        $consulta16 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 16)
                          ->get();
        $consulta17 = Guia::select('guialevanteponedoras.*','guias.*')
                          ->join('guialevanteponedoras', 'guialevanteponedoras.idGuia','=', 'guias.id')
                          ->where('guias.id', '=', $request->idGuia)
                          ->where('semanaGul', '=', 17)
                          ->get();


        foreach ($lotes as $Lote) {
            $programano = $request->programaPle;
            $iniciodescenso = $request->inicioluzPle;

        if ($programano == 'No') {

            $Lote->programaPle  = $request->programaPle;
            $Lote->fotoPle  = $request->fotoPle;
            $Lote->despiquePle  = $request->despiquePle;
            $Lote->trasladoPle  = $request->trasladoPle;
            $Lote->idGuia = $request->idGuia;
            $Lote->save();
        }
        if ($iniciodescenso != Null) {

            $Lote->programaPle  = 'Si';
            $Lote->fotoPle  = $request->fotoPle;
            $Lote->despiquePle  = $request->despiquePle;
            $Lote->trasladoPle  = $request->trasladoPle;
            $Lote->inicioluzPle = $request->inicioluzPle;
            $Lote->finluzPle = $request->finluzPle;
            $Lote->idGuia = $request->idGuia;
            $Lote->save();
        }
        if ($iniciodescenso == Null) {

            $Lote->fotoPle  = $request->fotoPle;
            $Lote->despiquePle  = $request->despiquePle;
            $Lote->trasladoPle  = $request->trasladoPle;
            $Lote->idGuia = $request->idGuia;
            $Lote->save();
        }
        }

        foreach ($semanallevantes1 as $semanallevante1) {
            $semanallevante1->fdsPle = $request->fdsPle;
            $semanallevante1->avesmuertasPle = $request->avesmuertasPle;
            $semanallevante1->mortalidadPle = $request->mortalidadPle;
            $semanallevante1->seleccionPle = $request->seleccionPle;
            $semanallevante1->otrosPle = $request->otrosPle;
            $totalacu = $request->mortalidadPle + $request->seleccionPle + $request->otrosPle;
            $semanallevante1->acuPle = $totalacu;
            $totalsaldoaves1 = $request->pollitasLot - $semanallevante1->acuPle;
            $semanallevante1->saldoavesPle = $totalsaldoaves1;
            $semanallevante1->alimentoPle = $request->alimentoPle;
            $semanallevante1->consumoPle = $request->consumoPle;
            $totalavediareal = $request->consumoPle / $semanallevante1->saldoavesPle / 7;
            $semanallevante1->avediarealPle = $totalavediareal;
            $semanallevante1->kacumPle = $request->consumoPle;
            $totalgraveac1 = $semanallevante1->kacumPle / $semanallevante1->saldoavesPle;
            $semanallevante1->graveacPle = $totalgraveac1;
            $totalmortsem = $request->mortalidadPle / $request->pollitasLot;
            $semanallevante1->mortsemPle = $totalmortsem;
            $totalmortacu = $request->mortalidadPle / $request->pollitasLot;
            $semanallevante1->mortacuPle = $totalmortacu;
            $totalselsem1 = $request->seleccionPle / $request->pollitasLot;
            $semanallevante1->selsemPle = $totalselsem1;
            $semanallevante1->pesoPle = $request->pesoPle;
            $semanallevante1->uniformidadPle = $request->uniformidadPle;
            $semanallevante1->coeficientePle = $request->coeficientePle;
            $semanallevante1->observacionesPle = $request->observacionesPle;

            $totalmsacu1 = ($request->mortalidadPle + $request->seleccionPle) / $request->pollitasLot;
            $semanallevante1->msacuPle = $totalmsacu1;
            foreach ($consulta1 as $Consulta1) {
              if ($semanallevante1->avediarealPle != null && $Consulta1->avediatabGul != null) {
                $totalcumplconsgrad1 = ($semanallevante1->avediarealPle / $Consulta1->avediatabGul) - 1;
                $semanallevante1->cumplconsgradPle = $totalcumplconsgrad1;
              }
              if ($semanallevante1->pesoPle != null && $Consulta1->avediatabGul != null) {
                $totalcumplpeso1 = ($semanallevante1->pesoPle / $Consulta1->pesotabGul) - 1;
                $semanallevante1->cumplpesoPle = $totalcumplpeso1;
              }
              if ($semanallevante1->graveacPle != null && $Consulta1->graveactabGul != null) {
                $totalcumplconsumoacm1 = ($semanallevante1->graveacPle / $Consulta1->graveactabGul) - 1;
                $semanallevante1->cumplconsumoacmPle = $totalcumplconsumoacm1;
              }
            }

            $semanallevante1->save();
        }

        foreach ($semanallevantes2 as $semanallevante2) {
            $semanallevante2->fdsPle = $request->fdsPle1;
            $semanallevante2->avesmuertasPle = $request->avesmuertasPle1;
            $semanallevante2->mortalidadPle = $request->mortalidadPle1;
            $semanallevante2->seleccionPle = $request->seleccionPle1;
            $semanallevante2->otrosPle = $request->otrosPle1;
            $totalacu1 = $request->mortalidadPle1 + $request->seleccionPle1 + $request->otrosPle1 + $semanallevante1->acuPle;
            $semanallevante2->acuPle = $totalacu1;
            $totalsaldoaves2 = $request->pollitasLot - $semanallevante2->acuPle;
            $semanallevante2->saldoavesPle = $totalsaldoaves2;
            $semanallevante2->alimentoPle = $request->alimentoPle1;
            $semanallevante2->consumoPle = $request->consumoPle1;
            $totalavediareal1 = $request->consumoPle1 / $semanallevante2->saldoavesPle / 7;
            $semanallevante2->avediarealPle = $totalavediareal1;
            $total2 = $request->consumoPle1 + $semanallevante1->kacumPle;
            $semanallevante2->kacumPle = $total2;
            $totalgraveac2 = $semanallevante2->kacumPle / $semanallevante2->saldoavesPle;
            $semanallevante2->graveacPle = $totalgraveac2;
            $totalmortsem2 = $request->mortalidadPle1 / $semanallevante1->saldoavesPle;
            $semanallevante2->mortsemPle = $totalmortsem2;
            $totalmortacu2 = ($semanallevante1->mortalidadPle + $request->mortalidadPle1) / $request->pollitasLot;
            $semanallevante2->mortacuPle = $totalmortacu2;
            $totalselsem2 = $request->seleccionPle1 / $semanallevante1->saldoavesPle;
            $semanallevante2->selsemPle = $totalselsem2;
            $semanallevante2->pesoPle = $request->pesoPle1;
            $totalgananciaavediar2 = $request->pesoPle1 - $semanallevante1->pesoPle;
            $semanallevante2->gananciaavediarPle = $totalgananciaavediar2;
            $semanallevante2->uniformidadPle = $request->uniformidadPle1;
            $semanallevante2->coeficientePle = $request->coeficientePle1;
            $semanallevante2->observacionesPle = $request->observacionesPle1;

            $totalmsacu2 = ($semanallevante1->mortalidadPle + $semanallevante1->seleccionPle + $request->mortalidadPle1 + $request->seleccionPle1) / $request->pollitasLot;
            $semanallevante2->msacuPle = $totalmsacu2;
            foreach ($consulta2 as $Consulta2) {
              if ($semanallevante2->gananciaavediarPle != null && $Consulta2->gananciaaveriatGul != null) {
                $totalcumpgananave = ($semanallevante2->gananciaavediarPle / $Consulta2->gananciaaveriatGul) - 1;
                $semanallevante2->cumpgananavesemanaPle = $totalcumpgananave;
              }
              if ($semanallevante2->avediarealPle != null && $Consulta2->avediatabGul != null) {
                $totalcumplconsgrad2 = ($semanallevante2->avediarealPle / $Consulta2->avediatabGul) - 1;
                $semanallevante2->cumplconsgradPle = $totalcumplconsgrad2;
              }
              if ($semanallevante2->pesoPle != null && $Consulta2->avediatabGul != null) {
                $totalcumplpeso2 = ($semanallevante2->pesoPle / $Consulta2->pesotabGul) - 1;
                $semanallevante2->cumplpesoPle = $totalcumplpeso2;
              }
              if ($semanallevante2->graveacPle != null && $Consulta2->graveactabGul != null) {
                $totalcumplconsumoacm2 = ($semanallevante2->graveacPle / $Consulta2->graveactabGul) - 1;
                $semanallevante2->cumplconsumoacmPle = $totalcumplconsumoacm2;
              }
            }
            if ($semanallevante2->graveacPle != $semanallevante1->graveacPle && $semanallevante2->pesoPle != $semanallevante1->pesoPle) {
              $totalconvsem2 = ($semanallevante2->graveacPle - $semanallevante1->graveacPle) / ($semanallevante2->pesoPle - $semanallevante1->pesoPle);
              $semanallevante2->convsemPle = $totalconvsem2;
            }

            $semanallevante2->save();
        }

        foreach ($semanallevantes3 as $semanallevante3) {
            $semanallevante3->fdsPle = $request->fdsPle2;
            $semanallevante3->avesmuertasPle = $request->avesmuertasPle2;
            $semanallevante3->mortalidadPle = $request->mortalidadPle2;
            $semanallevante3->seleccionPle = $request->seleccionPle2;
            $semanallevante3->otrosPle = $request->otrosPle2;
            $totalacu2 = $request->mortalidadPle2 + $request->seleccionPle2 + $request->otrosPle2 + $semanallevante2->acuPle;
            $semanallevante3->acuPle = $totalacu2;
            $totalsaldoaves3 = $request->pollitasLot - $semanallevante3->acuPle;
            $semanallevante3->saldoavesPle = $totalsaldoaves3;
            $semanallevante3->alimentoPle = $request->alimentoPle2;
            $semanallevante3->consumoPle = $request->consumoPle2;
            $totalavediareal2 = $request->consumoPle2 / $semanallevante3->saldoavesPle / 7;
            $semanallevante3->avediarealPle = $totalavediareal2;
            $total3 = $request->consumoPle2 + $semanallevante2->kacumPle;
            $semanallevante3->kacumPle = $total3;
            $totalgraveac3 = $semanallevante3->kacumPle / $semanallevante3->saldoavesPle;
            $semanallevante3->graveacPle = $totalgraveac3;
            $totalmortsem3 = $request->mortalidadPle2 / $semanallevante2->saldoavesPle;
            $semanallevante3->mortsemPle = $totalmortsem3;
            $totalmortacu3 = ($semanallevante1->mortalidadPle + $semanallevante2->mortalidadPle + $request->mortalidadPle2) / $request->pollitasLot;
            $semanallevante3->mortacuPle = $totalmortacu3;
            $totalselsem3 = $request->seleccionPle2 / $semanallevante2->saldoavesPle;
            $semanallevante3->selsemPle = $totalselsem3;
            $semanallevante3->pesoPle = $request->pesoPle2;
            $totalgananciaavediar3 = $request->pesoPle2 - $semanallevante2->pesoPle;
            $semanallevante3->gananciaavediarPle = $totalgananciaavediar3;
            $semanallevante3->uniformidadPle = $request->uniformidadPle2;
            $semanallevante3->coeficientePle = $request->coeficientePle2;
            $semanallevante3->observacionesPle = $request->observacionesPle2;

            $totalmsacu3 = ($semanallevante1->mortalidadPle + $semanallevante1->seleccionPle + $semanallevante2->mortalidadPle + $semanallevante2->seleccionPle + $request->mortalidadPle2 + $request->seleccionPle2) / $request->pollitasLot;
            $semanallevante3->msacuPle = $totalmsacu3;
            foreach ($consulta3 as $Consulta3) {
              if ($semanallevante3->gananciaavediarPle != null && $Consulta3->gananciaaveriatGul != null) {
                $totalcumpgananave3 = ($semanallevante3->gananciaavediarPle / $Consulta3->gananciaaveriatGul) - 1;
                $semanallevante3->cumpgananavesemanaPle = $totalcumpgananave3;
              }
              if ($semanallevante3->avediarealPle != null && $Consulta3->avediatabGul != null) {
                $totalcumplconsgrad3 = ($semanallevante3->avediarealPle / $Consulta3->avediatabGul) - 1;
                $semanallevante3->cumplconsgradPle = $totalcumplconsgrad3;
              }
              if ($semanallevante3->pesoPle != null && $Consulta3->avediatabGul != null) {
                $totalcumplpeso3 = ($semanallevante3->pesoPle / $Consulta3->pesotabGul) - 1;
                $semanallevante3->cumplpesoPle = $totalcumplpeso3;
              }
              if ($semanallevante3->graveacPle != null && $Consulta3->graveactabGul != null) {
                $totalcumplconsumoacm3 = ($semanallevante3->graveacPle / $Consulta3->graveactabGul) - 1;
                $semanallevante3->cumplconsumoacmPle = $totalcumplconsumoacm3;
              }
            }
            if ($semanallevante3->graveacPle !== $semanallevante2->graveacPle && $semanallevante3->pesoPle != $semanallevante2->pesoPle) {
              $totalconvsem3 = ($semanallevante3->graveacPle - $semanallevante2->graveacPle) / ($semanallevante3->pesoPle - $semanallevante2->pesoPle);
              $semanallevante3->convsemPle = $totalconvsem3;
            }

            $semanallevante3->save();
        }

        foreach ($semanallevantes4 as $semanallevante4) {
            $semanallevante4->fdsPle = $request->fdsPle3;
            $semanallevante4->avesmuertasPle = $request->avesmuertasPle3;
            $semanallevante4->mortalidadPle = $request->mortalidadPle3;
            $semanallevante4->seleccionPle = $request->seleccionPle3;
            $semanallevante4->otrosPle = $request->otrosPle3;
            $totalacu3 = $request->mortalidadPle3 + $request->seleccionPle3 + $request->otrosPle3 + $semanallevante3->acuPle;
            $semanallevante4->acuPle = $totalacu3;
            $totalsaldoaves4 = $request->pollitasLot - $semanallevante4->acuPle;
            $semanallevante4->saldoavesPle = $totalsaldoaves4;
            $semanallevante4->alimentoPle = $request->alimentoPle3;
            $semanallevante4->consumoPle = $request->consumoPle3;
            $totalavediareal3 = $request->consumoPle3 / $semanallevante4->saldoavesPle / 7;
            $semanallevante4->avediarealPle = $totalavediareal3;
            $total4 = $request->consumoPle3 + $semanallevante3->kacumPle;
            $semanallevante4->kacumPle = $total4;
            $totalgraveac4 = $semanallevante4->kacumPle / $semanallevante4->saldoavesPle;
            $semanallevante4->graveacPle = $totalgraveac4;
            $totalmortsem4 = $request->mortalidadPle3 / $semanallevante3->saldoavesPle;
            $semanallevante4->mortsemPle = $totalmortsem4;
            $totalmortacu4 = ($semanallevante1->mortalidadPle + $semanallevante2->mortalidadPle + $semanallevante3->mortalidadPle + $request->mortalidadPle3) / $request->pollitasLot;
            $semanallevante4->mortacuPle = $totalmortacu4;
            $totalselsem4 = $request->seleccionPle3 / $semanallevante3->saldoavesPle;
            $semanallevante4->selsemPle = $totalselsem4;
            $semanallevante4->pesoPle = $request->pesoPle3;
            $totalgananciaavediar4 = $request->pesoPle3 - $semanallevante3->pesoPle;
            $semanallevante4->gananciaavediarPle = $totalgananciaavediar4;
            $semanallevante4->uniformidadPle = $request->uniformidadPle3;
            $semanallevante4->coeficientePle = $request->coeficientePle3;
            $semanallevante4->observacionesPle = $request->observacionesPle3;

            $totalmsacu4 = ($semanallevante1->mortalidadPle + $semanallevante1->seleccionPle + $semanallevante2->mortalidadPle + $semanallevante2->seleccionPle + $semanallevante3->mortalidadPle + $semanallevante3->seleccionPle + $request->mortalidadPle3 + $request->seleccionPle3) / $request->pollitasLot;
            $semanallevante4->msacuPle = $totalmsacu4;
            foreach ($consulta4 as $Consulta4) {
              if ($semanallevante4->gananciaavediarPle != null && $Consulta4->gananciaaveriatGul != null) {
                $totalcumpgananave4 = ($semanallevante4->gananciaavediarPle / $Consulta4->gananciaaveriatGul) - 1;
                $semanallevante4->cumpgananavesemanaPle = $totalcumpgananave4;
              }
              if ($semanallevante4->avediarealPle != null && $Consulta4->avediatabGul != null) {
                $totalcumplconsgrad4 = ($semanallevante4->avediarealPle / $Consulta4->avediatabGul) - 1;
                $semanallevante4->cumplconsgradPle = $totalcumplconsgrad4;
              }
              if ($semanallevante4->pesoPle != null && $Consulta4->avediatabGul != null) {
                $totalcumplpeso4 = ($semanallevante4->pesoPle / $Consulta4->pesotabGul) - 1;
                $semanallevante4->cumplpesoPle = $totalcumplpeso4;
              }
              if ($semanallevante4->graveacPle != null && $Consulta4->graveactabGul != null) {
                $totalcumplconsumoacm4 = ($semanallevante4->graveacPle / $Consulta4->graveactabGul) - 1;
                $semanallevante4->cumplconsumoacmPle = $totalcumplconsumoacm4;
              }
            }
            if ($semanallevante4->graveacPle != $semanallevante3->graveacPle && $semanallevante4->pesoPle != $semanallevante3->pesoPle) {
              $totalconvsem4 = ($semanallevante4->graveacPle - $semanallevante3->graveacPle) / ($semanallevante4->pesoPle - $semanallevante3->pesoPle);
              $semanallevante4->convsemPle = $totalconvsem4;
            }

            $semanallevante4->save();
        }
        foreach ($semanallevantes5 as $semanallevante5) {
            $semanallevante5->fdsPle = $request->fdsPle4;
            $semanallevante5->avesmuertasPle = $request->avesmuertasPle4;
            $semanallevante5->mortalidadPle = $request->mortalidadPle4;
            $semanallevante5->seleccionPle = $request->seleccionPle4;
            $semanallevante5->otrosPle = $request->otrosPle4;
            $totalacu4 = $request->mortalidadPle4 + $request->seleccionPle4 + $request->otrosPle4 + $semanallevante4->acuPle;
            $semanallevante5->acuPle = $totalacu4;
            $totalsaldoaves5 = $request->pollitasLot - $semanallevante5->acuPle;
            $semanallevante5->saldoavesPle = $totalsaldoaves5;
            $semanallevante5->alimentoPle = $request->alimentoPle4;
            $semanallevante5->consumoPle = $request->consumoPle4;
            $totalavediareal4 = $request->consumoPle4 / $semanallevante5->saldoavesPle / 7;
            $semanallevante5->avediarealPle = $totalavediareal4;
            $total5 = $request->consumoPle4 + $semanallevante4->kacumPle;
            $semanallevante5->kacumPle = $total5;
            $totalgraveac5 = $semanallevante5->kacumPle / $semanallevante5->saldoavesPle;
            $semanallevante5->graveacPle = $totalgraveac5;
            $totalmortsem5 = $request->mortalidadPle4 / $semanallevante4->saldoavesPle;
            $semanallevante5->mortsemPle = $totalmortsem5;
            $totalmortacu5 = ($semanallevante1->mortalidadPle + $semanallevante2->mortalidadPle + $semanallevante3->mortalidadPle + $semanallevante4->mortalidadPle + $request->mortalidadPle4) / $request->pollitasLot;
            $semanallevante5->mortacuPle = $totalmortacu5;
            $totalselsem5 = $request->seleccionPle4 / $semanallevante4->saldoavesPle;
            $semanallevante5->selsemPle = $totalselsem5;
            $semanallevante5->pesoPle = $request->pesoPle4;
            $totalgananciaavediar5 = $request->pesoPle4 - $semanallevante4->pesoPle;
            $semanallevante5->gananciaavediarPle = $totalgananciaavediar5;
            $semanallevante5->uniformidadPle = $request->uniformidadPle4;
            $semanallevante5->coeficientePle = $request->coeficientePle4;
            $semanallevante5->observacionesPle = $request->observacionesPle4;

            $totalmsacu5 = ($semanallevante1->mortalidadPle + $semanallevante1->seleccionPle + $semanallevante2->mortalidadPle + $semanallevante2->seleccionPle + $semanallevante3->mortalidadPle + $semanallevante3->seleccionPle + $semanallevante4->mortalidadPle + $semanallevante4->seleccionPle + $request->mortalidadPle4 + $request->seleccionPle4) / $request->pollitasLot;
            $semanallevante5->msacuPle = $totalmsacu5;
            foreach ($consulta5 as $Consulta5) {
              if ($semanallevante5->gananciaavediarPle != null && $Consulta5->gananciaaveriatGul != null) {
                $totalcumpgananave5 = ($semanallevante5->gananciaavediarPle / $Consulta5->gananciaaveriatGul) - 1;
                $semanallevante5->cumpgananavesemanaPle = $totalcumpgananave5;
              }
              if ($semanallevante5->avediarealPle != null && $Consulta5->avediatabGul != null) {
                $totalcumplconsgrad5 = ($semanallevante5->avediarealPle / $Consulta5->avediatabGul) - 1;
                $semanallevante5->cumplconsgradPle = $totalcumplconsgrad5;
              }
              if ($semanallevante5->pesoPle != null && $Consulta5->avediatabGul != null) {
                $totalcumplpeso5 = ($semanallevante5->pesoPle / $Consulta5->pesotabGul) - 1;
                $semanallevante5->cumplpesoPle = $totalcumplpeso5;
              }
              if ($semanallevante5->graveacPle != null && $Consulta5->graveactabGul != null) {
                $totalcumplconsumoacm5 = ($semanallevante5->graveacPle / $Consulta5->graveactabGul) - 1;
                $semanallevante5->cumplconsumoacmPle = $totalcumplconsumoacm5;
              }
            }
            if ($semanallevante5->graveacPle != $semanallevante4->graveacPle && $semanallevante5->pesoPle != $semanallevante4->pesoPle) {
              $totalconvsem5 = ($semanallevante5->graveacPle - $semanallevante4->graveacPle) / ($semanallevante5->pesoPle - $semanallevante4->pesoPle);
              $semanallevante5->convsemPle = $totalconvsem5;
            }

            $semanallevante5->save();
        }
        foreach ($semanallevantes6 as $semanallevante6) {
            $semanallevante6->fdsPle = $request->fdsPle5;
            $semanallevante6->avesmuertasPle = $request->avesmuertasPle5;
            $semanallevante6->mortalidadPle = $request->mortalidadPle5;
            $semanallevante6->seleccionPle = $request->seleccionPle5;
            $semanallevante6->otrosPle = $request->otrosPle5;
            $totalacu5 = $request->mortalidadPle5 + $request->seleccionPle5 + $request->otrosPle5 + $semanallevante5->acuPle;
            $semanallevante6->acuPle = $totalacu5;
            $totalsaldoaves6 = $request->pollitasLot - $semanallevante6->acuPle;
            $semanallevante6->saldoavesPle = $totalsaldoaves6;
            $semanallevante6->alimentoPle = $request->alimentoPle5;
            $semanallevante6->consumoPle = $request->consumoPle5;
            $totalavediareal5 = $request->consumoPle5 / $semanallevante6->saldoavesPle / 7;
            $semanallevante6->avediarealPle = $totalavediareal5;
            $total6 = $request->consumoPle5 + $semanallevante5->kacumPle;
            $semanallevante6->kacumPle = $total6;
            $totalgraveac6 = $semanallevante6->kacumPle / $semanallevante6->saldoavesPle;
            $semanallevante6->graveacPle = $totalgraveac6;
            $totalmortsem6 = $request->mortalidadPle5 / $semanallevante5->saldoavesPle;
            $semanallevante6->mortsemPle = $totalmortsem6;
            $totalmortacu6 = ($semanallevante1->mortalidadPle + $semanallevante2->mortalidadPle + $semanallevante3->mortalidadPle + $semanallevante4->mortalidadPle + $semanallevante5->mortalidadPle + $request->mortalidadPle5) / $request->pollitasLot;
            $semanallevante6->mortacuPle = $totalmortacu6;
            $totalselsem6 = $request->seleccionPle5 / $semanallevante5->saldoavesPle;
            $semanallevante6->selsemPle = $totalselsem6;
            $semanallevante6->pesoPle = $request->pesoPle5;
            $totalgananciaavediar6 = $request->pesoPle5 - $semanallevante5->pesoPle;
            $semanallevante6->gananciaavediarPle = $totalgananciaavediar6;
            $semanallevante6->uniformidadPle = $request->uniformidadPle5;
            $semanallevante6->coeficientePle = $request->coeficientePle5;
            $semanallevante6->observacionesPle = $request->observacionesPle5;

            $totalmsacu6 = ($semanallevante1->mortalidadPle + $semanallevante1->seleccionPle + $semanallevante2->mortalidadPle + $semanallevante2->seleccionPle + $semanallevante3->mortalidadPle + $semanallevante3->seleccionPle + $semanallevante4->mortalidadPle + $semanallevante4->seleccionPle + $semanallevante5->mortalidadPle + $semanallevante5->seleccionPle + $request->mortalidadPle5 + $request->seleccionPle5) / $request->pollitasLot;
            $semanallevante6->msacuPle = $totalmsacu6;
            foreach ($consulta6 as $Consulta6) {
              if ($semanallevante6->gananciaavediarPle != null && $Consulta6->gananciaaveriatGul != null) {
                $totalcumpgananave6 = ($semanallevante6->gananciaavediarPle / $Consulta6->gananciaaveriatGul) - 1;
                $semanallevante6->cumpgananavesemanaPle = $totalcumpgananave6;
              }
              if ($semanallevante6->avediarealPle != null && $Consulta6->avediatabGul != null) {
                $totalcumplconsgrad6 = ($semanallevante6->avediarealPle / $Consulta6->avediatabGul) - 1;
                $semanallevante6->cumplconsgradPle = $totalcumplconsgrad6;
              }
              if ($semanallevante6->pesoPle != null && $Consulta6->avediatabGul != null) {
                $totalcumplpeso6 = ($semanallevante6->pesoPle / $Consulta6->pesotabGul) - 1;
                $semanallevante6->cumplpesoPle = $totalcumplpeso6;
              }
              if ($semanallevante6->graveacPle != null && $Consulta6->graveactabGul != null) {
                $totalcumplconsumoacm6 = ($semanallevante6->graveacPle / $Consulta6->graveactabGul) - 1;
                $semanallevante6->cumplconsumoacmPle = $totalcumplconsumoacm6;
              }
            }
            if ($semanallevante6->graveacPle != $semanallevante5->graveacPle && $semanallevante6->pesoPle != $semanallevante5->pesoPle) {
              $totalconvsem6 = ($semanallevante6->graveacPle - $semanallevante5->graveacPle) / ($semanallevante6->pesoPle - $semanallevante5->pesoPle);
              $semanallevante6->convsemPle = $totalconvsem6;
            }

            $semanallevante6->save();
        }
        foreach ($semanallevantes7 as $semanallevante7) {
            $semanallevante7->fdsPle = $request->fdsPle6;
            $semanallevante7->avesmuertasPle = $request->avesmuertasPle6;
            $semanallevante7->mortalidadPle = $request->mortalidadPle6;
            $semanallevante7->seleccionPle = $request->seleccionPle6;
            $semanallevante7->otrosPle = $request->otrosPle6;
            $totalacu6 = $request->mortalidadPle6 + $request->seleccionPle6 + $request->otrosPle6 + $semanallevante6->acuPle;
            $semanallevante7->acuPle = $totalacu6;
            $totalsaldoaves7 = $request->pollitasLot - $semanallevante7->acuPle;
            $semanallevante7->saldoavesPle = $totalsaldoaves7;
            $semanallevante7->alimentoPle = $request->alimentoPle6;
            $semanallevante7->consumoPle = $request->consumoPle6;
            $totalavediareal6 = $request->consumoPle6 / $semanallevante7->saldoavesPle / 7;
            $semanallevante7->avediarealPle = $totalavediareal6;
            $total7 = $request->consumoPle6 + $semanallevante6->kacumPle;
            $semanallevante7->kacumPle = $total7;
            $totalgraveac7 = $semanallevante7->kacumPle / $semanallevante7->saldoavesPle;
            $semanallevante7->graveacPle = $totalgraveac7;
            $totalmortsem7 = $request->mortalidadPle6 / $semanallevante6->saldoavesPle;
            $semanallevante7->mortsemPle = $totalmortsem7;
            $totalmortacu7 = ($semanallevante1->mortalidadPle + $semanallevante2->mortalidadPle + $semanallevante3->mortalidadPle + $semanallevante4->mortalidadPle + $semanallevante5->mortalidadPle + $semanallevante6->mortalidadPle + $request->mortalidadPle6) / $request->pollitasLot;
            $semanallevante7->mortacuPle = $totalmortacu7;
            $totalselsem7 = $request->seleccionPle6 / $semanallevante6->saldoavesPle;
            $semanallevante7->selsemPle = $totalselsem7;
            $semanallevante7->pesoPle = $request->pesoPle6;
            $totalgananciaavediar7 = $request->pesoPle6 - $semanallevante6->pesoPle;
            $semanallevante7->gananciaavediarPle = $totalgananciaavediar7;
            $semanallevante7->uniformidadPle = $request->uniformidadPle6;
            $semanallevante7->coeficientePle = $request->coeficientePle6;
            $semanallevante7->observacionesPle = $request->observacionesPle6;

            $totalmsacu7 = ($semanallevante1->mortalidadPle + $semanallevante1->seleccionPle + $semanallevante2->mortalidadPle + $semanallevante2->seleccionPle + $semanallevante3->mortalidadPle + $semanallevante3->seleccionPle + $semanallevante4->mortalidadPle + $semanallevante4->seleccionPle + $semanallevante5->mortalidadPle + $semanallevante5->seleccionPle + $semanallevante6->mortalidadPle + $semanallevante6->seleccionPle + $request->mortalidadPle6 + $request->seleccionPle6) / $request->pollitasLot;
            $semanallevante7->msacuPle = $totalmsacu7;
            foreach ($consulta7 as $Consulta7) {
              if ($semanallevante7->gananciaavediarPle != null && $Consulta7->gananciaaveriatGul != null) {
                $totalcumpgananave7 = ($semanallevante7->gananciaavediarPle / $Consulta7->gananciaaveriatGul) - 1;
                $semanallevante7->cumpgananavesemanaPle = $totalcumpgananave7;
              }
              if ($semanallevante7->avediarealPle != null && $Consulta7->avediatabGul != null) {
                $totalcumplconsgrad7 = ($semanallevante7->avediarealPle / $Consulta7->avediatabGul) - 1;
                $semanallevante7->cumplconsgradPle = $totalcumplconsgrad7;
              }
              if ($semanallevante7->pesoPle != null && $Consulta7->avediatabGul != null) {
                $totalcumplpeso7 = ($semanallevante7->pesoPle / $Consulta7->pesotabGul) - 1;
                $semanallevante7->cumplpesoPle = $totalcumplpeso7;
              }
              if ($semanallevante7->graveacPle != null && $Consulta7->graveactabGul != null) {
                $totalcumplconsumoacm7 = ($semanallevante7->graveacPle / $Consulta7->graveactabGul) - 1;
                $semanallevante7->cumplconsumoacmPle = $totalcumplconsumoacm7;
              }
            }
            if ($semanallevante7->graveacPle != $semanallevante6->graveacPle && $semanallevante7->pesoPle != $semanallevante6->pesoPle) {
              $totalconvsem7 = ($semanallevante7->graveacPle - $semanallevante6->graveacPle) / ($semanallevante7->pesoPle - $semanallevante6->pesoPle);
              $semanallevante7->convsemPle = $totalconvsem7;
            }

            $semanallevante7->save();
        }
        foreach ($semanallevantes8 as $semanallevante8) {
            $semanallevante8->fdsPle = $request->fdsPle7;
            $semanallevante8->avesmuertasPle = $request->avesmuertasPle7;
            $semanallevante8->mortalidadPle = $request->mortalidadPle7;
            $semanallevante8->seleccionPle = $request->seleccionPle7;
            $semanallevante8->otrosPle = $request->otrosPle7;
            $totalacu7 = $request->mortalidadPle7 + $request->seleccionPle7 + $request->otrosPle7 + $semanallevante7->acuPle;
            $semanallevante8->acuPle = $totalacu7;
            $totalsaldoaves8 = $request->pollitasLot - $semanallevante8->acuPle;
            $semanallevante8->saldoavesPle = $totalsaldoaves8;
            $semanallevante8->alimentoPle = $request->alimentoPle7;
            $semanallevante8->consumoPle = $request->consumoPle7;
            $totalavediareal7 = $request->consumoPle7 / $semanallevante8->saldoavesPle / 7;
            $semanallevante8->avediarealPle = $totalavediareal7;
            $total8 = $request->consumoPle7 + $semanallevante7->kacumPle;
            $semanallevante8->kacumPle = $total8;
            $totalgraveac8 = $semanallevante8->kacumPle / $semanallevante8->saldoavesPle;
            $semanallevante8->graveacPle = $totalgraveac8;
            $totalmortsem8 = $request->mortalidadPle7 / $semanallevante7->saldoavesPle;
            $semanallevante8->mortsemPle = $totalmortsem8;
            $totalmortacu8 = ($semanallevante1->mortalidadPle + $semanallevante2->mortalidadPle + $semanallevante3->mortalidadPle + $semanallevante4->mortalidadPle + $semanallevante5->mortalidadPle + $semanallevante6->mortalidadPle + $semanallevante7->mortalidadPle + $request->mortalidadPle7) / $request->pollitasLot;
            $semanallevante8->mortacuPle = $totalmortacu8;
            $totalselsem8 = $request->seleccionPle7 / $semanallevante7->saldoavesPle;
            $semanallevante8->selsemPle = $totalselsem8;
            $semanallevante8->pesoPle = $request->pesoPle7;
            $totalgananciaavediar8 = $request->pesoPle7 - $semanallevante7->pesoPle;
            $semanallevante8->gananciaavediarPle = $totalgananciaavediar8;
            $semanallevante8->uniformidadPle = $request->uniformidadPle7;
            $semanallevante8->coeficientePle = $request->coeficientePle7;
            $semanallevante8->observacionesPle = $request->observacionesPle7;

            $totalmsacu8 = ($semanallevante1->mortalidadPle + $semanallevante1->seleccionPle + $semanallevante2->mortalidadPle + $semanallevante2->seleccionPle + $semanallevante3->mortalidadPle + $semanallevante3->seleccionPle + $semanallevante4->mortalidadPle + $semanallevante4->seleccionPle + $semanallevante5->mortalidadPle + $semanallevante5->seleccionPle + $semanallevante6->mortalidadPle + $semanallevante6->seleccionPle + $semanallevante7->mortalidadPle + $semanallevante7->seleccionPle + $request->mortalidadPle7 + $request->seleccionPle7) / $request->pollitasLot;
            $semanallevante8->msacuPle = $totalmsacu8;
            foreach ($consulta8 as $Consulta8) {
              if ($semanallevante8->gananciaavediarPle != null && $Consulta8->gananciaaveriatGul != null) {
                $totalcumpgananave8 = ($semanallevante8->gananciaavediarPle / $Consulta8->gananciaaveriatGul) - 1;
                $semanallevante8->cumpgananavesemanaPle = $totalcumpgananave8;
              }
              if ($semanallevante8->avediarealPle != null && $Consulta8->avediatabGul != null) {
                $totalcumplconsgrad8 = ($semanallevante8->avediarealPle / $Consulta8->avediatabGul) - 1;
                $semanallevante8->cumplconsgradPle = $totalcumplconsgrad8;
              }
              if ($semanallevante8->pesoPle != null && $Consulta8->avediatabGul != null) {
                $totalcumplpeso8 = ($semanallevante8->pesoPle / $Consulta8->pesotabGul) - 1;
                $semanallevante8->cumplpesoPle = $totalcumplpeso8;
              }
              if ($semanallevante8->graveacPle != null && $Consulta8->graveactabGul != null) {
                $totalcumplconsumoacm8 = ($semanallevante8->graveacPle / $Consulta8->graveactabGul) - 1;
                $semanallevante8->cumplconsumoacmPle = $totalcumplconsumoacm8;
              }
            }
            if ($semanallevante8->graveacPle != $semanallevante7->graveacPle && $semanallevante8->pesoPle != $semanallevante7->pesoPle) {
              $totalconvsem8 = ($semanallevante8->graveacPle - $semanallevante7->graveacPle) / ($semanallevante8->pesoPle - $semanallevante7->pesoPle);
              $semanallevante8->convsemPle = $totalconvsem8;
            }

            $semanallevante8->save();
        }
        foreach ($semanallevantes9 as $semanallevante9) {
            $semanallevante9->fdsPle = $request->fdsPle8;
            $semanallevante9->avesmuertasPle = $request->avesmuertasPle8;
            $semanallevante9->mortalidadPle = $request->mortalidadPle8;
            $semanallevante9->seleccionPle = $request->seleccionPle8;
            $semanallevante9->otrosPle = $request->otrosPle8;
            $totalacu8 = $request->mortalidadPle8 + $request->seleccionPle8 + $request->otrosPle8 + $semanallevante8->acuPle;
            $semanallevante9->acuPle = $totalacu8;
            $totalsaldoaves9 = $request->pollitasLot - $semanallevante9->acuPle;
            $semanallevante9->saldoavesPle = $totalsaldoaves9;
            $semanallevante9->alimentoPle = $request->alimentoPle8;
            $semanallevante9->consumoPle = $request->consumoPle8;
            $totalavediareal8 = $request->consumoPle8 / $semanallevante9->saldoavesPle / 7;
            $semanallevante9->avediarealPle = $totalavediareal8;
            $total9 = $request->consumoPle8 + $semanallevante8->kacumPle;
            $semanallevante9->kacumPle = $total9;
            $totalgraveac9 = $semanallevante9->kacumPle / $semanallevante9->saldoavesPle;
            $semanallevante9->graveacPle = $totalgraveac9;
            $totalmortsem9 = $request->mortalidadPle8 / $semanallevante8->saldoavesPle;
            $semanallevante9->mortsemPle = $totalmortsem9;
            $totalmortacu9 = ($semanallevante1->mortalidadPle + $semanallevante2->mortalidadPle + $semanallevante3->mortalidadPle + $semanallevante4->mortalidadPle + $semanallevante5->mortalidadPle + $semanallevante6->mortalidadPle + $semanallevante7->mortalidadPle + $semanallevante8->mortalidadPle + $request->mortalidadPle8) / $request->pollitasLot;
            $semanallevante9->mortacuPle = $totalmortacu9;
            $totalselsem9 = $request->seleccionPle8 / $semanallevante8->saldoavesPle;
            $semanallevante9->selsemPle = $totalselsem9;
            $semanallevante9->pesoPle = $request->pesoPle8;
            $totalgananciaavediar9 = $request->pesoPle8 - $semanallevante8->pesoPle;
            $semanallevante9->gananciaavediarPle = $totalgananciaavediar9;
            $semanallevante9->uniformidadPle = $request->uniformidadPle8;
            $semanallevante9->coeficientePle = $request->coeficientePle8;
            $semanallevante9->observacionesPle = $request->observacionesPle8;

            $totalmsacu9 = ($semanallevante1->mortalidadPle + $semanallevante1->seleccionPle + $semanallevante2->mortalidadPle + $semanallevante2->seleccionPle + $semanallevante3->mortalidadPle + $semanallevante3->seleccionPle + $semanallevante4->mortalidadPle + $semanallevante4->seleccionPle + $semanallevante5->mortalidadPle + $semanallevante5->seleccionPle + $semanallevante6->mortalidadPle + $semanallevante6->seleccionPle + $semanallevante7->mortalidadPle + $semanallevante7->seleccionPle + $semanallevante8->mortalidadPle + $semanallevante8->seleccionPle + $request->mortalidadPle8 + $request->seleccionPle8) / $request->pollitasLot;
            $semanallevante9->msacuPle = $totalmsacu9;
            foreach ($consulta9 as $Consulta9) {
              if ($semanallevante9->gananciaavediarPle != null && $Consulta9->gananciaaveriatGul != null) {
                $totalcumpgananave9 = ($semanallevante9->gananciaavediarPle / $Consulta9->gananciaaveriatGul) - 1;
                $semanallevante9->cumpgananavesemanaPle = $totalcumpgananave9;
              }
              if ($semanallevante9->avediarealPle != null && $Consulta9->avediatabGul != null) {
                $totalcumplconsgrad9 = ($semanallevante9->avediarealPle / $Consulta9->avediatabGul) - 1;
                $semanallevante9->cumplconsgradPle = $totalcumplconsgrad9;
              }
              if ($semanallevante9->pesoPle != null && $Consulta9->avediatabGul != null) {
                $totalcumplpeso9 = ($semanallevante9->pesoPle / $Consulta9->pesotabGul) - 1;
                $semanallevante9->cumplpesoPle = $totalcumplpeso9;
              }
              if ($semanallevante9->graveacPle != null && $Consulta9->graveactabGul != null) {
                $totalcumplconsumoacm9 = ($semanallevante9->graveacPle / $Consulta9->graveactabGul) - 1;
                $semanallevante9->cumplconsumoacmPle = $totalcumplconsumoacm9;
              }
            }
            if ($semanallevante9->graveacPle != $semanallevante8->graveacPle && $semanallevante9->pesoPle != $semanallevante8->pesoPle) {
              $totalconvsem9 = ($semanallevante9->graveacPle - $semanallevante8->graveacPle) / ($semanallevante9->pesoPle - $semanallevante8->pesoPle);
              $semanallevante9->convsemPle = $totalconvsem9;
            }

            $semanallevante9->save();
        }
        foreach ($semanallevantes10 as $semanallevante10) {
            $semanallevante10->fdsPle = $request->fdsPle9;
            $semanallevante10->avesmuertasPle = $request->avesmuertasPle9;
            $semanallevante10->mortalidadPle = $request->mortalidadPle9;
            $semanallevante10->seleccionPle = $request->seleccionPle9;
            $semanallevante10->otrosPle = $request->otrosPle9;
            $totalacu9 = $request->mortalidadPle9 + $request->seleccionPle9 + $request->otrosPle9 + $semanallevante9->acuPle;
            $semanallevante10->acuPle = $totalacu9;
            $totalsaldoaves10 = $request->pollitasLot - $semanallevante10->acuPle;
            $semanallevante10->saldoavesPle = $totalsaldoaves10;
            $semanallevante10->alimentoPle = $request->alimentoPle9;
            $semanallevante10->consumoPle = $request->consumoPle9;
            $totalavediareal9 = $request->consumoPle9 / $semanallevante10->saldoavesPle / 7;
            $semanallevante10->avediarealPle = $totalavediareal9;
            $total10 = $request->consumoPle9 + $semanallevante9->kacumPle;
            $semanallevante10->kacumPle = $total10;
            $totalgraveac10 = $semanallevante10->kacumPle / $semanallevante10->saldoavesPle;
            $semanallevante10->graveacPle = $totalgraveac10;
            $totalmortsem10 = $request->mortalidadPle9 / $semanallevante9->saldoavesPle;
            $semanallevante10->mortsemPle = $totalmortsem10;
            $totalmortacu10 = ($semanallevante1->mortalidadPle + $semanallevante2->mortalidadPle + $semanallevante3->mortalidadPle + $semanallevante4->mortalidadPle + $semanallevante5->mortalidadPle + $semanallevante6->mortalidadPle + $semanallevante7->mortalidadPle + $semanallevante8->mortalidadPle + $semanallevante9->mortalidadPle + $request->mortalidadPle9) / $request->pollitasLot;
            $semanallevante10->mortacuPle = $totalmortacu10;
            $totalselsem10 = $request->seleccionPle9 / $semanallevante9->saldoavesPle;
            $semanallevante10->selsemPle = $totalselsem10;
            $semanallevante10->pesoPle = $request->pesoPle9;
            $totalgananciaavediar10 = $request->pesoPle9 - $semanallevante9->pesoPle;
            $semanallevante10->gananciaavediarPle = $totalgananciaavediar10;
            $semanallevante10->uniformidadPle = $request->uniformidadPle9;
            $semanallevante10->coeficientePle = $request->coeficientePle9;
            $semanallevante10->observacionesPle = $request->observacionesPle9;

            $totalmsacu10 = ($semanallevante1->mortalidadPle + $semanallevante1->seleccionPle + $semanallevante2->mortalidadPle + $semanallevante2->seleccionPle + $semanallevante3->mortalidadPle + $semanallevante3->seleccionPle + $semanallevante4->mortalidadPle + $semanallevante4->seleccionPle + $semanallevante5->mortalidadPle + $semanallevante5->seleccionPle + $semanallevante6->mortalidadPle + $semanallevante6->seleccionPle + $semanallevante7->mortalidadPle + $semanallevante7->seleccionPle + $semanallevante8->mortalidadPle + $semanallevante8->seleccionPle + $semanallevante9->mortalidadPle + $semanallevante9->seleccionPle + $request->mortalidadPle9 + $request->seleccionPle9) / $request->pollitasLot;
            $semanallevante10->msacuPle = $totalmsacu10;
            foreach ($consulta10 as $Consulta10) {
              if ($semanallevante10->gananciaavediarPle != null && $Consulta10->gananciaaveriatGul != null) {
                $totalcumpgananave10 = ($semanallevante10->gananciaavediarPle / $Consulta10->gananciaaveriatGul) - 1;
                $semanallevante10->cumpgananavesemanaPle = $totalcumpgananave10;
              }
              if ($semanallevante10->avediarealPle != null && $Consulta10->avediatabGul != null) {
                $totalcumplconsgrad10 = ($semanallevante10->avediarealPle / $Consulta10->avediatabGul) - 1;
                $semanallevante10->cumplconsgradPle = $totalcumplconsgrad10;
              }
              if ($semanallevante10->pesoPle != null && $Consulta10->avediatabGul != null) {
                $totalcumplpeso10 = ($semanallevante10->pesoPle / $Consulta10->pesotabGul) - 1;
                $semanallevante10->cumplpesoPle = $totalcumplpeso10;
              }
              if ($semanallevante10->graveacPle != null && $Consulta10->graveactabGul != null) {
                $totalcumplconsumoacm10 = ($semanallevante10->graveacPle / $Consulta10->graveactabGul) - 1;
                $semanallevante10->cumplconsumoacmPle = $totalcumplconsumoacm10;
              }
            }
            if ($semanallevante10->graveacPle != $semanallevante9->graveacPle && $semanallevante10->pesoPle != $semanallevante9->pesoPle) {
              $totalconvsem10 = ($semanallevante10->graveacPle - $semanallevante9->graveacPle) / ($semanallevante10->pesoPle - $semanallevante9->pesoPle);
              $semanallevante10->convsemPle = $totalconvsem10;
            }

            $semanallevante10->save();
        }
        foreach ($semanallevantes11 as $semanallevante11) {
            $semanallevante11->fdsPle = $request->fdsPle10;
            $semanallevante11->avesmuertasPle = $request->avesmuertasPle10;
            $semanallevante11->mortalidadPle = $request->mortalidadPle10;
            $semanallevante11->seleccionPle = $request->seleccionPle10;
            $semanallevante11->otrosPle = $request->otrosPle10;
            $totalacu10 = $request->mortalidadPle10 + $request->seleccionPle10 + $request->otrosPle10 + $semanallevante10->acuPle;
            $semanallevante11->acuPle = $totalacu10;
            $totalsaldoaves11 = $request->pollitasLot - $semanallevante11->acuPle;
            $semanallevante11->saldoavesPle = $totalsaldoaves11;
            $semanallevante11->alimentoPle = $request->alimentoPle10;
            $semanallevante11->consumoPle = $request->consumoPle10;
            $totalavediareal10 = $request->consumoPle10 / $semanallevante11->saldoavesPle / 7;
            $semanallevante11->avediarealPle = $totalavediareal10;
            $total11 = $request->consumoPle10 + $semanallevante10->kacumPle;
            $semanallevante11->kacumPle = $total11;
            $totalgraveac11 = $semanallevante11->kacumPle / $semanallevante11->saldoavesPle;
            $semanallevante11->graveacPle = $totalgraveac11;
            $totalmortsem11 = $request->mortalidadPle10 / $semanallevante10->saldoavesPle;
            $semanallevante11->mortsemPle = $totalmortsem11;
            $totalmortacu11 = ($semanallevante1->mortalidadPle + $semanallevante2->mortalidadPle + $semanallevante3->mortalidadPle + $semanallevante4->mortalidadPle + $semanallevante5->mortalidadPle + $semanallevante6->mortalidadPle + $semanallevante7->mortalidadPle + $semanallevante8->mortalidadPle + $semanallevante9->mortalidadPle + $semanallevante10->mortalidadPle + $request->mortalidadPle10) / $request->pollitasLot;
            $semanallevante11->mortacuPle = $totalmortacu11;
            $totalselsem11 = $request->seleccionPle10 / $semanallevante10->saldoavesPle;
            $semanallevante11->selsemPle = $totalselsem11;
            $semanallevante11->pesoPle = $request->pesoPle10;
            $totalgananciaavediar11 = $request->pesoPle10 - $semanallevante10->pesoPle;
            $semanallevante11->gananciaavediarPle = $totalgananciaavediar11;
            $semanallevante11->uniformidadPle = $request->uniformidadPle10;
            $semanallevante11->coeficientePle = $request->coeficientePle10;
            $semanallevante11->observacionesPle = $request->observacionesPle10;

            $totalmsacu11 = ($semanallevante1->mortalidadPle + $semanallevante1->seleccionPle + $semanallevante2->mortalidadPle + $semanallevante2->seleccionPle + $semanallevante3->mortalidadPle + $semanallevante3->seleccionPle + $semanallevante4->mortalidadPle + $semanallevante4->seleccionPle + $semanallevante5->mortalidadPle + $semanallevante5->seleccionPle + $semanallevante6->mortalidadPle + $semanallevante6->seleccionPle + $semanallevante7->mortalidadPle + $semanallevante7->seleccionPle + $semanallevante8->mortalidadPle + $semanallevante8->seleccionPle + $semanallevante9->mortalidadPle + $semanallevante9->seleccionPle + $semanallevante10->mortalidadPle + $semanallevante10->seleccionPle + $request->mortalidadPle10 + $request->seleccionPle10) / $request->pollitasLot;
            $semanallevante11->msacuPle = $totalmsacu11;
            foreach ($consulta11 as $Consulta11) {
              if ($semanallevante11->gananciaavediarPle != null && $Consulta11->gananciaaveriatGul != null) {
                $totalcumpgananave11 = ($semanallevante11->gananciaavediarPle / $Consulta11->gananciaaveriatGul) - 1;
                $semanallevante11->cumpgananavesemanaPle = $totalcumpgananave11;
              }
              if ($semanallevante11->avediarealPle != null && $Consulta11->avediatabGul != null) {
                $totalcumplconsgrad11 = ($semanallevante11->avediarealPle / $Consulta11->avediatabGul) - 1;
                $semanallevante11->cumplconsgradPle = $totalcumplconsgrad11;
              }
              if ($semanallevante11->pesoPle != null && $Consulta11->avediatabGul != null) {
                $totalcumplpeso11 = ($semanallevante11->pesoPle / $Consulta11->pesotabGul) - 1;
                $semanallevante11->cumplpesoPle = $totalcumplpeso11;
              }
              if ($semanallevante11->graveacPle != null && $Consulta11->graveactabGul != null) {
                $totalcumplconsumoacm11 = ($semanallevante11->graveacPle / $Consulta11->graveactabGul) - 1;
                $semanallevante11->cumplconsumoacmPle = $totalcumplconsumoacm11;
              }
            }
            if ($semanallevante11->graveacPle != $semanallevante10->graveacPle && $semanallevante11->pesoPle != $semanallevante10->pesoPle) {
              $totalconvsem11 = ($semanallevante11->graveacPle - $semanallevante10->graveacPle) / ($semanallevante11->pesoPle - $semanallevante10->pesoPle);
              $semanallevante11->convsemPle = $totalconvsem11;
            }

            $semanallevante11->save();
        }
        foreach ($semanallevantes12 as $semanallevante12) {
            $semanallevante12->fdsPle = $request->fdsPle11;
            $semanallevante12->avesmuertasPle = $request->avesmuertasPle11;
            $semanallevante12->mortalidadPle = $request->mortalidadPle11;
            $semanallevante12->seleccionPle = $request->seleccionPle11;
            $semanallevante12->otrosPle = $request->otrosPle11;
            $totalacu11 = $request->mortalidadPle11 + $request->seleccionPle11 + $request->otrosPle11 + $semanallevante11->acuPle;
            $semanallevante12->acuPle = $totalacu11;
            $totalsaldoaves12 = $request->pollitasLot - $semanallevante12->acuPle;
            $semanallevante12->saldoavesPle = $totalsaldoaves12;
            $semanallevante12->alimentoPle = $request->alimentoPle11;
            $semanallevante12->consumoPle = $request->consumoPle11;
            $totalavediareal11 = $request->consumoPle11 / $semanallevante12->saldoavesPle / 7;
            $semanallevante12->avediarealPle = $totalavediareal11;
            $total12 = $request->consumoPle11 + $semanallevante11->kacumPle;
            $semanallevante12->kacumPle = $total12;
            $totalgraveac12 = $semanallevante12->kacumPle / $semanallevante12->saldoavesPle;
            $semanallevante12->graveacPle = $totalgraveac12;
            $totalmortsem12 = $request->mortalidadPle11 / $semanallevante11->saldoavesPle;
            $semanallevante12->mortsemPle = $totalmortsem12;
            $totalmortacu12 = ($semanallevante1->mortalidadPle + $semanallevante2->mortalidadPle + $semanallevante3->mortalidadPle + $semanallevante4->mortalidadPle + $semanallevante5->mortalidadPle + $semanallevante6->mortalidadPle + $semanallevante7->mortalidadPle + $semanallevante8->mortalidadPle + $semanallevante9->mortalidadPle + $semanallevante10->mortalidadPle + $semanallevante11->mortalidadPle + $request->mortalidadPle11) / $request->pollitasLot;
            $semanallevante12->mortacuPle = $totalmortacu12;
            $totalselsem12 = $request->seleccionPle11 / $semanallevante11->saldoavesPle;
            $semanallevante12->selsemPle = $totalselsem12;
            $semanallevante12->pesoPle = $request->pesoPle11;
            $totalgananciaavediar12 = $request->pesoPle11 - $semanallevante11->pesoPle;
            $semanallevante12->gananciaavediarPle = $totalgananciaavediar12;
            $semanallevante12->uniformidadPle = $request->uniformidadPle11;
            $semanallevante12->coeficientePle = $request->coeficientePle11;
            $semanallevante12->observacionesPle = $request->observacionesPle11;

            $totalmsacu12 = ($semanallevante1->mortalidadPle + $semanallevante1->seleccionPle + $semanallevante2->mortalidadPle + $semanallevante2->seleccionPle + $semanallevante3->mortalidadPle + $semanallevante3->seleccionPle + $semanallevante4->mortalidadPle + $semanallevante4->seleccionPle + $semanallevante5->mortalidadPle + $semanallevante5->seleccionPle + $semanallevante6->mortalidadPle + $semanallevante6->seleccionPle + $semanallevante7->mortalidadPle + $semanallevante7->seleccionPle + $semanallevante8->mortalidadPle + $semanallevante8->seleccionPle + $semanallevante9->mortalidadPle + $semanallevante9->seleccionPle + $semanallevante10->mortalidadPle + $semanallevante10->seleccionPle + $request->mortalidadPle10 + $request->seleccionPle10) / $request->pollitasLot;
            $semanallevante12->msacuPle = $totalmsacu12;
            foreach ($consulta12 as $Consulta12) {
              if ($semanallevante12->gananciaavediarPle != null && $Consulta12->gananciaaveriatGul != null) {
                $totalcumpgananave12 = ($semanallevante12->gananciaavediarPle / $Consulta12->gananciaaveriatGul) - 1;
                $semanallevante12->cumpgananavesemanaPle = $totalcumpgananave12;
              }
              if ($semanallevante12->avediarealPle != null && $Consulta12->avediatabGul != null) {
                $totalcumplconsgrad12 = ($semanallevante12->avediarealPle / $Consulta12->avediatabGul) - 1;
                $semanallevante12->cumplconsgradPle = $totalcumplconsgrad12;
              }
              if ($semanallevante12->pesoPle != null && $Consulta12->avediatabGul != null) {
                $totalcumplpeso12 = ($semanallevante12->pesoPle / $Consulta12->pesotabGul) - 1;
                $semanallevante12->cumplpesoPle = $totalcumplpeso12;
              }
              if ($semanallevante12->graveacPle != null && $Consulta12->graveactabGul != null) {
                $totalcumplconsumoacm12 = ($semanallevante12->graveacPle / $Consulta12->graveactabGul) - 1;
                $semanallevante12->cumplconsumoacmPle = $totalcumplconsumoacm12;
              }
            }
            if ($semanallevante12->graveacPle != $semanallevante11->graveacPle && $semanallevante12->pesoPle != $semanallevante11->pesoPle) {
              $totalconvsem12 = ($semanallevante12->graveacPle - $semanallevante11->graveacPle) / ($semanallevante12->pesoPle - $semanallevante11->pesoPle);
              $semanallevante12->convsemPle = $totalconvsem12;
            }

            $semanallevante12->save();
        }
        foreach ($semanallevantes13 as $semanallevante13) {
            $semanallevante13->fdsPle = $request->fdsPle12;
            $semanallevante13->avesmuertasPle = $request->avesmuertasPle12;
            $semanallevante13->mortalidadPle = $request->mortalidadPle12;
            $semanallevante13->seleccionPle = $request->seleccionPle12;
            $semanallevante13->otrosPle = $request->otrosPle12;
            $totalacu12 = $request->mortalidadPle12 + $request->seleccionPle12 + $request->otrosPle12 + $semanallevante12->acuPle;
            $semanallevante13->acuPle = $totalacu12;
            $totalsaldoaves13 = $request->pollitasLot - $semanallevante13->acuPle;
            $semanallevante13->saldoavesPle = $totalsaldoaves13;
            $semanallevante13->alimentoPle = $request->alimentoPle12;
            $semanallevante13->consumoPle = $request->consumoPle12;
            $totalavediareal12 = $request->consumoPle12 / $semanallevante13->saldoavesPle / 7;
            $semanallevante13->avediarealPle = $totalavediareal12;
            $total13 = $request->consumoPle12 + $semanallevante12->kacumPle;
            $semanallevante13->kacumPle = $total13;
            $totalgraveac13 = $semanallevante13->kacumPle / $semanallevante13->saldoavesPle;
            $semanallevante13->graveacPle = $totalgraveac13;
            $totalmortsem13 = $request->mortalidadPle12 / $semanallevante12->saldoavesPle;
            $semanallevante13->mortsemPle = $totalmortsem13;
            $totalmortacu13 = ($semanallevante1->mortalidadPle + $semanallevante2->mortalidadPle + $semanallevante3->mortalidadPle + $semanallevante4->mortalidadPle + $semanallevante5->mortalidadPle + $semanallevante6->mortalidadPle + $semanallevante7->mortalidadPle + $semanallevante8->mortalidadPle + $semanallevante9->mortalidadPle + $semanallevante10->mortalidadPle + $semanallevante11->mortalidadPle + $semanallevante12->mortalidadPle + $request->mortalidadPle12) / $request->pollitasLot;
            $semanallevante13->mortacuPle = $totalmortacu13;
            $totalselsem13 = $request->seleccionPle12 / $semanallevante12->saldoavesPle;
            $semanallevante13->selsemPle = $totalselsem13;
            $semanallevante13->pesoPle = $request->pesoPle12;
            $totalgananciaavediar13 = $request->pesoPle12 - $semanallevante12->pesoPle;
            $semanallevante13->gananciaavediarPle = $totalgananciaavediar13;
            $semanallevante13->uniformidadPle = $request->uniformidadPle12;
            $semanallevante13->coeficientePle = $request->coeficientePle12;
            $semanallevante13->observacionesPle = $request->observacionesPle12;

            $totalmsacu13 = ($semanallevante1->mortalidadPle + $semanallevante1->seleccionPle + $semanallevante2->mortalidadPle + $semanallevante2->seleccionPle + $semanallevante3->mortalidadPle + $semanallevante3->seleccionPle + $semanallevante4->mortalidadPle + $semanallevante4->seleccionPle + $semanallevante5->mortalidadPle + $semanallevante5->seleccionPle + $semanallevante6->mortalidadPle + $semanallevante6->seleccionPle + $semanallevante7->mortalidadPle + $semanallevante7->seleccionPle + $semanallevante8->mortalidadPle + $semanallevante8->seleccionPle + $semanallevante9->mortalidadPle + $semanallevante9->seleccionPle + $semanallevante10->mortalidadPle + $semanallevante10->seleccionPle + $semanallevante11->mortalidadPle + $semanallevante11->seleccionPle + $request->mortalidadPle11 + $request->seleccionPle11) / $request->pollitasLot;
            $semanallevante13->msacuPle = $totalmsacu13;
            foreach ($consulta13 as $Consulta13) {
              if ($semanallevante13->gananciaavediarPle != null && $Consulta13->gananciaaveriatGul != null) {
                $totalcumpgananave13 = ($semanallevante13->gananciaavediarPle / $Consulta13->gananciaaveriatGul) - 1;
                $semanallevante13->cumpgananavesemanaPle = $totalcumpgananave13;
              }
              if ($semanallevante13->avediarealPle != null && $Consulta13->avediatabGul != null) {
                $totalcumplconsgrad13 = ($semanallevante13->avediarealPle / $Consulta13->avediatabGul) - 1;
                $semanallevante13->cumplconsgradPle = $totalcumplconsgrad13;
              }
              if ($semanallevante13->pesoPle != null && $Consulta13->avediatabGul != null) {
                $totalcumplpeso13 = ($semanallevante13->pesoPle / $Consulta13->pesotabGul) - 1;
                $semanallevante13->cumplpesoPle = $totalcumplpeso13;
              }
              if ($semanallevante13->graveacPle != null && $Consulta13->graveactabGul != null) {
                $totalcumplconsumoacm13 = ($semanallevante13->graveacPle / $Consulta13->graveactabGul) - 1;
                $semanallevante13->cumplconsumoacmPle = $totalcumplconsumoacm13;
              }
            }
            if ($semanallevante13->graveacPle != $semanallevante12->graveacPle && $semanallevante13->pesoPle != $semanallevante12->pesoPle) {
              $totalconvsem13 = ($semanallevante13->graveacPle - $semanallevante12->graveacPle) / ($semanallevante13->pesoPle - $semanallevante12->pesoPle);
              $semanallevante13->convsemPle = $totalconvsem13;
            }

            $semanallevante13->save();
        }
        foreach ($semanallevantes14 as $semanallevante14) {
            $semanallevante14->fdsPle = $request->fdsPle13;
            $semanallevante14->avesmuertasPle = $request->avesmuertasPle13;
            $semanallevante14->mortalidadPle = $request->mortalidadPle13;
            $semanallevante14->seleccionPle = $request->seleccionPle13;
            $semanallevante14->otrosPle = $request->otrosPle13;
            $totalacu13 = $request->mortalidadPle13 + $request->seleccionPle13 + $request->otrosPle13 + $semanallevante13->acuPle;
            $semanallevante14->acuPle = $totalacu13;
            $totalsaldoaves14 = $request->pollitasLot - $semanallevante14->acuPle;
            $semanallevante14->saldoavesPle = $totalsaldoaves14;
            $semanallevante14->alimentoPle = $request->alimentoPle13;
            $semanallevante14->consumoPle = $request->consumoPle13;
            $totalavediareal13 = $request->consumoPle13 / $semanallevante14->saldoavesPle / 7;
            $semanallevante14->avediarealPle = $totalavediareal13;
            $total14 = $request->consumoPle13 + $semanallevante13->kacumPle;
            $semanallevante14->kacumPle = $total14;
            $totalgraveac14 = $semanallevante14->kacumPle / $semanallevante14->saldoavesPle;
            $semanallevante14->graveacPle = $totalgraveac14;
            $totalmortsem14 = $request->mortalidadPle13 / $semanallevante13->saldoavesPle;
            $semanallevante14->mortsemPle = $totalmortsem14;
            $totalmortacu14 = ($semanallevante1->mortalidadPle + $semanallevante2->mortalidadPle + $semanallevante3->mortalidadPle + $semanallevante4->mortalidadPle + $semanallevante5->mortalidadPle + $semanallevante6->mortalidadPle + $semanallevante7->mortalidadPle + $semanallevante8->mortalidadPle + $semanallevante9->mortalidadPle + $semanallevante10->mortalidadPle + $semanallevante11->mortalidadPle + $semanallevante12->mortalidadPle + $semanallevante13->mortalidadPle + $request->mortalidadPle13) / $request->pollitasLot;
            $semanallevante14->mortacuPle = $totalmortacu14;
            $totalselsem14 = $request->seleccionPle13 / $semanallevante13->saldoavesPle;
            $semanallevante14->selsemPle = $totalselsem14;
            $semanallevante14->pesoPle = $request->pesoPle13;
            $totalgananciaavediar14 = $request->pesoPle13 - $semanallevante13->pesoPle;
            $semanallevante14->gananciaavediarPle = $totalgananciaavediar14;
            $semanallevante14->uniformidadPle = $request->uniformidadPle13;
            $semanallevante14->coeficientePle = $request->coeficientePle13;
            $semanallevante14->observacionesPle = $request->observacionesPle13;

            $totalmsacu14 = ($semanallevante1->mortalidadPle + $semanallevante1->seleccionPle + $semanallevante2->mortalidadPle + $semanallevante2->seleccionPle + $semanallevante3->mortalidadPle + $semanallevante3->seleccionPle + $semanallevante4->mortalidadPle + $semanallevante4->seleccionPle + $semanallevante5->mortalidadPle + $semanallevante5->seleccionPle + $semanallevante6->mortalidadPle + $semanallevante6->seleccionPle + $semanallevante7->mortalidadPle + $semanallevante7->seleccionPle + $semanallevante8->mortalidadPle + $semanallevante8->seleccionPle + $semanallevante9->mortalidadPle + $semanallevante9->seleccionPle + $semanallevante10->mortalidadPle + $semanallevante10->seleccionPle + $semanallevante11->mortalidadPle + $semanallevante11->seleccionPle + $semanallevante12->mortalidadPle + $semanallevante12->seleccionPle + $request->mortalidadPle12 + $request->seleccionPle12) / $request->pollitasLot;
            $semanallevante14->msacuPle = $totalmsacu14;
            foreach ($consulta14 as $Consulta14) {
              if ($semanallevante14->gananciaavediarPle != null && $Consulta14->gananciaaveriatGul != null) {
                $totalcumpgananave14 = ($semanallevante14->gananciaavediarPle / $Consulta14->gananciaaveriatGul) - 1;
                $semanallevante14->cumpgananavesemanaPle = $totalcumpgananave14;
              }
              if ($semanallevante14->avediarealPle != null && $Consulta14->avediatabGul != null) {
                $totalcumplconsgrad14 = ($semanallevante14->avediarealPle / $Consulta14->avediatabGul) - 1;
                $semanallevante14->cumplconsgradPle = $totalcumplconsgrad14;
              }
              if ($semanallevante14->pesoPle != null && $Consulta14->avediatabGul != null) {
                $totalcumplpeso14 = ($semanallevante14->pesoPle / $Consulta14->pesotabGul) - 1;
                $semanallevante14->cumplpesoPle = $totalcumplpeso14;
              }
              if ($semanallevante14->graveacPle != null && $Consulta14->graveactabGul != null) {
                $totalcumplconsumoacm14 = ($semanallevante14->graveacPle / $Consulta14->graveactabGul) - 1;
                $semanallevante14->cumplconsumoacmPle = $totalcumplconsumoacm14;
              }
            }
            if ($semanallevante14->graveacPle != $semanallevante13->graveacPle && $semanallevante14->pesoPle != $semanallevante13->pesoPle) {
              $totalconvsem14 = ($semanallevante14->graveacPle - $semanallevante13->graveacPle) / ($semanallevante14->pesoPle - $semanallevante13->pesoPle);
              $semanallevante14->convsemPle = $totalconvsem14;
            }

            $semanallevante14->save();
        }
        foreach ($semanallevantes15 as $semanallevante15) {
            $semanallevante15->fdsPle = $request->fdsPle14;
            $semanallevante15->avesmuertasPle = $request->avesmuertasPle14;
            $semanallevante15->mortalidadPle = $request->mortalidadPle14;
            $semanallevante15->seleccionPle = $request->seleccionPle14;
            $semanallevante15->otrosPle = $request->otrosPle14;
            $totalacu14 = $request->mortalidadPle14 + $request->seleccionPle14 + $request->otrosPle14 + $semanallevante14->acuPle;
            $semanallevante15->acuPle = $totalacu14;
            $totalsaldoaves15 = $request->pollitasLot - $semanallevante15->acuPle;
            $semanallevante15->saldoavesPle = $totalsaldoaves15;
            $semanallevante15->alimentoPle = $request->alimentoPle14;
            $semanallevante15->consumoPle = $request->consumoPle14;
            $totalavediareal14 = $request->consumoPle14 / $semanallevante15->saldoavesPle / 7;
            $semanallevante15->avediarealPle = $totalavediareal14;
            $total15 = $request->consumoPle14 + $semanallevante14->kacumPle;
            $semanallevante15->kacumPle = $total15;
            $totalgraveac15 = $semanallevante15->kacumPle / $semanallevante15->saldoavesPle;
            $semanallevante15->graveacPle = $totalgraveac15;
            $totalmortsem15 = $request->mortalidadPle14 / $semanallevante14->saldoavesPle;
            $semanallevante15->mortsemPle = $totalmortsem15;
            $totalmortacu15 = ($semanallevante1->mortalidadPle + $semanallevante2->mortalidadPle + $semanallevante3->mortalidadPle + $semanallevante4->mortalidadPle + $semanallevante5->mortalidadPle + $semanallevante6->mortalidadPle + $semanallevante7->mortalidadPle + $semanallevante8->mortalidadPle + $semanallevante9->mortalidadPle + $semanallevante10->mortalidadPle + $semanallevante11->mortalidadPle + $semanallevante12->mortalidadPle + $semanallevante13->mortalidadPle + $semanallevante14->mortalidadPle + $request->mortalidadPle14) / $request->pollitasLot;
            $semanallevante15->mortacuPle = $totalmortacu15;
            $totalselsem15 = $request->seleccionPle14 / $semanallevante14->saldoavesPle;
            $semanallevante15->selsemPle = $totalselsem15;
            $semanallevante15->pesoPle = $request->pesoPle14;
            $totalgananciaavediar15 = $request->pesoPle14 - $semanallevante14->pesoPle;
            $semanallevante15->gananciaavediarPle = $totalgananciaavediar15;
            $semanallevante15->uniformidadPle = $request->uniformidadPle14;
            $semanallevante15->coeficientePle = $request->coeficientePle14;
            $semanallevante15->observacionesPle = $request->observacionesPle14;

            $totalmsacu15 = ($semanallevante1->mortalidadPle + $semanallevante1->seleccionPle + $semanallevante2->mortalidadPle + $semanallevante2->seleccionPle + $semanallevante3->mortalidadPle + $semanallevante3->seleccionPle + $semanallevante4->mortalidadPle + $semanallevante4->seleccionPle + $semanallevante5->mortalidadPle + $semanallevante5->seleccionPle + $semanallevante6->mortalidadPle + $semanallevante6->seleccionPle + $semanallevante7->mortalidadPle + $semanallevante7->seleccionPle + $semanallevante8->mortalidadPle + $semanallevante8->seleccionPle + $semanallevante9->mortalidadPle + $semanallevante9->seleccionPle + $semanallevante10->mortalidadPle + $semanallevante10->seleccionPle + $semanallevante11->mortalidadPle + $semanallevante11->seleccionPle + $semanallevante12->mortalidadPle + $semanallevante12->seleccionPle + $semanallevante13->mortalidadPle + $semanallevante13->seleccionPle + $semanallevante14->mortalidadPle + $semanallevante14->seleccionPle + $request->mortalidadPle14 + $request->seleccionPle14) / $request->pollitasLot;
            $semanallevante15->msacuPle = $totalmsacu15;
            foreach ($consulta15 as $Consulta15) {
              if ($semanallevante15->gananciaavediarPle != null && $Consulta15->gananciaaveriatGul != null) {
                $totalcumpgananave15 = ($semanallevante15->gananciaavediarPle / $Consulta15->gananciaaveriatGul) - 1;
                $semanallevante15->cumpgananavesemanaPle = $totalcumpgananave15;
              }
              if ($semanallevante15->avediarealPle != null && $Consulta15->avediatabGul != null) {
                $totalcumplconsgrad15 = ($semanallevante15->avediarealPle / $Consulta15->avediatabGul) - 1;
                $semanallevante15->cumplconsgradPle = $totalcumplconsgrad15;
              }
              if ($semanallevante15->pesoPle != null && $Consulta15->avediatabGul != null) {
                $totalcumplpeso15 = ($semanallevante15->pesoPle / $Consulta15->pesotabGul) - 1;
                $semanallevante15->cumplpesoPle = $totalcumplpeso15;
              }
              if ($semanallevante15->graveacPle != null && $Consulta15->graveactabGul != null) {
                $totalcumplconsumoacm15 = ($semanallevante15->graveacPle / $Consulta15->graveactabGul) - 1;
                $semanallevante15->cumplconsumoacmPle = $totalcumplconsumoacm15;
              }
            }
            if ($semanallevante15->graveacPle != $semanallevante14->graveacPle && $semanallevante15->pesoPle != $semanallevante14->pesoPle) {
              $totalconvsem15 = ($semanallevante15->graveacPle - $semanallevante14->graveacPle) / ($semanallevante15->pesoPle - $semanallevante14->pesoPle);
              $semanallevante15->convsemPle = $totalconvsem15;
            }

            $semanallevante15->save();
        }
        foreach ($semanallevantes16 as $semanallevante16) {
            $semanallevante16->fdsPle = $request->fdsPle15;
            $semanallevante16->avesmuertasPle = $request->avesmuertasPle15;
            $semanallevante16->mortalidadPle = $request->mortalidadPle15;
            $semanallevante16->seleccionPle = $request->seleccionPle15;
            $semanallevante16->otrosPle = $request->otrosPle15;
            $totalacu15 = $request->mortalidadPle15 + $request->seleccionPle15 + $request->otrosPle15 + $semanallevante15->acuPle;
            $semanallevante16->acuPle = $totalacu15;
            $totalsaldoaves16 = $request->pollitasLot - $semanallevante16->acuPle;
            $semanallevante16->saldoavesPle = $totalsaldoaves16;
            $semanallevante16->alimentoPle = $request->alimentoPle15;
            $semanallevante16->consumoPle = $request->consumoPle15;
            $totalavediareal15 = $request->consumoPle15 / $semanallevante16->saldoavesPle / 7;
            $semanallevante16->avediarealPle = $totalavediareal15;
            $total16 = $request->consumoPle15 + $semanallevante15->kacumPle;
            $semanallevante16->kacumPle = $total16;
            $totalgraveac16 = $semanallevante16->kacumPle / $semanallevante16->saldoavesPle;
            $semanallevante16->graveacPle = $totalgraveac16;
            $totalmortsem16 = $request->mortalidadPle15 / $semanallevante15->saldoavesPle;
            $semanallevante16->mortsemPle = $totalmortsem16;
            $totalmortacu16 = ($semanallevante1->mortalidadPle + $semanallevante2->mortalidadPle + $semanallevante3->mortalidadPle + $semanallevante4->mortalidadPle + $semanallevante5->mortalidadPle + $semanallevante6->mortalidadPle + $semanallevante7->mortalidadPle + $semanallevante8->mortalidadPle + $semanallevante9->mortalidadPle + $semanallevante10->mortalidadPle + $semanallevante11->mortalidadPle + $semanallevante12->mortalidadPle + $semanallevante13->mortalidadPle + $semanallevante14->mortalidadPle + $semanallevante15->mortalidadPle + $request->mortalidadPle15) / $request->pollitasLot;
            $semanallevante16->mortacuPle = $totalmortacu16;
            $totalselsem16 = $request->seleccionPle15 / $semanallevante15->saldoavesPle;
            $semanallevante16->selsemPle = $totalselsem16;
            $semanallevante16->pesoPle = $request->pesoPle15;
            $totalgananciaavediar16 = $request->pesoPle15 - $semanallevante15->pesoPle;
            $semanallevante16->gananciaavediarPle = $totalgananciaavediar16;
            $semanallevante16->uniformidadPle = $request->uniformidadPle15;
            $semanallevante16->coeficientePle = $request->coeficientePle15;
            $semanallevante16->observacionesPle = $request->observacionesPle15;

            $totalmsacu16 = ($semanallevante1->mortalidadPle + $semanallevante1->seleccionPle + $semanallevante2->mortalidadPle + $semanallevante2->seleccionPle + $semanallevante3->mortalidadPle + $semanallevante3->seleccionPle + $semanallevante4->mortalidadPle + $semanallevante4->seleccionPle + $semanallevante5->mortalidadPle + $semanallevante5->seleccionPle + $semanallevante6->mortalidadPle + $semanallevante6->seleccionPle + $semanallevante7->mortalidadPle + $semanallevante7->seleccionPle + $semanallevante8->mortalidadPle + $semanallevante8->seleccionPle + $semanallevante9->mortalidadPle + $semanallevante9->seleccionPle + $semanallevante10->mortalidadPle + $semanallevante10->seleccionPle + $semanallevante11->mortalidadPle + $semanallevante11->seleccionPle + $semanallevante12->mortalidadPle + $semanallevante12->seleccionPle + $semanallevante13->mortalidadPle + $semanallevante13->seleccionPle + $semanallevante14->mortalidadPle + $semanallevante14->seleccionPle + $semanallevante15->mortalidadPle + $semanallevante15->seleccionPle + $request->mortalidadPle15 + $request->seleccionPle15) / $request->pollitasLot;
            $semanallevante16->msacuPle = $totalmsacu16;
            foreach ($consulta16 as $Consulta16) {
              if ($semanallevante16->gananciaavediarPle != null && $Consulta16->gananciaaveriatGul != null) {
                $totalcumpgananave16 = ($semanallevante16->gananciaavediarPle / $Consulta16->gananciaaveriatGul) - 1;
                $semanallevante16->cumpgananavesemanaPle = $totalcumpgananave16;
              }
              if ($semanallevante16->avediarealPle != null && $Consulta16->avediatabGul != null) {
                $totalcumplconsgrad16 = ($semanallevante16->avediarealPle / $Consulta16->avediatabGul) - 1;
                $semanallevante16->cumplconsgradPle = $totalcumplconsgrad16;
              }
              if ($semanallevante16->pesoPle != null && $Consulta16->avediatabGul != null) {
                $totalcumplpeso16 = ($semanallevante16->pesoPle / $Consulta16->pesotabGul) - 1;
                $semanallevante16->cumplpesoPle = $totalcumplpeso16;
              }
              if ($semanallevante16->graveacPle != null && $Consulta16->graveactabGul != null) {
                $totalcumplconsumoacm16 = ($semanallevante16->graveacPle / $Consulta16->graveactabGul) - 1;
                $semanallevante16->cumplconsumoacmPle = $totalcumplconsumoacm16;
              }
            }
            if ($semanallevante16->graveacPle != $semanallevante15->graveacPle && $semanallevante16->pesoPle != $semanallevante15->pesoPle) {
              $totalconvsem16 = ($semanallevante16->graveacPle - $semanallevante15->graveacPle) / ($semanallevante16->pesoPle - $semanallevante15->pesoPle);
              $semanallevante16->convsemPle = $totalconvsem16;
            }

            $semanallevante16->save();
        }
        foreach ($semanallevantes17 as $semanallevante17) {
            $semanallevante17->fdsPle = $request->fdsPle16;
            $semanallevante17->avesmuertasPle = $request->avesmuertasPle16;
            $semanallevante17->mortalidadPle = $request->mortalidadPle16;
            $semanallevante17->seleccionPle = $request->seleccionPle16;
            $semanallevante17->otrosPle = $request->otrosPle16;
            $totalacu16 = $request->mortalidadPle16 + $request->seleccionPle16 + $request->otrosPle16 + $semanallevante16->acuPle;
            $semanallevante17->acuPle = $totalacu16;
            $totalsaldoaves17 = $request->pollitasLot - $semanallevante17->acuPle;
            $semanallevante17->saldoavesPle = $totalsaldoaves17;
            $semanallevante17->alimentoPle = $request->alimentoPle16;
            $semanallevante17->consumoPle = $request->consumoPle16;
            $totalavediareal16 = $request->consumoPle16 / $semanallevante17->saldoavesPle / 7;
            $semanallevante17->avediarealPle = $totalavediareal16;
            $total17 = $request->consumoPle16 + $semanallevante16->kacumPle;
            $semanallevante17->kacumPle = $total17;
            $totalgraveac17 = $semanallevante17->kacumPle / $semanallevante17->saldoavesPle;
            $semanallevante17->graveacPle = $totalgraveac17;
            $totalmortsem17 = $request->mortalidadPle16 / $semanallevante16->saldoavesPle;
            $semanallevante17->mortsemPle = $totalmortsem17;
            $totalmortacu17 = ($semanallevante1->mortalidadPle + $semanallevante2->mortalidadPle + $semanallevante3->mortalidadPle + $semanallevante4->mortalidadPle + $semanallevante5->mortalidadPle + $semanallevante6->mortalidadPle + $semanallevante7->mortalidadPle + $semanallevante8->mortalidadPle + $semanallevante9->mortalidadPle + $semanallevante10->mortalidadPle + $semanallevante11->mortalidadPle + $semanallevante12->mortalidadPle + $semanallevante13->mortalidadPle + $semanallevante14->mortalidadPle + $semanallevante15->mortalidadPle + $semanallevante16->mortalidadPle + $request->mortalidadPle16) / $request->pollitasLot;
            $semanallevante17->mortacuPle = $totalmortacu17;
            $totalselsem17 = $request->seleccionPle16 / $semanallevante16->saldoavesPle;
            $semanallevante17->selsemPle = $totalselsem17;
            $semanallevante17->pesoPle = $request->pesoPle16;
            $totalgananciaavediar17 = $request->pesoPle16 - $semanallevante16->pesoPle;
            $semanallevante17->gananciaavediarPle = $totalgananciaavediar17;
            $semanallevante17->uniformidadPle = $request->uniformidadPle16;
            $semanallevante17->coeficientePle = $request->coeficientePle16;
            $semanallevante17->observacionesPle = $request->observacionesPle16;

            $totalmsacu17 = ($semanallevante1->mortalidadPle + $semanallevante1->seleccionPle + $semanallevante2->mortalidadPle + $semanallevante2->seleccionPle + $semanallevante3->mortalidadPle + $semanallevante3->seleccionPle + $semanallevante4->mortalidadPle + $semanallevante4->seleccionPle + $semanallevante5->mortalidadPle + $semanallevante5->seleccionPle + $semanallevante6->mortalidadPle + $semanallevante6->seleccionPle + $semanallevante7->mortalidadPle + $semanallevante7->seleccionPle + $semanallevante8->mortalidadPle + $semanallevante8->seleccionPle + $semanallevante9->mortalidadPle + $semanallevante9->seleccionPle + $semanallevante10->mortalidadPle + $semanallevante10->seleccionPle + $semanallevante11->mortalidadPle + $semanallevante11->seleccionPle + $semanallevante12->mortalidadPle + $semanallevante12->seleccionPle + $semanallevante13->mortalidadPle + $semanallevante13->seleccionPle + $semanallevante14->mortalidadPle + $semanallevante14->seleccionPle + $semanallevante15->mortalidadPle + $semanallevante15->seleccionPle + $semanallevante16->mortalidadPle + $semanallevante16->seleccionPle + $request->mortalidadPle16 + $request->seleccionPle15) / $request->pollitasLot;
            $semanallevante17->msacuPle = $totalmsacu17;
            foreach ($consulta17 as $Consulta17) {
              if ($semanallevante17->gananciaavediarPle != null && $Consulta17->gananciaaveriatGul != null) {
                $totalcumpgananave17 = ($semanallevante17->gananciaavediarPle / $Consulta17->gananciaaveriatGul) - 1;
                $semanallevante17->cumpgananavesemanaPle = $totalcumpgananave17;
              }
              if ($semanallevante17->avediarealPle != null && $Consulta17->avediatabGul != null) {
                $totalcumplconsgrad17 = ($semanallevante17->avediarealPle / $Consulta17->avediatabGul) - 1;
                $semanallevante17->cumplconsgradPle = $totalcumplconsgrad17;
              }
              if ($semanallevante17->pesoPle != null && $Consulta17->avediatabGul != null) {
                $totalcumplpeso17 = ($semanallevante17->pesoPle / $Consulta17->pesotabGul) - 1;
                $semanallevante17->cumplpesoPle = $totalcumplpeso17;
              }
              if ($semanallevante17->graveacPle != null && $Consulta17->graveactabGul != null) {
                $totalcumplconsumoacm17 = ($semanallevante17->graveacPle / $Consulta17->graveactabGul) - 1;
                $semanallevante17->cumplconsumoacmPle = $totalcumplconsumoacm17;
              }
            }
            if ($semanallevante17->graveacPle != $semanallevante16->graveacPle && $semanallevante17->pesoPle != $semanallevante16->pesoPle) {
              $totalconvsem17 = ($semanallevante17->graveacPle - $semanallevante16->graveacPle) / ($semanallevante17->pesoPle - $semanallevante16->pesoPle);
              $semanallevante17->convsemPle = $totalconvsem17;
            }

            $semanallevante17->save();
        }

        return redirect('ponedoraslevantes');

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

    public function search(Request $request)
    {
        $Lote = Lote::select( 'lotes.nombreLot')
                        ->where('nombreLot','=',$request->buscar)
                        ->where('lotes.idEstado','=', 5)
                        ->get();

        $Sublote = Lote::select('sublotes.nombreSub' , 'lotes.nombreLot')
                        ->leftjoin('sublotes' , 'sublotes.idLote' , '=' , 'lotes.id')
                        ->where('nombreSub','=',$request->buscar)
                        ->where('sublotes.idEstado','=', 5)
                        ->get();

         if (!$Lote->isEmpty()) {
           $lotes = Lote::select('granjas.nombreGra', 'granjas.alturaGra' , 'municipios.nombreMun' , 'departamentos.nombreDep' , 'pais.nombrePai', 'climas.nombreCli', 'empresas.nombreEmp', 'zonas.nombreZon', 'variedads.nombreVar', 'sistemaexplotacions.nombreSis' , 'lotes.*')
                        ->join('variedads' , 'variedads.id' , '=' , 'lotes.idVariedad')
                        ->join('granjas' , 'granjas.id' , '=' , 'lotes.idGranja')
                        ->join('sistemaexplotacions' , 'sistemaexplotacions.id' , '=' , 'lotes.idSistema')
                        ->join('municipios' , 'municipios.id' , '=' , 'granjas.idMunicipio')
                        ->join('departamentos' , 'departamentos.id' , '=' , 'municipios.idDepartamento')
                        ->join('pais' , 'pais.id' , '=' , 'departamentos.idPais')
                        ->join('climas' , 'climas.id' , '=' , 'granjas.idClima')
                        ->join('empresas' , 'empresas.id' , '=' , 'granjas.idEmpresa')
                        ->join('zonas' , 'zonas.id' , '=' , 'granjas.idZona')
                        ->leftjoin('sublotes' , 'sublotes.idLote' , '=' , 'lotes.id')
                        ->where('nombreLot','=',$request->buscar)
                        ->where('lotes.idEstado','=', 5)
                        ->groupBy('nombreLot')
                        ->get();

            $guia = Guia::select('nombreGui', 'id')
                          ->where('moduloGui', '=', 'Ponedoras Levante')
                          ->get();

            foreach ($lotes as $lote) {
              $fecha = $lote->encLot;
              $encasetamientoLot = $fecha->format('d-m-Y');
              $endDate1 = $fecha->addDay(6);
              $fecha1 = $endDate1->format('d-m-Y');
              $endDate2 = $fecha->addDay(7);
              $fecha2 = $endDate2->format('d-m-Y');
              $endDate3 = $fecha->addDay(7);
              $fecha3 = $endDate3->format('d-m-Y');
              $endDate4 = $fecha->addDay(7);
              $fecha4 = $endDate4->format('d-m-Y');
              $endDate5 = $fecha->addDay(7);
              $fecha5 = $endDate5->format('d-m-Y');
              $endDate6 = $fecha->addDay(7);
              $fecha6 = $endDate6->format('d-m-Y');
              $endDate7 = $fecha->addDay(7);
              $fecha7 = $endDate7->format('d-m-Y');
              $endDate8 = $fecha->addDay(7);
              $fecha8 = $endDate8->format('d-m-Y');
              $endDate9 = $fecha->addDay(7);
              $fecha9 = $endDate9->format('d-m-Y');
              $endDate10 = $fecha->addDay(7);
              $fecha10 = $endDate10->format('d-m-Y');
              $endDate11 = $fecha->addDay(7);
              $fecha11 = $endDate11->format('d-m-Y');
              $endDate12 = $fecha->addDay(7);
              $fecha12 = $endDate12->format('d-m-Y');
              $endDate13 = $fecha->addDay(7);
              $fecha13 = $endDate13->format('d-m-Y');
              $endDate14 = $fecha->addDay(7);
              $fecha14 = $endDate14->format('d-m-Y');
              $endDate15 = $fecha->addDay(7);
              $fecha15 = $endDate15->format('d-m-Y');
              $endDate16 = $fecha->addDay(7);
              $fecha16 = $endDate16->format('d-m-Y');
              $endDate17 = $fecha->addDay(7);
              $fecha17 = $endDate17->format('d-m-Y');

              $semanallevantes =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*')
                                      ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                      ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                      ->where('ponedoraslevantes.idLote', '=' , $lote->id)
                                      ->where('semanaPle' , '=' , 1)
                                      ->get();
            }
            return \View::make('Avicol/PonedorasLevante/create', compact('lotes','semanallevantes','fecha1','fecha2','fecha3','fecha4','fecha5','fecha6','fecha7','fecha8','fecha9','fecha10','fecha11','fecha12','fecha13','fecha14','fecha15','fecha16','fecha17','encasetamientoLot','guia'));

        }
         if (!$Sublote->isEmpty()) {
           $lotes = Lote::select('granjas.nombreGra', 'granjas.alturaGra' , 'municipios.nombreMun' , 'departamentos.nombreDep' , 'pais.nombrePai', 'climas.nombreCli', 'empresas.nombreEmp', 'zonas.nombreZon', 'variedads.nombreVar', 'sistemaexplotacions.nombreSis' , 'lotes.encLot', 'lotes.nombreLot', 'lotes.pollitasLot', 'lotes.encasetamientoLot', 'sublotes.nombreSub', 'sublotes.id')
                        ->join('variedads' , 'variedads.id' , '=' , 'lotes.idVariedad')
                        ->join('granjas' , 'granjas.id' , '=' , 'lotes.idGranja')
                        ->join('sistemaexplotacions' , 'sistemaexplotacions.id' , '=' , 'lotes.idSistema')
                        ->join('municipios' , 'municipios.id' , '=' , 'granjas.idMunicipio')
                        ->join('departamentos' , 'departamentos.id' , '=' , 'municipios.idDepartamento')
                        ->join('pais' , 'pais.id' , '=' , 'departamentos.idPais')
                        ->join('climas' , 'climas.id' , '=' , 'granjas.idClima')
                        ->join('empresas' , 'empresas.id' , '=' , 'granjas.idEmpresa')
                        ->join('zonas' , 'zonas.id' , '=' , 'granjas.idZona')
                        ->leftjoin('sublotes' , 'sublotes.idLote' , '=' , 'lotes.id')
                        ->orwhere('nombreSub','=',$request->buscar)
                        ->where('lotes.idEstado','=', 5)
                        ->groupBy('nombreLot')
                        ->get();

            $guia = Guia::select('nombreGui', 'id')
                          ->where('moduloGui', '=', 'Ponedoras Levante')
                          ->get();

            foreach ($lotes as $lote) {
              $fecha = $lote->encLot;
              $encasetamientoLot = $fecha->format('d-m-Y');
              $endDate1 = $fecha->addDay(6);
              $fecha1 = $endDate1->format('d-m-Y');
              $endDate2 = $fecha->addDay(7);
              $fecha2 = $endDate2->format('d-m-Y');
              $endDate3 = $fecha->addDay(7);
              $fecha3 = $endDate3->format('d-m-Y');
              $endDate4 = $fecha->addDay(7);
              $fecha4 = $endDate4->format('d-m-Y');
              $endDate5 = $fecha->addDay(7);
              $fecha5 = $endDate5->format('d-m-Y');
              $endDate6 = $fecha->addDay(7);
              $fecha6 = $endDate6->format('d-m-Y');
              $endDate7 = $fecha->addDay(7);
              $fecha7 = $endDate7->format('d-m-Y');
              $endDate8 = $fecha->addDay(7);
              $fecha8 = $endDate8->format('d-m-Y');
              $endDate9 = $fecha->addDay(7);
              $fecha9 = $endDate9->format('d-m-Y');
              $endDate10 = $fecha->addDay(7);
              $fecha10 = $endDate10->format('d-m-Y');
              $endDate11 = $fecha->addDay(7);
              $fecha11 = $endDate11->format('d-m-Y');
              $endDate12 = $fecha->addDay(7);
              $fecha12 = $endDate12->format('d-m-Y');
              $endDate13 = $fecha->addDay(7);
              $fecha13 = $endDate13->format('d-m-Y');
              $endDate14 = $fecha->addDay(7);
              $fecha14 = $endDate14->format('d-m-Y');
              $endDate15 = $fecha->addDay(7);
              $fecha15 = $endDate15->format('d-m-Y');
              $endDate16 = $fecha->addDay(7);
              $fecha16 = $endDate16->format('d-m-Y');
              $endDate17 = $fecha->addDay(7);
              $fecha17 = $endDate17->format('d-m-Y');

              $semanallevantes =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*')
                                      ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                      ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                      ->where('ponedoraslevantes.idLote', '=' , $lote->id)
                                      ->where('semanaPle' , '=' , 1)
                                      ->get();
            }
            return \View::make('Avicol/PonedorasLevante/create', compact('lotes','semanallevantes','fecha1','fecha2','fecha3','fecha4','fecha5','fecha6','fecha7','fecha8','fecha9','fecha10','fecha11','fecha12','fecha13','fecha14','fecha15','fecha16','fecha17','encasetamientoLot','guia'));
        }
        if($Lote->isEmpty() || $Sublote->isEmpty()){
          echo  '<script languaje="Javascript"> alert("Este Lote o Sublote ya fue registrado anteriormente o se encuentra en produccion"); history.back(); </script>';
        }
    }

    public function searchbuscar(Request $request)
    {
        $ponedoraslevantes = Lote::select('granjas.nombreGra', 'granjas.alturaGra' , 'municipios.nombreMun' , 'departamentos.nombreDep' , 'pais.nombrePai', 'climas.nombreCli', 'empresas.nombreEmp', 'zonas.nombreZon', 'variedads.nombreVar', 'sistemaexplotacions.nombreSis' , 'lotes.*')
                        ->join('variedads' , 'variedads.id' , '=' , 'lotes.idVariedad')
                        ->join('granjas' , 'granjas.id' , '=' , 'lotes.idGranja')
                        ->join('sistemaexplotacions' , 'sistemaexplotacions.id' , '=' , 'lotes.idSistema')
                        ->join('municipios' , 'municipios.id' , '=' , 'granjas.idMunicipio')
                        ->join('departamentos' , 'departamentos.id' , '=' , 'municipios.idDepartamento')
                        ->join('pais' , 'pais.id' , '=' , 'departamentos.idPais')
                        ->join('climas' , 'climas.id' , '=' , 'granjas.idClima')
                        ->join('empresas' , 'empresas.id' , '=' , 'granjas.idEmpresa')
                        ->join('zonas' , 'zonas.id' , '=' , 'granjas.idZona')
                        ->join('ponedoraslevantes' , 'ponedoraslevantes.idLote' , '=' , 'lotes.id')
                        ->where('nombreLot','=',$request->buscar)
                        ->where('lotes.idEstado','=', 3)
                        ->paginate(20);

        return \View::make('Avicol/PonedorasLevante/list', compact('ponedoraslevantes'));

    }

    public function enviarproduccion(Request $request, $id)
    {
      $ponedoraslevante = Ponedoraslevante::select('ponedoraslevantes.*')
                                          ->where('ponedoraslevantes.id', '=', $id)
                                          ->get();
      foreach ($ponedoraslevante as $ponedoraslevantes) {
        if ($ponedoraslevantes->idLote != null) {
          $ponedoraslevante = Ponedoraslevante::find($id);
          $ponedoraslevante->idLote;

          $lotes = Lote::find($ponedoraslevante->idLote);
          $lotes->idEstado = 4;
          $lotes->save();
          return redirect('ponedoraslevantes');
        }
        if ($ponedoraslevantes->idSublote != null) {
          $ponedoraslevante = Ponedoraslevante::find($id);
          $ponedoraslevante->idSublote;

          $sublotes = Sublote::find($ponedoraslevante->idSublote);
          $sublotes->idEstado = 4;
          $sublotes->save();
          return redirect('ponedoraslevantes');
        }
      }
    }
    public function camposcalculados(Request $request, $id)
    {
      $campos = PonedoraslevanteSemanal::select('lotes.nombreLot','lotes.pollitasLot','lotes.encasetamientoLot','ponedoraslevantes.programaPle', 'ponedoraslevantes.fotoPle', 'ponedoraslevantes.despiquePle', 'ponedoraslevantes.trasladoPle', 'ponedoraslevantes.inicioluzPle', 'ponedoraslevantes.finluzPle','ponedoraslevante_semanals.*')
                                                  ->leftjoin('ponedoraslevantes', 'ponedoraslevantes.id','=', 'ponedoraslevante_semanals.idLevante')
                                                  ->leftjoin('lotes', 'lotes.id', '=', 'ponedoraslevantes.idLote')
                                                  ->where('ponedoraslevantes.id', '=', $id)
                                                  ->get();
      $lote = PonedoraslevanteSemanal::select('lotes.nombreLot','lotes.pollitasLot','lotes.encasetamientoLot','ponedoraslevantes.programaPle', 'ponedoraslevantes.fotoPle', 'ponedoraslevantes.despiquePle', 'ponedoraslevantes.trasladoPle', 'ponedoraslevantes.inicioluzPle', 'ponedoraslevantes.finluzPle','guialevanteponedoras.semanaGul','guialevanteponedoras.avediatabGul','guialevanteponedoras.graveactabGul','guialevanteponedoras.pesotabGul','guialevanteponedoras.convsemtabGul','guialevanteponedoras.gananciaaveriatGul','guias.nombreGui','ponedoraslevante_semanals.*')
                                                  ->leftjoin('ponedoraslevantes', 'ponedoraslevantes.id','=', 'ponedoraslevante_semanals.idLevante')
                                                  ->leftjoin('guias', 'guias.id', '=', 'ponedoraslevantes.idGuia')
                                                  ->leftjoin('lotes', 'lotes.id', '=', 'ponedoraslevantes.idLote')
                                                  ->leftjoin('guialevanteponedoras', 'guialevanteponedoras.idGuia', '=', 'guias.id')
                                                  ->where('ponedoraslevantes.id', '=', $id)
                                                  ->groupBy('nombreLot')
                                                  ->get();
      $guias = Guialevanteponedora::select('guialevanteponedoras.*','ponedoraslevantes.id')
                                        ->leftjoin('guias', 'guias.id', '=', 'guialevanteponedoras.idGuia')
                                        ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.idGuia' , '=' , 'guias.id')
                                        ->where('ponedoraslevantes.id', '=', $id)
                                        ->get();

      $semanallevantes =  PonedoraslevanteSemanal::select('ponedoraslevante_semanals.*')
                                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.id' , '=' , 'ponedoraslevante_semanals.idLevante')
                                    ->where('ponedoraslevantes.id', '=' , $id)
                                    ->get();

      return view('Avicol/PonedorasLevante/campos', compact('campos','lote', 'guias', 'semanallevantes'));
    }
}
