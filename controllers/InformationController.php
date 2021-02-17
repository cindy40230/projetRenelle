<?php

class InformationController extends Controller 
{
    public function index()
    {
      
        $esclusivite= new Product();
        $esclusivite=$esclusivite->GetExclusivite();
        $trays=new Tray();
        $trays=$trays->getAll();
        $milks=new Milk();
        $milks=$milks->getAll();
        $doughs=new Dough();
        $doughs=$doughs->getAll();
        $regions=new Region();
        $regions=$regions->getAll();
        
         //affichage
        $this->renderView('information_livraison_paiement',
        [
        'esclusivite'=>$esclusivite,
        'trays'=>$trays,
        'milks'=>$milks,
        'doughs'=>$doughs,
        'regions'=>$regions
        ]);
    }
    
    
    
    public function mentionlegal()
    {
      
        $esclusivite= new Product();
        $esclusivite=$esclusivite->GetExclusivite();
        $trays=new Tray();
        $trays=$trays->getAll();
        $milks=new Milk();
        $milks=$milks->getAll();
        $doughs=new Dough();
        $doughs=$doughs->getAll();
        $regions=new Region();
        $regions=$regions->getAll();
        
         //affichage
        $this->renderView('mention_legal',
        
        [
        'esclusivite'=>$esclusivite,
        'trays'=>$trays,
        'milks'=>$milks,
        'doughs'=>$doughs,
        'regions'=>$regions
        ]);
    }
    
    
    public function cgv()
    {
      
        $esclusivite= new Product();
        $esclusivite=$esclusivite->GetExclusivite();
        $trays=new Tray();
        $trays=$trays->getAll();
        $milks=new Milk();
        $milks=$milks->getAll();
        $doughs=new Dough();
        $doughs=$doughs->getAll();
        $regions=new Region();
        $regions=$regions->getAll();
        
         //affichage
        $this->renderView('condition_generale_de_vente',
        
        [
        'esclusivite'=>$esclusivite,
        'trays'=>$trays,
        'milks'=>$milks,
        'doughs'=>$doughs,
        'regions'=>$regions
        ]);
    }
}