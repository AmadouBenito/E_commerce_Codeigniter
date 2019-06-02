<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>The Home</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--Bootstrap -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <!-- Material Design and fonts -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
      <link href="<?php echo base_url();?>style/css/mdb.css" rel="stylesheet"> 
      <link rel="stylesheet" href="<?php echo base_url();?>style/style.css">
    </head>
  <body>
      <!-- Le NavBar -->
</head>
<body>
  <!-- Premiere partie du header -->
  <section id="header_1" class="row" >
    <div class="col-4">
      <!-- Image logo -->
      <a href="<?php echo base_url();?>index.php/Mon_controleur/"><img src="<?php echo base_url();?>images/logo.png" alt="mon logo" class="logo shadow-lg"></a>
    </div>
    <div class="col-6">
       
    </div>
    <div class="col-auto">
          <ul class="navbar-nav ml-auto">
                <!-- Bouton connection -->    
                <?php
                        if (isset($this->session->userdata['logged_in'])) { ?>  
                             <li class="nav-item">
                                <a id="lien_header_1" class="nav-link shadow-lg" href="<?php echo site_url('index.php/Mon_controleur/logout');?>">Se deconnecter </a>                                  
                            </li>
                      <?php  }else {?>
                        <li class="nav-item">
                      <a id="lien_header_1" class="nav-link shadow-lg" href="<?php echo site_url('index.php/Mon_controleur/login/');?>">Se Connecter </a>                                  
                  </li>
                  <li class="nav-item">
                      <a id="lien_header_1" class="nav-link shadow-lg" href="#">Creer compte</a>                                  
                  </li>  
                        <?php  }
                        ?>        
                                            
          </ul>
    </div>
  </section>
      <!-- Deuxieme Partie du Header -->
      <?php $categorie = $catégories->result(); ?>
    <nav id="my_nav" class="navbar sticky-top navbar-expand-md navbar-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
          </button>
        <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <?php for ($i=0; $i < 4; $i++) { ?>
                            <li class="nav-item">
                                <a class="nav-link shadow-lg" href="<?php echo site_url('index.php/Mon_controleur/marques/'.$categorie[$i]->id_categorie);?>"><?php echo $categorie[$i]->nomCatégorie;?> </a>                                  
                            </li>                            
                        <?php } ?>
                    </ul>   
                </div>
        </div>
      </nav>
        <?php $produit_ = $produit_to_detail->result(); ?>

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <img class="img-fluid" src="<?php echo base_url().$produit_[0]->imageProduit;?>" alt="">
                </div>
                <div class="col-md-4">
                  <!-- exuser le style dans le code.. il etait presque l'heure. Nous en somme-->
                    <h1 id="nom_produit" class="my-4" style="color: rgb(240, 77, 1)"><?php echo $produit_[0]->nom_produit;?></h1>
                    <p class="descriptionProduit" style="color : rgb(17, 6, 63)"><?php echo $produit_[0]->descriptionProduit;?></p>
                    <h3 class="my-3 prix" style="color: rgb(240, 77, 1)"><?php echo $produit_[0]->prix;?> FCFA</h3>
                    
                      <a href="
                      <?php 
                            if (isset($this->session->userdata['logged_in'])) {
                              echo site_url('index.php/Mon_controleur/acheter/'.$produit_[0]->id_produit.'/'.$this->session->userdata('id_utilisateur'));
                            }else{
                              echo site_url('index.php/Mon_controleur/login/');
                            } 
                      ?>">
                        <button class="btn btn_" style="background : rgb(17, 6, 63);  border-radius: 40%; color : rgb(240, 77, 1);  ">
                        Acheter
                        </button>
                      </a>
                </div>
            </div>
        </div>
                      
  <!-- Footer -->
  <footer id="sama_footer" class="page-footer font-small special-color-dark pt-4">
          <!-- Copyright -->
        
           <div class="row">
             <div class="col-4">
                <a href="#"> Liens Utils</a>
                <a href="#"> Contacter nous</a>
                <a href="#"> louka neikh</a>
              </div>
              <div class="col-4">
                2019 Copyright:
                <a href="#"> L3 INFO</a>
              </div>
                <div class="col-4">
                      <ul class="list-unstyled list-inline text-center">
                  <li class="list-inline-item">
                    <a class="btn-floating btn-fb mx-1">
                        <i class="fab fa-facebook-f"> </i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a class="btn-floating btn-tw mx-1">
                        <i class="fab fa-twitter"> </i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a class="btn-floating btn-gplus mx-1">
                        <i class="fab fa-google-plus-g"> </i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a class="btn-floating btn-li mx-1">
                        <i class="fab fa-linkedin-in"> </i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a class="btn-floating btn-dribbble mx-1">
                        <i class="fab fa-dribbble"> </i>
                      </a>
                    </li>
                  </ul>
                </div>
            
          </div>
      
        </footer>

        <!-- script -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

      
      
  </body> 
</html>