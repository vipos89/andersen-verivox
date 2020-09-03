<?php

namespace App\Http\Controllers;

use App\Strategies\Tariff\BaseTariff;
use App\Strategies\Tariff\PackagedTariff;
use App\Strategies\Tariff\TariffContext;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TariffController extends Controller
{

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function __invoke(Request $request)
    {
        $context = new TariffContext(new BaseTariff());
        $data[] = $context->getCost($request->input('kwh', 0));
        $context->setStrategy(new PackagedTariff());
        $data[] = $context->getCost($request->input('kwh', 0));
        $data = (collect($data))->sortBy('annual_cost')->values()->all();
        return response()->json($data);
    }
}
