<?php

class LoginController extends Controller
{

    public function index()
    {

        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();
        $trays = new Tray();
        $trays = $trays->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $regions = new Region();
        $regions = $regions->getAll();

        //affichage
        $this->renderView('login', 
        
        [
            'esclusivite' => $esclusivite,
            'trays' => $trays,
            'milks' => $milks,
            'doughs' => $doughs,
            'regions' => $regions, 
            'flash' => new FlashService()
        ]);
    }



    /**
     * La méthode de Connexion
     */
    public function cnx()
    {

        if (isset($_POST["email"])) {
            // récuperer les données du formulaire
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            //récupérer un utilisateur avec l'adresse mail donnée
            //getUserByMail($email) de user 
            $user = new User();
            $user = $user->getUserByMail($email);
            //Si l'utilisateur existe dans la base de donnée
            if ($user) {
                // vérifier son mot de passe
                if (password_verify($password,htmlspecialchars($user['password']))) // vérifier son mot de passe avec la bdd
                {
                    // si c'est mdp ok
                    // on stocke ses informations dans la session
                    $session = new UserSession();
                    //function create de usersession
                    $session->create($user['id'], $user['firstName'], $user['lastName'], $user['admin']);
                    // on le redirige vers la page d'accueil
                    if ($user['admin'] != 1) {
                        $this->redirectTo("index.php?controller=home&action=index");
                    } else {
                        $this->redirectTo("index.php?controller=homeadmin&action=index");
                    }
                } else {

                    $flash = new FlashService();
                    $flash->add('mot de passe incorrect');

                    $this->redirectTo("index.php?controller=login&action=index");

                    //echo "test";
                }
            } else  // Si l'utilisateur n'existe pas  
            {

                $flash = new FlashService();
                $flash->add('email inconnu ou incorrect');
                //echo "<script> alert('email incorrect')</script>"; 


                $this->redirectTo("index.php?controller=login&action=index");
            }
        } else {
            $this->redirectTo("index.php?controller=login&action=index", ['flash' => new FlashService()]);
        }
    }
    
    
    /**
     * La méthode de Déconnexion
     */
    public function  logout()
    {
        //vider la session 
        $session = new UserSession();
        $session->logout();
        $this->redirectTo("index.php?controller=home&action=index");
    }


    /**
     * La méthode de Connexion
     */
    public function verifMail()
    {
        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();
        $trays = new Tray();
        $trays = $trays->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $regions = new Region();
        $regions = $regions->getAll();

        if (isset($_POST["email"])) {
            // récuperer les données du formulaire
            $email = htmlspecialchars($_POST['email']);

            $user = new User();
            $user = $user->VeryfMail($email);
            //var_dump($user);die;
            if ($user) {
                $this->redirectTo("index.php?controller=login&action=newPass&id=" . $user['id']);
            }
        }
        // affichage
        $this->renderView("verif_mail", 
        
        [
            'esclusivite' => $esclusivite,
            'trays' => $trays,
            'milks' => $milks,
            'doughs' => $doughs,
            'regions' => $regions,
            'flash' => new FlashService()
        ]);
    }
 
    
    /**
     * La méthode modification mot de passe
     */
    public function newPass()
    {
        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();
        $trays = new Tray();
        $trays = $trays->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $regions = new Region();
        $regions = $regions->getAll();
        $session = new UserSession();
        $user = new User();
        $user = $user->getOne($_GET['id']);
        //dd($user);
        if (isset($_POST["email"])) {
            $user = new User();
            $id = htmlspecialchars($_GET['id']);
            $lastName = htmlspecialchars($_POST['lastName']);
            $firstName = htmlspecialchars($_POST['firstName']);
            $email = htmlspecialchars($_POST['email']);
            if(($_POST['password1'])===($_POST['password2']))
            $password = htmlspecialchars($_POST['password2']);
            $birthday = htmlspecialchars($_POST['birthYear']) . "-" . htmlspecialchars($_POST['birthMonth']) . "-" . htmlspecialchars($_POST['birthDay']);
            $address = htmlspecialchars($_POST['address']);
            $city = htmlspecialchars($_POST['city']);
            $zipCode = htmlspecialchars($_POST['zipCode']);
            $country = htmlspecialchars($_POST['country']);
            $phone = htmlspecialchars($_POST['phone']);
            $admin = htmlspecialchars($_POST['admin']);
            $user->edit($lastName, $firstName, $email, $password, $birthday, $address, $city, $zipCode, $country, $phone, $admin, $id);
           
            $this->redirectTo("index.php?controller=login&action=index");
        }
        $us = new User();
        $us = $us->getOne(htmlspecialchars($_GET['id']));
        //var_dump($user);die;
        
        
        $this->renderView('new_pass',

            [
                'esclusivite' => $esclusivite,
                'user' => $user,
                'trays' => $trays,
                'milks' => $milks,
                'doughs' => $doughs,
                'regions' => $regions,
                'flash' => new FlashService()
            ]
        );
    }
}
