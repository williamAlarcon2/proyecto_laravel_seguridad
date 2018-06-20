<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lote as Lote;
use App\Models\Sublote as Sublote;
use App\Models\Sistemaexplotacion as Sistemaexplotacion;
use Maatwebsite\Excel\Facades\Excel;

class ConsolidarsubloteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Avicol/ConsolidarSublote/list');
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
    public function search(Request $request)
    {
        $lotes = Lote::select('sublotes.nombreSub','lotes.nombreLot','lotes.id as idlot','estados.nombreEst')
                        ->join('sublotes' , 'sublotes.idLote' , '=' , 'lotes.id')
                        ->join('estados' , 'estados.id' , '=' , 'sublotes.idEstado')
                        ->where('sublotes.idEstado','=',3)
                        ->where('nombreLot','=',$request->buscar)
                        ->groupBy('nombreLot')
                        ->get();

        $sublotes = Lote::select('sublotes.nombreSub')
                          ->join('sublotes' , 'sublotes.idLote' , '=' , 'lotes.id')
                          ->where('nombreLot','=',$request->buscar)
                          ->get();
        $sistema = Sistemaexplotacion::select('nombreSis','id')->get();

        return \View::make('Avicol/ConsolidarSublote/create', compact('lotes','sistema','sublotes'));

    }

    public function excelconsolidar(Request $request, $id)
    {
      $suma1 = Lote::select('ponedoraslevante_semanals.*')
                    ->leftjoin('sublotes','sublotes.idLote','=','lotes.id')
                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.idSublote' , '=' , 'sublotes.id')
                    ->leftjoin('ponedoraslevante_semanals','ponedoraslevante_semanals.idLevante','=','ponedoraslevantes.id')
                    ->where('lotes.id','=', $id)
                    ->where('ponedoraslevante_semanals.semanaPle','=', 1)
                    ->get();

      $array1 = $suma1->toarray();
      $totalavesmuertas1 = array_sum(array_column($array1, 'avesmuertasPle'));
      $totalmortalidad1 = array_sum(array_column($array1, 'mortalidadPle'));
      $totalseleccion1 = array_sum(array_column($array1, 'seleccionPle'));
      $totalotros1 = array_sum(array_column($array1, 'otrosPle'));
      $totalconsumo1 = array_sum(array_column($array1, 'consumoPle'));
      $totalpeso1 = array_sum(array_column($array1, 'pesoPle'));
      $totaluniformidad1 = array_sum(array_column($array1, 'uniformidadPle'));
      $totalcoeficiente1 = array_sum(array_column($array1, 'coeficientePle'));
      $totalkacum1 = array_sum(array_column($array1, 'kacumPle'));
      $totalavediareal1 = array_sum(array_column($array1, 'avediarealPle'));
      $totalgraveac1 = array_sum(array_column($array1, 'graveacPle'));
      $totalacu1 = array_sum(array_column($array1, 'acuPle'));
      $totalmortsem1 = array_sum(array_column($array1, 'mortsemPle'));
      $totalmortacu1 = array_sum(array_column($array1, 'mortacuPle'));
      $totalselsem1 = array_sum(array_column($array1, 'selsemPle'));
      $totalmsacu1 = array_sum(array_column($array1, 'msacuPle'));
      $totalsaldoaves1 = array_sum(array_column($array1, 'saldoavesPle'));
      $totalconvsem1 = array_sum(array_column($array1, 'convsemPle'));
      $totalgananciaavediar1 = array_sum(array_column($array1, 'gananciaavediarPle'));
      $totalcumpgananavesemana1 = array_sum(array_column($array1, 'cumpgananavesemanaPle'));
      $totalcumplconsgrad1 = array_sum(array_column($array1, 'cumplconsgradPle'));
      $totalcumplpeso1 = array_sum(array_column($array1, 'cumplpesoPle'));
      $totalcumplconsumoacm1 = array_sum(array_column($array1, 'cumplconsumoacmPle'));

      $suma2 = Lote::select('ponedoraslevante_semanals.*')
                    ->leftjoin('sublotes','sublotes.idLote','=','lotes.id')
                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.idSublote' , '=' , 'sublotes.id')
                    ->leftjoin('ponedoraslevante_semanals','ponedoraslevante_semanals.idLevante','=','ponedoraslevantes.id')
                    ->where('lotes.id','=', $id)
                    ->where('ponedoraslevante_semanals.semanaPle','=', 2)
                    ->get();

      $array2 = $suma2->toarray();
      $totalavesmuertas2 = array_sum(array_column($array2, 'avesmuertasPle'));
      $totalmortalidad2 = array_sum(array_column($array2, 'mortalidadPle'));
      $totalseleccion2 = array_sum(array_column($array2, 'seleccionPle'));
      $totalotros2 = array_sum(array_column($array2, 'otrosPle'));
      $totalconsumo2 = array_sum(array_column($array2, 'consumoPle'));
      $totalpeso2 = array_sum(array_column($array2, 'pesoPle'));
      $totaluniformidad2 = array_sum(array_column($array2, 'uniformidadPle'));
      $totalcoeficiente2 = array_sum(array_column($array2, 'coeficientePle'));
      $totalkacum2 = array_sum(array_column($array2, 'kacumPle'));
      $totalavediareal2 = array_sum(array_column($array2, 'avediarealPle'));
      $totalgraveac2 = array_sum(array_column($array2, 'graveacPle'));
      $totalacu2 = array_sum(array_column($array2, 'acuPle'));
      $totalmortsem2 = array_sum(array_column($array2, 'mortsemPle'));
      $totalmortacu2 = array_sum(array_column($array2, 'mortacuPle'));
      $totalselsem2 = array_sum(array_column($array2, 'selsemPle'));
      $totalmsacu2 = array_sum(array_column($array2, 'msacuPle'));
      $totalsaldoaves2 = array_sum(array_column($array2, 'saldoavesPle'));
      $totalconvsem2 = array_sum(array_column($array2, 'convsemPle'));
      $totalgananciaavediar2 = array_sum(array_column($array2, 'gananciaavediarPle'));
      $totalcumpgananavesemana2 = array_sum(array_column($array2, 'cumpgananavesemanaPle'));
      $totalcumplconsgrad2 = array_sum(array_column($array2, 'cumplconsgradPle'));
      $totalcumplpeso2 = array_sum(array_column($array2, 'cumplpesoPle'));
      $totalcumplconsumoacm2 = array_sum(array_column($array2, 'cumplconsumoacmPle'));

      $suma3 = Lote::select('ponedoraslevante_semanals.*')
                    ->leftjoin('sublotes','sublotes.idLote','=','lotes.id')
                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.idSublote' , '=' , 'sublotes.id')
                    ->leftjoin('ponedoraslevante_semanals','ponedoraslevante_semanals.idLevante','=','ponedoraslevantes.id')
                    ->where('lotes.id','=', $id)
                    ->where('ponedoraslevante_semanals.semanaPle','=', 3)
                    ->get();

      $array3 = $suma3->toarray();
      $totalavesmuertas3 = array_sum(array_column($array3, 'avesmuertasPle'));
      $totalmortalidad3 = array_sum(array_column($array3, 'mortalidadPle'));
      $totalseleccion3 = array_sum(array_column($array3, 'seleccionPle'));
      $totalotros3 = array_sum(array_column($array3, 'otrosPle'));
      $totalconsumo3 = array_sum(array_column($array3, 'consumoPle'));
      $totalpeso3 = array_sum(array_column($array3, 'pesoPle'));
      $totaluniformidad3 = array_sum(array_column($array3, 'uniformidadPle'));
      $totalcoeficiente3 = array_sum(array_column($array3, 'coeficientePle'));
      $totalkacum3 = array_sum(array_column($array3, 'kacumPle'));
      $totalavediareal3 = array_sum(array_column($array3, 'avediarealPle'));
      $totalgraveac3 = array_sum(array_column($array3, 'graveacPle'));
      $totalacu3 = array_sum(array_column($array3, 'acuPle'));
      $totalmortsem3 = array_sum(array_column($array3, 'mortsemPle'));
      $totalmortacu3 = array_sum(array_column($array3, 'mortacuPle'));
      $totalselsem3 = array_sum(array_column($array3, 'selsemPle'));
      $totalmsacu3 = array_sum(array_column($array3, 'msacuPle'));
      $totalsaldoaves3 = array_sum(array_column($array3, 'saldoavesPle'));
      $totalconvsem3 = array_sum(array_column($array3, 'convsemPle'));
      $totalgananciaavediar3 = array_sum(array_column($array3, 'gananciaavediarPle'));
      $totalcumpgananavesemana3 = array_sum(array_column($array3, 'cumpgananavesemanaPle'));
      $totalcumplconsgrad3 = array_sum(array_column($array3, 'cumplconsgradPle'));
      $totalcumplpeso3 = array_sum(array_column($array3, 'cumplpesoPle'));
      $totalcumplconsumoacm3 = array_sum(array_column($array3, 'cumplconsumoacmPle'));

      $suma4 = Lote::select('ponedoraslevante_semanals.*')
                    ->leftjoin('sublotes','sublotes.idLote','=','lotes.id')
                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.idSublote' , '=' , 'sublotes.id')
                    ->leftjoin('ponedoraslevante_semanals','ponedoraslevante_semanals.idLevante','=','ponedoraslevantes.id')
                    ->where('lotes.id','=', $id)
                    ->where('ponedoraslevante_semanals.semanaPle','=', 4)
                    ->get();

      $array4 = $suma4->toarray();
      $totalavesmuertas4 = array_sum(array_column($array4, 'avesmuertasPle'));
      $totalmortalidad4 = array_sum(array_column($array4, 'mortalidadPle'));
      $totalseleccion4 = array_sum(array_column($array4, 'seleccionPle'));
      $totalotros4 = array_sum(array_column($array4, 'otrosPle'));
      $totalconsumo4 = array_sum(array_column($array4, 'consumoPle'));
      $totalpeso4 = array_sum(array_column($array4, 'pesoPle'));
      $totaluniformidad4 = array_sum(array_column($array4, 'uniformidadPle'));
      $totalcoeficiente4 = array_sum(array_column($array4, 'coeficientePle'));
      $totalkacum4 = array_sum(array_column($array4, 'kacumPle'));
      $totalavediareal4 = array_sum(array_column($array4, 'avediarealPle'));
      $totalgraveac4 = array_sum(array_column($array4, 'graveacPle'));
      $totalacu4 = array_sum(array_column($array4, 'acuPle'));
      $totalmortsem4 = array_sum(array_column($array4, 'mortsemPle'));
      $totalmortacu4 = array_sum(array_column($array4, 'mortacuPle'));
      $totalselsem4 = array_sum(array_column($array4, 'selsemPle'));
      $totalmsacu4 = array_sum(array_column($array4, 'msacuPle'));
      $totalsaldoaves4 = array_sum(array_column($array4, 'saldoavesPle'));
      $totalconvsem4 = array_sum(array_column($array4, 'convsemPle'));
      $totalgananciaavediar4 = array_sum(array_column($array4, 'gananciaavediarPle'));
      $totalcumpgananavesemana4 = array_sum(array_column($array4, 'cumpgananavesemanaPle'));
      $totalcumplconsgrad4 = array_sum(array_column($array4, 'cumplconsgradPle'));
      $totalcumplpeso4 = array_sum(array_column($array4, 'cumplpesoPle'));
      $totalcumplconsumoacm4 = array_sum(array_column($array4, 'cumplconsumoacmPle'));

      $suma5 = Lote::select('ponedoraslevante_semanals.*')
                    ->leftjoin('sublotes','sublotes.idLote','=','lotes.id')
                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.idSublote' , '=' , 'sublotes.id')
                    ->leftjoin('ponedoraslevante_semanals','ponedoraslevante_semanals.idLevante','=','ponedoraslevantes.id')
                    ->where('lotes.id','=', $id)
                    ->where('ponedoraslevante_semanals.semanaPle','=', 5)
                    ->get();

      $array5 = $suma5->toarray();
      $totalavesmuertas5 = array_sum(array_column($array5, 'avesmuertasPle'));
      $totalmortalidad5 = array_sum(array_column($array5, 'mortalidadPle'));
      $totalseleccion5 = array_sum(array_column($array5, 'seleccionPle'));
      $totalotros5 = array_sum(array_column($array5, 'otrosPle'));
      $totalconsumo5 = array_sum(array_column($array5, 'consumoPle'));
      $totalpeso5 = array_sum(array_column($array5, 'pesoPle'));
      $totaluniformidad5 = array_sum(array_column($array5, 'uniformidadPle'));
      $totalcoeficiente5 = array_sum(array_column($array5, 'coeficientePle'));
      $totalkacum5 = array_sum(array_column($array5, 'kacumPle'));
      $totalavediareal5 = array_sum(array_column($array5, 'avediarealPle'));
      $totalgraveac5 = array_sum(array_column($array5, 'graveacPle'));
      $totalacu5 = array_sum(array_column($array5, 'acuPle'));
      $totalmortsem5 = array_sum(array_column($array5, 'mortsemPle'));
      $totalmortacu5 = array_sum(array_column($array5, 'mortacuPle'));
      $totalselsem5 = array_sum(array_column($array5, 'selsemPle'));
      $totalmsacu5 = array_sum(array_column($array5, 'msacuPle'));
      $totalsaldoaves5 = array_sum(array_column($array5, 'saldoavesPle'));
      $totalconvsem5 = array_sum(array_column($array5, 'convsemPle'));
      $totalgananciaavediar5 = array_sum(array_column($array5, 'gananciaavediarPle'));
      $totalcumpgananavesemana5 = array_sum(array_column($array5, 'cumpgananavesemanaPle'));
      $totalcumplconsgrad5 = array_sum(array_column($array5, 'cumplconsgradPle'));
      $totalcumplpeso5 = array_sum(array_column($array5, 'cumplpesoPle'));
      $totalcumplconsumoacm5 = array_sum(array_column($array5, 'cumplconsumoacmPle'));

      $suma6 = Lote::select('ponedoraslevante_semanals.*')
                    ->leftjoin('sublotes','sublotes.idLote','=','lotes.id')
                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.idSublote' , '=' , 'sublotes.id')
                    ->leftjoin('ponedoraslevante_semanals','ponedoraslevante_semanals.idLevante','=','ponedoraslevantes.id')
                    ->where('lotes.id','=', $id)
                    ->where('ponedoraslevante_semanals.semanaPle','=', 6)
                    ->get();

      $array6 = $suma6->toarray();
      $totalavesmuertas6 = array_sum(array_column($array6, 'avesmuertasPle'));
      $totalmortalidad6 = array_sum(array_column($array6, 'mortalidadPle'));
      $totalseleccion6 = array_sum(array_column($array6, 'seleccionPle'));
      $totalotros6 = array_sum(array_column($array6, 'otrosPle'));
      $totalconsumo6 = array_sum(array_column($array6, 'consumoPle'));
      $totalpeso6 = array_sum(array_column($array6, 'pesoPle'));
      $totaluniformidad6 = array_sum(array_column($array6, 'uniformidadPle'));
      $totalcoeficiente6 = array_sum(array_column($array6, 'coeficientePle'));
      $totalkacum6 = array_sum(array_column($array6, 'kacumPle'));
      $totalavediareal6 = array_sum(array_column($array6, 'avediarealPle'));
      $totalgraveac6 = array_sum(array_column($array6, 'graveacPle'));
      $totalacu6 = array_sum(array_column($array6, 'acuPle'));
      $totalmortsem6 = array_sum(array_column($array6, 'mortsemPle'));
      $totalmortacu6 = array_sum(array_column($array6, 'mortacuPle'));
      $totalselsem6 = array_sum(array_column($array6, 'selsemPle'));
      $totalmsacu6 = array_sum(array_column($array6, 'msacuPle'));
      $totalsaldoaves6 = array_sum(array_column($array6, 'saldoavesPle'));
      $totalconvsem6 = array_sum(array_column($array6, 'convsemPle'));
      $totalgananciaavediar6 = array_sum(array_column($array6, 'gananciaavediarPle'));
      $totalcumpgananavesemana6 = array_sum(array_column($array6, 'cumpgananavesemanaPle'));
      $totalcumplconsgrad6 = array_sum(array_column($array6, 'cumplconsgradPle'));
      $totalcumplpeso6 = array_sum(array_column($array6, 'cumplpesoPle'));
      $totalcumplconsumoacm6 = array_sum(array_column($array6, 'cumplconsumoacmPle'));

      $suma7 = Lote::select('ponedoraslevante_semanals.*')
                    ->leftjoin('sublotes','sublotes.idLote','=','lotes.id')
                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.idSublote' , '=' , 'sublotes.id')
                    ->leftjoin('ponedoraslevante_semanals','ponedoraslevante_semanals.idLevante','=','ponedoraslevantes.id')
                    ->where('lotes.id','=', $id)
                    ->where('ponedoraslevante_semanals.semanaPle','=', 7)
                    ->get();

      $array7 = $suma7->toarray();
      $totalavesmuertas7 = array_sum(array_column($array7, 'avesmuertasPle'));
      $totalmortalidad7 = array_sum(array_column($array7, 'mortalidadPle'));
      $totalseleccion7 = array_sum(array_column($array7, 'seleccionPle'));
      $totalotros7 = array_sum(array_column($array7, 'otrosPle'));
      $totalconsumo7 = array_sum(array_column($array7, 'consumoPle'));
      $totalpeso7 = array_sum(array_column($array7, 'pesoPle'));
      $totaluniformidad7 = array_sum(array_column($array7, 'uniformidadPle'));
      $totalcoeficiente7 = array_sum(array_column($array7, 'coeficientePle'));
      $totalkacum7 = array_sum(array_column($array7, 'kacumPle'));
      $totalavediareal7 = array_sum(array_column($array7, 'avediarealPle'));
      $totalgraveac7 = array_sum(array_column($array7, 'graveacPle'));
      $totalacu7 = array_sum(array_column($array7, 'acuPle'));
      $totalmortsem7 = array_sum(array_column($array7, 'mortsemPle'));
      $totalmortacu7 = array_sum(array_column($array7, 'mortacuPle'));
      $totalselsem7 = array_sum(array_column($array7, 'selsemPle'));
      $totalmsacu7 = array_sum(array_column($array7, 'msacuPle'));
      $totalsaldoaves7 = array_sum(array_column($array7, 'saldoavesPle'));
      $totalconvsem7 = array_sum(array_column($array7, 'convsemPle'));
      $totalgananciaavediar7 = array_sum(array_column($array7, 'gananciaavediarPle'));
      $totalcumpgananavesemana7 = array_sum(array_column($array7, 'cumpgananavesemanaPle'));
      $totalcumplconsgrad7 = array_sum(array_column($array7, 'cumplconsgradPle'));
      $totalcumplpeso7 = array_sum(array_column($array7, 'cumplpesoPle'));
      $totalcumplconsumoacm7 = array_sum(array_column($array7, 'cumplconsumoacmPle'));

      $suma8 = Lote::select('ponedoraslevante_semanals.*')
                    ->leftjoin('sublotes','sublotes.idLote','=','lotes.id')
                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.idSublote' , '=' , 'sublotes.id')
                    ->leftjoin('ponedoraslevante_semanals','ponedoraslevante_semanals.idLevante','=','ponedoraslevantes.id')
                    ->where('lotes.id','=', $id)
                    ->where('ponedoraslevante_semanals.semanaPle','=', 8)
                    ->get();

      $array8 = $suma8->toarray();
      $totalavesmuertas8 = array_sum(array_column($array8, 'avesmuertasPle'));
      $totalmortalidad8 = array_sum(array_column($array8, 'mortalidadPle'));
      $totalseleccion8 = array_sum(array_column($array8, 'seleccionPle'));
      $totalotros8 = array_sum(array_column($array8, 'otrosPle'));
      $totalconsumo8 = array_sum(array_column($array8, 'consumoPle'));
      $totalpeso8 = array_sum(array_column($array8, 'pesoPle'));
      $totaluniformidad8 = array_sum(array_column($array8, 'uniformidadPle'));
      $totalcoeficiente8 = array_sum(array_column($array8, 'coeficientePle'));
      $totalkacum8 = array_sum(array_column($array8, 'kacumPle'));
      $totalavediareal8 = array_sum(array_column($array8, 'avediarealPle'));
      $totalgraveac8 = array_sum(array_column($array8, 'graveacPle'));
      $totalacu8 = array_sum(array_column($array8, 'acuPle'));
      $totalmortsem8 = array_sum(array_column($array8, 'mortsemPle'));
      $totalmortacu8 = array_sum(array_column($array8, 'mortacuPle'));
      $totalselsem8 = array_sum(array_column($array8, 'selsemPle'));
      $totalmsacu8 = array_sum(array_column($array8, 'msacuPle'));
      $totalsaldoaves8 = array_sum(array_column($array8, 'saldoavesPle'));
      $totalconvsem8 = array_sum(array_column($array8, 'convsemPle'));
      $totalgananciaavediar8 = array_sum(array_column($array8, 'gananciaavediarPle'));
      $totalcumpgananavesemana8 = array_sum(array_column($array8, 'cumpgananavesemanaPle'));
      $totalcumplconsgrad8 = array_sum(array_column($array8, 'cumplconsgradPle'));
      $totalcumplpeso8 = array_sum(array_column($array8, 'cumplpesoPle'));
      $totalcumplconsumoacm8 = array_sum(array_column($array8, 'cumplconsumoacmPle'));

      $suma9 = Lote::select('ponedoraslevante_semanals.*')
                    ->leftjoin('sublotes','sublotes.idLote','=','lotes.id')
                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.idSublote' , '=' , 'sublotes.id')
                    ->leftjoin('ponedoraslevante_semanals','ponedoraslevante_semanals.idLevante','=','ponedoraslevantes.id')
                    ->where('lotes.id','=', $id)
                    ->where('ponedoraslevante_semanals.semanaPle','=', 9)
                    ->get();

      $array9 = $suma9->toarray();
      $totalavesmuertas9 = array_sum(array_column($array9, 'avesmuertasPle'));
      $totalmortalidad9 = array_sum(array_column($array9, 'mortalidadPle'));
      $totalseleccion9 = array_sum(array_column($array9, 'seleccionPle'));
      $totalotros9 = array_sum(array_column($array9, 'otrosPle'));
      $totalconsumo9 = array_sum(array_column($array9, 'consumoPle'));
      $totalpeso9 = array_sum(array_column($array9, 'pesoPle'));
      $totaluniformidad9 = array_sum(array_column($array9, 'uniformidadPle'));
      $totalcoeficiente9 = array_sum(array_column($array9, 'coeficientePle'));
      $totalkacum9 = array_sum(array_column($array9, 'kacumPle'));
      $totalavediareal9 = array_sum(array_column($array9, 'avediarealPle'));
      $totalgraveac9 = array_sum(array_column($array9, 'graveacPle'));
      $totalacu9 = array_sum(array_column($array9, 'acuPle'));
      $totalmortsem9 = array_sum(array_column($array9, 'mortsemPle'));
      $totalmortacu9 = array_sum(array_column($array9, 'mortacuPle'));
      $totalselsem9 = array_sum(array_column($array9, 'selsemPle'));
      $totalmsacu9 = array_sum(array_column($array9, 'msacuPle'));
      $totalsaldoaves9 = array_sum(array_column($array9, 'saldoavesPle'));
      $totalconvsem9 = array_sum(array_column($array9, 'convsemPle'));
      $totalgananciaavediar9 = array_sum(array_column($array9, 'gananciaavediarPle'));
      $totalcumpgananavesemana9 = array_sum(array_column($array9, 'cumpgananavesemanaPle'));
      $totalcumplconsgrad9 = array_sum(array_column($array9, 'cumplconsgradPle'));
      $totalcumplpeso9 = array_sum(array_column($array9, 'cumplpesoPle'));
      $totalcumplconsumoacm9 = array_sum(array_column($array9, 'cumplconsumoacmPle'));

      $suma10 = Lote::select('ponedoraslevante_semanals.*')
                    ->leftjoin('sublotes','sublotes.idLote','=','lotes.id')
                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.idSublote' , '=' , 'sublotes.id')
                    ->leftjoin('ponedoraslevante_semanals','ponedoraslevante_semanals.idLevante','=','ponedoraslevantes.id')
                    ->where('lotes.id','=', $id)
                    ->where('ponedoraslevante_semanals.semanaPle','=', 10)
                    ->get();

      $array10 = $suma10->toarray();
      $totalavesmuertas10 = array_sum(array_column($array10, 'avesmuertasPle'));
      $totalmortalidad10 = array_sum(array_column($array10, 'mortalidadPle'));
      $totalseleccion10 = array_sum(array_column($array10, 'seleccionPle'));
      $totalotros10 = array_sum(array_column($array10, 'otrosPle'));
      $totalconsumo10 = array_sum(array_column($array10, 'consumoPle'));
      $totalpeso10 = array_sum(array_column($array10, 'pesoPle'));
      $totaluniformidad10 = array_sum(array_column($array10, 'uniformidadPle'));
      $totalcoeficiente10 = array_sum(array_column($array10, 'coeficientePle'));
      $totalkacum10 = array_sum(array_column($array10, 'kacumPle'));
      $totalavediareal10 = array_sum(array_column($array10, 'avediarealPle'));
      $totalgraveac10 = array_sum(array_column($array10, 'graveacPle'));
      $totalacu10 = array_sum(array_column($array10, 'acuPle'));
      $totalmortsem10 = array_sum(array_column($array10, 'mortsemPle'));
      $totalmortacu10 = array_sum(array_column($array10, 'mortacuPle'));
      $totalselsem10 = array_sum(array_column($array10, 'selsemPle'));
      $totalmsacu10 = array_sum(array_column($array10, 'msacuPle'));
      $totalsaldoaves10 = array_sum(array_column($array10, 'saldoavesPle'));
      $totalconvsem10 = array_sum(array_column($array10, 'convsemPle'));
      $totalgananciaavediar10 = array_sum(array_column($array10, 'gananciaavediarPle'));
      $totalcumpgananavesemana10 = array_sum(array_column($array10, 'cumpgananavesemanaPle'));
      $totalcumplconsgrad10 = array_sum(array_column($array10, 'cumplconsgradPle'));
      $totalcumplpeso10 = array_sum(array_column($array10, 'cumplpesoPle'));
      $totalcumplconsumoacm10 = array_sum(array_column($array10, 'cumplconsumoacmPle'));

      $suma11 = Lote::select('ponedoraslevante_semanals.*')
                    ->leftjoin('sublotes','sublotes.idLote','=','lotes.id')
                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.idSublote' , '=' , 'sublotes.id')
                    ->leftjoin('ponedoraslevante_semanals','ponedoraslevante_semanals.idLevante','=','ponedoraslevantes.id')
                    ->where('lotes.id','=', $id)
                    ->where('ponedoraslevante_semanals.semanaPle','=', 11)
                    ->get();

      $array11 = $suma11->toarray();
      $totalavesmuertas11 = array_sum(array_column($array11, 'avesmuertasPle'));
      $totalmortalidad11 = array_sum(array_column($array11, 'mortalidadPle'));
      $totalseleccion11 = array_sum(array_column($array11, 'seleccionPle'));
      $totalotros11 = array_sum(array_column($array11, 'otrosPle'));
      $totalconsumo11 = array_sum(array_column($array11, 'consumoPle'));
      $totalpeso11 = array_sum(array_column($array11, 'pesoPle'));
      $totaluniformidad11 = array_sum(array_column($array11, 'uniformidadPle'));
      $totalcoeficiente11 = array_sum(array_column($array11, 'coeficientePle'));
      $totalkacum11 = array_sum(array_column($array11, 'kacumPle'));
      $totalavediareal11 = array_sum(array_column($array11, 'avediarealPle'));
      $totalgraveac11 = array_sum(array_column($array11, 'graveacPle'));
      $totalacu11 = array_sum(array_column($array11, 'acuPle'));
      $totalmortsem11 = array_sum(array_column($array11, 'mortsemPle'));
      $totalmortacu11 = array_sum(array_column($array11, 'mortacuPle'));
      $totalselsem11 = array_sum(array_column($array11, 'selsemPle'));
      $totalmsacu11 = array_sum(array_column($array11, 'msacuPle'));
      $totalsaldoaves11 = array_sum(array_column($array11, 'saldoavesPle'));
      $totalconvsem11 = array_sum(array_column($array11, 'convsemPle'));
      $totalgananciaavediar11 = array_sum(array_column($array11, 'gananciaavediarPle'));
      $totalcumpgananavesemana11 = array_sum(array_column($array11, 'cumpgananavesemanaPle'));
      $totalcumplconsgrad11 = array_sum(array_column($array11, 'cumplconsgradPle'));
      $totalcumplpeso11 = array_sum(array_column($array11, 'cumplpesoPle'));
      $totalcumplconsumoacm11 = array_sum(array_column($array11, 'cumplconsumoacmPle'));

      $suma12 = Lote::select('ponedoraslevante_semanals.*')
                    ->leftjoin('sublotes','sublotes.idLote','=','lotes.id')
                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.idSublote' , '=' , 'sublotes.id')
                    ->leftjoin('ponedoraslevante_semanals','ponedoraslevante_semanals.idLevante','=','ponedoraslevantes.id')
                    ->where('lotes.id','=', $id)
                    ->where('ponedoraslevante_semanals.semanaPle','=', 12)
                    ->get();

      $array12 = $suma12->toarray();
      $totalavesmuertas12 = array_sum(array_column($array12, 'avesmuertasPle'));
      $totalmortalidad12 = array_sum(array_column($array12, 'mortalidadPle'));
      $totalseleccion12 = array_sum(array_column($array12, 'seleccionPle'));
      $totalotros12 = array_sum(array_column($array12, 'otrosPle'));
      $totalconsumo12 = array_sum(array_column($array12, 'consumoPle'));
      $totalpeso12 = array_sum(array_column($array12, 'pesoPle'));
      $totaluniformidad12 = array_sum(array_column($array12, 'uniformidadPle'));
      $totalcoeficiente12 = array_sum(array_column($array12, 'coeficientePle'));
      $totalkacum12 = array_sum(array_column($array12, 'kacumPle'));
      $totalavediareal12 = array_sum(array_column($array12, 'avediarealPle'));
      $totalgraveac12 = array_sum(array_column($array12, 'graveacPle'));
      $totalacu12 = array_sum(array_column($array12, 'acuPle'));
      $totalmortsem12 = array_sum(array_column($array12, 'mortsemPle'));
      $totalmortacu12 = array_sum(array_column($array12, 'mortacuPle'));
      $totalselsem12 = array_sum(array_column($array12, 'selsemPle'));
      $totalmsacu12 = array_sum(array_column($array12, 'msacuPle'));
      $totalsaldoaves12 = array_sum(array_column($array12, 'saldoavesPle'));
      $totalconvsem12 = array_sum(array_column($array12, 'convsemPle'));
      $totalgananciaavediar12 = array_sum(array_column($array12, 'gananciaavediarPle'));
      $totalcumpgananavesemana12 = array_sum(array_column($array12, 'cumpgananavesemanaPle'));
      $totalcumplconsgrad12 = array_sum(array_column($array12, 'cumplconsgradPle'));
      $totalcumplpeso12 = array_sum(array_column($array12, 'cumplpesoPle'));
      $totalcumplconsumoacm12 = array_sum(array_column($array12, 'cumplconsumoacmPle'));

      $suma13 = Lote::select('ponedoraslevante_semanals.*')
                    ->leftjoin('sublotes','sublotes.idLote','=','lotes.id')
                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.idSublote' , '=' , 'sublotes.id')
                    ->leftjoin('ponedoraslevante_semanals','ponedoraslevante_semanals.idLevante','=','ponedoraslevantes.id')
                    ->where('lotes.id','=', $id)
                    ->where('ponedoraslevante_semanals.semanaPle','=', 13)
                    ->get();

      $array13 = $suma13->toarray();
      $totalavesmuertas13 = array_sum(array_column($array13, 'avesmuertasPle'));
      $totalmortalidad13 = array_sum(array_column($array13, 'mortalidadPle'));
      $totalseleccion13 = array_sum(array_column($array13, 'seleccionPle'));
      $totalotros13 = array_sum(array_column($array13, 'otrosPle'));
      $totalconsumo13 = array_sum(array_column($array13, 'consumoPle'));
      $totalpeso13 = array_sum(array_column($array13, 'pesoPle'));
      $totaluniformidad13 = array_sum(array_column($array13, 'uniformidadPle'));
      $totalcoeficiente13 = array_sum(array_column($array13, 'coeficientePle'));
      $totalkacum13 = array_sum(array_column($array13, 'kacumPle'));
      $totalavediareal13 = array_sum(array_column($array13, 'avediarealPle'));
      $totalgraveac13 = array_sum(array_column($array13, 'graveacPle'));
      $totalacu13 = array_sum(array_column($array13, 'acuPle'));
      $totalmortsem13 = array_sum(array_column($array13, 'mortsemPle'));
      $totalmortacu13 = array_sum(array_column($array13, 'mortacuPle'));
      $totalselsem13 = array_sum(array_column($array13, 'selsemPle'));
      $totalmsacu13 = array_sum(array_column($array13, 'msacuPle'));
      $totalsaldoaves13 = array_sum(array_column($array13, 'saldoavesPle'));
      $totalconvsem13 = array_sum(array_column($array13, 'convsemPle'));
      $totalgananciaavediar13 = array_sum(array_column($array13, 'gananciaavediarPle'));
      $totalcumpgananavesemana13 = array_sum(array_column($array13, 'cumpgananavesemanaPle'));
      $totalcumplconsgrad13 = array_sum(array_column($array13, 'cumplconsgradPle'));
      $totalcumplpeso13 = array_sum(array_column($array13, 'cumplpesoPle'));
      $totalcumplconsumoacm13 = array_sum(array_column($array13, 'cumplconsumoacmPle'));

      $suma14 = Lote::select('ponedoraslevante_semanals.*')
                    ->leftjoin('sublotes','sublotes.idLote','=','lotes.id')
                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.idSublote' , '=' , 'sublotes.id')
                    ->leftjoin('ponedoraslevante_semanals','ponedoraslevante_semanals.idLevante','=','ponedoraslevantes.id')
                    ->where('lotes.id','=', $id)
                    ->where('ponedoraslevante_semanals.semanaPle','=', 14)
                    ->get();

      $array14 = $suma14->toarray();
      $totalavesmuertas14 = array_sum(array_column($array14, 'avesmuertasPle'));
      $totalmortalidad14 = array_sum(array_column($array14, 'mortalidadPle'));
      $totalseleccion14 = array_sum(array_column($array14, 'seleccionPle'));
      $totalotros14 = array_sum(array_column($array14, 'otrosPle'));
      $totalconsumo14 = array_sum(array_column($array14, 'consumoPle'));
      $totalpeso14 = array_sum(array_column($array14, 'pesoPle'));
      $totaluniformidad14 = array_sum(array_column($array14, 'uniformidadPle'));
      $totalcoeficiente14 = array_sum(array_column($array14, 'coeficientePle'));
      $totalkacum14 = array_sum(array_column($array14, 'kacumPle'));
      $totalavediareal14 = array_sum(array_column($array14, 'avediarealPle'));
      $totalgraveac14 = array_sum(array_column($array14, 'graveacPle'));
      $totalacu14 = array_sum(array_column($array14, 'acuPle'));
      $totalmortsem14 = array_sum(array_column($array14, 'mortsemPle'));
      $totalmortacu14 = array_sum(array_column($array14, 'mortacuPle'));
      $totalselsem14 = array_sum(array_column($array14, 'selsemPle'));
      $totalmsacu14 = array_sum(array_column($array14, 'msacuPle'));
      $totalsaldoaves14 = array_sum(array_column($array14, 'saldoavesPle'));
      $totalconvsem14 = array_sum(array_column($array14, 'convsemPle'));
      $totalgananciaavediar14 = array_sum(array_column($array14, 'gananciaavediarPle'));
      $totalcumpgananavesemana14 = array_sum(array_column($array14, 'cumpgananavesemanaPle'));
      $totalcumplconsgrad14 = array_sum(array_column($array14, 'cumplconsgradPle'));
      $totalcumplpeso14 = array_sum(array_column($array14, 'cumplpesoPle'));
      $totalcumplconsumoacm14 = array_sum(array_column($array14, 'cumplconsumoacmPle'));

      $suma15 = Lote::select('ponedoraslevante_semanals.*')
                    ->leftjoin('sublotes','sublotes.idLote','=','lotes.id')
                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.idSublote' , '=' , 'sublotes.id')
                    ->leftjoin('ponedoraslevante_semanals','ponedoraslevante_semanals.idLevante','=','ponedoraslevantes.id')
                    ->where('lotes.id','=', $id)
                    ->where('ponedoraslevante_semanals.semanaPle','=', 15)
                    ->get();

      $array15 = $suma15->toarray();
      $totalavesmuertas15 = array_sum(array_column($array15, 'avesmuertasPle'));
      $totalmortalidad15 = array_sum(array_column($array15, 'mortalidadPle'));
      $totalseleccion15 = array_sum(array_column($array15, 'seleccionPle'));
      $totalotros15 = array_sum(array_column($array15, 'otrosPle'));
      $totalconsumo15 = array_sum(array_column($array15, 'consumoPle'));
      $totalpeso15 = array_sum(array_column($array15, 'pesoPle'));
      $totaluniformidad15 = array_sum(array_column($array15, 'uniformidadPle'));
      $totalcoeficiente15 = array_sum(array_column($array15, 'coeficientePle'));
      $totalkacum15 = array_sum(array_column($array15, 'kacumPle'));
      $totalavediareal15 = array_sum(array_column($array15, 'avediarealPle'));
      $totalgraveac15 = array_sum(array_column($array15, 'graveacPle'));
      $totalacu15 = array_sum(array_column($array15, 'acuPle'));
      $totalmortsem15 = array_sum(array_column($array15, 'mortsemPle'));
      $totalmortacu15 = array_sum(array_column($array15, 'mortacuPle'));
      $totalselsem15 = array_sum(array_column($array15, 'selsemPle'));
      $totalmsacu15 = array_sum(array_column($array15, 'msacuPle'));
      $totalsaldoaves15 = array_sum(array_column($array15, 'saldoavesPle'));
      $totalconvsem15 = array_sum(array_column($array15, 'convsemPle'));
      $totalgananciaavediar15 = array_sum(array_column($array15, 'gananciaavediarPle'));
      $totalcumpgananavesemana15 = array_sum(array_column($array15, 'cumpgananavesemanaPle'));
      $totalcumplconsgrad15 = array_sum(array_column($array15, 'cumplconsgradPle'));
      $totalcumplpeso15 = array_sum(array_column($array15, 'cumplpesoPle'));
      $totalcumplconsumoacm15 = array_sum(array_column($array15, 'cumplconsumoacmPle'));

      $suma16 = Lote::select('ponedoraslevante_semanals.*')
                    ->leftjoin('sublotes','sublotes.idLote','=','lotes.id')
                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.idSublote' , '=' , 'sublotes.id')
                    ->leftjoin('ponedoraslevante_semanals','ponedoraslevante_semanals.idLevante','=','ponedoraslevantes.id')
                    ->where('lotes.id','=', $id)
                    ->where('ponedoraslevante_semanals.semanaPle','=', 16)
                    ->get();

      $array16 = $suma16->toarray();
      $totalavesmuertas16 = array_sum(array_column($array16, 'avesmuertasPle'));
      $totalmortalidad16 = array_sum(array_column($array16, 'mortalidadPle'));
      $totalseleccion16 = array_sum(array_column($array16, 'seleccionPle'));
      $totalotros16 = array_sum(array_column($array16, 'otrosPle'));
      $totalconsumo16 = array_sum(array_column($array16, 'consumoPle'));
      $totalpeso16 = array_sum(array_column($array16, 'pesoPle'));
      $totaluniformidad16 = array_sum(array_column($array16, 'uniformidadPle'));
      $totalcoeficiente16 = array_sum(array_column($array16, 'coeficientePle'));
      $totalkacum16 = array_sum(array_column($array16, 'kacumPle'));
      $totalavediareal16 = array_sum(array_column($array16, 'avediarealPle'));
      $totalgraveac16 = array_sum(array_column($array16, 'graveacPle'));
      $totalacu16 = array_sum(array_column($array16, 'acuPle'));
      $totalmortsem16 = array_sum(array_column($array16, 'mortsemPle'));
      $totalmortacu16 = array_sum(array_column($array16, 'mortacuPle'));
      $totalselsem16 = array_sum(array_column($array16, 'selsemPle'));
      $totalmsacu16 = array_sum(array_column($array16, 'msacuPle'));
      $totalsaldoaves16 = array_sum(array_column($array16, 'saldoavesPle'));
      $totalconvsem16 = array_sum(array_column($array16, 'convsemPle'));
      $totalgananciaavediar16 = array_sum(array_column($array16, 'gananciaavediarPle'));
      $totalcumpgananavesemana16 = array_sum(array_column($array16, 'cumpgananavesemanaPle'));
      $totalcumplconsgrad16 = array_sum(array_column($array16, 'cumplconsgradPle'));
      $totalcumplpeso16 = array_sum(array_column($array16, 'cumplpesoPle'));
      $totalcumplconsumoacm16 = array_sum(array_column($array16, 'cumplconsumoacmPle'));

      $suma17 = Lote::select('ponedoraslevante_semanals.*')
                    ->leftjoin('sublotes','sublotes.idLote','=','lotes.id')
                    ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.idSublote' , '=' , 'sublotes.id')
                    ->leftjoin('ponedoraslevante_semanals','ponedoraslevante_semanals.idLevante','=','ponedoraslevantes.id')
                    ->where('lotes.id','=', $id)
                    ->where('ponedoraslevante_semanals.semanaPle','=', 17)
                    ->get();

      $array17 = $suma17->toarray();
      $totalavesmuertas17 = array_sum(array_column($array17, 'avesmuertasPle'));
      $totalmortalidad17 = array_sum(array_column($array17, 'mortalidadPle'));
      $totalseleccion17 = array_sum(array_column($array17, 'seleccionPle'));
      $totalotros17 = array_sum(array_column($array17, 'otrosPle'));
      $totalconsumo17 = array_sum(array_column($array17, 'consumoPle'));
      $totalpeso17 = array_sum(array_column($array17, 'pesoPle'));
      $totaluniformidad17 = array_sum(array_column($array17, 'uniformidadPle'));
      $totalcoeficiente17 = array_sum(array_column($array17, 'coeficientePle'));
      $totalkacum17 = array_sum(array_column($array17, 'kacumPle'));
      $totalavediareal17 = array_sum(array_column($array17, 'avediarealPle'));
      $totalgraveac17 = array_sum(array_column($array17, 'graveacPle'));
      $totalacu17 = array_sum(array_column($array17, 'acuPle'));
      $totalmortsem17 = array_sum(array_column($array17, 'mortsemPle'));
      $totalmortacu17 = array_sum(array_column($array17, 'mortacuPle'));
      $totalselsem17 = array_sum(array_column($array17, 'selsemPle'));
      $totalmsacu17 = array_sum(array_column($array17, 'msacuPle'));
      $totalsaldoaves17 = array_sum(array_column($array17, 'saldoavesPle'));
      $totalconvsem17 = array_sum(array_column($array17, 'convsemPle'));
      $totalgananciaavediar17 = array_sum(array_column($array17, 'gananciaavediarPle'));
      $totalcumpgananavesemana17 = array_sum(array_column($array17, 'cumpgananavesemanaPle'));
      $totalcumplconsgrad17 = array_sum(array_column($array17, 'cumplconsgradPle'));
      $totalcumplpeso17 = array_sum(array_column($array17, 'cumplpesoPle'));
      $totalcumplconsumoacm17 = array_sum(array_column($array17, 'cumplconsumoacmPle'));

      $lotes = Sublote::select('empresas.nombreEmp','granjas.nombreGra','granjas.alturaGra','variedads.nombreVar','municipios.nombreMun','departamentos.nombreDep','pais.nombrePai','zonas.nombreZon','climas.nombreCli','sistemaexplotacions.nombreSis','ponedoraslevantes.*','ponedoraslevante_semanals.*','lotes.*','sublotes.*')
                            ->join('lotes','lotes.id','=','sublotes.idLote')
                            ->leftjoin('granjas','granjas.id','=', 'lotes.idGranja')
                            ->leftjoin('sistemaexplotacions','sistemaexplotacions.id','=', 'lotes.idSistema')
                            ->leftjoin('empresas','empresas.id','=','granjas.idEmpresa')
                            ->leftjoin('zonas','zonas.id','=','granjas.idZona')
                            ->leftjoin('climas','climas.id','=','granjas.idClima')
                            ->leftjoin('municipios','municipios.id','=','granjas.idMunicipio')
                            ->leftjoin('departamentos','departamentos.id','=','municipios.idDepartamento')
                            ->leftjoin('pais','pais.id','=','departamentos.idPais')
                            ->leftjoin('variedads','variedads.id','=','lotes.idVariedad')
                            ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.idSublote' , '=' , 'sublotes.id')
                            ->leftjoin('ponedoraslevante_semanals','ponedoraslevante_semanals.idLevante','=','ponedoraslevantes.id')
                            ->where('lotes.id','=', $id)
                            ->groupby('nombreLot')
                            ->get();

    $totales = Sublote::select('empresas.nombreEmp','granjas.nombreGra','granjas.alturaGra','variedads.nombreVar','municipios.nombreMun','departamentos.nombreDep','pais.nombrePai','zonas.nombreZon','climas.nombreCli','sistemaexplotacions.nombreSis','ponedoraslevantes.*','ponedoraslevante_semanals.*','lotes.*','sublotes.*')
                          ->join('lotes','lotes.id','=','sublotes.idLote')
                          ->leftjoin('granjas','granjas.id','=', 'lotes.idGranja')
                          ->leftjoin('sistemaexplotacions','sistemaexplotacions.id','=', 'lotes.idSistema')
                          ->leftjoin('empresas','empresas.id','=','granjas.idEmpresa')
                          ->leftjoin('zonas','zonas.id','=','granjas.idZona')
                          ->leftjoin('climas','climas.id','=','granjas.idClima')
                          ->leftjoin('municipios','municipios.id','=','granjas.idMunicipio')
                          ->leftjoin('departamentos','departamentos.id','=','municipios.idDepartamento')
                          ->leftjoin('pais','pais.id','=','departamentos.idPais')
                          ->leftjoin('variedads','variedads.id','=','lotes.idVariedad')
                          ->leftjoin('ponedoraslevantes' , 'ponedoraslevantes.idSublote' , '=' , 'sublotes.id')
                          ->leftjoin('ponedoraslevante_semanals','ponedoraslevante_semanals.idLevante','=','ponedoraslevantes.id')
                          ->where('sublotes.idLote','=', $id)
                          ->count() +1;

      foreach ($lotes as $lote) {
        if ($lote->idLote != null) {
          Excel::create('Consolidar Lotes',function($excel)use($lotes,$totales,$totalavesmuertas1,$totalmortalidad1,$totalseleccion1,$totalotros1,$totalconsumo1,$totalpeso1,$totaluniformidad1,$totalcoeficiente1,$totalkacum1,$totalavediareal1,$totalgraveac1,$totalacu1,$totalmortsem1,$totalmortacu1,$totalselsem1,$totalmsacu1,$totalsaldoaves1,$totalconvsem1,$totalgananciaavediar1,$totalcumpgananavesemana1,$totalcumplconsgrad1,$totalcumplpeso1,$totalcumplconsumoacm1,$totalavesmuertas2,$totalmortalidad2,$totalseleccion2,$totalotros2,$totalconsumo2,$totalpeso2,$totaluniformidad2,$totalcoeficiente2,$totalkacum2,$totalavediareal2,$totalgraveac2,$totalacu2,$totalmortsem2,$totalmortacu2,$totalselsem2,$totalmsacu2,$totalsaldoaves2,$totalconvsem2,$totalgananciaavediar2,$totalcumpgananavesemana2,$totalcumplconsgrad2,$totalcumplpeso2,$totalcumplconsumoacm2,$totalavesmuertas3,$totalmortalidad3,$totalseleccion3,$totalotros3,$totalconsumo3,$totalpeso3,$totaluniformidad3,$totalcoeficiente3,$totalkacum3,$totalavediareal3,$totalgraveac3,$totalacu3,$totalmortsem3,$totalmortacu3,$totalselsem3,$totalmsacu3,$totalsaldoaves3,$totalconvsem3,$totalgananciaavediar3,$totalcumpgananavesemana3,$totalcumplconsgrad3,$totalcumplpeso3,$totalcumplconsumoacm3,$totalavesmuertas4,$totalmortalidad4,$totalseleccion4,$totalotros4,$totalconsumo4,$totalpeso4,$totaluniformidad4,$totalcoeficiente4,$totalkacum4,$totalavediareal4,$totalgraveac4,$totalacu4,$totalmortsem4,$totalmortacu4,$totalselsem4,$totalmsacu4,$totalsaldoaves4,$totalconvsem4,$totalgananciaavediar4,$totalcumpgananavesemana4,$totalcumplconsgrad4,$totalcumplpeso4,$totalcumplconsumoacm4,$totalavesmuertas5,$totalmortalidad5,$totalseleccion5,$totalotros5,$totalconsumo5,$totalpeso5,$totaluniformidad5,$totalcoeficiente5,$totalkacum5,$totalavediareal5,$totalgraveac5,$totalacu5,$totalmortsem5,$totalmortacu5,$totalselsem5,$totalmsacu5,$totalsaldoaves5,$totalconvsem5,$totalgananciaavediar5,$totalcumpgananavesemana5,$totalcumplconsgrad5,$totalcumplpeso5,$totalcumplconsumoacm5,$totalavesmuertas6,$totalmortalidad6,$totalseleccion6,$totalotros6,$totalconsumo6,$totalpeso6,$totaluniformidad6,$totalcoeficiente6,$totalkacum6,$totalavediareal6,$totalgraveac6,$totalacu6,$totalmortsem6,$totalmortacu6,$totalselsem6,$totalmsacu6,$totalsaldoaves6,$totalconvsem6,$totalgananciaavediar6,$totalcumpgananavesemana6,$totalcumplconsgrad6,$totalcumplpeso6,$totalcumplconsumoacm6,$totalavesmuertas7,$totalmortalidad7,$totalseleccion7,$totalotros7,$totalconsumo7,$totalpeso7,$totaluniformidad7,$totalcoeficiente7,$totalkacum7,$totalavediareal7,$totalgraveac7,$totalacu7,$totalmortsem7,$totalmortacu7,$totalselsem7,$totalmsacu7,$totalsaldoaves7,$totalconvsem7,$totalgananciaavediar7,$totalcumpgananavesemana7,$totalcumplconsgrad7,$totalcumplpeso7,$totalcumplconsumoacm7,$totalavesmuertas8,$totalmortalidad8,$totalseleccion8,$totalotros8,$totalconsumo8,$totalpeso8,$totaluniformidad8,$totalcoeficiente8,$totalkacum8,$totalavediareal8,$totalgraveac8,$totalacu8,$totalmortsem8,$totalmortacu8,$totalselsem8,$totalmsacu8,$totalsaldoaves8,$totalconvsem8,$totalgananciaavediar8,$totalcumpgananavesemana8,$totalcumplconsgrad8,$totalcumplpeso8,$totalcumplconsumoacm8,$totalavesmuertas9,$totalmortalidad9,$totalseleccion9,$totalotros9,$totalconsumo9,$totalpeso9,$totaluniformidad9,$totalcoeficiente9,$totalkacum9,$totalavediareal9,$totalgraveac9,$totalacu9,$totalmortsem9,$totalmortacu9,$totalselsem9,$totalmsacu9,$totalsaldoaves9,$totalconvsem9,$totalgananciaavediar9,$totalcumpgananavesemana9,$totalcumplconsgrad9,$totalcumplpeso9,$totalcumplconsumoacm9,$totalavesmuertas10,$totalmortalidad10,$totalseleccion10,$totalotros10,$totalconsumo10,$totalpeso10,$totaluniformidad10,$totalcoeficiente10,$totalkacum10,$totalavediareal10,$totalgraveac10,$totalacu10,$totalmortsem10,$totalmortacu10,$totalselsem10,$totalmsacu10,$totalsaldoaves10,$totalconvsem10,$totalgananciaavediar10,$totalcumpgananavesemana10,$totalcumplconsgrad10,$totalcumplpeso10,$totalcumplconsumoacm10,$totalavesmuertas11,$totalmortalidad11,$totalseleccion11,$totalotros11,$totalconsumo11,$totalpeso11,$totaluniformidad11,$totalcoeficiente11,$totalkacum11,$totalavediareal11,$totalgraveac11,$totalacu11,$totalmortsem11,$totalmortacu11,$totalselsem11,$totalmsacu11,$totalsaldoaves11,$totalconvsem11,$totalgananciaavediar11,$totalcumpgananavesemana11,$totalcumplconsgrad11,$totalcumplpeso11,$totalcumplconsumoacm11,$totalavesmuertas12,$totalmortalidad12,$totalseleccion12,$totalotros12,$totalconsumo12,$totalpeso12,$totaluniformidad12,$totalcoeficiente12,$totalkacum12,$totalavediareal12,$totalgraveac12,$totalacu12,$totalmortsem12,$totalmortacu12,$totalselsem12,$totalmsacu12,$totalsaldoaves12,$totalconvsem12,$totalgananciaavediar12,$totalcumpgananavesemana12,$totalcumplconsgrad12,$totalcumplpeso12,$totalcumplconsumoacm12,$totalavesmuertas13,$totalmortalidad13,$totalseleccion13,$totalotros13,$totalconsumo13,$totalpeso13,$totaluniformidad13,$totalcoeficiente13,$totalkacum13,$totalavediareal13,$totalgraveac13,$totalacu13,$totalmortsem13,$totalmortacu13,$totalselsem13,$totalmsacu13,$totalsaldoaves13,$totalconvsem13,$totalgananciaavediar13,$totalcumpgananavesemana13,$totalcumplconsgrad13,$totalcumplpeso13,$totalcumplconsumoacm13,$totalavesmuertas14,$totalmortalidad14,$totalseleccion14,$totalotros14,$totalconsumo14,$totalpeso14,$totaluniformidad14,$totalcoeficiente14,$totalkacum14,$totalavediareal14,$totalgraveac14,$totalacu14,$totalmortsem14,$totalmortacu14,$totalselsem14,$totalmsacu14,$totalsaldoaves14,$totalconvsem14,$totalgananciaavediar14,$totalcumpgananavesemana14,$totalcumplconsgrad14,$totalcumplpeso14,$totalcumplconsumoacm14,$totalavesmuertas15,$totalmortalidad15,$totalseleccion15,$totalotros15,$totalconsumo15,$totalpeso15,$totaluniformidad15,$totalcoeficiente15,$totalkacum15,$totalavediareal15,$totalgraveac15,$totalacu15,$totalmortsem15,$totalmortacu15,$totalselsem15,$totalmsacu15,$totalsaldoaves15,$totalconvsem15,$totalgananciaavediar15,$totalcumpgananavesemana15,$totalcumplconsgrad15,$totalcumplpeso15,$totalcumplconsumoacm15,$totalavesmuertas16,$totalmortalidad16,$totalseleccion16,$totalotros16,$totalconsumo16,$totalpeso16,$totaluniformidad16,$totalcoeficiente16,$totalkacum16,$totalavediareal16,$totalgraveac16,$totalacu16,$totalmortsem16,$totalmortacu16,$totalselsem16,$totalmsacu16,$totalsaldoaves16,$totalconvsem16,$totalgananciaavediar16,$totalcumpgananavesemana16,$totalcumplconsgrad16,$totalcumplpeso16,$totalcumplconsumoacm16,$totalavesmuertas17,$totalmortalidad17,$totalseleccion17,$totalotros17,$totalconsumo17,$totalpeso17,$totaluniformidad17,$totalcoeficiente17,$totalkacum17,$totalavediareal17,$totalgraveac17,$totalacu17,$totalmortsem17,$totalmortacu17,$totalselsem17,$totalmsacu17,$totalsaldoaves17,$totalconvsem17,$totalgananciaavediar17,$totalcumpgananavesemana17,$totalcumplconsgrad17,$totalcumplpeso17,$totalcumplconsumoacm17){

            $excel->sheet('Levante',function($sheet) use($lotes,$totales,$totalavesmuertas1,$totalmortalidad1,$totalseleccion1,$totalotros1,$totalconsumo1,$totalpeso1,$totaluniformidad1,$totalcoeficiente1,$totalkacum1,$totalavediareal1,$totalgraveac1,$totalacu1,$totalmortsem1,$totalmortacu1,$totalselsem1,$totalmsacu1,$totalsaldoaves1,$totalconvsem1,$totalgananciaavediar1,$totalcumpgananavesemana1,$totalcumplconsgrad1,$totalcumplpeso1,$totalcumplconsumoacm1,$totalavesmuertas2,$totalmortalidad2,$totalseleccion2,$totalotros2,$totalconsumo2,$totalpeso2,$totaluniformidad2,$totalcoeficiente2,$totalkacum2,$totalavediareal2,$totalgraveac2,$totalacu2,$totalmortsem2,$totalmortacu2,$totalselsem2,$totalmsacu2,$totalsaldoaves2,$totalconvsem2,$totalgananciaavediar2,$totalcumpgananavesemana2,$totalcumplconsgrad2,$totalcumplpeso2,$totalcumplconsumoacm2,$totalavesmuertas3,$totalmortalidad3,$totalseleccion3,$totalotros3,$totalconsumo3,$totalpeso3,$totaluniformidad3,$totalcoeficiente3,$totalkacum3,$totalavediareal3,$totalgraveac3,$totalacu3,$totalmortsem3,$totalmortacu3,$totalselsem3,$totalmsacu3,$totalsaldoaves3,$totalconvsem3,$totalgananciaavediar3,$totalcumpgananavesemana3,$totalcumplconsgrad3,$totalcumplpeso3,$totalcumplconsumoacm3,$totalavesmuertas4,$totalmortalidad4,$totalseleccion4,$totalotros4,$totalconsumo4,$totalpeso4,$totaluniformidad4,$totalcoeficiente4,$totalkacum4,$totalavediareal4,$totalgraveac4,$totalacu4,$totalmortsem4,$totalmortacu4,$totalselsem4,$totalmsacu4,$totalsaldoaves4,$totalconvsem4,$totalgananciaavediar4,$totalcumpgananavesemana4,$totalcumplconsgrad4,$totalcumplpeso4,$totalcumplconsumoacm4,$totalavesmuertas5,$totalmortalidad5,$totalseleccion5,$totalotros5,$totalconsumo5,$totalpeso5,$totaluniformidad5,$totalcoeficiente5,$totalkacum5,$totalavediareal5,$totalgraveac5,$totalacu5,$totalmortsem5,$totalmortacu5,$totalselsem5,$totalmsacu5,$totalsaldoaves5,$totalconvsem5,$totalgananciaavediar5,$totalcumpgananavesemana5,$totalcumplconsgrad5,$totalcumplpeso5,$totalcumplconsumoacm5,$totalavesmuertas6,$totalmortalidad6,$totalseleccion6,$totalotros6,$totalconsumo6,$totalpeso6,$totaluniformidad6,$totalcoeficiente6,$totalkacum6,$totalavediareal6,$totalgraveac6,$totalacu6,$totalmortsem6,$totalmortacu6,$totalselsem6,$totalmsacu6,$totalsaldoaves6,$totalconvsem6,$totalgananciaavediar6,$totalcumpgananavesemana6,$totalcumplconsgrad6,$totalcumplpeso6,$totalcumplconsumoacm6,$totalavesmuertas7,$totalmortalidad7,$totalseleccion7,$totalotros7,$totalconsumo7,$totalpeso7,$totaluniformidad7,$totalcoeficiente7,$totalkacum7,$totalavediareal7,$totalgraveac7,$totalacu7,$totalmortsem7,$totalmortacu7,$totalselsem7,$totalmsacu7,$totalsaldoaves7,$totalconvsem7,$totalgananciaavediar7,$totalcumpgananavesemana7,$totalcumplconsgrad7,$totalcumplpeso7,$totalcumplconsumoacm7,$totalavesmuertas8,$totalmortalidad8,$totalseleccion8,$totalotros8,$totalconsumo8,$totalpeso8,$totaluniformidad8,$totalcoeficiente8,$totalkacum8,$totalavediareal8,$totalgraveac8,$totalacu8,$totalmortsem8,$totalmortacu8,$totalselsem8,$totalmsacu8,$totalsaldoaves8,$totalconvsem8,$totalgananciaavediar8,$totalcumpgananavesemana8,$totalcumplconsgrad8,$totalcumplpeso8,$totalcumplconsumoacm8,$totalavesmuertas9,$totalmortalidad9,$totalseleccion9,$totalotros9,$totalconsumo9,$totalpeso9,$totaluniformidad9,$totalcoeficiente9,$totalkacum9,$totalavediareal9,$totalgraveac9,$totalacu9,$totalmortsem9,$totalmortacu9,$totalselsem9,$totalmsacu9,$totalsaldoaves9,$totalconvsem9,$totalgananciaavediar9,$totalcumpgananavesemana9,$totalcumplconsgrad9,$totalcumplpeso9,$totalcumplconsumoacm9,$totalavesmuertas10,$totalmortalidad10,$totalseleccion10,$totalotros10,$totalconsumo10,$totalpeso10,$totaluniformidad10,$totalcoeficiente10,$totalkacum10,$totalavediareal10,$totalgraveac10,$totalacu10,$totalmortsem10,$totalmortacu10,$totalselsem10,$totalmsacu10,$totalsaldoaves10,$totalconvsem10,$totalgananciaavediar10,$totalcumpgananavesemana10,$totalcumplconsgrad10,$totalcumplpeso10,$totalcumplconsumoacm10,$totalavesmuertas11,$totalmortalidad11,$totalseleccion11,$totalotros11,$totalconsumo11,$totalpeso11,$totaluniformidad11,$totalcoeficiente11,$totalkacum11,$totalavediareal11,$totalgraveac11,$totalacu11,$totalmortsem11,$totalmortacu11,$totalselsem11,$totalmsacu11,$totalsaldoaves11,$totalconvsem11,$totalgananciaavediar11,$totalcumpgananavesemana11,$totalcumplconsgrad11,$totalcumplpeso11,$totalcumplconsumoacm11,$totalavesmuertas12,$totalmortalidad12,$totalseleccion12,$totalotros12,$totalconsumo12,$totalpeso12,$totaluniformidad12,$totalcoeficiente12,$totalkacum12,$totalavediareal12,$totalgraveac12,$totalacu12,$totalmortsem12,$totalmortacu12,$totalselsem12,$totalmsacu12,$totalsaldoaves12,$totalconvsem12,$totalgananciaavediar12,$totalcumpgananavesemana12,$totalcumplconsgrad12,$totalcumplpeso12,$totalcumplconsumoacm12,$totalavesmuertas13,$totalmortalidad13,$totalseleccion13,$totalotros13,$totalconsumo13,$totalpeso13,$totaluniformidad13,$totalcoeficiente13,$totalkacum13,$totalavediareal13,$totalgraveac13,$totalacu13,$totalmortsem13,$totalmortacu13,$totalselsem13,$totalmsacu13,$totalsaldoaves13,$totalconvsem13,$totalgananciaavediar13,$totalcumpgananavesemana13,$totalcumplconsgrad13,$totalcumplpeso13,$totalcumplconsumoacm13,$totalavesmuertas14,$totalmortalidad14,$totalseleccion14,$totalotros14,$totalconsumo14,$totalpeso14,$totaluniformidad14,$totalcoeficiente14,$totalkacum14,$totalavediareal14,$totalgraveac14,$totalacu14,$totalmortsem14,$totalmortacu14,$totalselsem14,$totalmsacu14,$totalsaldoaves14,$totalconvsem14,$totalgananciaavediar14,$totalcumpgananavesemana14,$totalcumplconsgrad14,$totalcumplpeso14,$totalcumplconsumoacm14,$totalavesmuertas15,$totalmortalidad15,$totalseleccion15,$totalotros15,$totalconsumo15,$totalpeso15,$totaluniformidad15,$totalcoeficiente15,$totalkacum15,$totalavediareal15,$totalgraveac15,$totalacu15,$totalmortsem15,$totalmortacu15,$totalselsem15,$totalmsacu15,$totalsaldoaves15,$totalconvsem15,$totalgananciaavediar15,$totalcumpgananavesemana15,$totalcumplconsgrad15,$totalcumplpeso15,$totalcumplconsumoacm15,$totalavesmuertas16,$totalmortalidad16,$totalseleccion16,$totalotros16,$totalconsumo16,$totalpeso16,$totaluniformidad16,$totalcoeficiente16,$totalkacum16,$totalavediareal16,$totalgraveac16,$totalacu16,$totalmortsem16,$totalmortacu16,$totalselsem16,$totalmsacu16,$totalsaldoaves16,$totalconvsem16,$totalgananciaavediar16,$totalcumpgananavesemana16,$totalcumplconsgrad16,$totalcumplpeso16,$totalcumplconsumoacm16,$totalavesmuertas17,$totalmortalidad17,$totalseleccion17,$totalotros17,$totalconsumo17,$totalpeso17,$totaluniformidad17,$totalcoeficiente17,$totalkacum17,$totalavediareal17,$totalgraveac17,$totalacu17,$totalmortsem17,$totalmortacu17,$totalselsem17,$totalmsacu17,$totalsaldoaves17,$totalconvsem17,$totalgananciaavediar17,$totalcumpgananavesemana17,$totalcumplconsgrad17,$totalcumplpeso17,$totalcumplconsumoacm17){

              $sheet->setBorder('A1:AU1', 'thin');
              $hola = 'A2:AU'.$totales;

              $sheet->setBorder($hola, 'thin');

              $sheet->cells('A1:AU1', function($cells)
              {
                $cells->setBackground('#163AA6');
                $cells->setFontColor('#FFFFFF');
                $cells->setAlignment('center');
                $cells->setValignment('middle');
              });

              $sheet->cells('A2:AU'.$totales, function($cells)
              {
                $cells->setBackground('#D7D7D6');
                $cells->setFontColor('#000000');
                $cells->setAlignment('center');
                $cells->setValignment('middle');
              });

              $sheet->row(1, [
                'Empresa','Granja','Variedad','Lote','Fecha Recepcion','Pollitas','Altura/Nivel del mar','Zona Avicol','Municipio','Departamento','Pais','Clima','Sistema Explotacion','Programa de Oscurecimiento','Foto Periodo','Despique','Traslado Px','Inicio Descenso Luz','Fin Descenso Luz','Semana Vida','Fecha FDS','N° Aves Muertas','Mortalidad','Seleccion','Otros','Alimento','Consumo Kg','Peso Ave','% Uniformidad','Coeficiente Variacion','Observaciones','K. Acum','Ave/Dia Real','Gr Ave Ac','Acu','%Mort Sem','%Mort Acu','%Sel Sem','%M+S Acu.','Saldo Aves','Conv Sem','Ganancia Ave Dia R','%Cump Ganan Ave Semana','%Cumpl Cons Gr.A.D','%Cumpl Peso','%Cumpl Consumo Acm'
              ]);
              foreach($lotes as $index => $lote) {
                $sheet->row($index+2, [
                    $lote->nombreEmp,$lote->nombreGra,$lote->nombreVar,$lote->nombreLot,$lote->encasetamientoLot,$lote->pollitasLot,$lote->alturaGra,$lote->nombreZon,$lote->nombreMun,$lote->nombreDep,$lote->nombrePai,$lote->nombreCli,$lote->nombreSis,$lote->programaPle,$lote->fotoPle,$lote->despiquePle,$lote->trasladoPle,$lote->inicioluzPle,$lote->finluzPle,$lote->semanaPle,$lote->fdsPle,$totalavesmuertas1,$totalmortalidad1,$totalseleccion1,$totalotros1,$lote->alimentoPle,$totalconsumo1,$totalpeso1,$totaluniformidad1,$totalcoeficiente1,$lote->observacionesPle,$totalkacum1,$totalavediareal1,$totalgraveac1,$totalacu1,$totalmortsem1,$totalmortacu1,$totalselsem1,$totalmsacu1,$totalsaldoaves1,$totalconvsem1,$totalgananciaavediar1,$totalcumpgananavesemana1,$totalcumplconsgrad1,$totalcumplpeso1,$totalcumplconsumoacm1
                ]);
              }
              foreach($lotes as $index => $lote) {
                $sheet->row($index+3, [
                    $lote->nombreEmp,$lote->nombreGra,$lote->nombreVar,$lote->nombreLot,$lote->encasetamientoLot,$lote->pollitasLot,$lote->alturaGra,$lote->nombreZon,$lote->nombreMun,$lote->nombreDep,$lote->nombrePai,$lote->nombreCli,$lote->nombreSis,$lote->programaPle,$lote->fotoPle,$lote->despiquePle,$lote->trasladoPle,$lote->inicioluzPle,$lote->finluzPle,$lote->semanaPle,$lote->fdsPle,$totalavesmuertas2,$totalmortalidad2,$totalseleccion2,$totalotros2,$lote->alimentoPle,$totalconsumo2,$totalpeso2,$totaluniformidad2,$totalcoeficiente2,$lote->observacionesPle,$totalkacum2,$totalavediareal2,$totalgraveac2,$totalacu2,$totalmortsem2,$totalmortacu2,$totalselsem2,$totalmsacu2,$totalsaldoaves2,$totalconvsem2,$totalgananciaavediar2,$totalcumpgananavesemana2,$totalcumplconsgrad2,$totalcumplpeso2,$totalcumplconsumoacm2
                ]);
              }
              foreach($lotes as $index => $lote) {
                $sheet->row($index+4, [
                    $lote->nombreEmp,$lote->nombreGra,$lote->nombreVar,$lote->nombreLot,$lote->encasetamientoLot,$lote->pollitasLot,$lote->alturaGra,$lote->nombreZon,$lote->nombreMun,$lote->nombreDep,$lote->nombrePai,$lote->nombreCli,$lote->nombreSis,$lote->programaPle,$lote->fotoPle,$lote->despiquePle,$lote->trasladoPle,$lote->inicioluzPle,$lote->finluzPle,$lote->semanaPle,$lote->fdsPle,$totalavesmuertas3,$totalmortalidad3,$totalseleccion3,$totalotros3,$lote->alimentoPle,$totalconsumo3,$totalpeso3,$totaluniformidad3,$totalcoeficiente3,$lote->observacionesPle,$totalkacum3,$totalavediareal3,$totalgraveac3,$totalacu3,$totalmortsem3,$totalmortacu3,$totalselsem3,$totalmsacu3,$totalsaldoaves3,$totalconvsem3,$totalgananciaavediar3,$totalcumpgananavesemana3,$totalcumplconsgrad3,$totalcumplpeso3,$totalcumplconsumoacm3
                ]);
              }
              foreach($lotes as $index => $lote) {
                $sheet->row($index+5, [
                    $lote->nombreEmp,$lote->nombreGra,$lote->nombreVar,$lote->nombreLot,$lote->encasetamientoLot,$lote->pollitasLot,$lote->alturaGra,$lote->nombreZon,$lote->nombreMun,$lote->nombreDep,$lote->nombrePai,$lote->nombreCli,$lote->nombreSis,$lote->programaPle,$lote->fotoPle,$lote->despiquePle,$lote->trasladoPle,$lote->inicioluzPle,$lote->finluzPle,$lote->semanaPle,$lote->fdsPle,$totalavesmuertas4,$totalmortalidad4,$totalseleccion4,$totalotros4,$lote->alimentoPle,$totalconsumo4,$totalpeso4,$totaluniformidad4,$totalcoeficiente4,$lote->observacionesPle,$totalkacum4,$totalavediareal4,$totalgraveac4,$totalacu4,$totalmortsem4,$totalmortacu4,$totalselsem4,$totalmsacu4,$totalsaldoaves4,$totalconvsem4,$totalgananciaavediar4,$totalcumpgananavesemana4,$totalcumplconsgrad4,$totalcumplpeso4,$totalcumplconsumoacm4
                ]);
              }
              foreach($lotes as $index => $lote) {
                $sheet->row($index+6, [
                    $lote->nombreEmp,$lote->nombreGra,$lote->nombreVar,$lote->nombreLot,$lote->encasetamientoLot,$lote->pollitasLot,$lote->alturaGra,$lote->nombreZon,$lote->nombreMun,$lote->nombreDep,$lote->nombrePai,$lote->nombreCli,$lote->nombreSis,$lote->programaPle,$lote->fotoPle,$lote->despiquePle,$lote->trasladoPle,$lote->inicioluzPle,$lote->finluzPle,$lote->semanaPle,$lote->fdsPle,$totalavesmuertas5,$totalmortalidad5,$totalseleccion5,$totalotros5,$lote->alimentoPle,$totalconsumo5,$totalpeso5,$totaluniformidad5,$totalcoeficiente5,$lote->observacionesPle,$totalkacum5,$totalavediareal5,$totalgraveac5,$totalacu5,$totalmortsem5,$totalmortacu5,$totalselsem5,$totalmsacu5,$totalsaldoaves5,$totalconvsem5,$totalgananciaavediar5,$totalcumpgananavesemana5,$totalcumplconsgrad5,$totalcumplpeso5,$totalcumplconsumoacm5
                ]);
              }
              foreach($lotes as $index => $lote) {
                $sheet->row($index+7, [
                    $lote->nombreEmp,$lote->nombreGra,$lote->nombreVar,$lote->nombreLot,$lote->encasetamientoLot,$lote->pollitasLot,$lote->alturaGra,$lote->nombreZon,$lote->nombreMun,$lote->nombreDep,$lote->nombrePai,$lote->nombreCli,$lote->nombreSis,$lote->programaPle,$lote->fotoPle,$lote->despiquePle,$lote->trasladoPle,$lote->inicioluzPle,$lote->finluzPle,$lote->semanaPle,$lote->fdsPle,$totalavesmuertas6,$totalmortalidad6,$totalseleccion6,$totalotros6,$lote->alimentoPle,$totalconsumo6,$totalpeso6,$totaluniformidad6,$totalcoeficiente6,$lote->observacionesPle,$totalkacum6,$totalavediareal6,$totalgraveac6,$totalacu6,$totalmortsem6,$totalmortacu6,$totalselsem6,$totalmsacu6,$totalsaldoaves6,$totalconvsem6,$totalgananciaavediar6,$totalcumpgananavesemana6,$totalcumplconsgrad6,$totalcumplpeso6,$totalcumplconsumoacm6
                ]);
              }
              foreach($lotes as $index => $lote) {
                $sheet->row($index+8, [
                    $lote->nombreEmp,$lote->nombreGra,$lote->nombreVar,$lote->nombreLot,$lote->encasetamientoLot,$lote->pollitasLot,$lote->alturaGra,$lote->nombreZon,$lote->nombreMun,$lote->nombreDep,$lote->nombrePai,$lote->nombreCli,$lote->nombreSis,$lote->programaPle,$lote->fotoPle,$lote->despiquePle,$lote->trasladoPle,$lote->inicioluzPle,$lote->finluzPle,$lote->semanaPle,$lote->fdsPle,$totalavesmuertas7,$totalmortalidad7,$totalseleccion7,$totalotros7,$lote->alimentoPle,$totalconsumo7,$totalpeso7,$totaluniformidad7,$totalcoeficiente7,$lote->observacionesPle,$totalkacum7,$totalavediareal7,$totalgraveac7,$totalacu7,$totalmortsem7,$totalmortacu7,$totalselsem7,$totalmsacu7,$totalsaldoaves7,$totalconvsem7,$totalgananciaavediar7,$totalcumpgananavesemana7,$totalcumplconsgrad7,$totalcumplpeso7,$totalcumplconsumoacm7
                ]);
              }
              foreach($lotes as $index => $lote) {
                $sheet->row($index+9, [
                    $lote->nombreEmp,$lote->nombreGra,$lote->nombreVar,$lote->nombreLot,$lote->encasetamientoLot,$lote->pollitasLot,$lote->alturaGra,$lote->nombreZon,$lote->nombreMun,$lote->nombreDep,$lote->nombrePai,$lote->nombreCli,$lote->nombreSis,$lote->programaPle,$lote->fotoPle,$lote->despiquePle,$lote->trasladoPle,$lote->inicioluzPle,$lote->finluzPle,$lote->semanaPle,$lote->fdsPle,$totalavesmuertas8,$totalmortalidad8,$totalseleccion8,$totalotros8,$lote->alimentoPle,$totalconsumo8,$totalpeso8,$totaluniformidad8,$totalcoeficiente8,$lote->observacionesPle,$totalkacum8,$totalavediareal8,$totalgraveac8,$totalacu8,$totalmortsem8,$totalmortacu8,$totalselsem8,$totalmsacu8,$totalsaldoaves8,$totalconvsem8,$totalgananciaavediar8,$totalcumpgananavesemana8,$totalcumplconsgrad8,$totalcumplpeso8,$totalcumplconsumoacm8
                ]);
              }
              foreach($lotes as $index => $lote) {
                $sheet->row($index+10, [
                    $lote->nombreEmp,$lote->nombreGra,$lote->nombreVar,$lote->nombreLot,$lote->encasetamientoLot,$lote->pollitasLot,$lote->alturaGra,$lote->nombreZon,$lote->nombreMun,$lote->nombreDep,$lote->nombrePai,$lote->nombreCli,$lote->nombreSis,$lote->programaPle,$lote->fotoPle,$lote->despiquePle,$lote->trasladoPle,$lote->inicioluzPle,$lote->finluzPle,$lote->semanaPle,$lote->fdsPle,$totalavesmuertas9,$totalmortalidad9,$totalseleccion9,$totalotros9,$lote->alimentoPle,$totalconsumo9,$totalpeso9,$totaluniformidad9,$totalcoeficiente9,$lote->observacionesPle,$totalkacum9,$totalavediareal9,$totalgraveac9,$totalacu9,$totalmortsem9,$totalmortacu9,$totalselsem9,$totalmsacu9,$totalsaldoaves9,$totalconvsem9,$totalgananciaavediar9,$totalcumpgananavesemana9,$totalcumplconsgrad9,$totalcumplpeso9,$totalcumplconsumoacm9
                ]);
              }
              foreach($lotes as $index => $lote) {
                $sheet->row($index+11, [
                    $lote->nombreEmp,$lote->nombreGra,$lote->nombreVar,$lote->nombreLot,$lote->encasetamientoLot,$lote->pollitasLot,$lote->alturaGra,$lote->nombreZon,$lote->nombreMun,$lote->nombreDep,$lote->nombrePai,$lote->nombreCli,$lote->nombreSis,$lote->programaPle,$lote->fotoPle,$lote->despiquePle,$lote->trasladoPle,$lote->inicioluzPle,$lote->finluzPle,$lote->semanaPle,$lote->fdsPle,$totalavesmuertas10,$totalmortalidad10,$totalseleccion10,$totalotros10,$lote->alimentoPle,$totalconsumo10,$totalpeso10,$totaluniformidad10,$totalcoeficiente10,$lote->observacionesPle,$totalkacum10,$totalavediareal10,$totalgraveac10,$totalacu10,$totalmortsem10,$totalmortacu10,$totalselsem10,$totalmsacu10,$totalsaldoaves10,$totalconvsem10,$totalgananciaavediar10,$totalcumpgananavesemana10,$totalcumplconsgrad10,$totalcumplpeso10,$totalcumplconsumoacm10
                ]);
              }
              foreach($lotes as $index => $lote) {
                $sheet->row($index+12, [
                    $lote->nombreEmp,$lote->nombreGra,$lote->nombreVar,$lote->nombreLot,$lote->encasetamientoLot,$lote->pollitasLot,$lote->alturaGra,$lote->nombreZon,$lote->nombreMun,$lote->nombreDep,$lote->nombrePai,$lote->nombreCli,$lote->nombreSis,$lote->programaPle,$lote->fotoPle,$lote->despiquePle,$lote->trasladoPle,$lote->inicioluzPle,$lote->finluzPle,$lote->semanaPle,$lote->fdsPle,$totalavesmuertas11,$totalmortalidad11,$totalseleccion11,$totalotros11,$lote->alimentoPle,$totalconsumo11,$totalpeso11,$totaluniformidad11,$totalcoeficiente11,$lote->observacionesPle,$totalkacum11,$totalavediareal11,$totalgraveac11,$totalacu11,$totalmortsem11,$totalmortacu11,$totalselsem11,$totalmsacu11,$totalsaldoaves11,$totalconvsem11,$totalgananciaavediar11,$totalcumpgananavesemana11,$totalcumplconsgrad11,$totalcumplpeso11,$totalcumplconsumoacm11
                ]);
              }
              foreach($lotes as $index => $lote) {
                $sheet->row($index+13, [
                    $lote->nombreEmp,$lote->nombreGra,$lote->nombreVar,$lote->nombreLot,$lote->encasetamientoLot,$lote->pollitasLot,$lote->alturaGra,$lote->nombreZon,$lote->nombreMun,$lote->nombreDep,$lote->nombrePai,$lote->nombreCli,$lote->nombreSis,$lote->programaPle,$lote->fotoPle,$lote->despiquePle,$lote->trasladoPle,$lote->inicioluzPle,$lote->finluzPle,$lote->semanaPle,$lote->fdsPle,$totalavesmuertas12,$totalmortalidad12,$totalseleccion12,$totalotros12,$lote->alimentoPle,$totalconsumo12,$totalpeso12,$totaluniformidad12,$totalcoeficiente12,$lote->observacionesPle,$totalkacum12,$totalavediareal12,$totalgraveac12,$totalacu12,$totalmortsem12,$totalmortacu12,$totalselsem12,$totalmsacu12,$totalsaldoaves12,$totalconvsem12,$totalgananciaavediar12,$totalcumpgananavesemana12,$totalcumplconsgrad12,$totalcumplpeso12,$totalcumplconsumoacm12
                ]);
              }
              foreach($lotes as $index => $lote) {
                $sheet->row($index+14, [
                    $lote->nombreEmp,$lote->nombreGra,$lote->nombreVar,$lote->nombreLot,$lote->encasetamientoLot,$lote->pollitasLot,$lote->alturaGra,$lote->nombreZon,$lote->nombreMun,$lote->nombreDep,$lote->nombrePai,$lote->nombreCli,$lote->nombreSis,$lote->programaPle,$lote->fotoPle,$lote->despiquePle,$lote->trasladoPle,$lote->inicioluzPle,$lote->finluzPle,$lote->semanaPle,$lote->fdsPle,$totalavesmuertas13,$totalmortalidad13,$totalseleccion13,$totalotros13,$lote->alimentoPle,$totalconsumo13,$totalpeso13,$totaluniformidad13,$totalcoeficiente13,$lote->observacionesPle,$totalkacum13,$totalavediareal13,$totalgraveac13,$totalacu13,$totalmortsem13,$totalmortacu13,$totalselsem13,$totalmsacu13,$totalsaldoaves13,$totalconvsem13,$totalgananciaavediar13,$totalcumpgananavesemana13,$totalcumplconsgrad13,$totalcumplpeso13,$totalcumplconsumoacm13
                ]);
              }
              foreach($lotes as $index => $lote) {
                $sheet->row($index+15, [
                    $lote->nombreEmp,$lote->nombreGra,$lote->nombreVar,$lote->nombreLot,$lote->encasetamientoLot,$lote->pollitasLot,$lote->alturaGra,$lote->nombreZon,$lote->nombreMun,$lote->nombreDep,$lote->nombrePai,$lote->nombreCli,$lote->nombreSis,$lote->programaPle,$lote->fotoPle,$lote->despiquePle,$lote->trasladoPle,$lote->inicioluzPle,$lote->finluzPle,$lote->semanaPle,$lote->fdsPle,$totalavesmuertas14,$totalmortalidad14,$totalseleccion14,$totalotros14,$lote->alimentoPle,$totalconsumo14,$totalpeso14,$totaluniformidad14,$totalcoeficiente14,$lote->observacionesPle,$totalkacum14,$totalavediareal14,$totalgraveac14,$totalacu14,$totalmortsem14,$totalmortacu14,$totalselsem14,$totalmsacu14,$totalsaldoaves14,$totalconvsem14,$totalgananciaavediar14,$totalcumpgananavesemana14,$totalcumplconsgrad14,$totalcumplpeso14,$totalcumplconsumoacm14
                ]);
              }
              foreach($lotes as $index => $lote) {
                $sheet->row($index+16, [
                    $lote->nombreEmp,$lote->nombreGra,$lote->nombreVar,$lote->nombreLot,$lote->encasetamientoLot,$lote->pollitasLot,$lote->alturaGra,$lote->nombreZon,$lote->nombreMun,$lote->nombreDep,$lote->nombrePai,$lote->nombreCli,$lote->nombreSis,$lote->programaPle,$lote->fotoPle,$lote->despiquePle,$lote->trasladoPle,$lote->inicioluzPle,$lote->finluzPle,$lote->semanaPle,$lote->fdsPle,$totalavesmuertas15,$totalmortalidad15,$totalseleccion15,$totalotros15,$lote->alimentoPle,$totalconsumo15,$totalpeso15,$totaluniformidad15,$totalcoeficiente15,$lote->observacionesPle,$totalkacum15,$totalavediareal15,$totalgraveac15,$totalacu15,$totalmortsem15,$totalmortacu15,$totalselsem15,$totalmsacu15,$totalsaldoaves15,$totalconvsem15,$totalgananciaavediar15,$totalcumpgananavesemana15,$totalcumplconsgrad15,$totalcumplpeso15,$totalcumplconsumoacm15
                ]);
              }
              foreach($lotes as $index => $lote) {
                $sheet->row($index+17, [
                    $lote->nombreEmp,$lote->nombreGra,$lote->nombreVar,$lote->nombreLot,$lote->encasetamientoLot,$lote->pollitasLot,$lote->alturaGra,$lote->nombreZon,$lote->nombreMun,$lote->nombreDep,$lote->nombrePai,$lote->nombreCli,$lote->nombreSis,$lote->programaPle,$lote->fotoPle,$lote->despiquePle,$lote->trasladoPle,$lote->inicioluzPle,$lote->finluzPle,$lote->semanaPle,$lote->fdsPle,$totalavesmuertas16,$totalmortalidad16,$totalseleccion16,$totalotros16,$lote->alimentoPle,$totalconsumo16,$totalpeso16,$totaluniformidad16,$totalcoeficiente16,$lote->observacionesPle,$totalkacum16,$totalavediareal16,$totalgraveac16,$totalacu16,$totalmortsem16,$totalmortacu16,$totalselsem16,$totalmsacu16,$totalsaldoaves16,$totalconvsem16,$totalgananciaavediar16,$totalcumpgananavesemana16,$totalcumplconsgrad16,$totalcumplpeso16,$totalcumplconsumoacm16
                ]);
              }
              foreach($lotes as $index => $lote) {
                $sheet->row($index+18, [
                    $lote->nombreEmp,$lote->nombreGra,$lote->nombreVar,$lote->nombreLot,$lote->encasetamientoLot,$lote->pollitasLot,$lote->alturaGra,$lote->nombreZon,$lote->nombreMun,$lote->nombreDep,$lote->nombrePai,$lote->nombreCli,$lote->nombreSis,$lote->programaPle,$lote->fotoPle,$lote->despiquePle,$lote->trasladoPle,$lote->inicioluzPle,$lote->finluzPle,$lote->semanaPle,$lote->fdsPle,$totalavesmuertas17,$totalmortalidad17,$totalseleccion17,$totalotros17,$lote->alimentoPle,$totalconsumo17,$totalpeso17,$totaluniformidad17,$totalcoeficiente17,$lote->observacionesPle,$totalkacum17,$totalavediareal17,$totalgraveac17,$totalacu17,$totalmortsem17,$totalmortacu17,$totalselsem17,$totalmsacu17,$totalsaldoaves17,$totalconvsem17,$totalgananciaavediar17,$totalcumpgananavesemana17,$totalcumplconsgrad17,$totalcumplpeso17,$totalcumplconsumoacm17
                ]);
              }
            });
          })->download('xlsx');
        }
        if ($lote->idsublot != null) {
          dd($lotes);
        }
      }

    }
}
