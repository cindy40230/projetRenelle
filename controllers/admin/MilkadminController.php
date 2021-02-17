<?php

class MilkadminController extends Controller 
{
    /**
     * Affichage listes des laits
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
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $regions = new Region();
        $regions = $regions->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        //affichage
        $this->renderView('admin/milk_list_admin',

            [
                'esclusivite' => $esclusivite,
                'milks' => $milks,
                'trays' => $trays,
                'doughs' => $doughs,
                'regions' => $regions,
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
        
        if(array_key_exists('Name_milk', $_POST))//si la cle name existe
        {
            $m=new Milk();
            $m->setId(htmlspecialchars($_GET['id']));
            $m->setName(htmlspecialchars($_POST['Name_milk']));
            // appeler la fonction qui permet de faire modifier dans la bdd
            $m->edit();
            $this->redirectTo("index.php?controller=milkadmin&action=index");
        }
         $m=new Milk();
         $m=$m->getOneById(htmlspecialchars($_GET['id']));

         
         $this->renderView('admin/milk_edit_admin',
        
         [
         'esclusivite'=>$esclusivite,
         'm'=>$m,
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
        if (isset($_POST['Name_milk'])) {
            $milk = new Milk();
            $milk->setName(htmlspecialchars($_POST['Name_milk']));
            $milk->insert();
            $this->redirectTo("index.php?controller=milkadmin&action=index");
        }
        $this->renderView('admin/milk_insert_admin',

            [
            'esclusivite' => $esclusivite,
            'milks' => $milks,
            'trays' => $trays,
            'doughs' => $doughs,
            'regions' => $regions,
            'flash' => new FlashService()]
        );
    }
}
