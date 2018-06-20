<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ponedorasproduccion as Ponedorasproduccion;
use App\Models\Lote as Lote;
use App\Models\Guia as Guia;
use App\Models\Sublote as Sublote;
use App\Models\PonedoraslevanteSemanal as PonedoraslevanteSemanal;
use App\Models\PonedorasproduccionSemanal as PonedorasproduccionSemanal;
use Carbon\Carbon;

class PonedorasproduccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

     $lotes = Ponedorasproduccion::select('sublotes.nombreSub' , 'sublot.nombreLot' , 'lotes.nombreLot', 'lotes.pollitasLot', 'lotes.encasetamientoLot', 'sublot.pollitasLot as polsub', 'sublot.encasetamientoLot as encsub', 'sublot.nombreLot as nomlot', 'granjas.nombreGra', 'granjas.alturaGra' , 'municipios.nombreMun' , 'departamentos.nombreDep' , 'pais.nombrePai', 'climas.nombreCli', 'empresas.nombreEmp', 'zonas.nombreZon', 'variedads.nombreVar', 'sistemaexplotacions.nombreSis',          'grasub.nombreGra as nomgra', 'grasub.alturaGra as altgra' , 'munsub.nombreMun as nommun' , 'depsub.nombreDep as nomdep' , 'paisub.nombrePai as nompai', 'clisub.nombreCli as nomcli', 'empsub.nombreEmp as nomemp', 'zonsub.nombreZon as nomzon', 'varsub.nombreVar as nomvar', 'sissub.nombreSis as nomsis', 'guias.nombreGui' , 'ponedorasproduccions.*')
                                              ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedorasproduccions.idLote')
                                              ->leftjoin('sublotes' , 'sublotes.id' , '=' , 'ponedorasproduccions.idSublote')
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
                                              ->join('guias' , 'guias.id' , '=' , 'ponedorasproduccions.idGuia')
                                              ->where('lotes.idEstado','=', 6)
                                              ->orwhere('sublotes.idEstado' , '=' , 6)
                                              ->paginate(20);  

        return \View::make('Avicol/PonedorasProduccion/list', compact('lotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $lotes = Lote::where('nombreLot','=',$request->buscar)->get();

       return \View::make('Avicol/PonedorasProduccion/create', compact('lotes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ponedorasproduccions = new Ponedorasproduccion;
        $programano = $request->programaPpr;
        $fotoperiodo = $request->fotoperiodoPpr;

        if ($request->nombreLot != null) {
          $busqueda = Ponedorasproduccion::where('idLote' , '=' , $request->idLote)
                                  ->count() + 1;
        }
        if ($request->nombreSub != null) {
          $busqueda = Ponedorasproduccion::where('idSublote' , '=' , $request->idSublote)
                                  ->count() + 1;

        }

        if ($busqueda == 1) {
          if ($request->nombreLot != null && $request->nombreSub == null) {
            if ($programano == 'No') {

              $ponedorasproduccions->programaPpr  = $request->programaPpr;
              $ponedorasproduccions->fotoestimuloPpr  = $request->fotoestimuloPpr;
              $ponedorasproduccions->pollitasPpr  = $request->pollitasPpr;
              $ponedorasproduccions->idLote = $request->idLote;
              $ponedorasproduccions->idGuia = $request->idGuia;
              $ponedorasproduccions->save();

              $lotes = Lote::find($ponedorasproduccions->idLote);
              $lotes->idEstado = 6;
              $lotes->save();

            }
            if ($fotoperiodo != Null) {

                $ponedorasproduccions->programaPpr  = 'Si';
                $ponedorasproduccions->fotoestimuloPpr  = $request->fotoestimuloPpr;
                $ponedorasproduccions->pollitasPpr  = $request->pollitasPpr;
                $ponedorasproduccions->idLote = $request->idLote;
                $ponedorasproduccions->fotoperiodoPpr = $request->fotoperiodoPpr;
                $ponedorasproduccions->idGuia = $request->idGuia;
                $ponedorasproduccions->save();

                $lotes = Lote::find($ponedorasproduccions->idLote);
                $lotes->idEstado = 6;
                $lotes->save();
 
            }
            if ($fotoperiodo == Null) {

                $ponedorasproduccions->fotoestimuloPpr  = $request->fotoestimuloPpr;
                $ponedorasproduccions->pollitasPpr  = $request->pollitasPpr;
                $ponedorasproduccions->idLote = $request->idLote;
                $ponedorasproduccions->idGuia = $request->idGuia;
                $ponedorasproduccions->save();

                $lotes = Lote::find($ponedorasproduccions->idLote);
                $lotes->idEstado = 6;
                $lotes->save();
            }     
          }
          if ($request->nombreSub != null) {
            if ($programano == 'No') {
              $ponedorasproduccions->programaPpr  = $request->programaPpr;
              $ponedorasproduccions->fotoestimuloPpr  = $request->fotoestimuloPpr;
              $ponedorasproduccions->pollitasPpr  = $request->pollitasPpr;
              $ponedorasproduccions->idSublote = $request->idSublote;
              $ponedorasproduccions->idGuia = $request->idGuia;
              $ponedorasproduccions->save();

              $sublotes = Sublote::find($request->idSublote);
              $sublotes->idEstado = 6;
              $sublotes->save();

            }
            if ($fotoperiodo != Null) {

                $ponedorasproduccions->programaPpr  = 'Si';
                $ponedorasproduccions->fotoestimuloPpr  = $request->fotoestimuloPpr;
                $ponedorasproduccions->pollitasPpr  = $request->pollitasPpr;
                $ponedorasproduccions->idSublote = $request->idSublote;
                $ponedorasproduccions->fotoperiodoPpr = $request->fotoperiodoPpr;
                $ponedorasproduccions->idGuia = $request->idGuia;
                $ponedorasproduccions->save();

                $sublotes = Sublote::find($request->idSublote);
                $sublotes->idEstado = 6;
                $sublotes->save();
            }
            if ($fotoperiodo == Null) {

                $ponedorasproduccions->fotoestimuloPpr  = $request->fotoestimuloPpr;
                $ponedorasproduccions->pollitasPpr  = $request->pollitasPpr;
                $ponedorasproduccions->idSublote = $request->idSublote;
                $ponedorasproduccions->idGuia = $request->idGuia;
                $ponedorasproduccions->save();

                $sublotes = Sublote::find($request->idSublote);
                $sublotes->idEstado = 6;
                $sublotes->save();
            }

            $semanals = new PonedorasproduccionSemanal;
            $semanals->semanaPpr = 1;
            $semanals->dfsPpr = $request->dfsPpr;
            $semanals->semanavidaPpr = $request->semanavidaPpr;
            $semanals->huevosPpr = $request->huevosPpr;
            $semanals->consumoPpr = $request->consumoPpr;
            $semanals->mortalidadPpr = $request->mortalidadPpr;
            $semanals->seleccionPpr = $request->seleccionPpr;
            $semanals->ventasPpr = $request->ventasPpr;
            $semanals->pesoavePpr = $request->pesoavePpr;
            $semanals->pesohuevoPpr = $request->pesohuevoPpr;
            $semanals->alimentoPpr = $request->alimentoPpr;
            $semanals->ObservacionesPpr = $request->ObservacionesPpr;
            $semanals->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr !=  null || $request->semanavidaPpr !=  null || $request->huevosPpr !=  null || $request->consumoPpr !=  null || $request->mortalidadPpr !=  null || $request->seleccionPpr !=  null || $request->ventasPpr !=  null || $request->pesoavePpr !=  null || $request->pesohuevoPpr !=  null || $request->alimentoPpr !=  null || $request->ObservacionesPpr !=  null){
                $semanals->save();
            }

            $semanals1 = new PonedorasproduccionSemanal;
            $semanals1->semanaPpr = 2;
            $semanals1->dfsPpr = $request->dfsPpr1;
            $semanals1->semanavidaPpr = $request->semanavidaPpr1;
            $semanals1->huevosPpr = $request->huevosPpr1;
            $semanals1->consumoPpr = $request->consumoPpr1;
            $semanals1->mortalidadPpr = $request->mortalidadPpr1;
            $semanals1->seleccionPpr = $request->seleccionPpr1;
            $semanals1->ventasPpr = $request->ventasPpr1;
            $semanals1->pesoavePpr = $request->pesoavePpr1;
            $semanals1->pesohuevoPpr = $request->pesohuevoPpr1;
            $semanals1->alimentoPpr = $request->alimentoPpr1;
            $semanals1->ObservacionesPpr = $request->ObservacionesPpr1;
            $semanals1->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr1 !=  null || $request->semanavidaPpr1 !=  null || $request->huevosPpr1 !=  null || $request->consumoPpr1 !=  null || $request->mortalidadPpr1 !=  null || $request->seleccionPpr1 !=  null || $request->ventasPpr1 !=  null || $request->pesoavePpr1 !=  null || $request->pesohuevoPpr1 !=  null || $request->alimentoPpr1 !=  null || $request->ObservacionesPpr1 !=  null){
              $semanals1->save();
            }

            $semanals2 = new PonedorasproduccionSemanal;
            $semanals2->semanaPpr = 3;
            $semanals2->dfsPpr = $request->dfsPpr2;
            $semanals2->semanavidaPpr = $request->semanavidaPpr2;
            $semanals2->huevosPpr = $request->huevosPpr2;
            $semanals2->consumoPpr = $request->consumoPpr2;
            $semanals2->mortalidadPpr = $request->mortalidadPpr2;
            $semanals2->seleccionPpr = $request->seleccionPpr2;
            $semanals2->ventasPpr = $request->ventasPpr2;
            $semanals2->pesoavePpr = $request->pesoavePpr2;
            $semanals2->pesohuevoPpr = $request->pesohuevoPpr2;
            $semanals2->alimentoPpr = $request->alimentoPpr2;
            $semanals2->ObservacionesPpr = $request->ObservacionesPpr2;
            $semanals2->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr2 !=  null || $request->semanavidaPpr2 !=  null || $request->huevosPpr2 !=  null || $request->consumoPpr2 !=  null || $request->mortalidadPpr2 !=  null || $request->seleccionPpr2 !=  null || $request->ventasPpr2 !=  null || $request->pesoavePpr2 !=  null || $request->pesohuevoPpr2 !=  null || $request->alimentoPpr2 !=  null || $request->ObservacionesPpr2 !=  null){
              $semanals2->save();
            }

            $semanals3 = new PonedorasproduccionSemanal;
            $semanals3->semanaPpr = 4;
            $semanals3->dfsPpr = $request->dfsPpr3;
            $semanals3->semanavidaPpr = $request->semanavidaPpr3;
            $semanals3->huevosPpr = $request->huevosPpr3;
            $semanals3->consumoPpr = $request->consumoPpr3;
            $semanals3->mortalidadPpr = $request->mortalidadPpr3;
            $semanals3->seleccionPpr = $request->seleccionPpr3;
            $semanals3->ventasPpr = $request->ventasPpr3;
            $semanals3->pesoavePpr = $request->pesoavePpr3;
            $semanals3->pesohuevoPpr = $request->pesohuevoPpr3;
            $semanals3->alimentoPpr = $request->alimentoPpr3;
            $semanals3->ObservacionesPpr = $request->ObservacionesPpr3;
            $semanals3->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr3 !=  null || $request->semanavidaPpr3 !=  null || $request->huevosPpr3 !=  null || $request->consumoPpr3 !=  null || $request->mortalidadPpr3 !=  null || $request->seleccionPpr3 !=  null || $request->ventasPpr3 !=  null || $request->pesoavePpr3 !=  null || $request->pesohuevoPpr3 !=  null || $request->alimentoPpr3 !=  null || $request->ObservacionesPpr3 !=  null){
              $semanals3->save();
            }

            $semanals4 = new PonedorasproduccionSemanal;
            $semanals4->semanaPpr = 5;
            $semanals4->dfsPpr = $request->dfsPpr4;
            $semanals4->semanavidaPpr = $request->semanavidaPpr4;
            $semanals4->huevosPpr = $request->huevosPpr4;
            $semanals4->consumoPpr = $request->consumoPpr4;
            $semanals4->mortalidadPpr = $request->mortalidadPpr4;
            $semanals4->seleccionPpr = $request->seleccionPpr4;
            $semanals4->ventasPpr = $request->ventasPpr4;
            $semanals4->pesoavePpr = $request->pesoavePpr4;
            $semanals4->pesohuevoPpr = $request->pesohuevoPpr4;
            $semanals4->alimentoPpr = $request->alimentoPpr4;
            $semanals4->ObservacionesPpr = $request->ObservacionesPpr4;
            $semanals4->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr4 !=  null || $request->semanavidaPpr4 !=  null || $request->huevosPpr4 !=  null || $request->consumoPpr4 !=  null || $request->mortalidadPpr4 !=  null || $request->seleccionPpr4 !=  null || $request->ventasPpr4 !=  null || $request->pesoavePpr4 !=  null || $request->pesohuevoPpr4 !=  null || $request->alimentoPpr4 !=  null || $request->ObservacionesPpr4 !=  null){
              $semanals4->save();
            }

            $semanals5 = new PonedorasproduccionSemanal;
            $semanals5->semanaPpr = 6;
            $semanals5->dfsPpr = $request->dfsPpr5;
            $semanals5->semanavidaPpr = $request->semanavidaPpr5;
            $semanals5->huevosPpr = $request->huevosPpr5;
            $semanals5->consumoPpr = $request->consumoPpr5;
            $semanals5->mortalidadPpr = $request->mortalidadPpr5;
            $semanals5->seleccionPpr = $request->seleccionPpr5;
            $semanals5->ventasPpr = $request->ventasPpr5;
            $semanals5->pesoavePpr = $request->pesoavePpr5;
            $semanals5->pesohuevoPpr = $request->pesohuevoPpr5;
            $semanals5->alimentoPpr = $request->alimentoPpr5;
            $semanals5->ObservacionesPpr = $request->ObservacionesPpr5;
            $semanals5->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr5 !=  null || $request->semanavidaPpr5 !=  null || $request->huevosPpr5 !=  null || $request->consumoPpr5 !=  null || $request->mortalidadPpr5 !=  null || $request->seleccionPpr5 !=  null || $request->ventasPpr5 !=  null || $request->pesoavePpr5 !=  null || $request->pesohuevoPpr5 !=  null || $request->alimentoPpr5 !=  null || $request->ObservacionesPpr5 !=  null){
              $semanals5->save();
            }

            $semanals6 = new PonedorasproduccionSemanal;
            $semanals6->semanaPpr = 7;
            $semanals6->dfsPpr = $request->dfsPpr6;
            $semanals6->semanavidaPpr = $request->semanavidaPpr6;
            $semanals6->huevosPpr = $request->huevosPpr6;
            $semanals6->consumoPpr = $request->consumoPpr6;
            $semanals6->mortalidadPpr = $request->mortalidadPpr6;
            $semanals6->seleccionPpr = $request->seleccionPpr6;
            $semanals6->ventasPpr = $request->ventasPpr6;
            $semanals6->pesoavePpr = $request->pesoavePpr6;
            $semanals6->pesohuevoPpr = $request->pesohuevoPpr6;
            $semanals6->alimentoPpr = $request->alimentoPpr6;
            $semanals6->ObservacionesPpr = $request->ObservacionesPpr6;
            $semanals6->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr6 !=  null || $request->semanavidaPpr6 !=  null || $request->huevosPpr6 !=  null || $request->consumoPpr6 !=  null || $request->mortalidadPpr6 !=  null || $request->seleccionPpr6 !=  null || $request->ventasPpr6 !=  null || $request->pesoavePpr6 !=  null || $request->pesohuevoPpr6 !=  null || $request->alimentoPpr6 !=  null || $request->ObservacionesPpr6 !=  null){
              $semanals6->save();
            }

            $semanals7 = new PonedorasproduccionSemanal;
            $semanals7->semanaPpr = 8;
            $semanals7->dfsPpr = $request->dfsPpr7;
            $semanals7->semanavidaPpr = $request->semanavidaPpr7;
            $semanals7->huevosPpr = $request->huevosPpr7;
            $semanals7->consumoPpr = $request->consumoPpr7;
            $semanals7->mortalidadPpr = $request->mortalidadPpr7;
            $semanals7->seleccionPpr = $request->seleccionPpr7;
            $semanals7->ventasPpr = $request->ventasPpr7;
            $semanals7->pesoavePpr = $request->pesoavePpr7;
            $semanals7->pesohuevoPpr = $request->pesohuevoPpr7;
            $semanals7->alimentoPpr = $request->alimentoPpr7;
            $semanals7->ObservacionesPpr = $request->ObservacionesPpr7;
            $semanals7->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr7 !=  null || $request->semanavidaPpr7 !=  null || $request->huevosPpr7 !=  null || $request->consumoPpr7 !=  null || $request->mortalidadPpr7 !=  null || $request->seleccionPpr7 !=  null || $request->ventasPpr7 !=  null || $request->pesoavePpr7 !=  null || $request->pesohuevoPpr7 !=  null || $request->alimentoPpr7 !=  null || $request->ObservacionesPpr7 !=  null){
              $semanals7->save();
            }

            $semanals8 = new PonedorasproduccionSemanal;
            $semanals8->semanaPpr = 9;
            $semanals8->dfsPpr = $request->dfsPpr8;
            $semanals8->semanavidaPpr = $request->semanavidaPpr8;
            $semanals8->huevosPpr = $request->huevosPpr8;
            $semanals8->consumoPpr = $request->consumoPpr8;
            $semanals8->mortalidadPpr = $request->mortalidadPpr8;
            $semanals8->seleccionPpr = $request->seleccionPpr8;
            $semanals8->ventasPpr = $request->ventasPpr8;
            $semanals8->pesoavePpr = $request->pesoavePpr8;
            $semanals8->pesohuevoPpr = $request->pesohuevoPpr8;
            $semanals8->alimentoPpr = $request->alimentoPpr8;
            $semanals8->ObservacionesPpr = $request->ObservacionesPpr8;
            $semanals8->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr8 !=  null || $request->semanavidaPpr8 !=  null || $request->huevosPpr8 !=  null || $request->consumoPpr8 !=  null || $request->mortalidadPpr8 !=  null || $request->seleccionPpr8 !=  null || $request->ventasPpr8 !=  null || $request->pesoavePpr8 !=  null || $request->pesohuevoPpr8 !=  null || $request->alimentoPpr8 !=  null || $request->ObservacionesPpr8 !=  null){
              $semanals8->save();
            }

            $semanals9 = new PonedorasproduccionSemanal;
            $semanals9->semanaPpr = 10;
            $semanals9->dfsPpr = $request->dfsPpr9;
            $semanals9->semanavidaPpr = $request->semanavidaPpr9;
            $semanals9->huevosPpr = $request->huevosPpr9;
            $semanals9->consumoPpr = $request->consumoPpr9;
            $semanals9->mortalidadPpr = $request->mortalidadPpr9;
            $semanals9->seleccionPpr = $request->seleccionPpr9;
            $semanals9->ventasPpr = $request->ventasPpr9;
            $semanals9->pesoavePpr = $request->pesoavePpr9;
            $semanals9->pesohuevoPpr = $request->pesohuevoPpr9;
            $semanals9->alimentoPpr = $request->alimentoPpr9;
            $semanals9->ObservacionesPpr = $request->ObservacionesPpr9;
            $semanals9->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr9 !=  null || $request->semanavidaPpr9 !=  null || $request->huevosPpr9 !=  null || $request->consumoPpr9 !=  null || $request->mortalidadPpr9 !=  null || $request->seleccionPpr9 !=  null || $request->ventasPpr9 !=  null || $request->pesoavePpr9 !=  null || $request->pesohuevoPpr9 !=  null || $request->alimentoPpr9 !=  null || $request->ObservacionesPpr9 !=  null){
              $semanals9->save();
            }




            $semanals10 = new PonedorasproduccionSemanal;
            $semanals10->semanaPpr = 11;
            $semanals10->dfsPpr = $request->dfsPpr10;
            $semanals10->semanavidaPpr = $request->semanavidaPpr10;
            $semanals10->huevosPpr = $request->huevosPpr10;
            $semanals10->consumoPpr = $request->consumoPpr10;
            $semanals10->mortalidadPpr = $request->mortalidadPpr10;
            $semanals10->seleccionPpr = $request->seleccionPpr10;
            $semanals10->ventasPpr = $request->ventasPpr10;
            $semanals10->pesoavePpr = $request->pesoavePpr10;
            $semanals10->pesohuevoPpr = $request->pesohuevoPpr10;
            $semanals10->alimentoPpr = $request->alimentoPpr10;
            $semanals10->ObservacionesPpr = $request->ObservacionesPpr10;
            $semanals10->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr10 !=  null || $request->semanavidaPpr10 !=  null || $request->huevosPpr10 !=  null || $request->consumoPpr10 !=  null || $request->mortalidadPpr10 !=  null || $request->seleccionPpr10 !=  null || $request->ventasPpr10 !=  null || $request->pesoavePpr10 !=  null || $request->pesohuevoPpr10 !=  null || $request->alimentoPpr10 !=  null || $request->ObservacionesPpr10 !=  null){
              $semanals10->save();
            }

            $semanals11 = new PonedorasproduccionSemanal;
            $semanals11->semanaPpr = 12;
            $semanals11->dfsPpr = $request->dfsPpr11;
            $semanals11->semanavidaPpr = $request->semanavidaPpr11;
            $semanals11->huevosPpr = $request->huevosPpr11;
            $semanals11->consumoPpr = $request->consumoPpr11;
            $semanals11->mortalidadPpr = $request->mortalidadPpr11;
            $semanals11->seleccionPpr = $request->seleccionPpr11;
            $semanals11->ventasPpr = $request->ventasPpr11;
            $semanals11->pesoavePpr = $request->pesoavePpr11;
            $semanals11->pesohuevoPpr = $request->pesohuevoPpr11;
            $semanals11->alimentoPpr = $request->alimentoPpr11;
            $semanals11->ObservacionesPpr = $request->ObservacionesPpr11;
            $semanals11->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr11 !=  null || $request->semanavidaPpr11 !=  null || $request->huevosPpr11 !=  null || $request->consumoPpr11 !=  null || $request->mortalidadPpr11 !=  null || $request->seleccionPpr11 !=  null || $request->ventasPpr11 !=  null || $request->pesoavePpr11 !=  null || $request->pesohuevoPpr11 !=  null || $request->alimentoPpr11 !=  null || $request->ObservacionesPpr11 !=  null){
              $semanals11->save();
            }

            $semanals12 = new PonedorasproduccionSemanal;
            $semanals12->semanaPpr = 13;
            $semanals12->dfsPpr = $request->dfsPpr12;
            $semanals12->semanavidaPpr = $request->semanavidaPpr12;
            $semanals12->huevosPpr = $request->huevosPpr12;
            $semanals12->consumoPpr = $request->consumoPpr12;
            $semanals12->mortalidadPpr = $request->mortalidadPpr12;
            $semanals12->seleccionPpr = $request->seleccionPpr12;
            $semanals12->ventasPpr = $request->ventasPpr12;
            $semanals12->pesoavePpr = $request->pesoavePpr12;
            $semanals12->pesohuevoPpr = $request->pesohuevoPpr12;
            $semanals12->alimentoPpr = $request->alimentoPpr12;
            $semanals12->ObservacionesPpr = $request->ObservacionesPpr12;
            $semanals12->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr12 !=  null || $request->semanavidaPpr12 !=  null || $request->huevosPpr12 !=  null || $request->consumoPpr12 !=  null || $request->mortalidadPpr12 !=  null || $request->seleccionPpr12 !=  null || $request->ventasPpr12 !=  null || $request->pesoavePpr12 !=  null || $request->pesohuevoPpr12 !=  null || $request->alimentoPpr12 !=  null || $request->ObservacionesPpr12 !=  null){
              $semanals12->save();
            }

            $semanals13 = new PonedorasproduccionSemanal;
            $semanals13->semanaPpr = 14;
            $semanals13->dfsPpr = $request->dfsPpr14;
            $semanals13->semanavidaPpr = $request->semanavidaPpr13;
            $semanals13->huevosPpr = $request->huevosPpr13;
            $semanals13->consumoPpr = $request->consumoPpr13;
            $semanals13->mortalidadPpr = $request->mortalidadPpr13;
            $semanals13->seleccionPpr = $request->seleccionPpr13;
            $semanals13->ventasPpr = $request->ventasPpr13;
            $semanals13->pesoavePpr = $request->pesoavePpr13;
            $semanals13->pesohuevoPpr = $request->pesohuevoPpr13;
            $semanals13->alimentoPpr = $request->alimentoPpr13;
            $semanals13->ObservacionesPpr = $request->ObservacionesPpr13;
            $semanals13->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr14 !=  null || $request->semanavidaPpr13 !=  null || $request->huevosPpr13 !=  null || $request->consumoPpr13 !=  null || $request->mortalidadPpr13 !=  null || $request->seleccionPpr13 !=  null || $request->ventasPpr13 !=  null || $request->pesoavePpr13 !=  null || $request->pesohuevoPpr13 !=  null || $request->alimentoPpr13 !=  null || $request->ObservacionesPpr13 !=  null){
              $semanals13->save();
            }

            $semanals14 = new PonedorasproduccionSemanal;
            $semanals14->semanaPpr = 15;
            $semanals14->dfsPpr = $request->dfsPpr14;
            $semanals14->semanavidaPpr = $request->semanavidaPpr14;
            $semanals14->huevosPpr = $request->huevosPpr14;
            $semanals14->consumoPpr = $request->consumoPpr14;
            $semanals14->mortalidadPpr = $request->mortalidadPpr14;
            $semanals14->seleccionPpr = $request->seleccionPpr14;
            $semanals14->ventasPpr = $request->ventasPpr14;
            $semanals14->pesoavePpr = $request->pesoavePpr14;
            $semanals14->pesohuevoPpr = $request->pesohuevoPpr14;
            $semanals14->alimentoPpr = $request->alimentoPpr14;
            $semanals14->ObservacionesPpr = $request->ObservacionesPpr14;
            $semanals14->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr14 !=  null || $request->semanavidaPpr14 !=  null || $request->huevosPpr14 !=  null || $request->consumoPpr14 !=  null || $request->mortalidadPpr14 !=  null || $request->seleccionPpr14 !=  null || $request->ventasPpr14 !=  null || $request->pesoavePpr14 !=  null || $request->pesohuevoPpr14 !=  null || $request->alimentoPpr14 !=  null || $request->ObservacionesPpr14 !=  null){
              $semanals14->save();
            }

            $semanals15 = new PonedorasproduccionSemanal;
            $semanals15->semanaPpr = 16;
            $semanals15->dfsPpr = $request->dfsPpr15;
            $semanals15->semanavidaPpr = $request->semanavidaPpr15;
            $semanals15->huevosPpr = $request->huevosPpr15;
            $semanals15->consumoPpr = $request->consumoPpr15;
            $semanals15->mortalidadPpr = $request->mortalidadPpr15;
            $semanals15->seleccionPpr = $request->seleccionPpr15;
            $semanals15->ventasPpr = $request->ventasPpr15;
            $semanals15->pesoavePpr = $request->pesoavePpr15;
            $semanals15->pesohuevoPpr = $request->pesohuevoPpr15;
            $semanals15->alimentoPpr = $request->alimentoPpr15;
            $semanals15->ObservacionesPpr = $request->ObservacionesPpr15;
            $semanals15->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr15 !=  null || $request->semanavidaPpr15 !=  null || $request->huevosPpr15 !=  null || $request->consumoPpr15 !=  null || $request->mortalidadPpr15 !=  null || $request->seleccionPpr15 !=  null || $request->ventasPpr15 !=  null || $request->pesoavePpr15 !=  null || $request->pesohuevoPpr15 !=  null || $request->alimentoPpr15 !=  null || $request->ObservacionesPpr15 !=  null){
              $semanals15->save();
            }

            $semanals16 = new PonedorasproduccionSemanal;
            $semanals16->semanaPpr = 17;
            $semanals16->dfsPpr = $request->dfsPpr16;
            $semanals16->semanavidaPpr = $request->semanavidaPpr16;
            $semanals16->huevosPpr = $request->huevosPpr16;
            $semanals16->consumoPpr = $request->consumoPpr16;
            $semanals16->mortalidadPpr = $request->mortalidadPpr16;
            $semanals16->seleccionPpr = $request->seleccionPpr16;
            $semanals16->ventasPpr = $request->ventasPpr16;
            $semanals16->pesoavePpr = $request->pesoavePpr16;
            $semanals16->pesohuevoPpr = $request->pesohuevoPpr16;
            $semanals16->alimentoPpr = $request->alimentoPpr16;
            $semanals16->ObservacionesPpr = $request->ObservacionesPpr16;
            $semanals16->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr16 !=  null || $request->semanavidaPpr16 !=  null || $request->huevosPpr16 !=  null || $request->consumoPpr16 !=  null || $request->mortalidadPpr16 !=  null || $request->seleccionPpr16 !=  null || $request->ventasPpr16 !=  null || $request->pesoavePpr16 !=  null || $request->pesohuevoPpr16 !=  null || $request->alimentoPpr16 !=  null || $request->ObservacionesPpr16 !=  null){
              $semanals16->save();
            }

            $semanals17 = new PonedorasproduccionSemanal;
            $semanals17->semanaPpr = 18;
            $semanals17->dfsPpr = $request->dfsPpr17;
            $semanals17->semanavidaPpr = $request->semanavidaPpr17;
            $semanals17->huevosPpr = $request->huevosPpr17;
            $semanals17->consumoPpr = $request->consumoPpr17;
            $semanals17->mortalidadPpr = $request->mortalidadPpr17;
            $semanals17->seleccionPpr = $request->seleccionPpr17;
            $semanals17->ventasPpr = $request->ventasPpr17;
            $semanals17->pesoavePpr = $request->pesoavePpr17;
            $semanals17->pesohuevoPpr = $request->pesohuevoPpr17;
            $semanals17->alimentoPpr = $request->alimentoPpr17;
            $semanals17->ObservacionesPpr = $request->ObservacionesPpr17;
            $semanals17->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr17 !=  null || $request->semanavidaPpr17 !=  null || $request->huevosPpr17 !=  null || $request->consumoPpr17 !=  null || $request->mortalidadPpr17 !=  null || $request->seleccionPpr17 !=  null || $request->ventasPpr17 !=  null || $request->pesoavePpr17 !=  null || $request->pesohuevoPpr17 !=  null || $request->alimentoPpr17 !=  null || $request->ObservacionesPpr17 !=  null){
              $semanals17->save();
            }

            $semanals18 = new PonedorasproduccionSemanal;
            $semanals18->semanaPpr = 19;
            $semanals18->dfsPpr = $request->dfsPpr18;
            $semanals18->semanavidaPpr = $request->semanavidaPpr18;
            $semanals18->huevosPpr = $request->huevosPpr18;
            $semanals18->consumoPpr = $request->consumoPpr18;
            $semanals18->mortalidadPpr = $request->mortalidadPpr18;
            $semanals18->seleccionPpr = $request->seleccionPpr18;
            $semanals18->ventasPpr = $request->ventasPpr18;
            $semanals18->pesoavePpr = $request->pesoavePpr18;
            $semanals18->pesohuevoPpr = $request->pesohuevoPpr18;
            $semanals18->alimentoPpr = $request->alimentoPpr18;
            $semanals18->ObservacionesPpr = $request->ObservacionesPpr18;
            $semanals18->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr18 !=  null || $request->semanavidaPpr18 !=  null || $request->huevosPpr18 !=  null || $request->consumoPpr18 !=  null || $request->mortalidadPpr18 !=  null || $request->seleccionPpr18 !=  null || $request->ventasPpr18 !=  null || $request->pesoavePpr18 !=  null || $request->pesohuevoPpr18 !=  null || $request->alimentoPpr18 !=  null || $request->ObservacionesPpr18 !=  null){
              $semanals18->save();
            }

            $semanals19 = new PonedorasproduccionSemanal;
            $semanals19->semanaPpr = 20;
            $semanals19->dfsPpr = $request->dfsPpr19;
            $semanals19->semanavidaPpr = $request->semanavidaPpr19;
            $semanals19->huevosPpr = $request->huevosPpr19;
            $semanals19->consumoPpr = $request->consumoPpr19;
            $semanals19->mortalidadPpr = $request->mortalidadPpr19;
            $semanals19->seleccionPpr = $request->seleccionPpr19;
            $semanals19->ventasPpr = $request->ventasPpr19;
            $semanals19->pesoavePpr = $request->pesoavePpr19;
            $semanals19->pesohuevoPpr = $request->pesohuevoPpr19;
            $semanals19->alimentoPpr = $request->alimentoPpr19;
            $semanals19->ObservacionesPpr = $request->ObservacionesPpr19;
            $semanals19->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr19 !=  null || $request->semanavidaPpr19 !=  null || $request->huevosPpr19 !=  null || $request->consumoPpr19 !=  null || $request->mortalidadPpr19 !=  null || $request->seleccionPpr19 !=  null || $request->ventasPpr19 !=  null || $request->pesoavePpr19 !=  null || $request->pesohuevoPpr19 !=  null || $request->alimentoPpr19 !=  null || $request->ObservacionesPpr19 !=  null){
              $semanals19->save();
            }

            $semanals20 = new PonedorasproduccionSemanal;
            $semanals20->semanaPpr = 21;
            $semanals20->dfsPpr = $request->dfsPpr20;
            $semanals20->semanavidaPpr = $request->semanavidaPpr20;
            $semanals20->huevosPpr = $request->huevosPpr20;
            $semanals20->consumoPpr = $request->consumoPpr20;
            $semanals20->mortalidadPpr = $request->mortalidadPpr20;
            $semanals20->seleccionPpr = $request->seleccionPpr20;
            $semanals20->ventasPpr = $request->ventasPpr20;
            $semanals20->pesoavePpr = $request->pesoavePpr20;
            $semanals20->pesohuevoPpr = $request->pesohuevoPpr20;
            $semanals20->alimentoPpr = $request->alimentoPpr20;
            $semanals20->ObservacionesPpr = $request->ObservacionesPpr20;
            $semanals20->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr20 !=  null || $request->semanavidaPpr20 !=  null || $request->huevosPpr20 !=  null || $request->consumoPpr20 !=  null || $request->mortalidadPpr20 !=  null || $request->seleccionPpr20 !=  null || $request->ventasPpr20 !=  null || $request->pesoavePpr20 !=  null || $request->pesohuevoPpr20 !=  null || $request->alimentoPpr20 !=  null || $request->ObservacionesPpr20 !=  null){
              $semanals20->save();
            }

            $semanals21 = new PonedorasproduccionSemanal;
            $semanals21->semanaPpr = 22;
            $semanals21->dfsPpr = $request->dfsPpr21;
            $semanals21->semanavidaPpr = $request->semanavidaPpr21;
            $semanals21->huevosPpr = $request->huevosPpr21;
            $semanals21->consumoPpr = $request->consumoPpr21;
            $semanals21->mortalidadPpr = $request->mortalidadPpr21;
            $semanals21->seleccionPpr = $request->seleccionPpr21;
            $semanals21->ventasPpr = $request->ventasPpr21;
            $semanals21->pesoavePpr = $request->pesoavePpr21;
            $semanals21->pesohuevoPpr = $request->pesohuevoPpr21;
            $semanals21->alimentoPpr = $request->alimentoPpr21;
            $semanals21->ObservacionesPpr = $request->ObservacionesPpr21;
            $semanals21->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr21 !=  null || $request->semanavidaPpr21 !=  null || $request->huevosPpr21 !=  null || $request->consumoPpr21 !=  null || $request->mortalidadPpr21 !=  null || $request->seleccionPpr21 !=  null || $request->ventasPpr21 !=  null || $request->pesoavePpr21 !=  null || $request->pesohuevoPpr21 !=  null || $request->alimentoPpr21 !=  null || $request->ObservacionesPpr21 !=  null){
              $semanals21->save();
            }

            $semanals22 = new PonedorasproduccionSemanal;
            $semanals22->semanaPpr = 23;
            $semanals22->dfsPpr = $request->dfsPpr22;
            $semanals22->semanavidaPpr = $request->semanavidaPpr22;
            $semanals22->huevosPpr = $request->huevosPpr22;
            $semanals22->consumoPpr = $request->consumoPpr22;
            $semanals22->mortalidadPpr = $request->mortalidadPpr22;
            $semanals22->seleccionPpr = $request->seleccionPpr22;
            $semanals22->ventasPpr = $request->ventasPpr22;
            $semanals22->pesoavePpr = $request->pesoavePpr22;
            $semanals22->pesohuevoPpr = $request->pesohuevoPpr22;
            $semanals22->alimentoPpr = $request->alimentoPpr22;
            $semanals22->ObservacionesPpr = $request->ObservacionesPpr22;
            $semanals22->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr22 !=  null || $request->semanavidaPpr22 !=  null || $request->huevosPpr22 !=  null || $request->consumoPpr22 !=  null || $request->mortalidadPpr22 !=  null || $request->seleccionPpr22 !=  null || $request->ventasPpr22 !=  null || $request->pesoavePpr22 !=  null || $request->pesohuevoPpr22 !=  null || $request->alimentoPpr22 !=  null || $request->ObservacionesPpr22 !=  null){
              $semanals22->save();
            }

            $semanals23 = new PonedorasproduccionSemanal;
            $semanals23->semanaPpr = 24;
            $semanals23->dfsPpr = $request->dfsPpr23;
            $semanals23->semanavidaPpr = $request->semanavidaPpr23;
            $semanals23->huevosPpr = $request->huevosPpr23;
            $semanals23->consumoPpr = $request->consumoPpr23;
            $semanals23->mortalidadPpr = $request->mortalidadPpr23;
            $semanals23->seleccionPpr = $request->seleccionPpr23;
            $semanals23->ventasPpr = $request->ventasPpr23;
            $semanals23->pesoavePpr = $request->pesoavePpr23;
            $semanals23->pesohuevoPpr = $request->pesohuevoPpr23;
            $semanals23->alimentoPpr = $request->alimentoPpr23;
            $semanals23->ObservacionesPpr = $request->ObservacionesPpr23;
            $semanals23->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr23 !=  null || $request->semanavidaPpr23 !=  null || $request->huevosPpr23 !=  null || $request->consumoPpr23 !=  null || $request->mortalidadPpr23 !=  null || $request->seleccionPpr23 !=  null || $request->ventasPpr23 !=  null || $request->pesoavePpr23 !=  null || $request->pesohuevoPpr23 !=  null || $request->alimentoPpr23 !=  null || $request->ObservacionesPpr23 !=  null){
              $semanals23->save();
            }

            $semanals24 = new PonedorasproduccionSemanal;
            $semanals24->semanaPpr = 25;
            $semanals24->dfsPpr = $request->dfsPpr24;
            $semanals24->semanavidaPpr = $request->semanavidaPpr24;
            $semanals24->huevosPpr = $request->huevosPpr24;
            $semanals24->consumoPpr = $request->consumoPpr24;
            $semanals24->mortalidadPpr = $request->mortalidadPpr24;
            $semanals24->seleccionPpr = $request->seleccionPpr24;
            $semanals24->ventasPpr = $request->ventasPpr24;
            $semanals24->pesoavePpr = $request->pesoavePpr24;
            $semanals24->pesohuevoPpr = $request->pesohuevoPpr24;
            $semanals24->alimentoPpr = $request->alimentoPpr24;
            $semanals24->ObservacionesPpr = $request->ObservacionesPpr24;
            $semanals24->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr24 !=  null || $request->semanavidaPpr24 !=  null || $request->huevosPpr24 !=  null || $request->consumoPpr24 !=  null || $request->mortalidadPpr24 !=  null || $request->seleccionPpr24 !=  null || $request->ventasPpr24 !=  null || $request->pesoavePpr24 !=  null || $request->pesohuevoPpr24 !=  null || $request->alimentoPpr24 !=  null || $request->ObservacionesPpr24 !=  null){
              $semanals24->save();
            }

            $semanals25 = new PonedorasproduccionSemanal;
            $semanals25->semanaPpr = 26;
            $semanals25->dfsPpr = $request->dfsPpr25;
            $semanals25->semanavidaPpr = $request->semanavidaPpr25;
            $semanals25->huevosPpr = $request->huevosPpr25;
            $semanals25->consumoPpr = $request->consumoPpr25;
            $semanals25->mortalidadPpr = $request->mortalidadPpr25;
            $semanals25->seleccionPpr = $request->seleccionPpr25;
            $semanals25->ventasPpr = $request->ventasPpr25;
            $semanals25->pesoavePpr = $request->pesoavePpr25;
            $semanals25->pesohuevoPpr = $request->pesohuevoPpr25;
            $semanals25->alimentoPpr = $request->alimentoPpr25;
            $semanals25->ObservacionesPpr = $request->ObservacionesPpr25;
            $semanals25->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr25 !=  null || $request->semanavidaPpr25 !=  null || $request->huevosPpr25 !=  null || $request->consumoPpr25 !=  null || $request->mortalidadPpr25 !=  null || $request->seleccionPpr25 !=  null || $request->ventasPpr25 !=  null || $request->pesoavePpr25 !=  null || $request->pesohuevoPpr25 !=  null || $request->alimentoPpr25 !=  null || $request->ObservacionesPpr25 !=  null){
              $semanals25->save();
            }

            $semanals26 = new PonedorasproduccionSemanal;
            $semanals26->semanaPpr = 27;
            $semanals26->dfsPpr = $request->dfsPpr26;
            $semanals26->semanavidaPpr = $request->semanavidaPpr26;
            $semanals26->huevosPpr = $request->huevosPpr26;
            $semanals26->consumoPpr = $request->consumoPpr26;
            $semanals26->mortalidadPpr = $request->mortalidadPpr26;
            $semanals26->seleccionPpr = $request->seleccionPpr26;
            $semanals26->ventasPpr = $request->ventasPpr26;
            $semanals26->pesoavePpr = $request->pesoavePpr26;
            $semanals26->pesohuevoPpr = $request->pesohuevoPpr26;
            $semanals26->alimentoPpr = $request->alimentoPpr26;
            $semanals26->ObservacionesPpr = $request->ObservacionesPpr26;
            $semanals26->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr26 !=  null || $request->semanavidaPpr26 !=  null || $request->huevosPpr26 !=  null || $request->consumoPpr26 !=  null || $request->mortalidadPpr26 !=  null || $request->seleccionPpr26 !=  null || $request->ventasPpr26 !=  null || $request->pesoavePpr26 !=  null || $request->pesohuevoPpr26 !=  null || $request->alimentoPpr26 !=  null || $request->ObservacionesPpr26 !=  null){
              $semanals26->save();
            }

            $semanals27 = new PonedorasproduccionSemanal;
            $semanals27->semanaPpr = 28;
            $semanals27->dfsPpr = $request->dfsPpr27;
            $semanals27->semanavidaPpr = $request->semanavidaPpr27;
            $semanals27->huevosPpr = $request->huevosPpr27;
            $semanals27->consumoPpr = $request->consumoPpr27;
            $semanals27->mortalidadPpr = $request->mortalidadPpr27;
            $semanals27->seleccionPpr = $request->seleccionPpr27;
            $semanals27->ventasPpr = $request->ventasPpr27;
            $semanals27->pesoavePpr = $request->pesoavePpr27;
            $semanals27->pesohuevoPpr = $request->pesohuevoPpr27;
            $semanals27->alimentoPpr = $request->alimentoPpr27;
            $semanals27->ObservacionesPpr = $request->ObservacionesPpr27;
            $semanals27->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr27 !=  null || $request->semanavidaPpr27 !=  null || $request->huevosPpr27 !=  null || $request->consumoPpr27 !=  null || $request->mortalidadPpr27 !=  null || $request->seleccionPpr27 !=  null || $request->ventasPpr27 !=  null || $request->pesoavePpr27 !=  null || $request->pesohuevoPpr27 !=  null || $request->alimentoPpr27 !=  null || $request->ObservacionesPpr27 !=  null){
              $semanals27->save();
            }

            $semanals28 = new PonedorasproduccionSemanal;
            $semanals28->semanaPpr = 29;
            $semanals28->dfsPpr = $request->dfsPpr28;
            $semanals28->semanavidaPpr = $request->semanavidaPpr28;
            $semanals28->huevosPpr = $request->huevosPpr28;
            $semanals28->consumoPpr = $request->consumoPpr28;
            $semanals28->mortalidadPpr = $request->mortalidadPpr28;
            $semanals28->seleccionPpr = $request->seleccionPpr28;
            $semanals28->ventasPpr = $request->ventasPpr28;
            $semanals28->pesoavePpr = $request->pesoavePpr28;
            $semanals28->pesohuevoPpr = $request->pesohuevoPpr28;
            $semanals28->alimentoPpr = $request->alimentoPpr28;
            $semanals28->ObservacionesPpr = $request->ObservacionesPpr28;
            $semanals28->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr28 !=  null || $request->semanavidaPpr28 !=  null || $request->huevosPpr28 !=  null || $request->consumoPpr28 !=  null || $request->mortalidadPpr28 !=  null || $request->seleccionPpr28 !=  null || $request->ventasPpr28 !=  null || $request->pesoavePpr28 !=  null || $request->pesohuevoPpr28 !=  null || $request->alimentoPpr28 !=  null || $request->ObservacionesPpr28 !=  null){
              $semanals28->save();
            }

            $semanals29 = new PonedorasproduccionSemanal;
            $semanals29->semanaPpr = 30;
            $semanals29->dfsPpr = $request->dfsPpr29;
            $semanals29->semanavidaPpr = $request->semanavidaPpr29;
            $semanals29->huevosPpr = $request->huevosPpr29;
            $semanals29->consumoPpr = $request->consumoPpr29;
            $semanals29->mortalidadPpr = $request->mortalidadPpr29;
            $semanals29->seleccionPpr = $request->seleccionPpr29;
            $semanals29->ventasPpr = $request->ventasPpr29;
            $semanals29->pesoavePpr = $request->pesoavePpr29;
            $semanals29->pesohuevoPpr = $request->pesohuevoPpr29;
            $semanals29->alimentoPpr = $request->alimentoPpr29;
            $semanals29->ObservacionesPpr = $request->ObservacionesPpr29;
            $semanals29->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr29 !=  null || $request->semanavidaPpr29 !=  null || $request->huevosPpr29 !=  null || $request->consumoPpr29 !=  null || $request->mortalidadPpr29 !=  null || $request->seleccionPpr29 !=  null || $request->ventasPpr29 !=  null || $request->pesoavePpr29 !=  null || $request->pesohuevoPpr29 !=  null || $request->alimentoPpr29 !=  null || $request->ObservacionesPpr29 !=  null){
              $semanals29->save();
            }

            $semanals30 = new PonedorasproduccionSemanal;
            $semanals30->semanaPpr = 31;
            $semanals30->dfsPpr = $request->dfsPpr30;
            $semanals30->semanavidaPpr = $request->semanavidaPpr30;
            $semanals30->huevosPpr = $request->huevosPpr30;
            $semanals30->consumoPpr = $request->consumoPpr30;
            $semanals30->mortalidadPpr = $request->mortalidadPpr30;
            $semanals30->seleccionPpr = $request->seleccionPpr30;
            $semanals30->ventasPpr = $request->ventasPpr30;
            $semanals30->pesoavePpr = $request->pesoavePpr30;
            $semanals30->pesohuevoPpr = $request->pesohuevoPpr30;
            $semanals30->alimentoPpr = $request->alimentoPpr30;
            $semanals30->ObservacionesPpr = $request->ObservacionesPpr30;
            $semanals30->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr30 !=  null || $request->semanavidaPpr30 !=  null || $request->huevosPpr30 !=  null || $request->consumoPpr30 !=  null || $request->mortalidadPpr30 !=  null || $request->seleccionPpr30 !=  null || $request->ventasPpr30 !=  null || $request->pesoavePpr30 !=  null || $request->pesohuevoPpr30 !=  null || $request->alimentoPpr30 !=  null || $request->ObservacionesPpr30 !=  null){
              $semanals30->save();
            }

            $semanals31 = new PonedorasproduccionSemanal;
            $semanals31->semanaPpr = 32;
            $semanals31->dfsPpr = $request->dfsPpr31;
            $semanals31->semanavidaPpr = $request->semanavidaPpr31;
            $semanals31->huevosPpr = $request->huevosPpr31;
            $semanals31->consumoPpr = $request->consumoPpr31;
            $semanals31->mortalidadPpr = $request->mortalidadPpr31;
            $semanals31->seleccionPpr = $request->seleccionPpr31;
            $semanals31->ventasPpr = $request->ventasPpr31;
            $semanals31->pesoavePpr = $request->pesoavePpr31;
            $semanals31->pesohuevoPpr = $request->pesohuevoPpr31;
            $semanals31->alimentoPpr = $request->alimentoPpr31;
            $semanals31->ObservacionesPpr = $request->ObservacionesPpr31;
            $semanals31->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr31 !=  null || $request->semanavidaPpr31 !=  null || $request->huevosPpr31 !=  null || $request->consumoPpr31 !=  null || $request->mortalidadPpr31 !=  null || $request->seleccionPpr31 !=  null || $request->ventasPpr31 !=  null || $request->pesoavePpr31 !=  null || $request->pesohuevoPpr31 !=  null || $request->alimentoPpr31 !=  null || $request->ObservacionesPpr31 !=  null){
              $semanals31->save();
            }

            $semanals32 = new PonedorasproduccionSemanal;
            $semanals32->semanaPpr = 33;
            $semanals32->dfsPpr = $request->dfsPpr32;
            $semanals32->semanavidaPpr = $request->semanavidaPpr32;
            $semanals32->huevosPpr = $request->huevosPpr32;
            $semanals32->consumoPpr = $request->consumoPpr32;
            $semanals32->mortalidadPpr = $request->mortalidadPpr32;
            $semanals32->seleccionPpr = $request->seleccionPpr32;
            $semanals32->ventasPpr = $request->ventasPpr32;
            $semanals32->pesoavePpr = $request->pesoavePpr32;
            $semanals32->pesohuevoPpr = $request->pesohuevoPpr32;
            $semanals32->alimentoPpr = $request->alimentoPpr32;
            $semanals32->ObservacionesPpr = $request->ObservacionesPpr32;
            $semanals32->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr32 !=  null || $request->semanavidaPpr32 !=  null || $request->huevosPpr32 !=  null || $request->consumoPpr32 !=  null || $request->mortalidadPpr32 !=  null || $request->seleccionPpr32 !=  null || $request->ventasPpr32 !=  null || $request->pesoavePpr32 !=  null || $request->pesohuevoPpr32 !=  null || $request->alimentoPpr32 !=  null || $request->ObservacionesPpr32 !=  null){
              $semanals32->save();
            }

            $semanals33 = new PonedorasproduccionSemanal;
            $semanals33->semanaPpr = 34;
            $semanals33->dfsPpr = $request->dfsPpr33;
            $semanals33->semanavidaPpr = $request->semanavidaPpr33;
            $semanals33->huevosPpr = $request->huevosPpr33;
            $semanals33->consumoPpr = $request->consumoPpr33;
            $semanals33->mortalidadPpr = $request->mortalidadPpr33;
            $semanals33->seleccionPpr = $request->seleccionPpr33;
            $semanals33->ventasPpr = $request->ventasPpr33;
            $semanals33->pesoavePpr = $request->pesoavePpr33;
            $semanals33->pesohuevoPpr = $request->pesohuevoPpr33;
            $semanals33->alimentoPpr = $request->alimentoPpr33;
            $semanals33->ObservacionesPpr = $request->ObservacionesPpr33;
            $semanals33->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr33 !=  null || $request->semanavidaPpr33 !=  null || $request->huevosPpr33 !=  null || $request->consumoPpr33 !=  null || $request->mortalidadPpr33 !=  null || $request->seleccionPpr33 !=  null || $request->ventasPpr33 !=  null || $request->pesoavePpr33 !=  null || $request->pesohuevoPpr33 !=  null || $request->alimentoPpr33 !=  null || $request->ObservacionesPpr33 !=  null){
              $semanals33->save();
            }

            $semanals34 = new PonedorasproduccionSemanal;
            $semanals34->semanaPpr = 35;
            $semanals34->dfsPpr = $request->dfsPpr34;
            $semanals34->semanavidaPpr = $request->semanavidaPpr34;
            $semanals34->huevosPpr = $request->huevosPpr34;
            $semanals34->consumoPpr = $request->consumoPpr34;
            $semanals34->mortalidadPpr = $request->mortalidadPpr34;
            $semanals34->seleccionPpr = $request->seleccionPpr34;
            $semanals34->ventasPpr = $request->ventasPpr34;
            $semanals34->pesoavePpr = $request->pesoavePpr34;
            $semanals34->pesohuevoPpr = $request->pesohuevoPpr34;
            $semanals34->alimentoPpr = $request->alimentoPpr34;
            $semanals34->ObservacionesPpr = $request->ObservacionesPpr34;
            $semanals34->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr34 !=  null || $request->semanavidaPpr34 !=  null || $request->huevosPpr34 !=  null || $request->consumoPpr34 !=  null || $request->mortalidadPpr34 !=  null || $request->seleccionPpr34 !=  null || $request->ventasPpr34 !=  null || $request->pesoavePpr34 !=  null || $request->pesohuevoPpr34 !=  null || $request->alimentoPpr34 !=  null || $request->ObservacionesPpr34 !=  null){
              $semanals34->save();
            }

            $semanals35 = new PonedorasproduccionSemanal;
            $semanals35->semanaPpr = 36;
            $semanals35->dfsPpr = $request->dfsPpr35;
            $semanals35->semanavidaPpr = $request->semanavidaPpr35;
            $semanals35->huevosPpr = $request->huevosPpr35;
            $semanals35->consumoPpr = $request->consumoPpr35;
            $semanals35->mortalidadPpr = $request->mortalidadPpr35;
            $semanals35->seleccionPpr = $request->seleccionPpr35;
            $semanals35->ventasPpr = $request->ventasPpr35;
            $semanals35->pesoavePpr = $request->pesoavePpr35;
            $semanals35->pesohuevoPpr = $request->pesohuevoPpr35;
            $semanals35->alimentoPpr = $request->alimentoPpr35;
            $semanals35->ObservacionesPpr = $request->ObservacionesPpr35;
            $semanals35->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr35 !=  null || $request->semanavidaPpr35 !=  null || $request->huevosPpr35 !=  null || $request->consumoPpr35 !=  null || $request->mortalidadPpr35 !=  null || $request->seleccionPpr35 !=  null || $request->ventasPpr35 !=  null || $request->pesoavePpr35 !=  null || $request->pesohuevoPpr35 !=  null || $request->alimentoPpr35 !=  null || $request->ObservacionesPpr35 !=  null){
              $semanals35->save();
            }

            $semanals36 = new PonedorasproduccionSemanal;
            $semanals36->semanaPpr = 37;
            $semanals36->dfsPpr = $request->dfsPpr36;
            $semanals36->semanavidaPpr = $request->semanavidaPpr36;
            $semanals36->huevosPpr = $request->huevosPpr36;
            $semanals36->consumoPpr = $request->consumoPpr36;
            $semanals36->mortalidadPpr = $request->mortalidadPpr36;
            $semanals36->seleccionPpr = $request->seleccionPpr36;
            $semanals36->ventasPpr = $request->ventasPpr36;
            $semanals36->pesoavePpr = $request->pesoavePpr36;
            $semanals36->pesohuevoPpr = $request->pesohuevoPpr36;
            $semanals36->alimentoPpr = $request->alimentoPpr36;
            $semanals36->ObservacionesPpr = $request->ObservacionesPpr36;
            $semanals36->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr36 !=  null || $request->semanavidaPpr36 !=  null || $request->huevosPpr36 !=  null || $request->consumoPpr36 !=  null || $request->mortalidadPpr36 !=  null || $request->seleccionPpr36 !=  null || $request->ventasPpr36 !=  null || $request->pesoavePpr36 !=  null || $request->pesohuevoPpr36 !=  null || $request->alimentoPpr36 !=  null || $request->ObservacionesPpr36 !=  null){
              $semanals36->save();
            }

            $semanals37 = new PonedorasproduccionSemanal;
            $semanals37->semanaPpr = 38;
            $semanals37->dfsPpr = $request->dfsPpr37;
            $semanals37->semanavidaPpr = $request->semana38vidaPp7;
            $semanals37->huevosPpr = $request->huevosPpr37;
            $semanals37->consumoPpr = $request->consumoPpr37;
            $semanals37->mortalidadPpr = $request->mortalidadPp387;
            $semanals37->seleccionPpr = $request->selecci38onPp7;
            $semanals37->ventasPpr = $request->ventasPpr37;
            $semanals37->pesoavePpr = $request->pesoavePpr37;
            $semanals37->pesohuevoPpr = $request->pesohuevoPp387;
            $semanals37->alimentoPpr = $request->alimentoPpr37;
            $semanals37->ObservacionesPpr = $request->ObservacionesPpr37;
            $semanals37->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr37 !=  null || $request->semanavidaPpr37 !=  null || $request->huevosPpr37 !=  null || $request->consumoPpr37 !=  null || $request->mortalidadPpr37 !=  null || $request->seleccionPpr37 !=  null || $request->ventasPpr37 !=  null || $request->pesoavePpr37 !=  null || $request->pesohuevoPpr37 !=  null || $request->alimentoPpr37 !=  null || $request->ObservacionesPpr37 !=  null){
              $semanals37->save();
            }

            $semanals38 = new PonedorasproduccionSemanal;
            $semanals38->semanaPpr = 39;
            $semanals38->dfsPpr = $request->dfsPpr38;
            $semanals38->semanavidaPpr = $request->semana39vidaPp8;
            $semanals38->huevosPpr = $request->huevosPpr38;
            $semanals38->consumoPpr = $request->consumoPpr38;
            $semanals38->mortalidadPpr = $request->mortalidadPp398;
            $semanals38->seleccionPpr = $request->selecci39onPp8;
            $semanals38->ventasPpr = $request->ventasPpr38;
            $semanals38->pesoavePpr = $request->pesoavePpr38;
            $semanals38->pesohuevoPpr = $request->pesohuevoPp38;
            $semanals38->alimentoPpr = $request->alimentoPpr38;
            $semanals38->ObservacionesPpr = $request->ObservacionesPpr38;
            $semanals38->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr38 !=  null || $request->semanavidaPpr38 !=  null || $request->huevosPpr38 !=  null || $request->consumoPpr38 !=  null || $request->mortalidadPpr38 !=  null || $request->seleccionPpr38 !=  null || $request->ventasPpr38 !=  null || $request->pesoavePpr38 !=  null || $request->pesohuevoPpr38 !=  null || $request->alimentoPpr38 !=  null || $request->ObservacionesPpr38 !=  null){
              $semanals38->save();
            }

            $semanals39 = new PonedorasproduccionSemanal;
            $semanals39->semanaPpr = 40;
            $semanals39->dfsPpr = $request->dfsPpr39;
            $semanals39->semanavidaPpr = $request->semanavidaPpr39;
            $semanals39->huevosPpr = $request->huevosPpr39;
            $semanals39->consumoPpr = $request->consumoPpr39;
            $semanals39->mortalidadPpr = $request->mortalidadPpr39;
            $semanals39->seleccionPpr = $request->seleccionPpr39;
            $semanals39->ventasPpr = $request->ventasPpr39;
            $semanals39->pesoavePpr = $request->pesoavePpr39;
            $semanals39->pesohuevoPpr = $request->pesohuevoPpr39;
            $semanals39->alimentoPpr = $request->alimentoPpr39;
            $semanals39->ObservacionesPpr = $request->ObservacionesPpr39;
            $semanals39->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr40 !=  null || $request->semanavidaPpr40 !=  null || $request->huevosPpr40 !=  null || $request->consumoPpr40 !=  null || $request->mortalidadPpr40 !=  null || $request->seleccionPpr40 !=  null || $request->ventasPpr40 !=  null || $request->pesoavePpr40 !=  null || $request->pesohuevoPpr40 !=  null || $request->alimentoPpr40 !=  null || $request->ObservacionesPpr40 !=  null){
              $semanals39->save();
            }

            $semanals40 = new PonedorasproduccionSemanal;
            $semanals40->semanaPpr = 41;
            $semanals40->dfsPpr = $request->dfsPpr40;
            $semanals40->semanavidaPpr = $request->semanavidaPpr40;
            $semanals40->huevosPpr = $request->huevosPpr40;
            $semanals40->consumoPpr = $request->consumoPpr40;
            $semanals40->mortalidadPpr = $request->mortalidadPpr40;
            $semanals40->seleccionPpr = $request->seleccionPpr40;
            $semanals40->ventasPpr = $request->ventasPpr40;
            $semanals40->pesoavePpr = $request->pesoavePpr40;
            $semanals40->pesohuevoPpr = $request->pesohuevoPpr40;
            $semanals40->alimentoPpr = $request->alimentoPpr40;
            $semanals40->ObservacionesPpr = $request->ObservacionesPpr40;
            $semanals40->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr40 !=  null || $request->semanavidaPpr40 !=  null || $request->huevosPpr40 !=  null || $request->consumoPpr40 !=  null || $request->mortalidadPpr40 !=  null || $request->seleccionPpr40 !=  null || $request->ventasPpr40 !=  null || $request->pesoavePpr40 !=  null || $request->pesohuevoPpr40 !=  null || $request->alimentoPpr40 !=  null || $request->ObservacionesPpr40 !=  null){
              $semanals40->save();
            }

            $semanals41 = new PonedorasproduccionSemanal;
            $semanals41->semanaPpr = 42;
            $semanals41->dfsPpr = $request->dfsPpr41;
            $semanals41->semanavidaPpr = $request->semanavidaPpr41;
            $semanals41->huevosPpr = $request->huevosPpr41;
            $semanals41->consumoPpr = $request->consumoPpr41;
            $semanals41->mortalidadPpr = $request->mortalidadPpr41;
            $semanals41->seleccionPpr = $request->seleccionPpr41;
            $semanals41->ventasPpr = $request->ventasPpr41;
            $semanals41->pesoavePpr = $request->pesoavePpr41;
            $semanals41->pesohuevoPpr = $request->pesohuevoPpr41;
            $semanals41->alimentoPpr = $request->alimentoPpr41;
            $semanals41->ObservacionesPpr = $request->ObservacionesPpr41;
            $semanals41->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr41 !=  null || $request->semanavidaPpr41 !=  null || $request->huevosPpr41 !=  null || $request->consumoPpr41 !=  null || $request->mortalidadPpr41 !=  null || $request->seleccionPpr41 !=  null || $request->ventasPpr41 !=  null || $request->pesoavePpr41 !=  null || $request->pesohuevoPpr41 !=  null || $request->alimentoPpr41 !=  null || $request->ObservacionesPpr41 !=  null){
              $semanals41->save();
            }

            $semanals42 = new PonedorasproduccionSemanal;
            $semanals42->semanaPpr = 43;
            $semanals42->dfsPpr = $request->dfsPpr42;
            $semanals42->semanavidaPpr = $request->semanavidaPpr42;
            $semanals42->huevosPpr = $request->huevosPpr42;
            $semanals42->consumoPpr = $request->consumoPpr42;
            $semanals42->mortalidadPpr = $request->mortalidadPpr42;
            $semanals42->seleccionPpr = $request->seleccionPpr42;
            $semanals42->ventasPpr = $request->ventasPpr42;
            $semanals42->pesoavePpr = $request->pesoavePpr42;
            $semanals42->pesohuevoPpr = $request->pesohuevoPpr42;
            $semanals42->alimentoPpr = $request->alimentoPpr42;
            $semanals42->ObservacionesPpr = $request->ObservacionesPpr42;
            $semanals42->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr42 !=  null || $request->semanavidaPpr42 !=  null || $request->huevosPpr42 !=  null || $request->consumoPpr42 !=  null || $request->mortalidadPpr42 !=  null || $request->seleccionPpr42 !=  null || $request->ventasPpr42 !=  null || $request->pesoavePpr42 !=  null || $request->pesohuevoPpr42 !=  null || $request->alimentoPpr42 !=  null || $request->ObservacionesPpr42 !=  null){
              $semanals42->save();
            }

            $semanals43 = new PonedorasproduccionSemanal;
            $semanals43->semanaPpr = 44;
            $semanals43->dfsPpr = $request->dfsPpr43;
            $semanals43->semanavidaPpr = $request->semanavidaPpr43;
            $semanals43->huevosPpr = $request->huevosPpr43;
            $semanals43->consumoPpr = $request->consumoPpr43;
            $semanals43->mortalidadPpr = $request->mortalidadPpr43;
            $semanals43->seleccionPpr = $request->seleccionPpr43;
            $semanals43->ventasPpr = $request->ventasPpr43;
            $semanals43->pesoavePpr = $request->pesoavePpr43;
            $semanals43->pesohuevoPpr = $request->pesohuevoPpr43;
            $semanals43->alimentoPpr = $request->alimentoPpr43;
            $semanals43->ObservacionesPpr = $request->ObservacionesPpr43;
            $semanals43->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr43 !=  null || $request->semanavidaPpr43 !=  null || $request->huevosPpr43 !=  null || $request->consumoPpr43 !=  null || $request->mortalidadPpr43 !=  null || $request->seleccionPpr43 !=  null || $request->ventasPpr43 !=  null || $request->pesoavePpr43 !=  null || $request->pesohuevoPpr43 !=  null || $request->alimentoPpr43 !=  null || $request->ObservacionesPpr43 !=  null){
              $semanals43->save();
            }

            $semanals44 = new PonedorasproduccionSemanal;
            $semanals44->semanaPpr = 45;
            $semanals44->dfsPpr = $request->dfsPpr44;
            $semanals44->semanavidaPpr = $request->semanavidaPpr44;
            $semanals44->huevosPpr = $request->huevosPpr44;
            $semanals44->consumoPpr = $request->consumoPpr44;
            $semanals44->mortalidadPpr = $request->mortalidadPpr44;
            $semanals44->seleccionPpr = $request->seleccionPpr44;
            $semanals44->ventasPpr = $request->ventasPpr44;
            $semanals44->pesoavePpr = $request->pesoavePpr44;
            $semanals44->pesohuevoPpr = $request->pesohuevoPpr44;
            $semanals44->alimentoPpr = $request->alimentoPpr44;
            $semanals44->ObservacionesPpr = $request->ObservacionesPpr44;
            $semanals44->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr44 !=  null || $request->semanavidaPpr44 !=  null || $request->huevosPpr44 !=  null || $request->consumoPpr44 !=  null || $request->mortalidadPpr44 !=  null || $request->seleccionPpr44 !=  null || $request->ventasPpr44 !=  null || $request->pesoavePpr44 !=  null || $request->pesohuevoPpr44 !=  null || $request->alimentoPpr44 !=  null || $request->ObservacionesPpr44 !=  null){
              $semanals44->save();
            }

            $semanals45 = new PonedorasproduccionSemanal;
            $semanals45->semanaPpr = 46;
            $semanals45->dfsPpr = $request->dfsPpr45;
            $semanals45->semanavidaPpr = $request->semanavidaPpr45;
            $semanals45->huevosPpr = $request->huevosPpr45;
            $semanals45->consumoPpr = $request->consumoPpr45;
            $semanals45->mortalidadPpr = $request->mortalidadPpr45;
            $semanals45->seleccionPpr = $request->seleccionPpr45;
            $semanals45->ventasPpr = $request->ventasPpr45;
            $semanals45->pesoavePpr = $request->pesoavePpr45;
            $semanals45->pesohuevoPpr = $request->pesohuevoPpr45;
            $semanals45->alimentoPpr = $request->alimentoPpr45;
            $semanals45->ObservacionesPpr = $request->ObservacionesPpr45;
            $semanals45->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr45 !=  null || $request->semanavidaPpr45 !=  null || $request->huevosPpr45 !=  null || $request->consumoPpr45 !=  null || $request->mortalidadPpr45 !=  null || $request->seleccionPpr45 !=  null || $request->ventasPpr45 !=  null || $request->pesoavePpr45 !=  null || $request->pesohuevoPpr45 !=  null || $request->alimentoPpr45 !=  null || $request->ObservacionesPpr45 !=  null){
              $semanals45->save();
            }

            $semanals46 = new PonedorasproduccionSemanal;
            $semanals46->semanaPpr = 47;
            $semanals46->dfsPpr = $request->dfsPpr46;
            $semanals46->semanavidaPpr = $request->semanavidaPpr46;
            $semanals46->huevosPpr = $request->huevosPpr46;
            $semanals46->consumoPpr = $request->consumoPpr46;
            $semanals46->mortalidadPpr = $request->mortalidadPpr46;
            $semanals46->seleccionPpr = $request->seleccionPpr46;
            $semanals46->ventasPpr = $request->ventasPpr46;
            $semanals46->pesoavePpr = $request->pesoavePpr46;
            $semanals46->pesohuevoPpr = $request->pesohuevoPpr46;
            $semanals46->alimentoPpr = $request->alimentoPpr46;
            $semanals46->ObservacionesPpr = $request->ObservacionesPpr46;
            $semanals46->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr46 !=  null || $request->semanavidaPpr46 !=  null || $request->huevosPpr46 !=  null || $request->consumoPpr46 !=  null || $request->mortalidadPpr46 !=  null || $request->seleccionPpr46 !=  null || $request->ventasPpr46 !=  null || $request->pesoavePpr46 !=  null || $request->pesohuevoPpr46 !=  null || $request->alimentoPpr46 !=  null || $request->ObservacionesPpr46 !=  null){
              $semanals46->save();
            }

            $semanals47 = new PonedorasproduccionSemanal;
            $semanals47->semanaPpr = 48;
            $semanals47->dfsPpr = $request->dfsPpr47;
            $semanals47->semanavidaPpr = $request->semanavidaPpr47;
            $semanals47->huevosPpr = $request->huevosPpr47;
            $semanals47->consumoPpr = $request->consumoPpr47;
            $semanals47->mortalidadPpr = $request->mortalidadPpr47;
            $semanals47->seleccionPpr = $request->seleccionPpr47;
            $semanals47->ventasPpr = $request->ventasPpr47;
            $semanals47->pesoavePpr = $request->pesoavePpr47;
            $semanals47->pesohuevoPpr = $request->pesohuevoPpr47;
            $semanals47->alimentoPpr = $request->alimentoPpr47;
            $semanals47->ObservacionesPpr = $request->ObservacionesPpr47;
            $semanals47->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr47 !=  null || $request->semanavidaPpr47 !=  null || $request->huevosPpr47 !=  null || $request->consumoPpr47 !=  null || $request->mortalidadPpr47 !=  null || $request->seleccionPpr47 !=  null || $request->ventasPpr47 !=  null || $request->pesoavePpr47 !=  null || $request->pesohuevoPpr47 !=  null || $request->alimentoPpr47 !=  null || $request->ObservacionesPpr47 !=  null){
              $semanals47->save();
            }

            $semanals48 = new PonedorasproduccionSemanal;
            $semanals48->semanaPpr = 49;
            $semanals48->dfsPpr = $request->dfsPpr48;
            $semanals48->semanavidaPpr = $request->semanavidaPpr48;
            $semanals48->huevosPpr = $request->huevosPpr48;
            $semanals48->consumoPpr = $request->consumoPpr48;
            $semanals48->mortalidadPpr = $request->mortalidadPpr48;
            $semanals48->seleccionPpr = $request->seleccionPpr48;
            $semanals48->ventasPpr = $request->ventasPpr48;
            $semanals48->pesoavePpr = $request->pesoavePpr48;
            $semanals48->pesohuevoPpr = $request->pesohuevoPpr48;
            $semanals48->alimentoPpr = $request->alimentoPpr48;
            $semanals48->ObservacionesPpr = $request->ObservacionesPpr48;
            $semanals48->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr48 !=  null || $request->semanavidaPpr48 !=  null || $request->huevosPpr48 !=  null || $request->consumoPpr48 !=  null || $request->mortalidadPpr48 !=  null || $request->seleccionPpr48 !=  null || $request->ventasPpr48 !=  null || $request->pesoavePpr48 !=  null || $request->pesohuevoPpr48 !=  null || $request->alimentoPpr48 !=  null || $request->ObservacionesPpr48 !=  null){
              $semanals48->save();
            }

            $semanals49 = new PonedorasproduccionSemanal;
            $semanals49->semanaPpr = 50;
            $semanals49->dfsPpr = $request->dfsPpr49;
            $semanals49->semanavidaPpr = $request->semanavidaPpr49;
            $semanals49->huevosPpr = $request->huevosPpr49;
            $semanals49->consumoPpr = $request->consumoPpr49;
            $semanals49->mortalidadPpr = $request->mortalidadPpr49;
            $semanals49->seleccionPpr = $request->seleccionPpr49;
            $semanals49->ventasPpr = $request->ventasPpr49;
            $semanals49->pesoavePpr = $request->pesoavePpr49;
            $semanals49->pesohuevoPpr = $request->pesohuevoPpr49;
            $semanals49->alimentoPpr = $request->alimentoPpr49;
            $semanals49->ObservacionesPpr = $request->ObservacionesPpr49;
            $semanals49->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr49 !=  null || $request->semanavidaPpr49 !=  null || $request->huevosPpr49 !=  null || $request->consumoPpr49 !=  null || $request->mortalidadPpr49 !=  null || $request->seleccionPpr49 !=  null || $request->ventasPpr49 !=  null || $request->pesoavePpr49 !=  null || $request->pesohuevoPpr49 !=  null || $request->alimentoPpr49 !=  null || $request->ObservacionesPpr49 !=  null){
              $semanals49->save();
            }

            $semanals50 = new PonedorasproduccionSemanal;
            $semanals50->semanaPpr = 51;
            $semanals50->dfsPpr = $request->dfsPpr50;
            $semanals50->semanavidaPpr = $request->semanavidaPpr50;
            $semanals50->huevosPpr = $request->huevosPpr50;
            $semanals50->consumoPpr = $request->consumoPpr50;
            $semanals50->mortalidadPpr = $request->mortalidadPpr50;
            $semanals50->seleccionPpr = $request->seleccionPpr50;
            $semanals50->ventasPpr = $request->ventasPpr50;
            $semanals50->pesoavePpr = $request->pesoavePpr50;
            $semanals50->pesohuevoPpr = $request->pesohuevoPpr50;
            $semanals50->alimentoPpr = $request->alimentoPpr50;
            $semanals50->ObservacionesPpr = $request->ObservacionesPpr50;
            $semanals50->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr50 !=  null || $request->semanavidaPpr50 !=  null || $request->huevosPpr50 !=  null || $request->consumoPpr50 !=  null || $request->mortalidadPpr50 !=  null || $request->seleccionPpr50 !=  null || $request->ventasPpr50 !=  null || $request->pesoavePpr50 !=  null || $request->pesohuevoPpr50 !=  null || $request->alimentoPpr50 !=  null || $request->ObservacionesPpr50 !=  null){
              $semanals50->save();
            }

            $semanals51 = new PonedorasproduccionSemanal;
            $semanals51->semanaPpr = 52;
            $semanals51->dfsPpr = $request->dfsPpr51;
            $semanals51->semanavidaPpr = $request->semanavidaPpr51;
            $semanals51->huevosPpr = $request->huevosPpr51;
            $semanals51->consumoPpr = $request->consumoPpr51;
            $semanals51->mortalidadPpr = $request->mortalidadPpr51;
            $semanals51->seleccionPpr = $request->seleccionPpr51;
            $semanals51->ventasPpr = $request->ventasPpr51;
            $semanals51->pesoavePpr = $request->pesoavePpr51;
            $semanals51->pesohuevoPpr = $request->pesohuevoPpr51;
            $semanals51->alimentoPpr = $request->alimentoPpr51;
            $semanals51->ObservacionesPpr = $request->ObservacionesPpr51;
            $semanals51->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr51 !=  null || $request->semanavidaPpr51 !=  null || $request->huevosPpr51 !=  null || $request->consumoPpr51 !=  null || $request->mortalidadPpr51 !=  null || $request->seleccionPpr51 !=  null || $request->ventasPpr51 !=  null || $request->pesoavePpr51 !=  null || $request->pesohuevoPpr51 !=  null || $request->alimentoPpr51 !=  null || $request->ObservacionesPpr51 !=  null){
              $semanals51->save();
            }

            $semanals52 = new PonedorasproduccionSemanal;
            $semanals52->semanaPpr = 53;
            $semanals52->dfsPpr = $request->dfsPpr52;
            $semanals52->semanavidaPpr = $request->semanavidaPpr52;
            $semanals52->huevosPpr = $request->huevosPpr52;
            $semanals52->consumoPpr = $request->consumoPpr52;
            $semanals52->mortalidadPpr = $request->mortalidadPpr52;
            $semanals52->seleccionPpr = $request->seleccionPpr52;
            $semanals52->ventasPpr = $request->ventasPpr52;
            $semanals52->pesoavePpr = $request->pesoavePpr52;
            $semanals52->pesohuevoPpr = $request->pesohuevoPpr52;
            $semanals52->alimentoPpr = $request->alimentoPpr52;
            $semanals52->ObservacionesPpr = $request->ObservacionesPpr52;
            $semanals52->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr52 !=  null || $request->semanavidaPpr52 !=  null || $request->huevosPpr52 !=  null || $request->consumoPpr52 !=  null || $request->mortalidadPpr52 !=  null || $request->seleccionPpr52 !=  null || $request->ventasPpr52 !=  null || $request->pesoavePpr52 !=  null || $request->pesohuevoPpr52 !=  null || $request->alimentoPpr52 !=  null || $request->ObservacionesPpr52 !=  null){
              $semanals52->save();
            }

            $semanals53 = new PonedorasproduccionSemanal;
            $semanals53->semanaPpr = 54;
            $semanals53->dfsPpr = $request->dfsPpr53;
            $semanals53->semanavidaPpr = $request->semanavidaPpr53;
            $semanals53->huevosPpr = $request->huevosPpr53;
            $semanals53->consumoPpr = $request->consumoPpr53;
            $semanals53->mortalidadPpr = $request->mortalidadPpr53;
            $semanals53->seleccionPpr = $request->seleccionPpr53;
            $semanals53->ventasPpr = $request->ventasPpr53;
            $semanals53->pesoavePpr = $request->pesoavePpr53;
            $semanals53->pesohuevoPpr = $request->pesohuevoPpr53;
            $semanals53->alimentoPpr = $request->alimentoPpr53;
            $semanals53->ObservacionesPpr = $request->ObservacionesPpr53;
            $semanals53->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr53 !=  null || $request->semanavidaPpr53 !=  null || $request->huevosPpr53 !=  null || $request->consumoPpr53 !=  null || $request->mortalidadPpr53 !=  null || $request->seleccionPpr53 !=  null || $request->ventasPpr53 !=  null || $request->pesoavePpr53 !=  null || $request->pesohuevoPpr53 !=  null || $request->alimentoPpr53 !=  null || $request->ObservacionesPpr53 !=  null){
              $semanals53->save();
            }

            $semanals54 = new PonedorasproduccionSemanal;
            $semanals54->semanaPpr = 55;
            $semanals54->dfsPpr = $request->dfsPpr54;
            $semanals54->semanavidaPpr = $request->semanavidaPpr54;
            $semanals54->huevosPpr = $request->huevosPpr54;
            $semanals54->consumoPpr = $request->consumoPpr54;
            $semanals54->mortalidadPpr = $request->mortalidadPpr54;
            $semanals54->seleccionPpr = $request->seleccionPpr54;
            $semanals54->ventasPpr = $request->ventasPpr54;
            $semanals54->pesoavePpr = $request->pesoavePpr54;
            $semanals54->pesohuevoPpr = $request->pesohuevoPpr54;
            $semanals54->alimentoPpr = $request->alimentoPpr54;
            $semanals54->ObservacionesPpr = $request->ObservacionesPpr54;
            $semanals54->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr54 !=  null || $request->semanavidaPpr54 !=  null || $request->huevosPpr54 !=  null || $request->consumoPpr54 !=  null || $request->mortalidadPpr54 !=  null || $request->seleccionPpr54 !=  null || $request->ventasPpr54 !=  null || $request->pesoavePpr54 !=  null || $request->pesohuevoPpr54 !=  null || $request->alimentoPpr54 !=  null || $request->ObservacionesPpr54 !=  null){
              $semanals54->save();
            }

            $semanals55 = new PonedorasproduccionSemanal;
            $semanals55->semanaPpr = 56;
            $semanals55->dfsPpr = $request->dfsPpr55;
            $semanals55->semanavidaPpr = $request->semanavidaPpr55;
            $semanals55->huevosPpr = $request->huevosPpr55;
            $semanals55->consumoPpr = $request->consumoPpr55;
            $semanals55->mortalidadPpr = $request->mortalidadPpr55;
            $semanals55->seleccionPpr = $request->seleccionPpr55;
            $semanals55->ventasPpr = $request->ventasPpr55;
            $semanals55->pesoavePpr = $request->pesoavePpr55;
            $semanals55->pesohuevoPpr = $request->pesohuevoPpr55;
            $semanals55->alimentoPpr = $request->alimentoPpr55;
            $semanals55->ObservacionesPpr = $request->ObservacionesPpr55;
            $semanals55->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr55 !=  null || $request->semanavidaPpr55 !=  null || $request->huevosPpr55 !=  null || $request->consumoPpr55 !=  null || $request->mortalidadPpr55 !=  null || $request->seleccionPpr55 !=  null || $request->ventasPpr55 !=  null || $request->pesoavePpr55 !=  null || $request->pesohuevoPpr55 !=  null || $request->alimentoPpr55 !=  null || $request->ObservacionesPpr55 !=  null){
              $semanals55->save();
            }

            $semanals56 = new PonedorasproduccionSemanal;
            $semanals56->semanaPpr = 57;
            $semanals56->dfsPpr = $request->dfsPpr56;
            $semanals56->semanavidaPpr = $request->semanavidaPpr56;
            $semanals56->huevosPpr = $request->huevosPpr56;
            $semanals56->consumoPpr = $request->consumoPpr56;
            $semanals56->mortalidadPpr = $request->mortalidadPpr56;
            $semanals56->seleccionPpr = $request->seleccionPpr56;
            $semanals56->ventasPpr = $request->ventasPpr56;
            $semanals56->pesoavePpr = $request->pesoavePpr56;
            $semanals56->pesohuevoPpr = $request->pesohuevoPpr56;
            $semanals56->alimentoPpr = $request->alimentoPpr56;
            $semanals56->ObservacionesPpr = $request->ObservacionesPpr56;
            $semanals56->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr56 !=  null || $request->semanavidaPpr56 !=  null || $request->huevosPpr56 !=  null || $request->consumoPpr56 !=  null || $request->mortalidadPpr56 !=  null || $request->seleccionPpr56 !=  null || $request->ventasPpr56 !=  null || $request->pesoavePpr56 !=  null || $request->pesohuevoPpr56 !=  null || $request->alimentoPpr56 !=  null || $request->ObservacionesPpr56 !=  null){
              $semanals56->save();
            }

            $semanals57 = new PonedorasproduccionSemanal;
            $semanals57->semanaPpr = 58;
            $semanals57->dfsPpr = $request->dfsPpr57;
            $semanals57->semanavidaPpr = $request->semanavidaPpr57;
            $semanals57->huevosPpr = $request->huevosPpr57;
            $semanals57->consumoPpr = $request->consumoPpr57;
            $semanals57->mortalidadPpr = $request->mortalidadPpr57;
            $semanals57->seleccionPpr = $request->seleccionPpr57;
            $semanals57->ventasPpr = $request->ventasPpr57;
            $semanals57->pesoavePpr = $request->pesoavePpr57;
            $semanals57->pesohuevoPpr = $request->pesohuevoPpr57;
            $semanals57->alimentoPpr = $request->alimentoPpr57;
            $semanals57->ObservacionesPpr = $request->ObservacionesPpr57;
            $semanals57->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr57 !=  null || $request->semanavidaPpr57 !=  null || $request->huevosPpr57 !=  null || $request->consumoPpr57 !=  null || $request->mortalidadPpr57 !=  null || $request->seleccionPpr57 !=  null || $request->ventasPpr57 !=  null || $request->pesoavePpr57 !=  null || $request->pesohuevoPpr57 !=  null || $request->alimentoPpr57 !=  null || $request->ObservacionesPpr57 !=  null){
              $semanals57->save();
            }

            $semanals58 = new PonedorasproduccionSemanal;
            $semanals58->semanaPpr = 59;
            $semanals58->dfsPpr = $request->dfsPpr58;
            $semanals58->semanavidaPpr = $request->semanavidaPpr58;
            $semanals58->huevosPpr = $request->huevosPpr58;
            $semanals58->consumoPpr = $request->consumoPpr58;
            $semanals58->mortalidadPpr = $request->mortalidadPpr58;
            $semanals58->seleccionPpr = $request->seleccionPpr58;
            $semanals58->ventasPpr = $request->ventasPpr58;
            $semanals58->pesoavePpr = $request->pesoavePpr58;
            $semanals58->pesohuevoPpr = $request->pesohuevoPpr58;
            $semanals58->alimentoPpr = $request->alimentoPpr58;
            $semanals58->ObservacionesPpr = $request->ObservacionesPpr58;
            $semanals58->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr58 !=  null || $request->semanavidaPpr58 !=  null || $request->huevosPpr58 !=  null || $request->consumoPpr58 !=  null || $request->mortalidadPpr58 !=  null || $request->seleccionPpr58 !=  null || $request->ventasPpr58 !=  null || $request->pesoavePpr58 !=  null || $request->pesohuevoPpr58 !=  null || $request->alimentoPpr58 !=  null || $request->ObservacionesPpr58 !=  null){
              $semanals58->save();
            }

            $semanals59 = new PonedorasproduccionSemanal;
            $semanals59->semanaPpr = 60;
            $semanals59->dfsPpr = $request->dfsPpr59;
            $semanals59->semanavidaPpr = $request->semanavidaPpr59;
            $semanals59->huevosPpr = $request->huevosPpr59;
            $semanals59->consumoPpr = $request->consumoPpr59;
            $semanals59->mortalidadPpr = $request->mortalidadPpr59;
            $semanals59->seleccionPpr = $request->seleccionPpr59;
            $semanals59->ventasPpr = $request->ventasPpr59;
            $semanals59->pesoavePpr = $request->pesoavePpr59;
            $semanals59->pesohuevoPpr = $request->pesohuevoPpr59;
            $semanals59->alimentoPpr = $request->alimentoPpr59;
            $semanals59->ObservacionesPpr = $request->ObservacionesPpr59;
            $semanals59->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr59 !=  null || $request->semanavidaPpr59 !=  null || $request->huevosPpr59 !=  null || $request->consumoPpr59 !=  null || $request->mortalidadPpr59 !=  null || $request->seleccionPpr59 !=  null || $request->ventasPpr59 !=  null || $request->pesoavePpr59 !=  null || $request->pesohuevoPpr59 !=  null || $request->alimentoPpr59 !=  null || $request->ObservacionesPpr59 !=  null){
              $semanals59->save();
            }

            $semanals60 = new PonedorasproduccionSemanal;
            $semanals60->semanaPpr = 61;
            $semanals60->dfsPpr = $request->dfsPpr60;
            $semanals60->semanavidaPpr = $request->semanavidaPpr60;
            $semanals60->huevosPpr = $request->huevosPpr60;
            $semanals60->consumoPpr = $request->consumoPpr60;
            $semanals60->mortalidadPpr = $request->mortalidadPpr60;
            $semanals60->seleccionPpr = $request->seleccionPpr60;
            $semanals60->ventasPpr = $request->ventasPpr60;
            $semanals60->pesoavePpr = $request->pesoavePpr60;
            $semanals60->pesohuevoPpr = $request->pesohuevoPpr60;
            $semanals60->alimentoPpr = $request->alimentoPpr60;
            $semanals60->ObservacionesPpr = $request->ObservacionesPpr60;
            $semanals60->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr60 !=  null || $request->semanavidaPpr60 !=  null || $request->huevosPpr60 !=  null || $request->consumoPpr60 !=  null || $request->mortalidadPpr60 !=  null || $request->seleccionPpr60 !=  null || $request->ventasPpr60 !=  null || $request->pesoavePpr60 !=  null || $request->pesohuevoPpr60 !=  null || $request->alimentoPpr60 !=  null || $request->ObservacionesPpr60 !=  null){
              $semanals60->save();
            }

            $semanals61 = new PonedorasproduccionSemanal;
            $semanals61->semanaPpr = 62;
            $semanals61->dfsPpr = $request->dfsPpr61;
            $semanals61->semanavidaPpr = $request->semanavidaPpr61;
            $semanals61->huevosPpr = $request->huevosPpr61;
            $semanals61->consumoPpr = $request->consumoPpr61;
            $semanals61->mortalidadPpr = $request->mortalidadPpr61;
            $semanals61->seleccionPpr = $request->seleccionPpr61;
            $semanals61->ventasPpr = $request->ventasPpr61;
            $semanals61->pesoavePpr = $request->pesoavePpr61;
            $semanals61->pesohuevoPpr = $request->pesohuevoPpr61;
            $semanals61->alimentoPpr = $request->alimentoPpr61;
            $semanals61->ObservacionesPpr = $request->ObservacionesPpr61;
            $semanals61->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr61 !=  null || $request->semanavidaPpr61 !=  null || $request->huevosPpr61 !=  null || $request->consumoPpr61 !=  null || $request->mortalidadPpr61 !=  null || $request->seleccionPpr61 !=  null || $request->ventasPpr61 !=  null || $request->pesoavePpr61 !=  null || $request->pesohuevoPpr61 !=  null || $request->alimentoPpr61 !=  null || $request->ObservacionesPpr61 !=  null){
              $semanals61->save();
            }

            $semanals62 = new PonedorasproduccionSemanal;
            $semanals62->semanaPpr = 63;
            $semanals62->dfsPpr = $request->dfsPpr62;
            $semanals62->semanavidaPpr = $request->semanavidaPpr62;
            $semanals62->huevosPpr = $request->huevosPpr62;
            $semanals62->consumoPpr = $request->consumoPpr62;
            $semanals62->mortalidadPpr = $request->mortalidadPpr62;
            $semanals62->seleccionPpr = $request->seleccionPpr62;
            $semanals62->ventasPpr = $request->ventasPpr62;
            $semanals62->pesoavePpr = $request->pesoavePpr62;
            $semanals62->pesohuevoPpr = $request->pesohuevoPpr62;
            $semanals62->alimentoPpr = $request->alimentoPpr62;
            $semanals62->ObservacionesPpr = $request->ObservacionesPpr62;
            $semanals62->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr62 !=  null || $request->semanavidaPpr62 !=  null || $request->huevosPpr62 !=  null || $request->consumoPpr62 !=  null || $request->mortalidadPpr62 !=  null || $request->seleccionPpr62 !=  null || $request->ventasPpr62 !=  null || $request->pesoavePpr62 !=  null || $request->pesohuevoPpr62 !=  null || $request->alimentoPpr62 !=  null || $request->ObservacionesPpr62 !=  null){
              $semanals62->save();
            }

            $semanals63 = new PonedorasproduccionSemanal;
            $semanals63->semanaPpr = 64;
            $semanals63->dfsPpr = $request->dfsPpr63;
            $semanals63->semanavidaPpr = $request->semanavidaPpr63;
            $semanals63->huevosPpr = $request->huevosPpr63;
            $semanals63->consumoPpr = $request->consumoPpr63;
            $semanals63->mortalidadPpr = $request->mortalidadPpr63;
            $semanals63->seleccionPpr = $request->seleccionPpr63;
            $semanals63->ventasPpr = $request->ventasPpr63;
            $semanals63->pesoavePpr = $request->pesoavePpr63;
            $semanals63->pesohuevoPpr = $request->pesohuevoPpr63;
            $semanals63->alimentoPpr = $request->alimentoPpr63;
            $semanals63->ObservacionesPpr = $request->ObservacionesPpr63;
            $semanals63->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr63 !=  null || $request->semanavidaPpr63 !=  null || $request->huevosPpr63 !=  null || $request->consumoPpr63 !=  null || $request->mortalidadPpr63 !=  null || $request->seleccionPpr63 !=  null || $request->ventasPpr63 !=  null || $request->pesoavePpr63 !=  null || $request->pesohuevoPpr63 !=  null || $request->alimentoPpr63 !=  null || $request->ObservacionesPpr63 !=  null){
              $semanals63->save();
            }

            $semanals64 = new PonedorasproduccionSemanal;
            $semanals64->semanaPpr = 65;
            $semanals64->dfsPpr = $request->dfsPpr64;
            $semanals64->semanavidaPpr = $request->semanavidaPpr64;
            $semanals64->huevosPpr = $request->huevosPpr64;
            $semanals64->consumoPpr = $request->consumoPpr64;
            $semanals64->mortalidadPpr = $request->mortalidadPpr64;
            $semanals64->seleccionPpr = $request->seleccionPpr64;
            $semanals64->ventasPpr = $request->ventasPpr64;
            $semanals64->pesoavePpr = $request->pesoavePpr64;
            $semanals64->pesohuevoPpr = $request->pesohuevoPpr64;
            $semanals64->alimentoPpr = $request->alimentoPpr64;
            $semanals64->ObservacionesPpr = $request->ObservacionesPpr64;
            $semanals64->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr64 !=  null || $request->semanavidaPpr64 !=  null || $request->huevosPpr64 !=  null || $request->consumoPpr64 !=  null || $request->mortalidadPpr64 !=  null || $request->seleccionPpr64 !=  null || $request->ventasPpr64 !=  null || $request->pesoavePpr64 !=  null || $request->pesohuevoPpr64 !=  null || $request->alimentoPpr64 !=  null || $request->ObservacionesPpr64 !=  null){
              $semanals64->save();
            }

            $semanals65 = new PonedorasproduccionSemanal;
            $semanals65->semanaPpr = 66;
            $semanals65->dfsPpr = $request->dfsPpr65;
            $semanals65->semanavidaPpr = $request->semanavidaPpr65;
            $semanals65->huevosPpr = $request->huevosPpr65;
            $semanals65->consumoPpr = $request->consumoPpr65;
            $semanals65->mortalidadPpr = $request->mortalidadPpr65;
            $semanals65->seleccionPpr = $request->seleccionPpr65;
            $semanals65->ventasPpr = $request->ventasPpr65;
            $semanals65->pesoavePpr = $request->pesoavePpr65;
            $semanals65->pesohuevoPpr = $request->pesohuevoPpr65;
            $semanals65->alimentoPpr = $request->alimentoPpr65;
            $semanals65->ObservacionesPpr = $request->ObservacionesPpr65;
            $semanals65->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr65 !=  null || $request->semanavidaPpr65 !=  null || $request->huevosPpr65 !=  null || $request->consumoPpr65 !=  null || $request->mortalidadPpr65 !=  null || $request->seleccionPpr65 !=  null || $request->ventasPpr65 !=  null || $request->pesoavePpr65 !=  null || $request->pesohuevoPpr65 !=  null || $request->alimentoPpr65 !=  null || $request->ObservacionesPpr65 !=  null){
              $semanals65->save();
            }

            $semanals66 = new PonedorasproduccionSemanal;
            $semanals66->semanaPpr = 67;
            $semanals66->dfsPpr = $request->dfsPpr66;
            $semanals66->semanavidaPpr = $request->semanavidaPpr66;
            $semanals66->huevosPpr = $request->huevosPpr66;
            $semanals66->consumoPpr = $request->consumoPpr66;
            $semanals66->mortalidadPpr = $request->mortalidadPpr66;
            $semanals66->seleccionPpr = $request->seleccionPpr66;
            $semanals66->ventasPpr = $request->ventasPpr66;
            $semanals66->pesoavePpr = $request->pesoavePpr66;
            $semanals66->pesohuevoPpr = $request->pesohuevoPpr66;
            $semanals66->alimentoPpr = $request->alimentoPpr66;
            $semanals66->ObservacionesPpr = $request->ObservacionesPpr66;
            $semanals66->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr66 !=  null || $request->semanavidaPpr66 !=  null || $request->huevosPpr66 !=  null || $request->consumoPpr66 !=  null || $request->mortalidadPpr66 !=  null || $request->seleccionPpr66 !=  null || $request->ventasPpr66 !=  null || $request->pesoavePpr66 !=  null || $request->pesohuevoPpr66 !=  null || $request->alimentoPpr66 !=  null || $request->ObservacionesPpr66 !=  null){
              $semanals66->save();
            }

            $semanals67 = new PonedorasproduccionSemanal;
            $semanals67->semanaPpr = 68;
            $semanals67->dfsPpr = $request->dfsPpr67;
            $semanals67->semanavidaPpr = $request->semanavidaPpr67;
            $semanals67->huevosPpr = $request->huevosPpr67;
            $semanals67->consumoPpr = $request->consumoPpr67;
            $semanals67->mortalidadPpr = $request->mortalidadPpr67;
            $semanals67->seleccionPpr = $request->seleccionPpr67;
            $semanals67->ventasPpr = $request->ventasPpr67;
            $semanals67->pesoavePpr = $request->pesoavePpr67;
            $semanals67->pesohuevoPpr = $request->pesohuevoPpr67;
            $semanals67->alimentoPpr = $request->alimentoPpr67;
            $semanals67->ObservacionesPpr = $request->ObservacionesPpr67;
            $semanals67->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr67 !=  null || $request->semanavidaPpr67 !=  null || $request->huevosPpr67 !=  null || $request->consumoPpr67 !=  null || $request->mortalidadPpr67 !=  null || $request->seleccionPpr67 !=  null || $request->ventasPpr67 !=  null || $request->pesoavePpr67 !=  null || $request->pesohuevoPpr67 !=  null || $request->alimentoPpr67 !=  null || $request->ObservacionesPpr67 !=  null){
              $semanals67->save();
            }

            $semanals68 = new PonedorasproduccionSemanal;
            $semanals68->semanaPpr = 69;
            $semanals68->dfsPpr = $request->dfsPpr68;
            $semanals68->semanavidaPpr = $request->semanavidaPpr68;
            $semanals68->huevosPpr = $request->huevosPpr68;
            $semanals68->consumoPpr = $request->consumoPpr68;
            $semanals68->mortalidadPpr = $request->mortalidadPpr68;
            $semanals68->seleccionPpr = $request->seleccionPpr68;
            $semanals68->ventasPpr = $request->ventasPpr68;
            $semanals68->pesoavePpr = $request->pesoavePpr68;
            $semanals68->pesohuevoPpr = $request->pesohuevoPpr68;
            $semanals68->alimentoPpr = $request->alimentoPpr68;
            $semanals68->ObservacionesPpr = $request->ObservacionesPpr68;
            $semanals68->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr68 !=  null || $request->semanavidaPpr68 !=  null || $request->huevosPpr68 !=  null || $request->consumoPpr68 !=  null || $request->mortalidadPpr68 !=  null || $request->seleccionPpr68 !=  null || $request->ventasPpr68 !=  null || $request->pesoavePpr68 !=  null || $request->pesohuevoPpr68 !=  null || $request->alimentoPpr68 !=  null || $request->ObservacionesPpr68 !=  null){
              $semanals68->save();
            }

            $semanals69 = new PonedorasproduccionSemanal;
            $semanals69->semanaPpr = 70;
            $semanals69->dfsPpr = $request->dfsPpr69;
            $semanals69->semanavidaPpr = $request->semanavidaPpr69;
            $semanals69->huevosPpr = $request->huevosPpr69;
            $semanals69->consumoPpr = $request->consumoPpr69;
            $semanals69->mortalidadPpr = $request->mortalidadPpr69;
            $semanals69->seleccionPpr = $request->seleccionPpr69;
            $semanals69->ventasPpr = $request->ventasPpr69;
            $semanals69->pesoavePpr = $request->pesoavePpr69;
            $semanals69->pesohuevoPpr = $request->pesohuevoPpr69;
            $semanals69->alimentoPpr = $request->alimentoPpr69;
            $semanals69->ObservacionesPpr = $request->ObservacionesPpr69;
            $semanals69->idProduccion = $ponedorasproduccions->id;

            if($request->dfsPpr69 !=  null || $request->semanavidaPpr69 !=  null || $request->huevosPpr69 !=  null || $request->consumoPpr69 !=  null || $request->mortalidadPpr69 !=  null || $request->seleccionPpr69 !=  null || $request->ventasPpr69 !=  null || $request->pesoavePpr69 !=  null || $request->pesohuevoPpr69 !=  null || $request->alimentoPpr69 !=  null || $request->ObservacionesPpr69 !=  null){
              $semanals69->save();
            }
           return redirect('ponedorasproduccions');    


          }
        } 

        if ($busqueda == 2  && $request->nombreLot != null) {
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
        //
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
        //
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
                        ->where('lotes.idEstado','=', 4)
                        ->get();

        $Sublote = Lote::select('sublotes.nombreSub' , 'lotes.nombreLot')
                        ->leftjoin('sublotes' , 'sublotes.idLote' , '=' , 'lotes.id')
                        ->where('nombreSub','=',$request->buscar)
                        ->where('sublotes.idEstado','=', 4)
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
                        ->where('nombreLot','=',$request->buscar)
                        ->where('lotes.idEstado','=', 4)
                        ->groupBy('nombreLot')
                        ->get();

            $nombre = Lote::select('lotes.id')->where('nombreLot' ,  '=' , $request->buscar)->get();   

            $guia = Guia::select('nombreGui', 'id')
                          ->where('moduloGui', '=', 'Ponedoras Produccion')
                          ->get();             

            return \View::make('Avicol/PonedorasProduccion/create', compact('lotes', 'guia' , 'semlevante'));              

         }
         if (!$Sublote->isEmpty()) {

            $lotes = Lote::select('granjas.nombreGra', 'granjas.alturaGra' , 'municipios.nombreMun' , 'departamentos.nombreDep' , 'pais.nombrePai', 'climas.nombreCli', 'empresas.nombreEmp', 'zonas.nombreZon', 'variedads.nombreVar', 'sistemaexplotacions.nombreSis' , 'lotes.*' , 'sublotes.nombreSub' , 'sublotes.pollitasSub')
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
                        ->where('sublotes.idEstado','=', 4)
                        ->where('nombreSub','=',$request->buscar)
                        ->groupBy('nombreLot')
                        ->get();   

          $guia = Guia::select('nombreGui', 'id')
                          ->where('moduloGui', '=', 'Ponedoras Produccion')
                          ->get();

            return \View::make('Avicol/PonedorasProduccion/create', compact('lotes', 'guia'));  

        }
        if($Lote->isEmpty() || $Sublote->isEmpty()){
          echo  '<script languaje="Javascript"> alert("Este Lote o Sublote ya fue registrado anteriormente o se encuentra en Levante"); history.back(); </script>';
        }        

    }



    public function searchbuscar(Request $request)
    {
          $lotes = Ponedorasproduccion::select('sublotes.nombreSub' , 'sublot.nombreLot' , 'lotes.nombreLot', 'lotes.pollitasLot', 'lotes.encasetamientoLot', 'sublot.pollitasLot as polsub', 'sublot.encasetamientoLot as encsub', 'sublot.nombreLot as nomlot', 'granjas.nombreGra', 'granjas.alturaGra' , 'municipios.nombreMun' , 'departamentos.nombreDep' , 'pais.nombrePai', 'climas.nombreCli', 'empresas.nombreEmp', 'zonas.nombreZon', 'variedads.nombreVar', 'sistemaexplotacions.nombreSis',          'grasub.nombreGra as nomgra', 'grasub.alturaGra as altgra' , 'munsub.nombreMun as nommun' , 'depsub.nombreDep as nomdep' , 'paisub.nombrePai as nompai', 'clisub.nombreCli as nomcli', 'empsub.nombreEmp as nomemp', 'zonsub.nombreZon as nomzon', 'varsub.nombreVar as nomvar', 'sissub.nombreSis as nomsis', 'guias.nombreGui' , 'ponedorasproduccions.*')
                                              ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedorasproduccions.idLote')
                                              ->leftjoin('sublotes' , 'sublotes.id' , '=' , 'ponedorasproduccions.idSublote')
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
                                              ->join('guias' , 'guias.id' , '=' , 'ponedorasproduccions.idGuia')
                                              ->where('lotes.idEstado','=', 6)
                                              ->orwhere('sublotes.idEstado' , '=' , 6)
                                              ->orwhere('lotes.nombreLot','=',$request->buscar)
                                              ->orwhere('sublotes.nombreSub','=',$request->buscar)
                                              ->paginate(20);                                                     

        return \View::make('Avicol/PonedorasProduccion/list', compact('lotes'));

    }
}
