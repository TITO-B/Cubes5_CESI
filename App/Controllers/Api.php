<?php

namespace App\Controllers;

use App\Models\Articles;
use App\Models\Cities;
use \Core\View;
use Exception;

/**
 * @OA\Info(title="API Vide Grenier", version="1.0")
 */
class Api extends \Core\Controller
{

    /**
     * @OA\Get(
     *     path="/Api/Products",
     *     summary="Affiche tous les produits",
     *     tags={"Products"},
     *     @OA\Response(response="200", description="An example resource"),
     *     @OA\Response(response="404", description="Not found"),
     * )
     * Affiche la liste des articles / produits pour la page d'accueil
     *
     * @throws Exception
     */
    public function ProductsAction()
    {
        $query = $_GET['sort'];

        $articles = Articles::getAll($query);

        header('Content-Type: application/json');
        echo json_encode($articles);
    }

    /**
     * @OA\Get(
     *     path="Api/Cities",
     *     summary="Affiche tous les produits",
     *     tags={"Cities"},
     *     @OA\Response(response="200", description="An example resource"),
     *     @OA\Response(response="404", description="Not found"),
     * )
     * Recherche dans la liste des villes
     *
     * @throws Exception
     */
    public function CitiesAction(){

        $cities = Cities::search($_GET['query']);

        header('Content-Type: application/json');
        echo json_encode($cities);
    }
}
