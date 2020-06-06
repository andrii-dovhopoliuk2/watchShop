<?php


namespace app\controllers;


use app\models\AppModel;
use app\widgets\currency\Currency;
use ishop\App;
use ishop\base\Controller;
use ishop\Cache;

class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
        App::$app->setPropeties('currencies',Currency::getCurrencies());
        App::$app->setPropeties('currency',Currency::getCurrency(App::$app->getProperty('currencies')));
      //  debug(App::$app->getProperties());
        App::$app->setPropeties('cats',self::cacheCategory());
       // debug(App::$app->getProperties());
    }
    public  static function cacheCategory(){
        $cache = Cache::instance();
        $cats = $cache->get('cats');
        if (!$cats){
            $cats = \R::getAssoc("SELECT * FROM category");
            $cache->set('cats',$cats);
        }
        return $cats;

    }

}