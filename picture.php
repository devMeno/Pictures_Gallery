<?php

if(!empty($_FILES['picture'])){

     var_dump($_FILES['picture']);

     $picName = $_FILES['picture']['name'];
     $picTmp = $_FILES['picture']['tmp_name'];
     $picType = $_FILES['picture']['type'];
     $picError = $_FILES['picture']['error'];
     $picSize = $_FILES['picture']['size'];
     $picTitle = $_POST['title'];
     $picDescription = $_POST['description'];

     $ext = explode('.',$picName);
     $extension = strtolower(end($ext));

     $possibleExt = array('jpg','jpeg','png','gif');

     if(in_array($extension , $possibleExt)){

          if($picError === 0){

               if($picSize<=1000000){

                    $picNewName = uniqid('',true).'.'.$extension;
                    $dossier = 'Téléchargements/'.$picNewName;

                    move_uploaded_file($picTmp , $dossier);

                    include_once('db_connexion.php');
                    $requete = 'INSERT INTO images(picture_name,uniq_id,tmp_name,size,img_type,img_title,img_description) VALUES(:nom, :id_uniq, :tmp, :taille, :img_type, :titre, :descript)';
                    $req = $bdd->prepare($requete);
                    $result = $req->execute(array(
                         'nom'=>$picName,
                         'id_uniq'=>$picNewName,
                         'tmp'=>$picTmp,
                         'taille'=>$picSize,
                         'img_type'=>$picType,
                         'titre'=>$picTitle,
                         'descript'=>$picDescription
                    ));

                    header('Location:index.php');

               }else{
                    echo "Fichier trop volumineux!";
               }

          }else{
               echo "Erreur de téléchargement!";
          }

     }else{
          echo "Type de fichier non pris en charge!";
     }
}