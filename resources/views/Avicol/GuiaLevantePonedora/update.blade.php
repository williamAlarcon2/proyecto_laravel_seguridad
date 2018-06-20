@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Guia Levante Ponedoras</h4>
    @if ($errors->any())
      <div class=" col-md-offset-2 separacion alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <div class="col-sm-12" id="formularioguia">
      {!! Form::model($guias, ['route' => ['guialevanteponedoras.update', $guias->id],'method' => 'PUT']) !!}
        <div class="row">
          <div class="input-group separacion col-md-5 col-md-offset-3">
            <span class="input-group-addon"><i class="fa fa-list-alt fa-2x"></i></span>
            <div class="form-group label-floating search">
                <label class="control-label">Nombre</label>
                <input type="text" name="nombreGui" class="form-control" id="nombreGui" value="{{$guias->nombreGui}}" onkeyup="cadaprimera(this)">
            </div>
          </div>
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Semana</th>
              <th>Ave/Dia TAB</th>
              <th>Gr Ave Ac Tab</th>
              <th>TAB</th>
              <th>Conv. Sem Tab</th>
              <th>Ganancia Ave Dia T</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                @foreach($guialevanteponedoras as $guialevanteponedora)
                  <td><input type="hidden" name="semanaGul" value="1">1</td>
                  <td><input type="text" name="avediatabGul" value="{{ old('avediatabGul', $guialevanteponedora->avediatabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="graveactabGul" value="{{ old('graveactabGul', $guialevanteponedora->graveactabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesotabGul" value="{{ old('pesotabGul', $guialevanteponedora->pesotabGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="convsemtabGul" value="{{ old('convsemtabGul', $guialevanteponedora->convsemtabGul)}}" onkeypress="return tresdecimal(event,this);"></td>
                  <td><input type="text" name="gananciaaveriatGul" value="{{ old('gananciaaveriatGul', $guialevanteponedora->gananciaaveriatGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                @endforeach
              </tr>
              <tr>
                @foreach($guialevanteponedoras2 as $guialevanteponedora2)
                  <td>2</td>
                  <td><input type="text" name="avediatabGul1" value="{{ old('avediatabGul1', $guialevanteponedora2->avediatabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="graveactabGul1" value="{{ old('graveactabGul1', $guialevanteponedora2->graveactabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesotabGul1" value="{{ old('pesotabGul1', $guialevanteponedora2->pesotabGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="convsemtabGul1" value="{{ old('convsemtabGul1', $guialevanteponedora2->convsemtabGul)}}" onkeypress="return tresdecimal(event,this);"></td>
                  <td><input type="text" name="gananciaaveriatGul1" value="{{ old('gananciaaveriatGul1', $guialevanteponedora2->gananciaaveriatGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                @endforeach
              </tr>
              <tr>
                @foreach($guialevanteponedoras3 as $guialevanteponedora3)
                  <td>3</td>
                  <td><input type="text" name="avediatabGul2" value="{{ old('avediatabGul2', $guialevanteponedora3->avediatabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="graveactabGul2" value="{{ old('graveactabGul2', $guialevanteponedora3->graveactabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesotabGul2" value="{{ old('pesotabGul2', $guialevanteponedora3->pesotabGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="convsemtabGul2" value="{{ old('convsemtabGul2', $guialevanteponedora3->convsemtabGul)}}" onkeypress="return tresdecimal(event,this);"></td>
                  <td><input type="text" name="gananciaaveriatGul2" value="{{ old('gananciaaveriatGul2', $guialevanteponedora3->gananciaaveriatGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                @endforeach
              </tr>
              <tr>
                @foreach($guialevanteponedoras4 as $guialevanteponedora4)
                  <td>4</td>
                  <td><input type="text" name="avediatabGul3" value="{{ old('avediatabGul3', $guialevanteponedora4->avediatabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="graveactabGul3" value="{{ old('graveactabGul3', $guialevanteponedora4->graveactabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesotabGul3" value="{{ old('pesotabGul3', $guialevanteponedora4->pesotabGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="convsemtabGul3" value="{{ old('convsemtabGul3', $guialevanteponedora4->convsemtabGul)}}" onkeypress="return tresdecimal(event,this);"></td>
                  <td><input type="text" name="gananciaaveriatGul3" value="{{ old('gananciaaveriatGul3', $guialevanteponedora4->gananciaaveriatGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                @endforeach
              </tr>
              <tr>
                @foreach($guialevanteponedoras5 as $guialevanteponedora5)
                  <td>5</td>
                  <td><input type="text" name="avediatabGul4" value="{{ old('avediatabGul4', $guialevanteponedora5->avediatabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="graveactabGul4" value="{{ old('graveactabGul4', $guialevanteponedora5->graveactabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesotabGul4" value="{{ old('pesotabGul4', $guialevanteponedora5->pesotabGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="convsemtabGul4" value="{{ old('convsemtabGul4', $guialevanteponedora5->convsemtabGul)}}" onkeypress="return tresdecimal(event,this);"></td>
                  <td><input type="text" name="gananciaaveriatGul4" value="{{ old('gananciaaveriatGul4', $guialevanteponedora5->gananciaaveriatGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                @endforeach
              </tr>
              <tr>
                @foreach($guialevanteponedoras6 as $guialevanteponedora6)
                  <td>6</td>
                  <td><input type="text" name="avediatabGul5" value="{{ old('avediatabGul5', $guialevanteponedora6->avediatabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="graveactabGul5" value="{{ old('graveactabGul5', $guialevanteponedora6->graveactabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesotabGul5" value="{{ old('pesotabGul5', $guialevanteponedora6->pesotabGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="convsemtabGul5" value="{{ old('convsemtabGul5', $guialevanteponedora6->convsemtabGul)}}" onkeypress="return tresdecimal(event,this);"></td>
                  <td><input type="text" name="gananciaaveriatGul5" value="{{ old('gananciaaveriatGul5', $guialevanteponedora6->gananciaaveriatGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                @endforeach
              </tr>
              <tr>
                @foreach($guialevanteponedoras7 as $guialevanteponedora7)
                  <td>7</td>
                  <td><input type="text" name="avediatabGul6" value="{{ old('avediatabGul6', $guialevanteponedora7->avediatabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="graveactabGul6" value="{{ old('graveactabGul6', $guialevanteponedora7->graveactabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesotabGul6" value="{{ old('pesotabGul6', $guialevanteponedora7->pesotabGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="convsemtabGul6" value="{{ old('convsemtabGul6', $guialevanteponedora7->convsemtabGul)}}" onkeypress="return tresdecimal(event,this);"></td>
                  <td><input type="text" name="gananciaaveriatGul6" value="{{ old('gananciaaveriatGul6', $guialevanteponedora7->gananciaaveriatGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                @endforeach
              </tr>
              <tr>
                @foreach($guialevanteponedoras8 as $guialevanteponedora8)
                  <td>8</td>
                  <td><input type="text" name="avediatabGul7" value="{{ old('avediatabGul7', $guialevanteponedora8->avediatabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="graveactabGul7" value="{{ old('graveactabGul7', $guialevanteponedora8->graveactabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesotabGul7" value="{{ old('pesotabGul7', $guialevanteponedora8->pesotabGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="convsemtabGul7" value="{{ old('convsemtabGul7', $guialevanteponedora8->convsemtabGul)}}" onkeypress="return tresdecimal(event,this);"></td>
                  <td><input type="text" name="gananciaaveriatGul7" value="{{ old('gananciaaveriatGul7', $guialevanteponedora8->gananciaaveriatGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                @endforeach
              </tr>
              <tr>
                @foreach($guialevanteponedoras9 as $guialevanteponedora9)
                  <td>9</td>
                  <td><input type="text" name="avediatabGul8" value="{{ old('avediatabGul8', $guialevanteponedora9->avediatabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="graveactabGul8" value="{{ old('graveactabGul8', $guialevanteponedora9->graveactabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesotabGul8" value="{{ old('pesotabGul8', $guialevanteponedora9->pesotabGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="convsemtabGul8" value="{{ old('convsemtabGul8', $guialevanteponedora9->convsemtabGul)}}" onkeypress="return tresdecimal(event,this);"></td>
                  <td><input type="text" name="gananciaaveriatGul8" value="{{ old('gananciaaveriatGul8', $guialevanteponedora9->gananciaaveriatGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                @endforeach
              </tr>
              <tr>
                @foreach($guialevanteponedoras10 as $guialevanteponedora10)
                  <td>10</td>
                  <td><input type="text" name="avediatabGul9" value="{{ old('avediatabGul9', $guialevanteponedora10->avediatabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="graveactabGul9" value="{{ old('graveactabGul9', $guialevanteponedora10->graveactabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesotabGul9" value="{{ old('pesotabGul9', $guialevanteponedora10->pesotabGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="convsemtabGul9" value="{{ old('convsemtabGul9', $guialevanteponedora10->convsemtabGul)}}" onkeypress="return tresdecimal(event,this);"></td>
                  <td><input type="text" name="gananciaaveriatGul9" value="{{ old('gananciaaveriatGul9', $guialevanteponedora10->gananciaaveriatGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                @endforeach
              </tr>
              <tr>
                @foreach($guialevanteponedoras11 as $guialevanteponedora11)
                  <td>11</td>
                  <td><input type="text" name="avediatabGul10" value="{{ old('avediatabGul10', $guialevanteponedora11->avediatabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="graveactabGul10" value="{{ old('graveactabGul10', $guialevanteponedora11->graveactabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesotabGul10" value="{{ old('pesotabGul10', $guialevanteponedora11->pesotabGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="convsemtabGul10" value="{{ old('convsemtabGul10', $guialevanteponedora11->convsemtabGul)}}" onkeypress="return tresdecimal(event,this);"></td>
                  <td><input type="text" name="gananciaaveriatGul10" value="{{ old('gananciaaveriatGul10', $guialevanteponedora11->gananciaaveriatGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                @endforeach
              </tr>
              <tr>
                @foreach($guialevanteponedoras12 as $guialevanteponedora12)
                  <td>12</td>
                  <td><input type="text" name="avediatabGul11" value="{{ old('avediatabGul11', $guialevanteponedora12->avediatabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="graveactabGul11" value="{{ old('graveactabGul11', $guialevanteponedora12->graveactabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesotabGul11" value="{{ old('pesotabGul11', $guialevanteponedora12->pesotabGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="convsemtabGul11" value="{{ old('convsemtabGul11', $guialevanteponedora12->convsemtabGul)}}" onkeypress="return tresdecimal(event,this);"></td>
                  <td><input type="text" name="gananciaaveriatGul11" value="{{ old('gananciaaveriatGul11', $guialevanteponedora12->gananciaaveriatGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                @endforeach
              </tr>
              <tr>
                @foreach($guialevanteponedoras13 as $guialevanteponedora13)
                  <td>13</td>
                  <td><input type="text" name="avediatabGul12" value="{{ old('avediatabGul12', $guialevanteponedora13->avediatabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="graveactabGul12" value="{{ old('graveactabGul12', $guialevanteponedora13->graveactabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesotabGul12" value="{{ old('pesotabGul12', $guialevanteponedora13->pesotabGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="convsemtabGul12" value="{{ old('convsemtabGul12', $guialevanteponedora13->convsemtabGul)}}" onkeypress="return tresdecimal(event,this);"></td>
                  <td><input type="text" name="gananciaaveriatGul12" value="{{ old('gananciaaveriatGul12', $guialevanteponedora13->gananciaaveriatGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                @endforeach
              </tr>
              <tr>
                @foreach($guialevanteponedoras14 as $guialevanteponedora14)
                  <td>14</td>
                  <td><input type="text" name="avediatabGul13" value="{{ old('avediatabGul13', $guialevanteponedora14->avediatabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="graveactabGul13" value="{{ old('graveactabGul13', $guialevanteponedora14->graveactabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesotabGul13" value="{{ old('pesotabGul13', $guialevanteponedora14->pesotabGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="convsemtabGul13" value="{{ old('convsemtabGul13', $guialevanteponedora14->convsemtabGul)}}" onkeypress="return tresdecimal(event,this);"></td>
                  <td><input type="text" name="gananciaaveriatGul13" value="{{ old('gananciaaveriatGul13', $guialevanteponedora14->gananciaaveriatGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                @endforeach
              </tr>
              <tr>
                @foreach($guialevanteponedoras15 as $guialevanteponedora15)
                  <td>15</td>
                  <td><input type="text" name="avediatabGul14" value="{{ old('avediatabGul14', $guialevanteponedora15->avediatabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="graveactabGul14" value="{{ old('graveactabGul14', $guialevanteponedora15->graveactabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesotabGul14" value="{{ old('pesotabGul14', $guialevanteponedora15->pesotabGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="convsemtabGul14" value="{{ old('convsemtabGul14', $guialevanteponedora15->convsemtabGul)}}" onkeypress="return tresdecimal(event,this);"></td>
                  <td><input type="text" name="gananciaaveriatGul14" value="{{ old('gananciaaveriatGul14', $guialevanteponedora15->gananciaaveriatGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                @endforeach
              </tr>
              <tr>
                @foreach($guialevanteponedoras16 as $guialevanteponedora16)
                  <td>16</td>
                  <td><input type="text" name="avediatabGul15" value="{{ old('avediatabGul15', $guialevanteponedora16->avediatabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="graveactabGul15" value="{{ old('graveactabGul15', $guialevanteponedora16->graveactabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesotabGul15" value="{{ old('pesotabGul15', $guialevanteponedora16->pesotabGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="convsemtabGul15" value="{{ old('convsemtabGul15', $guialevanteponedora16->convsemtabGul)}}" onkeypress="return tresdecimal(event,this);"></td>
                  <td><input type="text" name="gananciaaveriatGul15" value="{{ old('gananciaaveriatGul15', $guialevanteponedora16->gananciaaveriatGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                @endforeach
              </tr>
              <tr>
                @foreach($guialevanteponedoras17 as $guialevanteponedora17)
                  <td>17</td>
                  <td><input type="text" name="avediatabGul16" value="{{ old('avediatabGul16', $guialevanteponedora17->avediatabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="graveactabGul16" value="{{ old('graveactabGul16', $guialevanteponedora17->graveactabGul)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesotabGul16" value="{{ old('pesotabGul16', $guialevanteponedora17->pesotabGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="convsemtabGul16" value="{{ old('convsemtabGul16', $guialevanteponedora17->convsemtabGul)}}" onkeypress="return tresdecimal(event,this);"></td>
                  <td><input type="text" name="gananciaaveriatGul16" value="{{ old('gananciaaveriatGul16', $guialevanteponedora17->gananciaaveriatGul)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                @endforeach
              </tr>
          </tbody>
        </table>
        <div class="input-group separacion">
          <button id="boton_formulario">Guardar</button>
        </div>
      {{ Form::close() }}
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

          td:nth-of-type(1):before { content: "Semana"; }
          td:nth-of-type(2):before { content: "Ave/Dia TAB"; }
          td:nth-of-type(3):before { content: "Gr Ave Ac Tab"; }
          td:nth-of-type(4):before { content: "TAB"; }
          td:nth-of-type(5):before { content: "Conv. Sem Tab"; }
          td:nth-of-type(6):before { content: "Ganancia Ave Dia T"; }
        }
    </style>
  @endsection
