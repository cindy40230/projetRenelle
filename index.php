<?php
require_once "vendor/autoload.php";
require_once "utilities/Config.php";
require_once 'utilities/Autoload.php';

// monsite.fr/index.php?controller=front&action=index


//Routeur principal

$uri = $_SERVER['REQUEST_URI'];
// On vérifie si elle n'est pas vide et si elle se termine par un /
if (!empty($uri) && $uri != '/' && $uri[-1] === '/') {
    // Dans ce cas on enlève le /
    $uri = substr($uri, 0, -1);
    // On envoie une redirection permanente
    http_response_code(301);
    // On redirige vers l'URL dans /
    header('Location: ' . $uri);
    exit;
}
// vérification et instanciation du bon contrôleur puis appeler la bonne méthode.
if (isset($_GET['controller'])) {
    if (!empty($_GET['controller'])) { //On sauvegarde le 1er paramètre dans $class en mettant sa 1ère lettre en majuscule, et en ajoutant "Controller" à la fin
        $class = ucfirst(strtolower($_GET['controller'])) . "Controller"; //ucfirst Met le premier caractère en majuscule
        //strtolower renvoie une chaine de caractère en minuscule
        try {
            // On instancie le contrôleur
            $controller = new $class();
        } catch (Exception $e) // sinon 
        {
            $error = $e->getMessage();
            include("views/404.phtml");
            exit();
            die($e->getMessage());
        }
        if (isset($_GET['action'])) {
            // Si il y a des paramètres, on les passe dans  la méthode sous forme de tableau
            if (!empty($_GET['action'])) {
                $action = $_GET['action'];
                try {
                    if (method_exists($controller, $action)) {
                        $controller->$action();
                    } else {
                        throw new Exception('Methode inexistante');                      
                    }
                } catch (Exception $e) {

                    $error = $e->getMessage();
                    include("views/404.phtml");
                    exit();
                    die($e->getMessage());
                    
                }
            } else { 
                http_response_code(404);
                throw new Exception('cette page n\'existe pas');           
            }
        } else {
            // On appelle la méthode index
            $controller->index();
        }
    } else {
        // On envoie le code réponse 404
        http_response_code(404);
        throw new Exception('cette page n\'existe pas');
        
    }
} else {
    // aucun paramètre n'est défini
    // On instancie le contrôleur par défaut (celui de la page d'accueil)
    $controller = new HomeController();
    //et on appelle la methode index
    $controller->index();
}
