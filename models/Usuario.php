<?php
    class Usuario extends Conectar {
        public function insert_usuario($usu_nom,$usu_ape,$usu_correo){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_usuario (usu_id,usu_nom,usu_ape,usu_correo,est) VALUES (NULL,?,?,?,'1');";
            $stmt = $conectar->prepare($sql);
            $stmt->bindValue(1, $usu_nom);
            $stmt->bindValue(2, $usu_ape);
            $stmt->bindValue(3, $usu_correo);
            $stmt->execute();
        }
    }
?>