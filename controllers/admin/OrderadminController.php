<?php
class OrderadminController extends Controller 
{
    /**
     * Affichage de la liste des commandes
     *
     * @return void
     */
    public function index()
    {
        $session = new UserSession();
        if ($session->isAdmin() != 1) {
            $this->redirectTo("index.php?controller=login&action=index");
        }
        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();
        $trays = new Tray();
        $trays = $trays->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $regions = new Region();
        $regions = $regions->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $o = new Order();
        $o = $o->getNbrAdmin();
        $nbrOrder = $o[0]['nbr'];
        //var_dump($nbrProduct);die;
        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $currentPage = (int) strip_tags(htmlspecialchars($_GET['page']));
            // var_dump($currentPage);die;
        } else {
            $currentPage = 1;
        }
        $parPage = 12;
        // On calcule le nombre de pages total
        $pages = ceil($nbrOrder / $parPage);
        //var_dump($pages);die;   
        // Calcul du 1er article de la page
        $premier = ($currentPage * $parPage) - $parPage;
        //var_dump($premier,$parPage);die();
        $orders = new Order();
        $orders = $orders->getAllAdmin($premier, $parPage);
        // var_dump($products);die;


        //affichage
        $this->renderView('admin/order_list_admin',
            [
                'esclusivite' => $esclusivite,
                'orders' => $orders,
                'milks' => $milks,
                'trays' => $trays,
                'doughs' => $doughs,
                'regions' => $regions,
                'pages' => $pages,
                'currentPage' => $currentPage
            ]
        );
    }
    
    
    /**
     * Modification de l'element
     *
     * @return void
     */
    public function edit()
    {
        $session = new UserSession();
        if ($session->isAdmin() != 1) //si tu n 'es pas admin tu es rediriger vers la page login
        {
            $this->redirectTo("index.php?controller=login&action=index");
        }
        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();
        $trays = new Tray();
        $trays = $trays->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $regions = new Region();
        $regions = $regions->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $statuts = new Statut();
        $statuts = $statuts->getAll();

        if (array_key_exists('User_id', $_POST)) {
            $order = new Order();
            $order->setId(htmlspecialchars($_GET['id']));
            $order->setUser_id(htmlspecialchars($_POST['User_id']));
            $order->setTotalAmount(htmlspecialchars($_POST['TotalAmount']));
            $order->setTaxRate(htmlspecialchars($_POST['TaxRate']));
            $order->setTaxAmount(htmlspecialchars($_POST['TaxAmount']));
            $order->setStatut(htmlspecialchars($_POST['statut']));
            $order->setCreatedate(htmlspecialchars($_POST['date']));
            $order->setWeightTotal(htmlspecialchars($_POST['weightTotal']));
            $order->edit();
            //dd($order);
            $this->redirectTo("index.php?controller=orderadmin&action=index");
        }
        $order = new Order();
        $order = $order->getOne(htmlspecialchars($_GET['id']));
        //dd($order);
        $this->renderView('admin/order_edit_admin',
            [
                'esclusivite' => $esclusivite,
                'order' => $order,
                'milks' => $milks,
                'trays' => $trays,
                'doughs' => $doughs,
                'regions' => $regions,
                'statuts' => $statuts
            ]
        );
    }
    
    
    /**
     * Affichage Detail de la commande 
     *
     * @return void
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
       // var_dump($orderLines);die;
        $shipping = new Shipping();

        if ($orderLines[0]['WeightTotal'] > 0 && $orderLines[0]['WeightTotal'] <= 0.25) {
            $shipping = $shipping->getOne(1);
        } elseif ($orderLines[0]['WeightTotal'] > 0.25 && $orderLines[0]['WeightTotal'] < 0.50) {
            $shipping = $shipping->getOne(2);
        } elseif ($orderLines[0]['WeightTotal'] > 0.50 && $orderLines[0]['WeightTotal'] < 0.75) {
            $shipping = $shipping->getOne(3);
        } elseif ($orderLines[0]['WeightTotal'] > 0.75 && $orderLines[0]['WeightTotal'] < 1) {
            $shipping = $shipping->getOne(4);
        } elseif ($orderLines[0]['WeightTotal'] > 1 && $orderLines[0]['WeightTotal'] < 2) {
            $shipping = $shipping->getOne(5);
        } else {
            $shipping = $shipping->getOne(6);
        }
        
        
        // affichage
        $this->renderView('admin/order_detail_admin',
            [
                'esclusivite' => $esclusivite,
                'session' => $session,
                'orderLines' => $orderLines,
                'trays' => $trays,
                'milks' => $milks,
                'doughs' => $doughs,
                'regions' => $regions,
                'shipping' => $shipping
            ]
        );
    }
}
