<?php
class connexionPDO
{
    private  static $cnxPDO= null;
    private const HOST='localhost' ;
    private const USER='root';
    private const PSW='';
    private const BD_NAME='bdd_chat';
    private function  __construct()
{
    try {
        self::$cnxPDO = new PDO('mysql:host='.self::HOST.';dbname='.self::BD_NAME, self::USER,self::PSW );
    } catch (PDOException $e ) {
        die($e->getMessage());
    }
}
public static  function  getInstance (){
if(!self::$cnxPDO) {
    new connexionPDO() ;
}
return self::$cnxPDO;
}
}
?>
