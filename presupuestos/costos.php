<?php
  require_once "conexion.php";
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Costos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos-ab.css">
    <script src="jquery-3.0.0.min.js"></script>
    <script type="text/javascript">
      function mostrar(id) {

          if (id == "VyT") {
              $("#VyT").show();
              $("#CO").hide();
              $("#seguros").hide();
              $("#instalaciones").hide();
              $("#equipos").hide();
              $("#admin").hide();
              $("#fya").hide();
              $("#hyc").hide();
          }

          if (id == "CO") {
              $("#VyT").hide();
              $("#CO").show();
              $("#seguros").hide();
              $("#instalaciones").hide();
              $("#equipos").hide();
              $("#admin").hide();
              $("#fya").hide();
              $("#hyc").hide();
          }

          if (id == "seguros") {
              $("#VyT").hide();
              $("#CO").hide();
              $("#seguros").show();
              $("#instalaciones").hide();
              $("#equipos").hide();
              $("#admin").hide();
              $("#fya").hide();
              $("#hyc").hide();
          }

          if (id == "instalaciones") {
              $("#VyT").hide();
              $("#CO").hide();
              $("#seguros").hide();
              $("#instalaciones").show();
              $("#equipos").hide();
              $("#admin").hide();
              $("#fya").hide();
              $("#hyc").hide();
          }

          if (id == "equipos") {
              $("#VyT").hide();
              $("#CO").hide();
              $("#seguros").hide();
              $("#instalaciones").hide();
              $("#equipos").show();
              $("#admin").hide();
              $("#fya").hide();
              $("#hyc").hide();
          }

          if (id == "admin") {
              $("#VyT").hide();
              $("#CO").hide();
              $("#seguros").hide();
              $("#instalaciones").hide();
              $("#equipos").hide();
              $("#admin").show();
              $("#fya").hide();
              $("#hyc").hide();
          }
          if (id == "fya") {
              $("#VyT").hide();
              $("#CO").hide();
              $("#seguros").hide();
              $("#instalaciones").hide();
              $("#equipos").hide();
              $("#admin").hide();
              $("#fya").show();
              $("#hyc").hide();
          }
          if (id == "hyc") {
              $("#VyT").hide();
              $("#CO").hide();
              $("#seguros").hide();
              $("#instalaciones").hide();
              $("#equipos").hide();
              $("#admin").hide();
              $("#fya").hide();
              $("#hyc").show();
          }
          if (id == "s") {
              $("#VyT").hide();
              $("#CO").hide();
              $("#seguros").hide();
              $("#instalaciones").hide();
              $("#equipos").hide();
              $("#admin").hide();
              $("#fya").hide();
              $("#hyc").hide();
          }
      }



      $(document).ready(function(){

        function actualizar_datos(id, texto,columna){
          $.ajax({
            url: "actualizar.php",
            method: "POST",
            data: {id: id, texto:texto, columna:columna},
            success: function(data){
              obtener_datos();
              alert(data);
            }
          });
        }

        $(document).on("blur", "#concepto", function(){
          var id = $(this).data("id_concepto");
          var nombre = $(this).text();
          actualizar_datos(id, nombre, "concepto");
        });

        $(document).on("blur", "#unidad", function(){
          var id = $(this).data("id_unidad");
          var nombre = $(this).text();
          actualizar_datos(id, nombre, "unidad");
        });

        $(document).on("blur", "#cantidad", function(){
          var id = $(this).data("id_cantidad");
          var nombre = $(this).text();
          nombre = nombre.replace(/,/g, "");
          actualizar_datos(id, nombre, "cantidad");
        });

        $(document).on("blur", "#iu", function(){
          var id = $(this).data("id_iu");
          var nombre = $(this).text();
          nombre = nombre.replace(/,/g, "");
          actualizar_datos(id, nombre, "iu");
        });

        function totalv(){
          $.ajax({
            url: "totalv.php",
            method: "POST",
            success: function(data){
              $("#result2").html(data)
            }
          });
        }
      function borrar2(){
        $.ajax({
          url: "borrar2.php",
          method: "POST",
          success: function(data){
            obtener_datos();
            totalv();
          }
        });
      }
        function obtener_datos(){
            $.ajax({
              url: "code.php",
              method: "POST",
              success: function(data){
                $("#result").html(data)
              }
            });
          }


          obtener_datos();
          totalv();

          $("#agregarv").click(function(){
              var datos = $("#formulario").serialize();
              $.ajax({
                url: "agregar.php",
                method: "POST",
                data: datos,
                success: function(data){
                  obtener_datos();
                  totalv();
                  alert(data);
                }
              });

          });

          $("#agregarc").click(function(){
              var datos = $("#formulario").serialize();
              $.ajax({
                url: "agregar.php",
                method: "POST",
                data: datos,
                success: function(data){
                  obtener_datos();
                  totalv();
                  alert(data);

                }
              });

          });

          $("#agregars").click(function(){
              var datos = $("#formulario").serialize();
              $.ajax({
                url: "agregar.php",
                method: "POST",
                data: datos,
                success: function(data){
                  obtener_datos();
                  totalv();
                  alert(data);

                }
              });

          });

          $("#agregari").click(function(){
              var datos = $("#formulario").serialize();
              $.ajax({
                url: "agregar.php",
                method: "POST",
                data: datos,
                success: function(data){
                  obtener_datos();
                  totalv();
                  alert(data);

                }
              });

          });

          $("#agregare").click(function(){
              var datos = $("#formulario").serialize();
             $.ajax({
                url: "agregar.php",
                method: "POST",
                data: datos,
                success: function(data){
                  obtener_datos();
                  totalv();
                  alert(data);

                }
              });

          });


          $("#agregara").click(function(){
              var datos = $("#formulario").serialize();
             $.ajax({
                url: "agregar.php",
                method: "POST",
                data: datos,
                success: function(data){
                  obtener_datos();
                  totalv();
                  alert(data);

                }
              });

          });

          $("#agregarfya").click(function(){
              var datos = $("#formulario").serialize();
              //alert(datos);
             $.ajax({
                url: "agregar.php",
                method: "POST",
                data: datos,
                success: function(data){
                  obtener_datos();
                  totalv();
                  alert(data);

                }
              });

          });

          $("#agregarhyc").click(function(){
              var datos = $("#formulario").serialize();
              //alert(datos);
             $.ajax({
                url: "agregar.php",
                method: "POST",
                data: datos,
                success: function(data){
                  obtener_datos();
                  totalv();
                  alert(data);

                }
              });
          });

          $("#cancelav").click(function(){
            if(confirm("¿Estas seguro que desea cancelar los registros?")){
              $.ajax({
                url: "borrar.php",
                method: "POST",
                success: function(data){
                  obtener_datos();
                    totalv();
                  alert(data);
                }
              });
            };
          });
          $("#status").change(function(){
            borrar2();
          });

          $("#guardarv").click(function(){
              var datos = $("#formulario").serialize();
              $.ajax({
                url: "guardarv.php",
                method: "POST",
                data: datos,
                success: function(data){
                  obtener_datos();
                  totalv();
                  alert(data);
                  borrar2();
                }
              });

          });


        mostrar("VyT");
        borrar2();

        $(document).on("click", "#eliminar", function(){
        if(confirm("¿Estas seguro que desea eliminar registro?")){
          var id =$(this).data("id");
          $.ajax({
            url: "eliminar-vyt.php",
            method: "POST",
            data: {id:id},
            success: function(data){
              obtener_datos();
              totalv();
              alert(data);
            }
          })
          return false;

        };
      });


      });
    </script>
  </head>
  <body>

    <div class="contenedor">
      <form class="formulario2" id="formulario" method="POST">
      <label for="">Seleccione una opcion</label>
      <select id="status" name="status" onChange="mostrar(this.value);" class = "caja">
        <option value="s" >Seleccione</option>
        <option value="VyT" selected>Viajes y Traslados</option>
        <option value="CO" >Costos Directos</option>
        <option value="seguros">Seguros y Finanzas</option>
        <option value="instalaciones">Instalaciones  Provisionales</option>
        <option value="equipos">Equipos, EPP, Herramientas, Consumibles,  Controles y pruebas </option>
        <option value="admin">Administracion de Proyecto </option>
        <option value="fya">Fletes y Acarreos </option>
        <option value="hyc">Homologaciones y Controles</option>
      </select>

        <div id="VyT" style="display: none;">

          <fieldset>
            <legend>Viajes y Traslados</legend>


              <label for="nombre">Nombre</label>
              <input class="uno" type="text" placeholder="Nombre" size="35" name="nombrev" id="dis" required=""/>

              <label for="nombre">Área</label>
              <select class="caja" name ="areav">
                  <?php
                    $query = $link -> query ("SELECT * FROM `area` WHERE status = 'A'");
                    while ($valores = mysqli_fetch_array($query)) {
                      echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                    }
                  ?>
                </select>

            <fieldset>
                <legend></legend>
              <label for="nombre">Disciplina</label>
              <select class="caja" name ="discv">
                  <?php
                    $query = $link -> query ("SELECT * FROM `disciplinas` WHERE status = 'A'");
                    while ($valores = mysqli_fetch_array($query)) {
                      echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                    }
                  ?>
                </select>
                <label for="nombre">Concepto</label>
                <input type="text" placeholder="Concepto" size="27" name="Conceptov" id="dis" required=""/>

                <label for="nombre">Unidad  </label>
                <input type="text" name = "unidadv"  placeholder="Unidad" size="10" required=""/>

                <label for="nombre">Cantidad  </label>
                <input type="number" name = "cantidadv" value = "1" min = "1" max = "1000000" step = "1" size="10"/>

                <label for="nombre">Importe unitario  </label>
                <input type="number" name = "iuv" value = "1" min = "1" max = "1000000" step = "1" size="10"/>


                <button type="button" id="agregarv" class="button2">Agregar</button>
                <br>
              </fieldset>
          </fieldset>


        </div>



        <div id="CO" style="display: none;">
          <fieldset>
            <legend>Costos Directos</legend>

              <label for="nombre">Actividad</label>
              <input class="uno" type="text" placeholder="Actividad" size="35" name="nombrec" id="dis" required=""/>

              <label for="nombre">Área</label>
              <select class="caja" name ="areac">
                  <?php
                    $query = $link -> query ("SELECT * FROM `area`");
                    while ($valores = mysqli_fetch_array($query)) {
                      echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                    }
                  ?>
                </select>
              </fieldset>



            <fieldset>
              <legend></legend>
              <label for="nombre">Disciplina</label>
              <select class="caja" name ="discc">
                  <?php
                    $query = $link -> query ("SELECT * FROM `disciplinas`");
                    while ($valores = mysqli_fetch_array($query)) {
                      echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                    }
                  ?>
                </select>
                <label for="nombre">Concepto</label>
                <input type="text" placeholder="Concepto" size="27" name="Conceptoc" id="dis" required=""/>

                <label for="nombre">Unidad  </label>
                <input type="text" name = "unidadc"  placeholder="Unidad" size="10" required=""/>

                <label for="nombre">Cantidad  </label>
                <input type="number" name = "cantidadc" value = "1" min = "1" max = "1000000" step = "1" size="10"/>

                <label for="nombre">Importe unitario  </label>
                <input type="number" name = "iuc" value = "1" min = "1" max = "1000000" step = "1" size="10"/>


                <button type="button" id="agregarc" class="button2">Agregar</button>
                <br>
            </fieldset>



        </div>






        <div id="seguros" style="display: none;">
          <fieldset>
            <legend>Seguros y Fianzas</legend>

              <label for="nombre">Nombre</label>
              <input class="uno" type="text" placeholder="Nombre" size="35" name="nombres" id="dis" required=""/>

              <label for="nombre">Área</label>
              <select class="caja" name ="areas">
                  <?php
                    $query = $link -> query ("SELECT * FROM `area`");
                    while ($valores = mysqli_fetch_array($query)) {
                      echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                    }
                  ?>
                </select>
              </fieldset>



            <fieldset>
              <legend></legend>
              <label for="nombre">Disciplina</label>
              <select class="caja" name ="discs">
                  <?php
                    $query = $link -> query ("SELECT * FROM `disciplinas`");
                    while ($valores = mysqli_fetch_array($query)) {
                      echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                    }
                  ?>
                </select>
                <label for="nombre">Concepto</label>
                <input type="text" placeholder="Concepto" size="27" name="Conceptos" id="dis" required=""/>

                <label for="nombre">Unidad  </label>
                <input type="text" name = "unidads"  placeholder="Unidad" size="10" required=""/>

                <label for="nombre">Cantidad  </label>
                <input type="number" name = "cantidads" value = "1" min = "1" max = "1000000" step = "1" size="10"/>

                <label for="nombre">Importe unitario  </label>
                <input type="number" name = "ius" value = "1" min = "1" max = "1000000" step = "1" size="10"/>


                <button type="button" id="agregars" class="button2">Agregar</button>
                <br>
            </fieldset>
        </div>


        <div id="instalaciones" style="display: none;">

          <fieldset>
            <legend>Instalaciones Provisionales </legend>

              <label for="nombre">Nombre</label>
              <input class="uno" type="text" placeholder="Nombre" size="35" name="nombrei" id="dis" required=""/>

              <label for="nombre">Área</label>
              <select class="caja" name ="areai">
                  <?php
                    $query = $link -> query ("SELECT * FROM `area`");
                    while ($valores = mysqli_fetch_array($query)) {
                      echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                    }
                  ?>
                </select>
              </fieldset>



            <fieldset>
              <legend></legend>
              <label for="nombre">Disciplina</label>
              <select class="caja" name ="disci">
                  <?php
                    $query = $link -> query ("SELECT * FROM `disciplinas`");
                    while ($valores = mysqli_fetch_array($query)) {
                      echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                    }
                  ?>
                </select>
                <label for="nombre">Concepto</label>
                <input type="text" placeholder="Concepto" size="27" name="Conceptoi" id="dis" required=""/>

                <label for="nombre">Unidad  </label>
                <input type="text" name = "unidadi"  placeholder="Unidad" size="10" required=""/>

                <label for="nombre">Cantidad  </label>
                <input type="number" name = "cantidadi" value = "1" min = "1" max = "1000000" step = "1" size="10"/>

                <label for="nombre">Importe unitario  </label>
                <input type="number" name = "iui" value = "1" min = "1" max = "1000000" step = "1" size="10"/>


                <button type="button" id="agregari" class="button2">Agregar</button>
                <br>
            </fieldset>


        </div>


        <div id="equipos" style="display: none;">

          <fieldset>
            <legend>Equipos, Epp, Herramientas, Consumibles,  Controles y pruebas </legend>

              <label for="nombre">Nombre</label>
              <input class="uno" type="text" placeholder="Nombre" size="35" name="nombree" id="dis" required=""/>

              <label for="nombre">Área</label>
              <select class="caja" name ="areae">
                  <?php
                    $query = $link -> query ("SELECT * FROM `area`");
                    while ($valores = mysqli_fetch_array($query)) {
                      echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                    }
                  ?>
                </select>
              </fieldset>



            <fieldset>
              <legend></legend>
              <label for="nombre">Disciplina</label>
              <select class="caja" name ="disce">
                  <?php
                    $query = $link -> query ("SELECT * FROM `disciplinas`");
                    while ($valores = mysqli_fetch_array($query)) {
                      echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                    }
                  ?>
                </select>
                <label for="nombre">Concepto</label>
                <input type="text" placeholder="Concepto" size="27" name="Conceptoe" id="dis" required=""/>

                <label for="nombre">Unidad  </label>
                <input type="text" name = "unidade"  placeholder="Unidad" size="10" required=""/>

                <label for="nombre">Cantidad  </label>
                <input type="number" name = "cantidade" value = "1" min = "1" max = "1000000" step = "1" size="10"/>

                <label for="nombre">Importe unitario  </label>
                <input type="number" name = "iue" value = "1" min = "1" max = "1000000" step = "1" size="10"/>


                <button type="button" id="agregare" class="button2">Agregar</button>
                <br>
            </fieldset>



        </div>


        <div id="admin" style="display: none;">
          <fieldset>
            <legend>Administración del  Proyecta</legend>

              <label for="nombre">Nombre</label>
              <input class="uno" type="text" placeholder="Nombre" size="35" name="nombrea" id="dis" required=""/>

              <label for="nombre">Área</label>
              <select class="caja" name ="areaa">
                  <?php
                    $query = $link -> query ("SELECT * FROM `area`");
                    while ($valores = mysqli_fetch_array($query)) {
                      echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                    }
                  ?>
                </select>
              </fieldset>



            <fieldset>
              <legend></legend>
              <label for="nombre">Disciplina</label>
              <select class="caja" name ="disca">
                  <?php
                    $query = $link -> query ("SELECT * FROM `disciplinas`");
                    while ($valores = mysqli_fetch_array($query)) {
                      echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                    }
                  ?>
                </select>
                <label for="nombre">Concepto</label>
                <input type="text" placeholder="Concepto" size="27" name="Conceptoa" id="dis" required=""/>

                <label for="nombre">Unidad  </label>
                <input type="text" name = "unidada"  placeholder="Unidad" size="10" required=""/>

                <label for="nombre">Cantidad  </label>
                <input type="number" name = "cantidada" value = "1" min = "1" max = "1000000" step = "1" size="10"/>

                <label for="nombre">Importe unitario  </label>
                <input type="number" name = "iua" value = "1" min = "1" max = "1000000" step = "1" size="10"/>


                <button type="button" id="agregara" class="button2">Agregar</button>
                <br>
            </fieldset>


        </div>

        <div id="fya" style="display: none;">
          <fieldset>
            <legend>Fletes y Acarreos</legend>

              <label for="nombre">Nombre</label>
              <input class="uno" type="text" placeholder="Nombre" size="35" name="nombrefya" id="dis" required=""/>

              <label for="nombre">Área</label>
              <select class="caja" name ="areafya">
                  <?php
                    $query = $link -> query ("SELECT * FROM `area`");
                    while ($valores = mysqli_fetch_array($query)) {
                      echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                    }
                  ?>
                </select>
              </fieldset>
            <fieldset>
              <legend></legend>
              <label for="nombre">Disciplina</label>
              <select class="caja" name ="discfya">
                  <?php
                    $query = $link -> query ("SELECT * FROM `disciplinas`");
                    while ($valores = mysqli_fetch_array($query)) {
                      echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                    }
                  ?>
                </select>
                <label for="nombre">Concepto</label>
                <input type="text" placeholder="Concepto" size="27" name="Conceptofya" id="dis" required=""/>

                <label for="nombre">Unidad  </label>
                <input type="text" name = "unidadfya"  placeholder="Unidad" size="10" required=""/>

                <label for="nombre">Cantidad  </label>
                <input type="number" name = "cantidadfya" value = "1" min = "1" max = "1000000" step = "1" size="10"/>

                <label for="nombre">Importe unitario  </label>
                <input type="number" name = "iufya" value = "1" min = "1" max = "1000000" step = "1" size="10"/>


                <button type="button" id="agregarfya" class="button2">Agregar</button>
                <br>
            </fieldset>
        </div>

        <div id="hyc" style="display: none;">
          <fieldset>
            <legend>Homologaciones y controles</legend>

              <label for="nombre">Nombre</label>
              <input class="uno" type="text" placeholder="Nombre" size="35" name="nombrehyc" id="dis" required=""/>

              <label for="nombre">Área</label>
              <select class="caja" name ="areahyc">
                  <?php
                    $query = $link -> query ("SELECT * FROM `area`");
                    while ($valores = mysqli_fetch_array($query)) {
                      echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                    }
                  ?>
                </select>
              </fieldset>
            <fieldset>
              <legend></legend>
              <label for="nombre">Disciplina</label>
              <select class="caja" name ="dischyc">
                  <?php
                    $query = $link -> query ("SELECT * FROM `disciplinas`");
                    while ($valores = mysqli_fetch_array($query)) {
                      echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                    }
                  ?>
                </select>
                <label for="nombre">Concepto</label>
                <input type="text" placeholder="Concepto" size="27" name="Conceptohyc" id="dis" required=""/>

                <label for="nombre">Unidad  </label>
                <input type="text" name = "unidadhyc"  placeholder="Unidad" size="10" required=""/>

                <label for="nombre">Cantidad  </label>
                <input type="number" name = "cantidadhyc" value = "1" min = "1" max = "1000000" step = "1" size="10"/>

                <label for="nombre">Importe unitario  </label>
                <input type="number" name = "iuhyc" value = "1" min = "1" max = "1000000" step = "1" size="10"/>


                <button type="button" id="agregarhyc" class="button2">Agregar</button>
                <br>
            </fieldset>
        </div>



        <fieldset>
          <legend>Costos</legend>
          <div id = "container">
            <div id="result"></div>
            <div id="result2"></div>
          </div>
        </fieldset>
        <div class="botones">
          <button type="submit" id="guardarv" class="button3">Guardar</button>
          <button type="submit" id="cancelav" class="button3">Cancelar</button>

        </div>

        </form>
    </div>

    <br>


  </body>
</html>
