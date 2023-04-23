<?php
class Player {
    public $steamid;
    public $name;
    public $kills;
    public $deaths;
    public $headshots;
    public $suicides;
    public $teamkills;
    public $penetrated;
    public $thrusmoke;
    public $blinded;

    public function __construct($steamid, $name, $kills, $deaths, $headshots, $suicides, $teamkills, $penetrated, $thrusmoke, $blinded) {
        $this->steamid = $steamid;
        $this->name = $name;
        $this->kills = $kills;
        $this->deaths = $deaths;
        $this->headshots = $headshots;
        $this->suicides = $suicides;
        $this->teamkills = $teamkills;
        $this->penetrated = $penetrated;
        $this->thrusmoke = $thrusmoke;
        $this->blinded = $blinded;
    }

    public function getSteamid() {
        return $this->steamid;
    }   

    public function getName() {
        return $this->name;
    }

    public function getKills() {
        return $this->kills;
    }

    public function getDeaths() {
        return $this->deaths;
    }

    public function getHeadshots() {
        return $this->headshots;
    }

    public function getSuicides() {
        return $this->suicides;
    }

    public function getTeamkills() {
        return $this->teamkills;
    }

    public function getPenetrated() {
        return $this->penetrated;
    }

    public function getThrusmoke() {
        return $this->thrusmoke;
    }

    public function getBlinded() {
        return $this->blinded;
    }

}