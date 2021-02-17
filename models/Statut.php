<?php
/**
 * objet statut
 */
class Statut
{
    /**
     * recuperation de tous les elements
     *
     * @return void
     */
    public function getAll()
    {
        $cnx=new Database();//connexion à la base 
        $db=$cnx->query('SELECT id,name FROM `statut`');
        return $db;
    }
}