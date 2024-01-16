<?php require_once RUTA_APP.'/vistas/inc/header.php';?>
<h1 class="titulo_panel">PANEL DE USUARIOS</h1>
<div>
    <table class="tabla_usuarios">
        <tr>
            <td>ID</td>
            <td>Nombre</td>
            <td>Email</td>
            <td>Contraseña</td>
            <td>Desactivada</td>
            <td>Admin</td>
            <td>Activar/Desactivar</td>
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
                    echo "<td><a class='btn' href='".RUTA_URL."/paginas/activar_desactivar/".$row->id."'>Cambiar</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
</div>
<?php require_once RUTA_APP.'/vistas/inc/footer.php';?>