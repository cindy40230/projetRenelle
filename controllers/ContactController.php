<?php

class ContactController extends Controller
{
    /**
     * affichage de la page contact et plan
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

        if (isset($_POST['email'])) {
            $message = new Messages();
            $message->setEmail(htmlspecialchars($_POST['email']));
            $message->setLastName(htmlspecialchars($_POST['lastName']));
            $message->setFirstName(htmlspecialchars($_POST['firstName']));
            $message->setSujet(htmlspecialchars($_POST['sujet']));
            $message->setContent(htmlspecialchars($_POST['message']));
            $message->insert();
            //dd($message);
        }
        //affichage
        $this->renderView('info_contact',
        
            [
                'esclusivite' => $esclusivite,
                'trays' => $trays,
                'milks' => $milks,
                'doughs' => $doughs,
                'regions' => $regions,
                'flash' => new FlashService()
            ]
        );
    }
}
