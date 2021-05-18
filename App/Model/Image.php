<?php

namespace App\Model;

class Image {
    private $id, $id_unique, $img_name, $img_title, $img_desc;

    function getNome() {return $this->img_name;}
    function getIdUnique() {return $this->id_unique;}
    function getId() {return $this->id;}
    function getTitulo() {return $this->img_title;}
    function getDesc() {return $this->img_desc;}
    function setNome($n) {$this->img_name = $n;}
    function setIdUnique($iu) {$this->id_unique = $iu;}
    function setId($id) {$this->id = $id;}
    function setTitulo($t) {$this->img_title = $t;}
    function setDesc($d) {$this->img_desc = $d;}

}