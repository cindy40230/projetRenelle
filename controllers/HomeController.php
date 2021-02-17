<?php

class HomeController extends Controller 
{

    /**
     * Vue page d'accueil
     *
     * @return void
     */
    public function index()
    {
        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();
        $trays = new Tray();
        $trays = $trays->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $regions = new Region();
        $regions = $regions->getAll();
       

        //affichage
        $this->renderView('home', 
        
        [
            'esclusivite' => $esclusivite,
            'trays' => $trays,
            'milks' => $milks,
            'doughs' => $doughs,
            'regions' => $regions
        ]);
    }
}
