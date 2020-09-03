<?php


namespace App\Interfaces;


interface TariffInterface
{

    /**
     * @param int $kwh
     * @return int|float
     */
    public function calculate(int $kwh);

    /**
     * @return int|float
     */
    public function getBaseCostPerYear();

    /**
     * @param int $kwh
     *
     * @return int|float
     */
    public function getCostForKilowatts(int $kwh);

    /**
     * @return string
     */
    public function getName(): string;


}
