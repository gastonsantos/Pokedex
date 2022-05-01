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

        $result = $query->get_result();

    }

    public function delete($id) {}

}