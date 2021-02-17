<?php

/**
 * objet pâte
 */
class Weights
{
    /**
     * id du poidts
     * @var int
     */
    private $id;
    /**
     * nom du poidts
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

        return $this;
    }
    /**
     * Obtenez la valeur du nom
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Definir la valeur du nom
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
    /**
     * Récuperation de tous les elements
     * @return void
     */
    public function getAll()
    {
        $cnx = new Database();
        $db = $cnx->query('SELECT `name`,`id` FROM weights');
        return $db;
        $flash = new FlashService();
        $flash->add('Votre poids a bien été modifié.');
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
        $cnx = new Database();
        $db = $cnx->queryOne('SELECT weights.id,weights.name,product.id 
        FROM weights
        INNER JOIN product ON product.weight=weights.id     
        WHERE product.id=?', [$id]); //requete sql
        return $db; //retour requete
    }
    /**
     * Récuperation d'un élément par son id 
     *
     * @param integer $id
     * @return void
     */
    public function getOneById(int $id)
    {
        $cnx = new Database(); //connexion à la base 
        $db = $cnx->queryOne('SELECT `name`,`id` FROM weights WHERE id=?', [$id]); //requete sql
        return $db; //retour requete
    }

    /**
     * Modification de l'élément
     *
     * @return void
     */
    public function edit()
    {
        $cnx = new Database();
        $db = $cnx->executeSql("UPDATE `weights` 
        SET `name` = ? WHERE `weights`.`id` = ?", [$this->name, $this->id]);
        $flash = new FlashService();
        $flash->add('Votre poids a bien été modifié.');
    }
    /**
     * Insertion d'un nouveau élément
     *
     * @return void
     */
    public function insert()
    {
        $cnx = new Database();
        $db = $cnx->executeSql("INSERT INTO `weights` ( `name`) VALUES (?)", [$this->name]);
        // Ajout d'un message de notification 
        $flash = new FlashService();
        $flash->add('Votre poids a bien été créé.');
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
