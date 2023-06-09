<?php
include_once 'mysql.php';
include_once 'arraylist.php';

function getEventList ( ) {
    global $mysql;
    $eList = new ArrayList ( );
    $query = "SELECT stamp,replace(replace(server,'OLDSWEDES.SE - ',''),' Maps','') as server,substring_index(replace(map,'/',' '),' ',-1) as map,round,killer,victim,info FROM event ORDER BY stamp DESC";
    $stmt = $mysql->prepare ( $query ) or die ( "Error: " . $mysql->getError ( ) );
    $stmt->execute ( ) or die ( "Error: " . $mysql->getError ( ) );
    $stmt->store_result ( );
    $stmt->bind_result ( $stamp, $server, $map, $round, $killer, $victim, $info ) or die ( "Error: " . $mysql->getError ( ) );
    while ( $stmt->fetch ( ) ) {
        $eList->add ( new Event ( $stamp, $server, $map, $round, $killer, $victim, $info ) );
    }
    return $eList;
}
/*
MariaDB [gameanalyzer]> desc kills;
+----------------+-------------+------+-----+---------+----------------+
| Field          | Type        | Null | Key | Default | Extra          |
+----------------+-------------+------+-----+---------+----------------+
| id             | int(11)     | NO   | PRI | NULL    | auto_increment |
| stamp          | datetime    | YES  |     | NULL    |                |
| server         | varchar(64) | NO   |     | NULL    |                |
| map            | varchar(64) | NO   |     | NULL    |                |
| round          | int(11)     | NO   |     | NULL    |                |
| killer_steamid | varchar(32) | NO   |     | NULL    |                |
| killer_name    | varchar(64) | NO   |     | NULL    |                |
| victim_steamid | varchar(32) | NO   |     | NULL    |                |
| victim_name    | varchar(64) | NO   |     | NULL    |                |
| weapon         | varchar(32) | NO   |     | NULL    |                |
| suicide        | int(11)     | NO   |     | NULL    |                |
| teamkill       | int(11)     | NO   |     | NULL    |                |
| headshot       | int(11)     | NO   |     | NULL    |                |
| penetrated     | int(11)     | NO   |     | NULL    |                |
| thrusmoke      | int(11)     | NO   |     | NULL    |                |
| blinded        | int(11)     | NO   |     | NULL    |                |
+----------------+-------------+------+-----+---------+----------------+
16 rows in set (0.001 sec)
*/

function getTopPlayers( ) {
    global $mysql;
    $playerList = new ArrayList();
    $query = "SELECT k.killer_steamid, 
                     k.killer_name, 
                     (SELECT COUNT(*) FROM kills WHERE killer_steamid = k.killer_steamid) as kills, 
                     (SELECT COUNT(*) FROM kills WHERE victim_steamid = k.killer_steamid) as deaths,
                     SUM(k.headshot) as headshots, 
                     SUM(k.suicide) as suicides, 
                     SUM(k.teamkill) as teamkills,
                     SUM(k.penetrated) as penetrated, 
                     SUM(k.thrusmoke) as thrusmoke, 
                     SUM(k.blinded) as blinded
              FROM kills as k
              GROUP BY killer_steamid, killer_name
              ORDER BY kills DESC";
              
    $stmt = $mysql->prepare($query) or die("Error: " . $mysql->getError());
    $stmt->execute() or die("Error: " . $mysql->getError());
    $stmt->store_result();
    $stmt->bind_result($steamid, $name, $kills, $deaths, $headshots, $suicides, $teamkills, $penetrated, $thrusmoke, $blinded) or die("Error: " . $mysql->getError());

    while ($stmt->fetch()) {
        $player = new Player($steamid, $name, $kills, $deaths, $headshots, $suicides, $teamkills, $penetrated, $thrusmoke, $blinded);
        $playerList->add($player);
    }

    return $playerList;
}

?>