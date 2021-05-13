<?php

namespace App\Model;

class User {
    private $nome, $email, $descricao, $senha, $id;

    function getNome() {return $this->nome;}
    function getEmail() {return $this->email;}
    function getDescricao() {return $this->descricao;}
    function getSenha() {return $this->senha;}
    function getId() {return $this->id;}
    function setNome($n){$this->nome = $n;}
    function setEmail($e){$this->email = $e;}
    function setDescricao($d){$this->descricao = $d;}
    function setSenha($s){$this->senha = $s;}
    function setId($id){$this->id = $id;}
}
