<?php
include_once "DatabaseManager.php";

class PokemonDAO {
    private $connection;

    public function __construct() {
        $this->connection = DatabaseManager::getConnection();
    }

    public function getAll() {
        $query = $this->connection->prepare("SELECT * FROM pokebase.pokemon");
        $query->execute();

        $result = $query->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $query = $this->connection->prepare("SELECT * FROM pokebase.pokemon WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execute();

        $result = $query->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

}