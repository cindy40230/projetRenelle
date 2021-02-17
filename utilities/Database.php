<?php

/**
 * Objet database
 */

class Database
{


    private $cnx;
    /**
     * constructeur
     */
    public function __construct()
    {
        try { //essaie de te connecter
            // instanciation de PDO
            $this->cnx = new PDO(
                // DSN de connexion
                "mysql:host=" . DATABASE['host'] . ";dbname=" . DATABASE['dbname'] . ";charset=utf8",
                DATABASE['user'],
                DATABASE['password']
            );
        } catch (PDOException $exception) //declenche une exception des lors que la connexion c'est mal passer
        {
            die($exception->getMessage()); //recupère les messages d'exception
        }
    }

    /**
     * contraire du constructeur
     */
    public function __destruct()
    {
        $this->cnx = null;
        
    }

    /**
     * récupération de tout
     *
     * @param string $sql
     * @param array $criteria
     * @return void
     */
    public function query(string $sql, array $criteria = array())
    {
        $query = $this->cnx->prepare($sql);

        $query->execute($criteria);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * mise a jour , insertion, suppression d'un élément
     *
     * @param string $sql
     * @param array $values
     * @return void
     */
    public function executeSql(string $sql, array $values = array())
    {
        $query = $this->cnx->prepare($sql);
        $r = $query->execute($values);
        //var_dump($query->errorInfo());
        //dd($r, $query);
        return $this->cnx->lastInsertId();
    }

    /**
     * récupération avec critère
     *
     * @param string $sql
     * @param array $criteria
     * @return void
     */
    public function queryOne(string $sql, array $criteria = array())
    {
        $query = $this->cnx->prepare($sql);

        $query->execute($criteria);

        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
    
     public function queryPage(string $sql,array $criteria= [])
    {
        if(isset($_GET['page']) && !empty($_GET['page'])){
            $currentPage =(int) strip_tags($_GET['page']);
           // var_dump($currentPage);die;
        }else{
            $currentPage =1;
        }
        
        $parPage =12;
        $premier = ($currentPage * $parPage) - $parPage;
   
        $query = $this->cnx->prepare($sql);
        $query->bindValue(':premier',$premier,PDO::PARAM_INT);
        $query->bindValue(':parpage',$parPage ,PDO::PARAM_INT);
        if(empty($criteria))
        $query->execute();
        else
         $query->execute($criteria);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
