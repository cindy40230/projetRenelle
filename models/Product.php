<?php

class Product
{
    private $id;
    private $name;
    private $description;
    private $picture;
    private $id_milk;
    private $id_dough;
    private $id_wine1;
    private $id_wine2;
    private $id_shape;
    private $id_knife;
    private $id_region;
    private $quantityInStock;
    private $weight;
    private $salePrice;
    private $buyPrice;
    private $exclusivity;
    private $conseil;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getPicture()
    {
        return $this->picture;
    }
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }
    public function getId_milk()
    {
        return $this->id_milk;
    }
    public function setId_milk($id_milk)
    {
        $this->id_milk = $id_milk;
    }
    public function getId_dough()
    {
        return $this->id_dough;
    }
    public function setId_dough($id_dough)
    {
        $this->id_dough = $id_dough;
    }
    public function getId_shape()
    {
        return $this->id_shape;
    }
    public function setId_shape($id_shape)
    {
        $this->id_shape = $id_shape;
    }
    public function getId_knife()
    {
        return $this->id_knife;
    }
    public function setId_knife($id_knife)
    {
        $this->id_knife = $id_knife;
    }

    public function getId_region()
    {
        return $this->id_region;
    }
    public function setId_region($id_region)
    {
        $this->id_region = $id_region;
    }
    public function getId_wine1()
    {
        return $this->id_wine1;
    }
    public function setId_wine1($id_wine1)
    {
        $this->id_wine1 = $id_wine1;
    }
    public function getId_wine2()
    {
        return $this->id_wine2;
    }
    public function setId_wine2($id_wine2)
    {
        $this->id_wine2 = $id_wine2;
    }

    public function getQuantityInStock()
    {
        return $this->quantityInStock;
    }
    public function setQuantityInStock($quantityInStock)
    {
        $this->quantityInStock = $quantityInStock;
    }
    public function getWeight()
    {
        return $this->weight;
    }
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
    public function getSalePrice()
    {
        return $this->salePrice;
    }
    public function setSalePrice($salePrice)
    {
        $this->salePrice = $salePrice;
    }
    public function getBuyPrice()
    {
        return $this->buyPrice;
    }
    public function setBuyPrice($buyPrice)
    {
        $this->buyPrice = $buyPrice;
    }
    public function getExclusivity()
    {
        return $this->exclusivity;
    }
    public function setExclusivity($exclusivity)
    {
        $this->exclusivity = $exclusivity;
    }
    public function getConseil()
    {
        return $this->conseil;
    }
    public function setConseil($conseil)
    {
        $this->conseil = $conseil;
    }


    /**
     * Récuperation de tous les elements
     * @return void
     */
    public function getAll()
    {
        $cnx = new Database();
        $db=$cnx->queryPage('SELECT product.id,product.name,product.description,product.picture,product.id_milk,product.id_dough,product.id_region,product.id_knife,product.id_shape,product.id_wine1,product.id_wine2,quantityInStock,`weight`,weights.name as weightName,salePrice,buyPrice,exclusivity,conseil_degustation,milk.name as milkName, dough.name as doughName, region.name as regionName, region.picture as regionPicture, shape.name as shapeName, shape.picture as shapePicture , knife.name as knifeName , knife.picture as knifePicture
        FROM product 
        INNER JOIN milk ON product.id_milk=milk.id  
        INNER JOIN dough ON product.id_dough=dough.id 
        INNER JOIN region ON product.id_region=region.id 
        INNER JOIN knife ON product.id_knife=knife.id
        INNER JOIN shape ON product.id_shape=shape.id
        INNER JOIN `weights` ON product.weight=weights.id
        WHERE quantityInStock >0
        LIMIT :premier, :parpage');
        return $db;
    }
    /**
     * recuperation du nombre de produit au stok > 0
     * 
     */
    public function getNbrProduit()

    {
    $cnx = new Database();
    $db = $cnx->query('SELECT COUNT(*)as nbr FROM product WHERE quantityInStock > 0');
    return $db;
    }
    
    /**
     * Récuperation d'un élément par l'id du produit
     *
     * @param integer $id
     * @return void
     */
    public function getOne(int $id) //$id parametre de la fonction
    {
        //connexion à la base 
        $cnx = new Database();
        $db = $cnx->queryOne('SELECT product.id,product.name,product.description,product.picture,product.id_milk,product.id_dough,product.id_region,product.id_knife,product.id_shape,product.id_wine1,product.id_wine2,quantityInStock,`weight`,weights.name as weightName,salePrice,buyPrice,exclusivity,conseil_degustation, milk.name as milkName, dough.name as doughName, region.name as regionName, region.picture as regionPicture, shape.name as shapeName, shape.picture as shapePicture , knife.name as knifeName , knife.picture as knifePicture
        FROM product 
        INNER JOIN milk ON product.id_milk=milk.id  
        INNER JOIN dough ON product.id_dough=dough.id 
        INNER JOIN region ON product.id_region=region.id 
        INNER JOIN knife ON product.id_knife=knife.id
        INNER JOIN shape ON product.id_shape=shape.id 
        INNER JOIN `weights` ON product.weight=weights.id
        WHERE product.id=?', [$id]);
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
        $cnx = new Database();
        $db = $cnx->queryOne('SELECT product.id,weights.name as weightName,weight,product.name,product.description,product.picture,product.id_milk,product.id_dough,product.id_region,product.id_knife,product.id_shape,product.id_wine1,product.id_wine2,quantityInStock,salePrice,buyPrice,exclusivity,conseil_degustation FROM product
        INNER JOIN `weights` ON product.weight=weights.id 
        WHERE product.id=?', [$id]);
        return $db;
    }

    /**
     * Récuperation d'un élément par l'id du lait
     *
     * @param integer $id
     * @return void
     */
    public function GetAllByMilk(int $id) //$id parametre de la fonction
    {
        //connexion à la base 
        $cnx = new Database();
        $db = $cnx->query('SELECT product.id,product.name,weights.name as weightName,product.description,product.picture,product.id_milk,product.id_dough,product.id_region,product.id_knife,product.id_shape,product.id_wine1,product.id_wine2,quantityInStock,salePrice,buyPrice,exclusivity,conseil_degustation 
        FROM product
        INNER JOIN `weights` ON product.weight=weights.id
        WHERE quantityInStock > 0 AND id_milk=?
        ', [$id]);
        return $db;
    }
    /**
     * Récuperation d'un élément par l'id de la region
     *
     * @param integer $id
     * @return void
     */
    public function GetAllByRegion(int $id) //$id parametre de la fonction
    {
        //connexion à la base 
        $cnx = new Database();
        $db = $cnx->query('SELECT product.id,product.name,weights.name as weightName,product.description,product.picture,product.id_milk,product.id_dough,product.id_region,product.id_knife,product.id_shape,product.id_wine1,product.id_wine2,quantityInStock,salePrice,buyPrice,exclusivity,conseil_degustation 
        FROM product 
        INNER JOIN `weights` ON product.weight=weights.id WHERE quantityInStock > 0 AND id_region=?', [$id]);
        return $db;
    }
    /**
     * Récuperation d'un élément par l'id du type de pâte
     *
     * @param integer $id
     * @return void
     */
    public function GetAllByDough(int $id) //$id parametre de la fonction
    {
        //connexion à la base 
        $cnx = new Database();
        $db = $cnx->query('SELECT product.id,product.name,weights.name as weightName,product.description,product.picture,product.id_milk,product.id_dough,product.id_region,product.id_knife,product.id_shape,product.id_wine1,product.id_wine2,quantityInStock,salePrice,buyPrice,exclusivity,conseil_degustation 
        FROM product
        INNER JOIN `weights` ON product.weight=weights.id 
        WHERE quantityInStock > 0 AND id_dough=?', [$id]);
        return $db;
    }

    /**
     * Récuperation d'un élément esclusivity = 1
     *
     * @return void
     */
    public function GetExclusivite()
    {
        //connexion à la base 
        $cnx = new Database();
        $db = $cnx->queryOne('SELECT product.id,product.name,weights.name as weightName,product.description,product.picture,product.id_milk,product.id_dough,product.id_region,product.id_knife,product.id_shape,product.id_wine1,product.id_wine2,quantityInStock,salePrice,buyPrice,exclusivity,conseil_degustation 
        FROM `product`
        INNER JOIN `weights` ON product.weight=weights.id
        WHERE exclusivity=1 AND quantityInStock > 0');
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
        $db = $cnx->executeSql("UPDATE `product` SET `name` = ?, `description` =?, `picture` = ?, `id_milk` = ?, `id_dough` = ?, `id_shape` = ?, `id_knife` = ?, `id_wine1` = ?, `id_wine2` = ?, `quantityInStock` = ?,`weight`=?, `buyPrice` = ?, `salePrice` = ?, `exclusivity` = ?, `conseil_degustation` = ? WHERE `product`.id = ?", [$this->name, $this->description, $this->picture, $this->id_milk, $this->id_dough, $this->id_shape, $this->id_knife, $this->id_wine1, $this->id_wine2, $this->quantityInStock, $this->weight,$this->buyPrice, $this->salePrice, $this->exclusivity, $this->conseil, $this->id]);
        return $db;
        $flash = new FlashService();
        $flash->add('Votre produit a bien été modifié.');
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
        $db = $cnx->executeSql("INSERT INTO `product` (`name`, `description`, `picture`, `id_milk`, `id_dough`,`id_shape`, `id_knife`, `id_wine1`, `id_wine2`, `quantityInStock`,`weight`, `buyPrice`, `salePrice`,`exclusivity`, `conseil_degustation`,`id_region`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", [$this->name, $this->description, $this->picture, $this->id_milk, $this->id_dough, $this->id_shape, $this->id_knife, $this->id_wine1, $this->id_wine2, $this->quantityInStock,$this->weight, $this->buyPrice, $this->salePrice, $this->exclusivity, $this->conseil, $this->id_region]);
    }

    /**
     * Mise a jour de la quantité en stock
     *
     * @param int $id_product id du produit
     * @param int $quantity 
     * @return void
     */
    public function updateQuantity(int $id_product, int $quantity)
    {
        //connexion à la base 
        $db = new Database();
        $db->executeSql(
            "UPDATE `product` SET `quantityInStock` = ? WHERE id = ? ",
            [$quantity, $id_product]
        );
    }

    /**
     * récuperation de tout les élements en fonction des selections efféctuées
     *
     * @return void
     */ 
    public function getAllBy( $id_milk = null, $id_dough = null,$id_region = null)
    {
        $params = [];
        $request="";     
        //connexion à la base 
        $cnx = new Database();
        if($id_milk != null)
         {
          $params = [$id_milk] ;
          $request ="id_milk=?";
                if($id_dough != null)
                {
                 $request = "id_milk=? AND id_dough=?";
                 $params=[$id_milk,$id_dough];
                   if($id_region != null)
                   {
                      $request = "id_milk=? AND id_dough=? AND id_region=?";
                      $params=[$id_milk,$id_dough, $id_region];
                   }
                }
                elseif($id_dough == null && $id_region != null)
                {
                    $request = "id_milk=? AND id_region=?";
                    $params=[$id_milk,$id_region];
                       if($id_dough != null)
                      {
                      $request = "id_milk=? AND id_dough=? AND id_region=?";
                      $params=[$id_milk,$id_dough, $id_region];
                      }
                } 
        }
        elseif($id_milk == null)
        { 
            if($id_dough != null)
                {
                 $request = "id_dough=?";
                 $params=[$id_dough];
                   if($id_region != null)
                   {
                      $request = "id_dough=? AND id_region=?";
                      $params=[$id_dough, $id_region];
                   }
                }
                else
                {
                    $request = "id_region=?";
                    $params=[$id_region];   
                }
        }             
        elseif($id_dough != null){
            $params = [$id_dough] ;
            $request ="id_dough=?";   
         }
        elseif($id_region != null){
            $params = [$id_region] ;
            $request ="id_region=?";   
         }
        else{
            $params = [$id_milk] ;
            $request ="id_milk=?";
         }
  
        $db = $cnx->query("SELECT product.id,product.name,product.description,product.picture,product.id_milk,product.id_dough,product.id_region,product.id_knife,product.id_shape,product.id_wine1,product.id_wine2,quantityInStock,`weight`,weights.name as weightName,salePrice,buyPrice,exclusivity,conseil_degustation,milk.name as milkName, dough.name as doughName, region.name as regionName, region.picture as regionPicture, shape.name as shapeName, shape.picture as shapePicture , knife.name as knifeName , knife.picture as knifePicture
                            FROM product 
                            INNER JOIN milk ON product.id_milk=milk.id  
                            INNER JOIN dough ON product.id_dough=dough.id 
                            INNER JOIN region ON product.id_region=region.id 
                            INNER JOIN knife ON product.id_knife=knife.id
                            INNER JOIN shape ON product.id_shape=shape.id 
                            INNER JOIN `weights` ON product.weight=weights.id
                            WHERE quantityInStock > 0 AND $request",
       $params);
       return $db;
    }
    
     /**
     * Récuperation de tous les elements list admin
     * @return void
     */
    public function getAllAdmin()
    {
        $cnx = new Database();
        $db=$cnx->queryPage('SELECT product.id,product.name,product.description,product.picture,product.id_milk,product.id_dough,product.id_region,product.id_knife,product.id_shape,product.id_wine1,product.id_wine2,quantityInStock,`weight`,weights.name as weightName,salePrice,buyPrice,exclusivity,conseil_degustation,milk.name as milkName, dough.name as doughName, region.name as regionName, region.picture as regionPicture, shape.name as shapeName, shape.picture as shapePicture , knife.name as knifeName , knife.picture as knifePicture
        FROM product 
        INNER JOIN milk ON product.id_milk=milk.id  
        INNER JOIN dough ON product.id_dough=dough.id 
        INNER JOIN region ON product.id_region=region.id 
        INNER JOIN knife ON product.id_knife=knife.id
        INNER JOIN shape ON product.id_shape=shape.id
        INNER JOIN `weights` ON product.weight=weights.id
        ORDER BY id DESC
        LIMIT :premier, :parpage');
        return $db;
       
    }
    
    public function getAllAdminEdit()
    {
        $cnx = new Database();
        $db=$cnx->queryPage('SELECT product.id,product.name,product.description,product.picture,product.id_milk,product.id_dough,product.id_region,product.id_knife,product.id_shape,product.id_wine1,product.id_wine2,quantityInStock,`weight`,weights.name as weightName,salePrice,buyPrice,exclusivity,conseil_degustation,milk.name as milkName, dough.name as doughName, region.name as regionName, region.picture as regionPicture, shape.name as shapeName, shape.picture as shapePicture , knife.name as knifeName , knife.picture as knifePicture
        FROM product 
        INNER JOIN milk ON product.id_milk=milk.id  
        INNER JOIN dough ON product.id_dough=dough.id 
        INNER JOIN region ON product.id_region=region.id 
        INNER JOIN knife ON product.id_knife=knife.id
        INNER JOIN shape ON product.id_shape=shape.id
        INNER JOIN `weights` ON product.weight=weights.id
        ORDER BY id DESC');
        return $db;
        $flash = new FlashService();
        $flash->add('Votre produit a bien été modifié.');
       
    }
    
    /**
     * recuperation du nombre de produit total
     * 
     */
    public function getNbrAdmin()

    {
    $cnx = new Database();
    $db = $cnx->query('SELECT COUNT(*)as nbr FROM product ');
    return $db;
    }

    /**
     * fonction magique retourne une chaine de caractère
     *
     * @return string
     */
    public function __toString()
    {
        return $this->name . " " .
            $this->description . " " .
            $this->picture . " " .
            $this->conseil . " " ;
    }
   
}


     
    


   

