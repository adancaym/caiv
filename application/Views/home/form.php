<ul>

    <?php
    foreach ($cuentas as $cuenta) {
        ?>
<li>
    <?php echo $cuenta->cuenta;?>
</li>
        <?php
    }
    ?>
</ul>
