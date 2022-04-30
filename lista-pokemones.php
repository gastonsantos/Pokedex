<?php
include_once "./data/PokemonDAO.php";
$dao = new PokemonDAO();

$pokemones = $dao->getAll();

foreach ( $pokemones as $pokemon){
    echo   "<tr>
                                <td class='text-center'>" . $pokemon['id'] . "</td>
                                <td class='text-center'>" . $pokemon['nombre'] . "</td>
                                <td class='text-center'>" . $pokemon['altura'] . "</td>
                                <td class='text-center'>" . $pokemon['peso'] . "</td>
                                <td class='text-center'>" . $pokemon['habilidad'] . "</td>
                                <td class='text-center'><img src='".$pokemon['tipo']."' width='50' height='50'>";

                                 echo"</td>";
                                 echo "<td>" . $pokemon['descripcion'] . "</td>
                                <td> <img src=" . $pokemon['imagen'] . " width=75 height=75 ></td>
                                   
             </tr>";
}

?>