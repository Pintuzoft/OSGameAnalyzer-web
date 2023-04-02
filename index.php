<?php
date_default_timezone_set('Europe/Stockholm');
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include_once 'class/config.php';
include_once 'class/mysql.php';
include_once 'class/arraylist.php';
include_once 'class/functions.php';
include_once 'class/event.php';
include_once 'class/user.php';

echo "<html>\n";

echo "  <head>\n";
echo "    <title>Knivhelg - Kniva en Admin!</title>\n";
echo "    <link rel='stylesheet' type='text/css' href='css/default.css'>\n";

/* JQUERY */
echo "    <script src='https://code.jquery.com/jquery-3.6.0.min.js' integrity='sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=' crossorigin='anonymous'></script>\n";

/* METAREFRESH */
echo "    <meta http-equiv='refresh' content='120'>\n";

/* BOOTSTRAP */
echo "    <link rel='stylesheet' type='text/css' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css'>\n";

/* DATATABLES */
echo "    <link rel='stylesheet' type='text/css' href='https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css'>\n";

echo "  </head>\n";

echo "  <body style='background-color:#282828; color:#EFEFEF'>\n";

  
/* HEADER */
echo "    <div id='header' class='container-fluid'>\n";
echo "      <div id='logo'>\n";
echo "        <a href='index.php'><img src='images/oldswedes.logo.motto.small.png' alt='My Logo' /></a>\n";
echo "      </div>\n";
echo "    </div>\n";


/* CONTENT LEFT*/
echo "    <div id='content' class='container-fluid'>\n";
echo "      <div id='content-main' class='container'>\n";
echo "        <h2 style='color:#fbb204'>GameAnalyzer</h2>\n";
echo "        <p style='font-size:14px'>GameAnalyzer is a tool I made to more easilly identify and list interesting situations in demos</p>\n";

echo "        <div id='content-main-inner' class='row'>\n";
echo "          <div id='content-left' class='col col-2'>\n";
echo "              <h4 style='color:#fbb204'></h4>\n";
echo "              <ul>\n";
echo "              </ul>\n";
echo "          </div>\n";

echo "          <div id='content-middle' class='col col-10'>\n";
echo "            <h4 style='color:#fbb204'>Latest events</h4>\n";
echo "             <table id='eventlist' class='table table-bordered' style='background-color: #FAFAFA;'>\n";

echo "              <thead class='table-dark'>\n";
echo "                <tr>\n";
echo "                  <th class='col-1'>Time</th>\n";
echo "                  <th class='col-1'>Server</th>\n";
echo "                  <th class='col-1'>Map</th>\n";
echo "                  <th class='col-2'>Attacker</th>\n";
echo "                  <th class='col-2'>Victim</th>\n";
echo "                  <th class='col-3'>Information</th>\n";
echo "                </tr>\n";
echo "              </thead>\n";

echo "              <tbody>\n";

$eList = getEventList ( );
foreach ( $eList->getArray() as $event ) {
    echo "                <tr >\n";
    echo "                  <td class='col-1'>".$event->getStamp()."</td>\n";
    echo "                  <td class='col-1'>".$event->getServer()."</td>\n";
    echo "                  <td class='col-1'>".$event->getMap()."</td>\n";
    echo "                  <td class='col-2'>".$event->getAttacker()."</td>\n";
    echo "                  <td class='col-2'>".$event->getVictim()."</td>\n";
    echo "                  <td class='col-3'>".$event->getInfo()."</td>\n";
    echo "                </tr>\n";
}

echo "              </tbody>\n";
echo "            </table>\n";
echo "          </div>\n";


/* FOOTER */ 
echo "    <div id='footer'>\n";
echo "      <div id='footer_content'>\n";
echo "      </div>\n";
echo "    </div>\n";

/* SCRIPTS */
echo "    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>\n";
echo "    <script type='text/javascript' src='https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js'></script>\n";
echo "    <script type='text/javascript' src='https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js'></script>\n";
echo "    <script type='text/javascript'>\n";
echo "            $(document).ready(function() {\n";
echo "              $('#eventlist').DataTable({\n";
echo "                'paging': false,\n";
echo "                'searching': true,\n";
echo "                'info': false,\n";
echo "                'order': [[ 0, 'desc' ]]\n";
echo "              });\n";
echo "            });\n";
echo "    </script>\n";
echo "  </body>\n";
echo "</html>\n";


?>
