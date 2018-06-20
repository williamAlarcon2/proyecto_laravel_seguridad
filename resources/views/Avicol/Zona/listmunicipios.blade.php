@extends('layouts.app')
  @section('content')
  @foreach($nomzonas as $nomzona)
    <h4 class="with-border">Zona: {{$nomzona->nombreZon}}</h4>
  @endforeach
    <div class="col-sm-12" id="formulario">
      <div class="row">
        <div class="col-md-4 col-md-offset-8 separacion">
            <a href="javascript:history.back()" class="btn btn-success pull-right"><i class="fa fa-undo" aria-hidden="true"></i> Volver</a>
        </div>
      </div>
      <div class="col-md-8 col-md-offset-2">
        <table>
            <thead>
              <tr id="tabla">
                <th>Municipio</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
              @foreach($zonas as $Zona)
                <tr>
                  <td>{{$Zona->nombreMun}}</td>
                  <td>
                    {!! Form::open(['route' => ['zonas.destroy', $Zona->id], 'method' => 'DELETE']) !!}
                      <button class="btn btn-danger" data-toggle="tooltip" data-placement="right" data-original-title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    {!! Form::close() !!}
                  </td>
                </tr>
              @endforeach
            </tbody>
        </table>
      </div>        
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

      td:nth-of-type(1):before { content: "Municipio"; }

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
