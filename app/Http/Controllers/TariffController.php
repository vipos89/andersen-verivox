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
        $context = new TariffContext();
        $kws = $request->input('kwh', 0);
        $context->setStrategy(new BaseTariff());
        $baseTariff = $context->getCost($kws);
        $context->setStrategy(new PackagedTariff());
        $packageTariff = $context->getCost($kws);
        $data = (collect([$baseTariff, $packageTariff]))->sortBy('annual_cost')->values()->all();
        return response()->json($data);
    }
}
