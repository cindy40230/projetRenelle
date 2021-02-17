<?php

/**
 * objet commande
 */
class Order
{
    /**
     * id de la commande
     * @var int
     */
    private $id;
    /**
     * id de l'utilisateur
     * @var int
     */
    private $user_id;
    /**
     * montant total de la commande
     * @var float
     */
    private $totalAmount;
    /**
     * montant de la taxe
     * @var float
     */
    private $taxRate;
    /**
     * montant de la taxe de la commande
     * @var float
     */
    private $taxAmount;
    /**
     * poids totale commande
     * @var float
     */
    private $weithTotal;
    /**
     * statut de la commande
     * @var string
     */
    private $statut;
    /**
     * date de la commande
     * @var string
     */
    private $createdate;

    /**
     * Obtenez la valeur de l'id de la commande
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Définir la valeur de l'id de la commande
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * Obtenez la valeur de l'id de l'utilisateur
     */
    public function getUser_id()
    {
        return $this->user_id;
    }
    /**
     * Définir la valeur de l'id de l'utilisateur
     *
     * @return  self
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }
    /**
     * Obtenez la valeur du montant de la commande
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }
    /**
     * Définir la valeur du montant de la commande
     *
     * @return  self
     */
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;
    }
    /**
     * Obtenez la valeur du poids total
     */
    public function getWeightTotal()
    {
        return $this->WeightTotal;
    }
    /**
     * Définir la valeur du poids total
     *
     * @return  self
     */
    public function setWeightTotal($WeightTotal)
    {
        $this->WeightTotal = $WeightTotal;
    }
    /**
     * Obtenez la valeur de la taxe
     */
    public function getTaxRate()
    {
        return $this->taxRate;
    }
    /**
     * Définir la valeur de la taxe
     *
     * @return  self
     */
    public function setTaxRate($taxRate)
    {
        $this->taxRate = $taxRate;
    }
    /**
     * Obtenez la valeur du montant de la taxe de la commande
     */
    public function getTaxAmount()
    {
        return $this->taxAmount;
    }
    /**
     * Définir la valeur du montant de la taxe de la commande
     *
     * @return  self
     */
    public function setTaxAmount($taxAmount)
    {
        $this->taxAmount = $taxAmount;
    }
    /**
     * Obtenez la valeur du statut de la commande
     */
    public function getStatut()
    {
        return $this->statut;
    }
    /**
     * Définir la valeur du statut de la commande
     *
     * @return  self
     */
    public function setStatut($statut)
    {
        $this->statut  = $statut;
    }
    /**
     * Obtenez la valeur de la date de la commande
     */
    public function getCreatedate()
    {
        return $this->createdate;
    }
    /**
     * Définir la valeur de la date de la commande
     *
     * @return  self
     */
    public function setCreatedate($createdate)
    {
        $this->createdate = $createdate;
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
        $db = $cnx->queryOne('SELECT * FROM `order` WHERE id=?', [$id]);
        return $db;
       
    }
    /**
     * Récuperation d'un élément par son id 
     *
     * @param integer $id
     * @return void
     */
    public function getOneLastId($id)
    {
        //connexion à la base 
        $cnx = new Database();
        $db = $cnx->queryOne('SELECT * 
        FROM`order`
        WHERE user_id=?
        ORDER BY id DESC
        LIMIT 1', [$id]);
        return $db;
    }

    /**
     * Récuperation de tous les elements par l'id de l'utilisateur
     * @return void
     */
    public function getAll($id)
    {
        $cnx = new Database(); //connexion à la base 
        $db = $cnx->query('SELECT `order`.id as id_order,ROUND(totalAmount,2) as TotalAmount,
        ROUND(taxAmount,2) as TaxAmount,taxRate,orderDate,
        user_id,statut_id,statut.name,statut.id,weightTotal
        FROM `order` INNER JOIN statut ON statut.id =`order`.statut_id 
        WHERE user_id=? ORDER BY orderDate DESC', [$id]); //stockage du resultat dans une variable 
        return $db; //retour le resultat en tableau
    }

    /**
     * Récuperation de tous les elements
     * @return void
     */
    public function getAllOrder()
    {
        $cnx = new Database(); //connexion à la base 
        $db = $cnx->query('SELECT `order`.id as id_order,ROUND(totalAmount,2) as TotalAmount,ROUND(taxAmount,2) as TaxAmount,taxRate,orderDate,user_id,`order`.statut_id,statut.name,statut.id,user.lastName,user.firstName,weightTotal 
        FROM `order` 
        INNER JOIN statut ON statut.id =`order`.statut_id
        INNER JOIN user ON user.id =`order`.user_id
        ORDER BY orderDate DESC'); //stockage du resultat dans une variable 
        return $db; //retour le resultat en tableau

    }

    /**
     * Récuperation de tous les elements page admin
     * @return void
     */
    public function getAllAdmin()
    {

        $cnx = new Database();
        $db = $cnx->queryPage('SELECT `order`.id as id_order,ROUND(totalAmount,2) as TotalAmount,ROUND(taxAmount,2) as TaxAmount,taxRate,orderDate,user_id,`order`.statut_id,statut.name,statut.id,user.lastName,user.firstName,weightTotal
        FROM `order` 
        INNER JOIN statut ON statut.id =`order`.statut_id
        INNER JOIN user ON user.id =`order`.user_id
        ORDER BY orderDate DESC 
        LIMIT :premier, :parpage');
        return $db;
    }

    /**
     * Récuperation du nombre d' elements
     * @return void
     */
    public function getNbrAdmin()

    {
        $cnx = new Database();
        $db = $cnx->query('SELECT COUNT(*)as nbr FROM `order` ');
        return $db;
    }

    /**
     * Insertion commande
     *
     * @return void
     */
    public function insert(
        $userId,
        $totalAmount,
        $taxRate,
        $taxAmount,
        $statut,
        $weightTotal
    ) {

        $cnx = new Database();
        $last_id = $cnx->executeSql(
            "INSERT INTO `order` 
                        (user_id, totalAmount,taxRate,taxAmount,statut_id,weightTotal,orderDate)
                        VALUES (?, ?, ?,?,?,?,NOW())",
            [
                $userId,
                $totalAmount,
                $taxRate,
                $taxAmount,
                $statut,
                $weightTotal
            ]
        );
        return $last_id;
    }

    /**
     * Récuperer les ligne de commande par l'id de la commmande 
     *
     * @return void
     */
    public function getAllOrderLine($id)
    {
        $cnx = new Database();
        $db = $cnx->query('SELECT quantityOrdered, ROUND(orderlines.priceEach,2)as PriceEach,tray.name as `trayName`, product.name as `Name`,ROUND(`order`.totalAmount,2) as  TotalAmount,ROUND(product.salePrice,2)as SalePriceProduct,ROUND(tray.salePrice,2)as SalePriceTray ,ROUND(quantityOrdered*PriceEach,2) as TotalLine,weightTotal as WeightTotal,orderlines.type
        FROM orderlines 
        LEFT JOIN product ON product.id= orderlines.product_id
        LEFT JOIN tray ON tray.id= orderlines.product_id
        INNER JOIN `order` ON `order`.id= orderlines.order_id
        WHERE order_id=?', [$id]);
        return $db;
    }

    /**
     * Insertion ligne de commande
     *
     * @return void
     */
    public function insertOrderlines(int $id_order, array $orderLines)
    {
        $cnx = new Database();
        foreach ($orderLines as $orderLine) {
            $db = $cnx->executeSql(
                "INSERT INTO orderlines (order_id,quantityOrdered,product_id,priceEach,type)
                                VALUES (?,?,?,?,?)",
                [
                    $id_order,
                    $orderLine['2'],
                    $orderLine['4'],
                    $orderLine['1'],
                    $orderLine['7']
                ]
            );
        }
    }

    /**
     * Modification du status de la commande
     *
     * @return void
     */
    public function edit()
    {
        $cnx = new Database();
        $db = $cnx->executeSql("UPDATE `order` 
        SET 
        `user_id`=?,
        `totalAmount`=?,
        `taxRate`=?, 
        `taxAmount`=?,
        `statut_id`=?,
        `orderDate`=?
         WHERE `order`.id = ?", [$this->user_id, $this->totalAmount, $this->taxRate, $this->taxAmount, $this->statut, $this->createdate, $this->id]);

        // Ajout d'un message de notification 
        $flash = new FlashService();
        $flash->add('Le statut  de la commande a bien été modifié.');
        //dd($db);
    }
}
