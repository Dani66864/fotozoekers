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
         <!-- Hier zit alle thema's en als je wilt nieuwe thema toe te voegen om die te kunnen filteren,
               dan kan je de hele <li> item kopiëren en je moet de juiste naam aangeven van de input
                  en de value moet overeenkomsten met de inputnaam, bij de <span clas='item'>
                     kan je gaan labelen naar je gewenste themanaam -->
         <ul class="list-items">
            <li class="item different">
               <a href="/">Filters wissen</a>
            </li>
            <li class='item different'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='natuur' value='Natuur'>
               </span>
               <span class='item-text'>Natuur</span>
               <!-- Hier kan je subthema gaan creëren, 
               de link moet goed ingesteld en de juiste naam meegegeven
               om dat in de controller te funcioneren, begin altijd met(?subthema=<kernmerk>) -->
               <ol class="custom-list">
                  <li><a href="?subthema=natuur_vogels" class="subtema">Vogels</a></li>
                  <li><a href="?subthema=natuur_planten" class="subtema">Planten</a></li>
                  <li><a href="?subthema=natuur_bloemen" class="subtema">Bloemen</a></li>
                  <li><a href="?subthema=natuur_dieren" class="subtema">DIeren</a></li>
                  <li><a href="?subthema=natuur_paddenstoelen" class="subtema">Paddenstoelen</a></li>
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
               <ol class="custom-list">
                  <li><a href="?subthema=energie_zonnepanelen" class="subtema">Zonnepanelen</a></li>
                  <li><a href="?subthema=energie_windmolens" class="subtema">Windmolens</a></li>
                  <li><a href="?subthema=energie_lampen" class="subtema">Lampen</a></li>
                  <li><a href="?subthema=energie_koken" class="subtema">Koken</a></li>
                  <li><a href="?subthema=energie_isolatie" class="subtema">Isolatie</a></li>
                  <li><a href="?subthema=energie_elektriciteit" class="subtema">Elektriciteit</a></li>
               </ol>
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
               <ol class="custom-list">
                  <li><a href="?subthema=omgeving_lente" class="subtema">Lente</a></li>
                  <li><a href="?subthema=omgeving_zomer" class="subtema">Zomer</a></li>
                  <li><a href="?subthema=omgeving_winter" class="subtema">Winter</a></li>
                  <li><a href="?subthema=omgeving_herfst" class="subtema">Herfst</a></li>
                  <li><a href="?subthema=omgeving_gebouwen" class="subtema">Gebouwen</a></li>
                  <li><a href="?subthema=omgeving_dorp" class="subtema">Dorp</a></li>
                  <li><a href="?subthema=omgeving_tuinieren" class="subtema">Tuinieren</a></li>
                  <li><a href="?subthema=omgeving_platteland" class="subtema">Platteland</a></li>
                  <li><a href="?subthema=omgeving_stad" class="subtema">Stad</a></li>
               </ol>
            </li>
            <li class='item different'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='onderwijs' value='onderwijs'>
               </span>
               <span class='item-text'>Onderwijs</span>
               <ol class="custom-list">
                  <li><a href="?subthema=onderwijs_middelbre" class="subtema">Middelbare School</a></li>
                  <li><a href="?subthema=onderwijs_meetinstrumenten" class="subtema">Meetinstrumenten</a></li>
                  <li><a href="?subthema=onderwijs_congressen" class="subtema">Congressen</a></li>
                  <li><a href="?subthema=onderwijs_schoolgebouw" class="subtema">Schoolgebouw</a></li>
                  <li><a href="?subthema=onderwijs_basisschool" class="subtema">Basisschool</a></li>
               </ol>
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
            <li class='item different'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='mensen' value='mensen'>
               </span>
               <span class='item-text'>Mensen</span>
               <ol class="custom-list">
                  <li><a href="?subthema=mensen_sessies" class="subtema">Sessies</a></li>
                  <li><a href="?subthema=mensen_klussen" class="subtema">Klussen</a></li>
                  <li><a href="?subthema=mensen_kinderen" class="subtema">Kinderen</a></li>
                  <li><a href="?subthema=mensen_infomarkt" class="subtema">Infomarkt</a></li>
                  <li><a href="?subthema=mensen_kantoor" class="subtema">Kantoor</a></li>
                  <li><a href="?subthema=mensen_jongeren" class="subtema">Jongeren</a></li>
                  <li><a href="?subthema=mensen_handen" class="subtema">Handen</a></li>
                  <li><a href="?subthema=mensen_leerlingen" class="subtema">Leerlingen</a></li>
               </ol>
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

