<?php


namespace App\Interfaces;


interface TariffInterface
{
    public function calculate(int $kwh);

    public function getBaseCostPerYear();

    public function getCostForKilowatts(int $kwh);

    public function getName();


}
