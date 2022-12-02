<?php

namespace App\Site\Lib;

use App\Site\Config\conf;
use App\Site\Controller\ChannelManager;
use App\Site\HTTP\Session;
use App\Site\Model\Channel;
use App\Site\Model\Utilisateur;
use App\Site\Repository\UtilisateurRepository;

class UserConnexion
{

    private static ?UserConnexion $instance = null;

    private static string $connexionKey = "_utilisateurConnecte";

    private ?Utilisateur $utilisateur = null;

    private function __construct()
    {
        if (Session::getInstance()->exists(self::$connexionKey)) {
            $this->utilisateur = UtilisateurRepository::select(Session::getInstance()->read(self::$connexionKey));
            if (!$this->utilisateur) $this->disconnect();
        }
    }

    public static function getInstance(): UserConnexion
    {
        if (is_null(static::$instance))
            static::$instance = new UserConnexion();
        return static::$instance;
    }

    public static function paswdHash(string $pswd): string
    {
        return password_hash(hash_hmac("sha256", $pswd, Conf::getPepper()), PASSWORD_DEFAULT);
    }

    public static function paswdCheck(string $pswd, string $hash): bool
    {
        return password_verify(hash_hmac("sha256", $pswd, Conf::getPepper()), $hash);
    }

    public function connect(string $idUtilisateur): void
    {
        Session::getInstance()->save(self::$connexionKey, $idUtilisateur);
        static::$instance = new UserConnexion();
    }

    public function isConnected(): bool
    {
        return Session::getInstance()->exists(self::$connexionKey) && $this->utilisateur;
    }

    public function disconnect(): bool
    {
        $this->utilisateur = null;
        return Session::getInstance()->delete(self::$connexionKey);
    }

    public function getConnectedUserChannel(): ?Utilisateur
    {
        return $this->utilisateur ?? null;
    }

    public function isUser($channelId) : bool {
        return $this->isConnected() && $channelId == $this->getConnectedUserChannel()->getIdUtilisateur();
    }
}