<?php

   function connect()
    {
        try {
            //code...
            $hn = 'localhost';
            $db = 'aulfms';
            $un = 'root';
            $pw = '';
            $conn = new mysqli($hn, $un, $pw, $db, 3308);  
            return $conn;
        } catch (PDOException $th) {
            print "Error!: ". $th->getMessage(). "<br>";
            die();
        }
    }

?>