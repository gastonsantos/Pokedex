<?php
include_once "DatabaseManager.php";

class PokemonDAO {
    private $connection;

    public function __construct() {
        $this->connection = DatabaseManager::getConnection();
    }

    public function __destruct() {
        $this->connection->close();
    }

    public function getAll() {
        $query = $this->connection->prepare("SELECT * FROM pokedex.pokemons");
        $query->execute();

        $result = $query->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getByNameOrId($search) {
        $query = $this->connection->prepare("SELECT * FROM pokedex.pokemons WHERE id_manual ='".$search."' or nombre = '".$search."'");
       
        $query->execute();

        $result = $query->get_result();

        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }


    public function searchById($id){
        $query = $this->connection->prepare("SELECT * FROM pokedex.pokemons WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execute();

        $result = $query->get_result();

        return $result->fetch_assoc();
    }

    public function update($id,$id_manual,$nombre,$altura,$peso,$habilidad) {

        $query = $this->connection->prepare("UPDATE pokedex.pokemons SET id_manual = ? ,nombre = ?, altura = ?, peso = ?, habilidad = ? WHERE id = ?");
        $query->bind_param("issssi", $id_manual,$nombre,$altura,$peso,$habilidad,$id);


        $query->execute();
    }

    public function delete($id) {
        $query = $this->connection->prepare("DELETE FROM pokedex.pokemons WHERE id = ?");
        $query->bind_param("i", $id);

        $query->execute();
    }

    public function agregar($id,$nombre,$altura,$peso,$habilidad,$tipo,$descripcion) {
       
    

        $query = $this->connection->prepare("INSERT INTO pokedex.pokemons (id_manual, nombre, altura, peso, habilidad, tipo, descripcion, imagen) VALUES (?,?,?,?,?,?,?,?)");
        $tipo = "recursos/img/pokemons/tipo/".$tipo.".png"; 
        $imagen = "recursos/img/pokemons/".$nombre.".png";
        $query->bind_param("isssssss", $id, $nombre, $altura, $peso, $habilidad, $tipo , $descripcion, $imagen);
        $query->execute();
    
      
        header("location:pagina-con-sesion.php");

        

    }



    

}