<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusSearchRequest;
use App\Http\Requests\BusStoreRequest;
use App\Http\Requests\BusUpdateRequest;
use App\Models\Brand;
use App\Models\Bus;
use App\Models\Company;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $ids = Bus::select('id')->get();

        return view(
            'buses.list',
            compact(
                'buses',
                'brands',
                'companies',
                'selectStates',
                'states',
                'images',
                'ids')
        );
    }

    /**
     * Search for the resource.
     *
     */
    public function search(BusSearchRequest $request)
    {
        DB::connection()->enableQueryLog();
//        $states = State::whereIn('id', [1, 2, 4, 5, 6, 7])->get();
        $brands = Brand::latest()->get();
        $companies = Company::latest()->get();
        $selectStates = State::latest()->get();
        $states = State::latest()->get();
        $images = Media::latest()->get();
        $ids = Bus::select('id')->get();
        $buses = Bus::query();
        $searchString = $request->field;

        if ($request->filled('field')) {
            $buses->where('licence_plate', 'LIKE', '%'.$searchString.'%')
                ->orWhere('model', 'LIKE', '%'.$searchString.'%');
        }
        if ($request->filled('state')) {
            $buses->where('state_id', $request->state);
        }
        if ($request->filled('select_id')) {
            $buses->where('id', $request->select_id);
        }
        if ($request->filled('brand_select_search')) {
            $buses->where('brand_id', $request->brand_select_search);
        }
        if ($request->filled('company_select_search')) {
            $buses->where('company_id', $request->company_select_search);
        }
        if ($request->filled('field_date')) {
            switch ($request->select_date) {
                case ('created_at'):
                    $created_at = Carbon::createFromFormat('d, M Y', $request->field_date);
                    $buses->where('created_at','LIKE', '%'.$created_at->format('Y-m-d').'%');
                    break;
                case ('prod_year'):
                    $prod_year = Carbon::createFromFormat('d, M Y', $request->field_date);
                    $buses->where('prod_year','=',  $prod_year->format('Y-m-d'));
                    break;
            }
        }

        $busesResult = $buses->latest()->paginate(15);

//        $queries = DB::getQueryLog();
//        dd($queries, $busesResult);
        return view(
            'buses.list', [
                'buses' => $busesResult,
            ], compact(
                'buses',
                'states',
                'companies',
                'selectStates',
                'images',
                'brands',
                'ids'
            )
        );
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
            'old_licence_plate' => $request->old_licence_plate,
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
     * History page for the Buses
     *
     */
    public function history()
    {
        $buses = Bus::latest()->paginate(15);
        $brands = Brand::latest()->get();
        $companies = Company::latest()->get();
        $selectStates = State::latest()->get();
        $states = State::latest()->get();
        $images = Media::latest()->get();
        $ids = Bus::select('id')->get();

        return view(
            'buses.history',
            compact(
                'buses',
                'brands',
                'companies',
                'selectStates',
                'states',
                'images',
                'ids')
        );
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Bus $bus)
    {
        return view('buses.show', compact('bus'));
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

        return view('buses.edit')->withBuses($bus);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(BusUpdateRequest $request, $id)
    {
        $bus = Bus::findOrFail($id);

        if ($bus) {
            // History Update
//            ActionBusHistory::create([
//                'bus_id' => $bus->id,
//                'user_id' => Auth::user()->id,
//                'action_id' => 2,
//            ]);

            return redirect(route('buses-list'))->with('success', __('Bus successfully Updated!'));
        } else {
            return redirect(url()->previous())->with('error', __('There was an error!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        $bus = Bus::findOrFail($id)->delete();

        if ($bus) {
            // History Delete
//            ActionBusHistory::create([
//                'bus_id' => $bus->id,
//                'user_id' => Auth::user()->id,
//                'action_id' => 3,
//            ]);

            return redirect(route('buses-list'))->with('success', __('Bus successfully Deleted!'));
        } else {
            return redirect(url()->previous())->with('error', __('There was an error!'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function trash()
    {
        $buses = Bus::latest()->paginate(15);
        $brands = Brand::latest()->get();
        $companies = Company::latest()->get();
        $selectStates = State::latest()->get();
        $states = State::latest()->get();
        $images = Media::latest()->get();
        $ids = Bus::select('id')->get();

        return view(
            'buses.trash',
            compact(
                'buses',
                'brands',
                'companies',
                'selectStates',
                'states',
                'images',
                'ids')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function restore($id)
    {
        $bus = Bus::findOrFail($id)->restore();

        if ($bus) {
            // History Restore
//            ActionBusHistory::create([
//                'bus_id' => $bus->id,
//                'user_id' => Auth::user()->id,
//                'action_id' => 4,
//            ]);

            return redirect(route('buses-restore'))->with('success', __('Bus successfully Restored!'));
        } else {
            return redirect(url()->previous())->with('error', __('There was an error!'));
        }
    }
}
