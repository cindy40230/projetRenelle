<?php

class RegionadminController extends Controller
{
    /**
     * Affichage liste des régions
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

        //affichage
        $this->renderView('admin/region_list_admin',
        
            [
                'esclusivite' => $esclusivite,
                'regions' => $regions,
                'doughs' => $doughs,
                'milks' => $milks,
                'trays' => $trays,
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

        if (isset($_POST['Name_region'])) {
            $r = new Region();
            $re = $r->getOneById(htmlspecialchars($_GET['id']));
            $r->setId(htmlspecialchars($_GET['id']));
            $r->setName(htmlspecialchars($_POST['Name_region']));
            if (!empty($_FILES['Picture_region']['name'])) {
                $result_file = $this->uploadImage('assets/img/region/', "Picture_region");
                if ($result_file) {
                    unlink("assets" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "region" . DIRECTORY_SEPARATOR . $re['picture']);
                }
                $r->setPicture($result_file);
            } else {
                $r->setPicture(htmlspecialchars($re['picture']));
            }
            // appeler la fonction qui permet de faire la modification dans la bdd
            $r->edit();
            $this->redirectTo("index.php?controller=regionadmin&action=index");
        }
        $r = new Region();
        $r = $r->getOneById(htmlspecialchars($_GET['id']));
        $this->renderView('admin/region_edit_admin',
        
            [
                'esclusivite' => $esclusivite,
                'r' => $r,
                'regions' => $regions,
                'doughs' => $doughs,
                'milks' => $milks,
                'trays' => $trays,
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

        if (isset($_POST['Name_region'])) {
            $region = new Region();
            $region->setName(htmlspecialchars($_POST['Name_region']));
            $reponse = $this->uploadImage('assets/img/region/', "Picture_region");
            if ($reponse) {
                $region->setPicture($reponse);
                
            }
            // appeler la fonction qui permet de faire l'insertion dans la bdd
            $region->insert();
            $this->redirectTo("index.php?controller=regionadmin&action=index");
        }
        $this->renderView('admin/region_insert_admin',
        
            [
                'esclusivite' => $esclusivite,
                'regions' => $regions,
                'doughs' => $doughs,
                'milks' => $milks,
                'trays' => $trays,
                'flash' => new FlashService()
            ]
        );
    }
}
