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
      <link href="<?php echo base_url();?>style/css/mdb.css" rel="stylesheet"> 
      <link rel="stylesheet" href="<?php echo base_url();?>style/style.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
      <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>style/bootstrap_log.css">

  </head>
  <body>
    <!-- Premiere partie du header -->
  <section id="header_1" class="row" >
    <div class="col-4">
      <a href="<?php echo base_url();?>index.php/Mon_controleur/"><img src="<?php echo base_url();?>images/logo.png" alt="mon logo" class="logo shadow-lg"></a>
    </div>
    <div class="col-6">

    </div>
    <div class="col-auto">
    </div>
  </section>
      <!-- Deuxieme Partie du Header -->
      <?php $categorie = $catégories->result(); ?>
    <nav id="my_nav" class="navbar sticky-top navbar-expand-md navbar-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
          </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <?php for ($i=0; $i < 4; $i++) { ?>
                            <li class="nav-item">
                                <a class="nav-link shadow-lg" href="<?php echo site_url('index.php/Mon_controleur/marques/'.$categorie[$i]->id_categorie);?>"><?php echo $categorie[$i]->nomCatégorie;?> </a>                                  
                            </li>                            
                        <?php } ?>
                    </ul>   
                </div>
      </nav>


        <div class="main">  
          <section class="sign-in">
              <div class="container">
                  <div class="signin-content">
                      <div class="signin-image">
                          <img src="<?php echo base_url();?>images/logo.png" alt="sing up image"> 
                          <a href="#" class="signup-image-link">Create an account</a>
                      </div>
                        <div class="row page-content">
                          <div class="col-lg-12">
                            <h2>Creer compte</h2>
                            <?php if(validation_errors()) { ?>
                              <div class="alert alert-danger">
                                <?php echo validation_errors(); ?>
                              </div>
                            <?php } ?>
                            <?php echo form_open('index.php/Mon_controleur/valider_sing_up'); ?>
                            
                              <div class="form-group">
                                <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Prenom">
                              </div>
                              <div class="form-group">
                                <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom">
                              </div>
                              <div class="form-group">
                                <input type="date" name="birthday" class="form-control" id="birthday">
                              </div>
                              <hr><!-- l'indentification -->
                              <div class="form-group">
                                <select class="form-control" name="Role" id="Role">
                                    <option value="0">Role</option>
                                    <option value="1">Administrateur</option>
                                    <option value="2">Client</option>
                                </select>
                              </div>
                              
                              <div class="form-group">
                                <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                              </div>
                              <div class="form-group">
                                <input type="text" name="confirm_email" class="form-control" id="confirm_email" placeholder="Confirmer votre mail">
                              </div>
                              <div class="form-group">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                              </div>
                              <div class="form-group">
                                <input type="password" name="confirm_password" class="form-control" id="confirm-password" placeholder="Confirm Password">
                              </div>
                              <div class="form-group pull-center">
                                <button type="submit" id="lien_header_3" class="btn ">Creer Compte</button>
                              </div>
                            </div>
                            <?php echo form_close(); ?>
                          
                        </div>
                  </div>
              </div>
          </section>

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