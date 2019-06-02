<?php
    class Mon_controleur extends CI_Controller 
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('Sama_model');
        }
    
        public function index()
        {
            $data = array();   
            $data["catégories"] = $this->Sama_model->samay_Categories();
            $data["produits"] = $this->Sama_model->lesPlusVendus() ;
                $this->load->view('accueil_vue',$data);              
        }

/* Coootroleur de la page Marque */
        public function marques($id_catégories)
        {
            $data = array();
            $data["catégories"] = $this->Sama_model->samay_Categories();
            $data["produits"] = $this->Sama_model->Produits_par_Categorie($id_catégories) ;

            $this->load->view('marques_vue',$data);
        }

        
        /*ajoute la produit id_produit dans la table achat avec l'utilisateur */
        public function acheter($id_produit,$id_utilisateur){
            if (!$this->Sama_model->est_dans_achat($id_produit)) {// si c'est pas encore acheté
                $this->Sama_model->ajouter_achat($id_utilisateur,$id_produit);
            }
                redirect('index.php/Mon_controleur/');// on aurait pu donner un message
        }

/* Coootroleur de la page datail_vue */
        public function detail($id_produit)
        {
            $data = array();
            $data["catégories"] = $this->Sama_model->samay_Categories();
            $data["produit_to_detail"] = $this->Sama_model->get_Produit($id_produit) ;
            $id_produit = $this->Sama_model->get_Produit($id_produit) ;
            $this->load->view('detail_vue',$data);
        }

/* Coootroleur de la page de la creation de compte */
        public function sing_up(){
            $data = array();
            $data["catégories"] = $this->Sama_model->samay_Categories();
            $this->load->view('creer_compte_vue', $data);
        }
        
        /* Fonction pour tester si un role a ete choisi */
        function check_default($idRole)
        {
        return $idRole == '0' ? FALSE : TRUE;
        }

        /* Fonction de validation de la creation de compte */
        public function valider_sing_up()
        {
            $data = array();
            $data["catégories"] = $this->Sama_model->samay_Categories();
            $this->load->library('form_validation');
            // controle de saisie
            $this->form_validation->set_rules('prenom', 'Prenom', 'trim|required');
            $this->form_validation->set_rules('nom', 'Nom', 'trim|required');
            $this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('confirm_email', 'Email Confirmation', 'trim|required|matches[email]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
            $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
            $this->form_validation->set_rules('Role','Le role','required|callback_check_default');
            $this->form_validation->set_message('check_default', 'Choisisez un role');
        
            if($this->form_validation->run() == FALSE) {//mauvais format
                $this->load->view('creer_compte_vue',$data);
            } else {
            // post values
            $data = array(
                "email"=> $this->input->post("email"),
                "mot_de_passe"=> $this->input->post("password"),
                "nom"=> $this->input->post("nom"),
                "prenom"=> $this->input->post("prenom"),
                "date_de_naissaance"=> $this->input->post('birthday'),
                "idRole"=> $this->input->post("Role"),
            );
            // insert values in database
            $this->Sama_model->creer_utilisateur($data);
            redirect('index.php/Mon_controleur/login');
            }
        }

        /* Conroleur pour la page creer_compte */
        public function login(){
                $data = array();
                $data["catégories"] = $this->Sama_model->samay_Categories();
                $this->load->view('login', $data);
        }

        function doLogin() {
            $data = array();
            $data["catégories"] = $this->Sama_model->samay_Categories();
            // Check form  validation
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if($this->form_validation->run() == FALSE) {
              //Field validation failed.  User redirected to login page
              $this->load->view('login',$data);
            } else {  
              $session_data = array();
              $data = array(
                'username' => $this->input->post('email'),
                'password' => $this->input->post('password')
                );
                $result = $this->Sama_model->login($data);
                if($result) {
                        foreach($result as $row) {
                        $session_data = array(
                        'id_utilisateur' => $row->id_utilisateur,
                        'email' => $row->email,
                        'nom' => $row->nom,
                        'prenom' => $row->prenom,
                        'idRole' => $row->idRole,
                        'logged_in' => TRUE,
                    );
                    $this->session->set_userdata($session_data);
                    $data["catégories"] = $this->Sama_model->samay_Categories();
                    /* Tester le role du demandant de connexion */
                    if ($session_data['idRole']== '1') {//admin
                        $data["produits"] = $this->Sama_model->samay_produit() ;
                        redirect('index.php/Mon_controleur/liste_produit');
                    }else{//client
                        $data["produits"] = $this->Sama_model->lesPlusVendus() ;
                        redirect('index.php/Mon_controleur/');
                    }
                }
              } else {//erreur de compatiblité avec la base
                redirect('index.php/Mon_controleur/login?msg=1');
              } 
            }
          }


        /* Permet de faire la deconnexion mais aussi de libere le cash */
        public function logout() {
            $this->load->library('form_validation');
            $this->session->unset_userdata('id_utilisateur');
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('is_authenticated');
            $this->session->sess_destroy();
            $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
            $this->output->set_header("Pragma: no-cache");
            redirect('index.php/Mon_controleur/');
        
        }
        
        /* ======= Les fonction de l'admin Admin */

        /* charge la page liste des produits */
        public function liste_produit(){
            $data = array();
            $data["produit"]=$this->Sama_model->samay_produit();
            $this->load->view('liste_produit',$data);
        }

        /* charge la page d'ajout de liste */
        public function ajouter_produit(){
            $data = array();
            $data["produit"]=$this->Sama_model->samay_produit();
            $this->load->view('ajouter_produit',$data);
        }

        /* Supprimer un prodiuit qui a comme id, id_produit */
        public function supprimer($id_produit){
            $this->Sama_model->supprimer($id_produit);
            redirect('index.php/Mon_controleur/liste_produit');
        }

        /* Ajouter un prodiuit apartir du formulaire d'ajout de produit */
        public function do_ajouter(){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nomproduit','Nom Produit','trim|required');
            $this->form_validation->set_rules('prix','Prix','trim|required');
            $this->form_validation->set_rules('image','Image','trim|required');
            $this->form_validation->set_rules('description','Description','trim|required');
            $this->form_validation->set_rules('idcategorie','Id Categorie','trim|required');
            
            if($this->form_validation->run()=== FALSE){
                redirect('index.php/Mon_controleur/ajouter_produit');
            }else{
                $this->Sama_model->ajouter();
                redirect('index.php/Mon_controleur/liste_produit');
            }
        }

        /* charge la page modifier produit */
        public function modifer_produit($id_produit){
            $data = array();
            $data["produit"]=$this->Sama_model->get_Produit($id_produit);
            $this->load->view('modifier_produit',$data);
        }

        /* Modifier le produit id_produit */
        public function do_modifier($id_produit){
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nom_produit','Nom Produit','trim|required');
            $this->form_validation->set_rules('prix','Prix','trim|required');
            $this->form_validation->set_rules('descriptionProduit','Description','trim|required');
            $this->form_validation->set_rules('imageProduit','Image','trim|required');
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div');
            if($this->form_validation->run()){
                $data = $this->input->post();
                $this->Sama_model->modifier($id_produit,$data);
                redirect('index.php/Mon_controleur/liste_produit');
            }
            else{
                $this->modifer_produit($id_produit);
            }
        }
    }



?>