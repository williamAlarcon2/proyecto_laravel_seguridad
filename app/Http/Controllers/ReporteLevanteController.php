<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Empresa as Empresa;

use App\Models\Zona as Zona;

use App\Models\Variedad as Variedad;

use App\Models\Granja as Granja;

use App\Models\Pais as Pais;

use App\Models\Departamento as Departamento;

use App\Models\Municipio as Municipio;

use App\Models\Clima as Clima;

use App\Models\Sistemaexplotacion as Sistemaexplotacion;

use App\Models\Lote as Lote;

use App\Models\Sublote as Sublote;

use App\Models\Ponedoraslevante as Ponedoraslevante;

use Maatwebsite\Excel\Facades\Excel;

class ReporteLevanteController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function DescargarExcelLevante(){
      $empresas = Empresa::select('nombreEmp','id')->get();

      $zonas = Zona::select('nombreZon','id')->get();

      $variedads = Variedad::select('nombreVar','id')->get();

      $granjas = Granja::select('nombreGra','id')->get();

      $pais = Pais::select('nombrePai','id')->get();

      $departamentos = Departamento::select('nombreDep','id')->get();

      $municipios = Municipio::select('nombreMun','id')->get();

      $climas = Clima::select('nombreCli','id')->get();

      $sistemas = Sistemaexplotacion::select('nombreSis','id')->get();

      $lotes = Lote::select('nombreLot','id')->get();

      $sublotes = Sublote::select('nombreSub','id')->get();

