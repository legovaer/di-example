<?php

namespace Legovaer\SDIE;

/**
 * Defines a BarTender class.
 */
class BarTender
{

    /**
     * @var string
     *   The bartender's favourite beer.
     */
    protected $favourite;

    /**
     * Constructs a BarTender object.
     *
     * @param string $favourite
     *   The bartender's favourite beer.
     */
    public function __construct($favourite) {
        $this->favourite = $favourite;
    }

    /**
     * Get the bartender's favourite beer.
     */
    public function getFavourite() {
        echo "My favourite beer? I'd recommend you a $this->favourite!\n";
    }
}
