<?php
    $us = "usuario";
    $admin = "<a href=''><img src='../Imagenes/inicio.png' class='inicio' alt=''>Inicio</a>";
    $user = "<a href=''><img src='../Imagenes/inicio.png' class='inicio' alt=''>Dos</a>";
?>
<div class="nav_tog border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">
        <div class="input-group input-group-sm mb-3 ">
            <div class="input-group-prepend ">
                <span class="input-group-text lupa1" id="inputGroup-sizing-sm"><img src="../Imagenes/Lupa.png"
                        class="lupa" alt=""></span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-sm" placeholder="Buscar">
        </div>
    </div>
    <div class="list-group list-group-flush">
        <ul>
            <li>
                <?php
                    
                    if ($us=="admin") {
                        echo $admin;
                    }elseif ($us=="user") {
                        echo $user;
                    }
                ?>
            </li>
        </ul>
    </div>
</div>