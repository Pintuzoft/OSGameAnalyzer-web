<?php

/* 
    Class Event

    This class is used to store the information of an event.
*/

class Event {
    private $stamp;
    private $attacker;
    private $victim;
    private $info;

    public function __construct($stamp, $attacker, $victim, $info) {
        $this->stamp = $stamp;
        $this->attacker = $attacker;
        $this->victim = $victim;
        $this->info = $info;
    }

    public function getStamp() {
        return $this->stamp;
    }

    public function getAttacker() {
        return $this->attacker;
    }

    public function getVictim() {
        return $this->victim;
    }

    public function getInfo() {
        return $this->points;
    }

}
?>