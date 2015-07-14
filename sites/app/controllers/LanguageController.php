<?php
class LanguageController extends BaseController {

        function __construct(){
            $this->setLang();
            parent::__construct();
        }

       private function checkLang($lang = null){
         if(isset($lang)){
           foreach($this->_Langs as $k => $v){
             if(strcmp($lang, $k) == 0) $Check = true;
           }
       }
        return isset($Check) ? $Check : false;
       }

       public function setLang($lang = null){
        if(isset($lang) && $this->checkLang($lang)){
            Session::put('lang', $lang);
            $this->_Langs['current'] = $lang;
            Config::set('application.language', $lang);
        } else {
            if(Session::has('lang')){
                Config::set('application.language', Session::get('lang'));
                $this->_Langs['current'] = Session::get('lang');
            } else {
                $this->_Langs['current'] = $this->_Default;
            }
        }
        return Redirect::to('/');
    }
}