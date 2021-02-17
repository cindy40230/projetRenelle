<?php

class PostadminController extends Controller
{
    
    
    /**
     * Affichage liste des régions
     *
     * @return void
     */
    public function index()
    {
        $session = new UserSession();
        if ($session->isAdmin() != 1) {
            $this->redirectTo("index.php?controller=login&action=index");
        }
        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();
        $trays = new Tray();
        $trays = $trays->getAll();
        $regions = new Region();
        $regions = $regions->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $posts =new Post();
        $posts=$posts->getAll();

        //affichage
        $this->renderView('admin/post_list_admin',
        
            [
                'esclusivite' => $esclusivite,
                'regions' => $regions,
                'doughs' => $doughs,
                'milks' => $milks,
                'trays' => $trays,
                'posts'=>$posts,
                'flash' => new FlashService()
            ]
        );
    }



    /**
     * Modification de l'élément
     *
     * @return void
     */
    public function edit()
    {
        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();
        $trays = new Tray();
        $trays = $trays->getAll();
        $regions = new Region();
        $regions = $regions->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $categorys=new Category();
        $categorys = $categorys->getAll();

        if (isset($_POST['title_post'])) {
            $post = new Post();
            $po = $post->getOneById(htmlspecialchars($_GET['id']));
            $post->setId(htmlspecialchars($_GET['id']));
            $post->setTitle(htmlspecialchars($_POST['title_post']));
            $post->setDescription(htmlspecialchars($_POST['Description_post']));
            $post->setCategory(htmlspecialchars($_POST['category']));
            $post->setCreatedDate(date("Y-m-d H:i:s"));    
            if (!empty($_FILES['Picture']['name'])) {
                $result_file = $this->uploadImage('assets/img/upload/', "Picture");
                if ($result_file) {
                    unlink("assets" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "upload" . DIRECTORY_SEPARATOR . $po['picture']);
                }
                $post->setPicture($result_file);
            } else {
                $post->setPicture(htmlspecialchars($po['picture']));
            }
            $post->edit();
            $this->redirectTo("index.php?controller=postadmin&action=index");
        }
        $post = new Post();
        $post = $post->getOneById(htmlspecialchars($_GET['id']));
        
        $this->renderView('admin/post_edit_admin',
            [
                'esclusivite' => $esclusivite,
                'post' => $post,
                'regions' => $regions,
                'doughs' => $doughs,
                'milks' => $milks,
                'trays' => $trays,
                'categorys'=>$categorys,
                'flash' => new FlashService()
            ]
        );
    }


    /**
     * Insertion d'un nouveau élément
     *
     * @return void
     */
    public function insert()
    {
        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();
        $trays = new Tray();
        $trays = $trays->getAll();
        $regions = new Region();
        $regions = $regions->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $categorys=new Category();
        $categorys = $categorys->getAll();

        if (isset($_POST['title_post'])) {
          $post = new Post();
          $post->setTitle(htmlspecialchars($_POST['title_post']));
          $post->setDescription(htmlspecialchars($_POST['Description_post']));
          $post->setCategory(htmlspecialchars($_POST['category']));
          $post->setCreatedDate(date("Y-m-d H:i:s")); 
            $reponse = $this->uploadImage('assets/img/upload/', "Picture");
            if ($reponse) {
                $post->setPicture($reponse);
                // appeler la fonction qui permet de faire l'insertion dans la bdd
            }
            $post->insert();
            $this->redirectTo("index.php?controller=postadmin&action=index");
        }
        $this->renderView('admin/post_insert_admin',
        
            [
                'esclusivite' => $esclusivite,
                'regions' => $regions,
                'doughs' => $doughs,
                'milks' => $milks,
                'trays' => $trays,
                'categorys'=>$categorys,
                'flash' => new FlashService()
            ]
        );
    }


    /**
     * Suppression d'un élément
     *
     * @return void
     */
    public function delete()
    {
        $post = new Post();
        $result = $post->deletePost(htmlspecialchars($_GET['id']));
        $this->sendJsonResponse(["result" => "ok"]);
       
    }
}
