<?php
class Utilisateurs
{
    private int $idUtilisateurs, $idRole;
    private $username, $password, $nomcomplet, $email, $ville, $adresse_complet;

    public function _construct($username, $email, $ville = "", $adresse_complet = "")
    {
        $this->username = $username;
        $this->email = $email;
        $this->ville = $ville;
        $this->adresse_complet = $adresse_complet;
    }

}