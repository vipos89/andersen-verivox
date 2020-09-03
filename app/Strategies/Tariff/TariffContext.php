<?php


namespace App\Strategies\Tariff;


use App\Interfaces\TariffInterface;

class TariffContext
{
    /**
     * @var TariffInterface
     */
    private $tariffStrategy;


    /**
     * Set strategy
     *
     * @param TariffInterface $tariffStrategy strategy class
     *
     * @return void
     */
    public function setStrategy(TariffInterface $tariffStrategy): void
    {
        $this->tariffStrategy = $tariffStrategy;
    }

    /**
     * Get cost for strategy
     *
     * @param int $kwh kilowatts for calculation
     *
     * @return array
     */
    public function getCost(int $kwh): array
    {
        return [
            'annual_cost'=> $this->tariffStrategy->calculate($kwh),
            'name'=> $this->tariffStrategy->getName()
        ];
    }

}
