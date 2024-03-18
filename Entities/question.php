<?php

class question
{
    private $id_question;
    private $titre_question;
    private $question_question;
    private $reponse_question;
    private $frequence_question;
    private $point_question;

    /**
     * Get the value of id_question
     */
    public function getId_question()
    {
        return $this->id_question;
    }

    /**
     * Set the value of id_question
     *
     * @return  self
     */
    public function setId_question($id_question)
    {
        $this->id_question = $id_question;

        return $this;
    }

    /**
     * Get the value of titre_question
     */
    public function getTitre_question()
    {
        return $this->titre_question;
    }

    /**
     * Set the value of titre_question
     *
     * @return  self
     */
    public function setTitre_question($titre_question)
    {
        $this->titre_question = $titre_question;

        return $this;
    }

    /**
     * Get the value of question_question
     */
    public function getQuestion_question()
    {
        return $this->question_question;
    }

    /**
     * Set the value of question_question
     *
     * @return  self
     */
    public function setQuestion_question($question_question)
    {
        $this->question_question = $question_question;

        return $this;
    }

    /**
     * Get the value of reponse_question
     */
    public function getReponse_question()
    {
        return $this->reponse_question;
    }

    /**
     * Set the value of reponse_question
     *
     * @return  self
     */
    public function setReponse_question($reponse_question)
    {
        $this->reponse_question = $reponse_question;

        return $this;
    }

    /**
     * Get the value of frequence_question
     */
    public function getFrequence_question()
    {
        return $this->frequence_question;
    }

    /**
     * Set the value of frequence_question
     *
     * @return  self
     */
    public function setFrequence_question($frequence_question)
    {
        $this->frequence_question = $frequence_question;

        return $this;
    }

    /**
     * Get the value of point_question
     */
    public function getPoint_question()
    {
        return $this->point_question;
    }

    /**
     * Set the value of point_question
     *
     * @return  self
     */
    public function setPoint_question($point_question)
    {
        $this->point_question = $point_question;

        return $this;
    }
}
