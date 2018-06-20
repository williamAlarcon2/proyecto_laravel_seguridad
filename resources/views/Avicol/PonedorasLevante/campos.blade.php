@extends('layouts.app')
  @section('content')
    <h3 class="with-border">Lote @foreach($lote as $Lote) {{$Lote->nombreLot}} @endforeach</h3>
    <div class="col-sm-12" id="formulario">
       <h6 class="with-border">Semanal Lote</h6>
      <table class="table">
        <thead>
          <tr>
            <tr>
              <th>Semana Vida</th>
              <th>Fecha FDS</th>
              <th>Nº Aves Muertas</th>
              <th>Mortalidad</th>
              <th>Seleccion</th>
              <th>Otros</th>
              <th>Alimento</th>
              <th>Consumo Kg</th>
              <th>Peso Ave</th>
              <th>% Uniformidad</th>
              <th>Coeficiente Variacion</th>
              <th>Observaciones</th>
            </tr>
          </tr>
        </thead>
        <tbody>
          @foreach($semanallevantes as $Semanallevante)
            <tr>
              <td>{{$Semanallevante->semanaPle}}</td>
              <td>{{$Semanallevante->fdsPle}}</td>
              <td>{{$Semanallevante->avesmuertasPle}}</td>
              <td>{{$Semanallevante->mortalidadPle}}</td>
              <td>{{$Semanallevante->seleccionPle}}</td>
              <td>{{$Semanallevante->otrosPle}}</td>
              <td>{{$Semanallevante->alimentoPle}}</td>
              <td>{{$Semanallevante->consumoPle}}</td>
              <td>{{$Semanallevante->pesoPle}}</td>
              <td>{{$Semanallevante->uniformidadPle}}</td>
              <td>{{$Semanallevante->coeficientePle}}</td>
              <td>{{$Semanallevante->observacionesPle}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <h6 class="with-border">Campos Calculados</h6>
      <table class="table">
        <thead>
          <tr>
            <th>Semana</th>
            <th>K. Acum</th>
            <th>Ave/Dia Real</th>
            <th>Gr Ave Ac</th>
            <th>Acu</th>
            <th>%Mort Sem</th>
            <th>%Mort Acu</th>
            <th>%Sel Sem</th>
            <th>%M+S Acu.</th>
            <th>Saldo Aves</th>
            <th>Conv Sem</th>
            <th>Ganancia Ave Dia R</th>
            <th>%Cump Ganan Ave Semana</th>
            <th>%Cumpl Cons Gr.A.D</th>
            <th>%Cumpl Peso</th>
            <th>%Cumpl Consumo Acm</th>
          </tr>
        </thead>
        <tbody>



          @foreach($campos as $Campo)
            <tr>
              <td>{{$Campo->semanaPle}}</td>
              <td>{{$Campo->kacumPle}}</td>
              <td>{{$Campo->avediarealPle}}</td>
              <td>{{$Campo->graveacPle}}</td>
              <td>{{$Campo->acuPle}}</td>
              <td>{{$Campo->mortsemPle}}</td>
              <td>{{$Campo->mortacuPle}}</td>
              <td>{{$Campo->selsemPle}}</td>
              <td>{{$Campo->msacuPle}}</td>
              <td>{{$Campo->saldoavesPle}}</td>
              <td>{{$Campo->convsemPle}}</td>
              <td>{{$Campo->gananciaavediarPle}}</td>
              <td>{{$Campo->cumpgananavesemanaPle}}</td>
              <td>{{$Campo->cumplconsgradPle}}</td>
              <td>{{$Campo->cumplpesoPle}}</td>
              <td>{{$Campo->cumplconsumoacmPle}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <h6 class="with-border">Campos Guia</h6>
      <table class="table">
        <thead>
          <tr>
            <tr>
              <th>Semana</th>
              <th>Ave/Dia TAB</th>
              <th>Gr Ave Ac Tab</th>
              <th>TAB</th>
              <th>Conv. Sem Tab</th>
              <th>Ganancia Ave Dia T</th>
            </tr>
          </tr>
        </thead>
        <tbody>
          @foreach($guias as $key => $Guias)
            <tr>
              <td>{{$Guias->semanaGul}}</td>
              <td>{{$Guias->avediatabGul}}</td>
              <td>{{$Guias->graveactabGul}}</td>
              
              <td <?php if($key == 0){ echo "id='idpes'"; }?> >{{$Guias->pesotabGul}}</td>

              <td>{{$Guias->convsemtabGul}}</td>
              <td>{{$Guias->gananciaaveriatGul}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <style>
        @media
        only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px)  {

          table, thead, tbody, th, td, tr {
            display: block;
          }

          thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
          }

          tr { border: 1px solid #ccc; }

          td {
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
          }

          td:before {
            position: absolute;
            top: 6px;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
          }

          /*
          Label the data
          */
          td:nth-of-type(1):before { content: "Lote"; }
          td:nth-of-type(2):before { content: "Empresa/Compañia"; }
          td:nth-of-type(3):before { content: "Zona Avicol"; }
          td:nth-of-type(4):before { content: "Granja"; }
          td:nth-of-type(5):before { content: "Municipio"; }
          td:nth-of-type(6):before { content: "Departamento"; }
          td:nth-of-type(7):before { content: "Clima"; }
          td:nth-of-type(8):before { content: "Foto Periodo"; }
          td:nth-of-type(9):before { content: "Traslado Px"; }
          td:nth-of-type(10):before { content: "Altura/Nivel del mar"; }
          td:nth-of-type(11):before { content: "Variedad"; }
          td:nth-of-type(12):before { content: "Fecha de encasetamiento"; }
          td:nth-of-type(13):before { content: "Pollitas Recibidas"; }
          td:nth-of-type(14):before { content: "Sistemas Explotacion"; }
          td:nth-of-type(15):before { content: "Programa de Oscurecimiento"; }
          td:nth-of-type(16):before { content: "Despique"; }
          td:nth-of-type(17):before { content: "Guia"; }
          td:nth-of-type(18):before { content: "Acción"; margin: 0 0px 0 -18px;}

          .espacio2{
          padding-left: 50%;
          width: 10%;
          display: inline-block;
          }

          .espacio3{
            padding-left: 0;
            width: 11%;
            margin-left: 34px;
            display: inline-block;
          }
        }
    </style>
  @endsection
