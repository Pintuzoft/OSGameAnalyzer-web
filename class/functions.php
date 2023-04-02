<?php
include_once 'mysql.php';
include_once 'arraylist.php';

function getEventList ( ) {
    global $mysql;
    $eList = new ArrayList ( );
    $query = "SELECT stamp,replace(replace(server,'OLDSWEDES.SE - ',''),' Maps','') as server,substring_index(replace(map,'/',' '),' ',-1) as map,killer,victim,info FROM event ORDER BY stamp DESC";
    $stmt = $mysql->prepare ( $query ) or die ( "Error: " . $mysql->getError ( ) );
    $stmt->execute ( ) or die ( "Error: " . $mysql->getError ( ) );
    $stmt->store_result ( );
    $stmt->bind_result ( $stamp, $server, map, $killer, $victim, $info ) or die ( "Error: " . $mysql->getError ( ) );
    while ( $stmt->fetch ( ) ) {
        $eList->add ( new Event ( $stamp, $server, $map, $killer, $victim, $info ) );
    }
    return $eList;
}

?>