<?php
/**
 * Data Base settings : <p>
 * $DB_settings[0] == ip adress <br>
 * $DB_settings[1] == table name <br>
 * $DB_settings[2] == user acces  <br>
 * $DB_settings[3] == password <br>
 * 
 * <b> NOTE: for local developpement </b> <br>
 * Windows ---> $DB_settings[3] = "" <br>
 * Mac/Linux --> $DB_settings[3] = "root" <br>
 */
    $DB_settings = array();
    array_push($DB_settings,'localhost' ); 
    array_push($DB_settings,'cloudia' ); 
    array_push($DB_settings,'root' ); 
    array_push($DB_settings,'password' ); 
    return $DB_settings;   
?>