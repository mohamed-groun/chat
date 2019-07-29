<?php
class messages {
	private $id ;
	private $message ;
	private $date;
	private $pseudo_utilisateur  ;
	private $bd ;
	
	public function __construct( $id=null,$message=null,$date=null,$pseudo_utilisateur=null)
	{
		$this->id = $id;
		$this->message = $message;
		$this->date= $date;
		$this->pseudo_utilisateur = $pseudo_utilisateur;
		$this->bd = connexionPDO::getInstance();
	}
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getMessage(){
		return $this->message;
	}
	
	public function setMessage($message){
		$this->message = $message;
	}
	
	public function getDate(){
		return $this->date;
	}
	
	public function setDate($date){
		$this->date = $date;
	}
	
	public function getPseudo_utilisateur(){
		return $this->pseudo_utilisateur;
	}
	
	public function setPseudo_utilisateur($pseudo_utilisateur){
		$this->pseudo_utilisateur = $pseudo_utilisateur;
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
		$query = 'SELECT * FROM `messages` ';
		$reponce = $this->bd->prepare($query);
		$reponce->execute(
				array(
				)
				);
		return $reponce->fetchAll(PDO::FETCH_OBJ);
	}
	public function addMessage($email,$date,$user){
		$query = "INSERT INTO `messages` ( `message`, `date_msg`, `pseudo_utilisateur`)
        VALUES ('".$email."' , '".$date."' , '".$user."' );";
		$reponce = $this->bd->prepare($query);
		$reponce->execute(
				array(
						'message' => $email,
						'date_msg' => $date,
						'pseudo_utilisateur' => $date,
						'email' => $user
	
				)
				);
	}
	
}
