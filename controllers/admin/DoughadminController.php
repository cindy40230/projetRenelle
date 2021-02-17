<?php

class DoughadminController extends Controller 
{
    /**
     * Affichage liste de pâte
     *
     * @return void
     */
    public function index()
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
        $regions = new Region();
        $regions = $regions->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        //var_dump($milks);die;

        //affichage
        $this->renderView(
            'admin/dough_list_admin',

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
        $trays = new Tray();
        $trays = $trays->getAll();
        $regions = new Region();
        $regions = $regions->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();

        if (array_key_exists('Name_dough', $_POST)) {
            $d = new Dough();
            $d->setId(htmlspecialchars($_GET['id']));
            $d->setName(htmlspecialchars($_POST['Name_dough']));
            $d->edit();
            $this->redirectTo("index.php?controller=doughadmin&action=index");
        }
        $d = new Dough();
        $d = $d->getOneById(htmlspecialchars($_GET['id']));
        $this->renderView(
            'admin/dough_edit_admin',

            [
                'esclusivite' => $esclusivite,
                'd' => $d,
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
        $regions = new Region();
        $regions = $regions->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();

        if (isset($_POST['Name_dough'])) {
            $dough = new Dough();
            $dough->setName(htmlspecialchars($_POST['Name_dough']));
            $dough->insert();
            $this->redirectTo("index.php?controller=doughadmin&action=index");
        }
        $this->renderView(
            'admin/dough_insert_admin',

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
