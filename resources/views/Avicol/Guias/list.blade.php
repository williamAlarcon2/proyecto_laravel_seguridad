@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Guias</h4>
    <div class="col-sm-12" id="formulario">
      <div class="row">
        <div class="col-md-4">
          {!! Form::open(['route' => 'guias/search', 'method' => 'post', 'novalidate']) !!}
            <div class="form-group has-feedback search">
              <input type="text" class="form-control" name="buscar" placeholder="Buscar">
              <span class="form-control-feedback"><i class="fa fa-search fa-lg" aria-hidden="true"></i></span>
            </div>
          {!!Form::close() !!}
        </div>
        <div class="col-md-4 col-md-offset-4">
          @can('guias.create')
            <a href="" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</a>
          @endcan
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12"><a class="separar" href="{{ route('guialevanteponedoras.create') }}">Levante - Ponedoras</a></div>
              </div>
              <div class="row">
                <div class="col-md-12"><a class="separar" href="{{ route('guiaproduccionponedoras.create') }}">Produccion - Ponedoras</a></div>
              </div>
              <div class="row">
                <div class="col-md-12"><a class="separar" href="#">Clasificacion Huevo - Ponedoras</a></div>
              </div>
              <div class="row">
                <div class="col-md-12"><a class="separar" href="#">Liquidacion - Pollo De Engorde</a></div>
              </div>
              <div class="row">
                <div class="col-md-12"><a class="separar" href="#">Sacrificio - Pollo De Engorde</a></div>
              </div>
              <div class="row">
                <div class="col-md-12"><a class="separar" href="#">Visita Planta - Pollo De Engorde</a></div>
              </div>
              <div class="row">
                <div class="col-md-12"><a class="separar" href="#">Semanal - Pollo De Engorde</a></div>
              </div>
              <div class="row">
                <div class="col-md-12"><a class="separar" href="#">Sacrificio - Pollo De Engorde</a></div>
              </div>
              <div class="row">
                <div class="col-md-12"><a class="separar" href="#">Levante - Reproductoras Hembra</a></div>
              </div>
              <div class="row">
                <div class="col-md-12"><a class="separar" href="#">Levante - Reproductoras Acho</a></div>
              </div>
              <div class="row">
                <div class="col-md-12"><a class="separar" href="#">Produccion - Reproductoras</a></div>
              </div>
              <div class="row">
                <div class="col-md-12"><a class="separar" href="#">Incubacion - Reproductoras</a></div>
              </div>
              <div class="row">
                <div class="col-md-12"><a class="separar" href="#">Reproductoras Avicol - Laboratorio De Huevo</a></div>
              </div>
              <div class="row">
                <div class="col-md-12"><a class="separar" href="#">Reproductoras Cliente - Laboratorio De Huevo</a></div>
              </div>
              <div class="row">
                <div class="col-md-12"><a class="separar" href="#">Pondeoras Avicol - Laboratorio De Huevo</a></div>
              </div>
              <div class="row">
                <div class="col-md-12"><a class="separar" href="#">Pondeoras Cliente - Laboratorio De Huevo</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <table>
        <thead>
          <tr id="tabla">
            <th>Nombre Guia</th>
            <th>Modulo</th>
            @can('guias.edit')
              <th>Accion</th>
            @endcan
          </tr>
        </thead>
        <tbody>
          @foreach($guias as $Guia)
            <tr>
              <td>{{$Guia->nombreGui}}</td>
              <td>{{$Guia->moduloGui}}</td>
              @can('guias.edit')
                @if($Guia->moduloGui == 'Ponedoras Levante')
                  <td class="espacio2" width="10px">
                    <a href="{{ route('guialevanteponedoras.edit', $Guia->id) }}" class="btn" data-toggle="tooltip" data-placement="right" data-original-title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                  </td>
                @endif
                @if($Guia->moduloGui == 'Ponedoras Produccion')
                  <td class="espacio2" width="10px">
                    <a href="{{ route('guiaproduccionponedoras.edit', $Guia->id) }}" class="btn" data-toggle="tooltip" data-placement="right" data-original-title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                  </td>
                @endif
                @if($Guia->moduloGui == 'Reproductoras')
                  <td class="espacio2" width="10px">
                    <a href="{{ route('home') }}" class="btn" data-toggle="tooltip" data-placement="right" data-original-title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                  </td>
                @endif
              @endcan
              <!--@can('guias.destroy')
                <td class="espacio3" width="10px">
                  {!! Form::open(['route' => ['guias.destroy', $Guia->id], 'method' => 'DELETE']) !!}
                    <button class="btn btn-danger" data-toggle="tooltip" data-placement="right" data-original-title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>
                  {!! Form::close() !!}
                </td>
              @endcan-->
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $guias->render() }}
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

          td:nth-of-type(1):before { content: "Nombre"; }
          td:nth-of-type(2):before { content: "Acción"; margin: 0 0px 0 -18px;}

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
