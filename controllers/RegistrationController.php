<?php

class RegistrationController extends Controller
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
    $this->renderView('registration',
    
      [
        'esclusivite' => $esclusivite,
        'trays' => $trays,
        'milks' => $milks,
        'doughs' => $doughs,
        'regions' => $regions
      ]);
  }
  
   /**
     * Méthode de création de compte
     *
     */
  
  public function createAccount()
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
    try {
      if (isset($_POST["registration_submit"])) {
        // récuperer les données du formulaire

        $lastName = htmlspecialchars($_POST['lastName']);
        $firstName = htmlspecialchars($_POST['firstName']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $birthday = $_POST['birthYear'] . "-" . $_POST['birthMonth'] . "-" . $_POST['birthDay'];
        $address = htmlspecialchars($_POST['address']);
        $city = htmlspecialchars($_POST['city']);
        $zipCode = htmlspecialchars($_POST['zipCode']);
        $country = htmlspecialchars($_POST['country']);
        $phone = htmlspecialchars($_POST['phone']);
        $admin = 0;
        //insertion user
        $user = new User();
        $user = $user->insertUser($lastName, $firstName, $email, $password, $birthday, $address, $city, $zipCode, $country, $phone, $admin);
      }
      $this->redirectTo("index.php?controller=login&action=index", ['esclusivite' => $esclusivite, 'user' => $user]);
    } catch (DomainException $e) {
      $error = $e->getMessage();
      
      
      $this->renderView('error',
      
        [
          'esclusivite' => $esclusivite,
          'trays' => $trays,
          'milks' => $milks,
          'doughs' => $doughs,
          'regions' => $regions,
          'error' => $error
        ]
      );
    }
  }
}
