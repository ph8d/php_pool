<?php

abstract class House {

    abstract function getHouseName();
    abstract function getHouseSeat();
    abstract function getHouseMotto();

    public function introduce() {
        printf('House %s of %s : "%s"' . PHP_EOL, static::getHouseName(), static::getHouseSeat(), static::getHouseMotto());
    }

}

?>