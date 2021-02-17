<?php

/**
 * autochargement des fichiers
 */
spl_autoload_register(function ($class) {
    $sources  = [
        "controllers/$class.php",
        "controllers/admin/$class.php",
        "models/$class.php",
        "utilities/$class.php",
       

    ];
    $test = false;
    foreach ($sources as $source) {
        if (file_exists($source)) {
            $test = true;
            require_once $source;
        }
    }
    if ($test == false) { 
      throw new Exception('Page non trouvée');
    }
});
