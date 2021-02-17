<?php

class AboutController extends Controller
{
     /**
     * affichage de la page à propos
     */
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
        $this->renderView('about',
            [
                'esclusivite' => $esclusivite,
                'trays' => $trays,
                'milks' => $milks,
                'doughs' => $doughs,
                'regions' => $regions
            ]
        );
    }
}
