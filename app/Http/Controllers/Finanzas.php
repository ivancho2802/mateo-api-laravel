<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adn;

class Finanzas extends Controller
{
    //
    function index()
    {

        $adn = [
            "adns" => Adn::get() ?? []
        ];

        return view('finanzas.adn', $adn);
    }

    function all()
    {

        $adn = [
            "adns" => Adn::get() ?? []
        ];

        return response()->json(['status' => true, 'data' => $adn], 200);
    }


    function set(Request $request)
    {

        $request->all();
        $data = $request->except(['_token']);

        $adnCreate = Adn::first()->updateOrCreate($data);
        $adn = [
            "adns" => Adn::get() ?? []
        ];

        if (!isset($adnCreate)) {
            return view('finanzas.adn', [$adn, "error" => "fallo al crear intentelo de nuevo o conatcte soporte"]);
        }

        $adn['success'] = "Operacion relaizada con exitpo";

        return view('finanzas.adn', $adn);
    }

    function getLoaExtra(){

        $adn = [
            "dinero_ahorrado_x_persona" => "30",
            "grupo_ahorro" => "67",
            "personas_bancarizadas" => "235"
        ];

        return response()->json(['status' => true, 'data' => $adn], 200);
    }

    function getCuaIndHog() {

        
    }
}
