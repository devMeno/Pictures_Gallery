<?php

try{
     $bdd = new PDO('mysql:host=localhost;dbname=pictures_gallery','root','');
}catch(Exception $e){
     die('Erreur: ' . $e->getMessage());
}