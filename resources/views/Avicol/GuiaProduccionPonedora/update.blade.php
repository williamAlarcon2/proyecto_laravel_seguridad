@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Guia Produccion Ponedoras</h4>
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
      {!! Form::model($guias, ['route' => ['guiaproduccionponedoras.update', $guias->id],'method' => 'PUT']) !!}
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
            <tr id="tabla">
              <th>Semana</th>
              <th>%TB</th>
              <th>TB1</th>
              <th>TB2</th>
              <th>Real 4</th>
              <th>Tab1</th>
              <th>Real 5</th>
              <th>TAB2</th>
              <th>%Prod. TB</th>
              <th>H.A.A TAB</th>
              <th>GR/TB</th>
              <th>Peso Huevo Tabla</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              @foreach($gp as $gps)
                <td>1</td>
                <td><input type="text" name="tbGup" value="{{ old('tbGup', $gps->tbGup)}}"></td>
                <td><input type="text" name="tb1Gup" value="{{ old('tb1Gup', $gps->tb1Gup)}}"></td>
                <td><input type="text" name="tb2Gup" value="{{ old('tb2Gup', $gps->tb2Gup)}}"></td>
                <td><input type="text" name="real4Gup" value="{{ old('real4Gup', $gps->real4Gup)}}"></td>
                <td><input type="text" name="tab1Gup" value="{{ old('tab1Gup', $gps->tab1Gup)}}"></td>
                <td><input type="text" name="real5Gup" value="{{ old('real5Gup', $gps->real5Gup)}}"></td>
                <td><input type="text" name="tab2Gup" value="{{ old('tab2Gup', $gps->tab2Gup)}}"></td>
                <td><input type="text" name="prodtbGup" value="{{ old('prodtbGup', $gps->prodtbGup)}}"></td>
                <td><input type="text" name="haatabGup" value="{{ old('haatabGup', $gps->haatabGup)}}"></td>
                <td><input type="text" name="grtbGup" value="{{ old('grtbGup', $gps->grtbGup)}}"></td>
                <td><input type="text" name="pesohuevotablaGup" value="{{ old('pesohuevotablaGup', $gps->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp2 as $gps2)
              <td>2</td>
              <td><input type="text" name="tbGup1" value="{{ old('tbGup1', $gps2->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup1" value="{{ old('tb1Gup1', $gps2->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup1" value="{{ old('tb2Gup1', $gps2->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup1" value="{{ old('real4Gup1', $gps2->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup1" value="{{ old('tab1Gup1', $gps2->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup1" value="{{ old('real5Gup1', $gps2->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup1" value="{{ old('tab2Gup1', $gps2->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup1" value="{{ old('prodtbGup1', $gps2->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup1" value="{{ old('haatabGup1', $gps2->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup1" value="{{ old('grtbGup1', $gps2->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup1" value="{{ old('pesohuevotablaGup1', $gps2->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp3 as $gps3)
              <td>3</td>
              <td><input type="text" name="tbGup2" value="{{ old('tbGup2', $gps3->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup2" value="{{ old('tb1Gup2', $gps3->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup2" value="{{ old('tb2Gup2', $gps3->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup2" value="{{ old('real4Gup2', $gps3->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup2" value="{{ old('tab1Gup2', $gps3->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup2" value="{{ old('real5Gup2', $gps3->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup2" value="{{ old('tab2Gup2', $gps3->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup2" value="{{ old('prodtbGup2', $gps3->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup2" value="{{ old('haatabGup2', $gps3->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup2" value="{{ old('grtbGup2', $gps3->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup2" value="{{ old('pesohuevotablaGup2', $gps3->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp4 as $gps4)
              <td>4</td>
              <td><input type="text" name="tbGup3" value="{{ old('tbGup3', $gps4->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup3" value="{{ old('tb1Gup3', $gps4->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup3" value="{{ old('tb2Gup3', $gps4->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup3" value="{{ old('real4Gup3', $gps4->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup3" value="{{ old('tab1Gup3', $gps4->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup3" value="{{ old('real5Gup3', $gps4->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup3" value="{{ old('tab2Gup3', $gps4->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup3" value="{{ old('prodtbGup3', $gps4->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup3" value="{{ old('haatabGup3', $gps4->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup3" value="{{ old('grtbGup3', $gps4->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup3" value="{{ old('pesohuevotablaGup3', $gps4->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp5 as $gps5)
              <td>5</td>
              <td><input type="text" name="tbGup4" value="{{ old('tbGup4', $gps5->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup4" value="{{ old('tb1Gup4', $gps5->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup4" value="{{ old('tb2Gup4', $gps5->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup4" value="{{ old('real4Gup4', $gps5->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup4" value="{{ old('tab1Gup4', $gps5->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup4" value="{{ old('real5Gup4', $gps5->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup4" value="{{ old('tab2Gup4', $gps5->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup4" value="{{ old('prodtbGup4', $gps5->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup4" value="{{ old('haatabGup4', $gps5->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup4" value="{{ old('grtbGup4', $gps5->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup4" value="{{ old('pesohuevotablaGup4', $gps5->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp6 as $gps6)
              <td>6</td>
              <td><input type="text" name="tbGup5" value="{{ old('tbGup5', $gps6->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup5" value="{{ old('tb1Gup5', $gps6->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup5" value="{{ old('tb2Gup5', $gps6->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup5" value="{{ old('real4Gup5', $gps6->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup5" value="{{ old('tab1Gup5', $gps6->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup5" value="{{ old('real5Gup5', $gps6->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup5" value="{{ old('tab2Gup5', $gps6->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup5" value="{{ old('prodtbGup5', $gps6->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup5" value="{{ old('haatabGup5', $gps6->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup5" value="{{ old('grtbGup5', $gps6->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup5" value="{{ old('pesohuevotablaGup5', $gps6->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp7 as $gps7)
              <td>7</td>
              <td><input type="text" name="tbGup6" value="{{ old('tbGup6', $gps7->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup6" value="{{ old('tb1Gup6', $gps7->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup6" value="{{ old('tb2Gup6', $gps7->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup6" value="{{ old('real4Gup6', $gps7->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup6" value="{{ old('tab1Gup6', $gps7->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup6" value="{{ old('real5Gup6', $gps7->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup6" value="{{ old('tab2Gup6', $gps7->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup6" value="{{ old('prodtbGup6', $gps7->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup6" value="{{ old('haatabGup6', $gps7->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup6" value="{{ old('grtbGup6', $gps7->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup6" value="{{ old('pesohuevotablaGup6', $gps7->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp8 as $gps8)
          <td>8</td>
              <td><input type="text" name="tbGup7" value="{{ old('tbGup7', $gps8->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup7" value="{{ old('tb1Gup7', $gps8->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup7" value="{{ old('tb2Gup7', $gps8->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup7" value="{{ old('real4Gup7', $gps8->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup7" value="{{ old('tab1Gup7', $gps8->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup7" value="{{ old('real5Gup7', $gps8->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup7" value="{{ old('tab2Gup7', $gps8->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup7" value="{{ old('prodtbGup7', $gps8->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup7" value="{{ old('haatabGup7', $gps8->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup7" value="{{ old('grtbGup7', $gps8->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup7" value="{{ old('pesohuevotablaGup7', $gps8->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp9 as $gps9)
              <td>9</td>
              <td><input type="text" name="tbGup8" value="{{ old('tbGup8', $gps9->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup8" value="{{ old('tb1Gup8', $gps9->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup8" value="{{ old('tb2Gup8', $gps9->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup8" value="{{ old('real4Gup8', $gps9->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup8" value="{{ old('tab1Gup8', $gps9->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup8" value="{{ old('real5Gup8', $gps9->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup8" value="{{ old('tab2Gup8', $gps9->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup8" value="{{ old('prodtbGup8', $gps9->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup8" value="{{ old('haatabGup8', $gps9->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup8" value="{{ old('grtbGup8', $gps9->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup8" value="{{ old('pesohuevotablaGup8', $gps9->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp10 as $gps10)
              <td>10</td>
              <td><input type="text" name="tbGup9" value="{{ old('tbGup9', $gps10->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup9" value="{{ old('tb1Gup9', $gps10->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup9" value="{{ old('tb2Gup9', $gps10->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup9" value="{{ old('real4Gup9', $gps10->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup9" value="{{ old('tab1Gup9', $gps10->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup9" value="{{ old('real5Gup9', $gps10->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup9" value="{{ old('tab2Gup9', $gps10->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup9" value="{{ old('prodtbGup9', $gps10->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup9" value="{{ old('haatabGup9', $gps10->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup9" value="{{ old('grtbGup9', $gps10->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup9" value="{{ old('pesohuevotablaGup9', $gps10->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp11 as $gps11)
              <td>11</td>
              <td><input type="text" name="tbGup10" value="{{ old('tbGup10', $gps11->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup10" value="{{ old('tb1Gup10', $gps11->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup10" value="{{ old('tb2Gup10', $gps11->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup10" value="{{ old('real4Gup10', $gps11->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup10" value="{{ old('tab1Gup10', $gps11->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup10" value="{{ old('real5Gup10', $gps11->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup10" value="{{ old('tab2Gup10', $gps11->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup10" value="{{ old('prodtbGup10', $gps11->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup10" value="{{ old('haatabGup10', $gps11->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup10" value="{{ old('grtbGup10', $gps11->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup10" value="{{ old('pesohuevotablaGup10', $gps11->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp12 as $gps12)
              <td>12</td>
              <td><input type="text" name="tbGup11" value="{{ old('tbGup11', $gps12->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup11" value="{{ old('tb1Gup11', $gps12->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup11" value="{{ old('tb2Gup11', $gps12->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup11" value="{{ old('real4Gup11', $gps12->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup11" value="{{ old('tab1Gup11', $gps12->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup11" value="{{ old('real5Gup11', $gps12->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup11" value="{{ old('tab2Gup11', $gps12->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup11" value="{{ old('prodtbGup11', $gps12->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup11" value="{{ old('haatabGup11', $gps12->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup11" value="{{ old('grtbGup11', $gps12->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup11" value="{{ old('pesohuevotablaGup11', $gps12->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp13 as $gps13)
              <td>13</td>
              <td><input type="text" name="tbGup12" value="{{ old('tbGup12', $gps13->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup12" value="{{ old('tb1Gup12', $gps13->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup12" value="{{ old('tb2Gup12', $gps13->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup12" value="{{ old('real4Gup12', $gps13->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup12" value="{{ old('tab1Gup12', $gps13->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup12" value="{{ old('real5Gup12', $gps13->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup12" value="{{ old('tab2Gup12', $gps13->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup12" value="{{ old('prodtbGup12', $gps13->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup12" value="{{ old('haatabGup12', $gps13->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup12" value="{{ old('grtbGup12', $gps13->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup12" value="{{ old('pesohuevotablaGup12', $gps13->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp14 as $gps14)
              <td>14</td>
              <td><input type="text" name="tbGup13" value="{{ old('tbGup13', $gps14->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup13" value="{{ old('tb1Gup13', $gps14->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup13" value="{{ old('tb2Gup13', $gps14->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup13" value="{{ old('real4Gup13', $gps14->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup13" value="{{ old('tab1Gup13', $gps14->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup13" value="{{ old('real5Gup13', $gps14->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup13" value="{{ old('tab2Gup13', $gps14->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup13" value="{{ old('prodtbGup13', $gps14->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup13" value="{{ old('haatabGup13', $gps14->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup13" value="{{ old('grtbGup13', $gps14->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup13" value="{{ old('pesohuevotablaGup13', $gps14->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp15 as $gps15)
              <td>15</td>
              <td><input type="text" name="tbGup14" value="{{ old('tbGup14', $gps15->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup14" value="{{ old('tb1Gup14', $gps15->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup14" value="{{ old('tb2Gup14', $gps15->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup14" value="{{ old('real4Gup14', $gps15->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup14" value="{{ old('tab1Gup14', $gps15->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup14" value="{{ old('real5Gup14', $gps15->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup14" value="{{ old('tab2Gup14', $gps15->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup14" value="{{ old('prodtbGup14', $gps15->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup14" value="{{ old('haatabGup14', $gps15->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup14" value="{{ old('grtbGup14', $gps15->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup14" value="{{ old('pesohuevotablaGup14', $gps15->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp16 as $gps16)
              <td>16</td>
              <td><input type="text" name="tbGup15" value="{{ old('tbGup15', $gps16->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup15" value="{{ old('tb1Gup15', $gps16->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup15" value="{{ old('tb2Gup15', $gps16->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup15" value="{{ old('real4Gup15', $gps16->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup15" value="{{ old('tab1Gup15', $gps16->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup15" value="{{ old('real5Gup15', $gps16->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup15" value="{{ old('tab2Gup15', $gps16->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup15" value="{{ old('prodtbGup15', $gps16->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup15" value="{{ old('haatabGup15', $gps16->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup15" value="{{ old('grtbGup15', $gps16->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup15" value="{{ old('pesohuevotablaGup15', $gps16->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp17 as $gps17)
              <td>17</td>
              <td><input type="text" name="tbGup16" value="{{ old('tbGup16', $gps17->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup16" value="{{ old('tb1Gup16', $gps17->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup16" value="{{ old('tb2Gup16', $gps17->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup16" value="{{ old('real4Gup16', $gps17->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup16" value="{{ old('tab1Gup16', $gps17->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup16" value="{{ old('real5Gup16', $gps17->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup16" value="{{ old('tab2Gup16', $gps17->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup16" value="{{ old('prodtbGup16', $gps17->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup16" value="{{ old('haatabGup16', $gps17->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup16" value="{{ old('grtbGup16', $gps17->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup16" value="{{ old('pesohuevotablaGup16', $gps17->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp18 as $gps18)
              <td>18</td>
              <td><input type="text" name="tbGup17" value="{{ old('tbGup17', $gps18->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup17" value="{{ old('tb1Gup17', $gps18->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup17" value="{{ old('tb2Gup17', $gps18->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup17" value="{{ old('real4Gup17', $gps18->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup17" value="{{ old('tab1Gup17', $gps18->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup17" value="{{ old('real5Gup17', $gps18->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup17" value="{{ old('tab2Gup17', $gps18->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup17" value="{{ old('prodtbGup17', $gps18->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup17" value="{{ old('haatabGup17', $gps18->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup17" value="{{ old('grtbGup17', $gps18->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup17" value="{{ old('pesohuevotablaGup17', $gps18->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp19 as $gps19)
              <td>19</td>
              <td><input type="text" name="tbGup18" value="{{ old('tbGup18', $gps19->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup18" value="{{ old('tb1Gup18', $gps19->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup18" value="{{ old('tb2Gup18', $gps19->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup18" value="{{ old('real4Gup18', $gps19->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup18" value="{{ old('tab1Gup18', $gps19->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup18" value="{{ old('real5Gup18', $gps19->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup18" value="{{ old('tab2Gup18', $gps19->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup18" value="{{ old('prodtbGup18', $gps19->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup18" value="{{ old('haatabGup18', $gps19->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup18" value="{{ old('grtbGup18', $gps19->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup18" value="{{ old('pesohuevotablaGup18', $gps19->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp20 as $gps20)
              <td>20</td>
              <td><input type="text" name="tbGup19" value="{{ old('tbGup19', $gps20->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup19" value="{{ old('tb1Gup19', $gps20->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup19" value="{{ old('tb2Gup19', $gps20->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup19" value="{{ old('real4Gup19', $gps20->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup19" value="{{ old('tab1Gup19', $gps20->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup19" value="{{ old('real5Gup19', $gps20->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup19" value="{{ old('tab2Gup19', $gps20->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup19" value="{{ old('prodtbGup19', $gps20->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup19" value="{{ old('haatabGup19', $gps20->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup19" value="{{ old('grtbGup19', $gps20->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup19" value="{{ old('pesohuevotablaGup19', $gps20->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp21 as $gps21)
              <td>21</td>
              <td><input type="text" name="tbGup20" value="{{ old('tbGup20', $gps21->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup20" value="{{ old('tb1Gup20', $gps21->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup20" value="{{ old('tb2Gup20', $gps21->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup20" value="{{ old('real4Gup20', $gps21->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup20" value="{{ old('tab1Gup20', $gps21->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup20" value="{{ old('real5Gup20', $gps21->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup20" value="{{ old('tab2Gup20', $gps21->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup20" value="{{ old('prodtbGup20', $gps21->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup20" value="{{ old('haatabGup20', $gps21->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup20" value="{{ old('grtbGup20', $gps21->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup20" value="{{ old('pesohuevotablaGup20', $gps21->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp22 as $gps22)
              <td>22</td>
              <td><input type="text" name="tbGup21" value="{{ old('tbGup21', $gps22->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup21" value="{{ old('tb1Gup21', $gps22->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup21" value="{{ old('tb2Gup21', $gps22->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup21" value="{{ old('real4Gup21', $gps22->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup21" value="{{ old('tab1Gup21', $gps22->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup21" value="{{ old('real5Gup21', $gps22->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup21" value="{{ old('tab2Gup21', $gps22->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup21" value="{{ old('prodtbGup21', $gps22->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup21" value="{{ old('haatabGup21', $gps22->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup21" value="{{ old('grtbGup21', $gps22->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup21" value="{{ old('pesohuevotablaGup21', $gps22->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp23 as $gps23)
              <td>23</td>
              <td><input type="text" name="tbGup22" value="{{ old('tbGup22', $gps23->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup22" value="{{ old('tb1Gup22', $gps23->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup22" value="{{ old('tb2Gup22', $gps23->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup22" value="{{ old('real4Gup22', $gps23->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup22" value="{{ old('tab1Gup22', $gps23->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup22" value="{{ old('real5Gup22', $gps23->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup22" value="{{ old('tab2Gup22', $gps23->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup22" value="{{ old('prodtbGup22', $gps23->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup22" value="{{ old('haatabGup22', $gps23->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup22" value="{{ old('grtbGup22', $gps23->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup22" value="{{ old('pesohuevotablaGup22', $gps23->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp24 as $gps24)
              <td>24</td>
              <td><input type="text" name="tbGup23" value="{{ old('tbGup23', $gps24->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup23" value="{{ old('tb1Gup23', $gps24->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup23" value="{{ old('tb2Gup23', $gps24->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup23" value="{{ old('real4Gup23', $gps24->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup23" value="{{ old('tab1Gup23', $gps24->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup23" value="{{ old('real5Gup23', $gps24->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup23" value="{{ old('tab2Gup23', $gps24->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup23" value="{{ old('prodtbGup23', $gps24->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup23" value="{{ old('haatabGup23', $gps24->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup23" value="{{ old('grtbGup23', $gps24->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup23" value="{{ old('pesohuevotablaGup23', $gps24->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp25 as $gps25)
              <td>25</td>
              <td><input type="text" name="tbGup24" value="{{ old('tbGup24', $gps25->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup24" value="{{ old('tb1Gup24', $gps25->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup24" value="{{ old('tb2Gup24', $gps25->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup24" value="{{ old('real4Gup24', $gps25->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup24" value="{{ old('tab1Gup24', $gps25->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup24" value="{{ old('real5Gup24', $gps25->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup24" value="{{ old('tab2Gup24', $gps25->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup24" value="{{ old('prodtbGup24', $gps25->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup24" value="{{ old('haatabGup24', $gps25->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup24" value="{{ old('grtbGup24', $gps25->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup24" value="{{ old('pesohuevotablaGup24', $gps25->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp26 as $gps26)
              <td>26</td>
              <td><input type="text" name="tbGup25" value="{{ old('tbGup25', $gps26->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup25" value="{{ old('tb1Gup25', $gps26->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup25" value="{{ old('tb2Gup25', $gps26->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup25" value="{{ old('real4Gup25', $gps26->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup25" value="{{ old('tab1Gup25', $gps26->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup25" value="{{ old('real5Gup25', $gps26->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup25" value="{{ old('tab2Gup25', $gps26->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup25" value="{{ old('prodtbGup25', $gps26->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup25" value="{{ old('haatabGup25', $gps26->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup25" value="{{ old('grtbGup25', $gps26->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup25" value="{{ old('pesohuevotablaGup25', $gps26->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp27 as $gps27)
              <td>27</td>
              <td><input type="text" name="tbGup26" value="{{ old('tbGup26', $gps27->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup26" value="{{ old('tb1Gup26', $gps27->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup26" value="{{ old('tb2Gup26', $gps27->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup26" value="{{ old('real4Gup26', $gps27->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup26" value="{{ old('tab1Gup26', $gps27->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup26" value="{{ old('real5Gup26', $gps27->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup26" value="{{ old('tab2Gup26', $gps27->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup26" value="{{ old('prodtbGup26', $gps27->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup26" value="{{ old('haatabGup26', $gps27->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup26" value="{{ old('grtbGup26', $gps27->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup26" value="{{ old('pesohuevotablaGup26', $gps27->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp28 as $gps28)
              <td>28</td>
              <td><input type="text" name="tbGup27" value="{{ old('tbGup27', $gps28->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup27" value="{{ old('tb1Gup27', $gps28->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup27" value="{{ old('tb2Gup27', $gps28->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup27" value="{{ old('real4Gup27', $gps28->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup27" value="{{ old('tab1Gup27', $gps28->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup27" value="{{ old('real5Gup27', $gps28->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup27" value="{{ old('tab2Gup27', $gps28->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup27" value="{{ old('prodtbGup27', $gps28->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup27" value="{{ old('haatabGup27', $gps28->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup27" value="{{ old('grtbGup27', $gps28->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup27" value="{{ old('pesohuevotablaGup27', $gps28->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp29 as $gps29)
              <td>29</td>
              <td><input type="text" name="tbGup28" value="{{ old('tbGup28', $gps29->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup28" value="{{ old('tb1Gup28', $gps29->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup28" value="{{ old('tb2Gup28', $gps29->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup28" value="{{ old('real4Gup28', $gps29->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup28" value="{{ old('tab1Gup28', $gps29->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup28" value="{{ old('real5Gup28', $gps29->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup28" value="{{ old('tab2Gup28', $gps29->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup28" value="{{ old('prodtbGup28', $gps29->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup28" value="{{ old('haatabGup28', $gps29->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup28" value="{{ old('grtbGup28', $gps29->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup28" value="{{ old('pesohuevotablaGup28', $gps29->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
            @foreach($gp30 as $gps30)
              <td>30</td>
              <td><input type="text" name="tbGup29" value="{{ old('tbGup29', $gps30->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup29" value="{{ old('tb1Gup29', $gps30->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup29" value="{{ old('tb2Gup29', $gps30->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup29" value="{{ old('real4Gup29', $gps30->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup29" value="{{ old('tab1Gup29', $gps30->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup29" value="{{ old('real5Gup29', $gps30->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup29" value="{{ old('tab2Gup29', $gps30->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup29" value="{{ old('prodtbGup29', $gps30->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup29" value="{{ old('haatabGup29', $gps30->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup29" value="{{ old('grtbGup29', $gps30->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup29" value="{{ old('pesohuevotablaGup29', $gps30->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp31 as $gps31)
              <td>31</td>
              <td><input type="text" name="tbGup30" value="{{ old('tbGup30', $gps31->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup30" value="{{ old('tb1Gup30', $gps31->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup30" value="{{ old('tb2Gup30', $gps31->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup30" value="{{ old('real4Gup30', $gps31->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup30" value="{{ old('tab1Gup30', $gps31->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup30" value="{{ old('real5Gup30', $gps31->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup30" value="{{ old('tab2Gup30', $gps31->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup30" value="{{ old('prodtbGup30', $gps31->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup30" value="{{ old('haatabGup30', $gps31->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup30" value="{{ old('grtbGup30', $gps31->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup30" value="{{ old('pesohuevotablaGup30', $gps31->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp32 as $gps32)
              <td>32</td>
              <td><input type="text" name="tbGup31" value="{{ old('tbGup31', $gps32->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup31" value="{{ old('tb1Gup31', $gps32->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup31" value="{{ old('tb2Gup31', $gps32->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup31" value="{{ old('real4Gup31', $gps32->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup31" value="{{ old('tab1Gup31', $gps32->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup31" value="{{ old('real5Gup31', $gps32->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup31" value="{{ old('tab2Gup31', $gps32->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup31" value="{{ old('prodtbGup31', $gps32->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup31" value="{{ old('haatabGup31', $gps32->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup31" value="{{ old('grtbGup31', $gps32->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup31" value="{{ old('pesohuevotablaGup31', $gps32->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp33 as $gps33)
              <td>33</td>
              <td><input type="text" name="tbGup32" value="{{ old('tbGup32', $gps33->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup32" value="{{ old('tb1Gup32', $gps33->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup32" value="{{ old('tb2Gup32', $gps33->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup32" value="{{ old('real4Gup32', $gps33->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup32" value="{{ old('tab1Gup32', $gps33->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup32" value="{{ old('real5Gup32', $gps33->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup32" value="{{ old('tab2Gup32', $gps33->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup32" value="{{ old('prodtbGup32', $gps33->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup32" value="{{ old('haatabGup32', $gps33->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup32" value="{{ old('grtbGup32', $gps33->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup32" value="{{ old('pesohuevotablaGup32', $gps33->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp34 as $gps34)
              <td>34</td>
              <td><input type="text" name="tbGup33" value="{{ old('tbGup33', $gps34->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup33" value="{{ old('tb1Gup33', $gps34->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup33" value="{{ old('tb2Gup33', $gps34->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup33" value="{{ old('real4Gup33', $gps34->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup33" value="{{ old('tab1Gup33', $gps34->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup33" value="{{ old('real5Gup33', $gps34->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup33" value="{{ old('tab2Gup33', $gps34->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup33" value="{{ old('prodtbGup33', $gps34->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup33" value="{{ old('haatabGup33', $gps34->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup33" value="{{ old('grtbGup33', $gps34->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup33" value="{{ old('pesohuevotablaGup33', $gps34->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp35 as $gps35)
              <td>35</td>
              <td><input type="text" name="tbGup34" value="{{ old('tbGup34', $gps35->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup34" value="{{ old('tb1Gup34', $gps35->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup34" value="{{ old('tb2Gup34', $gps35->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup34" value="{{ old('real4Gup34', $gps35->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup34" value="{{ old('tab1Gup34', $gps35->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup34" value="{{ old('real5Gup34', $gps35->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup34" value="{{ old('tab2Gup34', $gps35->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup34" value="{{ old('prodtbGup34', $gps35->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup34" value="{{ old('haatabGup34', $gps35->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup34" value="{{ old('grtbGup34', $gps35->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup34" value="{{ old('pesohuevotablaGup34', $gps35->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp36 as $gps36)
              <td>36</td>
              <td><input type="text" name="tbGup35" value="{{ old('tbGup35', $gps36->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup35" value="{{ old('tb1Gup35', $gps36->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup35" value="{{ old('tb2Gup35', $gps36->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup35" value="{{ old('real4Gup35', $gps36->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup35" value="{{ old('tab1Gup35', $gps36->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup35" value="{{ old('real5Gup35', $gps36->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup35" value="{{ old('tab2Gup35', $gps36->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup35" value="{{ old('prodtbGup35', $gps36->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup35" value="{{ old('haatabGup35', $gps36->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup35" value="{{ old('grtbGup35', $gps36->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup35" value="{{ old('pesohuevotablaGup35', $gps36->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp37 as $gps37)
              <td>37</td>
              <td><input type="text" name="tbGup36" value="{{ old('tbGup36', $gps37->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup36" value="{{ old('tb1Gup36', $gps37->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup36" value="{{ old('tb2Gup36', $gps37->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup36" value="{{ old('real4Gup36', $gps37->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup36" value="{{ old('tab1Gup36', $gps37->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup36" value="{{ old('real5Gup36', $gps37->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup36" value="{{ old('tab2Gup36', $gps37->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup36" value="{{ old('prodtbGup36', $gps37->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup36" value="{{ old('haatabGup36', $gps37->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup36" value="{{ old('grtbGup36', $gps37->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup36" value="{{ old('pesohuevotablaGup36', $gps37->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp38 as $gps38)
              <td>38</td>
              <td><input type="text" name="tbGup37" value="{{ old('tbGup37', $gps38->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup37" value="{{ old('tb1Gup37', $gps38->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup37" value="{{ old('tb2Gup37', $gps38->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup37" value="{{ old('real4Gup37', $gps38->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup37" value="{{ old('tab1Gup37', $gps38->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup37" value="{{ old('real5Gup37', $gps38->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup37" value="{{ old('tab2Gup37', $gps38->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup37" value="{{ old('prodtbGup37', $gps38->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup37" value="{{ old('haatabGup37', $gps38->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup37" value="{{ old('grtbGup37', $gps38->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup37" value="{{ old('pesohuevotablaGup37', $gps38->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp39 as $gps39)
              <td>39</td>
              <td><input type="text" name="tbGup38" value="{{ old('tbGup38', $gps39->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup38" value="{{ old('tb1Gup38', $gps39->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup38" value="{{ old('tb2Gup38', $gps39->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup38" value="{{ old('real4Gup38', $gps39->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup38" value="{{ old('tab1Gup38', $gps39->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup38" value="{{ old('real5Gup38', $gps39->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup38" value="{{ old('tab2Gup38', $gps39->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup38" value="{{ old('prodtbGup38', $gps39->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup38" value="{{ old('haatabGup38', $gps39->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup38" value="{{ old('grtbGup38', $gps39->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup38" value="{{ old('pesohuevotablaGup38', $gps39->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp40 as $gps40)
              <td>40</td>
              <td><input type="text" name="tbGup39" value="{{ old('tbGup39', $gps40->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup39" value="{{ old('tb1Gup39', $gps40->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup39" value="{{ old('tb2Gup39', $gps40->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup39" value="{{ old('real4Gup39', $gps40->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup39" value="{{ old('tab1Gup39', $gps40->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup39" value="{{ old('real5Gup39', $gps40->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup39" value="{{ old('tab2Gup39', $gps40->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup39" value="{{ old('prodtbGup39', $gps40->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup39" value="{{ old('haatabGup39', $gps40->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup39" value="{{ old('grtbGup39', $gps40->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup39" value="{{ old('pesohuevotablaGup39', $gps40->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp41 as $gps41)
              <td>41</td>
              <td><input type="text" name="tbGup40" value="{{ old('tbGup40', $gps41->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup40" value="{{ old('tb1Gup40', $gps41->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup40" value="{{ old('tb2Gup40', $gps41->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup40" value="{{ old('real4Gup40', $gps41->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup40" value="{{ old('tab1Gup40', $gps41->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup40" value="{{ old('real5Gup40', $gps41->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup40" value="{{ old('tab2Gup40', $gps41->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup40" value="{{ old('prodtbGup40', $gps41->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup40" value="{{ old('haatabGup40', $gps41->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup40" value="{{ old('grtbGup40', $gps41->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup40" value="{{ old('pesohuevotablaGup40', $gps41->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp42 as $gps42)
              <td>42</td>
              <td><input type="text" name="tbGup41" value="{{ old('tbGup41', $gps42->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup41" value="{{ old('tb1Gup41', $gps42->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup41" value="{{ old('tb2Gup41', $gps42->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup41" value="{{ old('real4Gup41', $gps42->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup41" value="{{ old('tab1Gup41', $gps42->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup41" value="{{ old('real5Gup41', $gps42->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup41" value="{{ old('tab2Gup41', $gps42->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup41" value="{{ old('prodtbGup41', $gps42->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup41" value="{{ old('haatabGup41', $gps42->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup41" value="{{ old('grtbGup41', $gps42->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup41" value="{{ old('pesohuevotablaGup41', $gps42->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp43 as $gps43)
              <td>43</td>
              <td><input type="text" name="tbGup42" value="{{ old('tbGup42', $gps43->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup42" value="{{ old('tb1Gup42', $gps43->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup42" value="{{ old('tb2Gup42', $gps43->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup42" value="{{ old('real4Gup42', $gps43->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup42" value="{{ old('tab1Gup42', $gps43->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup42" value="{{ old('real5Gup42', $gps43->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup42" value="{{ old('tab2Gup42', $gps43->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup42" value="{{ old('prodtbGup42', $gps43->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup42" value="{{ old('haatabGup42', $gps43->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup42" value="{{ old('grtbGup42', $gps43->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup42" value="{{ old('pesohuevotablaGup42', $gps43->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp44 as $gps44)
              <td>44</td>
              <td><input type="text" name="tbGup43" value="{{ old('tbGup43', $gps44->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup43" value="{{ old('tb1Gup43', $gps44->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup43" value="{{ old('tb2Gup43', $gps44->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup43" value="{{ old('real4Gup43', $gps44->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup43" value="{{ old('tab1Gup43', $gps44->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup43" value="{{ old('real5Gup43', $gps44->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup43" value="{{ old('tab2Gup43', $gps44->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup43" value="{{ old('prodtbGup43', $gps44->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup43" value="{{ old('haatabGup43', $gps44->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup43" value="{{ old('grtbGup43', $gps44->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup43" value="{{ old('pesohuevotablaGup43', $gps44->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp45 as $gps45)
              <td>45</td>
              <td><input type="text" name="tbGup44" value="{{ old('tbGup44', $gps45->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup44" value="{{ old('tb1Gup44', $gps45->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup44" value="{{ old('tb2Gup44', $gps45->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup44" value="{{ old('real4Gup44', $gps45->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup44" value="{{ old('tab1Gup44', $gps45->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup44" value="{{ old('real5Gup44', $gps45->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup44" value="{{ old('tab2Gup44', $gps45->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup44" value="{{ old('prodtbGup44', $gps45->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup44" value="{{ old('haatabGup44', $gps45->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup44" value="{{ old('grtbGup44', $gps45->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup44" value="{{ old('pesohuevotablaGup44', $gps45->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp46 as $gps46)
              <td>46</td>
              <td><input type="text" name="tbGup45" value="{{ old('tbGup45', $gps46->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup45" value="{{ old('tb1Gup45', $gps46->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup45" value="{{ old('tb2Gup45', $gps46->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup45" value="{{ old('real4Gup45', $gps46->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup45" value="{{ old('tab1Gup45', $gps46->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup45" value="{{ old('real5Gup45', $gps46->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup45" value="{{ old('tab2Gup45', $gps46->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup45" value="{{ old('prodtbGup45', $gps46->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup45" value="{{ old('haatabGup45', $gps46->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup45" value="{{ old('grtbGup45', $gps46->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup45" value="{{ old('pesohuevotablaGup45', $gps46->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp47 as $gps47)
              <td>47</td>
              <td><input type="text" name="tbGup46" value="{{ old('tbGup46', $gps47->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup46" value="{{ old('tb1Gup46', $gps47->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup46" value="{{ old('tb2Gup46', $gps47->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup46" value="{{ old('real4Gup46', $gps47->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup46" value="{{ old('tab1Gup46', $gps47->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup46" value="{{ old('real5Gup46', $gps47->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup46" value="{{ old('tab2Gup46', $gps47->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup46" value="{{ old('prodtbGup46', $gps47->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup46" value="{{ old('haatabGup46', $gps47->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup46" value="{{ old('grtbGup46', $gps47->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup46" value="{{ old('pesohuevotablaGup46', $gps47->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp48 as $gps48)
              <td>48</td>
              <td><input type="text" name="tbGup47" value="{{ old('tbGup47', $gps48->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup47" value="{{ old('tb1Gup47', $gps48->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup47" value="{{ old('tb2Gup47', $gps48->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup47" value="{{ old('real4Gup47', $gps48->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup47" value="{{ old('tab1Gup47', $gps48->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup47" value="{{ old('real5Gup47', $gps48->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup47" value="{{ old('tab2Gup47', $gps48->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup47" value="{{ old('prodtbGup47', $gps48->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup47" value="{{ old('haatabGup47', $gps48->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup47" value="{{ old('grtbGup47', $gps48->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup47" value="{{ old('pesohuevotablaGup47', $gps48->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp49 as $gps49)
              <td>49</td>
              <td><input type="text" name="tbGup48" value="{{ old('tbGup48', $gps49->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup48" value="{{ old('tb1Gup48', $gps49->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup48" value="{{ old('tb2Gup48', $gps49->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup48" value="{{ old('real4Gup48', $gps49->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup48" value="{{ old('tab1Gup48', $gps49->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup48" value="{{ old('real5Gup48', $gps49->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup48" value="{{ old('tab2Gup48', $gps49->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup48" value="{{ old('prodtbGup48', $gps49->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup48" value="{{ old('haatabGup48', $gps49->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup48" value="{{ old('grtbGup48', $gps49->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup48" value="{{ old('pesohuevotablaGup48', $gps49->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp50 as $gps50)
              <td>50</td>
              <td><input type="text" name="tbGup49" value="{{ old('tbGup49', $gps50->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup49" value="{{ old('tb1Gup49', $gps50->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup49" value="{{ old('tb2Gup49', $gps50->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup49" value="{{ old('real4Gup49', $gps50->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup49" value="{{ old('tab1Gup49', $gps50->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup49" value="{{ old('real5Gup49', $gps50->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup49" value="{{ old('tab2Gup49', $gps50->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup49" value="{{ old('prodtbGup49', $gps50->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup49" value="{{ old('haatabGup49', $gps50->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup49" value="{{ old('grtbGup49', $gps50->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup49" value="{{ old('pesohuevotablaGup49', $gps50->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp51 as $gps51)
              <td>51</td>
              <td><input type="text" name="tbGup50" value="{{ old('tbGup50', $gps51->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup50" value="{{ old('tb1Gup50', $gps51->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup50" value="{{ old('tb2Gup50', $gps51->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup50" value="{{ old('real4Gup50', $gps51->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup50" value="{{ old('tab1Gup50', $gps51->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup50" value="{{ old('real5Gup50', $gps51->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup50" value="{{ old('tab2Gup50', $gps51->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup50" value="{{ old('prodtbGup50', $gps51->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup50" value="{{ old('haatabGup50', $gps51->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup50" value="{{ old('grtbGup50', $gps51->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup50" value="{{ old('pesohuevotablaGup50', $gps51->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp52 as $gps52)
              <td>52</td>
              <td><input type="text" name="tbGup51" value="{{ old('tbGup51', $gps52->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup51" value="{{ old('tb1Gup51', $gps52->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup51" value="{{ old('tb2Gup51', $gps52->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup51" value="{{ old('real4Gup51', $gps52->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup51" value="{{ old('tab1Gup51', $gps52->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup51" value="{{ old('real5Gup51', $gps52->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup51" value="{{ old('tab2Gup51', $gps52->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup51" value="{{ old('prodtbGup51', $gps52->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup51" value="{{ old('haatabGup51', $gps52->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup51" value="{{ old('grtbGup51', $gps52->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup51" value="{{ old('pesohuevotablaGup51', $gps52->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp53 as $gps53)
              <td>53</td>
              <td><input type="text" name="tbGup52" value="{{ old('tbGup52', $gps53->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup52" value="{{ old('tb1Gup52', $gps53->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup52" value="{{ old('tb2Gup52', $gps53->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup52" value="{{ old('real4Gup52', $gps53->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup52" value="{{ old('tab1Gup52', $gps53->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup52" value="{{ old('real5Gup52', $gps53->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup52" value="{{ old('tab2Gup52', $gps53->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup52" value="{{ old('prodtbGup52', $gps53->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup52" value="{{ old('haatabGup52', $gps53->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup52" value="{{ old('grtbGup52', $gps53->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup52" value="{{ old('pesohuevotablaGup52', $gps53->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp54 as $gps54)
              <td>54</td>
              <td><input type="text" name="tbGup53" value="{{ old('tbGup53', $gps54->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup53" value="{{ old('tb1Gup53', $gps54->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup53" value="{{ old('tb2Gup53', $gps54->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup53" value="{{ old('real4Gup53', $gps54->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup53" value="{{ old('tab1Gup53', $gps54->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup53" value="{{ old('real5Gup53', $gps54->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup53" value="{{ old('tab2Gup53', $gps54->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup53" value="{{ old('prodtbGup53', $gps54->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup53" value="{{ old('haatabGup53', $gps54->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup53" value="{{ old('grtbGup53', $gps54->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup53" value="{{ old('pesohuevotablaGup53', $gps54->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp55 as $gps55)
              <td>55</td>
              <td><input type="text" name="tbGup54" value="{{ old('tbGup54', $gps55->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup54" value="{{ old('tb1Gup54', $gps55->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup54" value="{{ old('tb2Gup54', $gps55->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup54" value="{{ old('real4Gup54', $gps55->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup54" value="{{ old('tab1Gup54', $gps55->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup54" value="{{ old('real5Gup54', $gps55->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup54" value="{{ old('tab2Gup54', $gps55->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup54" value="{{ old('prodtbGup54', $gps55->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup54" value="{{ old('haatabGup54', $gps55->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup54" value="{{ old('grtbGup54', $gps55->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup54" value="{{ old('pesohuevotablaGup54', $gps55->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp56 as $gps56)
              <td>56</td>
              <td><input type="text" name="tbGup55" value="{{ old('tbGup55', $gps56->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup55" value="{{ old('tb1Gup55', $gps56->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup55" value="{{ old('tb2Gup55', $gps56->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup55" value="{{ old('real4Gup55', $gps56->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup55" value="{{ old('tab1Gup55', $gps56->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup55" value="{{ old('real5Gup55', $gps56->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup55" value="{{ old('tab2Gup55', $gps56->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup55" value="{{ old('prodtbGup55', $gps56->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup55" value="{{ old('haatabGup55', $gps56->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup55" value="{{ old('grtbGup55', $gps56->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup55" value="{{ old('pesohuevotablaGup55', $gps56->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp57 as $gps57)
              <td>57</td>
              <td><input type="text" name="tbGup56" value="{{ old('tbGup56', $gps57->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup56" value="{{ old('tb1Gup56', $gps57->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup56" value="{{ old('tb2Gup56', $gps57->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup56" value="{{ old('real4Gup56', $gps57->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup56" value="{{ old('tab1Gup56', $gps57->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup56" value="{{ old('real5Gup56', $gps57->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup56" value="{{ old('tab2Gup56', $gps57->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup56" value="{{ old('prodtbGup56', $gps57->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup56" value="{{ old('haatabGup56', $gps57->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup56" value="{{ old('grtbGup56', $gps57->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup56" value="{{ old('pesohuevotablaGup56', $gps57->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp58 as $gps58)
              <td>58</td>
              <td><input type="text" name="tbGup57" value="{{ old('tbGup57', $gps58->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup57" value="{{ old('tb1Gup57', $gps58->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup57" value="{{ old('tb2Gup57', $gps58->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup57" value="{{ old('real4Gup57', $gps58->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup57" value="{{ old('tab1Gup57', $gps58->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup57" value="{{ old('real5Gup57', $gps58->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup57" value="{{ old('tab2Gup57', $gps58->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup57" value="{{ old('prodtbGup57', $gps58->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup57" value="{{ old('haatabGup57', $gps58->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup57" value="{{ old('grtbGup57', $gps58->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup57" value="{{ old('pesohuevotablaGup57', $gps58->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp59 as $gps59)
              <td>59</td>
              <td><input type="text" name="tbGup58" value="{{ old('tbGup58', $gps59->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup58" value="{{ old('tb1Gup58', $gps59->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup58" value="{{ old('tb2Gup58', $gps59->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup58" value="{{ old('real4Gup58', $gps59->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup58" value="{{ old('tab1Gup58', $gps59->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup58" value="{{ old('real5Gup58', $gps59->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup58" value="{{ old('tab2Gup58', $gps59->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup58" value="{{ old('prodtbGup58', $gps59->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup58" value="{{ old('haatabGup58', $gps59->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup58" value="{{ old('grtbGup58', $gps59->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup58" value="{{ old('pesohuevotablaGup58', $gps59->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp60 as $gps60)
              <td>60</td>
              <td><input type="text" name="tbGup59" value="{{ old('tbGup59', $gps60->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup59" value="{{ old('tb1Gup59', $gps60->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup59" value="{{ old('tb2Gup59', $gps60->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup59" value="{{ old('real4Gup59', $gps60->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup59" value="{{ old('tab1Gup59', $gps60->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup59" value="{{ old('real5Gup59', $gps60->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup59" value="{{ old('tab2Gup59', $gps60->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup59" value="{{ old('prodtbGup59', $gps60->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup59" value="{{ old('haatabGup59', $gps60->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup59" value="{{ old('grtbGup59', $gps60->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup59" value="{{ old('pesohuevotablaGup59', $gps60->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp61 as $gps61)
              <td>61</td>
              <td><input type="text" name="tbGup60" value="{{ old('tbGup60', $gps61->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup60" value="{{ old('tb1Gup60', $gps61->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup60" value="{{ old('tb2Gup60', $gps61->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup60" value="{{ old('real4Gup60', $gps61->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup60" value="{{ old('tab1Gup60', $gps61->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup60" value="{{ old('real5Gup60', $gps61->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup60" value="{{ old('tab2Gup60', $gps61->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup60" value="{{ old('prodtbGup60', $gps61->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup60" value="{{ old('haatabGup60', $gps61->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup60" value="{{ old('grtbGup60', $gps61->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup60" value="{{ old('pesohuevotablaGup60', $gps61->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp62 as $gps62)
              <td>62</td>
              <td><input type="text" name="tbGup61" value="{{ old('tbGup61', $gps62->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup61" value="{{ old('tb1Gup61', $gps62->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup61" value="{{ old('tb2Gup61', $gps62->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup61" value="{{ old('real4Gup61', $gps62->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup61" value="{{ old('tab1Gup61', $gps62->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup61" value="{{ old('real5Gup61', $gps62->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup61" value="{{ old('tab2Gup61', $gps62->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup61" value="{{ old('prodtbGup61', $gps62->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup61" value="{{ old('haatabGup61', $gps62->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup61" value="{{ old('grtbGup61', $gps62->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup61" value="{{ old('pesohuevotablaGup61', $gps62->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp63 as $gps63)
              <td>63</td>
              <td><input type="text" name="tbGup62" value="{{ old('tbGup62', $gps63->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup62" value="{{ old('tb1Gup62', $gps63->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup62" value="{{ old('tb2Gup62', $gps63->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup62" value="{{ old('real4Gup62', $gps63->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup62" value="{{ old('tab1Gup62', $gps63->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup62" value="{{ old('real5Gup62', $gps63->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup62" value="{{ old('tab2Gup62', $gps63->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup62" value="{{ old('prodtbGup62', $gps63->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup62" value="{{ old('haatabGup62', $gps63->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup62" value="{{ old('grtbGup62', $gps63->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup62" value="{{ old('pesohuevotablaGup62', $gps63->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp64 as $gps64)
              <td>64</td>
              <td><input type="text" name="tbGup63" value="{{ old('tbGup63', $gps64->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup63" value="{{ old('tb1Gup63', $gps64->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup63" value="{{ old('tb2Gup63', $gps64->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup63" value="{{ old('real4Gup63', $gps64->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup63" value="{{ old('tab1Gup63', $gps64->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup63" value="{{ old('real5Gup63', $gps64->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup63" value="{{ old('tab2Gup63', $gps64->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup63" value="{{ old('prodtbGup63', $gps64->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup63" value="{{ old('haatabGup63', $gps64->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup63" value="{{ old('grtbGup63', $gps64->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup63" value="{{ old('pesohuevotablaGup63', $gps64->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp65 as $gps65)
              <td>65</td>
              <td><input type="text" name="tbGup64" value="{{ old('tbGup64', $gps65->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup64" value="{{ old('tb1Gup64', $gps65->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup64" value="{{ old('tb2Gup64', $gps65->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup64" value="{{ old('real4Gup64', $gps65->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup64" value="{{ old('tab1Gup64', $gps65->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup64" value="{{ old('real5Gup64', $gps65->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup64" value="{{ old('tab2Gup64', $gps65->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup64" value="{{ old('prodtbGup64', $gps65->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup64" value="{{ old('haatabGup64', $gps65->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup64" value="{{ old('grtbGup64', $gps65->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup64" value="{{ old('pesohuevotablaGup64', $gps65->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp66 as $gps66)
              <td>66</td>
              <td><input type="text" name="tbGup65" value="{{ old('tbGup65', $gps66->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup65" value="{{ old('tb1Gup65', $gps66->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup65" value="{{ old('tb2Gup65', $gps66->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup65" value="{{ old('real4Gup65', $gps66->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup65" value="{{ old('tab1Gup65', $gps66->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup65" value="{{ old('real5Gup65', $gps66->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup65" value="{{ old('tab2Gup65', $gps66->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup65" value="{{ old('prodtbGup65', $gps66->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup65" value="{{ old('haatabGup65', $gps66->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup65" value="{{ old('grtbGup65', $gps66->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup65" value="{{ old('pesohuevotablaGup65', $gps66->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp67 as $gps67)
              <td>67</td>
              <td><input type="text" name="tbGup66" value="{{ old('tbGup66', $gps67->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup66" value="{{ old('tb1Gup66', $gps67->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup66" value="{{ old('tb2Gup66', $gps67->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup66" value="{{ old('real4Gup66', $gps67->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup66" value="{{ old('tab1Gup66', $gps67->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup66" value="{{ old('real5Gup66', $gps67->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup66" value="{{ old('tab2Gup66', $gps67->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup66" value="{{ old('prodtbGup66', $gps67->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup66" value="{{ old('haatabGup66', $gps67->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup66" value="{{ old('grtbGup66', $gps67->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup66" value="{{ old('pesohuevotablaGup66', $gps67->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp68 as $gps68)
              <td>68</td>
              <td><input type="text" name="tbGup67" value="{{ old('tbGup67', $gps68->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup67" value="{{ old('tb1Gup67', $gps68->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup67" value="{{ old('tb2Gup67', $gps68->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup67" value="{{ old('real4Gup67', $gps68->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup67" value="{{ old('tab1Gup67', $gps68->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup67" value="{{ old('real5Gup67', $gps68->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup67" value="{{ old('tab2Gup67', $gps68->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup67" value="{{ old('prodtbGup67', $gps68->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup67" value="{{ old('haatabGup67', $gps68->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup67" value="{{ old('grtbGup67', $gps68->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup67" value="{{ old('pesohuevotablaGup67', $gps68->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp69 as $gps69)
              <td>69</td>
              <td><input type="text" name="tbGup68" value="{{ old('tbGup68', $gps69->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup68" value="{{ old('tb1Gup68', $gps69->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup68" value="{{ old('tb2Gup68', $gps69->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup68" value="{{ old('real4Gup68', $gps69->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup68" value="{{ old('tab1Gup68', $gps69->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup68" value="{{ old('real5Gup68', $gps69->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup68" value="{{ old('tab2Gup68', $gps69->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup68" value="{{ old('prodtbGup68', $gps69->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup68" value="{{ old('haatabGup68', $gps69->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup68" value="{{ old('grtbGup68', $gps69->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup68" value="{{ old('pesohuevotablaGup68', $gps69->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp70 as $gps70)
              <td>70</td>
              <td><input type="text" name="tbGup69" value="{{ old('tbGup69', $gps70->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup69" value="{{ old('tb1Gup69', $gps70->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup69" value="{{ old('tb2Gup69', $gps70->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup69" value="{{ old('real4Gup69', $gps70->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup69" value="{{ old('tab1Gup69', $gps70->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup69" value="{{ old('real5Gup69', $gps70->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup69" value="{{ old('tab2Gup69', $gps70->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup69" value="{{ old('prodtbGup69', $gps70->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup69" value="{{ old('haatabGup69', $gps70->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup69" value="{{ old('grtbGup69', $gps70->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup69" value="{{ old('pesohuevotablaGup69', $gps70->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp71 as $gps71)
              <td>71</td>
              <td><input type="text" name="tbGup70" value="{{ old('tbGup70', $gps71->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup70" value="{{ old('tb1Gup70', $gps71->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup70" value="{{ old('tb2Gup70', $gps71->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup70" value="{{ old('real4Gup70', $gps71->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup70" value="{{ old('tab1Gup70', $gps71->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup70" value="{{ old('real5Gup70', $gps71->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup70" value="{{ old('tab2Gup70', $gps71->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup70" value="{{ old('prodtbGup70', $gps71->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup70" value="{{ old('haatabGup70', $gps71->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup70" value="{{ old('grtbGup70', $gps71->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup70" value="{{ old('pesohuevotablaGup70', $gps71->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp72 as $gps72)
              <td>72</td>
              <td><input type="text" name="tbGup71" value="{{ old('tbGup71', $gps72->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup71" value="{{ old('tb1Gup71', $gps72->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup71" value="{{ old('tb2Gup71', $gps72->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup71" value="{{ old('real4Gup71', $gps72->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup71" value="{{ old('tab1Gup71', $gps72->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup71" value="{{ old('real5Gup71', $gps72->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup71" value="{{ old('tab2Gup71', $gps72->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup71" value="{{ old('prodtbGup71', $gps72->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup71" value="{{ old('haatabGup71', $gps72->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup71" value="{{ old('grtbGup71', $gps72->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup71" value="{{ old('pesohuevotablaGup71', $gps72->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp73 as $gps73)
              <td>73</td>
              <td><input type="text" name="tbGup72" value="{{ old('tbGup72', $gps73->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup72" value="{{ old('tb1Gup72', $gps73->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup72" value="{{ old('tb2Gup72', $gps73->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup72" value="{{ old('real4Gup72', $gps73->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup72" value="{{ old('tab1Gup72', $gps73->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup72" value="{{ old('real5Gup72', $gps73->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup72" value="{{ old('tab2Gup72', $gps73->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup72" value="{{ old('prodtbGup72', $gps73->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup72" value="{{ old('haatabGup72', $gps73->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup72" value="{{ old('grtbGup72', $gps73->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup72" value="{{ old('pesohuevotablaGup72', $gps73->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp74 as $gps74)
              <td>74</td>
              <td><input type="text" name="tbGup73" value="{{ old('tbGup73', $gps74->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup73" value="{{ old('tb1Gup73', $gps74->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup73" value="{{ old('tb2Gup73', $gps74->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup73" value="{{ old('real4Gup73', $gps74->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup73" value="{{ old('tab1Gup73', $gps74->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup73" value="{{ old('real5Gup73', $gps74->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup73" value="{{ old('tab2Gup73', $gps74->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup73" value="{{ old('prodtbGup73', $gps74->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup73" value="{{ old('haatabGup73', $gps74->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup73" value="{{ old('grtbGup73', $gps74->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup73" value="{{ old('pesohuevotablaGup73', $gps74->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp75 as $gps75)
              <td>75</td>
              <td><input type="text" name="tbGup74" value="{{ old('tbGup74', $gps75->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup74" value="{{ old('tb1Gup74', $gps75->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup74" value="{{ old('tb2Gup74', $gps75->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup74" value="{{ old('real4Gup74', $gps75->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup74" value="{{ old('tab1Gup74', $gps75->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup74" value="{{ old('real5Gup74', $gps75->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup74" value="{{ old('tab2Gup74', $gps75->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup74" value="{{ old('prodtbGup74', $gps75->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup74" value="{{ old('haatabGup74', $gps75->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup74" value="{{ old('grtbGup74', $gps75->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup74" value="{{ old('pesohuevotablaGup74', $gps75->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp76 as $gps76)
              <td>76</td>
              <td><input type="text" name="tbGup75" value="{{ old('tbGup75', $gps76->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup75" value="{{ old('tb1Gup75', $gps76->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup75" value="{{ old('tb2Gup75', $gps76->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup75" value="{{ old('real4Gup75', $gps76->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup75" value="{{ old('tab1Gup75', $gps76->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup75" value="{{ old('real5Gup75', $gps76->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup75" value="{{ old('tab2Gup75', $gps76->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup75" value="{{ old('prodtbGup75', $gps76->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup75" value="{{ old('haatabGup75', $gps76->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup75" value="{{ old('grtbGup75', $gps76->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup75" value="{{ old('pesohuevotablaGup75', $gps76->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp77 as $gps77)
              <td>77</td>
              <td><input type="text" name="tbGup76" value="{{ old('tbGup76', $gps77->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup76" value="{{ old('tb1Gup76', $gps77->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup76" value="{{ old('tb2Gup76', $gps77->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup76" value="{{ old('real4Gup76', $gps77->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup76" value="{{ old('tab1Gup76', $gps77->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup76" value="{{ old('real5Gup76', $gps77->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup76" value="{{ old('tab2Gup76', $gps77->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup76" value="{{ old('prodtbGup76', $gps77->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup76" value="{{ old('haatabGup76', $gps77->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup76" value="{{ old('grtbGup76', $gps77->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup76" value="{{ old('pesohuevotablaGup76', $gps77->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp78 as $gps78)
              <td>78</td>
              <td><input type="text" name="tbGup77" value="{{ old('tbGup77', $gps78->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup77" value="{{ old('tb1Gup77', $gps78->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup77" value="{{ old('tb2Gup77', $gps78->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup77" value="{{ old('real4Gup77', $gps78->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup77" value="{{ old('tab1Gup77', $gps78->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup77" value="{{ old('real5Gup77', $gps78->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup77" value="{{ old('tab2Gup77', $gps78->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup77" value="{{ old('prodtbGup77', $gps78->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup77" value="{{ old('haatabGup77', $gps78->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup77" value="{{ old('grtbGup77', $gps78->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup77" value="{{ old('pesohuevotablaGup77', $gps78->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp79 as $gps79)
              <td>79</td>
              <td><input type="text" name="tbGup78" value="{{ old('tbGup78', $gps79->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup78" value="{{ old('tb1Gup78', $gps79->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup78" value="{{ old('tb2Gup78', $gps79->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup78" value="{{ old('real4Gup78', $gps79->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup78" value="{{ old('tab1Gup78', $gps79->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup78" value="{{ old('real5Gup78', $gps79->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup78" value="{{ old('tab2Gup78', $gps79->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup78" value="{{ old('prodtbGup78', $gps79->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup78" value="{{ old('haatabGup78', $gps79->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup78" value="{{ old('grtbGup78', $gps79->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup78" value="{{ old('pesohuevotablaGup78', $gps79->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp80 as $gps80)
              <td>80</td>
              <td><input type="text" name="tbGup79" value="{{ old('tbGup79', $gps80->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup79" value="{{ old('tb1Gup79', $gps80->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup79" value="{{ old('tb2Gup79', $gps80->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup79" value="{{ old('real4Gup79', $gps80->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup79" value="{{ old('tab1Gup79', $gps80->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup79" value="{{ old('real5Gup79', $gps80->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup79" value="{{ old('tab2Gup79', $gps80->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup79" value="{{ old('prodtbGup79', $gps80->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup79" value="{{ old('haatabGup79', $gps80->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup79" value="{{ old('grtbGup79', $gps80->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup79" value="{{ old('pesohuevotablaGup79', $gps80->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp81 as $gps81)
              <td>81</td>
              <td><input type="text" name="tbGup80" value="{{ old('tbGup80', $gps81->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup80" value="{{ old('tb1Gup80', $gps81->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup80" value="{{ old('tb2Gup80', $gps81->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup80" value="{{ old('real4Gup80', $gps81->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup80" value="{{ old('tab1Gup80', $gps81->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup80" value="{{ old('real5Gup80', $gps81->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup80" value="{{ old('tab2Gup80', $gps81->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup80" value="{{ old('prodtbGup80', $gps81->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup80" value="{{ old('haatabGup80', $gps81->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup80" value="{{ old('grtbGup80', $gps81->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup80" value="{{ old('pesohuevotablaGup80', $gps81->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp82 as $gps82)
              <td>82</td>
              <td><input type="text" name="tbGup81" value="{{ old('tbGup81', $gps82->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup81" value="{{ old('tb1Gup81', $gps82->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup81" value="{{ old('tb2Gup81', $gps82->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup81" value="{{ old('real4Gup81', $gps82->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup81" value="{{ old('tab1Gup81', $gps82->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup81" value="{{ old('real5Gup81', $gps82->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup81" value="{{ old('tab2Gup81', $gps82->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup81" value="{{ old('prodtbGup81', $gps82->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup81" value="{{ old('haatabGup81', $gps82->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup81" value="{{ old('grtbGup81', $gps82->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup81" value="{{ old('pesohuevotablaGup81', $gps82->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp83 as $gps83)
              <td>83</td>
              <td><input type="text" name="tbGup82" value="{{ old('tbGup82', $gps83->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup82" value="{{ old('tb1Gup82', $gps83->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup82" value="{{ old('tb2Gup82', $gps83->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup82" value="{{ old('real4Gup82', $gps83->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup82" value="{{ old('tab1Gup82', $gps83->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup82" value="{{ old('real5Gup82', $gps83->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup82" value="{{ old('tab2Gup82', $gps83->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup82" value="{{ old('prodtbGup82', $gps83->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup82" value="{{ old('haatabGup82', $gps83->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup82" value="{{ old('grtbGup82', $gps83->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup82" value="{{ old('pesohuevotablaGup82', $gps83->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp84 as $gps84)
              <td>84</td>
              <td><input type="text" name="tbGup83" value="{{ old('tbGup83', $gps84->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup83" value="{{ old('tb1Gup83', $gps84->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup83" value="{{ old('tb2Gup83', $gps84->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup83" value="{{ old('real4Gup83', $gps84->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup83" value="{{ old('tab1Gup83', $gps84->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup83" value="{{ old('real5Gup83', $gps84->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup83" value="{{ old('tab2Gup83', $gps84->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup83" value="{{ old('prodtbGup83', $gps84->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup83" value="{{ old('haatabGup83', $gps84->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup83" value="{{ old('grtbGup83', $gps84->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup83" value="{{ old('pesohuevotablaGup83', $gps84->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp85 as $gps85)
              <td>85</td>
              <td><input type="text" name="tbGup84" value="{{ old('tbGup84', $gps85->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup84" value="{{ old('tb1Gup84', $gps85->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup84" value="{{ old('tb2Gup84', $gps85->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup84" value="{{ old('real4Gup84', $gps85->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup84" value="{{ old('tab1Gup84', $gps85->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup84" value="{{ old('real5Gup84', $gps85->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup84" value="{{ old('tab2Gup84', $gps85->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup84" value="{{ old('prodtbGup84', $gps85->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup84" value="{{ old('haatabGup84', $gps85->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup84" value="{{ old('grtbGup84', $gps85->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup84" value="{{ old('pesohuevotablaGup84', $gps85->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp86 as $gps86)
              <td>86</td>
              <td><input type="text" name="tbGup85" value="{{ old('tbGup85', $gps86->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup85" value="{{ old('tb1Gup85', $gps86->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup85" value="{{ old('tb2Gup85', $gps86->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup85" value="{{ old('real4Gup85', $gps86->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup85" value="{{ old('tab1Gup85', $gps86->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup85" value="{{ old('real5Gup85', $gps86->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup85" value="{{ old('tab2Gup85', $gps86->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup85" value="{{ old('prodtbGup85', $gps86->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup85" value="{{ old('haatabGup85', $gps86->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup85" value="{{ old('grtbGup85', $gps86->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup85" value="{{ old('pesohuevotablaGup85', $gps86->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp87 as $gps87)
              <td>87</td>
              <td><input type="text" name="tbGup86" value="{{ old('tbGup86' , $gps87->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup86" value="{{ old('tb1Gup86' , $gps87->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup86" value="{{ old('tb2Gup86' , $gps87->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup86" value="{{ old('real4Gup86' , $gps87->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup86" value="{{ old('tab1Gup86' , $gps87->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup86" value="{{ old('real5Gup86' , $gps87->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup86" value="{{ old('tab2Gup86' , $gps87->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup86" value="{{ old('prodtbGup86' , $gps87->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup86" value="{{ old('haatabGup86' , $gps87->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup86" value="{{ old('grtbGup86' , $gps87->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup86" value="{{ old('pesohuevotablaGup86', $gps87->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp88 as $gps88)
              <td>88</td>
              <td><input type="text" name="tbGup87" value="{{ old('tbGup87', $gps88->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup87" value="{{ old('tb1Gup87', $gps88->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup87" value="{{ old('tb2Gup87', $gps88->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup87" value="{{ old('real4Gup87', $gps88->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup87" value="{{ old('tab1Gup87', $gps88->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup87" value="{{ old('real5Gup87', $gps88->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup87" value="{{ old('tab2Gup87', $gps88->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup87" value="{{ old('prodtbGup87', $gps88->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup87" value="{{ old('haatabGup87', $gps88->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup87" value="{{ old('grtbGup87', $gps88->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup87" value="{{ old('pesohuevotablaGup87', $gps88->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp89 as $gps89)
              <td>89</td>
              <td><input type="text" name="tbGup88" value="{{ old('tbGup88', $gps89->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup88" value="{{ old('tb1Gup88', $gps89->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup88" value="{{ old('tb2Gup88', $gps89->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup88" value="{{ old('real4Gup88', $gps89->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup88" value="{{ old('tab1Gup88', $gps89->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup88" value="{{ old('real5Gup88', $gps89->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup88" value="{{ old('tab2Gup88', $gps89->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup88" value="{{ old('prodtbGup88', $gps89->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup88" value="{{ old('haatabGup88', $gps89->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup88" value="{{ old('grtbGup88', $gps89->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup88" value="{{ old('pesohuevotablaGup88', $gps89->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp90 as $gps90)
              <td>90</td>
              <td><input type="text" name="tbGup89" value="{{ old('tbGup89', $gps90->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup89" value="{{ old('tb1Gup89', $gps90->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup89" value="{{ old('tb2Gup89', $gps90->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup89" value="{{ old('real4Gup89', $gps90->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup89" value="{{ old('tab1Gup89', $gps90->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup89" value="{{ old('real5Gup89', $gps90->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup89" value="{{ old('tab2Gup89', $gps90->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup89" value="{{ old('prodtbGup89', $gps90->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup89" value="{{ old('haatabGup89', $gps90->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup89" value="{{ old('grtbGup89', $gps90->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup89" value="{{ old('pesohuevotablaGup89', $gps90->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp91 as $gps91)
              <td>91</td>
              <td><input type="text" name="tbGup90" value="{{ old('tbGup90', $gps91->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup90" value="{{ old('tb1Gup90', $gps91->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup90" value="{{ old('tb2Gup90', $gps91->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup90" value="{{ old('real4Gup90', $gps91->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup90" value="{{ old('tab1Gup90', $gps91->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup90" value="{{ old('real5Gup90', $gps91->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup90" value="{{ old('tab2Gup90', $gps91->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup90" value="{{ old('prodtbGup90', $gps91->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup90" value="{{ old('haatabGup90', $gps91->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup90" value="{{ old('grtbGup90', $gps91->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup90" value="{{ old('pesohuevotablaGup90', $gps91->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp92 as $gps92)
              <td>92</td>
              <td><input type="text" name="tbGup91" value="{{ old('tbGup91', $gps92->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup91" value="{{ old('tb1Gup91', $gps92->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup91" value="{{ old('tb2Gup91', $gps92->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup91" value="{{ old('real4Gup91', $gps92->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup91" value="{{ old('tab1Gup91', $gps92->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup91" value="{{ old('real5Gup91', $gps92->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup91" value="{{ old('tab2Gup91', $gps92->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup91" value="{{ old('prodtbGup91', $gps92->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup91" value="{{ old('haatabGup91', $gps92->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup91" value="{{ old('grtbGup91', $gps92->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup91" value="{{ old('pesohuevotablaGup91', $gps92->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp93 as $gps93)
              <td>93</td>
              <td><input type="text" name="tbGup92" value="{{ old('tbGup92', $gps93->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup92" value="{{ old('tb1Gup92', $gps93->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup92" value="{{ old('tb2Gup92', $gps93->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup92" value="{{ old('real4Gup92', $gps93->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup92" value="{{ old('tab1Gup92', $gps93->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup92" value="{{ old('real5Gup92', $gps93->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup92" value="{{ old('tab2Gup92', $gps93->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup92" value="{{ old('prodtbGup92', $gps93->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup92" value="{{ old('haatabGup92', $gps93->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup92" value="{{ old('grtbGup92', $gps93->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup92" value="{{ old('pesohuevotablaGup92', $gps93->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp94 as $gps94)
              <td>94</td>
              <td><input type="text" name="tbGup93" value="{{ old('tbGup93', $gps94->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup93" value="{{ old('tb1Gup93', $gps94->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup93" value="{{ old('tb2Gup93', $gps94->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup93" value="{{ old('real4Gup93', $gps94->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup93" value="{{ old('tab1Gup93', $gps94->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup93" value="{{ old('real5Gup93', $gps94->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup93" value="{{ old('tab2Gup93', $gps94->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup93" value="{{ old('prodtbGup93', $gps94->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup93" value="{{ old('haatabGup93', $gps94->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup93" value="{{ old('grtbGup93', $gps94->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup93" value="{{ old('pesohuevotablaGup93', $gps94->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp95 as $gps95)
              <td>95</td>
              <td><input type="text" name="tbGup94" value="{{ old('tbGup94', $gps95->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup94" value="{{ old('tb1Gup94', $gps95->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup94" value="{{ old('tb2Gup94', $gps95->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup94" value="{{ old('real4Gup94', $gps95->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup94" value="{{ old('tab1Gup94', $gps95->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup94" value="{{ old('real5Gup94', $gps95->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup94" value="{{ old('tab2Gup94', $gps95->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup94" value="{{ old('prodtbGup94', $gps95->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup94" value="{{ old('haatabGup94', $gps95->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup94" value="{{ old('grtbGup94', $gps95->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup94" value="{{ old('pesohuevotablaGup94', $gps95->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp96 as $gps96)
              <td>96</td>
              <td><input type="text" name="tbGup95" value="{{ old('tbGup95', $gps96->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup95" value="{{ old('tb1Gup95', $gps96->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup95" value="{{ old('tb2Gup95', $gps96->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup95" value="{{ old('real4Gup95', $gps96->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup95" value="{{ old('tab1Gup95', $gps96->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup95" value="{{ old('real5Gup95', $gps96->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup95" value="{{ old('tab2Gup95', $gps96->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup95" value="{{ old('prodtbGup95', $gps96->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup95" value="{{ old('haatabGup95', $gps96->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup95" value="{{ old('grtbGup95', $gps96->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup95" value="{{ old('pesohuevotablaGup95', $gps96->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp97 as $gps97)
              <td>97</td>
              <td><input type="text" name="tbGup96" value="{{ old('tbGup96', $gps97->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup96" value="{{ old('tb1Gup96', $gps97->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup96" value="{{ old('tb2Gup96', $gps97->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup96" value="{{ old('real4Gup96', $gps97->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup96" value="{{ old('tab1Gup96', $gps97->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup96" value="{{ old('real5Gup96', $gps97->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup96" value="{{ old('tab2Gup96', $gps97->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup96" value="{{ old('prodtbGup96', $gps97->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup96" value="{{ old('haatabGup96', $gps97->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup96" value="{{ old('grtbGup96', $gps97->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup96" value="{{ old('pesohuevotablaGup96', $gps97->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp98 as $gps98)
              <td>98</td>
              <td><input type="text" name="tbGup97" value="{{ old('tbGup97', $gps98->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup97" value="{{ old('tb1Gup97', $gps98->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup97" value="{{ old('tb2Gup97', $gps98->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup97" value="{{ old('real4Gup97', $gps98->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup97" value="{{ old('tab1Gup97', $gps98->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup97" value="{{ old('real5Gup97', $gps98->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup97" value="{{ old('tab2Gup97', $gps98->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup97" value="{{ old('prodtbGup97', $gps98->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup97" value="{{ old('haatabGup97', $gps98->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup97" value="{{ old('grtbGup97', $gps98->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup97" value="{{ old('pesohuevotablaGup97', $gps98->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp99 as $gps99)
              <td>99</td>
              <td><input type="text" name="tbGup98" value="{{ old('tbGup98', $gps99->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup98" value="{{ old('tb1Gup98', $gps99->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup98" value="{{ old('tb2Gup98', $gps99->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup98" value="{{ old('real4Gup98', $gps99->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup98" value="{{ old('tab1Gup98', $gps99->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup98" value="{{ old('real5Gup98', $gps99->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup98" value="{{ old('tab2Gup98', $gps99->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup98" value="{{ old('prodtbGup98', $gps99->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup98" value="{{ old('haatabGup98', $gps99->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup98" value="{{ old('grtbGup98', $gps99->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup98" value="{{ old('pesohuevotablaGup98', $gps99->pesohuevotablaGup)}}"></td>
              @endforeach
            </tr>
            <tr>
              @foreach($gp100 as $gps100)
              <td>100</td>
              <td><input type="text" name="tbGup99" value="{{ old('tbGup99', $gps100->tbGup)}}"></td>
              <td><input type="text" name="tb1Gup99" value="{{ old('tb1Gup99', $gps100->tb1Gup)}}"></td>
              <td><input type="text" name="tb2Gup99" value="{{ old('tb2Gup99', $gps100->tb2Gup)}}"></td>
              <td><input type="text" name="real4Gup99" value="{{ old('real4Gup99', $gps100->real4Gup)}}"></td>
              <td><input type="text" name="tab1Gup99" value="{{ old('tab1Gup99', $gps100->tab1Gup)}}"></td>
              <td><input type="text" name="real5Gup99" value="{{ old('real5Gup99', $gps100->real5Gup)}}"></td>
              <td><input type="text" name="tab2Gup99" value="{{ old('tab2Gup99', $gps100->tab2Gup)}}"></td>
              <td><input type="text" name="prodtbGup99" value="{{ old('prodtbGup99', $gps100->prodtbGup)}}"></td>
              <td><input type="text" name="haatabGup99" value="{{ old('haatabGup99', $gps100->haatabGup)}}"></td>
              <td><input type="text" name="grtbGup99" value="{{ old('grtbGup99', $gps100->grtbGup)}}"></td>
              <td><input type="text" name="pesohuevotablaGup99" value="{{ old('pesohuevotablaGup99', $gps100->pesohuevotablaGup)}}"></td>
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
          td:nth-of-type(2):before { content: "%TB"; }
          td:nth-of-type(3):before { content: "TB1"; }
          td:nth-of-type(4):before { content: "TB2"; }
          td:nth-of-type(5):before { content: "Real 4"; }
          td:nth-of-type(6):before { content: "Tab1"; }
          td:nth-of-type(7):before { content: "Real 5"; }
          td:nth-of-type(8):before { content: "TAB2"; }
          td:nth-of-type(9):before { content: "%Prod. TB"; }
          td:nth-of-type(10):before { content: "H.A.A TAB"; }
          td:nth-of-type(11):before { content: "GR/TB"; }
          td:nth-of-type(12):before { content: "Peso Huevo Tabla"; }
        }
    </style>
  @endsection
