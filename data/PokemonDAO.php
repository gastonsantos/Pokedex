<?php
include_once "DatabaseManager.php";

class PokemonDAO {
    private $connection;

    public function __construct() {
        $this->connection = DatabaseManager::getConnection();
    }

    public function getAll() {
        $query = $this->connection->prepare("SELECT * FROM pokedex.pokemons");
        $query->execute();

        $result = $query->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getByName($name) {
        $query = $this->connection->prepare("SELECT * FROM pokedex.pokemons WHERE nombre = ?");
        $query->bind_param("s", $name);
        $query->execute();

        $result = $query->get_result();

        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }

    public function update($id) {
        


    }

    public function delete($id) {}

    public function agregar($id,$nombre,$altura,$peso,$habilidad,$tipo,$descripcion) {
       
    

        $query = $this->connection->prepare("INSERT INTO pokedex.pokemons (id_manual, nombre, altura, peso, habilidad, tipo, descripcion, imagen) VALUES (?,?,?,?,?,?,?,?)");
        $tipo = "recursos/img/pokemons/tipo/".$tipo.".png"; 
        $imagen = "recursos/img/pokemons/".$nombre.".png";
        $query->bind_param("isssssss", $id, $nombre, $altura, $peso, $habilidad, $tipo , $descripcion, $imagen);
        $query->execute();
    
      
        header("location:pagina-con-sesion.php");

        

    }



    

}