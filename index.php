<?php
require_once('./config/require.php');
require_once('./includes/header2.php');
require_once('./includes/message.php');
ob_start();
error_reporting(E_ALL & ~E_NOTICE);
?>



<div class="header__totaal">
    <h1>Totaal gevonden fotos: <span><?= $controller->getAantalFoto() ?></span></h1>
</div>

<input type="checkbox" checked name="" id="checkin">
<button class="click-btn">
    <span>ZoekBalk</span>
    <i class="fa-solid fa-magnifying-glass"></i>
</button>
<a href="public.php" class="home">
    <i class="fa-solid fa-house"></i>Foto publiceren
</a>
<label for="close" id="search-balk">
    <div class="filter-container">
        <i class="fa-sharp fa-solid fa-circle-xmark exit-btn"></i>
        <h1>Filter</h1>
        <form method='POST' class="widget" action='index.php'>
            <div class="naam">
                <label for="">Foto naam</label>
                <input type='text' name='foto_naam' value="">
            </div>
         <div class="select-btn">
            <span class="btn-text">Selcteer een thema</span>
            <span class="arrow-dwn">
               <i class="fa-sharp fa-solid fa-chevron-down"></i>
            </span>
         </div>
         <ul class="list-items">
            <li class="item different">
                <a href="/">Get alle foto</a>
            </li>
            <li class='item different'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='natuur' value='Natuur'>
               </span>
               <span class='item-text'>Natuur</span>
               <ol class="custom-list">
                    <li><a href="?subthema=natuur_bossen" class="subtema">Bossen</a></li>
                    <li><a href="?subthema=natuur_sluis" class="subtema">Sluis</a></li>
                    <li><a href="?subthema=natuur_bergen" class="subtema">Bergen</a></li>
                    </ol>
            </li>
            <li class='item different'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='educatie' value='educatie'>
               </span>
               <span class='item-text'>Educatie</span>
            </li>
            <li class='item different'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='klimaat' value='klimaat'>
               </span>
               <span class='item-text'>klimaat</span>
            </li>
            <li class='item different'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='energie' value='energie'>
               </span>
               <span class='item-text'>energie</span>
            </li>
            <li class='item different'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='leerlingen' value='leerlingen'>
               </span>
               <span class='item-text'>leerlignen</span>
            </li>
            <li class='item different'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='lucht' value='lucht'>
               </span>
               <span class='item-text'>Lucht</span>
            </li>
            <li class='item different'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='omgeving' value='omgeving'>
               </span>
               <span class='item-text'>Omgeving</span>
            </li>
            <li class='item different'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='onderwijs' value='onderwijs'>
               </span>
               <span class='item-text'>Onderwijs</span>
            </li>
            <li class='item different'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='vervoer' value='vervoer'>
               </span>
               <span class='item-text'>Vervoer</span>
            </li>
            <li class='item different'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='voeding' value='voeding'>
               </span>
               <span class='item-text'>Voeding</span>
            </li>
            <li class='item different'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='water' value='water'>
               </span>
               <span class='item-text'>Water</span>
            </li>
            <li class='item different'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='woning' value='woning'>
               </span>
               <span class='item-text'>Woning</span>
            </li>
         </ul>

            <button type='submit'>Zoeken</button>
        </form>
    </div>
</label>
<div class='container--images-cards'>
    <?php
    $controller->getFotos();
    $controller->verwijderen();
    ?>
</div>

</body>

</html>