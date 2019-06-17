<?php


class MGaleria extends BD {
 
     //consulta insegura pero facil de usar
    
    public function consultarGaleriaPrincipal(){
       try {
            $stmt = $this->conn->prepare("SELECT * FROM galeria order by id desc limit 8");
            $stmt->execute();
            //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } 
    }
    public function consultaraGaleria() {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM galeria");
            $stmt->execute();
            //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function consultarFoto($id) {
        try {
            $stmt = $this->conn->prepare("select * from galeria where id=:id");
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
    
    public function insertarFotor($url,$edad) {
        try {
            $stmt = $this->conn->prepare("insert into alumnos (nombre,edad) values(:nombre,:edad)");
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":edad", $edad);
            return $stmt->execute();
            
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    

}
