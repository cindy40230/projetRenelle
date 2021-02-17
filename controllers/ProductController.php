<?php

class ProductController extends Controller 
{
  
  
    public function index()
{
    $esclusivite = new Product();
    $esclusivite = $esclusivite->GetExclusivite();
    $doughs = new Dough();
    $doughs = $doughs->getAll();
    $regions = new Region();
    $regions = $regions->getAll();
    $milks = new Milk();
    $milks = $milks->getAll();
    $trays=new Tray();
    $trays=$trays->getAll();
    // On détermine le nombre d'articles par page
    $p = new Product();
    $p=$p->getNbrProduit();
    $nbrProduct=$p[0]['nbr'];
    //var_dump($nbrProduct);die;
    if(isset($_GET['page']) && !empty($_GET['page'])){
        $currentPage = (int) strip_tags(htmlspecialchars($_GET['page']));
    // var_dump($currentPage);die;
    }else{
        $currentPage = 1;
    }
    $parPage = 12;    
    // On calcule le nombre de pages total
    $pages = ceil($nbrProduct / $parPage);
   
    // Calcul du 1er article de la page
    $premier = ($currentPage * $parPage) - $parPage;
    //var_dump($premier,$parPage);die();
    $products=new Product();
    $products= $products->getAll($premier,$parPage);
    //dd($products);

    /*affichage*/
    $this->renderView('home_product',
    
        [
            'products' => $products,
            'esclusivite' => $esclusivite,
            'doughs' => $doughs,
            'milks' => $milks,
            'regions' => $regions,
            'trays'=>$trays,
            'pages'=>$pages,
            'currentPage'=>$currentPage
        ]
    );
}


    /**
     * vue d'un produit 
     *
     */
    public function Show()
    {

        /* récupération des données by Id product*/
        $product = new Product();
        $product = $product->getOne(htmlspecialchars($_GET['id']));
        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();
        $milks = new Milk();
        $milks = $milks->getAll();
        $regions = new Region();
        $regions = $regions->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $trays=new Tray();
        $trays=$trays->getAll();
        $wine = new Wine();
        $wine1 = $wine->getOne(htmlspecialchars($_GET['id']));
        $wine = new Wine();
        $wine2 = $wine->getTwo(htmlspecialchars($_GET['id']));
      
           if (!empty($product)) {
        
        
      
        /*affichage*/
        $this->renderView('product_detail',
        
            [
                'product' => $product,
                'wine1' => $wine1,
                'wine2' => $wine2,
                'esclusivite' => $esclusivite,
                'milks' => $milks,
                'regions' => $regions,
                'doughs' => $doughs,
                'trays'=>$trays
            ] );
           }
        else {
        $this->redirectTo("index.php?controller=product&action=index");
        }
    }
    
    
    /**
     * récupération de tout les produits par type de lait
     *
     */
    public function GetAllByMilk()
    {
        
        

        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();

        /* récupération des données des select*/
        $milks = new Milk();
        $milks = $milks->getAll();
        $regions = new Region();
        $regions = $regions->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $trays=new Tray();
        $trays=$trays->getAll();
        
        $products = new Product();
        $products = $products->GetAllByMilk(htmlspecialchars($_GET['id_milk']));

        /*affichage*/
         if (!empty($products)) {
        $this->renderView('select_product',
        
            [
                'products' => $products,
                'esclusivite' => $esclusivite,
                'milks' => $milks,
                'regions' => $regions,
                'doughs' => $doughs,
                'trays'=>$trays
            ]
        );
         }
        else {
        $this->redirectTo("index.php?controller=product&action=index");
        }
      
    }
  
  
    /**
     * récupération de tout les produits par type de régions
     *
     */
    public function GetAllByRegion()
    {
        $products = new Product();
        $products = $products->GetAllByRegion(htmlspecialchars($_GET['id_region']));
        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();
        $regions = new Region();
        $regions = $regions->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $trays=new Tray();
        $trays=$trays->getAll();

        /*affichage*/
        
         if (!empty($products)) {
        $this->renderView('select_product',
        
            [
                'products' => $products,
                'esclusivite' => $esclusivite,
                'regions' => $regions,
                'milks' => $milks,
                'doughs' => $doughs,
                'trays'=>$trays
            ]
        );
         }
        else {
        $this->redirectTo("index.php?controller=product&action=index");
        }
        }
            

    
    
    
    /**
     * récupération de tout les produits par type de pâtes
     *
     */
    public function GetAllByDough()
    {
        $products = new Product();
        $products = $products->GetAllByDough(htmlspecialchars($_GET['id_dough']));
        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $regions = new Region();
        $regions = $regions->getAll();
        $milks = new Milk();
        $milks = $milks->getAll();
        $trays=new Tray();
        $trays=$trays->getAll();

        /*affichage*/
        if (!empty($products)) {
        $this->renderView('select_product',
        
            [
                'products' => $products,
                'esclusivite' => $esclusivite,
                'doughs' => $doughs,
                'milks' => $milks,
                'regions' => $regions,
                'trays'=>$trays
            ]
        );
    }
        else {
        $this->redirectTo("index.php?controller=product&action=index");
        }
    }


