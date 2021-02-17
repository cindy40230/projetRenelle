<?php

class WineadminController extends Controller
{
    /**
     * Affichage liste des vins
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
        $regions = new Region();
        $regions = $regions->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $w = new Wine();
        $w = $w->getNbrAdmin();
        $nbrWine = $w[0]['nbr'];
        //var_dump($nbrProduct);die;
        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $currentPage = (int) strip_tags(htmlspecialchars($_GET['page']));
            // var_dump($currentPage);die;
        } else {
            $currentPage = 1;
        }
        $parPage = 15;
        // On calcule le nombre de pages total
        $pages = ceil($nbrWine / $parPage);
        // Calcul du 1er article de la page
        $premier = ($currentPage * $parPage) - $parPage;
        $wines = new Wine();
        $wines = $wines->getAllAdmin($premier, $parPage);

        //affichage
        $this->renderView('admin/wine_list_admin',
        
            [
                'esclusivite' => $esclusivite,
                'wines' => $wines,
                'doughs' => $doughs,
                'milks' => $milks,
                'trays' => $trays,
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
        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();
        $trays = new Tray();
        $trays = $trays->getAll();
        $regions = new Region();
        $regions = $regions->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();

        if (array_key_exists('Name_wine', $_POST)) //si la cle name existe
        {
            $wine = new Wine();
            $wine->setId(htmlspecialchars($_GET['id']));
            $wine->setName(htmlspecialchars($_POST['Name_wine']));
            $wine->setZoned(htmlspecialchars($_POST['Zoned_wine']));
            $wine->setColor(htmlspecialchars($_POST['Color_wine']));

            // appeler la fonction qui permet de faire modifier dans la bdd
            $wine->edit();
            $this->redirectTo("index.php?controller=wineadmin&action=index");
        }
        $wine = new Wine();
        $wine = $wine->getOneById(htmlspecialchars($_GET['id']));
        
        $this->renderView('admin/wine_edit_admin',

            [
                'esclusivite' => $esclusivite,
                'wine' => $wine,
                'doughs' => $doughs,
                'milks' => $milks,
                'trays' => $trays,
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
        $regions = new Region();
        $regions = $regions->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        if (isset($_POST['Name_wine'])) {
            $wine = new Wine();
            $wine->setName(htmlspecialchars($_POST['Name_wine']));
            $wine->setZoned(htmlspecialchars($_POST['Zoned_wine']));
            $wine->setColor(htmlspecialchars($_POST['Color_wine']));

            $wine->insert();
            $this->redirectTo("index.php?controller=wineadmin&action=index");
        }
        
        $this->renderView('admin/wine_insert_admin',

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
     * Supression d'un élément
     *
     * @return void
     */
    public function delete()
    {
        $wine = new Wine();
        $result = $wine->deleteWine(htmlspecialchars($_GET['id']));
        $this->sendJsonResponse(["result" => "ok"]);
    }
}
