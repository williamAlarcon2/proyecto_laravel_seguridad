<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Zona as Zona;
use App\Models\Municipio as Municipio;
use App\Models\Zonadepartamento as Zonadepartamento; 
use App\Models\Zonamunicipio as Zonamunicipio; 

class ZonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $zonas = Zona::select('zonas.id', 'zonas.nombreZon' , 'municipios.nombreMun')
                        ->leftjoin('zonamunicipios' , 'zonamunicipios.idZona' , '=' , 'zonas.id')
                        ->leftjoin('municipios' , 'municipios.id' , '=' , 'zonamunicipios.idMunicipio')
                        ->groupBy('nombreZon')
                        ->paginate(20);

      return view('Avicol/Zona/list', compact('zonas'));
    }

    public function indexzonasmunicipios($id)
    {
        $nomzonas = Zona::select('zonas.nombreZon')
                        ->where('zonas.id' , '=' , $id)
                        ->get();

        $zonas = Zona::select('zonamunicipios.id' , 'municipios.nombreMun')
                        ->leftjoin('zonamunicipios' , 'zonamunicipios.idZona' , '=' , 'zonas.id')
                        ->leftjoin('municipios' , 'municipios.id' , '=' , 'zonamunicipios.idMunicipio')
                        ->where('zonas.id' , '=' , $id)
                        ->paginate(20);

      return view('Avicol/Zona/listmunicipios', compact('zonas', 'nomzonas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Avicol/Zona/create');
    }

    public function consultamunicipio()
    {
       $municipios = Municipio::select('nombreMun', 'id')->get(); 

       echo json_encode($municipios);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $NombreMunicipio = $request->get('municipio'); 

        //Validaciones
        $messages = [
            'nombreZon.required' => 'El campo Nombre de la Zona es obligatorio',
        ];
        $rules = [
            'nombreZon' => 'required',
        ];

        $this->validate($request, $rules , $messages);

        if ($NombreMunicipio != Null) {
            $zonas = new Zona;
            $zonas->nombreZon = $request->nombreZon;
            $zonas->save();

            foreach ($request->get('municipio') as $municipio) {
                $municios = new Zonamunicipio;
                $municios->idMunicipio =  $municipio['idMunicipio'];
                $municios->idZona  = $zonas->id;            
                $municios->save();
            }            
            return redirect('zonas');
          }
          if ($NombreMunicipio == Null) {
            $zonas = new Zona;
            $zonas->create($request->all());
            return redirect('zonas');
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
      $zonas = Zona::find($id);

      $zonasm = Zonamunicipio::select('municipios.nombreMun' , 'zonas.nombreZon')                    
                                ->join('zonas' , 'zonas.id' , '=' , 'zonamunicipios.idZona')
                                ->join('municipios' , 'municipios.id' , '=' , 'zonamunicipios.idMunicipio')
                                ->where('zonas.id' , '=' , $id)
                                ->groupBy('nombreZon')
                                ->get();                           

      return view('Avicol/Zona/update', compact('zonas' , 'zonasm'));
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
        $NombreMunicipio = $request->get('municipio');

        //Validaciones
        $messages = [
            'nombreZon.required' => 'El campo Nombre de la Zona es obligatorio',
        ];
        $rules = [
            'nombreZon' => 'required',
        ];

        $this->validate($request, $rules , $messages);

          $mun = Zonamunicipio::select('zonas.id')                    
                                ->join('zonas' , 'zonas.id' , '=' , 'zonamunicipios.idZona')
                                ->join('municipios' , 'municipios.id' , '=' , 'zonamunicipios.idMunicipio')
                                ->where('zonas.id' , '=' , $id)
                                ->count();                      

          $idMunicipios = Zonamunicipio::select('zonamunicipios.id')                    
                                ->join('zonas' , 'zonas.id' , '=' , 'zonamunicipios.idZona')
                                ->join('municipios' , 'municipios.id' , '=' , 'zonamunicipios.idMunicipio')
                                ->where('zonas.id' , '=' , $id)
                                ->get();                         

        if($mun == 0) {
            
            $zonas = Zona::find($id);
            $zonas->update($request->all());
            

            if ($request->get('municipio') != null) {
                foreach ( $request->get('municipio') as $municipio) {
                    if ($municipio != null) {
                        $municipios = new Zonamunicipio;
                        $municipios->idMunicipio =  $municipio['idMunicipio'];
                        $municipios->idZona  = $zonas->id;            
                        $municipios->save();
                    }                
                }       
            }
            
            return redirect('zonas');
        }elseif ($mun != 0) {

            $zonas = Zona::find($id);
            $zonas->nombreZon = $request->nombreZon;
            $zonas->save();

            if ($request->get('municipio') != null) {
                foreach ( $request->get('municipio') as $municipio) {
                    if ($municipio != null) {
                        $municipios = new Zonamunicipio;
                        $municipios->idMunicipio =  $municipio['idMunicipio'];
                        $municipios->idZona  = $zonas->id;            
                        $municipios->save();
                    }                
                }       
                
            }
            /*elseif ($request->get('municipio') == null) {
                return redirect('zonas');
            }*/
            return redirect('zonas');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zonas = Zonamunicipio::find($id)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }

    public function search(Request $request)
    {
      $zonas = Zona::where('nombreZon','like','%'.$request->buscar.'%')->paginate();

      return \View::make('Avicol/Zona/list', compact('zonas'));
    }
}
