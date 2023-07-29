<?php

namespace App\Http\Controllers;

use App\Models\Buses;
use Illuminate\Http\Request;

class BusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buses = Buses::latest()->paginate(15);

        return view('buses.buses-list', compact('buses'));
    }

    public function search()
    {
        $b = request('b');
        if($b != "") {
            $buses = Buses::where("Matricula", 'LIKE', '%' .$b. '%')
            ->orwhere("Marca", 'LIKE', '%' .$b. '%')
            ->orwhere("Modelo", 'LIKE', '%' .$b. '%')
            ->orwhere("Empresa", 'LIKE', '%' .$b. '%')
            ->get();

            if(count($buses) > 0)
                return view('buses.Buses', compact('buses'))->withDetails($buses)->withQuery($b);

        }else{
            return view('buses.Buses')->withMessage("Não foi encontrado nenhum Autocarro com esse nome!");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buses.create_Buses');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // Create a new bus using the request data

        $bus = new Buses;


        $bus->user_id = auth()->id();
        $bus->Matricula = request('Matricula');
        $bus->Marca = request('Marca');
        $bus->Ano_Producao = request('Ano_prod');
        $bus->Empresa = request('Empresa');
        $bus->Modelo = request('Modelo');
        $bus->Imagem = request('Imagem');
        $bus->Motor = request('Motor');
        $bus->Num_Motor = request('Num_Motor');
        $bus->Combustivel = request('Combustivel');
        $bus->Carrocaria = request('Carrocaria');
        $bus->Num_Chassis = request('Num_Chassis');
        $bus->Lotacao = request('Lotacao');
        $bus->Comprimento = request('Comprimento');
        $bus->Largura = request('Largura');
        $bus->Altura = request('Altura');
        $bus->Dist_entre_eixos = request('Dist_entre_eixos');
        $bus->Peso_bruto = request('Peso_bruto');
        $bus->Descricao = request('Descricao');

        // Save it to the database

        $bus->save();

        // And then redirects to the home page

        return redirect('/buses')->withMessage("Autocarro publicado com sucesso!");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Buses $bus)
    {
        return view('buses.show_Buses', compact('bus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bus = Buses::find($id);

        return view('buses.edit_Buses')->withBuses($bus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $buses)
    {
        $buses = Buses::find($buses);
        $buses->user_id = auth()->id();
        $buses->Matricula = request('Matricula');
        $buses->Marca = request('Marca');
        $buses->Ano_Producao = request('Ano_prod');
        $buses->Empresa = request('Empresa');
        $buses->Modelo = request('Modelo');
        $buses->Imagem = request('Imagem');
        $buses->Motor = request('Motor');
        $buses->Num_Motor = request('Num_Motor');
        $buses->Combustivel = request('Combustivel');
        $buses->Carrocaria = request('Carrocaria');
        $buses->Num_Chassis = request('Num_Chassis');
        $buses->Lotacao = request('Lotacao');
        $buses->Comprimento = request('Comprimento');
        $buses->Largura = request('Largura');
        $buses->Altura = request('Altura');
        $buses->Dist_entre_eixos = request('Dist_entre_eixos');
        $buses->Peso_bruto = request('Peso_bruto');
        $buses->Descricao = request('Descricao');

        // Save it to the database

        $buses->save();

        return redirect('/buses')->withMessage("Autocarro editado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buses $bus)
    {
        $del = Buses::findOrFail($bus->id);
        $del->delete();

        return back()->withMessage("Autocarro eliminado com sucesso!");
    }
}
