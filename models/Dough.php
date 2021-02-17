<?php

/**
 * objet pâte
 */
class Dough
{
    /**
     * id de la pâte
     * @var int
     */
    private $id;
    /**
     * nom de la pâte
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
        $db = $cnx->query('SELECT `name`,`id` FROM dough');
        return $db;
        $flash = new FlashService();
        $flash->add('Votre Pâte a bien été modifié.');
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
        $db = $cnx->queryOne('SELECT dough.id,dough.name,product.id 
        FROM dough
        INNER JOIN product ON product.id_dough=dough.id     
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
        $db = $cnx->queryOne('SELECT `name`,`id` FROM dough WHERE id=?', [$id]); //requete sql
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
        $db = $cnx->executeSql("UPDATE `dough` 
        SET `name` = ? WHERE `dough`.`id` = ?", [$this->name, $this->id]);
        $flash = new FlashService();
        $flash->add('Votre Pâte a bien été modifié.');
    }
    /**
     * Insertion d'un nouveau élément
     *
     * @return void
     */
    public function insert()
    {
        $cnx = new Database();
        $db = $cnx->executeSql("INSERT INTO `dough` ( `name`) VALUES (?)", [$this->name]);
        // Ajout d'un message de notification 
        $flash = new FlashService();
        $flash->add('Votre Pâte a bien été créé.');
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
