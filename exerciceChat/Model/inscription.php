<?php
class inscription {
private $id ;
private $nom ;
private $prenom;
private $email  ;
private $mdp;
private $bd ;

    public function __construct( $id=null,$nom=null,$prenom=null,$email=null,$mdp=null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        
        $this->email = $email;
        $this->mdp = $mdp;
       
        $this->bd = connexionPDO::getInstance();
    }
    public function getId(){
    	return $this->id;
    }
    
    public function setId($id){
    	$this->id = $id;
    }
    
    public function getNom(){
    	return $this->nom;
    }
    
    public function setNom($nom){
    	$this->nom = $nom;
    }
    
    public function getPrenom(){
    	return $this->prenom;
    }
    
    public function setPrenom($prenom){
    	$this->prenom = $prenom;
    }
    

    
    public function getEmail(){
    	return $this->email;
    }
    
    public function setEmail($email){
    	$this->email = $email;
    }
    
    public function getMdp(){
    	return $this->mdp;
    }
    
    public function setMdp($mdp){
    	$this->mdp = $mdp;
    }
 
    public function getBd(): ?PDO
    {
        return $this->bd;
    }
    
    public function setBd(?PDO $bd): void
    {
        $this->bd = $bd;
    }

      public function select(){
        $query = 'SELECT * FROM `utilisateur` ';
        $reponce = $this->bd->prepare($query);
        $reponce->execute(
            array(
                )
        );
        return $reponce->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function selectByemail($email,$mdp){
    	$query = "SELECT `pseudo` , `password` FROM `utilisateur` WHERE `pseudo`='".$email."'  AND `password`='".$mdp."' ";
    	$reponce = $this->bd->prepare($query);
    	$reponce->execute(
    			array(
    			)
    			);
    	return $reponce->fetchAll(PDO::FETCH_OBJ);
    }
    public function addProduit($nom,$prenom,$date,$email,$mdp,$session){
        $query = "INSERT INTO `inscription` ( `nom`, `prenom`, `dateNaissance`, `email` , `mdp` , `session`) 
        VALUES ('".$nom."' , '".$prenom."' , '".$date."' , '".$email."', '".$mdp."', '".$session."');";
        $reponce = $this->bd->prepare($query);
        $reponce->execute(
            array(
                'nom' => $nom,
                'prenom' => $prenom,
                'date' => $date,
                'email' => $email, 
            	'mdp' => $mdp,
            	'session' => $session
            
            )
        );
    }

     public function deleteProduit($id) {
        $requete = "DELETE FROM `inscription` WHERE `inscription`.`id` =:id";
        $pdoResult = $this->bd->prepare($requete);
        $pdoResult->execute(array(":id" => $id));
    }
}
?>
