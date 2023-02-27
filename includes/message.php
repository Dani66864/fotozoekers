<?php
if (isset($_GET['melding'])) {
    if ($_GET['melding'] == 'succes') {
       echo '<div class="message-container" id="testings">
       <div class="message-box">
           <i class="fa-solid fa-circle-check succes"></i>
           <span class="text-message">
                Het publiceren van de foto is succesvol gegaan!
           </span>
           <div class="under-line__message-box"></div>
       </div>
   </div>';
    }
    if ($_GET['melding'] == 'fout') {
        echo '<div class="message-container">
        <div class="message-box" style="background-color: red;">
        <i class="fa-solid fa-circle-xmark succes"></i>
            <span class="text-message">
                 Er is iets fout gegaan tijdens het uploaden van de foto!
            </span>
            <div class="under-line__message-box"></div>
        </div>
    </div>';
     }
     if($_GET['melding'] == 'actie-succes'){
        echo '<div class="message-container" id="testings">
        <div class="message-box">
            <i class="fa-solid fa-circle-check succes"></i>
            <span class="text-message">
                 Het verwidjeren van de img is succes gegaan!
            </span>
            <div class="under-line__message-box"></div>
        </div>
    </div>';
     }

     if ($_GET['melding'] == 'undifend-foto') {
        echo '<div class="message-container">
        <div class="message-box" style="background-color: red;">
        <i class="fa-solid fa-circle-xmark succes"></i>
            <span class="text-message">
                 U bent verplicht om een foto te uplaoden, probeer het nogmaals opnieuw!
            </span>
            <div class="under-line__message-box"></div>
        </div>
    </div>';
     }
     if ($_GET['melding'] == 'acces-type') {
        echo '<div class="message-container">
        <div class="message-box" style="background-color: red;">
        <i class="fa-solid fa-circle-xmark succes"></i>
            <span class="text-message">
                 Het is niet acceptabel om deze foto extensie te uploaden, probeer het opnieuw met adnere formaat
            </span>
            <div class="under-line__message-box"></div>
        </div>
    </div>';
     }
 }
?>