      return \View::make('Avicol/ReporteLevante/list', compact('empresas','zonas','variedads','granjas','pais','departamentos','municipios','climas','sistemas','sistemas','lotes','sublotes'));
    }

    public function excelcrearlevante(Request $request){

      if ($request->fechainicio == null && $request->fechafin == null) {
        $lotes = Ponedoraslevante::select('lotes.nombreLot','lotes.pollitasLot','lotes.encasetamientoLot','granjas.nombreGra','granjas.alturaGra','municipios.nombreMun','departamentos.nombreDep','pais.nombrePai','climas.nombreCli','empresas.nombreEmp','zonas.nombreZon','variedads.nombreVar','sistemaexplotacions.nombreSis','ponedoraslevante_semanals.*','ponedoraslevantes.*')
                                  ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                  ->leftjoin('variedads' , 'variedads.id' , '=' , 'lotes.idVariedad')
                                  ->leftjoin('granjas' , 'granjas.id' , '=' , 'lotes.idGranja')
                                  ->leftjoin('sistemaexplotacions' , 'sistemaexplotacions.id' , '=' , 'lotes.idSistema')
                                  ->leftjoin('municipios' , 'municipios.id' , '=' , 'granjas.idMunicipio')
                                  ->leftjoin('departamentos' , 'departamentos.id' , '=' , 'municipios.idDepartamento')
                                  ->leftjoin('pais' , 'pais.id' , '=' , 'departamentos.idPais')
                                  ->leftjoin('climas' , 'climas.id' , '=' , 'granjas.idClima')
                                  ->leftjoin('empresas' , 'empresas.id' , '=' , 'granjas.idEmpresa')
                                  ->leftjoin('zonas' , 'zonas.id' , '=' , 'granjas.idZona')
                                  ->leftjoin('ponedoraslevante_semanals' , 'ponedoraslevante_semanals.idLevante' , '=' , 'ponedoraslevantes.id')
                                  ->where('idSublote', '=', null)
                                  ->whereDate('encasetamientoLot','>=', 0)
                                  ->whereDate('encasetamientoLot','<=', 0)
                                  ->orwhere('nombreLot', '=', $request->idLote)
                                  ->get();

        $sublotes = Ponedoraslevante::select('lotes.nombreLot','lotes.pollitasLot','lotes.encasetamientoLot','granjas.nombreGra','granjas.alturaGra','municipios.nombreMun','departamentos.nombreDep','pais.nombrePai','climas.nombreCli','empresas.nombreEmp','zonas.nombreZon','variedads.nombreVar','sistemaexplotacions.nombreSis','sublotes.*','ponedoraslevante_semanals.*','ponedoraslevantes.*')
                                    ->leftjoin('sublotes' , 'sublotes.id' , '=' , 'ponedoraslevantes.idSublote')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'sublotes.idLote')
                                    ->leftjoin('variedads' , 'variedads.id' , '=' , 'lotes.idVariedad')
                                    ->leftjoin('granjas' , 'granjas.id' , '=' , 'lotes.idGranja')
                                    ->leftjoin('sistemaexplotacions' , 'sistemaexplotacions.id' , '=' , 'lotes.idSistema')
                                    ->leftjoin('municipios' , 'municipios.id' , '=' , 'granjas.idMunicipio')
                                    ->leftjoin('departamentos' , 'departamentos.id' , '=' , 'municipios.idDepartamento')
                                    ->leftjoin('pais' , 'pais.id' , '=' , 'departamentos.idPais')
                                    ->leftjoin('climas' , 'climas.id' , '=' , 'granjas.idClima')
                                    ->leftjoin('empresas' , 'empresas.id' , '=' , 'granjas.idEmpresa')
                                    ->leftjoin('zonas' , 'zonas.id' , '=' , 'granjas.idZona')
                                    ->leftjoin('guias' , 'guias.id' , '=' , 'ponedoraslevantes.idGuia')
                                    ->leftjoin('ponedoraslevante_semanals' , 'ponedoraslevante_semanals.idLevante' , '=' , 'ponedoraslevantes.id')
                                    ->where('idSublote', '!=', null)
                                    ->get();

        $totall = Ponedoraslevante::select('lotes.nombreLot','lotes.pollitasLot','lotes.encasetamientoLot','granjas.nombreGra','granjas.alturaGra','municipios.nombreMun','departamentos.nombreDep','pais.nombrePai','climas.nombreCli','empresas.nombreEmp','zonas.nombreZon','variedads.nombreVar','sistemaexplotacions.nombreSis','ponedoraslevante_semanals.*','ponedoraslevantes.*')
                                  ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                  ->leftjoin('variedads' , 'variedads.id' , '=' , 'lotes.idVariedad')
                                  ->leftjoin('granjas' , 'granjas.id' , '=' , 'lotes.idGranja')
                                  ->leftjoin('sistemaexplotacions' , 'sistemaexplotacions.id' , '=' , 'lotes.idSistema')
                                  ->leftjoin('municipios' , 'municipios.id' , '=' , 'granjas.idMunicipio')
                                  ->leftjoin('departamentos' , 'departamentos.id' , '=' , 'municipios.idDepartamento')
                                  ->leftjoin('pais' , 'pais.id' , '=' , 'departamentos.idPais')
                                  ->leftjoin('climas' , 'climas.id' , '=' , 'granjas.idClima')
                                  ->leftjoin('empresas' , 'empresas.id' , '=' , 'granjas.idEmpresa')
                                  ->leftjoin('zonas' , 'zonas.id' , '=' , 'granjas.idZona')
                                  ->leftjoin('ponedoraslevante_semanals' , 'ponedoraslevante_semanals.idLevante' , '=' , 'ponedoraslevantes.id')
                                  ->where('idSublote', '=', null)
                                  ->whereDate('encasetamientoLot','>=', 0)
                                  ->whereDate('encasetamientoLot','<=', 0)
                                  ->orwhere('nombreLot', '=', $request->idLote)
                                  ->count() +1;

        $totals = Ponedoraslevante::select('lotes.nombreLot','lotes.pollitasLot','lotes.encasetamientoLot','granjas.nombreGra','granjas.alturaGra','municipios.nombreMun','departamentos.nombreDep','pais.nombrePai','climas.nombreCli','empresas.nombreEmp','zonas.nombreZon','variedads.nombreVar','sistemaexplotacions.nombreSis','sublotes.*','ponedoraslevante_semanals.*','ponedoraslevantes.*')
                                  ->leftjoin('sublotes' , 'sublotes.id' , '=' , 'ponedoraslevantes.idSublote')
                                  ->leftjoin('lotes' , 'lotes.id' , '=' , 'sublotes.idLote')
                                  ->leftjoin('variedads' , 'variedads.id' , '=' , 'lotes.idVariedad')
                                  ->leftjoin('granjas' , 'granjas.id' , '=' , 'lotes.idGranja')
                                  ->leftjoin('sistemaexplotacions' , 'sistemaexplotacions.id' , '=' , 'lotes.idSistema')
                                  ->leftjoin('municipios' , 'municipios.id' , '=' , 'granjas.idMunicipio')
                                  ->leftjoin('departamentos' , 'departamentos.id' , '=' , 'municipios.idDepartamento')
                                  ->leftjoin('pais' , 'pais.id' , '=' , 'departamentos.idPais')
                                  ->leftjoin('climas' , 'climas.id' , '=' , 'granjas.idClima')
                                  ->leftjoin('empresas' , 'empresas.id' , '=' , 'granjas.idEmpresa')
                                  ->leftjoin('zonas' , 'zonas.id' , '=' , 'granjas.idZona')
                                  ->leftjoin('guias' , 'guias.id' , '=' , 'ponedoraslevantes.idGuia')
                                  ->leftjoin('ponedoraslevante_semanals' , 'ponedoraslevante_semanals.idLevante' , '=' , 'ponedoraslevantes.id')
                                  ->where('idSublote', '!=', null)
                                  ->count() +1;
      }

      if ($request->fechainicio != null && $request->fechafin != null) {
        $lotes = Ponedoraslevante::select('lotes.nombreLot','lotes.pollitasLot','lotes.encasetamientoLot','granjas.nombreGra','granjas.alturaGra','municipios.nombreMun','departamentos.nombreDep','pais.nombrePai','climas.nombreCli','empresas.nombreEmp','zonas.nombreZon','variedads.nombreVar','sistemaexplotacions.nombreSis','ponedoraslevante_semanals.*','ponedoraslevantes.*')
                                  ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                  ->leftjoin('variedads' , 'variedads.id' , '=' , 'lotes.idVariedad')
                                  ->leftjoin('granjas' , 'granjas.id' , '=' , 'lotes.idGranja')
                                  ->leftjoin('sistemaexplotacions' , 'sistemaexplotacions.id' , '=' , 'lotes.idSistema')
                                  ->leftjoin('municipios' , 'municipios.id' , '=' , 'granjas.idMunicipio')
                                  ->leftjoin('departamentos' , 'departamentos.id' , '=' , 'municipios.idDepartamento')
                                  ->leftjoin('pais' , 'pais.id' , '=' , 'departamentos.idPais')
                                  ->leftjoin('climas' , 'climas.id' , '=' , 'granjas.idClima')
                                  ->leftjoin('empresas' , 'empresas.id' , '=' , 'granjas.idEmpresa')
                                  ->leftjoin('zonas' , 'zonas.id' , '=' , 'granjas.idZona')
                                  ->leftjoin('ponedoraslevante_semanals' , 'ponedoraslevante_semanals.idLevante' , '=' , 'ponedoraslevantes.id')
                                  ->where('idSublote', '=', null)
                                  ->whereDate('encasetamientoLot','>=', $request->fechainicio)
                                  ->whereDate('encasetamientoLot','<=', $request->fechafin)
                                  ->orwhere('nombreLot', '=', $request->idLote)
                                  ->get();

        $sublotes = Ponedoraslevante::select('lotes.nombreLot','lotes.pollitasLot','lotes.encasetamientoLot','granjas.nombreGra','granjas.alturaGra','municipios.nombreMun','departamentos.nombreDep','pais.nombrePai','climas.nombreCli','empresas.nombreEmp','zonas.nombreZon','variedads.nombreVar','sistemaexplotacions.nombreSis','sublotes.*','ponedoraslevante_semanals.*','ponedoraslevantes.*')
                                    ->leftjoin('sublotes' , 'sublotes.id' , '=' , 'ponedoraslevantes.idSublote')
                                    ->leftjoin('lotes' , 'lotes.id' , '=' , 'sublotes.idLote')
                                    ->leftjoin('variedads' , 'variedads.id' , '=' , 'lotes.idVariedad')
                                    ->leftjoin('granjas' , 'granjas.id' , '=' , 'lotes.idGranja')
                                    ->leftjoin('sistemaexplotacions' , 'sistemaexplotacions.id' , '=' , 'lotes.idSistema')
                                    ->leftjoin('municipios' , 'municipios.id' , '=' , 'granjas.idMunicipio')
                                    ->leftjoin('departamentos' , 'departamentos.id' , '=' , 'municipios.idDepartamento')
                                    ->leftjoin('pais' , 'pais.id' , '=' , 'departamentos.idPais')
                                    ->leftjoin('climas' , 'climas.id' , '=' , 'granjas.idClima')
                                    ->leftjoin('empresas' , 'empresas.id' , '=' , 'granjas.idEmpresa')
                                    ->leftjoin('zonas' , 'zonas.id' , '=' , 'granjas.idZona')
                                    ->leftjoin('guias' , 'guias.id' , '=' , 'ponedoraslevantes.idGuia')
                                    ->leftjoin('ponedoraslevante_semanals' , 'ponedoraslevante_semanals.idLevante' , '=' , 'ponedoraslevantes.id')
                                    ->where('idSublote', '!=', null)
                                    ->whereDate('encasetamientoLot','>=', $request->fechainicio)
                                    ->whereDate('encasetamientoLot','<=', $request->fechafin)
                                    ->get();

        $totall = Ponedoraslevante::select('lotes.nombreLot','lotes.pollitasLot','lotes.encasetamientoLot','granjas.nombreGra','granjas.alturaGra','municipios.nombreMun','departamentos.nombreDep','pais.nombrePai','climas.nombreCli','empresas.nombreEmp','zonas.nombreZon','variedads.nombreVar','sistemaexplotacions.nombreSis','ponedoraslevante_semanals.*','ponedoraslevantes.*')
                                  ->leftjoin('lotes' , 'lotes.id' , '=' , 'ponedoraslevantes.idLote')
                                  ->leftjoin('variedads' , 'variedads.id' , '=' , 'lotes.idVariedad')
                                  ->leftjoin('granjas' , 'granjas.id' , '=' , 'lotes.idGranja')
                                  ->leftjoin('sistemaexplotacions' , 'sistemaexplotacions.id' , '=' , 'lotes.idSistema')
                                  ->leftjoin('municipios' , 'municipios.id' , '=' , 'granjas.idMunicipio')
                                  ->leftjoin('departamentos' , 'departamentos.id' , '=' , 'municipios.idDepartamento')
                                  ->leftjoin('pais' , 'pais.id' , '=' , 'departamentos.idPais')
                                  ->leftjoin('climas' , 'climas.id' , '=' , 'granjas.idClima')
                                  ->leftjoin('empresas' , 'empresas.id' , '=' , 'granjas.idEmpresa')
                                  ->leftjoin('zonas' , 'zonas.id' , '=' , 'granjas.idZona')
                                  ->leftjoin('ponedoraslevante_semanals' , 'ponedoraslevante_semanals.idLevante' , '=' , 'ponedoraslevantes.id')
                                  ->where('idSublote', '=', null)
                                  ->WhereDate('encasetamientoLot','>=', $request->fechainicio)
                                  ->WhereDate('encasetamientoLot','<=', $request->fechafin)
                                  ->orwhere('nombreLot', '=', $request->idLote)
                                  ->count() +1;

        $totals = Ponedoraslevante::select('lotes.nombreLot','lotes.pollitasLot','lotes.encasetamientoLot','granjas.nombreGra','granjas.alturaGra','municipios.nombreMun','departamentos.nombreDep','pais.nombrePai','climas.nombreCli','empresas.nombreEmp','zonas.nombreZon','variedads.nombreVar','sistemaexplotacions.nombreSis','sublotes.*','ponedoraslevante_semanals.*','ponedoraslevantes.*')
                                  ->leftjoin('sublotes' , 'sublotes.id' , '=' , 'ponedoraslevantes.idSublote')
                                  ->leftjoin('lotes' , 'lotes.id' , '=' , 'sublotes.idLote')
                                  ->leftjoin('variedads' , 'variedads.id' , '=' , 'lotes.idVariedad')
                                  ->leftjoin('granjas' , 'granjas.id' , '=' , 'lotes.idGranja')
                                  ->leftjoin('sistemaexplotacions' , 'sistemaexplotacions.id' , '=' , 'lotes.idSistema')
                                  ->leftjoin('municipios' , 'municipios.id' , '=' , 'granjas.idMunicipio')
                                  ->leftjoin('departamentos' , 'departamentos.id' , '=' , 'municipios.idDepartamento')
                                  ->leftjoin('pais' , 'pais.id' , '=' , 'departamentos.idPais')
                                  ->leftjoin('climas' , 'climas.id' , '=' , 'granjas.idClima')
                                  ->leftjoin('empresas' , 'empresas.id' , '=' , 'granjas.idEmpresa')
                                  ->leftjoin('zonas' , 'zonas.id' , '=' , 'granjas.idZona')
                                  ->leftjoin('guias' , 'guias.id' , '=' , 'ponedoraslevantes.idGuia')
                                  ->leftjoin('ponedoraslevante_semanals' , 'ponedoraslevante_semanals.idLevante' , '=' , 'ponedoraslevantes.id')
                                  ->where('idSublote', '!=', null)
                                  ->count() +1;
      }

      Excel::create('Reporte Levante',function($excel) use($lotes,$sublotes,$totall,$totals){

        $excel->sheet('Reporte Levante Lotes',function($sheet) use($lotes,$totall){

          $sheet->setBorder('A1:AT1', 'thin');
          $hola = 'A2:AT'.$totall;

          $sheet->setBorder($hola, 'thin');

          $sheet->cells('A1:AT1', function($cells)
          {
            $cells->setBackground('#163AA6');
            $cells->setFontColor('#FFFFFF');
            $cells->setAlignment('center');
            $cells->setValignment('middle');
          });

          $sheet->cells('A2:AT'.$totall, function($cells)
          {
            $cells->setBackground('#D7D7D6');
            $cells->setFontColor('#000000');
            $cells->setAlignment('center');
            $cells->setValignment('middle');
          });

          $sheet->row(1, [
            'Empresa','Granja','Variedad','Sublote','Fecha Recepcion','Pollitas','Altura/Nivel del mar','Zona Avicol','Municipio','Departamento','Pais','Clima','Sistema Explotacion','Programa de Oscurecimiento','Foto Periodo','Despique','Traslado Px','Inicio Descenso Luz','Fin Descenso Luz','Semana Vida','Fecha FDS','N° Aves Muertas','Mortalidad','Seleccion','Otros','Alimento','Consumo Kg','Peso Ave','% Uniformidad','Coeficiente Variacion','Observaciones','K. Acum','Ave/Dia Real','Gr Ave Ac','Acu','%Mort Sem','%Mort Acu','%Sel Sem','%M+S Acu.','Saldo Aves','Conv Sem','Ganancia Ave Dia R','%Cump Ganan Ave Semana','%Cumpl Cons Gr.A.D','%Cumpl Peso','%Cumpl Consumo Acm'
          ]);
          foreach($lotes as $index => $lote) {
            $sheet->row($index+2, [
                $lote->nombreEmp,$lote->nombreGra,$lote->nombreVar,$lote->nombreLot,$lote->encasetamientoLot,$lote->pollitasLot,$lote->alturaGra,$lote->nombreZon,$lote->nombreMun,$lote->nombreDep,$lote->nombrePai,$lote->nombreCli,$lote->nombreSis,$lote->programaPle,$lote->fotoPle,$lote->despiquePle,$lote->trasladoPle,$lote->inicioluzPle,$lote->finluzPle,$lote->semanaPle,$lote->fdsPle,$lote->avesmuertasPle,$lote->mortalidadPle,$lote->seleccionPle,$lote->otrosPle,$lote->alimentoPle,$lote->consumoPle,$lote->pesoPle,$lote->uniformidadPle,$lote->coeficientePle,$lote->observacionesPle,$lote->kacumPle,$lote->avediarealPle,$lote->graveacPle,$lote->acuPle,$lote->mortsemPle,$lote->mortacuPle,$lote->selsemPle,$lote->msacuPle,$lote->saldoavesPle,$lote->convsemPle,$lote->gananciaavediarPle,$lote->cumpgananavesemanaPle,$lote->cumplconsgradPle,$lote->cumplpesoPle,$lote->cumplconsumoacmPle
            ]);
          }
        });

        $excel->sheet('Reporte Levante Sublotes',function($sheet) use($sublotes,$totals){

          $sheet->setBorder('A1:AT1', 'thin');
          $hola = 'A2:AT'.$totals;

          $sheet->setBorder($hola, 'thin');

          $sheet->cells('A1:AT1', function($cells)
          {
            $cells->setBackground('#163AA6');
            $cells->setFontColor('#FFFFFF');
            $cells->setAlignment('center');
            $cells->setValignment('middle');
          });

          $sheet->cells('A2:AT'.$totals, function($cells)
          {
            $cells->setBackground('#D7D7D6');
            $cells->setFontColor('#000000');
            $cells->setAlignment('center');
            $cells->setValignment('middle');
          });

          $sheet->row(1, [
            'Empresa','Granja','Variedad','Lote','Fecha Recepcion','Pollitas','Altura/Nivel del mar','Zona Avicol','Municipio','Departamento','Pais','Clima','Sistema Explotacion','Programa de Oscurecimiento','Foto Periodo','Despique','Traslado Px','Inicio Descenso Luz','Fin Descenso Luz','Semana Vida','Fecha FDS','N° Aves Muertas','Mortalidad','Seleccion','Otros','Alimento','Consumo Kg','Peso Ave','% Uniformidad','Coeficiente Variacion','Observaciones','K. Acum','Ave/Dia Real','Gr Ave Ac','Acu','%Mort Sem','%Mort Acu','%Sel Sem','%M+S Acu.','Saldo Aves','Conv Sem','Ganancia Ave Dia R','%Cump Ganan Ave Semana','%Cumpl Cons Gr.A.D','%Cumpl Peso','%Cumpl Consumo Acm'
          ]);
          foreach($sublotes as $index => $lote) {
            $sheet->row($index+2, [
                $lote->nombreEmp,$lote->nombreGra,$lote->nombreVar,$lote->nombreLot,$lote->encasetamientoLot,$lote->pollitasLot,$lote->alturaGra,$lote->nombreZon,$lote->nombreMun,$lote->nombreDep,$lote->nombrePai,$lote->nombreCli,$lote->nombreSis,$lote->programaPle,$lote->fotoPle,$lote->despiquePle,$lote->trasladoPle,$lote->inicioluzPle,$lote->finluzPle,$lote->semanaPle,$lote->fdsPle,$lote->avesmuertasPle,$lote->mortalidadPle,$lote->seleccionPle,$lote->otrosPle,$lote->alimentoPle,$lote->consumoPle,$lote->pesoPle,$lote->uniformidadPle,$lote->coeficientePle,$lote->observacionesPle,$lote->kacumPle,$lote->avediarealPle,$lote->graveacPle,$lote->acuPle,$lote->mortsemPle,$lote->mortacuPle,$lote->selsemPle,$lote->msacuPle,$lote->saldoavesPle,$lote->convsemPle,$lote->gananciaavediarPle,$lote->cumpgananavesemanaPle,$lote->cumplconsgradPle,$lote->cumplpesoPle,$lote->cumplconsumoacmPle
            ]);
          }
        });
      })->download('xlsx');
    }
}
