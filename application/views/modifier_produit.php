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
  <section id="header_1b" class="row sticky-top" >
    <div class="col-4">
      <a href="<?php echo base_url();?>index.php/Mon_controleur/"><img src="<?php echo base_url();?>images/logo.png" alt="mon logo" class="logo shadow-lg"></a>
    </div>
    <div class="col-6">

    </div>
    <div class="col-auto">
        <ul class="navbar-nav ml-auto">
            <a id="lien_header_1" class="nav-link shadow-lg" href="<?php echo site_url('index.php/Mon_controleur/logout');?>">Se deconnecter </a>                                  
        </ul>
        </div>

  </section>
      <?php $produit = $produit->result(); ?>

        <div class="main"> 
            <div class="container">
            <section class="sing-in">
                <div class="signin-contentcenter">
                    <?php  echo  validation_errors ();?>
                    <?php  echo  form_open('index.php/Mon_controleur/do_modifier/'.$produit[0]->id_produit);  ?> 
                    
                    <div class="form-group">
                        <input type = "text" name = "nom_produit" class="form-control" value = "<?php echo $produit[0]->nom_produit ; ?>"  />       
                    </div>

                    <div class="form-group">
                        <input type="text" class ="form-control" name ="prix"  value = "<?php echo $produit[0]->prix ; ?>" >
                    </div> 

                    <div class="form-group">
                        <input type="text" name = "imageProduit" class="form-control" value = " <?php echo $produit[0]->imageProduit; ?> " />       
                    </div>

                    <div class="form-group">
                    </div>  

                    <div class="form-group green-border-focus">
                        <textarea name="descriptionProduit" class="form-control" id="description_produit" rows="3"><?php echo $produit[0]->descriptionProduit; ?></textarea>
                    </div>

                    <div class="form-group">
                        <input type="text" class ="form-control" name ="id_categorie" value = "<?php echo $produit[0]->id_categorie ; ?>">
                    </div>

                    <button type="submit" class="btn btn-success">Modifier</button>
                   
                    <?php echo form_close();?>

                </div>

        </section>
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