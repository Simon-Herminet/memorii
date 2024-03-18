<?php

class Quiizz
{
    private $id_quiizz;
    private $type_quiizz;
    private $difficulte_quiizz;

    /**
     * Get the value of id_quiizz
     */
    public function getId_quiizz()
    {
        return $this->id_quiizz;
    }

    /**
     * Set the value of id_quiizz
     *
     * @return  self
     */
    public function setId_quiizz($id_quiizz)
    {
        $this->id_quiizz = $id_quiizz;

        return $this;
    }

    /**
     * Get the value of type_quiizz
     */
    public function getType_quiizz()
    {
        return $this->type_quiizz;
    }

    /**
     * Set the value of type_quiizz
     *
     * @return  self
     */
    public function setType_quiizz($type_quiizz)
    {
        $this->type_quiizz = $type_quiizz;

        return $this;
    }

    /**
     * Get the value of difficulte_quiizz
     */
    public function getDifficulte_quiizz()
    {
        return $this->difficulte_quiizz;
    }

    /**
     * Set the value of difficulte_quiizz
     *
     * @return  self
     */
    public function setDifficulte_quiizz($difficulte_quiizz)
    {
        $this->difficulte_quiizz = $difficulte_quiizz;

        return $this;
    }
}
