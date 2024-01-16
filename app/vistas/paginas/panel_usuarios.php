<?php require_once RUTA_APP.'/vistas/inc/header.php';?>
<h1>PANEL DE CONTROL</h1>
<div>
    <table>
        <tr>
            <td>ID</td>
            <td>Nombre</td>
            <td>Email</td>
            <td>Contraseña</td>
            <td>Desactivada</td>
            <td>Admin</td>
            <td>cambiar estado</td>
        </tr>
        <?php
            foreach ($datos["usuarios"] as $row) {
                echo "<tr>";
                    echo "<td>".$row->id."</td>";
                    echo "<td>".$row->nombre."</td>";
                    echo "<td>".$row->email."</td>";
                    echo "<td>".$row->contraseña."</td>";
                    echo "<td>".$row->desactivada."</td>";
                    echo "<td>".$row->admin."</td>";
                    echo "<td><a class='btn' href='".RUTA_URL."/paginas/activar_desactivar/".$row->id."'>cambiar</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
</div>
<?php require_once RUTA_APP.'/vistas/inc/footer.php';?>