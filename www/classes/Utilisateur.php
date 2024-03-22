<?php
class Utilisateur 
{
    public $email;
    public $pseudo;
    public $nom;
    public $prenom;
    private $mdp;
    public $num_tel;

    public function getMDP() 
    {
        return $this->mdp;
    }

    public function setMDP($mdp) 
    {
        $this->mdp = $mdp;
    }
}