     /**
     * récupération de tout les produits par selection
     *
     */
    public function select()
    {

        $products = new Product();
        $products = $products->getAll();
        $esclusivite = new Product();
        $esclusivite = $esclusivite->GetExclusivite();
        $milks = new Milk();
        $milks = $milks->getAll();
        $regions = new Region();
        $regions = $regions->getAll();
        $doughs = new Dough();
        $doughs = $doughs->getAll();
        $trays = new Tray();
        $trays = $trays->getAll();

        if (isset($_POST['milk'])) 
        {
            $products = new Product();
            $products = $products->getAllBy(htmlspecialchars($_POST['milk']));
            if (isset($_POST['dough'])) 
            {
                $products = new Product();
                $products = $products->getAllBy(htmlspecialchars($_POST['milk']),htmlspecialchars($_POST['dough']));
                if(isset ($_POST['region']))
                {
                    $products = new Product();
                    $products = $products->getAllBy(htmlspecialchars($_POST['milk']), htmlspecialchars($_POST['dough']), htmlspecialchars($_POST['region']));
                } 
            }
            elseif($_POST['dough'] == null && $_POST['region'] != null)
            {
              
                $products = new Product();
                $products = $products->getAllBy(htmlspecialchars($_POST['milk']), htmlspecialchars($_POST['region']));
                if(isset ($_POST['dough']))
                {
                    $products = new Product();
                    $products = $products->getAllBy(htmlspecialchars($_POST['milk']), htmlspecialchars($_POST['dough']), htmlspecialchars($_POST['region']));
                } 
            }
        }     
        elseif($_POST['milk']== null)
            {
                if(isset($_POST['dough']))
                {
                    $products = new Product();
                    $products = $products->getAllBy(htmlspecialchars($_POST['dough']));
                    if(isset($_POST['region']))
                    {
                        $products = new Product();
                        $products = $products->getAllBy(htmlspecialchars($_POST['dough']),htmlspecialchars($_POST['region']));   
                    }
                }
                else
                {
                    $products = new Product();
                    $products = $products->getAllBy(htmlspecialchars($_POST['region']));   
                } 
            }     
        elseif (isset($_POST['dough']))
            {
                $products = new Product();
                $products = $products->getAllBy(htmlspecialchars($_POST['dough']));
            }
        elseif (isset($_POST['region']))
            {
                $products = new Product();
                $products = $products->getAllBy(htmlspecialchars($_POST['region']));
            }
        else{
                $products = new Product();
                $products = $products->getAllBy(htmlspecialchars($_POST['milk']));  
            }
           
           
            $this->renderView('select_product',
            
                [
                    'products' => $products,
                    'esclusivite' => $esclusivite,
                    'doughs' => $doughs,
                    'milks' => $milks,
                    'regions' => $regions,
                    'trays' => $trays
                ]
            );
        }
  
}

