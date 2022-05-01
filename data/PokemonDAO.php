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

    public function update($id) {}

    public function delete($id) {}

}