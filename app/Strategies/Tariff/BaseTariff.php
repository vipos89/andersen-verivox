<?php


namespace App\Strategies\Tariff;


use App\Interfaces\TariffInterface;

class BaseTariff implements TariffInterface
{
    public const BASE_COST_PER_MONTH = 5;

    public const PRICE_FOR_KWH_IN_CENTS = 22;

    public const TARIFF_NAME = 'basic electricity tariff';

    /**
     * Get annual cost per year
     *
     * @param int $kwh count of kws
     *
     * @return float|int
     */
    public function calculate(int $kwh)
    {
        return $this->getBaseCostPerYear() + $this->getCostForKilowatts($kwh);
    }

    /**
     * Get base cost per year
     *
     * @return int|float
     */
    public function getBaseCostPerYear()
    {
        return self::BASE_COST_PER_MONTH * 12;
    }

    /**
     * Get cost for kilowatts
     *
     * @param int $kwh count of kws
     *
     * @return float|int
     */
    public function getCostForKilowatts(int $kwh)
    {
        return (self::PRICE_FOR_KWH_IN_CENTS * $kwh) / 100;
    }


    /**
     * Get tariff name
     *
     * @return string
     */
    public function getName(): string
    {
        return self::TARIFF_NAME;
    }
}
