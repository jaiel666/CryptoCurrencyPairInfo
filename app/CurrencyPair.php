<?php
namespace App;

class CurrencyPair
{
    private Currency $baseCurrency;
    private Currency $quoteCurrency;

    public function __construct(Currency $baseCurrency, Currency $quoteCurrency)
    {
        $this->baseCurrency = $baseCurrency;
        $this->quoteCurrency = $quoteCurrency;
    }

    public function getSymbol()
    {
        return strtoupper($this->baseCurrency->getIsoCode()) . strtoupper($this->quoteCurrency->getIsoCode());
    }
}