<?php

class LayoutController extends Controller
{
    public function index()
    {
      
        
        $esclusivite= new Product();
        $esclusivite=$esclusivite->GetExclusivite();
        $product = new Product();
        $product = $product->getOne(htmlspecialchars($_GET['id']));
        $trays=new Tray();
        $trays=$trays->getAll();
        $milks=new Milk();
        $milks=$milks->getAll();
        $doughs=new Dough();
        $doughs=$doughs->getAll();
        $regions=new Region();
        $regions=$regions->getAll();
        dd($esclusivite,$product,$trays,$milks,$doughs,$regions);die;
        
         //affichage
        $this->renderView('layout',
        
        [
        'esclusivite'=>$esclusivite,
        'product'=>$product,
        'trays'=>$trays,
        'milks'=>$milks,
        'doughs'=>$doughs,
        'regions'=>$regions]);
    }
}