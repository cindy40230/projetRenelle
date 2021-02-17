<?php

class ShippingadminController extends Controller
{
    /**
     * Affichage listes des laits
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
        $shippings = new Shipping();
        $shippings = $shippings->getAll();

        //affichage
        $this->renderView('admin/shipping_list_admin',
        
            [
                'esclusivite' => $esclusivite,
                'milks' => $milks,
                'trays' => $trays,
                'doughs' => $doughs,
                'regions' => $regions,
                'shippings' => $shippings,
                'flash' => new FlashService()
            ]
        );
    }
    /**
     * Modification de l'élément
     *
     * @return void
     */
    public function edit()
    {
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

        if (array_key_exists('Name_shipping', $_POST)) //si la cle name existe
        {
            $shipping = new Shipping();
            $shipping->setId(htmlspecialchars($_GET['id']));
            $shipping->setName(htmlspecialchars($_POST['Name_shipping']));
            $shipping->setPrice(htmlspecialchars(str_replace(',', '.',$_POST['Price_shipping'])));
            // appeler la fonction qui permet de faire modifier dans la bdd
            $shipping->edit();
            $this->redirectTo("index.php?controller=shippingadmin&action=index");
        }
        $shipping = new Shipping();
        $shipping = $shipping->getOneById(htmlspecialchars($_GET['id']));


        $this->renderView('admin/shipping_edit_admin',
        
            [
                'esclusivite' => $esclusivite,
                'shipping' => $shipping,
                'milks' => $milks,
                'trays' => $trays,
                'doughs' => $doughs,
                'regions' => $regions,
                'flash' => new FlashService()
            ]
        );
    }
    
    
    /**
     * Insertion d'un nouveau élément
     *
     * @return void
     */
    public function insert()
    {
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
        if (isset($_POST['Name_shipping'])) {
            $shipping = new Shipping();
            $shipping->setName(htmlspecialchars($_POST['Name_shipping']));
            $shipping->setPrice(htmlspecialchars($_POST['Price_shipping']));
            $shipping->insert();
            $this->redirectTo("index.php?controller=shippingadmin&action=index");
        }
        $this->renderView('admin/shipping_insert_admin',
        
            [
                'esclusivite' => $esclusivite,
                'milks' => $milks,
                'trays' => $trays,
                'doughs' => $doughs,
                'regions' => $regions,
                'flash' => new FlashService()
            ]
        );
    }
}
