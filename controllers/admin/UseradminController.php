<?php

class UseradminController extends Controller 
{
    /**
     * Affichage liste des administrateurs
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
        $regions = new Region();
        $regions = $regions->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $trays = new Tray();
        $trays = $trays->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $users = new User();
        $users = $users->getAllAdmin();
        //var_dump($users);die;

        $this->renderView(
            'admin/admin_list_admin',
            [
                'esclusivite' => $esclusivite,
                'users' => $users,
                'doughs' => $doughs,
                'regions' => $regions,
                'milks' => $milks,
                'trays' => $trays
            ]
        );
    }
    /**
     * Affichage liste des utilisateurs
     *
     * @return void
     */
    public function AllUser()
    {
        $session = new UserSession();
        if ($session->isAdmin() != 1) 
        {
            $this->redirectTo("index.php?controller=login&action=index");
        }
        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();
        $regions = new Region();
        $regions = $regions->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $trays = new Tray();
        $trays = $trays->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $u = new User();
        $u = $u->getNbrAdmin();
        $nbrUser = $u[0]['nbr'];
        //var_dump($nbrProduct);die;
        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $currentPage = (int) strip_tags(htmlspecialchars($_GET['page']));
            // var_dump($currentPage);die;
        } else {
            $currentPage = 1;
        }
        $parPage = 12;
        // On calcule le nombre de pages total
        $pages = ceil($nbrUser / $parPage);
        //var_dump($pages);die;   
        // Calcul du 1er article de la page
        $premier = ($currentPage * $parPage) - $parPage;
        //var_dump($premier,$parPage);die();
        $users = new User();
        $users = $users->getAllUser($premier, $parPage);
        //var_dump($users);die;

        $this->renderView(
            'admin/user_list_admin',
            [
                'esclusivite' => $esclusivite,
                'users' => $users,
                'doughs' => $doughs,
                'regions' => $regions,
                'milks' => $milks,
                'trays' => $trays,
                'pages' => $pages,
                'currentPage' => $currentPage
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
        $session = new UserSession();
        if ($session->isAdmin() != 1) {
            $this->redirectTo("index.php?controller=login&action=index");
        }
        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();
        $regions = new Region();
        $regions = $regions->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $trays = new Tray();
        $trays = $trays->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        try {
            if (isset($_POST["Admin_submit"])) {
                // récuperer les données du formulaire

                $lastName = htmlspecialchars($_POST['lastName']);
                $firstName = htmlspecialchars($_POST['firstName']);
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);
                $birthday = '2020-08-01';
                $address = ' ';
                $city = ' ';
                $zipCode = ' ';
                $country = ' ';
                $phone = ' ';
                $admin = 1;
                
                $user = new User();
                $user = $user->insertAdmin($lastName, $firstName, $email, $password, $birthday, $address, $city, $zipCode, $country, $phone, $admin);
                $this->redirectTo("index.php?controller=useradmin&action=index");
            }

            $this->renderView('admin/admin_insert_admin',
            
                [
                    'esclusivite' => $esclusivite,
                    'doughs' => $doughs,
                    'regions' => $regions,
                    'milks' => $milks,
                    'trays' => $trays,
                    'flash' => new FlashService()
                ]
            );
        } catch (DomainException $e) 
        {
            $error = $e->getMessage();
            $this->renderView('error', 
            
            ['esclusivite' => $esclusivite, 
            'error' => $error]);
        }
    }
    
    
    
    /**
     * Modification de l'élément
     *
     * @return void
     */
    public function edit()
    {
        $session = new UserSession();
        $user = new User();
        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();
        $regions = new Region();
        $regions = $regions->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $trays = new Tray();
        $trays = $trays->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();

        $user = new User();
        $user = $user->getOne(htmlspecialchars($_GET['id']));
        //var_dump($user);die;
        
        $this->renderView('admin/user_edit_admin',
        
            [
                'esclusivite' => $esclusivite,
                'user' => $user,
                'doughs' => $doughs,
                'regions' => $regions,
                'milks' => $milks,
                'trays' => $trays,
                'flash' => new FlashService()
            ]
        );
    }
     /**
     * Suppression d'un administarteur
     *
     * @return void
     */
    public function delete()
    {
        $user = new User();
        $result = $user->deleteAdmin(htmlspecialchars($_GET['id']));
        $this->sendJsonResponse(["result" => "ok"]);
    }
}
