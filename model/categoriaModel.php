<?php
    class categoria extends Conectar{
        public function get_categoria(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_categorias WHERE state=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_categoria_id($cat_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_categorias WHERE state=1 AND cat_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        public function insert_categoria($cat_nom, $cat_obs){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_categorias(cat_id, cat_nom, cat_obs, state) VALUES (NULL, ?, ?, '1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_nom);
            $sql->bindValue(2, $cat_obs);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        public function update_categoria($cat_id,$cat_nom, $cat_obs){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_categorias set cat_nom = ?, cat_obs = ? WHERE cat_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_nom);
            $sql->bindValue(2, $cat_obs);
            $sql->bindValue(3, $cat_id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        public function delete_categoria($cat_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_categorias set state= '0' WHERE cat_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }