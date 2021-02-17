<?php
/**
 * objet couteau
 */
class Knife
{
    /**
     * id du type du couteau
     * @var int
     */
    private $id;
    /**
     * nom du couteau
     * @var string
     */
    private $name;
    /**
     * nom de l'image
     * @var string
     */
    private $picture;
    
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
     * Obtenez la valeur dunom
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
     * Obtenez la valeur de l'image
     */
     public function getPicture()
    {
        return $this->picture;
    }
     /**
     * Définir la valeur de l'image
     *
     * @return  self
     */
    public function setPicture($picture)
    {
        $this->picture= $picture;
    }

     /**
     * Récuperation de tous les elements
     * @return void
     */
    public function getAll()
    {
        //connexion à la base 
        $cnx=new Database();
        $db=$cnx->query('SELECT id,`name`,picture FROM knife');
        return $db;
        $flash = new FlashService();
        $flash->add('Votre Couteau a bien été modifié.');
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
        $db=$cnx->queryOne('SELECT knife.id,knife.name,knife.picture,product.id 
        FROM knife 
        INNER JOIN product ON product.id_knife=knife.id     
        WHERE product.id=?',[$id]);//requete sql
        return $db;//retour requete
    }
    
    /**
     * Récuperation d'un élément par son id 
     *
     * @param integer $id
     * @return void
     */
    public function getOneById(int $id)//$id parametre de la fonction
    {
        $cnx=new Database();//connexion à la base 
        $db=$cnx->queryOne('SELECT `name`,id,picture FROM knife WHERE id=?',[$id]);//requete sql
        return $db;//retour requete
    }
    
    /**
     * Modification de l'élément
     *
     * @return void
     */
    public function edit()
    {
        $cnx=new Database();
        $db=$cnx->executeSql("UPDATE `knife` 
        SET `name` = ?,`picture` =? WHERE `knife`.`id` = ?",[$this->name,$this->picture,$this->id]);
    
        $flash = new FlashService();
        $flash->add('Votre Couteau a bien été modifié.');
    }
 
    /**
    * Insertion d'un nouveau élément
    *
    * @return void
    */
    public function insert()
    {
        $cnx=new Database();
        $db=$cnx->executeSql("INSERT INTO `knife` ( `name`, `picture`) VALUES (?,?)",[$this->name,$this->picture]);
    
        $flash = new FlashService();
        $flash->add('Votre Couteau a bien été crée.');
    }

    /**
     * fonction magique retourne une chaine de caractère
     *
     * @return string
     */
    public function __toString()
    {
        return $this->name;
        return $this->picture;
    }

}