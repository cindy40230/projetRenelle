<?php

/**
 * objet plateau
 */
class Post
{
    /**
     * id de l'article
     * @var int
     */
    private $id;
    /**
     * titre de l'article
     * @var string
     */
    private $title;
    /**
     * nom de l'image
     * @var string
     */
    private $picture;
    /**
     * description 
     * @var string
     */
    private $description;
    /**
     * categorie
     * @var string
     */
    private $category;

    /**
     * date de l'article
     * @var int
     */
    private $createdDate;
    
    /**
     * Obtenez la valeur de l'id
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Définir la valeur de l'id
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * Obtenez la valeur du titre
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * Définir la valeur du nom du titre
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    /**
     * Obtenez la valeur du nom de l'image
     */
    public function getPicture()
    {
        return $this->picture;
    }
    /**
     * Définir la valeur du nom de l'image
     * @return  self
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }
    /**
     * Obtenez la valeur de la description de l'article
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Définir la valeur de la description de l'article
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    /**
     * Obtenez la valeur de la description de l'article
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * Définir la valeur de la description de l'article
     *
     * @return  self
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }
    /**
     * Obtenez la valeur de l'id  du plateau numéro 1
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }
    /**
     * Définir la valeur de l'id  du plateau numéro 1
     *
     * @return  self
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate= $createdDate;
    }
    
    /**
     * Récuperation de tous les elements
     * @return void
     */
    public function getAll()
    {
        $cnx = new Database();
        $db = $cnx->query('SELECT post.id,post.title,post.description,post.id_category,post.picture,post.createdDate,category.id as categoryId,category.name as categoryName
        FROM post 
        INNER JOIN category ON category.id=post.id_category
        ');
        return $db;
    }
    

    /**
     * Récuperation le dernier element
     *
     * @param integer $id
     * @return void
     */
    public function getOne()
    {
        //connexion à la base 
        $cnx = new Database();
        $db = $cnx->queryOne('SELECT post.id,post.title,post.description,post.id_category,post.picture,post.createdDate,category.id as categoryId,category.name as categoryName FROM post 
        INNER JOIN category ON category.id=post.id_category 
        ORDER BY createdDate DESC
        LIMIT 1');
        return $db;
    }
    /**
     * Récuperation d'un élément par son id
     *
     * @param integer $id
     * @return void
     */
    public function getOneById($id)
    {
        //connexion à la base 
        $cnx = new Database();
        $db = $cnx->queryOne('SELECT post.id,post.title,post.description,post.id_category,post.picture,post.createdDate,category.id as categoryId,category.name as categoryName FROM post 
        INNER JOIN category ON category.id=post.id_category 
       WHERE post.id= ?',[$id]);
        return $db;
    }
     /**
     * Récuperation d'un élément par son id
     *
     * @param integer $id
     * @return void
     */
    public function getOneByCategory($id)
    {
        //connexion à la base 
        $cnx = new Database();
        $db = $cnx->queryOne('SELECT post.id,post.title,post.description,post.id_category,post.picture,post.createdDate,category.id as categoryId,category.name as categoryName FROM post 
        INNER JOIN category ON category.id=post.id_category 
       WHERE id_category= ?',[$id]);
        return $db;
    }
    /**
     * Récuperation de tous les elements
     * @return void
     */
    public function getAllByCategory($id)
    {
        $cnx = new Database();
        $db = $cnx->query('SELECT post.id,post.title,post.description,post.id_category,post.picture,post.createdDate,category.id as categoryId,category.name as categoryName
        FROM post 
        INNER JOIN category ON category.id=post.id_category
        WHERE id_category= ?',[$id]);
        return $db;
    }

    /**
     * Modification de l'élément
     *
     * @return void
     */
    public function edit()
    {
        //connexion à la base 
        $cnx = new Database();
        $db = $cnx->executeSql("UPDATE `post` SET `title` = ?, `description` =?, `picture` = ?, `id_category` = ?, `createdDate` = ? WHERE `post`.id = ?", [$this->title, $this->description, $this->picture, $this->category, $this->createdDate, $this->id]);
        return $db;
        $flash = new FlashService();
        $flash->add('Votre article a bien été modifié.');
    }

    /**
     * Insertion d'un nouveau élément
     *
     * @return void
     */
    public function insert()
    {
        //connexion à la base 
        $cnx = new Database();
        $db = $cnx->executeSql("INSERT INTO `post` (`title`, `description`, `picture`, `id_category`, createdDate) VALUES (?,?,?,?,?)", [$this->title, $this->description, $this->picture, $this->category, $this->createdDate]);
    }

    public function deletePost($id)
    {       
        $cnx = new Database();
        $db = $cnx->executeSql(" DELETE FROM `post` WHERE `post`.`id` = ? ", [$id]);
        
        return $db;
        dd($db);
        $flash = new FlashService();
        $flash->add('Votre article a bien été supprimer.');
    }
 
}