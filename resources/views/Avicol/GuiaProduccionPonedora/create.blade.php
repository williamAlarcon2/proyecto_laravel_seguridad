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
    <div class="col-sm-12 card-block" id="formularioguia">
      {{ Form::open(['route' => 'guiaproduccionponedoras.store']) }}
        <div class="row">
          <div class="input-group separacion col-md-5 col-md-offset-3">
            <span class="input-group-addon"><i class="fa fa-list-alt fa-2x"></i></span>
            <div class="form-group label-floating search">
                <label class="control-label">Nombre</label>
                <input type="text" name="nombreGui" class="form-control" id="nombreGui" value="{{ old('nombreGui')}}" onkeyup="cadaprimera(this)">
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
              <td>1</td>
              <td><input type="text" name="tbGup" value="{{ old('tbGup')}}"></td>
              <td><input type="text" name="tb1Gup" value="{{ old('tb1Gup')}}"></td>
              <td><input type="text" name="tb2Gup" value="{{ old('tb2Gup')}}"></td>
              <td><input type="text" name="real4Gup" value="{{ old('real4Gup')}}"></td>
              <td><input type="text" name="tab1Gup" value="{{ old('tab1Gup')}}"></td>
              <td><input type="text" name="real5Gup" value="{{ old('real5Gup')}}"></td>
              <td><input type="text" name="tab2Gup" value="{{ old('tab2Gup')}}"></td>
              <td><input type="text" name="prodtbGup" value="{{ old('prodtbGup')}}"></td>
              <td><input type="text" name="haatabGup" value="{{ old('haatabGup')}}"></td>
              <td><input type="text" name="grtbGup" value="{{ old('grtbGup')}}"></td>
              <td><input type="text" name="pesohuevotablaGup" value="{{ old('pesohuevotablaGup')}}"></td>
            </tr>
            <tr>
              <td>2</td>
              <td><input type="text" name="tbGup1" value="{{ old('tbGup1')}}"></td>
              <td><input type="text" name="tb1Gup1" value="{{ old('tb1Gup1')}}"></td>
              <td><input type="text" name="tb2Gup1" value="{{ old('tb2Gup1')}}"></td>
              <td><input type="text" name="real4Gup1" value="{{ old('real4Gup1')}}"></td>
              <td><input type="text" name="tab1Gup1" value="{{ old('tab1Gup1')}}"></td>
              <td><input type="text" name="real5Gup1" value="{{ old('real5Gup1')}}"></td>
              <td><input type="text" name="tab2Gup1" value="{{ old('tab2Gup1')}}"></td>
              <td><input type="text" name="prodtbGup1" value="{{ old('prodtbGup1')}}"></td>
              <td><input type="text" name="haatabGup1" value="{{ old('haatabGup1')}}"></td>
              <td><input type="text" name="grtbGup1" value="{{ old('grtbGup1')}}"></td>
              <td><input type="text" name="pesohuevotablaGup1" value="{{ old('pesohuevotablaGup1')}}"></td>
            </tr>
            <tr>
              <td>3</td>
              <td><input type="text" name="tbGup2" value="{{ old('tbGup2')}}"></td>
              <td><input type="text" name="tb1Gup2" value="{{ old('tb1Gup2')}}"></td>
              <td><input type="text" name="tb2Gup2" value="{{ old('tb2Gup2')}}"></td>
              <td><input type="text" name="real4Gup2" value="{{ old('real4Gup2')}}"></td>
              <td><input type="text" name="tab1Gup2" value="{{ old('tab1Gup2')}}"></td>
              <td><input type="text" name="real5Gup2" value="{{ old('real5Gup2')}}"></td>
              <td><input type="text" name="tab2Gup2" value="{{ old('tab2Gup2')}}"></td>
              <td><input type="text" name="prodtbGup2" value="{{ old('prodtbGup2')}}"></td>
              <td><input type="text" name="haatabGup2" value="{{ old('haatabGup2')}}"></td>
              <td><input type="text" name="grtbGup2" value="{{ old('grtbGup2')}}"></td>
              <td><input type="text" name="pesohuevotablaGup2" value="{{ old('pesohuevotablaGup2')}}"></td>
            </tr>
            <tr>
              <td>4</td>
              <td><input type="text" name="tbGup3" value="{{ old('tbGup3')}}"></td>
              <td><input type="text" name="tb1Gup3" value="{{ old('tb1Gup3')}}"></td>
              <td><input type="text" name="tb2Gup3" value="{{ old('tb2Gup3')}}"></td>
              <td><input type="text" name="real4Gup3" value="{{ old('real4Gup3')}}"></td>
              <td><input type="text" name="tab1Gup3" value="{{ old('tab1Gup3')}}"></td>
              <td><input type="text" name="real5Gup3" value="{{ old('real5Gup3')}}"></td>
              <td><input type="text" name="tab2Gup3" value="{{ old('tab2Gup3')}}"></td>
              <td><input type="text" name="prodtbGup3" value="{{ old('prodtbGup3')}}"></td>
              <td><input type="text" name="haatabGup3" value="{{ old('haatabGup3')}}"></td>
              <td><input type="text" name="grtbGup3" value="{{ old('grtbGup3')}}"></td>
              <td><input type="text" name="pesohuevotablaGup3" value="{{ old('pesohuevotablaGup3')}}"></td>
            </tr>
            <tr>
              <td>5</td>
              <td><input type="text" name="tbGup4" value="{{ old('tbGup4')}}"></td>
              <td><input type="text" name="tb1Gup4" value="{{ old('tb1Gup4')}}"></td>
              <td><input type="text" name="tb2Gup4" value="{{ old('tb2Gup4')}}"></td>
              <td><input type="text" name="real4Gup4" value="{{ old('real4Gup4')}}"></td>
              <td><input type="text" name="tab1Gup4" value="{{ old('tab1Gup4')}}"></td>
              <td><input type="text" name="real5Gup4" value="{{ old('real5Gup4')}}"></td>
              <td><input type="text" name="tab2Gup4" value="{{ old('tab2Gup4')}}"></td>
              <td><input type="text" name="prodtbGup4" value="{{ old('prodtbGup4')}}"></td>
              <td><input type="text" name="haatabGup4" value="{{ old('haatabGup4')}}"></td>
              <td><input type="text" name="grtbGup4" value="{{ old('grtbGup4')}}"></td>
              <td><input type="text" name="pesohuevotablaGup4" value="{{ old('pesohuevotablaGup4')}}"></td>
            </tr>
            <tr>
              <td>6</td>
              <td><input type="text" name="tbGup5" value="{{ old('tbGup5')}}"></td>
              <td><input type="text" name="tb1Gup5" value="{{ old('tb1Gup5')}}"></td>
              <td><input type="text" name="tb2Gup5" value="{{ old('tb2Gup5')}}"></td>
              <td><input type="text" name="real4Gup5" value="{{ old('real4Gup5')}}"></td>
              <td><input type="text" name="tab1Gup5" value="{{ old('tab1Gup5')}}"></td>
              <td><input type="text" name="real5Gup5" value="{{ old('real5Gup5')}}"></td>
              <td><input type="text" name="tab2Gup5" value="{{ old('tab2Gup5')}}"></td>
              <td><input type="text" name="prodtbGup5" value="{{ old('prodtbGup5')}}"></td>
              <td><input type="text" name="haatabGup5" value="{{ old('haatabGup5')}}"></td>
              <td><input type="text" name="grtbGup5" value="{{ old('grtbGup5')}}"></td>
              <td><input type="text" name="pesohuevotablaGup5" value="{{ old('pesohuevotablaGup5')}}"></td>
            </tr>
            <tr>
              <td>7</td>
              <td><input type="text" name="tbGup6" value="{{ old('tbGup6')}}"></td>
              <td><input type="text" name="tb1Gup6" value="{{ old('tb1Gup6')}}"></td>
              <td><input type="text" name="tb2Gup6" value="{{ old('tb2Gup6')}}"></td>
              <td><input type="text" name="real4Gup6" value="{{ old('real4Gup6')}}"></td>
              <td><input type="text" name="tab1Gup6" value="{{ old('tab1Gup6')}}"></td>
              <td><input type="text" name="real5Gup6" value="{{ old('real5Gup6')}}"></td>
              <td><input type="text" name="tab2Gup6" value="{{ old('tab2Gup6')}}"></td>
              <td><input type="text" name="prodtbGup6" value="{{ old('prodtbGup6')}}"></td>
              <td><input type="text" name="haatabGup6" value="{{ old('haatabGup6')}}"></td>
              <td><input type="text" name="grtbGup6" value="{{ old('grtbGup6')}}"></td>
              <td><input type="text" name="pesohuevotablaGup6" value="{{ old('pesohuevotablaGup6')}}"></td>
            </tr>
            <tr>
              <td>8</td>
              <td><input type="text" name="tbGup7" value="{{ old('tbGup7')}}"></td>
              <td><input type="text" name="tb1Gup7" value="{{ old('tb1Gup7')}}"></td>
              <td><input type="text" name="tb2Gup7" value="{{ old('tb2Gup7')}}"></td>
              <td><input type="text" name="real4Gup7" value="{{ old('real4Gup7')}}"></td>
              <td><input type="text" name="tab1Gup7" value="{{ old('tab1Gup7')}}"></td>
              <td><input type="text" name="real5Gup7" value="{{ old('real5Gup7')}}"></td>
              <td><input type="text" name="tab2Gup7" value="{{ old('tab2Gup7')}}"></td>
              <td><input type="text" name="prodtbGup7" value="{{ old('prodtbGup7')}}"></td>
              <td><input type="text" name="haatabGup7" value="{{ old('haatabGup7')}}"></td>
              <td><input type="text" name="grtbGup7" value="{{ old('grtbGup7')}}"></td>
              <td><input type="text" name="pesohuevotablaGup7" value="{{ old('pesohuevotablaGup7')}}"></td>
            </tr>
            <tr>
              <td>9</td>
              <td><input type="text" name="tbGup8" value="{{ old('tbGup8')}}"></td>
              <td><input type="text" name="tb1Gup8" value="{{ old('tb1Gup8')}}"></td>
              <td><input type="text" name="tb2Gup8" value="{{ old('tb2Gup8')}}"></td>
              <td><input type="text" name="real4Gup8" value="{{ old('real4Gup8')}}"></td>
              <td><input type="text" name="tab1Gup8" value="{{ old('tab1Gup8')}}"></td>
              <td><input type="text" name="real5Gup8" value="{{ old('real5Gup8')}}"></td>
              <td><input type="text" name="tab2Gup8" value="{{ old('tab2Gup8')}}"></td>
              <td><input type="text" name="prodtbGup8" value="{{ old('prodtbGup8')}}"></td>
              <td><input type="text" name="haatabGup8" value="{{ old('haatabGup8')}}"></td>
              <td><input type="text" name="grtbGup8" value="{{ old('grtbGup8')}}"></td>
              <td><input type="text" name="pesohuevotablaGup8" value="{{ old('pesohuevotablaGup8')}}"></td>
            </tr>
            <tr>
              <td>10</td>
              <td><input type="text" name="tbGup9" value="{{ old('tbGup9')}}"></td>
              <td><input type="text" name="tb1Gup9" value="{{ old('tb1Gup9')}}"></td>
              <td><input type="text" name="tb2Gup9" value="{{ old('tb2Gup9')}}"></td>
              <td><input type="text" name="real4Gup9" value="{{ old('real4Gup9')}}"></td>
              <td><input type="text" name="tab1Gup9" value="{{ old('tab1Gup9')}}"></td>
              <td><input type="text" name="real5Gup9" value="{{ old('real5Gup9')}}"></td>
              <td><input type="text" name="tab2Gup9" value="{{ old('tab2Gup9')}}"></td>
              <td><input type="text" name="prodtbGup9" value="{{ old('prodtbGup9')}}"></td>
              <td><input type="text" name="haatabGup9" value="{{ old('haatabGup9')}}"></td>
              <td><input type="text" name="grtbGup9" value="{{ old('grtbGup9')}}"></td>
              <td><input type="text" name="pesohuevotablaGup9" value="{{ old('pesohuevotablaGup9')}}"></td>
            </tr>
            <tr>
              <td>11</td>
              <td><input type="text" name="tbGup10" value="{{ old('tbGup10')}}"></td>
              <td><input type="text" name="tb1Gup10" value="{{ old('tb1Gup10')}}"></td>
              <td><input type="text" name="tb2Gup10" value="{{ old('tb2Gup10')}}"></td>
              <td><input type="text" name="real4Gup10" value="{{ old('real4Gup10')}}"></td>
              <td><input type="text" name="tab1Gup10" value="{{ old('tab1Gup10')}}"></td>
              <td><input type="text" name="real5Gup10" value="{{ old('real5Gup10')}}"></td>
              <td><input type="text" name="tab2Gup10" value="{{ old('tab2Gup10')}}"></td>
              <td><input type="text" name="prodtbGup10" value="{{ old('prodtbGup10')}}"></td>
              <td><input type="text" name="haatabGup10" value="{{ old('haatabGup10')}}"></td>
              <td><input type="text" name="grtbGup10" value="{{ old('grtbGup10')}}"></td>
              <td><input type="text" name="pesohuevotablaGup10" value="{{ old('pesohuevotablaGup10')}}"></td>
            </tr>
            <tr>
              <td>12</td>
              <td><input type="text" name="tbGup11" value="{{ old('tbGup11')}}"></td>
              <td><input type="text" name="tb1Gup11" value="{{ old('tb1Gup11')}}"></td>
              <td><input type="text" name="tb2Gup11" value="{{ old('tb2Gup11')}}"></td>
              <td><input type="text" name="real4Gup11" value="{{ old('real4Gup11')}}"></td>
              <td><input type="text" name="tab1Gup11" value="{{ old('tab1Gup11')}}"></td>
              <td><input type="text" name="real5Gup11" value="{{ old('real5Gup11')}}"></td>
              <td><input type="text" name="tab2Gup11" value="{{ old('tab2Gup11')}}"></td>
              <td><input type="text" name="prodtbGup11" value="{{ old('prodtbGup11')}}"></td>
              <td><input type="text" name="haatabGup11" value="{{ old('haatabGup11')}}"></td>
              <td><input type="text" name="grtbGup11" value="{{ old('grtbGup11')}}"></td>
              <td><input type="text" name="pesohuevotablaGup11" value="{{ old('pesohuevotablaGup11')}}"></td>
            </tr>
            <tr>
              <td>13</td>
              <td><input type="text" name="tbGup12" value="{{ old('tbGup12')}}"></td>
              <td><input type="text" name="tb1Gup12" value="{{ old('tb1Gup12')}}"></td>
              <td><input type="text" name="tb2Gup12" value="{{ old('tb2Gup12')}}"></td>
              <td><input type="text" name="real4Gup12" value="{{ old('real4Gup12')}}"></td>
              <td><input type="text" name="tab1Gup12" value="{{ old('tab1Gup12')}}"></td>
              <td><input type="text" name="real5Gup12" value="{{ old('real5Gup12')}}"></td>
              <td><input type="text" name="tab2Gup12" value="{{ old('tab2Gup12')}}"></td>
              <td><input type="text" name="prodtbGup12" value="{{ old('prodtbGup12')}}"></td>
              <td><input type="text" name="haatabGup12" value="{{ old('haatabGup12')}}"></td>
              <td><input type="text" name="grtbGup12" value="{{ old('grtbGup12')}}"></td>
              <td><input type="text" name="pesohuevotablaGup12" value="{{ old('pesohuevotablaGup12')}}"></td>
            </tr>
            <tr>
              <td>14</td>
              <td><input type="text" name="tbGup13" value="{{ old('tbGup13')}}"></td>
              <td><input type="text" name="tb1Gup13" value="{{ old('tb1Gup13')}}"></td>
              <td><input type="text" name="tb2Gup13" value="{{ old('tb2Gup13')}}"></td>
              <td><input type="text" name="real4Gup13" value="{{ old('real4Gup13')}}"></td>
              <td><input type="text" name="tab1Gup13" value="{{ old('tab1Gup13')}}"></td>
              <td><input type="text" name="real5Gup13" value="{{ old('real5Gup13')}}"></td>
              <td><input type="text" name="tab2Gup13" value="{{ old('tab2Gup13')}}"></td>
              <td><input type="text" name="prodtbGup13" value="{{ old('prodtbGup13')}}"></td>
              <td><input type="text" name="haatabGup13" value="{{ old('haatabGup13')}}"></td>
              <td><input type="text" name="grtbGup13" value="{{ old('grtbGup13')}}"></td>
              <td><input type="text" name="pesohuevotablaGup13" value="{{ old('pesohuevotablaGup13')}}"></td>
            </tr>
            <tr>
              <td>15</td>
              <td><input type="text" name="tbGup14" value="{{ old('tbGup14')}}"></td>
              <td><input type="text" name="tb1Gup14" value="{{ old('tb1Gup14')}}"></td>
              <td><input type="text" name="tb2Gup14" value="{{ old('tb2Gup14')}}"></td>
              <td><input type="text" name="real4Gup14" value="{{ old('real4Gup14')}}"></td>
              <td><input type="text" name="tab1Gup14" value="{{ old('tab1Gup14')}}"></td>
              <td><input type="text" name="real5Gup14" value="{{ old('real5Gup14')}}"></td>
              <td><input type="text" name="tab2Gup14" value="{{ old('tab2Gup14')}}"></td>
              <td><input type="text" name="prodtbGup14" value="{{ old('prodtbGup14')}}"></td>
              <td><input type="text" name="haatabGup14" value="{{ old('haatabGup14')}}"></td>
              <td><input type="text" name="grtbGup14" value="{{ old('grtbGup14')}}"></td>
              <td><input type="text" name="pesohuevotablaGup14" value="{{ old('pesohuevotablaGup14')}}"></td>
            </tr>
            <tr>
              <td>16</td>
              <td><input type="text" name="tbGup15" value="{{ old('tbGup15')}}"></td>
              <td><input type="text" name="tb1Gup15" value="{{ old('tb1Gup15')}}"></td>
              <td><input type="text" name="tb2Gup15" value="{{ old('tb2Gup15')}}"></td>
              <td><input type="text" name="real4Gup15" value="{{ old('real4Gup15')}}"></td>
              <td><input type="text" name="tab1Gup15" value="{{ old('tab1Gup15')}}"></td>
              <td><input type="text" name="real5Gup15" value="{{ old('real5Gup15')}}"></td>
              <td><input type="text" name="tab2Gup15" value="{{ old('tab2Gup15')}}"></td>
              <td><input type="text" name="prodtbGup15" value="{{ old('prodtbGup15')}}"></td>
              <td><input type="text" name="haatabGup15" value="{{ old('haatabGup15')}}"></td>
              <td><input type="text" name="grtbGup15" value="{{ old('grtbGup15')}}"></td>
              <td><input type="text" name="pesohuevotablaGup15" value="{{ old('pesohuevotablaGup15')}}"></td>
            </tr>
            <tr>
              <td>17</td>
              <td><input type="text" name="tbGup16" value="{{ old('tbGup16')}}"></td>
              <td><input type="text" name="tb1Gup16" value="{{ old('tb1Gup16')}}"></td>
              <td><input type="text" name="tb2Gup16" value="{{ old('tb2Gup16')}}"></td>
              <td><input type="text" name="real4Gup16" value="{{ old('real4Gup16')}}"></td>
              <td><input type="text" name="tab1Gup16" value="{{ old('tab1Gup16')}}"></td>
              <td><input type="text" name="real5Gup16" value="{{ old('real5Gup16')}}"></td>
              <td><input type="text" name="tab2Gup16" value="{{ old('tab2Gup16')}}"></td>
              <td><input type="text" name="prodtbGup16" value="{{ old('prodtbGup16')}}"></td>
              <td><input type="text" name="haatabGup16" value="{{ old('haatabGup16')}}"></td>
              <td><input type="text" name="grtbGup16" value="{{ old('grtbGup16')}}"></td>
              <td><input type="text" name="pesohuevotablaGup16" value="{{ old('pesohuevotablaGup16')}}"></td>
            </tr>
            <tr>
              <td>18</td>
              <td><input type="text" name="tbGup17" value="{{ old('tbGup17')}}"></td>
              <td><input type="text" name="tb1Gup17" value="{{ old('tb1Gup17')}}"></td>
              <td><input type="text" name="tb2Gup17" value="{{ old('tb2Gup17')}}"></td>
              <td><input type="text" name="real4Gup17" value="{{ old('real4Gup17')}}"></td>
              <td><input type="text" name="tab1Gup17" value="{{ old('tab1Gup17')}}"></td>
              <td><input type="text" name="real5Gup17" value="{{ old('real5Gup17')}}"></td>
              <td><input type="text" name="tab2Gup17" value="{{ old('tab2Gup17')}}"></td>
              <td><input type="text" name="prodtbGup17" value="{{ old('prodtbGup17')}}"></td>
              <td><input type="text" name="haatabGup17" value="{{ old('haatabGup17')}}"></td>
              <td><input type="text" name="grtbGup17" value="{{ old('grtbGup17')}}"></td>
              <td><input type="text" name="pesohuevotablaGup17" value="{{ old('pesohuevotablaGup17')}}"></td>
            </tr>
            <tr>
              <td>19</td>
              <td><input type="text" name="tbGup18" value="{{ old('tbGup18')}}"></td>
              <td><input type="text" name="tb1Gup18" value="{{ old('tb1Gup18')}}"></td>
              <td><input type="text" name="tb2Gup18" value="{{ old('tb2Gup18')}}"></td>
              <td><input type="text" name="real4Gup18" value="{{ old('real4Gup18')}}"></td>
              <td><input type="text" name="tab1Gup18" value="{{ old('tab1Gup18')}}"></td>
              <td><input type="text" name="real5Gup18" value="{{ old('real5Gup18')}}"></td>
              <td><input type="text" name="tab2Gup18" value="{{ old('tab2Gup18')}}"></td>
              <td><input type="text" name="prodtbGup18" value="{{ old('prodtbGup18')}}"></td>
              <td><input type="text" name="haatabGup18" value="{{ old('haatabGup18')}}"></td>
              <td><input type="text" name="grtbGup18" value="{{ old('grtbGup18')}}"></td>
              <td><input type="text" name="pesohuevotablaGup18" value="{{ old('pesohuevotablaGup18')}}"></td>
            </tr>
            <tr>
              <td>20</td>
              <td><input type="text" name="tbGup19" value="{{ old('tbGup19')}}"></td>
              <td><input type="text" name="tb1Gup19" value="{{ old('tb1Gup19')}}"></td>
              <td><input type="text" name="tb2Gup19" value="{{ old('tb2Gup19')}}"></td>
              <td><input type="text" name="real4Gup19" value="{{ old('real4Gup19')}}"></td>
              <td><input type="text" name="tab1Gup19" value="{{ old('tab1Gup19')}}"></td>
              <td><input type="text" name="real5Gup19" value="{{ old('real5Gup19')}}"></td>
              <td><input type="text" name="tab2Gup19" value="{{ old('tab2Gup19')}}"></td>
              <td><input type="text" name="prodtbGup19" value="{{ old('prodtbGup19')}}"></td>
              <td><input type="text" name="haatabGup19" value="{{ old('haatabGup19')}}"></td>
              <td><input type="text" name="grtbGup19" value="{{ old('grtbGup19')}}"></td>
              <td><input type="text" name="pesohuevotablaGup19" value="{{ old('pesohuevotablaGup19')}}"></td>
            </tr>
            <tr>
              <td>21</td>
              <td><input type="text" name="tbGup20" value="{{ old('tbGup20')}}"></td>
              <td><input type="text" name="tb1Gup20" value="{{ old('tb1Gup20')}}"></td>
              <td><input type="text" name="tb2Gup20" value="{{ old('tb2Gup20')}}"></td>
              <td><input type="text" name="real4Gup20" value="{{ old('real4Gup20')}}"></td>
              <td><input type="text" name="tab1Gup20" value="{{ old('tab1Gup20')}}"></td>
              <td><input type="text" name="real5Gup20" value="{{ old('real5Gup20')}}"></td>
              <td><input type="text" name="tab2Gup20" value="{{ old('tab2Gup20')}}"></td>
              <td><input type="text" name="prodtbGup20" value="{{ old('prodtbGup20')}}"></td>
              <td><input type="text" name="haatabGup20" value="{{ old('haatabGup20')}}"></td>
              <td><input type="text" name="grtbGup20" value="{{ old('grtbGup20')}}"></td>
              <td><input type="text" name="pesohuevotablaGup20" value="{{ old('pesohuevotablaGup20')}}"></td>
            </tr>
            <tr>
              <td>22</td>
              <td><input type="text" name="tbGup21" value="{{ old('tbGup21')}}"></td>
              <td><input type="text" name="tb1Gup21" value="{{ old('tb1Gup21')}}"></td>
              <td><input type="text" name="tb2Gup21" value="{{ old('tb2Gup21')}}"></td>
              <td><input type="text" name="real4Gup21" value="{{ old('real4Gup21')}}"></td>
              <td><input type="text" name="tab1Gup21" value="{{ old('tab1Gup21')}}"></td>
              <td><input type="text" name="real5Gup21" value="{{ old('real5Gup21')}}"></td>
              <td><input type="text" name="tab2Gup21" value="{{ old('tab2Gup21')}}"></td>
              <td><input type="text" name="prodtbGup21" value="{{ old('prodtbGup21')}}"></td>
              <td><input type="text" name="haatabGup21" value="{{ old('haatabGup21')}}"></td>
              <td><input type="text" name="grtbGup21" value="{{ old('grtbGup21')}}"></td>
              <td><input type="text" name="pesohuevotablaGup21" value="{{ old('pesohuevotablaGup21')}}"></td>
            </tr>
            <tr>
              <td>23</td>
              <td><input type="text" name="tbGup22" value="{{ old('tbGup22')}}"></td>
              <td><input type="text" name="tb1Gup22" value="{{ old('tb1Gup22')}}"></td>
              <td><input type="text" name="tb2Gup22" value="{{ old('tb2Gup22')}}"></td>
              <td><input type="text" name="real4Gup22" value="{{ old('real4Gup22')}}"></td>
              <td><input type="text" name="tab1Gup22" value="{{ old('tab1Gup22')}}"></td>
              <td><input type="text" name="real5Gup22" value="{{ old('real5Gup22')}}"></td>
              <td><input type="text" name="tab2Gup22" value="{{ old('tab2Gup22')}}"></td>
              <td><input type="text" name="prodtbGup22" value="{{ old('prodtbGup22')}}"></td>
              <td><input type="text" name="haatabGup22" value="{{ old('haatabGup22')}}"></td>
              <td><input type="text" name="grtbGup22" value="{{ old('grtbGup22')}}"></td>
              <td><input type="text" name="pesohuevotablaGup22" value="{{ old('pesohuevotablaGup22')}}"></td>
            </tr>
            <tr>
              <td>24</td>
              <td><input type="text" name="tbGup23" value="{{ old('tbGup23')}}"></td>
              <td><input type="text" name="tb1Gup23" value="{{ old('tb1Gup23')}}"></td>
              <td><input type="text" name="tb2Gup23" value="{{ old('tb2Gup23')}}"></td>
              <td><input type="text" name="real4Gup23" value="{{ old('real4Gup23')}}"></td>
              <td><input type="text" name="tab1Gup23" value="{{ old('tab1Gup23')}}"></td>
              <td><input type="text" name="real5Gup23" value="{{ old('real5Gup23')}}"></td>
              <td><input type="text" name="tab2Gup23" value="{{ old('tab2Gup23')}}"></td>
              <td><input type="text" name="prodtbGup23" value="{{ old('prodtbGup23')}}"></td>
              <td><input type="text" name="haatabGup23" value="{{ old('haatabGup23')}}"></td>
              <td><input type="text" name="grtbGup23" value="{{ old('grtbGup23')}}"></td>
              <td><input type="text" name="pesohuevotablaGup23" value="{{ old('pesohuevotablaGup23')}}"></td>
            </tr>
            <tr>
              <td>25</td>
              <td><input type="text" name="tbGup24" value="{{ old('tbGup24')}}"></td>
              <td><input type="text" name="tb1Gup24" value="{{ old('tb1Gup24')}}"></td>
              <td><input type="text" name="tb2Gup24" value="{{ old('tb2Gup24')}}"></td>
              <td><input type="text" name="real4Gup24" value="{{ old('real4Gup24')}}"></td>
              <td><input type="text" name="tab1Gup24" value="{{ old('tab1Gup24')}}"></td>
              <td><input type="text" name="real5Gup24" value="{{ old('real5Gup24')}}"></td>
              <td><input type="text" name="tab2Gup24" value="{{ old('tab2Gup24')}}"></td>
              <td><input type="text" name="prodtbGup24" value="{{ old('prodtbGup24')}}"></td>
              <td><input type="text" name="haatabGup24" value="{{ old('haatabGup24')}}"></td>
              <td><input type="text" name="grtbGup24" value="{{ old('grtbGup24')}}"></td>
              <td><input type="text" name="pesohuevotablaGup24" value="{{ old('pesohuevotablaGup24')}}"></td>
            </tr>
            <tr>
              <td>26</td>
              <td><input type="text" name="tbGup25" value="{{ old('tbGup25')}}"></td>
              <td><input type="text" name="tb1Gup25" value="{{ old('tb1Gup25')}}"></td>
              <td><input type="text" name="tb2Gup25" value="{{ old('tb2Gup25')}}"></td>
              <td><input type="text" name="real4Gup25" value="{{ old('real4Gup25')}}"></td>
              <td><input type="text" name="tab1Gup25" value="{{ old('tab1Gup25')}}"></td>
              <td><input type="text" name="real5Gup25" value="{{ old('real5Gup25')}}"></td>
              <td><input type="text" name="tab2Gup25" value="{{ old('tab2Gup25')}}"></td>
              <td><input type="text" name="prodtbGup25" value="{{ old('prodtbGup25')}}"></td>
              <td><input type="text" name="haatabGup25" value="{{ old('haatabGup25')}}"></td>
              <td><input type="text" name="grtbGup25" value="{{ old('grtbGup25')}}"></td>
              <td><input type="text" name="pesohuevotablaGup25" value="{{ old('pesohuevotablaGup25')}}"></td>
            </tr>
            <tr>
              <td>27</td>
              <td><input type="text" name="tbGup26" value="{{ old('tbGup26')}}"></td>
              <td><input type="text" name="tb1Gup26" value="{{ old('tb1Gup26')}}"></td>
              <td><input type="text" name="tb2Gup26" value="{{ old('tb2Gup26')}}"></td>
              <td><input type="text" name="real4Gup26" value="{{ old('real4Gup26')}}"></td>
              <td><input type="text" name="tab1Gup26" value="{{ old('tab1Gup26')}}"></td>
              <td><input type="text" name="real5Gup26" value="{{ old('real5Gup26')}}"></td>
              <td><input type="text" name="tab2Gup26" value="{{ old('tab2Gup26')}}"></td>
              <td><input type="text" name="prodtbGup26" value="{{ old('prodtbGup26')}}"></td>
              <td><input type="text" name="haatabGup26" value="{{ old('haatabGup26')}}"></td>
              <td><input type="text" name="grtbGup26" value="{{ old('grtbGup26')}}"></td>
              <td><input type="text" name="pesohuevotablaGup26" value="{{ old('pesohuevotablaGup26')}}"></td>
            </tr>
            <tr>
              <td>28</td>
              <td><input type="text" name="tbGup27" value="{{ old('tbGup27')}}"></td>
              <td><input type="text" name="tb1Gup27" value="{{ old('tb1Gup27')}}"></td>
              <td><input type="text" name="tb2Gup27" value="{{ old('tb2Gup27')}}"></td>
              <td><input type="text" name="real4Gup27" value="{{ old('real4Gup27')}}"></td>
              <td><input type="text" name="tab1Gup27" value="{{ old('tab1Gup27')}}"></td>
              <td><input type="text" name="real5Gup27" value="{{ old('real5Gup27')}}"></td>
              <td><input type="text" name="tab2Gup27" value="{{ old('tab2Gup27')}}"></td>
              <td><input type="text" name="prodtbGup27" value="{{ old('prodtbGup27')}}"></td>
              <td><input type="text" name="haatabGup27" value="{{ old('haatabGup27')}}"></td>
              <td><input type="text" name="grtbGup27" value="{{ old('grtbGup27')}}"></td>
              <td><input type="text" name="pesohuevotablaGup27" value="{{ old('pesohuevotablaGup27')}}"></td>
            </tr>
            <tr>
              <td>29</td>
              <td><input type="text" name="tbGup28" value="{{ old('tbGup28')}}"></td>
              <td><input type="text" name="tb1Gup28" value="{{ old('tb1Gup28')}}"></td>
              <td><input type="text" name="tb2Gup28" value="{{ old('tb2Gup28')}}"></td>
              <td><input type="text" name="real4Gup28" value="{{ old('real4Gup28')}}"></td>
              <td><input type="text" name="tab1Gup28" value="{{ old('tab1Gup28')}}"></td>
              <td><input type="text" name="real5Gup28" value="{{ old('real5Gup28')}}"></td>
              <td><input type="text" name="tab2Gup28" value="{{ old('tab2Gup28')}}"></td>
              <td><input type="text" name="prodtbGup28" value="{{ old('prodtbGup28')}}"></td>
              <td><input type="text" name="haatabGup28" value="{{ old('haatabGup28')}}"></td>
              <td><input type="text" name="grtbGup28" value="{{ old('grtbGup28')}}"></td>
              <td><input type="text" name="pesohuevotablaGup28" value="{{ old('pesohuevotablaGup28')}}"></td>
            </tr>
            <tr>
              <td>30</td>
              <td><input type="text" name="tbGup29" value="{{ old('tbGup29')}}"></td>
              <td><input type="text" name="tb1Gup29" value="{{ old('tb1Gup29')}}"></td>
              <td><input type="text" name="tb2Gup29" value="{{ old('tb2Gup29')}}"></td>
              <td><input type="text" name="real4Gup29" value="{{ old('real4Gup29')}}"></td>
              <td><input type="text" name="tab1Gup29" value="{{ old('tab1Gup29')}}"></td>
              <td><input type="text" name="real5Gup29" value="{{ old('real5Gup29')}}"></td>
              <td><input type="text" name="tab2Gup29" value="{{ old('tab2Gup29')}}"></td>
              <td><input type="text" name="prodtbGup29" value="{{ old('prodtbGup29')}}"></td>
              <td><input type="text" name="haatabGup29" value="{{ old('haatabGup29')}}"></td>
              <td><input type="text" name="grtbGup29" value="{{ old('grtbGup29')}}"></td>
              <td><input type="text" name="pesohuevotablaGup29" value="{{ old('pesohuevotablaGup29')}}"></td>
            </tr>
            <tr>
              <td>31</td>
              <td><input type="text" name="tbGup30" value="{{ old('tbGup30')}}"></td>
              <td><input type="text" name="tb1Gup30" value="{{ old('tb1Gup30')}}"></td>
              <td><input type="text" name="tb2Gup30" value="{{ old('tb2Gup30')}}"></td>
              <td><input type="text" name="real4Gup30" value="{{ old('real4Gup30')}}"></td>
              <td><input type="text" name="tab1Gup30" value="{{ old('tab1Gup30')}}"></td>
              <td><input type="text" name="real5Gup30" value="{{ old('real5Gup30')}}"></td>
              <td><input type="text" name="tab2Gup30" value="{{ old('tab2Gup30')}}"></td>
              <td><input type="text" name="prodtbGup30" value="{{ old('prodtbGup30')}}"></td>
              <td><input type="text" name="haatabGup30" value="{{ old('haatabGup30')}}"></td>
              <td><input type="text" name="grtbGup30" value="{{ old('grtbGup30')}}"></td>
              <td><input type="text" name="pesohuevotablaGup30" value="{{ old('pesohuevotablaGup30')}}"></td>
            </tr>
            <tr>
              <td>32</td>
              <td><input type="text" name="tbGup31" value="{{ old('tbGup31')}}"></td>
              <td><input type="text" name="tb1Gup31" value="{{ old('tb1Gup31')}}"></td>
              <td><input type="text" name="tb2Gup31" value="{{ old('tb2Gup31')}}"></td>
              <td><input type="text" name="real4Gup31" value="{{ old('real4Gup31')}}"></td>
              <td><input type="text" name="tab1Gup31" value="{{ old('tab1Gup31')}}"></td>
              <td><input type="text" name="real5Gup31" value="{{ old('real5Gup31')}}"></td>
              <td><input type="text" name="tab2Gup31" value="{{ old('tab2Gup31')}}"></td>
              <td><input type="text" name="prodtbGup31" value="{{ old('prodtbGup31')}}"></td>
              <td><input type="text" name="haatabGup31" value="{{ old('haatabGup31')}}"></td>
              <td><input type="text" name="grtbGup31" value="{{ old('grtbGup31')}}"></td>
              <td><input type="text" name="pesohuevotablaGup31" value="{{ old('pesohuevotablaGup31')}}"></td>
            </tr>
            <tr>
              <td>33</td>
              <td><input type="text" name="tbGup32" value="{{ old('tbGup32')}}"></td>
              <td><input type="text" name="tb1Gup32" value="{{ old('tb1Gup32')}}"></td>
              <td><input type="text" name="tb2Gup32" value="{{ old('tb2Gup32')}}"></td>
              <td><input type="text" name="real4Gup32" value="{{ old('real4Gup32')}}"></td>
              <td><input type="text" name="tab1Gup32" value="{{ old('tab1Gup32')}}"></td>
              <td><input type="text" name="real5Gup32" value="{{ old('real5Gup32')}}"></td>
              <td><input type="text" name="tab2Gup32" value="{{ old('tab2Gup32')}}"></td>
              <td><input type="text" name="prodtbGup32" value="{{ old('prodtbGup32')}}"></td>
              <td><input type="text" name="haatabGup32" value="{{ old('haatabGup32')}}"></td>
              <td><input type="text" name="grtbGup32" value="{{ old('grtbGup32')}}"></td>
              <td><input type="text" name="pesohuevotablaGup32" value="{{ old('pesohuevotablaGup32')}}"></td>
            </tr>
            <tr>
              <td>34</td>
              <td><input type="text" name="tbGup33" value="{{ old('tbGup33')}}"></td>
              <td><input type="text" name="tb1Gup33" value="{{ old('tb1Gup33')}}"></td>
              <td><input type="text" name="tb2Gup33" value="{{ old('tb2Gup33')}}"></td>
              <td><input type="text" name="real4Gup33" value="{{ old('real4Gup33')}}"></td>
              <td><input type="text" name="tab1Gup33" value="{{ old('tab1Gup33')}}"></td>
              <td><input type="text" name="real5Gup33" value="{{ old('real5Gup33')}}"></td>
              <td><input type="text" name="tab2Gup33" value="{{ old('tab2Gup33')}}"></td>
              <td><input type="text" name="prodtbGup33" value="{{ old('prodtbGup33')}}"></td>
              <td><input type="text" name="haatabGup33" value="{{ old('haatabGup33')}}"></td>
              <td><input type="text" name="grtbGup33" value="{{ old('grtbGup33')}}"></td>
              <td><input type="text" name="pesohuevotablaGup33" value="{{ old('pesohuevotablaGup33')}}"></td>
            </tr>
            <tr>
              <td>35</td>
              <td><input type="text" name="tbGup34" value="{{ old('tbGup34')}}"></td>
              <td><input type="text" name="tb1Gup34" value="{{ old('tb1Gup34')}}"></td>
              <td><input type="text" name="tb2Gup34" value="{{ old('tb2Gup34')}}"></td>
              <td><input type="text" name="real4Gup34" value="{{ old('real4Gup34')}}"></td>
              <td><input type="text" name="tab1Gup34" value="{{ old('tab1Gup34')}}"></td>
              <td><input type="text" name="real5Gup34" value="{{ old('real5Gup34')}}"></td>
              <td><input type="text" name="tab2Gup34" value="{{ old('tab2Gup34')}}"></td>
              <td><input type="text" name="prodtbGup34" value="{{ old('prodtbGup34')}}"></td>
              <td><input type="text" name="haatabGup34" value="{{ old('haatabGup34')}}"></td>
              <td><input type="text" name="grtbGup34" value="{{ old('grtbGup34')}}"></td>
              <td><input type="text" name="pesohuevotablaGup34" value="{{ old('pesohuevotablaGup34')}}"></td>
            </tr>
            <tr>
              <td>36</td>
              <td><input type="text" name="tbGup35" value="{{ old('tbGup35')}}"></td>
              <td><input type="text" name="tb1Gup35" value="{{ old('tb1Gup35')}}"></td>
              <td><input type="text" name="tb2Gup35" value="{{ old('tb2Gup35')}}"></td>
              <td><input type="text" name="real4Gup35" value="{{ old('real4Gup35')}}"></td>
              <td><input type="text" name="tab1Gup35" value="{{ old('tab1Gup35')}}"></td>
              <td><input type="text" name="real5Gup35" value="{{ old('real5Gup35')}}"></td>
              <td><input type="text" name="tab2Gup35" value="{{ old('tab2Gup35')}}"></td>
              <td><input type="text" name="prodtbGup35" value="{{ old('prodtbGup35')}}"></td>
              <td><input type="text" name="haatabGup35" value="{{ old('haatabGup35')}}"></td>
              <td><input type="text" name="grtbGup35" value="{{ old('grtbGup35')}}"></td>
              <td><input type="text" name="pesohuevotablaGup35" value="{{ old('pesohuevotablaGup35')}}"></td>
            </tr>
            <tr>
              <td>37</td>
              <td><input type="text" name="tbGup36" value="{{ old('tbGup36')}}"></td>
              <td><input type="text" name="tb1Gup36" value="{{ old('tb1Gup36')}}"></td>
              <td><input type="text" name="tb2Gup36" value="{{ old('tb2Gup36')}}"></td>
              <td><input type="text" name="real4Gup36" value="{{ old('real4Gup36')}}"></td>
              <td><input type="text" name="tab1Gup36" value="{{ old('tab1Gup36')}}"></td>
              <td><input type="text" name="real5Gup36" value="{{ old('real5Gup36')}}"></td>
              <td><input type="text" name="tab2Gup36" value="{{ old('tab2Gup36')}}"></td>
              <td><input type="text" name="prodtbGup36" value="{{ old('prodtbGup36')}}"></td>
              <td><input type="text" name="haatabGup36" value="{{ old('haatabGup36')}}"></td>
              <td><input type="text" name="grtbGup36" value="{{ old('grtbGup36')}}"></td>
              <td><input type="text" name="pesohuevotablaGup36" value="{{ old('pesohuevotablaGup36')}}"></td>
            </tr>
            <tr>
              <td>38</td>
              <td><input type="text" name="tbGup37" value="{{ old('tbGup37')}}"></td>
              <td><input type="text" name="tb1Gup37" value="{{ old('tb1Gup37')}}"></td>
              <td><input type="text" name="tb2Gup37" value="{{ old('tb2Gup37')}}"></td>
              <td><input type="text" name="real4Gup37" value="{{ old('real4Gup37')}}"></td>
              <td><input type="text" name="tab1Gup37" value="{{ old('tab1Gup37')}}"></td>
              <td><input type="text" name="real5Gup37" value="{{ old('real5Gup37')}}"></td>
              <td><input type="text" name="tab2Gup37" value="{{ old('tab2Gup37')}}"></td>
              <td><input type="text" name="prodtbGup37" value="{{ old('prodtbGup37')}}"></td>
              <td><input type="text" name="haatabGup37" value="{{ old('haatabGup37')}}"></td>
              <td><input type="text" name="grtbGup37" value="{{ old('grtbGup37')}}"></td>
              <td><input type="text" name="pesohuevotablaGup37" value="{{ old('pesohuevotablaGup37')}}"></td>
            </tr>
            <tr>
              <td>39</td>
              <td><input type="text" name="tbGup38" value="{{ old('tbGup38')}}"></td>
              <td><input type="text" name="tb1Gup38" value="{{ old('tb1Gup38')}}"></td>
              <td><input type="text" name="tb2Gup38" value="{{ old('tb2Gup38')}}"></td>
              <td><input type="text" name="real4Gup38" value="{{ old('real4Gup38')}}"></td>
              <td><input type="text" name="tab1Gup38" value="{{ old('tab1Gup38')}}"></td>
              <td><input type="text" name="real5Gup38" value="{{ old('real5Gup38')}}"></td>
              <td><input type="text" name="tab2Gup38" value="{{ old('tab2Gup38')}}"></td>
              <td><input type="text" name="prodtbGup38" value="{{ old('prodtbGup38')}}"></td>
              <td><input type="text" name="haatabGup38" value="{{ old('haatabGup38')}}"></td>
              <td><input type="text" name="grtbGup38" value="{{ old('grtbGup38')}}"></td>
              <td><input type="text" name="pesohuevotablaGup38" value="{{ old('pesohuevotablaGup38')}}"></td>
            </tr>
            <tr>
              <td>40</td>
              <td><input type="text" name="tbGup39" value="{{ old('tbGup39')}}"></td>
              <td><input type="text" name="tb1Gup39" value="{{ old('tb1Gup39')}}"></td>
              <td><input type="text" name="tb2Gup39" value="{{ old('tb2Gup39')}}"></td>
              <td><input type="text" name="real4Gup39" value="{{ old('real4Gup39')}}"></td>
              <td><input type="text" name="tab1Gup39" value="{{ old('tab1Gup39')}}"></td>
              <td><input type="text" name="real5Gup39" value="{{ old('real5Gup39')}}"></td>
              <td><input type="text" name="tab2Gup39" value="{{ old('tab2Gup39')}}"></td>
              <td><input type="text" name="prodtbGup39" value="{{ old('prodtbGup39')}}"></td>
              <td><input type="text" name="haatabGup39" value="{{ old('haatabGup39')}}"></td>
              <td><input type="text" name="grtbGup39" value="{{ old('grtbGup39')}}"></td>
              <td><input type="text" name="pesohuevotablaGup39" value="{{ old('pesohuevotablaGup39')}}"></td>
            </tr>
            <tr>
              <td>41</td>
              <td><input type="text" name="tbGup40" value="{{ old('tbGup40')}}"></td>
              <td><input type="text" name="tb1Gup40" value="{{ old('tb1Gup40')}}"></td>
              <td><input type="text" name="tb2Gup40" value="{{ old('tb2Gup40')}}"></td>
              <td><input type="text" name="real4Gup40" value="{{ old('real4Gup40')}}"></td>
              <td><input type="text" name="tab1Gup40" value="{{ old('tab1Gup40')}}"></td>
              <td><input type="text" name="real5Gup40" value="{{ old('real5Gup40')}}"></td>
              <td><input type="text" name="tab2Gup40" value="{{ old('tab2Gup40')}}"></td>
              <td><input type="text" name="prodtbGup40" value="{{ old('prodtbGup40')}}"></td>
              <td><input type="text" name="haatabGup40" value="{{ old('haatabGup40')}}"></td>
              <td><input type="text" name="grtbGup40" value="{{ old('grtbGup40')}}"></td>
              <td><input type="text" name="pesohuevotablaGup40" value="{{ old('pesohuevotablaGup40')}}"></td>
            </tr>
            <tr>
              <td>42</td>
              <td><input type="text" name="tbGup41" value="{{ old('tbGup41')}}"></td>
              <td><input type="text" name="tb1Gup41" value="{{ old('tb1Gup41')}}"></td>
              <td><input type="text" name="tb2Gup41" value="{{ old('tb2Gup41')}}"></td>
              <td><input type="text" name="real4Gup41" value="{{ old('real4Gup41')}}"></td>
              <td><input type="text" name="tab1Gup41" value="{{ old('tab1Gup41')}}"></td>
              <td><input type="text" name="real5Gup41" value="{{ old('real5Gup41')}}"></td>
              <td><input type="text" name="tab2Gup41" value="{{ old('tab2Gup41')}}"></td>
              <td><input type="text" name="prodtbGup41" value="{{ old('prodtbGup41')}}"></td>
              <td><input type="text" name="haatabGup41" value="{{ old('haatabGup41')}}"></td>
              <td><input type="text" name="grtbGup41" value="{{ old('grtbGup41')}}"></td>
              <td><input type="text" name="pesohuevotablaGup41" value="{{ old('pesohuevotablaGup41')}}"></td>
            </tr>
            <tr>
              <td>43</td>
              <td><input type="text" name="tbGup42" value="{{ old('tbGup42')}}"></td>
              <td><input type="text" name="tb1Gup42" value="{{ old('tb1Gup42')}}"></td>
              <td><input type="text" name="tb2Gup42" value="{{ old('tb2Gup42')}}"></td>
              <td><input type="text" name="real4Gup42" value="{{ old('real4Gup42')}}"></td>
              <td><input type="text" name="tab1Gup42" value="{{ old('tab1Gup42')}}"></td>
              <td><input type="text" name="real5Gup42" value="{{ old('real5Gup42')}}"></td>
              <td><input type="text" name="tab2Gup42" value="{{ old('tab2Gup42')}}"></td>
              <td><input type="text" name="prodtbGup42" value="{{ old('prodtbGup42')}}"></td>
              <td><input type="text" name="haatabGup42" value="{{ old('haatabGup42')}}"></td>
              <td><input type="text" name="grtbGup42" value="{{ old('grtbGup42')}}"></td>
              <td><input type="text" name="pesohuevotablaGup42" value="{{ old('pesohuevotablaGup42')}}"></td>
            </tr>
            <tr>
              <td>44</td>
              <td><input type="text" name="tbGup43" value="{{ old('tbGup43')}}"></td>
              <td><input type="text" name="tb1Gup43" value="{{ old('tb1Gup43')}}"></td>
              <td><input type="text" name="tb2Gup43" value="{{ old('tb2Gup43')}}"></td>
              <td><input type="text" name="real4Gup43" value="{{ old('real4Gup43')}}"></td>
              <td><input type="text" name="tab1Gup43" value="{{ old('tab1Gup43')}}"></td>
              <td><input type="text" name="real5Gup43" value="{{ old('real5Gup43')}}"></td>
              <td><input type="text" name="tab2Gup43" value="{{ old('tab2Gup43')}}"></td>
              <td><input type="text" name="prodtbGup43" value="{{ old('prodtbGup43')}}"></td>
              <td><input type="text" name="haatabGup43" value="{{ old('haatabGup43')}}"></td>
              <td><input type="text" name="grtbGup43" value="{{ old('grtbGup43')}}"></td>
              <td><input type="text" name="pesohuevotablaGup43" value="{{ old('pesohuevotablaGup43')}}"></td>
            </tr>
            <tr>
              <td>45</td>
              <td><input type="text" name="tbGup44" value="{{ old('tbGup44')}}"></td>
              <td><input type="text" name="tb1Gup44" value="{{ old('tb1Gup44')}}"></td>
              <td><input type="text" name="tb2Gup44" value="{{ old('tb2Gup44')}}"></td>
              <td><input type="text" name="real4Gup44" value="{{ old('real4Gup44')}}"></td>
              <td><input type="text" name="tab1Gup44" value="{{ old('tab1Gup44')}}"></td>
              <td><input type="text" name="real5Gup44" value="{{ old('real5Gup44')}}"></td>
              <td><input type="text" name="tab2Gup44" value="{{ old('tab2Gup44')}}"></td>
              <td><input type="text" name="prodtbGup44" value="{{ old('prodtbGup44')}}"></td>
              <td><input type="text" name="haatabGup44" value="{{ old('haatabGup44')}}"></td>
              <td><input type="text" name="grtbGup44" value="{{ old('grtbGup44')}}"></td>
              <td><input type="text" name="pesohuevotablaGup44" value="{{ old('pesohuevotablaGup44')}}"></td>
            </tr>
            <tr>
              <td>46</td>
              <td><input type="text" name="tbGup45" value="{{ old('tbGup45')}}"></td>
              <td><input type="text" name="tb1Gup45" value="{{ old('tb1Gup45')}}"></td>
              <td><input type="text" name="tb2Gup45" value="{{ old('tb2Gup45')}}"></td>
              <td><input type="text" name="real4Gup45" value="{{ old('real4Gup45')}}"></td>
              <td><input type="text" name="tab1Gup45" value="{{ old('tab1Gup45')}}"></td>
              <td><input type="text" name="real5Gup45" value="{{ old('real5Gup45')}}"></td>
              <td><input type="text" name="tab2Gup45" value="{{ old('tab2Gup45')}}"></td>
              <td><input type="text" name="prodtbGup45" value="{{ old('prodtbGup45')}}"></td>
              <td><input type="text" name="haatabGup45" value="{{ old('haatabGup45')}}"></td>
              <td><input type="text" name="grtbGup45" value="{{ old('grtbGup45')}}"></td>
              <td><input type="text" name="pesohuevotablaGup45" value="{{ old('pesohuevotablaGup45')}}"></td>
            </tr>
            <tr>
              <td>47</td>
              <td><input type="text" name="tbGup46" value="{{ old('tbGup46')}}"></td>
              <td><input type="text" name="tb1Gup46" value="{{ old('tb1Gup46')}}"></td>
              <td><input type="text" name="tb2Gup46" value="{{ old('tb2Gup46')}}"></td>
              <td><input type="text" name="real4Gup46" value="{{ old('real4Gup46')}}"></td>
              <td><input type="text" name="tab1Gup46" value="{{ old('tab1Gup46')}}"></td>
              <td><input type="text" name="real5Gup46" value="{{ old('real5Gup46')}}"></td>
              <td><input type="text" name="tab2Gup46" value="{{ old('tab2Gup46')}}"></td>
              <td><input type="text" name="prodtbGup46" value="{{ old('prodtbGup46')}}"></td>
              <td><input type="text" name="haatabGup46" value="{{ old('haatabGup46')}}"></td>
              <td><input type="text" name="grtbGup46" value="{{ old('grtbGup46')}}"></td>
              <td><input type="text" name="pesohuevotablaGup46" value="{{ old('pesohuevotablaGup46')}}"></td>
            </tr>
            <tr>
              <td>48</td>
              <td><input type="text" name="tbGup47" value="{{ old('tbGup47')}}"></td>
              <td><input type="text" name="tb1Gup47" value="{{ old('tb1Gup47')}}"></td>
              <td><input type="text" name="tb2Gup47" value="{{ old('tb2Gup47')}}"></td>
              <td><input type="text" name="real4Gup47" value="{{ old('real4Gup47')}}"></td>
              <td><input type="text" name="tab1Gup47" value="{{ old('tab1Gup47')}}"></td>
              <td><input type="text" name="real5Gup47" value="{{ old('real5Gup47')}}"></td>
              <td><input type="text" name="tab2Gup47" value="{{ old('tab2Gup47')}}"></td>
              <td><input type="text" name="prodtbGup47" value="{{ old('prodtbGup47')}}"></td>
              <td><input type="text" name="haatabGup47" value="{{ old('haatabGup47')}}"></td>
              <td><input type="text" name="grtbGup47" value="{{ old('grtbGup47')}}"></td>
              <td><input type="text" name="pesohuevotablaGup47" value="{{ old('pesohuevotablaGup47')}}"></td>
            </tr>
            <tr>
              <td>49</td>
              <td><input type="text" name="tbGup48" value="{{ old('tbGup48')}}"></td>
              <td><input type="text" name="tb1Gup48" value="{{ old('tb1Gup48')}}"></td>
              <td><input type="text" name="tb2Gup48" value="{{ old('tb2Gup48')}}"></td>
              <td><input type="text" name="real4Gup48" value="{{ old('real4Gup48')}}"></td>
              <td><input type="text" name="tab1Gup48" value="{{ old('tab1Gup48')}}"></td>
              <td><input type="text" name="real5Gup48" value="{{ old('real5Gup48')}}"></td>
              <td><input type="text" name="tab2Gup48" value="{{ old('tab2Gup48')}}"></td>
              <td><input type="text" name="prodtbGup48" value="{{ old('prodtbGup48')}}"></td>
              <td><input type="text" name="haatabGup48" value="{{ old('haatabGup48')}}"></td>
              <td><input type="text" name="grtbGup48" value="{{ old('grtbGup48')}}"></td>
              <td><input type="text" name="pesohuevotablaGup48" value="{{ old('pesohuevotablaGup48')}}"></td>
            </tr>
            <tr>
              <td>50</td>
              <td><input type="text" name="tbGup49" value="{{ old('tbGup49')}}"></td>
              <td><input type="text" name="tb1Gup49" value="{{ old('tb1Gup49')}}"></td>
              <td><input type="text" name="tb2Gup49" value="{{ old('tb2Gup49')}}"></td>
              <td><input type="text" name="real4Gup49" value="{{ old('real4Gup49')}}"></td>
              <td><input type="text" name="tab1Gup49" value="{{ old('tab1Gup49')}}"></td>
              <td><input type="text" name="real5Gup49" value="{{ old('real5Gup49')}}"></td>
              <td><input type="text" name="tab2Gup49" value="{{ old('tab2Gup49')}}"></td>
              <td><input type="text" name="prodtbGup49" value="{{ old('prodtbGup49')}}"></td>
              <td><input type="text" name="haatabGup49" value="{{ old('haatabGup49')}}"></td>
              <td><input type="text" name="grtbGup49" value="{{ old('grtbGup49')}}"></td>
              <td><input type="text" name="pesohuevotablaGup49" value="{{ old('pesohuevotablaGup49')}}"></td>
            </tr>
            <tr>
              <td>51</td>
              <td><input type="text" name="tbGup50" value="{{ old('tbGup50')}}"></td>
              <td><input type="text" name="tb1Gup50" value="{{ old('tb1Gup50')}}"></td>
              <td><input type="text" name="tb2Gup50" value="{{ old('tb2Gup50')}}"></td>
              <td><input type="text" name="real4Gup50" value="{{ old('real4Gup50')}}"></td>
              <td><input type="text" name="tab1Gup50" value="{{ old('tab1Gup50')}}"></td>
              <td><input type="text" name="real5Gup50" value="{{ old('real5Gup50')}}"></td>
              <td><input type="text" name="tab2Gup50" value="{{ old('tab2Gup50')}}"></td>
              <td><input type="text" name="prodtbGup50" value="{{ old('prodtbGup50')}}"></td>
              <td><input type="text" name="haatabGup50" value="{{ old('haatabGup50')}}"></td>
              <td><input type="text" name="grtbGup50" value="{{ old('grtbGup50')}}"></td>
              <td><input type="text" name="pesohuevotablaGup50" value="{{ old('pesohuevotablaGup50')}}"></td>
            </tr>
            <tr>
              <td>52</td>
              <td><input type="text" name="tbGup51" value="{{ old('tbGup51')}}"></td>
              <td><input type="text" name="tb1Gup51" value="{{ old('tb1Gup51')}}"></td>
              <td><input type="text" name="tb2Gup51" value="{{ old('tb2Gup51')}}"></td>
              <td><input type="text" name="real4Gup51" value="{{ old('real4Gup51')}}"></td>
              <td><input type="text" name="tab1Gup51" value="{{ old('tab1Gup51')}}"></td>
              <td><input type="text" name="real5Gup51" value="{{ old('real5Gup51')}}"></td>
              <td><input type="text" name="tab2Gup51" value="{{ old('tab2Gup51')}}"></td>
              <td><input type="text" name="prodtbGup51" value="{{ old('prodtbGup51')}}"></td>
              <td><input type="text" name="haatabGup51" value="{{ old('haatabGup51')}}"></td>
              <td><input type="text" name="grtbGup51" value="{{ old('grtbGup51')}}"></td>
              <td><input type="text" name="pesohuevotablaGup51" value="{{ old('pesohuevotablaGup51')}}"></td>
            </tr>
            <tr>
              <td>53</td>
              <td><input type="text" name="tbGup52" value="{{ old('tbGup52')}}"></td>
              <td><input type="text" name="tb1Gup52" value="{{ old('tb1Gup52')}}"></td>
              <td><input type="text" name="tb2Gup52" value="{{ old('tb2Gup52')}}"></td>
              <td><input type="text" name="real4Gup52" value="{{ old('real4Gup52')}}"></td>
              <td><input type="text" name="tab1Gup52" value="{{ old('tab1Gup52')}}"></td>
              <td><input type="text" name="real5Gup52" value="{{ old('real5Gup52')}}"></td>
              <td><input type="text" name="tab2Gup52" value="{{ old('tab2Gup52')}}"></td>
              <td><input type="text" name="prodtbGup52" value="{{ old('prodtbGup52')}}"></td>
              <td><input type="text" name="haatabGup52" value="{{ old('haatabGup52')}}"></td>
              <td><input type="text" name="grtbGup52" value="{{ old('grtbGup52')}}"></td>
              <td><input type="text" name="pesohuevotablaGup52" value="{{ old('pesohuevotablaGup52')}}"></td>
            </tr>
            <tr>
              <td>54</td>
              <td><input type="text" name="tbGup53" value="{{ old('tbGup53')}}"></td>
              <td><input type="text" name="tb1Gup53" value="{{ old('tb1Gup53')}}"></td>
              <td><input type="text" name="tb2Gup53" value="{{ old('tb2Gup53')}}"></td>
              <td><input type="text" name="real4Gup53" value="{{ old('real4Gup53')}}"></td>
              <td><input type="text" name="tab1Gup53" value="{{ old('tab1Gup53')}}"></td>
              <td><input type="text" name="real5Gup53" value="{{ old('real5Gup53')}}"></td>
              <td><input type="text" name="tab2Gup53" value="{{ old('tab2Gup53')}}"></td>
              <td><input type="text" name="prodtbGup53" value="{{ old('prodtbGup53')}}"></td>
              <td><input type="text" name="haatabGup53" value="{{ old('haatabGup53')}}"></td>
              <td><input type="text" name="grtbGup53" value="{{ old('grtbGup53')}}"></td>
              <td><input type="text" name="pesohuevotablaGup53" value="{{ old('pesohuevotablaGup53')}}"></td>
            </tr>
            <tr>
              <td>55</td>
              <td><input type="text" name="tbGup54" value="{{ old('tbGup54')}}"></td>
              <td><input type="text" name="tb1Gup54" value="{{ old('tb1Gup54')}}"></td>
              <td><input type="text" name="tb2Gup54" value="{{ old('tb2Gup54')}}"></td>
              <td><input type="text" name="real4Gup54" value="{{ old('real4Gup54')}}"></td>
              <td><input type="text" name="tab1Gup54" value="{{ old('tab1Gup54')}}"></td>
              <td><input type="text" name="real5Gup54" value="{{ old('real5Gup54')}}"></td>
              <td><input type="text" name="tab2Gup54" value="{{ old('tab2Gup54')}}"></td>
              <td><input type="text" name="prodtbGup54" value="{{ old('prodtbGup54')}}"></td>
              <td><input type="text" name="haatabGup54" value="{{ old('haatabGup54')}}"></td>
              <td><input type="text" name="grtbGup54" value="{{ old('grtbGup54')}}"></td>
              <td><input type="text" name="pesohuevotablaGup54" value="{{ old('pesohuevotablaGup54')}}"></td>
            </tr>
            <tr>
              <td>56</td>
              <td><input type="text" name="tbGup55" value="{{ old('tbGup55')}}"></td>
              <td><input type="text" name="tb1Gup55" value="{{ old('tb1Gup55')}}"></td>
              <td><input type="text" name="tb2Gup55" value="{{ old('tb2Gup55')}}"></td>
              <td><input type="text" name="real4Gup55" value="{{ old('real4Gup55')}}"></td>
              <td><input type="text" name="tab1Gup55" value="{{ old('tab1Gup55')}}"></td>
              <td><input type="text" name="real5Gup55" value="{{ old('real5Gup55')}}"></td>
              <td><input type="text" name="tab2Gup55" value="{{ old('tab2Gup55')}}"></td>
              <td><input type="text" name="prodtbGup55" value="{{ old('prodtbGup55')}}"></td>
              <td><input type="text" name="haatabGup55" value="{{ old('haatabGup55')}}"></td>
              <td><input type="text" name="grtbGup55" value="{{ old('grtbGup55')}}"></td>
              <td><input type="text" name="pesohuevotablaGup55" value="{{ old('pesohuevotablaGup55')}}"></td>
            </tr>
            <tr>
              <td>57</td>
              <td><input type="text" name="tbGup56" value="{{ old('tbGup56')}}"></td>
              <td><input type="text" name="tb1Gup56" value="{{ old('tb1Gup56')}}"></td>
              <td><input type="text" name="tb2Gup56" value="{{ old('tb2Gup56')}}"></td>
              <td><input type="text" name="real4Gup56" value="{{ old('real4Gup56')}}"></td>
              <td><input type="text" name="tab1Gup56" value="{{ old('tab1Gup56')}}"></td>
              <td><input type="text" name="real5Gup56" value="{{ old('real5Gup56')}}"></td>
              <td><input type="text" name="tab2Gup56" value="{{ old('tab2Gup56')}}"></td>
              <td><input type="text" name="prodtbGup56" value="{{ old('prodtbGup56')}}"></td>
              <td><input type="text" name="haatabGup56" value="{{ old('haatabGup56')}}"></td>
              <td><input type="text" name="grtbGup56" value="{{ old('grtbGup56')}}"></td>
              <td><input type="text" name="pesohuevotablaGup56" value="{{ old('pesohuevotablaGup56')}}"></td>
            </tr>
            <tr>
              <td>58</td>
              <td><input type="text" name="tbGup57" value="{{ old('tbGup57')}}"></td>
              <td><input type="text" name="tb1Gup57" value="{{ old('tb1Gup57')}}"></td>
              <td><input type="text" name="tb2Gup57" value="{{ old('tb2Gup57')}}"></td>
              <td><input type="text" name="real4Gup57" value="{{ old('real4Gup57')}}"></td>
              <td><input type="text" name="tab1Gup57" value="{{ old('tab1Gup57')}}"></td>
              <td><input type="text" name="real5Gup57" value="{{ old('real5Gup57')}}"></td>
              <td><input type="text" name="tab2Gup57" value="{{ old('tab2Gup57')}}"></td>
              <td><input type="text" name="prodtbGup57" value="{{ old('prodtbGup57')}}"></td>
              <td><input type="text" name="haatabGup57" value="{{ old('haatabGup57')}}"></td>
              <td><input type="text" name="grtbGup57" value="{{ old('grtbGup57')}}"></td>
              <td><input type="text" name="pesohuevotablaGup57" value="{{ old('pesohuevotablaGup57')}}"></td>
            </tr>
            <tr>
              <td>59</td>
              <td><input type="text" name="tbGup58" value="{{ old('tbGup58')}}"></td>
              <td><input type="text" name="tb1Gup58" value="{{ old('tb1Gup58')}}"></td>
              <td><input type="text" name="tb2Gup58" value="{{ old('tb2Gup58')}}"></td>
              <td><input type="text" name="real4Gup58" value="{{ old('real4Gup58')}}"></td>
              <td><input type="text" name="tab1Gup58" value="{{ old('tab1Gup58')}}"></td>
              <td><input type="text" name="real5Gup58" value="{{ old('real5Gup58')}}"></td>
              <td><input type="text" name="tab2Gup58" value="{{ old('tab2Gup58')}}"></td>
              <td><input type="text" name="prodtbGup58" value="{{ old('prodtbGup58')}}"></td>
              <td><input type="text" name="haatabGup58" value="{{ old('haatabGup58')}}"></td>
              <td><input type="text" name="grtbGup58" value="{{ old('grtbGup58')}}"></td>
              <td><input type="text" name="pesohuevotablaGup58" value="{{ old('pesohuevotablaGup58')}}"></td>
            </tr>
            <tr>
              <td>60</td>
              <td><input type="text" name="tbGup59" value="{{ old('tbGup59')}}"></td>
              <td><input type="text" name="tb1Gup59" value="{{ old('tb1Gup59')}}"></td>
              <td><input type="text" name="tb2Gup59" value="{{ old('tb2Gup59')}}"></td>
              <td><input type="text" name="real4Gup59" value="{{ old('real4Gup59')}}"></td>
              <td><input type="text" name="tab1Gup59" value="{{ old('tab1Gup59')}}"></td>
              <td><input type="text" name="real5Gup59" value="{{ old('real5Gup59')}}"></td>
              <td><input type="text" name="tab2Gup59" value="{{ old('tab2Gup59')}}"></td>
              <td><input type="text" name="prodtbGup59" value="{{ old('prodtbGup59')}}"></td>
              <td><input type="text" name="haatabGup59" value="{{ old('haatabGup59')}}"></td>
              <td><input type="text" name="grtbGup59" value="{{ old('grtbGup59')}}"></td>
              <td><input type="text" name="pesohuevotablaGup59" value="{{ old('pesohuevotablaGup59')}}"></td>
            </tr>
            <tr>
              <td>61</td>
              <td><input type="text" name="tbGup60" value="{{ old('tbGup60')}}"></td>
              <td><input type="text" name="tb1Gup60" value="{{ old('tb1Gup60')}}"></td>
              <td><input type="text" name="tb2Gup60" value="{{ old('tb2Gup60')}}"></td>
              <td><input type="text" name="real4Gup60" value="{{ old('real4Gup60')}}"></td>
              <td><input type="text" name="tab1Gup60" value="{{ old('tab1Gup60')}}"></td>
              <td><input type="text" name="real5Gup60" value="{{ old('real5Gup60')}}"></td>
              <td><input type="text" name="tab2Gup60" value="{{ old('tab2Gup60')}}"></td>
              <td><input type="text" name="prodtbGup60" value="{{ old('prodtbGup60')}}"></td>
              <td><input type="text" name="haatabGup60" value="{{ old('haatabGup60')}}"></td>
              <td><input type="text" name="grtbGup60" value="{{ old('grtbGup60')}}"></td>
              <td><input type="text" name="pesohuevotablaGup60" value="{{ old('pesohuevotablaGup60')}}"></td>
            </tr>
            <tr>
              <td>62</td>
              <td><input type="text" name="tbGup61" value="{{ old('tbGup61')}}"></td>
              <td><input type="text" name="tb1Gup61" value="{{ old('tb1Gup61')}}"></td>
              <td><input type="text" name="tb2Gup61" value="{{ old('tb2Gup61')}}"></td>
              <td><input type="text" name="real4Gup61" value="{{ old('real4Gup61')}}"></td>
              <td><input type="text" name="tab1Gup61" value="{{ old('tab1Gup61')}}"></td>
              <td><input type="text" name="real5Gup61" value="{{ old('real5Gup61')}}"></td>
              <td><input type="text" name="tab2Gup61" value="{{ old('tab2Gup61')}}"></td>
              <td><input type="text" name="prodtbGup61" value="{{ old('prodtbGup61')}}"></td>
              <td><input type="text" name="haatabGup61" value="{{ old('haatabGup61')}}"></td>
              <td><input type="text" name="grtbGup61" value="{{ old('grtbGup61')}}"></td>
              <td><input type="text" name="pesohuevotablaGup61" value="{{ old('pesohuevotablaGup61')}}"></td>
            </tr>
            <tr>
              <td>63</td>
              <td><input type="text" name="tbGup62" value="{{ old('tbGup62')}}"></td>
              <td><input type="text" name="tb1Gup62" value="{{ old('tb1Gup62')}}"></td>
              <td><input type="text" name="tb2Gup62" value="{{ old('tb2Gup62')}}"></td>
              <td><input type="text" name="real4Gup62" value="{{ old('real4Gup62')}}"></td>
              <td><input type="text" name="tab1Gup62" value="{{ old('tab1Gup62')}}"></td>
              <td><input type="text" name="real5Gup62" value="{{ old('real5Gup62')}}"></td>
              <td><input type="text" name="tab2Gup62" value="{{ old('tab2Gup62')}}"></td>
              <td><input type="text" name="prodtbGup62" value="{{ old('prodtbGup62')}}"></td>
              <td><input type="text" name="haatabGup62" value="{{ old('haatabGup62')}}"></td>
              <td><input type="text" name="grtbGup62" value="{{ old('grtbGup62')}}"></td>
              <td><input type="text" name="pesohuevotablaGup62" value="{{ old('pesohuevotablaGup62')}}"></td>
            </tr>
            <tr>
              <td>64</td>
              <td><input type="text" name="tbGup63" value="{{ old('tbGup63')}}"></td>
              <td><input type="text" name="tb1Gup63" value="{{ old('tb1Gup63')}}"></td>
              <td><input type="text" name="tb2Gup63" value="{{ old('tb2Gup63')}}"></td>
              <td><input type="text" name="real4Gup63" value="{{ old('real4Gup63')}}"></td>
              <td><input type="text" name="tab1Gup63" value="{{ old('tab1Gup63')}}"></td>
              <td><input type="text" name="real5Gup63" value="{{ old('real5Gup63')}}"></td>
              <td><input type="text" name="tab2Gup63" value="{{ old('tab2Gup63')}}"></td>
              <td><input type="text" name="prodtbGup63" value="{{ old('prodtbGup63')}}"></td>
              <td><input type="text" name="haatabGup63" value="{{ old('haatabGup63')}}"></td>
              <td><input type="text" name="grtbGup63" value="{{ old('grtbGup63')}}"></td>
              <td><input type="text" name="pesohuevotablaGup63" value="{{ old('pesohuevotablaGup63')}}"></td>
            </tr>
            <tr>
              <td>65</td>
              <td><input type="text" name="tbGup64" value="{{ old('tbGup64')}}"></td>
              <td><input type="text" name="tb1Gup64" value="{{ old('tb1Gup64')}}"></td>
              <td><input type="text" name="tb2Gup64" value="{{ old('tb2Gup64')}}"></td>
              <td><input type="text" name="real4Gup64" value="{{ old('real4Gup64')}}"></td>
              <td><input type="text" name="tab1Gup64" value="{{ old('tab1Gup64')}}"></td>
              <td><input type="text" name="real5Gup64" value="{{ old('real5Gup64')}}"></td>
              <td><input type="text" name="tab2Gup64" value="{{ old('tab2Gup64')}}"></td>
              <td><input type="text" name="prodtbGup64" value="{{ old('prodtbGup64')}}"></td>
              <td><input type="text" name="haatabGup64" value="{{ old('haatabGup64')}}"></td>
              <td><input type="text" name="grtbGup64" value="{{ old('grtbGup64')}}"></td>
              <td><input type="text" name="pesohuevotablaGup64" value="{{ old('pesohuevotablaGup64')}}"></td>
            </tr>
            <tr>
              <td>66</td>
              <td><input type="text" name="tbGup65" value="{{ old('tbGup65')}}"></td>
              <td><input type="text" name="tb1Gup65" value="{{ old('tb1Gup65')}}"></td>
              <td><input type="text" name="tb2Gup65" value="{{ old('tb2Gup65')}}"></td>
              <td><input type="text" name="real4Gup65" value="{{ old('real4Gup65')}}"></td>
              <td><input type="text" name="tab1Gup65" value="{{ old('tab1Gup65')}}"></td>
              <td><input type="text" name="real5Gup65" value="{{ old('real5Gup65')}}"></td>
              <td><input type="text" name="tab2Gup65" value="{{ old('tab2Gup65')}}"></td>
              <td><input type="text" name="prodtbGup65" value="{{ old('prodtbGup65')}}"></td>
              <td><input type="text" name="haatabGup65" value="{{ old('haatabGup65')}}"></td>
              <td><input type="text" name="grtbGup65" value="{{ old('grtbGup65')}}"></td>
              <td><input type="text" name="pesohuevotablaGup65" value="{{ old('pesohuevotablaGup65')}}"></td>
            </tr>
            <tr>
              <td>67</td>
              <td><input type="text" name="tbGup66" value="{{ old('tbGup66')}}"></td>
              <td><input type="text" name="tb1Gup66" value="{{ old('tb1Gup66')}}"></td>
              <td><input type="text" name="tb2Gup66" value="{{ old('tb2Gup66')}}"></td>
              <td><input type="text" name="real4Gup66" value="{{ old('real4Gup66')}}"></td>
              <td><input type="text" name="tab1Gup66" value="{{ old('tab1Gup66')}}"></td>
              <td><input type="text" name="real5Gup66" value="{{ old('real5Gup66')}}"></td>
              <td><input type="text" name="tab2Gup66" value="{{ old('tab2Gup66')}}"></td>
              <td><input type="text" name="prodtbGup66" value="{{ old('prodtbGup66')}}"></td>
              <td><input type="text" name="haatabGup66" value="{{ old('haatabGup66')}}"></td>
              <td><input type="text" name="grtbGup66" value="{{ old('grtbGup66')}}"></td>
              <td><input type="text" name="pesohuevotablaGup66" value="{{ old('pesohuevotablaGup66')}}"></td>
            </tr>
            <tr>
              <td>68</td>
              <td><input type="text" name="tbGup67" value="{{ old('tbGup67')}}"></td>
              <td><input type="text" name="tb1Gup67" value="{{ old('tb1Gup67')}}"></td>
              <td><input type="text" name="tb2Gup67" value="{{ old('tb2Gup67')}}"></td>
              <td><input type="text" name="real4Gup67" value="{{ old('real4Gup67')}}"></td>
              <td><input type="text" name="tab1Gup67" value="{{ old('tab1Gup67')}}"></td>
              <td><input type="text" name="real5Gup67" value="{{ old('real5Gup67')}}"></td>
              <td><input type="text" name="tab2Gup67" value="{{ old('tab2Gup67')}}"></td>
              <td><input type="text" name="prodtbGup67" value="{{ old('prodtbGup67')}}"></td>
              <td><input type="text" name="haatabGup67" value="{{ old('haatabGup67')}}"></td>
              <td><input type="text" name="grtbGup67" value="{{ old('grtbGup67')}}"></td>
              <td><input type="text" name="pesohuevotablaGup67" value="{{ old('pesohuevotablaGup67')}}"></td>
            </tr>
            <tr>
              <td>69</td>
              <td><input type="text" name="tbGup68" value="{{ old('tbGup68')}}"></td>
              <td><input type="text" name="tb1Gup68" value="{{ old('tb1Gup68')}}"></td>
              <td><input type="text" name="tb2Gup68" value="{{ old('tb2Gup68')}}"></td>
              <td><input type="text" name="real4Gup68" value="{{ old('real4Gup68')}}"></td>
              <td><input type="text" name="tab1Gup68" value="{{ old('tab1Gup68')}}"></td>
              <td><input type="text" name="real5Gup68" value="{{ old('real5Gup68')}}"></td>
              <td><input type="text" name="tab2Gup68" value="{{ old('tab2Gup68')}}"></td>
              <td><input type="text" name="prodtbGup68" value="{{ old('prodtbGup68')}}"></td>
              <td><input type="text" name="haatabGup68" value="{{ old('haatabGup68')}}"></td>
              <td><input type="text" name="grtbGup68" value="{{ old('grtbGup68')}}"></td>
              <td><input type="text" name="pesohuevotablaGup68" value="{{ old('pesohuevotablaGup68')}}"></td>
            </tr>
            <tr>
              <td>70</td>
              <td><input type="text" name="tbGup69" value="{{ old('tbGup69')}}"></td>
              <td><input type="text" name="tb1Gup69" value="{{ old('tb1Gup69')}}"></td>
              <td><input type="text" name="tb2Gup69" value="{{ old('tb2Gup69')}}"></td>
              <td><input type="text" name="real4Gup69" value="{{ old('real4Gup69')}}"></td>
              <td><input type="text" name="tab1Gup69" value="{{ old('tab1Gup69')}}"></td>
              <td><input type="text" name="real5Gup69" value="{{ old('real5Gup69')}}"></td>
              <td><input type="text" name="tab2Gup69" value="{{ old('tab2Gup69')}}"></td>
              <td><input type="text" name="prodtbGup69" value="{{ old('prodtbGup69')}}"></td>
              <td><input type="text" name="haatabGup69" value="{{ old('haatabGup69')}}"></td>
              <td><input type="text" name="grtbGup69" value="{{ old('grtbGup69')}}"></td>
              <td><input type="text" name="pesohuevotablaGup69" value="{{ old('pesohuevotablaGup69')}}"></td>
            </tr>
            <tr>
              <td>71</td>
              <td><input type="text" name="tbGup70" value="{{ old('tbGup70')}}"></td>
              <td><input type="text" name="tb1Gup70" value="{{ old('tb1Gup70')}}"></td>
              <td><input type="text" name="tb2Gup70" value="{{ old('tb2Gup70')}}"></td>
              <td><input type="text" name="real4Gup70" value="{{ old('real4Gup70')}}"></td>
              <td><input type="text" name="tab1Gup70" value="{{ old('tab1Gup70')}}"></td>
              <td><input type="text" name="real5Gup70" value="{{ old('real5Gup70')}}"></td>
              <td><input type="text" name="tab2Gup70" value="{{ old('tab2Gup70')}}"></td>
              <td><input type="text" name="prodtbGup70" value="{{ old('prodtbGup70')}}"></td>
              <td><input type="text" name="haatabGup70" value="{{ old('haatabGup70')}}"></td>
              <td><input type="text" name="grtbGup70" value="{{ old('grtbGup70')}}"></td>
              <td><input type="text" name="pesohuevotablaGup70" value="{{ old('pesohuevotablaGup70')}}"></td>
            </tr>
            <tr>
              <td>72</td>
              <td><input type="text" name="tbGup71" value="{{ old('tbGup71')}}"></td>
              <td><input type="text" name="tb1Gup71" value="{{ old('tb1Gup71')}}"></td>
              <td><input type="text" name="tb2Gup71" value="{{ old('tb2Gup71')}}"></td>
              <td><input type="text" name="real4Gup71" value="{{ old('real4Gup71')}}"></td>
              <td><input type="text" name="tab1Gup71" value="{{ old('tab1Gup71')}}"></td>
              <td><input type="text" name="real5Gup71" value="{{ old('real5Gup71')}}"></td>
              <td><input type="text" name="tab2Gup71" value="{{ old('tab2Gup71')}}"></td>
              <td><input type="text" name="prodtbGup71" value="{{ old('prodtbGup71')}}"></td>
              <td><input type="text" name="haatabGup71" value="{{ old('haatabGup71')}}"></td>
              <td><input type="text" name="grtbGup71" value="{{ old('grtbGup71')}}"></td>
              <td><input type="text" name="pesohuevotablaGup71" value="{{ old('pesohuevotablaGup71')}}"></td>
            </tr>
            <tr>
              <td>73</td>
              <td><input type="text" name="tbGup72" value="{{ old('tbGup72')}}"></td>
              <td><input type="text" name="tb1Gup72" value="{{ old('tb1Gup72')}}"></td>
              <td><input type="text" name="tb2Gup72" value="{{ old('tb2Gup72')}}"></td>
              <td><input type="text" name="real4Gup72" value="{{ old('real4Gup72')}}"></td>
              <td><input type="text" name="tab1Gup72" value="{{ old('tab1Gup72')}}"></td>
              <td><input type="text" name="real5Gup72" value="{{ old('real5Gup72')}}"></td>
              <td><input type="text" name="tab2Gup72" value="{{ old('tab2Gup72')}}"></td>
              <td><input type="text" name="prodtbGup72" value="{{ old('prodtbGup72')}}"></td>
              <td><input type="text" name="haatabGup72" value="{{ old('haatabGup72')}}"></td>
              <td><input type="text" name="grtbGup72" value="{{ old('grtbGup72')}}"></td>
              <td><input type="text" name="pesohuevotablaGup72" value="{{ old('pesohuevotablaGup72')}}"></td>
            </tr>
            <tr>
              <td>74</td>
              <td><input type="text" name="tbGup73" value="{{ old('tbGup73')}}"></td>
              <td><input type="text" name="tb1Gup73" value="{{ old('tb1Gup73')}}"></td>
              <td><input type="text" name="tb2Gup73" value="{{ old('tb2Gup73')}}"></td>
              <td><input type="text" name="real4Gup73" value="{{ old('real4Gup73')}}"></td>
              <td><input type="text" name="tab1Gup73" value="{{ old('tab1Gup73')}}"></td>
              <td><input type="text" name="real5Gup73" value="{{ old('real5Gup73')}}"></td>
              <td><input type="text" name="tab2Gup73" value="{{ old('tab2Gup73')}}"></td>
              <td><input type="text" name="prodtbGup73" value="{{ old('prodtbGup73')}}"></td>
              <td><input type="text" name="haatabGup73" value="{{ old('haatabGup73')}}"></td>
              <td><input type="text" name="grtbGup73" value="{{ old('grtbGup73')}}"></td>
              <td><input type="text" name="pesohuevotablaGup73" value="{{ old('pesohuevotablaGup73')}}"></td>
            </tr>
            <tr>
              <td>75</td>
              <td><input type="text" name="tbGup74" value="{{ old('tbGup74')}}"></td>
              <td><input type="text" name="tb1Gup74" value="{{ old('tb1Gup74')}}"></td>
              <td><input type="text" name="tb2Gup74" value="{{ old('tb2Gup74')}}"></td>
              <td><input type="text" name="real4Gup74" value="{{ old('real4Gup74')}}"></td>
              <td><input type="text" name="tab1Gup74" value="{{ old('tab1Gup74')}}"></td>
              <td><input type="text" name="real5Gup74" value="{{ old('real5Gup74')}}"></td>
              <td><input type="text" name="tab2Gup74" value="{{ old('tab2Gup74')}}"></td>
              <td><input type="text" name="prodtbGup74" value="{{ old('prodtbGup74')}}"></td>
              <td><input type="text" name="haatabGup74" value="{{ old('haatabGup74')}}"></td>
              <td><input type="text" name="grtbGup74" value="{{ old('grtbGup74')}}"></td>
              <td><input type="text" name="pesohuevotablaGup74" value="{{ old('pesohuevotablaGup74')}}"></td>
            </tr>
            <tr>
              <td>76</td>
              <td><input type="text" name="tbGup75" value="{{ old('tbGup75')}}"></td>
              <td><input type="text" name="tb1Gup75" value="{{ old('tb1Gup75')}}"></td>
              <td><input type="text" name="tb2Gup75" value="{{ old('tb2Gup75')}}"></td>
              <td><input type="text" name="real4Gup75" value="{{ old('real4Gup75')}}"></td>
              <td><input type="text" name="tab1Gup75" value="{{ old('tab1Gup75')}}"></td>
              <td><input type="text" name="real5Gup75" value="{{ old('real5Gup75')}}"></td>
              <td><input type="text" name="tab2Gup75" value="{{ old('tab2Gup75')}}"></td>
              <td><input type="text" name="prodtbGup75" value="{{ old('prodtbGup75')}}"></td>
              <td><input type="text" name="haatabGup75" value="{{ old('haatabGup75')}}"></td>
              <td><input type="text" name="grtbGup75" value="{{ old('grtbGup75')}}"></td>
              <td><input type="text" name="pesohuevotablaGup75" value="{{ old('pesohuevotablaGup75')}}"></td>
            </tr>
            <tr>
              <td>77</td>
              <td><input type="text" name="tbGup76" value="{{ old('tbGup76')}}"></td>
              <td><input type="text" name="tb1Gup76" value="{{ old('tb1Gup76')}}"></td>
              <td><input type="text" name="tb2Gup76" value="{{ old('tb2Gup76')}}"></td>
              <td><input type="text" name="real4Gup76" value="{{ old('real4Gup76')}}"></td>
              <td><input type="text" name="tab1Gup76" value="{{ old('tab1Gup76')}}"></td>
              <td><input type="text" name="real5Gup76" value="{{ old('real5Gup76')}}"></td>
              <td><input type="text" name="tab2Gup76" value="{{ old('tab2Gup76')}}"></td>
              <td><input type="text" name="prodtbGup76" value="{{ old('prodtbGup76')}}"></td>
              <td><input type="text" name="haatabGup76" value="{{ old('haatabGup76')}}"></td>
              <td><input type="text" name="grtbGup76" value="{{ old('grtbGup76')}}"></td>
              <td><input type="text" name="pesohuevotablaGup76" value="{{ old('pesohuevotablaGup76')}}"></td>
            </tr>
            <tr>
              <td>78</td>
              <td><input type="text" name="tbGup77" value="{{ old('tbGup77')}}"></td>
              <td><input type="text" name="tb1Gup77" value="{{ old('tb1Gup77')}}"></td>
              <td><input type="text" name="tb2Gup77" value="{{ old('tb2Gup77')}}"></td>
              <td><input type="text" name="real4Gup77" value="{{ old('real4Gup77')}}"></td>
              <td><input type="text" name="tab1Gup77" value="{{ old('tab1Gup77')}}"></td>
              <td><input type="text" name="real5Gup77" value="{{ old('real5Gup77')}}"></td>
              <td><input type="text" name="tab2Gup77" value="{{ old('tab2Gup77')}}"></td>
              <td><input type="text" name="prodtbGup77" value="{{ old('prodtbGup77')}}"></td>
              <td><input type="text" name="haatabGup77" value="{{ old('haatabGup77')}}"></td>
              <td><input type="text" name="grtbGup77" value="{{ old('grtbGup77')}}"></td>
              <td><input type="text" name="pesohuevotablaGup77" value="{{ old('pesohuevotablaGup77')}}"></td>
            </tr>
            <tr>
              <td>79</td>
              <td><input type="text" name="tbGup78" value="{{ old('tbGup78')}}"></td>
              <td><input type="text" name="tb1Gup78" value="{{ old('tb1Gup78')}}"></td>
              <td><input type="text" name="tb2Gup78" value="{{ old('tb2Gup78')}}"></td>
              <td><input type="text" name="real4Gup78" value="{{ old('real4Gup78')}}"></td>
              <td><input type="text" name="tab1Gup78" value="{{ old('tab1Gup78')}}"></td>
              <td><input type="text" name="real5Gup78" value="{{ old('real5Gup78')}}"></td>
              <td><input type="text" name="tab2Gup78" value="{{ old('tab2Gup78')}}"></td>
              <td><input type="text" name="prodtbGup78" value="{{ old('prodtbGup78')}}"></td>
              <td><input type="text" name="haatabGup78" value="{{ old('haatabGup78')}}"></td>
              <td><input type="text" name="grtbGup78" value="{{ old('grtbGup78')}}"></td>
              <td><input type="text" name="pesohuevotablaGup78" value="{{ old('pesohuevotablaGup78')}}"></td>
            </tr>
            <tr>
              <td>80</td>
              <td><input type="text" name="tbGup79" value="{{ old('tbGup79')}}"></td>
              <td><input type="text" name="tb1Gup79" value="{{ old('tb1Gup79')}}"></td>
              <td><input type="text" name="tb2Gup79" value="{{ old('tb2Gup79')}}"></td>
              <td><input type="text" name="real4Gup79" value="{{ old('real4Gup79')}}"></td>
              <td><input type="text" name="tab1Gup79" value="{{ old('tab1Gup79')}}"></td>
              <td><input type="text" name="real5Gup79" value="{{ old('real5Gup79')}}"></td>
              <td><input type="text" name="tab2Gup79" value="{{ old('tab2Gup79')}}"></td>
              <td><input type="text" name="prodtbGup79" value="{{ old('prodtbGup79')}}"></td>
              <td><input type="text" name="haatabGup79" value="{{ old('haatabGup79')}}"></td>
              <td><input type="text" name="grtbGup79" value="{{ old('grtbGup79')}}"></td>
              <td><input type="text" name="pesohuevotablaGup79" value="{{ old('pesohuevotablaGup79')}}"></td>
            </tr>
            <tr>
              <td>81</td>
              <td><input type="text" name="tbGup80" value="{{ old('tbGup80')}}"></td>
              <td><input type="text" name="tb1Gup80" value="{{ old('tb1Gup80')}}"></td>
              <td><input type="text" name="tb2Gup80" value="{{ old('tb2Gup80')}}"></td>
              <td><input type="text" name="real4Gup80" value="{{ old('real4Gup80')}}"></td>
              <td><input type="text" name="tab1Gup80" value="{{ old('tab1Gup80')}}"></td>
              <td><input type="text" name="real5Gup80" value="{{ old('real5Gup80')}}"></td>
              <td><input type="text" name="tab2Gup80" value="{{ old('tab2Gup80')}}"></td>
              <td><input type="text" name="prodtbGup80" value="{{ old('prodtbGup80')}}"></td>
              <td><input type="text" name="haatabGup80" value="{{ old('haatabGup80')}}"></td>
              <td><input type="text" name="grtbGup80" value="{{ old('grtbGup80')}}"></td>
              <td><input type="text" name="pesohuevotablaGup80" value="{{ old('pesohuevotablaGup80')}}"></td>
            </tr>
            <tr>
              <td>82</td>
              <td><input type="text" name="tbGup81" value="{{ old('tbGup81')}}"></td>
              <td><input type="text" name="tb1Gup81" value="{{ old('tb1Gup81')}}"></td>
              <td><input type="text" name="tb2Gup81" value="{{ old('tb2Gup81')}}"></td>
              <td><input type="text" name="real4Gup81" value="{{ old('real4Gup81')}}"></td>
              <td><input type="text" name="tab1Gup81" value="{{ old('tab1Gup81')}}"></td>
              <td><input type="text" name="real5Gup81" value="{{ old('real5Gup81')}}"></td>
              <td><input type="text" name="tab2Gup81" value="{{ old('tab2Gup81')}}"></td>
              <td><input type="text" name="prodtbGup81" value="{{ old('prodtbGup81')}}"></td>
              <td><input type="text" name="haatabGup81" value="{{ old('haatabGup81')}}"></td>
              <td><input type="text" name="grtbGup81" value="{{ old('grtbGup81')}}"></td>
              <td><input type="text" name="pesohuevotablaGup81" value="{{ old('pesohuevotablaGup81')}}"></td>
            </tr>
            <tr>
              <td>83</td>
              <td><input type="text" name="tbGup82" value="{{ old('tbGup82')}}"></td>
              <td><input type="text" name="tb1Gup82" value="{{ old('tb1Gup82')}}"></td>
              <td><input type="text" name="tb2Gup82" value="{{ old('tb2Gup82')}}"></td>
              <td><input type="text" name="real4Gup82" value="{{ old('real4Gup82')}}"></td>
              <td><input type="text" name="tab1Gup82" value="{{ old('tab1Gup82')}}"></td>
              <td><input type="text" name="real5Gup82" value="{{ old('real5Gup82')}}"></td>
              <td><input type="text" name="tab2Gup82" value="{{ old('tab2Gup82')}}"></td>
              <td><input type="text" name="prodtbGup82" value="{{ old('prodtbGup82')}}"></td>
              <td><input type="text" name="haatabGup82" value="{{ old('haatabGup82')}}"></td>
              <td><input type="text" name="grtbGup82" value="{{ old('grtbGup82')}}"></td>
              <td><input type="text" name="pesohuevotablaGup82" value="{{ old('pesohuevotablaGup82')}}"></td>
            </tr>
            <tr>
              <td>84</td>
              <td><input type="text" name="tbGup83" value="{{ old('tbGup83')}}"></td>
              <td><input type="text" name="tb1Gup83" value="{{ old('tb1Gup83')}}"></td>
              <td><input type="text" name="tb2Gup83" value="{{ old('tb2Gup83')}}"></td>
              <td><input type="text" name="real4Gup83" value="{{ old('real4Gup83')}}"></td>
              <td><input type="text" name="tab1Gup83" value="{{ old('tab1Gup83')}}"></td>
              <td><input type="text" name="real5Gup83" value="{{ old('real5Gup83')}}"></td>
              <td><input type="text" name="tab2Gup83" value="{{ old('tab2Gup83')}}"></td>
              <td><input type="text" name="prodtbGup83" value="{{ old('prodtbGup83')}}"></td>
              <td><input type="text" name="haatabGup83" value="{{ old('haatabGup83')}}"></td>
              <td><input type="text" name="grtbGup83" value="{{ old('grtbGup83')}}"></td>
              <td><input type="text" name="pesohuevotablaGup83" value="{{ old('pesohuevotablaGup83')}}"></td>
            </tr>
            <tr>
              <td>85</td>
              <td><input type="text" name="tbGup84" value="{{ old('tbGup84')}}"></td>
              <td><input type="text" name="tb1Gup84" value="{{ old('tb1Gup84')}}"></td>
              <td><input type="text" name="tb2Gup84" value="{{ old('tb2Gup84')}}"></td>
              <td><input type="text" name="real4Gup84" value="{{ old('real4Gup84')}}"></td>
              <td><input type="text" name="tab1Gup84" value="{{ old('tab1Gup84')}}"></td>
              <td><input type="text" name="real5Gup84" value="{{ old('real5Gup84')}}"></td>
              <td><input type="text" name="tab2Gup84" value="{{ old('tab2Gup84')}}"></td>
              <td><input type="text" name="prodtbGup84" value="{{ old('prodtbGup84')}}"></td>
              <td><input type="text" name="haatabGup84" value="{{ old('haatabGup84')}}"></td>
              <td><input type="text" name="grtbGup84" value="{{ old('grtbGup84')}}"></td>
              <td><input type="text" name="pesohuevotablaGup84" value="{{ old('pesohuevotablaGup84')}}"></td>
            </tr>
            <tr>
              <td>86</td>
              <td><input type="text" name="tbGup85" value="{{ old('tbGup85')}}"></td>
              <td><input type="text" name="tb1Gup85" value="{{ old('tb1Gup85')}}"></td>
              <td><input type="text" name="tb2Gup85" value="{{ old('tb2Gup85')}}"></td>
              <td><input type="text" name="real4Gup85" value="{{ old('real4Gup85')}}"></td>
              <td><input type="text" name="tab1Gup85" value="{{ old('tab1Gup85')}}"></td>
              <td><input type="text" name="real5Gup85" value="{{ old('real5Gup85')}}"></td>
              <td><input type="text" name="tab2Gup85" value="{{ old('tab2Gup85')}}"></td>
              <td><input type="text" name="prodtbGup85" value="{{ old('prodtbGup85')}}"></td>
              <td><input type="text" name="haatabGup85" value="{{ old('haatabGup85')}}"></td>
              <td><input type="text" name="grtbGup85" value="{{ old('grtbGup85')}}"></td>
              <td><input type="text" name="pesohuevotablaGup85" value="{{ old('pesohuevotablaGup85')}}"></td>
            </tr>
            <tr>
              <td>87</td>
              <td><input type="text" name="tbGup86" value="{{ old('tbGup86')}}"></td>
              <td><input type="text" name="tb1Gup86" value="{{ old('tb1Gup86')}}"></td>
              <td><input type="text" name="tb2Gup86" value="{{ old('tb2Gup86')}}"></td>
              <td><input type="text" name="real4Gup86" value="{{ old('real4Gup86')}}"></td>
              <td><input type="text" name="tab1Gup86" value="{{ old('tab1Gup86')}}"></td>
              <td><input type="text" name="real5Gup86" value="{{ old('real5Gup86')}}"></td>
              <td><input type="text" name="tab2Gup86" value="{{ old('tab2Gup86')}}"></td>
              <td><input type="text" name="prodtbGup86" value="{{ old('prodtbGup86')}}"></td>
              <td><input type="text" name="haatabGup86" value="{{ old('haatabGup86')}}"></td>
              <td><input type="text" name="grtbGup86" value="{{ old('grtbGup86')}}"></td>
              <td><input type="text" name="pesohuevotablaGup86" value="{{ old('pesohuevotablaGup86')}}"></td>
            </tr>
            <tr>
              <td>88</td>
              <td><input type="text" name="tbGup87" value="{{ old('tbGup87')}}"></td>
              <td><input type="text" name="tb1Gup87" value="{{ old('tb1Gup87')}}"></td>
              <td><input type="text" name="tb2Gup87" value="{{ old('tb2Gup87')}}"></td>
              <td><input type="text" name="real4Gup87" value="{{ old('real4Gup87')}}"></td>
              <td><input type="text" name="tab1Gup87" value="{{ old('tab1Gup87')}}"></td>
              <td><input type="text" name="real5Gup87" value="{{ old('real5Gup87')}}"></td>
              <td><input type="text" name="tab2Gup87" value="{{ old('tab2Gup87')}}"></td>
              <td><input type="text" name="prodtbGup87" value="{{ old('prodtbGup87')}}"></td>
              <td><input type="text" name="haatabGup87" value="{{ old('haatabGup87')}}"></td>
              <td><input type="text" name="grtbGup87" value="{{ old('grtbGup87')}}"></td>
              <td><input type="text" name="pesohuevotablaGup87" value="{{ old('pesohuevotablaGup87')}}"></td>
            </tr>
            <tr>
              <td>89</td>
              <td><input type="text" name="tbGup88" value="{{ old('tbGup88')}}"></td>
              <td><input type="text" name="tb1Gup88" value="{{ old('tb1Gup88')}}"></td>
              <td><input type="text" name="tb2Gup88" value="{{ old('tb2Gup88')}}"></td>
              <td><input type="text" name="real4Gup88" value="{{ old('real4Gup88')}}"></td>
              <td><input type="text" name="tab1Gup88" value="{{ old('tab1Gup88')}}"></td>
              <td><input type="text" name="real5Gup88" value="{{ old('real5Gup88')}}"></td>
              <td><input type="text" name="tab2Gup88" value="{{ old('tab2Gup88')}}"></td>
              <td><input type="text" name="prodtbGup88" value="{{ old('prodtbGup88')}}"></td>
              <td><input type="text" name="haatabGup88" value="{{ old('haatabGup88')}}"></td>
              <td><input type="text" name="grtbGup88" value="{{ old('grtbGup88')}}"></td>
              <td><input type="text" name="pesohuevotablaGup88" value="{{ old('pesohuevotablaGup88')}}"></td>
            </tr>
            <tr>
              <td>90</td>
              <td><input type="text" name="tbGup89" value="{{ old('tbGup89')}}"></td>
              <td><input type="text" name="tb1Gup89" value="{{ old('tb1Gup89')}}"></td>
              <td><input type="text" name="tb2Gup89" value="{{ old('tb2Gup89')}}"></td>
              <td><input type="text" name="real4Gup89" value="{{ old('real4Gup89')}}"></td>
              <td><input type="text" name="tab1Gup89" value="{{ old('tab1Gup89')}}"></td>
              <td><input type="text" name="real5Gup89" value="{{ old('real5Gup89')}}"></td>
              <td><input type="text" name="tab2Gup89" value="{{ old('tab2Gup89')}}"></td>
              <td><input type="text" name="prodtbGup89" value="{{ old('prodtbGup89')}}"></td>
              <td><input type="text" name="haatabGup89" value="{{ old('haatabGup89')}}"></td>
              <td><input type="text" name="grtbGup89" value="{{ old('grtbGup89')}}"></td>
              <td><input type="text" name="pesohuevotablaGup89" value="{{ old('pesohuevotablaGup89')}}"></td>
            </tr>
            <tr>
              <td>91</td>
              <td><input type="text" name="tbGup90" value="{{ old('tbGup90')}}"></td>
              <td><input type="text" name="tb1Gup90" value="{{ old('tb1Gup90')}}"></td>
              <td><input type="text" name="tb2Gup90" value="{{ old('tb2Gup90')}}"></td>
              <td><input type="text" name="real4Gup90" value="{{ old('real4Gup90')}}"></td>
              <td><input type="text" name="tab1Gup90" value="{{ old('tab1Gup90')}}"></td>
              <td><input type="text" name="real5Gup90" value="{{ old('real5Gup90')}}"></td>
              <td><input type="text" name="tab2Gup90" value="{{ old('tab2Gup90')}}"></td>
              <td><input type="text" name="prodtbGup90" value="{{ old('prodtbGup90')}}"></td>
              <td><input type="text" name="haatabGup90" value="{{ old('haatabGup90')}}"></td>
              <td><input type="text" name="grtbGup90" value="{{ old('grtbGup90')}}"></td>
              <td><input type="text" name="pesohuevotablaGup90" value="{{ old('pesohuevotablaGup90')}}"></td>
            </tr>
            <tr>
              <td>92</td>
              <td><input type="text" name="tbGup91" value="{{ old('tbGup91')}}"></td>
              <td><input type="text" name="tb1Gup91" value="{{ old('tb1Gup91')}}"></td>
              <td><input type="text" name="tb2Gup91" value="{{ old('tb2Gup91')}}"></td>
              <td><input type="text" name="real4Gup91" value="{{ old('real4Gup91')}}"></td>
              <td><input type="text" name="tab1Gup91" value="{{ old('tab1Gup91')}}"></td>
              <td><input type="text" name="real5Gup91" value="{{ old('real5Gup91')}}"></td>
              <td><input type="text" name="tab2Gup91" value="{{ old('tab2Gup91')}}"></td>
              <td><input type="text" name="prodtbGup91" value="{{ old('prodtbGup91')}}"></td>
              <td><input type="text" name="haatabGup91" value="{{ old('haatabGup91')}}"></td>
              <td><input type="text" name="grtbGup91" value="{{ old('grtbGup91')}}"></td>
              <td><input type="text" name="pesohuevotablaGup91" value="{{ old('pesohuevotablaGup91')}}"></td>
            </tr>
            <tr>
              <td>93</td>
              <td><input type="text" name="tbGup92" value="{{ old('tbGup92')}}"></td>
              <td><input type="text" name="tb1Gup92" value="{{ old('tb1Gup92')}}"></td>
              <td><input type="text" name="tb2Gup92" value="{{ old('tb2Gup92')}}"></td>
              <td><input type="text" name="real4Gup92" value="{{ old('real4Gup92')}}"></td>
              <td><input type="text" name="tab1Gup92" value="{{ old('tab1Gup92')}}"></td>
              <td><input type="text" name="real5Gup92" value="{{ old('real5Gup92')}}"></td>
              <td><input type="text" name="tab2Gup92" value="{{ old('tab2Gup92')}}"></td>
              <td><input type="text" name="prodtbGup92" value="{{ old('prodtbGup92')}}"></td>
              <td><input type="text" name="haatabGup92" value="{{ old('haatabGup92')}}"></td>
              <td><input type="text" name="grtbGup92" value="{{ old('grtbGup92')}}"></td>
              <td><input type="text" name="pesohuevotablaGup92" value="{{ old('pesohuevotablaGup92')}}"></td>
            </tr>
            <tr>
              <td>94</td>
              <td><input type="text" name="tbGup93" value="{{ old('tbGup93')}}"></td>
              <td><input type="text" name="tb1Gup93" value="{{ old('tb1Gup93')}}"></td>
              <td><input type="text" name="tb2Gup93" value="{{ old('tb2Gup93')}}"></td>
              <td><input type="text" name="real4Gup93" value="{{ old('real4Gup93')}}"></td>
              <td><input type="text" name="tab1Gup93" value="{{ old('tab1Gup93')}}"></td>
              <td><input type="text" name="real5Gup93" value="{{ old('real5Gup93')}}"></td>
              <td><input type="text" name="tab2Gup93" value="{{ old('tab2Gup93')}}"></td>
              <td><input type="text" name="prodtbGup93" value="{{ old('prodtbGup93')}}"></td>
              <td><input type="text" name="haatabGup93" value="{{ old('haatabGup93')}}"></td>
              <td><input type="text" name="grtbGup93" value="{{ old('grtbGup93')}}"></td>
              <td><input type="text" name="pesohuevotablaGup93" value="{{ old('pesohuevotablaGup93')}}"></td>
            </tr>
            <tr>
              <td>95</td>
              <td><input type="text" name="tbGup94" value="{{ old('tbGup94')}}"></td>
              <td><input type="text" name="tb1Gup94" value="{{ old('tb1Gup94')}}"></td>
              <td><input type="text" name="tb2Gup94" value="{{ old('tb2Gup94')}}"></td>
              <td><input type="text" name="real4Gup94" value="{{ old('real4Gup94')}}"></td>
              <td><input type="text" name="tab1Gup94" value="{{ old('tab1Gup94')}}"></td>
              <td><input type="text" name="real5Gup94" value="{{ old('real5Gup94')}}"></td>
              <td><input type="text" name="tab2Gup94" value="{{ old('tab2Gup94')}}"></td>
              <td><input type="text" name="prodtbGup94" value="{{ old('prodtbGup94')}}"></td>
              <td><input type="text" name="haatabGup94" value="{{ old('haatabGup94')}}"></td>
              <td><input type="text" name="grtbGup94" value="{{ old('grtbGup94')}}"></td>
              <td><input type="text" name="pesohuevotablaGup94" value="{{ old('pesohuevotablaGup94')}}"></td>
            </tr>
            <tr>
              <td>96</td>
              <td><input type="text" name="tbGup95" value="{{ old('tbGup95')}}"></td>
              <td><input type="text" name="tb1Gup95" value="{{ old('tb1Gup95')}}"></td>
              <td><input type="text" name="tb2Gup95" value="{{ old('tb2Gup95')}}"></td>
              <td><input type="text" name="real4Gup95" value="{{ old('real4Gup95')}}"></td>
              <td><input type="text" name="tab1Gup95" value="{{ old('tab1Gup95')}}"></td>
              <td><input type="text" name="real5Gup95" value="{{ old('real5Gup95')}}"></td>
              <td><input type="text" name="tab2Gup95" value="{{ old('tab2Gup95')}}"></td>
              <td><input type="text" name="prodtbGup95" value="{{ old('prodtbGup95')}}"></td>
              <td><input type="text" name="haatabGup95" value="{{ old('haatabGup95')}}"></td>
              <td><input type="text" name="grtbGup95" value="{{ old('grtbGup95')}}"></td>
              <td><input type="text" name="pesohuevotablaGup95" value="{{ old('pesohuevotablaGup95')}}"></td>
            </tr>
            <tr>
              <td>97</td>
              <td><input type="text" name="tbGup96" value="{{ old('tbGup96')}}"></td>
              <td><input type="text" name="tb1Gup96" value="{{ old('tb1Gup96')}}"></td>
              <td><input type="text" name="tb2Gup96" value="{{ old('tb2Gup96')}}"></td>
              <td><input type="text" name="real4Gup96" value="{{ old('real4Gup96')}}"></td>
              <td><input type="text" name="tab1Gup96" value="{{ old('tab1Gup96')}}"></td>
              <td><input type="text" name="real5Gup96" value="{{ old('real5Gup96')}}"></td>
              <td><input type="text" name="tab2Gup96" value="{{ old('tab2Gup96')}}"></td>
              <td><input type="text" name="prodtbGup96" value="{{ old('prodtbGup96')}}"></td>
              <td><input type="text" name="haatabGup96" value="{{ old('haatabGup96')}}"></td>
              <td><input type="text" name="grtbGup96" value="{{ old('grtbGup96')}}"></td>
              <td><input type="text" name="pesohuevotablaGup96" value="{{ old('pesohuevotablaGup96')}}"></td>
            </tr>
            <tr>
              <td>98</td>
              <td><input type="text" name="tbGup97" value="{{ old('tbGup97')}}"></td>
              <td><input type="text" name="tb1Gup97" value="{{ old('tb1Gup97')}}"></td>
              <td><input type="text" name="tb2Gup97" value="{{ old('tb2Gup97')}}"></td>
              <td><input type="text" name="real4Gup97" value="{{ old('real4Gup97')}}"></td>
              <td><input type="text" name="tab1Gup97" value="{{ old('tab1Gup97')}}"></td>
              <td><input type="text" name="real5Gup97" value="{{ old('real5Gup97')}}"></td>
              <td><input type="text" name="tab2Gup97" value="{{ old('tab2Gup97')}}"></td>
              <td><input type="text" name="prodtbGup97" value="{{ old('prodtbGup97')}}"></td>
              <td><input type="text" name="haatabGup97" value="{{ old('haatabGup97')}}"></td>
              <td><input type="text" name="grtbGup97" value="{{ old('grtbGup97')}}"></td>
              <td><input type="text" name="pesohuevotablaGup97" value="{{ old('pesohuevotablaGup97')}}"></td>
            </tr>
            <tr>
              <td>99</td>
              <td><input type="text" name="tbGup98" value="{{ old('tbGup98')}}"></td>
              <td><input type="text" name="tb1Gup98" value="{{ old('tb1Gup98')}}"></td>
              <td><input type="text" name="tb2Gup98" value="{{ old('tb2Gup98')}}"></td>
              <td><input type="text" name="real4Gup98" value="{{ old('real4Gup98')}}"></td>
              <td><input type="text" name="tab1Gup98" value="{{ old('tab1Gup98')}}"></td>
              <td><input type="text" name="real5Gup98" value="{{ old('real5Gup98')}}"></td>
              <td><input type="text" name="tab2Gup98" value="{{ old('tab2Gup98')}}"></td>
              <td><input type="text" name="prodtbGup98" value="{{ old('prodtbGup98')}}"></td>
              <td><input type="text" name="haatabGup98" value="{{ old('haatabGup98')}}"></td>
              <td><input type="text" name="grtbGup98" value="{{ old('grtbGup98')}}"></td>
              <td><input type="text" name="pesohuevotablaGup98" value="{{ old('pesohuevotablaGup98')}}"></td>
            </tr>
            <tr>
              <td>100</td>
              <td><input type="text" name="tbGup99" value="{{ old('tbGup99')}}"></td>
              <td><input type="text" name="tb1Gup99" value="{{ old('tb1Gup99')}}"></td>
              <td><input type="text" name="tb2Gup99" value="{{ old('tb2Gup99')}}"></td>
              <td><input type="text" name="real4Gup99" value="{{ old('real4Gup99')}}"></td>
              <td><input type="text" name="tab1Gup99" value="{{ old('tab1Gup99')}}"></td>
              <td><input type="text" name="real5Gup99" value="{{ old('real5Gup99')}}"></td>
              <td><input type="text" name="tab2Gup99" value="{{ old('tab2Gup99')}}"></td>
              <td><input type="text" name="prodtbGup99" value="{{ old('prodtbGup99')}}"></td>
              <td><input type="text" name="haatabGup99" value="{{ old('haatabGup99')}}"></td>
              <td><input type="text" name="grtbGup99" value="{{ old('grtbGup99')}}"></td>
              <td><input type="text" name="pesohuevotablaGup99" value="{{ old('pesohuevotablaGup99')}}"></td>
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
