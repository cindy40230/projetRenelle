<?php

class MessageadminController extends Controller 
{
     /**
     * Affichage liste des messages
     *
     * @return void
     */
    public function index()
    {
        $session = new UserSession();
        if($session->isAdmin() != 1)
        {
        $this->redirectTo("index.php?controller=login&action=index");
        }
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
        
            $m = new Messages();
            $m = $m->getNbrAdmin();
            $nbrMessage = $m[0]['nbr'];
            //var_dump($nbrProduct);die;
            if (isset($_GET['page']) && !empty($_GET['page'])) {
                $currentPage = (int) strip_tags(htmlspecialchars($_GET['page']));
                // var_dump($currentPage);die;
            } else {
                $currentPage = 1;
            }
            $parPage = 12;
            // On calcule le nombre de pages total
            $pages = ceil($nbrMessage / $parPage);
            //var_dump($pages);die;   
            // Calcul du 1er article de la page
            $premier = ($currentPage * $parPage) - $parPage;
            //var_dump($premier,$parPage);die();
            $messages = new Messages();
            $messages = $messages->getAllAdmin($premier, $parPage);
            // var_dump($products);die;

         //affichage
        $this->renderView('admin/message_list_admin',
        
        ['esclusivite'=>$esclusivite,
        'messages'=>$messages,
        'milks' => $milks,
        'trays' => $trays,
        'doughs' => $doughs,
        'regions' => $regions,
        'pages' => $pages,
        'currentPage' => $currentPage]);
    }

    /**
     * vue du message 
     *
     */
     public function show()
    {
        $session = new UserSession();
        if($session->isAdmin() != 1)
        {
        $this->redirectTo("index.php?controller=login&action=index");
        }
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
        
        $message = new Messages();
        $message = $message->getOne(htmlspecialchars($_GET['id']));

         //affichage
        $this->renderView('admin/message_edit_admin',
        
        ['esclusivite'=>$esclusivite,
        'message'=>$message,
        'milks' => $milks,
        'trays' => $trays,
        'doughs' => $doughs,
        'regions' => $regions]);
    }
    
}