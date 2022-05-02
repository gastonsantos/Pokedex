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
                                   <td>
                                   <div class='row'>
                                          <div class ='my-2'>
                                                <form action='modificar.php' method='get'>
                                                <input type='hidden' name='id' value=".$pokemon['id'].">
                                                <input class='btn btn-warning ms-auto w-100' type='submit' value='Modificar'>
                                                </form>
                                          </div>


                                          <div class ='my-2'>
                                                <form action='' method='get'>
                                                <input type='hidden' name='idBaja' value=".$pokemon['id'].">
                                                <button type='submit' class='btn btn-danger ms-auto w-100' name='baja'>Eliminar</button>
                                                </form>                  
                                          </div>

                                    </div>
                                   </td>
                             </tr>";
                                   
                                   
             
}



?>