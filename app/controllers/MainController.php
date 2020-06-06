<?php


namespace app\controllers;


use ishop\Cache;

class MainController extends AppController
{
        public function indexAction(){

            $brands = \R::find('brand','LIMIT 3');
            $topProduct  = \R::find('product',"LIMIT 8");
            $canonical = PATH;
            $this->setMeta('Main page','s','dd');
            $this->set(compact('brands','topProduct','canonical'));


        }
}