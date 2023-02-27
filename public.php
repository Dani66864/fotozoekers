<?php
require_once('./config/require.php');
require_once('./includes/header.php');
require_once('./includes/message.php');
ob_start();
?>
<div class="overlay">
</div>
<div class="container__form">
   <div class="header">
      <h1>Upload je images</h1>
   </div>
   <a href="/" id="return"><</a>
   <div class="info__text">
      <span>Upload je fotos hier om in zicht te krijgen</span>
   </div>
   <form class="widget" method="POST" id="upload-foto" action="public.php" enctype="multipart/form-data">
      <div class="input-box">
         <label>naam</label>
         <input type="text" onkeyup="validateName()" name="image_naam" id="image_naam" placeholder="Typ hier de naam van je gekozen foto">
         <div class="unset">
            <div class="message-box__naam">
               <i class="fa-solid fa-circle-xmark"></i>
               <span>Deze record mag het niet leeg zijn</span>
            </div>
         </div>
      </div>
      <div class="input-box">
         <label>beschrijving</label>
         <input type="text" name="beschrijving" id="beschrijving-img" onkeyup="validateDes()" placeholder="Typ hier de beschrijving van je gekozen foto">
         <div class="unset">
            <div class="message-box__des">
               <i class="fa-solid fa-circle-xmark"></i>
               <span>Deze record mag het niet leeg zijn</span>
            </div>
         </div>
      </div>
      <div class="thema-box">
         <div class="select-btn">
            <span class="btn-text">Selcteer een thema</span>
            <span class="arrow-dwn">
               <i class="fa-sharp fa-solid fa-chevron-down"></i>
            </span>
         </div>
         <ul class="list-items">
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' class="natuur_toggle" type='checkbox' name='Natuur' value='1'>
               </span>
               <span class='item-text'>Natuur</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='educatie' value='1'>
               </span>
               <span class='item-text'>Educatie</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='klimaat' value='1'>
               </span>
               <span class='item-text'>klimaat</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='energie' value='1'>
               </span>
               <span class='item-text'>Energie</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='leerlingen' value='1'>
               </span>
               <span class='item-text'>Leerlingen</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='lucht' value='1'>
               </span>
               <span class='item-text'>Lucht</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='omgeving' value='1'>
               </span>
               <span class='item-text'>Omgeving</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='onderwijs' value='1'>
               </span>
               <span class='item-text'>Onderwijs</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='vervoer' value='1'>
               </span>
               <span class='item-text'>Vervoer</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='voeding' value='1'>
               </span>
               <span class='item-text'>Voeding</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='water' value='1'>
               </span>
               <span class='item-text'>Water</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='woning' value='1'>
               </span>
               <span class='item-text'>Woning</span>
            </li>
         </ul>
      </div>
      <div class="subthema-box hidden">
         <div class="select-btn">
            <span class="btn-text">Selecteer de subthema</span>
            <span class="arrow-dwn">
               <i class="fa-sharp fa-solid fa-chevron-down"></i>
            </span>
         </div>
         <ul class="list-items">
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='natuur-bergen' value='1'>
               </span>
               <span class='item-text'>Bergen</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='natuur-bossen' value='1'>
               </span>
               <span class='item-text'>Bossen</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='natuur-sluis' value='1'>
               </span>
               <span class='item-text'>Sluis</span>
            </li>
         </ul>
      </div>
      <div class="input-box" id="file-box">
         <label>Foto</label>
         <input type="file" id="file" name="img">
      </div>
      <div class="buttons">
         <button class="verzenden" onclick="return validateFormValidate();" type="submit">Publiceren</button>
         <div class="container-main-error">
            <div class="main-error">
               <i class="fa-solid fa-circle-xmark"></i>
               <span class="error">
                  Probeer alle errors te fixen!
               </span>
            </div>
         </div>
      </div>
   </form>
</div>
</body>

</html>
<?php
$controller->img();
$controller->selectCode();
$controller->thema();

?>