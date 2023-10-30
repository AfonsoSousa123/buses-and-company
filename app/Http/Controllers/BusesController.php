<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusStoreRequest;
use App\Models\Brand;
use App\Models\Bus;
use App\Models\Company;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $buses = Bus::latest()->paginate(15);
        $brands = Brand::latest()->get();
        $companies = Company::latest()->get();
        $selectStates = State::latest()->get();
        $states = State::latest()->get();
        $images = Media::latest()->get();

        return view('buses.buses-list', compact('buses', 'brands', 'companies', 'selectStates', 'states', 'images'));
    }

    /**
     * Search for the resource.
     *
     */
    public function search()
    {
        $b = request('b');
        if($b != "") {
            $buses = Bus::where("Matricula", 'LIKE', '%' .$b. '%')
            ->orwhere("Marca", 'LIKE', '%' .$b. '%')
            ->orwhere("Modelo", 'LIKE', '%' .$b. '%')
            ->orwhere("Empresa", 'LIKE', '%' .$b. '%')
            ->get();

            if(count($buses) > 0)
                return view('buses.buses-list', compact('buses'))->withDetails($buses)->withQuery($b);

        }else{
            return view('buses.buses-list')->withMessage("Não foi encontrado nenhum Autocarro com esse nome!");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(BusStoreRequest $request)
    {
        // Formats the prod_year
        if ($request->filled('prod_year')) {
            $prod_year = Carbon::createFromFormat('d-m-Y', $request->prod_year);
        } else {
            $prod_year = null;
        }

        // Cria o Empréstimo
        $bus = Bus::create([
            'licence_plate' => $request->licence_plate,
            'user_id' => Auth::user()->id,
            'brand_id' => $request->brand_select,
            'company_id' => $request->company_select,
            'state_id' => $request->bus_state,
            'model' => $request->filled('model') != null ? $request->model : null,
            'prod_year' => $prod_year,
            'fuel' => $request->filled('fuel') != null ? $request->fuel : 'Diesel',
            'description' => $request->filled('description') != null ? $request->description : null,
//            'nome_levantamento' => $request->filled('nome_levantamento') != null ? $request->nome_levantamento : null,
        ]);

        // And then redirects to the home page
        if ($bus) {
            // Regista a acão de Criação do Empréstimo no Histórico
//            ActionBusHistory::create([
//                'bus_id' => $bus->id,
//                'user_id' => Auth::user()->id,
//                'action_id' => 1,
//            ]);

            return redirect(route('buses-list'))->with('success', 'Bus created successfully!');
        } else {
            return redirect(url()->previous())->with('error', 'There was an error!');
        }
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Bus $bus)
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
        $bus = Bus::findOrFail($id);

        return view('buses.edit_Buses')->withBuses($bus);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $buses)
    {
        $buses = Bus::find($buses);
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

        return redirect('/buses')->withMessage(__('Bus successfully updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Bus $bus)
    {
        $del = Bus::findOrFail($bus->id);
        $del->delete();

        return back()->withMessage(__('Bus successfully deleted!'));
    }
}
