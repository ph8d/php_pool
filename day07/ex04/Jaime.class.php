<?php

class Jaime {

    public function sleepWith($partner) {

        if ($partner instanceof  Tyrion) {
            echo "Not even if I'm drunk !" . PHP_EOL;
        } else if ($partner instanceof Sansa) {
            echo "Let's do this." . PHP_EOL;
        } else {
            echo "With pleasure, but only in a tower in Winterfell, then." . PHP_EOL;
        }

    }

}

?>