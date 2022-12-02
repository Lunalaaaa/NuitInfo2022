<?php
namespace App\Site\Controller;
class Controller{
    public static function afficheVue(string $cheminVue, array $parametres = []) : void{
        extract($parametres);
        require __DIR__ . "/../../$cheminVue";
    }


}