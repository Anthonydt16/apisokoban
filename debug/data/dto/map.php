<?php
namespace Model\Dto;

use Kernel\DataBase\Factory\Crud;



/**
 * Classe DTO Map.
 * 
 * @author chris
 * @version 1.0
 * @package Model\Dto
 * @category DTO Class (Data Transfer Object)
 */
class Map extends Crud {

    /**
     * @var mixed Les propriétés de l'objet.
     */
    public $id;
    public $niveaux;
    public $json;
    public $date_upload;

    /**
     * Constructeur de la classe.
     * 
     * @access public
     * @return void
     */
    function __construct(
        $id = null,
        $niveaux = null,
        $json = null,
        $date_upload = null
    ) {
        $this->id = $id;
        $this->niveaux = $niveaux;
        $this->json = $json;
        $this->date_upload = $date_upload;
    }
    /**
     * Méthode pour parse l'attribut json de string à json
     *
     * @access public
     */
    public function parseJson(): void
    {
        $this->json = json_decode($this->json);
    }
	
}

?>