<?php

namespace App\Entities;

class User
{

    private $id_user;
    private $nom_user;
    private $prenom_user;
    private $email_user;
    private $mdp_user;
    private $status_user;

    /**
     * Get the value of id_user
     */
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of nom_user
     */
    public function getNom_user()
    {
        return $this->nom_user;
    }

    /**
     * Set the value of nom_user
     *
     * @return  self
     */
    public function setNom_user($nom_user)
    {
        $this->nom_user = $nom_user;

        return $this;
    }

    /**
     * Get the value of prenom_user
     */
    public function getPrenom_user()
    {
        return $this->prenom_user;
    }

    /**
     * Set the value of prenom_user
     *
     * @return  self
     */
    public function setPrenom_user($prenom_user)
    {
        $this->prenom_user = $prenom_user;

        return $this;
    }

    /**
     * Get the value of email_user
     */
    public function getEmail_user()
    {
        return $this->email_user;
    }

    /**
     * Set the value of email_user
     *
     * @return  self
     */
    public function setEmail_user($email_user)
    {
        $this->email_user = $email_user;

        return $this;
    }

    /**
     * Get the value of mdp_user
     */
    public function getMdp_user()
    {
        return $this->mdp_user;
    }

    /**
     * Set the value of mdp_user
     *
     * @return  self
     */
    public function setMdp_user($mdp_user)
    {
        $this->mdp_user = $mdp_user;

        return $this;
    }

    /**
     * Get the value of status_user
     */
    public function getStatus_user()
    {
        return $this->status_user;
    }

    /**
     * Set the value of status_user
     *
     * @return  self
     */
    public function setStatus_user($status_user)
    {
        $this->status_user = $status_user;

        return $this;
    }
}
