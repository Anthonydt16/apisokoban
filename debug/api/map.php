<?php
namespace Api;

use Kernel\Debug\Error;
use Kernel\Communication\Rest;
use Kernel\Communication\Http;
use Kernel\Security\Vulnerability\Xss;
use Kernel\Security\Vulnerability\Csrf;
use Kernel\Security\Validation;
use \Model\Dto\Map as MapDto;



/**
 * Module d'API Map.
 * 
 * @author chris
 * @version 1.0
 * @package Api
 * @category API module
 */
class Map extends Rest {

    /**
     * Appel via la méthode GET.
     * 
     * @param object $route Les paramètres de la route.
     * @param object $query Les paramètres de la requête.
     * @param object $body Le corps de la requête.
     * @return mixed Résultat de l'appel.
     */
    function get($route, $query, $body)
    {
        $this->match("/api/map/{id}", function () use ($route) {
            $id = $this->data($route, "id");
            $map = new MapDto();
            $map->id = $id;
            $map = $map->read();
            $this->send($map, 1, 'Map récupérée !', Http::HTTP_OK);
        });

        $this->match("/api/map", function () {
            $map = new MapDto();
            $map = $map->All();
            $this->send($map, 1, 'Map récupérée !', Http::HTTP_OK);
        });
    }
    /**
     * Appel via la méthode POST.
     * 
     * @param object $route Les paramètres de la route.
     * @param object $query Les paramètres de la requête.
     * @param object $body Le corps de la requête.
     * @return mixed Résultat de l'appel.
     */
    function post($route, $query, $body) {
        $json =  $this->data($body, "json");
        $niveau = $this->data($body, "niveaux");
       //Date format datetime sql
        $dateUpload = Date("Y-m-d H:i:s");
        $map = new MapDto();
        $map->json = $json;
        $map->niveaux = $niveau;
        $map->date_upload = $dateUpload;
        if($map->create()){
            $this->send($map, 1, 'Map ajoutée !', Http::HTTP_OK);
        }else{
            $this->send(null, 0, 'Erreur lors de l\'ajout de la map !', Http::HTTP_INTERNAL_SERVER_ERROR);
        }
        $this->send(null, 1, 'Méthode POST non implémentée !', Http::HTTP_NOT_IMPLEMENTED);



    }


    /**
     * Appel via la méthode PUT.
     * 
     * @param object $route Les paramètres de la route.
     * @param object $query Les paramètres de la requête.
     * @param object $body Le corps de la requête.
     * @return mixed Résultat de l'appel.
     */
    function put($route, $query, $body) {
        $id = $this->data($route, "id");
        $json = $this->data($body, "json");
        $niveaux = $this->data($body, "niveaux");
        $dateUpload = Date("Y-m-d H:i:s");

        $map = new MapDto();
        $map->id = $id;
        $map->read();
        $map->json = $json;
        $map->niveaux = $niveaux;
        $map->date_upload = $dateUpload;
        if($map->update("id")){
            $this->send($map, 1, 'Map modifiée !', Http::HTTP_OK);
        }else{
            $this->send(null, 0, 'Erreur lors de la modification de la map !', Http::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    /**
     * Appel via la méthode DELETE.
     * 
     * @param object $route Les paramètres de la route.
     * @param object $query Les paramètres de la requête.
     * @param object $body Le corps de la requête.
     * @return mixed Résultat de l'appel.
     */
    function delete($route, $query, $body) {

        $id = $this->data($route, "id");
        $map = new MapDto();
        $map->id = $id;
        if($map->delete("id")){
            $this->send($map, 1, 'Map supprimée !', Http::HTTP_OK);
        }else{
            $this->send(null, 0, 'Erreur lors de la suppression de la map !', Http::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    /**
     * Appel via la méthode PATCH.
     * 
     * @param object $route Les paramètres de la route.
     * @param object $query Les paramètres de la requête.
     * @param object $body Le corps de la requête.
     * @return mixed Résultat de l'appel.
     */
    function patch($route, $query, $body) {
        $this->send(null, 1, 'Méthode PATCH non implémentée !', Http::HTTP_NOT_IMPLEMENTED);
    }

}

?>