<?php
namespace App\Site\Controller;
class Controller{
    public static function afficheVue(string $cheminVue, ?string $titre = null, array $parametres = []) : void{
        $pagetitle = $titre;
        $cheminVueBody = __DIR__ . '/../View/' . $cheminVue;
        extract($parametres);
        require __DIR__ . "/../View/view.php";
    }

    public static function redirect(string $url) {
        header("Location: $url");
        exit();
    }


}