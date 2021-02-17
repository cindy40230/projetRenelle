<?php

class FlashService
{
    public function __construct()
    {
        if(session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }

        //Avons-nous déjà un flash
        if(array_key_exists('flash', $_SESSION) == false)
        {
            //créer le.
            $_SESSION['flash'] = array();
        }
    }
    /**
     * ajout d'un message
     *
     * @param string $message
     * @return void
     */
    public function add(string $message)
    {
        // Ajoutez le message spécifié à la fin du flash.
        array_push($_SESSION['flash'], $message);
    }
     
    /**
     * chercher un message
     *
     * @return void
     */
    public function fetchMessage()
    {
        // cherche le message le plus ancien du flash.
        return array_shift($_SESSION['flash']);
    }


    /**
     * récupération messages
     *
     * @return void
     */
    public function fetchMessages()
    {
        // cherche tous les message dans flash
        $messages = $_SESSION['flash'];

        //  supprime la cle flash de session
        $_SESSION['flash'] = array();

        return $messages;
    }
    

    /**
     * avons nous des messages
     *
     * @return boolean
     */
    public function hasMessages()
    {
        // Avons-nous des messages
        return empty($_SESSION['flash']) == false;
    }
}