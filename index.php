<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
     <title>Document</title>
     <link rel="stylesheet" href="index.css">
</head>
<body>
     <div class="container-fluid">
          <div class="container">
               <h1>My gallery</h1>
               <form action="picture.php" method="post" enctype="multipart/form-data">
                    <input type="text" placeholder="Titre de l'image" name="title">
                    <input type="text" placeholder="Description de l'image" name="description">
                    <div class="linear">
                         <input type="hidden" name="MAX_FILE_SIZE" value="1000000" class="gauche">
                         <input type="file" name="picture">
                         <input type="submit" value="Ajouter" name="submit" class="droite">
                    </div>
               </form>
          </div>
          <hr> 
          <div class="row" data-mason5ry='{"percentPosition": true }'>
                    <?php
                    
                    include('db_connexion.php');
                    $requete1 = 'SELECT uniq_id,img_title,img_description FROM images';
                    $req1 = $bdd->query($requete1);
                    $result1 = $req1->fetchAll();

                    //var_dump($result1);

                    function geturl($id){
                         $url = "Téléchargements/".$id;

                         return $url;
                    }

                    foreach($result1 as $image){
                         ?>   
                               <div class="col-sm-3"> 
                                   <img src="<?= geturl($image['uniq_id'])?>" alt="photo">
                                   <h2><?= $image['img_title'] ?></h2>
                                   <p><?= $image['img_description'] ?></p> 
                              </div>
                         <?php
                    }
                    ?>
          </div>
     

     </div>
</body>
</html>