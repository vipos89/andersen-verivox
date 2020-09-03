<?php

namespace Tests\Feature;

use App\Strategies\Tariff\BaseTariff;
use App\Strategies\Tariff\PackagedTariff;
use App\Strategies\Tariff\TariffContext;
use Tests\TestCase;

class TariffTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCalculation(): void
    {
        $data = [
            [
                'kwh'=> 3500,
                'expected'=>[830, 800]
            ],
            [
                'kwh'=> 4500,
                'expected'=>[1050, 950]
            ],
            [
                'kwh'=> 6000,
                'expected'=>[1380, 1400]
            ]
        ];
        $baseTariff = new BaseTariff();
        $packagedTariff = new PackagedTariff();
        $context = new TariffContext();

        foreach ($data as $item){
            [$productAExpected, $productBExpected] = $item['expected'];
            $context->setStrategy($baseTariff);
            $this->assertEquals($productAExpected, ($context->getCost($item['kwh'])['annual_cost']));
            $context->setStrategy($packagedTariff);
            $this->assertEquals($productBExpected, ($context->getCost($item['kwh'])['annual_cost']));
        }

    }
}
