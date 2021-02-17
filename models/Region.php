<?php

/**
* objet region
*/
class Region
{
     /**
     * id de la region
     * @var int
     */
    private $id;
     /**
     * nom de la région
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
     * Obtenez la valeur de l'image
     */
     public function getPicture()
    {
        return $this->picture;
    }
    /**
     * Définir la valeur le l'image
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
        $db=$cnx->query('SELECT * FROM region');
        return $db;
        $flash = new FlashService();
        $flash->add('Votre region a bien été modifié.');
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
        $db=$cnx->queryOne('SELECT region.*,product.id 
        FROM region
        INNER JOIN product ON product.id_region=region.id     
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
        $db=$cnx->queryOne('SELECT `name`,id, picture FROM region WHERE id=?',[$id]);
        return $db;
    }
    
     /**
     * Modification de l'élément
     *
     * @return void
     */
    public function edit()
    {
        $cnx=new Database();
        $db=$cnx->executeSql("UPDATE `region` 
        SET `name` = ?,`picture` =? WHERE `region`.`id` = ?",[$this->name,$this->picture,$this->id]);
    
         $flash = new FlashService();
        $flash->add('Votre region a bien été modifié.');
    }
   
      /**
     * Insertion d'un nouveau élément
     *
     * @return void
     */
    public function insert()
    {
        $cnx=new Database();
        $db=$cnx->executeSql("INSERT INTO `region` ( `name`, `picture`) VALUES (?,?)",[$this->name,$this->picture]);
    
        $flash = new FlashService();
        $flash->add('Votre region a bien été créé.');
    }


    /**
     * fonction magique retourne une chaine de caractère
     *
     * @return string
     */
    public function __toString()
    {
        return $this->name." ".$this->picture;
        
    }
    
}