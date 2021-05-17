<?php

namespace App\Model;

class Crud{
    public function Create(User $u) {
            
        $sql = 'SELECT id FROM tb WHERE e = ?';
        $stmt = Conect::Conn()->prepare($sql);
        $stmt->bindValue(1, $u->getEmail());
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return false;
        }
        else 
        {
            $sql = 'INSERT INTO tb (n, e, s) VALUES (?,?,?)';
            $stmt = Conect::Conn()->prepare($sql);
            $stmt->bindValue(1, $u->getNome());
            $stmt->bindValue(2, $u->getEmail());
            $stmt->bindValue(3, $u->getSenha());
            $stmt->execute();

            return true;
        }
    }

    public function Read() {

        $sql = 'SELECT * FROM tb';
        $stmt = Conect::Conn()->prepare($sql);
        $stmt->execute();
        
        if($stmt->rowCount() > 0) {
            $a = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $a = [];
        }
        return $a;
    }

    public function ReadAllImages(User $p) {
        $sql = 'SELECT * FROM img WHERE id = ?';
        $stmt = Conect::Conn()->prepare($sql);
        $stmt->bindValue(1, $p->getId());
        $stmt->execute();
        $a = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $a;
    }
    
    public function ReadOneImage($id_unique) {
        $sql = 'SELECT * FROM img WHERE id = ?';
        $stmt = Conect::Conn()->prepare($sql);
        $stmt->bindValue(1, $id_unique);
        $stmt->execute();
        $a = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $a;
    }

    public function ReadCommentThisImage($id_unique) {
        $sql = "SELECT * FROM tb_comment WHERE id = ?";
        $stmt = Conect::Conn()->prepare($sql);
        $stmt->bindValue(1, $id_unique);
        $stmt->execute();
        
        if($stmt->rowCount() > 0) {
            $a = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $a;
        } else {
            return [];
        }
    }

    public function Update(User $u) {
        $sql = 'UPDATE tb SET n=?, e=?, s=? WHERE id = ?';
        $stmt = Conect::Conn()->prepare($sql);
        $stmt->bindValue(1, $u->getNome());
        $stmt->bindValue(2, $u->getEmail());
        $stmt->bindValue(3, $u->getSenha());
        $stmt->bindValue(4, $u->getId());
        $stmt->execute();
    }

    public function Delete($id) {
        $sql = 'DELETE FROM tb WHERE id = ?';
        $stmt = Conect::Conn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

    public function Login($e, $s) {
        $sql = 'SELECT * FROM tb WHERE e = ? AND s = ?';
        $stmt = Conect::Conn()->prepare($sql);
        $stmt->bindValue(1, $e);
        $stmt->bindValue(2, $s);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            if(!isset($_SESSION)) session_start();
            $a = $stmt->fetch();
            
            $_SESSION['email'] = $a['e'];
            $_SESSION['senha'] = $a['s'];
            return true;
        } else {
            return false;
        }
    }
}
