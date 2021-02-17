<?php
/**
 * objet Categorie
 */
class Category
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
        $db=$cnx->query('SELECT `id`,`name` FROM category');
        return $db;
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
        $db=$cnx->queryOne('SELECT id,`name`
        FROM category    
        WHERE id=?',[$id]);
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
        $db=$cnx->executeSql("UPDATE `category` 
        SET `name` = ? WHERE `category`.`id` = ?",[$this->name,$this->id]);
        $flash = new FlashService();
        $flash->add('Votre category a bien été modifié.');
    }
   /**
    * Insertion d'un nouveau élément
    *
    * @return void
    */
    public function insert()
    {
        $cnx=new Database();
        $db=$cnx->executeSql("INSERT INTO `category` ( `name`) VALUES (?)",[$this->name]);
        $flash = new FlashService();
        $flash->add('Votre category a bien été crée.');
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