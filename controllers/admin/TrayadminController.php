<?php

class TrayadminController extends Controller
{
    /**
     * Affichage liste des plateaux
     *
     * @return void
     */
    public function index()
    {
        $session = new UserSession();
        if ($session->isAdmin() != 1) 
        {
            $this->redirectTo("index.php?controller=login&action=index");
        }
        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();
        $regions = new Region();
        $regions = $regions->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $trays = new Tray();
        $trays = $trays->getAll();

        //affichage
        $this->renderView('admin/home_tray_list_admin',
        
            [
                'esclusivite' => $esclusivite,
                'doughs' => $doughs,
                'milks' => $milks,
                'trays' => $trays,
                'regions' => $regions,
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
        $products = new Product();
        $products = $products->getAllAdminEdit();
        $regions = new Region();
        $regions = $regions->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $trays = new Tray();
        $trays = $trays->getAll();
        $weights = new Weights();
        $weights = $weights->getAll();

        if (isset($_POST['Name_tray'])) {
            $trs = new Tray();
            $tr = $trs->getById(htmlspecialchars($_GET['id']));
            $trs->setId(htmlspecialchars($_GET['id']));
            $trs->setName(htmlspecialchars($_POST['Name_tray']));
            $trs->setDescription(htmlspecialchars($_POST['Description_tray']));
            $trs->setProduct1(htmlspecialchars($_POST['Name_product1']));
            $trs->setProduct2(htmlspecialchars($_POST['Name_product2']));
            if (!empty($_POST['Name_product3'])) {
                $trs->setProduct3(htmlspecialchars($_POST['Name_product3']));
            } else {
                $trs->setProduct3(htmlspecialchars($_POST['Name_product3']) == null);
            }
            if (!empty($_POST['Name_product4'])) {
            $trs->setProduct4(htmlspecialchars($_POST['Name_product4']));
            }
            else {
                $trs->setProduct4(htmlspecialchars($_POST['Name_product4']) == null);
            }
            if (!empty($_POST['Name_product5'])) {
            $trs->setProduct5(htmlspecialchars($_POST['Name_product5']));
            }else {
                $trs->setProduct5(htmlspecialchars($_POST['Name_product5']) == null);
            }
            $trs->setQuantityInStock(htmlspecialchars($_POST['QuantityInStock']));
            $trs->setWeight(htmlspecialchars($_POST['weight_tray']));
            $trs->setBuyPrice(htmlspecialchars(str_replace(',', '.',$_POST['BuyPrice'])));
            $trs->setSalePrice(htmlspecialchars(str_replace(',', '.',$_POST['SalePrice'])));
            if (!empty($_FILES['Picture']['name'])) {
                $result_file = $this->uploadImage('assets/img/produit/', "Picture");
                if ($result_file && !empty($tr['picture'])) {
                    unlink("assets" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "produit" . DIRECTORY_SEPARATOR . $tr['picture']);
                }
                $trs->setPicture($result_file);
            } else {
                $trs->setPicture(htmlspecialchars($tr['picture']));
            }
            $trs->edit();
            $this->redirectTo("index.php?controller=trayadmin&action=index");
        }
        $trs = new Tray();
        $trs = $trs->getById(htmlspecialchars($_GET['id']));

        //var_dump($tray);die;

        $this->renderView('admin/tray_edit_admin',
        
            [
                'esclusivite' => $esclusivite,
                'trs' => $trs,
                'products' => $products,
                'flash' => new FlashService(),
                'doughs' => $doughs,
                'milks' => $milks,
                'trays' => $trays,
                'regions' => $regions,
                'weights' => $weights
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
        $regions = new Region();
        $regions = $regions->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $products = new Product();
        $products = $products->getAllAdminEdit();
        $weights = new Weights();
        $weights = $weights->getAll();

        $trays = new Tray();
        $trays = $trays->getAll();
        // var_dump($trays);die;

        if (isset($_POST['Name_tray'])) {
            $tray = new Tray();
            $tray->setName(htmlspecialchars($_POST['Name_tray']));
            $tray->setDescription(htmlspecialchars($_POST['Description_tray']));
            $tray->setProduct1(htmlspecialchars($_POST['Name_product1']));
            $tray->setProduct2(htmlspecialchars($_POST['Name_product2']));
            if (!empty($_POST['Name_product3'])) {
                $tray->setProduct3(htmlspecialchars($_POST['Name_product3']));
            } else {
                $tray->setProduct3(htmlspecialchars($_POST['Name_product3']) == null);
            }
            if (!empty($_POST['Name_product4'])) {
                $tray->setProduct4(htmlspecialchars($_POST['Name_product4']));
            } else {
                $tray->setProduct4(htmlspecialchars($_POST['Name_product4']) == null);
            }
            if (!empty($_POST['Name_product5'])) {
                $tray->setProduct5(htmlspecialchars($_POST['Name_product5']));
            } else {
                $tray->setProduct5(htmlspecialchars($_POST['Name_product5']) == null);
            }
            $tray->setQuantityInStock(htmlspecialchars($_POST['QuantityInStock']));
            $tray->setWeight(htmlspecialchars($_POST['weight_tray']));
            $tray->setBuyPrice(htmlspecialchars(str_replace(',', '.',$_POST['BuyPrice'])));
            $tray->setSalePrice(htmlspecialchars(str_replace(',', '.',$_POST['SalePrice'])));
            //dd($tray);
            $reponse = $this->uploadImage('assets/img/produit/', "Picture");
            if ($reponse) {
                $tray->setPicture($reponse);
                // appeler la fonction qui permet de faire l'insertion dans la bdd
            }
            $tray->insert();
            $this->redirectTo("index.php?controller=trayadmin&action=index");
        }

        $this->renderView('admin/tray_insert_admin',
        
            [
                'esclusivite' => $esclusivite,
                'doughs' => $doughs,
                'milks' => $milks,
                'trays' => $trays,
                'regions' => $regions,
                'products' => $products,
                'weights' => $weights,
                'flash' => new FlashService()
            ]
        );
    }

    public function delete()
    {

        $tray = new Tray();
        $result = $tray->deleteTray(htmlspecialchars($_GET['id']));
        $this->sendJsonResponse(["result" => "ok"]);
    }
}
