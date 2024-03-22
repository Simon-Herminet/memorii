<?php

namespace App\Entities;

class Category
{
    private $id_category;
    private $titre_category;
    private $description_category;
    private $id_user;

    /**
     * Get the value of id_category
     */
    public function getId_category()
    {
        return $this->id_category;
    }

    /**
     * Set the value of id_category
     *
     * @return  self
     */
    public function setId_category($id_category)
    {
        $this->id_category = $id_category;

        return $this;
    }

    /**
     * Get the value of titre_category
     */
    public function getTitre_category()
    {
        return $this->titre_category;
    }

    /**
     * Set the value of titre_category
     *
     * @return  self
     */
    public function setTitre_category($titre_category)
    {
        $this->titre_category = $titre_category;

        return $this;
    }

    /**
     * Get the value of description_category
     */
    public function getDescription_category()
    {
        return $this->description_category;
    }

    /**
     * Set the value of description_category
     *
     * @return  self
     */
    public function setDescription_category($description_category)
    {
        $this->description_category = $description_category;

        return $this;
    }

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
}
