<?php

class BlogController extends Controller
{
    
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
        $post =new Post();
        $post = $post->getOne();
        $categorys=new Category();
        $categorys=$categorys->getAll();
       
        // affichage
        $this->renderView('home_blog',
        
            [
                'esclusivite' => $esclusivite,
                'trays' => $trays,
                'milks' => $milks,
                'doughs' => $doughs,
                'regions' => $regions,
                'categorys'=>$categorys,
                'post'=> $post
            ]
        );
    }
    public function allPost()
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
        $categorys=new Category();
        $categorys=$categorys->getAll();
        $posts =new Post();
        $posts = $posts->getAll();
       
        // affichage
        $this->renderView('home_post',
        
            [
                'esclusivite' => $esclusivite,
                'trays' => $trays,
                'milks' => $milks,
                'doughs' => $doughs,
                'regions' => $regions,
                'posts'=> $posts,
                'categorys'=>$categorys
            ]
        );
    }
    public function show()
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
        $categorys=new Category();
        $categorys=$categorys->getAll();
        $post =new Post();
        $post = $post->getOneById(htmlspecialchars($_GET['id']));
       
        // affichage
        if (!empty($post)) {
        $this->renderView('show_post',
        
            [
                'esclusivite' => $esclusivite,
                'trays' => $trays,
                'milks' => $milks,
                'doughs' => $doughs,
                'regions' => $regions,
                'categorys'=>$categorys,
                'post'=> $post
            ]
        );
        
        }
        else {
        $this->redirectTo("index.php?controller=blog&action=allpost");
        }
    }
    public function getAllByCategory()
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
        $categorys=new Category();
        $categorys=$categorys->getAll();
        $posts =new Post();
        $posts = $posts->getAllByCategory(htmlspecialchars($_GET['id']));
       
        // affichage
        $this->renderView('home_post',
        
            [
                'esclusivite' => $esclusivite,
                'trays' => $trays,
                'milks' => $milks,
                'doughs' => $doughs,
                'regions' => $regions,
                'categorys'=>$categorys,
                'posts'=> $posts
            ]
        );
    }
  }