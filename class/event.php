<?php

/* 
    Class Event

    This class is used to store the information of an event.
*/

class Event {
    private $stamp;
    private $server;
    private $map;
    private $attacker;
    private $victim;
    private $info;

    public function __construct($stamp, $server, $map, $attacker, $victim, $info) {
        $this->stamp = $stamp;
        $this->server = $server;
        $this->map = $map;
        $this->attacker = $attacker;
        $this->victim = $victim;
        $this->info = $info;
    }

    public function getStamp() {
        return $this->stamp;
    }

    public function getServer() {
        return $this->server;
    }

    public function getMap() {
        return $this->map;
    }

    public function getAttacker() {
        return $this->attacker;
    }

    public function getVictim() {
        return $this->victim;
    }

    public function getInfo() {
        return $this->info;
    }

}
?>