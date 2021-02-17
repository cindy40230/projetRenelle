<?php

/**
 * Controller principal
 */
abstract class Controller
{
    

    /**
     * Visualisation des vues
     *
     * @param string $view vues
     * @param array $params tableau des données
     * @return void
     */
    public function renderView(string $view, array $params = [])
    {
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                ${$key}  = $value;
            }
        }

        $template = "views/$view.phtml";
        include 'views/layout.phtml';
    }

    /**
     * Redirection avec paramètre
     *
     * @param [type] $controller le controller
     * @param [type] $action l'action
     * @return void
     */
    public function redirectToRoute($controller, $action)
    {

        header("Location: index.php?controller=$controller&action=$action");
        exit();
    }

    /**
     * Redirection par url
     *
     * @param [type] $url
     * @return void
     */
    public function redirectTo($url)
    {
        header("Location: $url");
        exit();
    }

    /**
     * TéléChargement d'une image
     *
     * @param string $target_dir source
     * @param string $file_input_name fichier
     * @return void
     */
    public function uploadImage(string $target_dir, string $file_input_name)
    {

        if (isset($_FILES[$file_input_name]["name"]) && !empty($_FILES[$file_input_name]["name"])) {

            $imagename = time() . basename($_FILES[$file_input_name]["name"]);
            $target_file = $target_dir . $imagename;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Vérifier si le fichier image est une image réelle ou une fausse image

            $check = filesize($_FILES[$file_input_name]["tmp_name"]);

            if ($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

            // Vérifier si le fichier existe déjà
            if (file_exists($target_file)) {
                $uploadOk = 0;
            }

            // Vérifier la taille du fichier
            if ($_FILES[$file_input_name]["size"] > 5000000) {
                // echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Autoriser certains formats de fichiers
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" && $imageFileType != "svg"
            ) {
                echo "Sorry, only JPG, JPEG,SVG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Vérifiez si $uploadOk est mis à 0 par une erreur
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                return false;
                // si tout va bien, essayez de télécharger le fichier
            } else {
                if (move_uploaded_file($_FILES[$file_input_name]["tmp_name"], $target_file)) {
                    return basename($imagename);
                } else {
                    echo "Sorry, there was an error uploading your file.";
                    return false;
                }
            }
        } else {
            return false;
        }
    }

    /**
     * renvoie la reponse json
     *
     * @param [type] $data
     * @return void
     */
    public function sendJsonResponse($data)
    {
        echo json_encode($data);
        exit();
    }
    
    
    
   
}
