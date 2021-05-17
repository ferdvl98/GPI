<?php 

    require "conexion.php";

    $pres = $_POST["pres"];

    $ad = $ac = "";

    $sql = "SELECT ad, accion FROM analisis where id_equipo = $pres";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $ad =  $row["ad"];
            $ac =  $row["accion"];
        }
    }

?>
<script>
    $(document).ready(function() {

        var ad = "<?php echo $ad ?>";
        document.getElementById("ad").value = ad;

        var ac = "<?php echo $ac ?>";
        document.getElementById("ac").value = ac;
    });
</script>