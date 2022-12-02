<?php

class Controller{
    protected static function afficheVue(string $cheminVue, array $parametres = []) : void{
        extract($parametres);
        require __DIR__ . "/../../$cheminVue";
    }


}