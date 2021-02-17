<?php

class HometrayController extends Controller 
{
    /**
     * vue de la page d'accueil plateau
     *
     */
    public function index()
    {
         /* récupération des données */
        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();
        $trays = new Tray();
        $trays = $trays->getAll();
        $milks=new Milk();
        $milks=$milks->getAll();
        $doughs=new Dough();
        $doughs=$doughs->getAll();
        $regions=new Region();
        $regions=$regions->getAll();
        $trs = new Tray();
        $trs = $trs->getAll();
        
        //affichage
        $this->renderView('home_tray',
        
            [
                'esclusivite' => $esclusivite,
                'trays' => $trays,
                'milks'=>$milks,
                'doughs'=>$doughs,
                'regions'=>$regions,
                'trs'=>$trs
            ]
        );
    }


    /**
     * vue d'un plateau
     *
     */
    public function show()
    {
         /* récupération des données */
        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();
        $trays = new Tray(); 
        $trays = $trays->getAll();
        $milks=new Milk();
        $milks=$milks->getAll();
        $doughs=new Dough();
        $doughs=$doughs->getAll();
        $regions=new Region();
        $regions=$regions->getAll();
        $trs=new Tray();
        $trs =$trs->getById(htmlspecialchars($_GET['id']));
        $tra = new Tray(); 
        $tra = $tra->getOne(htmlspecialchars($_GET['id']));
        $tray1 = new Tray();
        $tray1 = $tray1->getTwo(htmlspecialchars($_GET['id']));
        $tray2 = new Tray();
        $tray2 = $tray2->getThree(htmlspecialchars($_GET['id']));
        $tray3 = new Tray();
        $tray3 = $tray3->getFour(htmlspecialchars($_GET['id']));
        $tray4 = new Tray();
        $tray4 = $tray4->getFive(htmlspecialchars($_GET['id']));
       
        //affichage
        $this->renderView('tray_detail',
            [
                'esclusivite' => $esclusivite,
                'tra' => $tra,
                'tray1' => $tray1,
                'tray2' => $tray2,
                'tray3' => $tray3,
                'tray4' => $tray4,
                'trays'=>$trays,
                'milks'=>$milks,
                'doughs'=>$doughs,
                'regions'=>$regions,
                'trs'=>$trs
            ]
        );
    }
}
