<?php

class Organisation
{
    private $id_organisation;
    private $nom_organisation;
    private $ville_organisation;
    private $cp_organisation;
    private $licence_organisation;

    /**
     * Get the value of id_organisation
     */
    public function getId_organisation()
    {
        return $this->id_organisation;
    }

    /**
     * Set the value of id_organisation
     *
     * @return  self
     */
    public function setId_organisation($id_organisation)
    {
        $this->id_organisation = $id_organisation;

        return $this;
    }

    /**
     * Get the value of nom_organisation
     */
    public function getNom_organisation()
    {
        return $this->nom_organisation;
    }

    /**
     * Set the value of nom_organisation
     *
     * @return  self
     */
    public function setNom_organisation($nom_organisation)
    {
        $this->nom_organisation = $nom_organisation;

        return $this;
    }

    /**
     * Get the value of ville_organisation
     */
    public function getVille_organisation()
    {
        return $this->ville_organisation;
    }

    /**
     * Set the value of ville_organisation
     *
     * @return  self
     */
    public function setVille_organisation($ville_organisation)
    {
        $this->ville_organisation = $ville_organisation;

        return $this;
    }

    /**
     * Get the value of cp_organisation
     */
    public function getCp_organisation()
    {
        return $this->cp_organisation;
    }

    /**
     * Set the value of cp_organisation
     *
     * @return  self
     */
    public function setCp_organisation($cp_organisation)
    {
        $this->cp_organisation = $cp_organisation;

        return $this;
    }

    /**
     * Get the value of licence_organisation
     */
    public function getLicence_organisation()
    {
        return $this->licence_organisation;
    }

    /**
     * Set the value of licence_organisation
     *
     * @return  self
     */
    public function setLicence_organisation($licence_organisation)
    {
        $this->licence_organisation = $licence_organisation;

        return $this;
    }
}
