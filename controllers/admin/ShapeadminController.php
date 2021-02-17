<?php
class ShapeadminController extends Controller
{
    /**
     * Affichage liste des formes
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

        $shapes = new Shape();
        $shapes = $shapes->getAll();
        //var_dump($milks);die;

        //affichage
        $this->renderView( 'admin/shape_list_admin',
        
            [
                'esclusivite' => $esclusivite,
                'shapes' => $shapes,
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

        if (isset($_POST['Name_shape'])) {
            $shape = new Shape();
            $sh = $shape->getOneById(htmlspecialchars($_GET['id']));
            $shape->setId(htmlspecialchars($_GET['id']));
            $shape->setName(htmlspecialchars($_POST['Name_shape']));
            if (!empty($_FILES['Picture_shape']['name'])) {
                $result_file = $this->uploadImage('assets/img/shape/', "Picture_shape");
                if ($result_file) {
                    unlink("assets" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "shape" . DIRECTORY_SEPARATOR . $sh['picture']);
                }
                $shape->setPicture($result_file);
            } else {
                $shape->setPicture(htmlspecialchars($sh['picture']));
            }
            $shape->edit();
            $this->redirectTo("index.php?controller=shapeadmin&action=index");
        }
        $shape = new Shape();
        $shape = $shape->getOneById(htmlspecialchars($_GET['id']));
        
        $this->renderView('admin/shape_edit_admin',
        
            [
                'esclusivite' => $esclusivite,
                'shape' => $shape,
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
        if (isset($_POST['Name_shape'])) {
            $shape = new Shape();
            $shape->setName(htmlspecialchars($_POST['Name_shape']));
            $reponse = $this->uploadImage('assets/img/shape/', "Picture");
            if ($reponse) {
                $shape->setPicture($reponse);
                // appeler la fonction qui permet de faire l'insertion dans la bdd
            }
            $shape->insert();
            $this->redirectTo("index.php?controller=shapeadmin&action=index");
        }
        $this->renderView('admin/shape_insert_admin',
        
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
}
