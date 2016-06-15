<?php

namespace Legovaer\SDIE;

/**
 * Defines a BarClient.
 */
class BarClient
{

    /**
     * @var BarTender
     *   The BarTender that will serve us.
     */
    protected $bartender;

    /**
     * Constructs a BarClient object.
     *
     * @param BarTender $bartender
     *   The BarTender that will serve us.
     */
    public function __construct(BarTender $bartender)
    {
        $this->bartender = $bartender;
    }

    /**
     * Asks the BarTender about his favourite beer.
     */
    public function getBeer()
    {
        $this->bartender->getFavourite();
    }
}
