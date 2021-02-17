<?php

class BasketController extends Controller
{
    /**
     * affichage du panier
     */
    public function index()
    {
        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();
        $trays = new Tray();
        $trays = $trays->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $regions = new Region();
        $regions = $regions->getAll();
        $session = new UserSession();

        // affichage
        $this->renderView('basket',
        
            [
                'esclusivite' => $esclusivite,
                'trays' => $trays,
                'milks' => $milks,
                'doughs' => $doughs,
                'regions' => $regions
            ]
        );
    }


    /**
     * Insertion d'une commande,et ses lignes de commande
     *
     * @return void
     */
    public function insert()
    {

        $product = new Product();
        $tray = new Tray();
        $total = 0;
        $weighTotal = 0;
    
        foreach ($_POST['basket'] as $basket) {

            if ($basket['7'] == 'produit') {
                $producte = $product->getOne($basket['4']); //4 est la clé de l'id dans le tableau de la ligne
                $quantiteRestante = $producte['quantityInStock'] - $basket['2']; //2 est la clé de la quantité dans le tableau de la ligne
                $product->updateQuantity($basket['4'], $quantiteRestante);
                $total += floatval($basket['1']) * floatval($basket['2']); //floatval Convertit une chaîne en nombre à virgule flottante
                $weighTotal += floatval($basket['2']) * floatval($basket['6']) / 1000;
            } else {
                $producte = $tray->getOne($basket['4']);
                $total += floatval($basket['1']) * floatval($basket['2']);
                $weighTotal += floatval($basket['2']) * floatval($basket['6']) / 1000; //floatval Convertit une chaîne en nombre à virgule flottante 
            }
            
        }

        $order = new Order();
        $session = new UserSession(); //instancie une session pour recuperer l id user

        $id_order = $order->insert( //insert la commande 
            $session->getIdUser(), //id recuperer
            $total, //prix total
            20, //taux tva rentrer en force 
            ($total / 100) * 20,// calcul du montant de la taxe
            1,
            $weighTotal
        );
       
   function securePost($array){
         foreach ($array as $key => $value) {
              if(is_array($value)) $array[$key] = securePost($value);
              else $array[$key] = htmlentities($value, ENT_QUOTES);
         }
          return $array;
    }  
  
   $array=securePost($_POST['basket']);  
 
      

   $orderLine = new Order(); //instancie le order model pour utiliser insert ligne commande
   $orderLine = $orderLine->insertOrderlines($id_order,$array);
   $this->sendJsonResponse("ok");
    }



    /**
     * affichage de la validation
     */
    public function ValidateOrder()
    {
        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();
        $trays = new Tray();
        $trays = $trays->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $regions = new Region();
        $regions = $regions->getAll();

        // var_dump($livraisons);die;
        $session = new UserSession();
        if ($session->isLogged() != true) {
            $this->redirectTo("index.php?controller=login&action=index");
        }
        $user = new UserSession();
        $id = $user->getIdUser();
        $user = new User();
        $user = $user->getOne($id);
       
        //affichage
        $this->renderView('validateorder',
        
            [
                'esclusivite' => $esclusivite,
                'user' => $user,
                'trays' => $trays,
                'milks' => $milks,
                'doughs' => $doughs,
                'regions' => $regions
            ]
        );
    }



    /**
     * affichage frais de port
     */
       public function shipping()
    {
        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();
        $trays = new Tray();
        $trays = $trays->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $regions = new Region();
        $regions = $regions->getAll();

        // var_dump($livraisons);die;
       $session = new UserSession();
        if ($session->isLogged() != true) 
        {
            $this->redirectTo("index.php?controller=login&action=index");
        }
        $user = new UserSession();
        $id = $user->getIdUser();
        $user = new User();
        $user = $user->getOne($id);
        
        $order = new Order();
        $order=$order->getOneLastId($id);
        $shipping = new Shipping();

        if ($order['weightTotal'] > 0 && $order['weightTotal'] <= 0.25) {
            $shipping = $shipping->getOne(1);
        } elseif ($order['weightTotal'] > 0.25 && $order['weightTotal'] < 0.50) {
            $shipping = $shipping->getOne(2);
        } elseif ($order['weightTotal'] > 0.50 && $order['weightTotal'] < 0.75) {
            $shipping = $shipping->getOne(3);
        } elseif ($order['weightTotal'] > 0.75 && $order['weightTotal'] < 1) {
            $shipping = $shipping->getOne(4);
        } elseif ($order['weightTotal'] > 1 && $order['weightTotal'] < 2) {
            $shipping = $shipping->getOne(5);
        } else {
            $shipping = $shipping->getOne(6);
        }

        //affichage
        $this->renderView('shipping',
        
            [
                'esclusivite' => $esclusivite,
                'user' => $user,
                'order' => $order,
                'trays' => $trays,
                'milks' => $milks,
                'doughs' => $doughs,
                'regions' => $regions,
                'shipping' => $shipping
            ]
        );
    }



    /**
     * affichage de la page paiement
     */
    public function payment()
    {
        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();
        $trays = new Tray();
        $trays = $trays->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $regions = new Region();
        $regions = $regions->getAll();

        
        $this->renderView('payment',
        
            [
                'esclusivite' => $esclusivite,
                'trays' => $trays,
                'milks' => $milks,
                'doughs' => $doughs,
                'regions' => $regions,
                'flash' => new FlashService()
            ]
        );
    }
}
