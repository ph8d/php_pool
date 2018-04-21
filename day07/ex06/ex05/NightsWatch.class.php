<?php

class NightsWatch {

    private $members_of_the_nights_watch = array();

    public function recruit($person) {
        $this->members_of_the_nights_watch[] = $person;
    }

    public function fight() {
        foreach ($this->members_of_the_nights_watch as $member) {
            if (method_exists($member, "fight")) {
                $member->fight();
            }
        }
    }
}

?>