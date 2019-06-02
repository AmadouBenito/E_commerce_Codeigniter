<?php 
class Sama_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function samay_Categories()
    {
        $query = $this->db->get("catégories");
        return $query;
    }

    /* Tous les produits */
    public function samay_produit()
    {
        $query = $this->db->get("produits");
        return $query;
    }

      //Recupere les differents produits par categories
      public function lesPlusVendus()
      {
        $this->db->select('*');
        $this->db->from('produits');
        $this->db->join('achat', 'achat.id_prduit = produits.id_produit');
        $query = $this->db->get(); 
        return $query;
      }

    //Recupere les differents produits par categories
    public function Produits_par_Categorie($id_categorie)
    {
        $query = $this->db->get_where("produits",array("id_categorie" => $id_categorie));
        return $query; 
    }

    /* ajouter dans achat la id_produit et id_untilisateur */
    public function ajouter_achat($id_utilisateur,$id_produit)
    {   
        $now = time();//malheureusement ne retourne pas la date voulu (désolé)
        $sql = "INSERT INTO achat (id_utilisateur, id_prduit, date_achat) VALUES(".$id_utilisateur.",".$id_produit.",".$now.")";
        $this->db->query($sql); 
    }

    /* test si un produit est dans achat/ deja acheté */
    public function est_dans_achat($id_produit)
    {
        $query = $this->db->get_where("achat",array("id_prduit" => $id_produit));
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    

    //Recupere un produit via son id_produit
    public function get_Produit($id_produit)
    {
        $query = $this->db->get_where("produits",array("id_produit" => $id_produit));
        return $query;
    }

    //Recupere un categorie via son id_categorie
    public function getCategorie($id_categorie)
    {   
        $query = $this->db->get_where("catégories",array("id_categorie" => $id_categorie));
        return $query;
    }
    /* les info de l'utilisateur */
    public function getUserInfo() {
        $this->db->select(array('u.id_utilisateur', 'u.nom', 'u.email','u.date_de_naissaance','u.idRole'));
        $this->db->from('utilisateur as u');
        $this->db->where('u.id_utilisateur', $this->_userID);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function supprimer($id_produit){
        $this->db->delete('produits',['id_produit'=>$id_produit]);
    }

    public function modifier($id_produit,$data){
        $this->db->where('id_produit', $id_produit);
        $this->db->update('produits', $data);
    }

    // Read data using username and password
    public function login($data) {
        $condition = "email =" . "'" . $data['username'] . "' AND " . "mot_de_passe =" . "'" . $data['password'] . "'";
        $this->db->select('id_utilisateur, nom, prenom, email, idRole');
        $this->db->from('utilisateur');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            return $query->result();
            } else {
            return false;
            }
    }

    public function creer_utilisateur($data){
        return $this->db->insert('utilisateur',$data);
    }

    public function ajouter(){
        $data = array(
            "nom_produit"=> $this->input->post("nomproduit"),
            "imageProduit"=> $this->input->post("image"),
            "descriptionProduit"=> $this->input->post("description"),
            "id_categorie"=> $this->input->post("idcategorie"),
            "prix"=> $this->input->post("prix"),
      );
      return $this->db->insert('produits',$data);
    }
    
}
?>