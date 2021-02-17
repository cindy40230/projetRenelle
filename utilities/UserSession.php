<?php


class UserSession
{
    /**
     * Constructeur
     */
    public function __construct()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    /**
     * Création de la session
     *
     * @param int $id 
     * @param string $firstName
     * @param string $lastName
     * @param string $admin
     * @return void
     */
    //inserer dans la session l'id le nom le prenom  ,administrateur  ou utilisateur 
    public function create(int $id, string $firstName, string $lastName, string $admin) 
    {
        //stockage des données de l'utilisateur dans un tableau user de la Session
        $_SESSION['user']['id'] = $id;
        $_SESSION['user']['firstName'] = $firstName;
        $_SESSION['user']['lastName'] = $lastName;
        $_SESSION['user']['admin'] = $admin;
    }

    /**
     * l'utilisateur est-il logger?
     *
     * @return boolean
     */
    public function isLogged()
    {
        //si la clé user dans session  n'existe pas
        if (!array_key_exists('user', $_SESSION)) {
            //retourne faux
            return false;
        }
        //sinon retourne vrai
        return true;
    }

    /**
     * l'utilisateur est-il un administrateur?
     *
     * @return boolean
     */
    public function isAdmin()
    {
        //si l'utilisateur n 'est pas logger
        if (!$this->isLogged()) {
            //retourne faux
            return false;
        }
        //sinon retourne qu'il est admin
        return $_SESSION['user']['admin'];
    }

    /**
     * Récuperation du nom et prénom de l'utilisateur
     *
     * @return void
     */
    public function getFullName()
    {
        //si l'utilisateur n 'est pas logger
        if (!$this->isLogged()) {
            //retourne faux
            return false;
        }
        //sinon retourne son nom et prénom
        return $_SESSION['user']['firstName'] . " " . $_SESSION['user']['lastName'];
    }

    /**
     * Récupération de l'id de l'utilisateur
     *
     * @return void
     */
    public function getIdUser()
    {
        //si l'utilisateur n 'est pas logger
        if (!$this->isLogged()) {
            //retourne faux
            return false;
        }
        //sinon retourne son id
        return $_SESSION['user']['id'];
    }

    /**
     * Déconnexion de l'utilisateur
     *
     * @return void
     */
    public function logout()
    {
        //Détruit la variable user de seesion
        unset($_SESSION['user']);
        header('Location:index.php');
        exit;
    }
}
