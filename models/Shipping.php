<?php
/**
 * objet frais de port
 */
class Shipping
{
    /**
     * id du frais de port
     * @var int
     */
    private $id;
    /**
     * detail frais de port
     * @var string
     */
    private $name;
    /**
     * detail frais de port
     * @var string
     */
    private $price;
    
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
     * Obtenez la valeur du prix
     */
    public function getPrice()
    {
        return $this->price;
    }
    /**
     * Définir la valeur du prix
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

     /**
     * Récuperation de tous les elements
     * @return void
     */
    public function getAll()
    {
        $cnx=new Database();
        $db=$cnx->query('SELECT * FROM shipping ');
        return $db;
       
    } 
    /**
     * Récuperation d'un élément 
     *
     * @param integer $id
     * @return void
     */
    public function getOne($id)
    {
        $cnx=new Database();
        $db=$cnx->query('SELECT * FROM shipping Where id=? ',[$id]);
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
        $db=$cnx->queryOne('SELECT `name`,id,`price` FROM shipping WHERE id=?',[$id]);
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
        $db=$cnx->executeSql("UPDATE `shipping` 
        SET `name` = ?,`price`=? WHERE `shipping`.`id` = ?",[$this->name,$this->price,$this->id]);
        $flash = new FlashService();
        $flash->add('Votre frais de port a bien été modifié.');
    }
   /**
    * Insertion d'un nouveau élément
    *
    * @return void
    */
    public function insert()
    {
        $cnx=new Database();
        $db=$cnx->executeSql("INSERT INTO `shipping`  ( `name`,`price`) VALUES (?,?)",[$this->name,$this->price]);
        $flash = new FlashService();
        $flash->add('Votre frais de port a bien été crée.');
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