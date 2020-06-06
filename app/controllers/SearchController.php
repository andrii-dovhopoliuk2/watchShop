<?php


namespace app\controllers;


use ishop\App;
use ishop\libs\Pagination;

class SearchController extends AppController {
    public function typeaheadAction(){
        if($this->isAjax()){
            $query = !empty(trim($_GET['query'])) ? trim($_GET['query']) : null;
            if($query){
                $products = \R::getAll("SELECT id, title FROM product WHERE `status` != '0' AND title  LIKE ? LIMIT 11", ["%{$query}%"]);
                echo json_encode($products);
            }
        }
        die;
    }
    public  function indexAction(){
        $query = !empty(trim($_GET['s'])) ? trim($_GET['s']) : null;
        if($query){
            $products = \R::find('product', "title LIKE ?",["%{$query}%"]);
        }
        //pagination
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage =App::$app->getProperty('pagination');
        $total = \R::count('product',"title LIKE ?",["%{$query}%"]);
        $pagination  = new Pagination($page,$perpage,$total);
        $start = $pagination->getStart();
        //pagination
        if($query){
            $products = \R::find('product', "WHERE `status` != '0' AND title LIKE ? LIMIT $start,
        $perpage ",["%{$query}%"]);
        }
        //debug($products);
        $this->setMeta('Пошук по: ' . h($query) );
        $this->set(compact('products','query','pagination','total'));


    }
}