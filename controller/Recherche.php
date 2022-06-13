<?php

class Recherche
{
    function lireLesAppellations()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT id, nom FROM vino__appellation ORDER BY id";
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $lesAppellations = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['actif' => 1];
            $lesAppellations[] = $row;
        }

        return $lesAppellations;
    }

    function lireLesCepages()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT id, nom FROM vino__cepages ORDER BY id";
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $lesCepages = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['actif' => 1];
            $lesCepages[] = $row;
        }

        return $lesCepages;
    }

    function lireLesClassifications()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT id, nom FROM vino__classification ORDER BY id";
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $lesClassifications = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['actif' => 1];
            $lesClassifications[] = $row;
        }

        return $lesClassifications;
    }

    function lireLesDesignations()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT id, nom FROM vino__designation ORDER BY id";
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $lesDesignations = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['actif' => 1];
            $lesDesignations[] = $row;
        }

        return $lesDesignations;
    }

    function lireLesPays()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT id, nom FROM generique__pays WHERE producteur = 1 ORDER BY id";
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $lesPays = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['actif' => 1];
            $lesPays[] = $row;
        }

        return $lesPays;
    }

    function lireLesProduitDuQc()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT id, nom FROM vino__produit_du_quebec ORDER BY id";
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $lesProduits = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['actif' => 1];
            $lesProduits[] = $row;
        }

        return $lesProduits;
    }

    function lireLesRegions()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT id, nom FROM vino__region ORDER BY id";
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $lesRegions = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['actif' => 1];
            $lesRegions[] = $row;
        }

        return $lesRegions;
    }

    function lireLesTypeDeVin()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT id, nom FROM vino__type ORDER BY id";
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $lesTypes = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['actif' => 1];
            $lesTypes[] = $row;
        }

        return $lesTypes;
    }

    function lireLesTypeDeCellier()
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        $sql = "SELECT id_type_cellier, nom_type_cellier FROM vino__type_cellier ORDER BY id_type_cellier";
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $lesTypes = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $row += ['actif' => 1];
            $lesTypes[] = $row;
        }

        return $lesTypes;
    }
}
