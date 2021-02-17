<?php
class KnifeadminController extends Controller 
{
    /**
     * Affichage liste des couteaux
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
        $knifes = new Knife();
        $knifes = $knifes->getAll();
        //var_dump($milks);die;

        //affichage
        $this->renderView('admin/knife_list_admin',

            [
                'esclusivite' => $esclusivite,
                'doughs' => $doughs,
                'milks' => $milks,
                'trays' => $trays,
                'regions' => $regions,
                'knifes' => $knifes,
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

        if (isset($_POST['Name_knife'])) {
            $knife = new Knife();
            $kn = $knife->getOneById(htmlspecialchars($_GET['id']));
            $knife->setId(htmlspecialchars($_GET['id']));
            $knife->setName(htmlspecialchars($_POST['Name_knife']));
            if (!empty($_FILES['Picture_knife']['name'])) {
                $result_file = $this->uploadImage('assets/img/knife/', "Picture_knife");
                if ($result_file) {
                    unlink("assets" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "knife" . DIRECTORY_SEPARATOR . $kn['picture']);
                }
                $knife->setPicture($result_file);
            } else {
                $knife->setPicture(htmlspecialchars($kn['picture']));
            }
            $knife->edit();
            $this->redirectTo("index.php?controller=knifeadmin&action=index");
        }
        $knife = new Knife();
        $knife = $knife->getOneById(htmlspecialchars($_GET['id']));
        $this->renderView('admin/knife_edit_admin',
            [
                'esclusivite' => $esclusivite,
                'knife' => $knife,
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
        if (isset($_POST['Name_knife'])) {
            $knife = new Knife();
            $knife->setName(htmlspecialchars($_POST['Name_knife']));
            $reponse = $this->uploadImage('assets/img/knife/', "Picture");
            if ($reponse) {
                $knife->setPicture($reponse);
                
            }
            // appeler la fonction qui permet de faire l'insertion dans la bdd
            $knife->insert();
            $this->redirectTo("index.php?controller=knifeadmin&action=index");
        }
        $this->renderView('admin/knife_insert_admin',
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
