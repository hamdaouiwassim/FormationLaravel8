<?php


// traitements

include "traitement/connexion.php";

function getPosts($chaine){
    $requette = "SELECT * FROM posts";
    //cho $requette;
    $resultat = $chaine->query($requette);
    $postsfunction = $resultat->fetchAll();
    return $postsfunction;
}

$posts = getPosts($conn);

if (isset($_POST['submit'])){
   // echo "form submited";
   $requette = "INSERT INTO posts(nom,description) VALUES('".$_POST['nom']."','".$_POST['description']."')";
   //echo $requette;
   $conn->query($requette);
  $posts = getPosts($conn);

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">News App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" data-bs-toggle="modal" data-bs-target="#exampleModal" aria-current="page" >Ajouter</a>
        </li>
       
      
       
      </ul>
    
    </div>
  </div>
</nav>

<div class="container mt-4">
        <table class="table table-hover table-bordered">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Description</th>
            
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                        foreach($posts as $index=>$post){
                                    print '<th scope="row">'.($index+1).'</th>
                                    <td>'.$post['nom'].'</td>
                                    <td>'.$post['description'].'</td>
                                    
                                    </tr>';
                        }
                ?>
            
        
        
        </tbody>
        </table>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="" method="post">
      <input type="text" name="nom" class="form-control" placeholder="nom ....">
      <textarea placeholder="description ...." name="description" class="form-control"></textarea>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</html>