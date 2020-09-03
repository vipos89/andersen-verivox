<?php


namespace App\Strategies\Tariff;


use App\Interfaces\TariffInterface;

class PackagedTariff implements TariffInterface
{
    public const BASE_COST_PER_YEAR = 800;
    public const INCLUDED_KWH = 4000;
    public const PRICE_FOR_KWH_IN_CENTS = 30;
    public const TARIFF_NAME = "Packaged tariff";

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
        return self::BASE_COST_PER_YEAR;
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
        $kwhToPay = $kwh - self::INCLUDED_KWH;
        $kwhToPay = $kwhToPay < 0 ? 0 : $kwhToPay;

        return ($kwhToPay * self::PRICE_FOR_KWH_IN_CENTS) / 100;
    }

    /**
     * Get tariff name
     *
     * @return string
     */
    public function getName()
    {
        return self::TARIFF_NAME;
    }
}
