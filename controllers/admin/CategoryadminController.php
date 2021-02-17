<?php

class CategoryadminController extends Controller 
{
    /**
     * Affichage listes des categories
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
        $trays = new Tray();
        $trays = $trays->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $regions = new Region();
        $regions = $regions->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $categorys = new Category();
        $categorys = $categorys->getAll();

        //affichage
        $this->renderView(
            'admin/category_list_admin',

            [
                'esclusivite' => $esclusivite,
                'milks' => $milks,
                'trays' => $trays,
                'doughs' => $doughs,
                'regions' => $regions,
                'categorys'=> $categorys,
                'flash'=>new FlashService()
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
        $esclusivite= new Product();
        $esclusivite=$esclusivite->GetExclusivite();
        $trays = new Tray();
        $trays = $trays->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $regions = new Region();
        $regions = $regions->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $categorys = new Category();
        $categorys = $categorys->getAll();
        
        if(array_key_exists('Name_category', $_POST))//si la cle name existe
        {
            $category=new Category();
            $category->setId(htmlspecialchars($_GET['id']));
            $category->setName(htmlspecialchars($_POST['Name_category']));
            // appeler la fonction qui permet de faire modifier dans la bdd
            $category->edit();
            $this->redirectTo("index.php?controller=categoryadmin&action=index");
        }
        $category=new Category();
        $category=$category->getOne(htmlspecialchars($_GET['id']));

         
         $this->renderView('admin/category_edit_admin',
        
         ['esclusivite'=>$esclusivite,
         'category'=>$category,
         'milks'=>$milks,
         'trays' => $trays,
         'doughs' => $doughs,
         'regions' => $regions,
         'flash'=>new FlashService()
         ]); 
         
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

        if (isset($_POST['Name_category'])) {
            $category=new Category();
            $category->setId(htmlspecialchars($_GET['id']));
            $category->setName(htmlspecialchars($_POST['Name_category']));
            $category->insert();
            $this->redirectTo("index.php?controller=categoryadmin&action=index");
        }
        $this->renderView('admin/category_insert_admin',

            ['esclusivite' => $esclusivite,
             'milks' => $milks,
             'trays' => $trays,
             'doughs' => $doughs,
             'regions' => $regions,
             'flash' => new FlashService()]
        );
    }
}
