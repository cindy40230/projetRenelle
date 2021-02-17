<?php

class HomeadminController extends Controller 
{
    /**
     * Affichage list produit (12 / pages)
     *
     * @return void
     */
    public function index()
    {
        $session = new UserSession();
        if ($session->isAdmin() != 1) {
            //si tu n 'es pas admin tu es rediriger vers la page login
            $this->redirectTo("index.php?controller=login&action=index");
        }
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
        $p = new Product();
        $p = $p->getNbrAdmin();
        $nbrProduct = $p[0]['nbr'];

        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $currentPage = (int) strip_tags(htmlspecialchars($_GET['page']));
        } else {
            $currentPage = 1;
        }
        $parPage = 12;
        // On calcule le nombre de pages total
        $pages = ceil($nbrProduct / $parPage);

        // Calcul du 1er article de la page
        $premier = ($currentPage * $parPage) - $parPage;

        $products = new Product();
        $products = $products->getAllAdmin($premier, $parPage);
        
        //affichage
        $this->renderView(
            'admin/home_product_list_admin',
            [
                'esclusivite' => $esclusivite,
                'products' => $products,
                'trays' => $trays,
                'milks' => $milks,
                'doughs' => $doughs,
                'regions' => $regions,
                'pages' => $pages,
                'currentPage' => $currentPage,
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
        $session = new UserSession();
        if ($session->isAdmin() != 1) {
            //si tu n 'es pas admin tu es rediriger vers la page login
            $this->redirectTo("index.php?controller=login&action=index");
        }
        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();
        $trays = new Tray();
        $trays = $trays->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $shapes = new Shape();
        $shapes = $shapes->getAll();
        $knifes = new Knife();
        $knifes = $knifes->getAll();
        $regions = new Region();
        $regions = $regions->getAll();
        $wines = new Wine();
        $wines = $wines->getAll();
        $weights = new Weights();
        $weights = $weights->getAll();
        
       
       
        if(array_key_exists('Name_product', $_POST)) 
        {
            $product = new Product();
            $pr = $product->getOneById(htmlspecialchars($_GET['id']));
            
            $product->setId(htmlspecialchars($_GET['id']));
            $product->setName(htmlspecialchars($_POST['Name_product']));
            $product->setDescription(htmlspecialchars($_POST['Description_product']));
            $product->setId_milk(htmlspecialchars($_POST['Name_milk']));
            $product->setId_dough(htmlspecialchars($_POST['Name_dough']));
            $product->setId_shape(htmlspecialchars($_POST['Name_shape']));
            $product->setId_knife(htmlspecialchars($_POST['Name_knife']));
            $product->setId_region(htmlspecialchars($_POST['Name_region']));
            if (!empty($_POST['Name_wine1'])) {
                $product->setId_wine1(htmlspecialchars($_POST['Name_wine1']));
            }
            if (!empty($_POST['Name_wine2'])) {
                $product->setId_wine2(htmlspecialchars($_POST['Name_wine2']));
            }
            $product->setQuantityInStock(htmlspecialchars($_POST['QuantityInStock']));
            $product->setWeight(htmlspecialchars($_POST['Poids']));
            $product->setBuyPrice(htmlspecialchars(str_replace(',', '.',$_POST['BuyPrice'])));
            $product->setSalePrice(htmlspecialchars(str_replace(',', '.',$_POST['SalePrice'])));
            $product->setExclusivity(htmlspecialchars($_POST['exclusivity']));
            $product->setConseil(htmlspecialchars($_POST['Conseil_degustation']));
            if (!empty($_FILES['Picture']['name'])) {
                $pr = $product->getPicture();
                $result_file = $this->uploadImage('assets/img/produit/', "Picture");
                if ($result_file && !empty($pr['picture'])) {
                    unlink("assets" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "produit" . DIRECTORY_SEPARATOR . $pr['picture']);
                }
                $product->setPicture($result_file);
            } else {

                $product->setPicture(htmlspecialchars($pr['picture']));
            }
            $product->edit();
            //  var_dump($product);die;

            //redirection
            $this->redirectTo("index.php?controller=homeadmin&action=index");
        } else {

            $product = new Product();
            $product = $product->getOneById(htmlspecialchars($_GET['id']));
            //var_dump($product);die;

            $this->renderView(
                'admin/product_edit_admin',

                [
                    'esclusivite' => $esclusivite,
                    'product' => $product,
                    'milks' => $milks,
                    'doughs' => $doughs,
                    'shapes' => $shapes,
                    'knifes' => $knifes,
                    'regions' => $regions,
                    'wines' => $wines,
                    'trays' => $trays,
                    'weights' => $weights
                ]
            );
        }
    }

    /**
     * Insertion d'un nouveau élément
     *
     * @return void
     */
    public function insert()
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
        $milks = new Milk();
        $milks = $milks->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $shapes = new Shape();
        $shapes = $shapes->getAll();
        $knifes = new Knife();
        $knifes = $knifes->getAll();
        $regions = new Region();
        $regions = $regions->getAll();
        $wines = new Wine();
        $wines = $wines->getAll();
        $weights = new Weights();
        $weights = $weights->getAll();

        if (isset($_POST['Name_product'])) {
            $product = new Product();
            $product->setName(htmlspecialchars($_POST['Name_product']));
            $product->setDescription(htmlspecialchars($_POST['Description_product']));
            $product->setId_milk(htmlspecialchars($_POST['Name_milk']));
            $product->setId_dough(htmlspecialchars($_POST['Name_dough']));
            $product->setId_shape(htmlspecialchars($_POST['Name_shape']));
            $product->setId_knife(htmlspecialchars($_POST['Name_knife']));
            $product->setId_region(htmlspecialchars($_POST['Name_region']));
            if (($_POST['Name_wine1'])=="") {
            $product->setId_wine1(null);
            }else{
            $product->setId_wine1(htmlspecialchars($_POST['Name_wine1']));
            }
            if (($_POST['Name_wine2'])== "") {
            $product->setId_wine2(null);
            }else{
            $product->setId_wine2(htmlspecialchars($_POST['Name_wine2']));
            }
            $product->setQuantityInStock(htmlspecialchars($_POST['QuantityInStock']));
            $product->setWeight(htmlspecialchars($_POST['Poids']));
            $product->setBuyPrice(htmlspecialchars(str_replace(',', '.',$_POST['BuyPrice'])));
            $product->setSalePrice(htmlspecialchars(str_replace(',', '.',$_POST['SalePrice'])));
            $product->setExclusivity(htmlspecialchars($_POST['exclusivity']));
            $product->setConseil(htmlspecialchars($_POST['Conseil_degustation']));
            $reponse = $this->uploadImage('assets/img/produit/', "Picture");
            if ($reponse) {
                $product->setPicture($reponse);
            }
            $product->insert();
            //dd($product);
            $this->redirectTo("index.php?controller=homeadmin&action=index");
        }

        $this->renderView(
            'admin/product_insert_admin',
            [
                'esclusivite' => $esclusivite,
                'milks' => $milks,
                'doughs' => $doughs,
                'trays' => $trays,
                'shapes' => $shapes,
                'knifes' => $knifes,
                'regions' => $regions,
                'wines' => $wines,
                'weights' => $weights
            ]
        );
    }
  
}
