<?php

class ValidateorderController extends Controller 
{
    public function index()
    {
        $esclusivite= new Product();
        $esclusivite=$esclusivite->GetExclusivite();
        
        $session = new UserSession();
        //si tu n 'es pas admin tu es rediriger vers la page login
        
        if($session->isLogged() != true)
        {
        $this->redirectTo("index.php?controller=login&action=index");
        }
        
        $user = new UserSession();
        $id=$user->getIdUser();
        $user = new User();
        $user=$user->getOne($id);
        
         //affichage
        $this->renderView('validateorder',
        
        [
        'esclusivite'=>$esclusivite,
        'user'=>$user
        ]);
    }
}