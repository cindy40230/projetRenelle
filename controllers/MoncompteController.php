<?php

class MoncompteController extends Controller 
{

    /**
     * vue d'un compte
     *
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
        $session->getIdUser();
        $orders = new Order();
        $orders = $orders->getAll(htmlspecialchars($_GET['id']));
        // affichage
        $this->renderView(
            'moncompte',
            [
                'esclusivite' => $esclusivite,
                'session' => $session,
                'trays' => $trays,
                'milks' => $milks,
                'doughs' => $doughs,
                'regions' => $regions,
                'orders' => $orders
            ]
        );
    }
    /**
     * liste de toutes les commandes
     *
     */

    public function allorder()
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
        $session->getIdUser();
        $orders = new Order();
        $orders = $orders->getAll(htmlspecialchars($_GET['id']));
        $order = new Order();
        $order = $order->getOne(htmlspecialchars($_GET['id']));
        // affichage
        $this->renderView(
            'list_order',
            [
                'esclusivite' => $esclusivite,
                'session' => $session,
                'orders' => $orders,
                'trays' => $trays,
                'milks' => $milks,
                'doughs' => $doughs,
                'regions' => $regions,
                'order'=>$order
            ]
        );
    }

    /**
     * Detail d'une commande commandes
     *
     */
    public function orderDetail()
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
        $session->getIdUser();
        $orderLines = new Order();
        $orderLines = $orderLines->getAllOrderLine(htmlspecialchars($_GET['id']));
        //var_dump($orderLines);die;
        $shipping= new Shipping();
       
        if( $orderLines[0]['WeightTotal']>0 && $orderLines[0]['WeightTotal']<=0.25)
        {    
        $shipping=$shipping->getOne(1);
          
        }
        elseif ($orderLines[0]['WeightTotal']>0.25 && $orderLines[0]['WeightTotal']<0.50)
        {
         $shipping=$shipping->getOne(2);
        }    
        elseif ($orderLines[0]['WeightTotal']>0.50 && $orderLines[0]['WeightTotal']<0.75)
        {
         $shipping=$shipping->getOne(3);
        }
        elseif ($orderLines[0]['WeightTotal']>0.75 && $orderLines[0]['WeightTotal']<1)
        {
        $shipping=$shipping->getOne(4);
        }         
        elseif ($orderLines[0]['WeightTotal']>1 && $orderLines[0]['WeightTotal']<2)
        {
        $shipping=$shipping->getOne(5);   
        }
        else
        {
         $shipping=$shipping->getOne(6);
        }
       // var_dump($shipping);die;
        // affichage
        $this->renderView(
            'orderlines',
            [
                'esclusivite' => $esclusivite,
                'session' => $session,
                'orderLines' => $orderLines,
                'trays' => $trays,
                'milks' => $milks,
                'doughs' => $doughs,
                'regions' => $regions,
                'shipping'=>$shipping
            ]
        );
    }


    /**
     * edition et modification des données d'un utilisateur
     *
     */
    public function edit()
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
        $user = new User();
        $user = $user->getOne(htmlspecialchars($_GET['id']));
        if (isset($_POST["email"])) {
            $user = new User();
            $id = htmlspecialchars($_GET['id']);
            $lastName = htmlspecialchars($_POST['lastName']);
            $firstName = htmlspecialchars($_POST['firstName']);
            $email = htmlspecialchars($_POST['email']);
            $password =htmlspecialchars($_POST['password']);
            $birthday = htmlspecialchars($_POST['birthYear']). "-" . htmlspecialchars($_POST['birthMonth']) . "-" . htmlspecialchars($_POST['birthDay']);
            $address = htmlspecialchars($_POST['address']);
            $city = htmlspecialchars($_POST['city']);
            $zipCode = htmlspecialchars($_POST['zipCode']);
            $country = htmlspecialchars($_POST['country']);
            $phone = htmlspecialchars($_POST['phone']);
            if ($session->isAdmin() != 1) {
                $admin = 0;
            } else {
                $admin = 1;
            }
            $user->edit($lastName, $firstName, $email, $password, $birthday, $address, $city, $zipCode, $country, $phone, $admin, $id);
            // var_dump($user);die;
        }
        $user = new User();
        $user = $user->getOne(htmlspecialchars($_GET['id']));
        //var_dump($user);die;
       
        $this->renderView('infos',

            [
                'esclusivite' => $esclusivite,
                'user' => $user,
                'trays' => $trays,
                'milks' => $milks,
                'doughs' => $doughs,
                'regions' => $regions,
                'flash' => new FlashService()
            ]
        );
    }
    
}