<?php

/**
 * objet plateau
 */
class Tray
{
    /**
     * id du type du plateau
     * @var int
     */
    private $id;
    /**
     * nom du plateau
     * @var string
     */
    private $name;
    /**
     * nom de l'image du plateau'
     * @var string
     */
    private $picture;
    /**
     * description du plateau
     * @var string
     */
    private $description;

    /**
     * produit 1 du plateau
     * @var int
     */
    private $product1;
    /**
     * produit 2 du plateau
     * @var int
     */
    private $product2;
    /**
     * produit 3 du plateau
     * @var int
     */
    private $product3;
    /**
     * produit 4 du plateau
     * @var int
     */
    private $product4;
    /**
     * produit 5 du plateau
     * @var int
     */
    private $product5;
    /**
     * quantité en stock 
     * @var int
     */
    private $quantityInStock;
    /**
     * prix de vente du plateau
     * @var float
     */
    private $salePrice;
    /**
     * prix d'achat du plateau
     * @var float
     */
    private $buyPrice;

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
     * Obtenez la valeur du nom du plateau
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Définir la valeur du nom du plateau
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Obtenez la valeur de la description du plateau
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Définir la valeur de la description du plateau
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    /**
     * Obtenez la valeur de l'id  du plateau numéro 1
     */
    public function getProduct1()
    {
        return $this->product1;
    }
    /**
     * Définir la valeur de l'id  du plateau numéro 1
     *
     * @return  self
     */
    public function setProduct1($product1)
    {
        $this->product1 = $product1;
    }
    /**
     * Obtenez la valeur de l'id  du plateau numéro 2
     */
    public function getProduct2()
    {
        return $this->product2;
    }
    /**
     * Définir la valeur de l'id  du plateau numéro 2
     *
     * @return  self
     */
    public function setProduct2($product2)
    {
        $this->product2 = $product2;
    }
    /**
     * Obtenez la valeur de l'id  du plateau numéro 3
     */
    public function getProduct3()
    {
        return $this->product3;
    }
    /**
     * Définir la valeur de l'id  du plateau numéro 3
     *
     * @return  self
     */
    public function setProduct3($product3)
    {
        $this->product3 = $product3;
    }
    /**
     * Obtenez la valeur de l'id  du plateau numéro 4
     */
    public function getProduct4()
    {
        return $this->product4;
    }
    /**
     * Définir la valeur de l'id  du plateau numéro 4
     *
     * @return  self
     */
    public function setProduct4($product4)
    {
        $this->product4 = $product4;
    }
    /**
     * Obtenez la valeur de l'id  du plateau numéro 5
     */
    public function getProduct5()
    {
        return $this->product5;
    }
    /**
     * Définir la valeur de l'id  du plateau numéro 5
     *
     * @return  self
     */
    public function setProduct5($product5)
    {
        $this->product5 = $product5;
    }
    /**
     * Obtenez la valeur de la quantité en stock
     */
    public function getQuantityInStock()
    {
        return $this->quantityInStock;
    }
    /**
     * Définir la valeur de la quantité en stock
     *
     * @return  self
     */
    public function setQuantityInStock($quantityInStock)
    {
        $this->quantityInStock = $quantityInStock;
    }
    /**
     * Obtenez la valeur de la quantité en stock
     */
    public function getWeight()
    {
        return $this->weight;
    }
    /**
     * Définir la valeur de la quantité en stock
     *
     * @return  self
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
    /**
     * Obtenez la valeur du prix de vente
     */
    public function getSalePrice()
    {
        return $this->salePrice;
    }
    /**
     * Définir la valeur de id du prix de vente
     *
     * @return  self
     */
    public function setSalePrice($salePrice)
    {
        $this->salePrice = $salePrice;
    }
    /**
     * Obtenez la valeur du prix d'achat
     */
    public function getBuyPrice()
    {
        return $this->buyPrice;
    }
    /**
     * Définir la valeur de id du prix d'achat
     *
     * @return  self
     */
    public function setBuyPrice($buyPrice)
    {
        $this->buyPrice = $buyPrice;
    }

