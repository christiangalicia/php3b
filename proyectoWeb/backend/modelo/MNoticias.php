<?php

class MNoticias extends BD {
  
    public function consultarNoticiasPrincipal(){
       try {
            $stmt = $this->conn->prepare("SELECT * FROM noticias order by id desc limit 2");
            $stmt->execute();
            //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } 
    }
    public function consultaraNoticias() {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM noticias");
            $stmt->execute();
            //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function consultarNoticia($id) {
        try {
            $stmt = $this->conn->prepare("select * from noticias where id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            foreach ($stmt->fetchAll() as $reg) {
                return $reg;
            }

            return null;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
   
}
