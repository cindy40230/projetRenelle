<?php

class WeightadminController extends Controller
{

    /**
     * Affichage de la liste des poids
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
        $weights = new Weights();
        $weights = $weights->getAll();
        //dd($weights);

        //affichage
        $this->renderView(
            'admin/weight_list_admin',
            [
                'esclusivite' => $esclusivite,
                'milks' => $milks,
                'trays' => $trays,
                'doughs' => $doughs,
                'regions' => $regions,
                'weights' => $weights,
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

        if (array_key_exists('Name_weight', $_POST)) //si la cle name existe
        {
            $weight = new Weights();
            $weight->setId(htmlspecialchars($_GET['id']));
            $weight->setName(htmlspecialchars($_POST['Name_weight']));
            // appeler la fonction qui permet de faire modifier dans la bdd
            $weight->edit();
            $this->redirectTo("index.php?controller=weightadmin&action=index");
        }
        $weight = new Weights();
        $weight = $weight->getOneById(htmlspecialchars($_GET['id']));

        $this->renderView('admin/weight_edit_admin',
        
            [
                'esclusivite' => $esclusivite,
                'weight' => $weight,
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
        if (isset($_POST['Name_weight'])) {
            $weight = new Weights();
            $weight->setName(htmlspecialchars($_POST['Name_weight']));
            $weight->insert();
            $this->redirectTo("index.php?controller=weightadmin&action=index");
        }
        $this->renderView('admin/weight_insert_admin',
        
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
