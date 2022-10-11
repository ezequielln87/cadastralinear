<?php
class conecta
{
    function conecta(){
        $mysqli = new mysqli("localhost", "root","satelite","catracas");
        return $mysqli;
    }

}