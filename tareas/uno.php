<?php

  require_once "conexion.php";
  $proy = $_POST["name"];
  $id = "";

  $sql = "SELECT  id_proyecto FROM proyecto where nombre = '$proy'";
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $id = $row["id_proyecto"];
    }
  }
?>
  <script type="text/javascript">
    $('#pre').on('change', function (){
      pre = $("#pre option:selected").text();
      uno = $("#hola option:selected").text();
      $.ajax({
        url: "dos.php",
        method: "POST",
        data: {pre:pre, uno:uno},
        success: function(data){
          $("#result2").html(data)
        }
      });
    });
  </script>
  <label for="nombre">Tipo de Presupuesto</label>
  <select id="pre" name="status"  class = "caja">
    <option value="s" selected>Seleccione</option>
    <option value="VyT">Viajes y Traslados</option>
    <option value="CO" >Costos Operativo</option>
    <option value="seguros">Seguros y Finanzas</option>
    <option value="instalaciones">Instalaciones</option>
    <option value="equipos">Equipos, Epp, Herramientas, Consumibles,  Controles y pruebas</option>
    <option value="admin">Administracion de proyecto</option>
  </select>
<?php
 ?>
