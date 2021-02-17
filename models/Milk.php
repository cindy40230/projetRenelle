<?php
/**
 * objet lait
 */
class Milk
{
    /**
     * id du type de lait
     * @var int
     */
    private $id;
    /**
     * nom du lait
     * @var string
     */
    private $name;
    
    /**
     * Obtenez la valeur de l'id
     */
    public function getId()
    {
        return $this->id;
    }
     /**
     * Définir la valeur de id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;
    }
     /**
     * Obtenez la valeur du nom
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Définir la valeur du nom
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;
    }

     /**
     * Récuperation de tous les elements
     * @return void
     */
    public function getAll()
    {
        $cnx=new Database();
        $db=$cnx->query('SELECT `id`,`name` FROM milk');
         try {
        return $db;
        $flash = new FlashService();
        $flash->add('Votre Lait a bien été modifié.');
       if($db){
         return $b;
       }
       else{
         return FALSE;
       }
      } catch (PDOException $e) {
        return NULL;
      } 
    }
     /**
     * Récuperation d'un élément par l'id du produit
     *
     * @param integer $id
     * @return void
     */
    public function getOne(int $id)
    {
        //connexion à la base 
        $cnx=new Database();
        $db=$cnx->queryOne('SELECT milk.id,milk.name,product.id 
        FROM milk 
        INNER JOIN product ON product.id_milk=milk.id     
        WHERE product.id=?',[$id]);
        return $db;
    }
    /**
     * Récuperation d'un élément par son id 
     *
     * @param integer $id
     * @return void
     */
    public function getOneById(int $id)
    {
        //connexion à la base 
        $cnx=new Database(); 
        $db=$cnx->queryOne('SELECT `name`,id FROM milk WHERE id=?',[$id]);
        try{
        return $db;    
         if($db){
         return $b;
       }
       else{
         return FALSE;
       }
      } catch (PDOException $e) {
        return NULL;
      } 
    } 
    /**
     * Modification de l'élément
     *
     * @return void
     */
    public function edit()
    {
        $cnx=new Database();
        $db=$cnx->executeSql("UPDATE `milk` 
        SET `name` = ? WHERE `milk`.`id` = ?",[$this->name,$this->id]);
        $flash = new FlashService();
        $flash->add('Votre Lait a bien été modifié.');
    }
   /**
    * Insertion d'un nouveau élément
    *
    * @return void
    */
    public function insert()
    {
        $cnx=new Database();
        $db=$cnx->executeSql("INSERT INTO `milk` ( `name`) VALUES (?)",[$this->name]);
        $flash = new FlashService();
        $flash->add('Votre Lait a bien été crée.');
    }
    /**
     * fonction magique retourne une chaine de caractère
     *
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
    
    
    
}