    /**
     * Récuperation de tous les elements
     * @return void
     */
    public function getAll()
    {
        $cnx = new Database();
        $db = $cnx->query('SELECT tray.id,tray.name,tray.weight,weights.name as WeightName, tray.description, tray.picture, product1,product2,product3, product4, product5,tray.quantityInStock,tray.buyPrice, tray.salePrice,product.name as productName
        FROM tray 
        INNER JOIN product ON product.id=tray.product1
        INNER JOIN weights ON weights.id=tray.weight
        ');
        return $db;
        dd($db);die;
        $flash = new FlashService();
        $flash->add('Votre plateau a bien été modifié.');
    }
    /**
     * Récuperation de tous les elements
     * @return void
     */
    public function getAllTwo()
    {
        $cnx = new Database();
        $db = $cnx->query('SELECT tray.name,tray.weight,weights.name as WeightName, tray.description, tray.picture, product1,product2,product3, product4, product5,tray.quantityInStock,tray.buyPrice, tray.salePrice, product.name as productName1
        FROM tray 
        INNER JOIN product ON product.id=tray.product2 
        INNER JOIN weights ON weights.id=tray.weight
      ');
        return $db;
    }
    /**
     * Récuperation de tous les elements
     * @return void
     */
    public function getAllThree()
    {
        $cnx = new Database();
        $db = $cnx->query('SELECT tray.name,tray.weight,weights.name as WeightName, tray.description, tray.picture, product1,product2,product3, product4, product5,tray.quantityInStock,tray.buyPrice, tray.salePrice, product.name as productName2
        FROM tray 
        INNER JOIN product ON product.id=tray.product3
        INNER JOIN weights ON weights.id=tray.weight
      ');
        return $db;
    }
    /**
     * Récuperation de tous les elements
     * @return void
     */
    public function getAllFour()
    {
        $cnx = new Database();
        $db = $cnx->query('SELECT tray.name,tray.weight,weights.name as WeightName, tray.description, tray.picture, product1,product2,product3, product4, product5,tray.quantityInStock,tray.buyPrice, tray.salePrice, product.name as productName3
        FROM tray 
        INNER JOIN product ON product.id=tray.product4
        INNER JOIN weights ON weights.id=tray.weight
      ');
        return $db;
    }
    /**
     * Récuperation de tous les elements
     * @return void
     */
    public function getAllFive()
    {
        $cnx = new Database();
        $db = $cnx->query('SELECT tray.name,tray.weight,weights.name as WeightName, tray.description, tray.picture, product1,product2,product3, product4, product5,tray.quantityInStock,tray.buyPrice, tray.salePrice, product.name as productName4
        FROM tray 
        INNER JOIN product ON product.id=tray.product5
        INNER JOIN weights ON weights.id=tray.weight
      ');
        return $db;
    }

    /**
     * Récuperation d'un élément par son id
     *
     * @param integer $id
     * @return void
     */
    public function getById(int $id)
    {
        //connexion à la base 
        $cnx = new Database();
        $db = $cnx->queryOne('SELECT tray.id,tray.name,tray.weight,weights.name as WeightName, tray.description, tray.picture, product1,product2,product3, product4, product5,tray.quantityInStock,tray.buyPrice, tray.salePrice FROM tray INNER JOIN weights ON weights.id=tray.weight WHERE tray.id=?', [$id]);
        return $db;
    }

    /**
     * Récuperation d'un élément par son id
     *
     * @param integer $id
     * @return void
     */
    public function getOne(int $id)
    {
        //connexion à la base 
        $cnx = new Database();
        $db = $cnx->queryOne('SELECT tray.name,tray.weight,weights.name as WeightName, tray.description, tray.picture, product1,product2,product3, product4, product5,tray.quantityInStock,tray.buyPrice, tray.salePrice,product.name as productName,product.picture as productPicture,product.id as productId FROM tray INNER JOIN product ON product.id=tray.product1 INNER JOIN weights ON weights.id=tray.weight WHERE tray.id=?', [$id]);
        return $db;
        // var_dump($db);die;
    }
    /**
     * Récuperation d'un élément par son id
     *
     * @param integer $id
     * @return void
     */
    public function getTwo(int $id)
    {
        //connexion à la base 
        $cnx = new Database();
        $db = $cnx->queryOne('SELECT tray.name,tray.weight,weights.name as WeightName, tray.description, tray.picture, product1,product2,product3, product4, product5,tray.quantityInStock,tray.buyPrice, tray.salePrice,product.name as productName,product.picture as productPicture,product.id as productId FROM tray INNER JOIN product ON product.id=tray.product2 INNER JOIN weights ON weights.id=tray.weight WHERE tray.id=?', [$id]);
        return $db;
        // var_dump($db);die;
    }
    /**
     * Récuperation d'un élément par son id
     *
     * @param integer $id
     * @return void
     */
    public function getThree(int $id)
    {
        //connexion à la base 
        $cnx = new Database();
        $db = $cnx->queryOne('SELECT tray.name,tray.weight,weights.name as WeightName, tray.description, tray.picture, product1,product2,product3, product4, product5,tray.quantityInStock,tray.buyPrice, tray.salePrice,product.name as productName,product.picture as productPicture,product.id as productId FROM tray INNER JOIN product ON product.id=tray.product3 INNER JOIN weights ON weights.id=tray.weight WHERE tray.id=?', [$id]);
        return $db;
        // var_dump($db);die;
    }
    /**
     * Récuperation d'un élément par son id
     *
     * @param integer $id
     * @return void
     */
    public function getFour(int $id)
    {
        //connexion à la base 
        $cnx = new Database();
        $db = $cnx->queryOne('SELECT tray.name,tray.weight,weights.name as WeightName, tray.description, tray.picture, product1,product2,product3, product4, product5,tray.quantityInStock,tray.buyPrice, tray.salePrice,product.name as productName,product.picture as productPicture,product.id as productId FROM tray INNER JOIN product ON product.id=tray.product4 INNER JOIN weights ON weights.id=tray.weight WHERE tray.id=?', [$id]);
        return $db;
        // var_dump($db);die;
    }

    /**
     * Récuperation d'un élément par son id
     *
     * @param integer $id
     * @return void
     */
    public function getFive(int $id)
    {
        //connexion à la base 
        $cnx = new Database();
        $db = $cnx->queryOne('SELECT tray.name,tray.weight,weights.name as WeightName, tray.description, tray.picture, product1,product2,product3, product4, product5,tray.quantityInStock,tray.buyPrice, tray.salePrice,product.name as productName,product.picture as productPicture,product.id as productId FROM tray INNER JOIN product ON product.id=tray.product5 INNER JOIN weights ON weights.id=tray.weight WHERE tray.id=?', [$id]);
        return $db;
        // var_dump($db);die;
    }

    /**
     * Modification de l'élément
     *
     * @return void
     */
    public function edit()
    {
        $cnx = new Database();
        $db = $cnx->executeSql("UPDATE `tray` SET `name` = ?, `picture` = ?, `description` = ?, `product1` = ?, `product2` = ?, `product3` = ?, `product4` = ?, `product5` = ?, `quantityInStock` = ?, `weight`=?,`salePrice` = ?, `buyPrice` = ? WHERE `tray`.`id` = ?;", [$this->name, $this->picture, $this->description, $this->product1, $this->product2, $this->product3, $this->product4, $this->product5, $this->quantityInStock,$this->weight, $this->salePrice, $this->buyPrice, $this->id]);
        $flash = new FlashService();
        $flash->add('Votre plateau a bien été modifié.');
    }

    /**
     * Insertion d'un nouveau élément
     *
     * @return void
     */
    public function insert()
    {
        $cnx = new Database();
        $db = $cnx->executeSql("INSERT INTO  `tray` (`name`, `description`, `picture`, `product1`, `product2`, `product3`, `product4`, `product5`,`quantityInStock`,`weight`, `buyPrice`, `salePrice`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)", [$this->name, $this->description, $this->picture, $this->product1, $this->product2, $this->product3, $this->product4, $this->product5, $this->quantityInStock,$this->weight, $this->buyPrice, $this->salePrice]);
    }
    
    public function deleteTray($id)
    {
       
        $cnx = new Database();
        $db = $cnx->executeSql(" DELETE FROM `tray` WHERE `tray`.`id` = ? ", [$id]);
        return $db;
        $flash = new FlashService();
        $flash->add('Votre plateau a bien été supprimer.');
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
