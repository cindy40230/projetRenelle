<?php
/**
 * objet vin
 */
class Wine
{
    /**
     * id du type de vin
     * @var int
     */
    private $id;
    /**
     * nom du vin
     * @var string
     */
    private $name;
    /**
     * zone du vin
     * @var string
     */
    private $zoned;
    /**
     * couleur du vin
     * @var string
     */
    private $color;
    
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
     * Obtenez la valeur du nom du vin
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
     * Obtenez la valeur de la zone
     */
    public function getZoned()
    {
        return $this->zoned;
    }
    /**
     * Définir la valeur de la zone
     *
     * @return  self
     */
    public function setZoned($zoned)
    {
        $this->zoned = $zoned;
    }
     /**
     * Obtenez la valeur de la couleur
     */
    public function getColor()
    {
        return $this->color;
    }
    /**
     * Définir la valeur de la couleur
     *
     * @return  self
     */
    public function setColor($color)
    {
        $this->color = $color;
    }


    /**
     * Récuperation de tous les elements
     * @return void
     */
    public function getAll()
    {
        $cnx=new Database();
        $db=$cnx->query('SELECT id,wine.name,zoned,color FROM wine');
        return $db;
        
    }
    /**
     * Récuperation de tous les elements
     * @return void
     */
    public function getAllAdmin()
    {
       
        $cnx = new Database();
        $db=$cnx->queryPage('SELECT id,wine.name,zoned,color FROM wine
        ORDER BY id DESC
        LIMIT :premier, :parpage');
        return $db;
        $flash = new FlashService();
        $flash->add('Votre vin a bien été modifié.');
    }
    public function getNbrAdmin()

    {
    $cnx = new Database();
    $db = $cnx->query('SELECT COUNT(*)as nbr FROM wine ');
    return $db;
    }
    
    /**
     * Récuperation d'un élément vin 1 par l'id du produit
     *
     * @param integer $id
     * @return void
     */
    public function getOne(int $id)//$id parametre de la fonction
    {
        $cnx=new Database();//connexion à la base 
        $db=$cnx->queryOne('SELECT wine.id,wine.name,zoned,color,product.id 
                            FROM wine 
                            INNER JOIN product ON product.id_wine1=wine.id
                            WHERE product.id=? ',[$id]);//requete sql
        return $db;//retour requete
    }
    /**
     * Récuperation d'un élément vin 2 par l'id du produit
     *
     * @param integer $id
     * @return void
     */
     public function getTwo(int $id)//$id parametre de la fonction
    {
        $cnx=new Database();//connexion à la base 
        $db=$cnx->queryOne('SELECT wine.id,wine.name,zoned,color,product.id 
                            FROM wine 
                            INNER JOIN product ON product.id_wine2=wine.id
                            WHERE product.id=? ',[$id]);//requete sql
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
        $db=$cnx->queryOne('SELECT `name`,id,zoned,color FROM wine WHERE id=?',[$id]);//requete sql
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
        $db=$cnx->executeSql("UPDATE `wine` 
        SET `name` = ?,`zoned` = ?, `color` = ? WHERE `wine`.`id` = ?",[$this->name,$this->zoned,$this->color,$this->id]);
    
        $flash = new FlashService();
        $flash->add('Votre vin a bien été modifié.');
    }
    
    /**
     * Insertion d'un nouveau élément
     *
     * @return void
     */
    public function insert()
    {
        $cnx=new Database();
        $db=$cnx->executeSql("INSERT INTO `wine` ( `name`,`zoned`,`color`) VALUES (?,?,?)",[$this->name,$this->zoned,$this->color]);
    
        $flash = new FlashService();
        $flash->add('Votre vin a bien été créé.');
    }
    
     public function deleteWine($id)
    {
       
        $cnx = new Database();
        $db = $cnx->executeSql(" DELETE FROM `wine` WHERE `wine`.`id` = ? ", [$id]);
        return $db;
        $flash = new FlashService();
        $flash->add('Votre vin a bien été modifié.');
    }
    
     /**
     * fonction magique retourne une chaine de caractère
     *
     * @return string
     */
    public function __toString()
    {
        return $this->name." ".$this->zoned." ".$this->color;

    }

}