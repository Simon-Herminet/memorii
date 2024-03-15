<?php

class DbConnect
{

    protected $connection;
    protected $request;

    const SERVER = 'localhost';
    const USER = 'root';
    const PASSWORD = 'root';
    const BASE = 'memorii';

    public function __construct()
    {



        try {
            $this->connection = new PDO("mysql:host=" . self::SERVER . ";dbname=" . self::BASE, self::USER, self::PASSWORD);
            // Activation des erreurs PDO
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Les retours de requete seront en Tableau objet par defaut
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            // Encodage des caracteres spéciaux en utf8
            $this->connection->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
