
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fotozoeker website</title>

    <!-- custom css file link -->
    <link rel="stylesheet" href="/css/style.css" type="text/css">

    <!-- custom javascript file link -->
    <script src="http://foto-zoeker-website/js/script.js" defer type="text/javascript"></script>

    <!-- custom cdn fontawesome icon file link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link rel="apple-touch-icon" sizes="180x180" href="../img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon/favicon-16x16.png">
    <link rel="manifest" href="../img/favicon/site.webmanifest">
</head>

<body>



</body>

</html>
<div class="overlay">
</div>
<div class="container__form">
   <div class="header">
      <h1>Upload je foto hier:</h1>
   </div>
   <a href="/" id="return"><</a>
   <div class="info__text">
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
      <div class="thema-box my-box">
         <div class="select-btn">
            <span class="btn-text">Selcteer een thema</span>
            <span class="arrow-dwn">
               <i class="fa-sharp fa-solid fa-chevron-down"></i>
            </span>
         </div>
         <!-- Hier zit alle thema's en als je wilt nieuwe thema toe te voegen om die te kunnen filteren,
               dan kan je de hele <li> item kopiëren en je moet de juiste naam aangeven van de input
                  en de standaard value zit altijd op (1), bij de <span clas='item'>
                     kan je gaan labelen naar je gewenste themanaam -->
         <ul class="list-items">
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check'  type='checkbox' name='Natuur' value='1'>
               </span>
               <span class='item-text'>Natuur</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check'  type='checkbox' name='educatie' value='1'>
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
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='mensen' value='1'>
               </span>
               <span class='item-text'>Mensen</span>
            </li>
         </ul>
      </div>
      <div class="subthema-box hidden my-box">
         <div class="select-btn">
            <span class="btn-text">Selecteer de subthema</span>
            <span class="arrow-dwn">
               <i class="fa-sharp fa-solid fa-chevron-down"></i>
            </span>
         </div>
         <!-- Hier zit de subthema van de thema Natuur als je wilt subthema toevoegen -->
         <ul class="list-items">
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='natuur-bloemen' value='1'>
               </span>
               <span class='item-text'>Bloemen</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='natuur-dieren' value='1'>
               </span>
               <span class='item-text'>Dieren</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='natuur-paddenstoelen' value='1'>
               </span>
               <span class='item-text'>Paddenstoelen</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='natuur-planten' value='1'>
               </span>
               <span class='item-text'>Planten</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='natuur-vogels' value='1'>
               </span>
               <span class='item-text'>Vogels</span>
            </li>
         </ul>
      </div>
      <div class="subthema-box-1 hidden my-box">
         <div class="select-btn">
            <span class="btn-text">Selecteer de subthema</span>
            <span class="arrow-dwn">
               <i class="fa-sharp fa-solid fa-chevron-down"></i>
            </span>
         </div>
         <!-- Hier zit de subthema van de thema Natuur als je wilt subthema toevoegen -->
         <ul class="list-items">
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='energie-zonnepanelen' value='1'>
               </span>
               <span class='item-text'>zonnepanelen</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='energie-windmolens' value='1'>
               </span>
               <span class='item-text'>windmolens</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='energie-lampen' value='1'>
               </span>
               <span class='item-text'>lampen</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='energie-koken' value='1'>
               </span>
               <span class='item-text'>koken</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='energie-isolatie' value='1'>
               </span>
               <span class='item-text'>isolatie</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='energie-elektriciteit' value='1'>
               </span>
               <span class='item-text'>elektriciteit</span>
            </li>
         </ul>
      </div>
      <div class="subthema-box-2 hidden my-box">
         <div class="select-btn">
            <span class="btn-text">Selecteer de subthema</span>
            <span class="arrow-dwn">
               <i class="fa-sharp fa-solid fa-chevron-down"></i>
            </span>
         </div>
         <!-- Hier zit de subthema van de thema Natuur als je wilt subthema toevoegen -->
         <ul class="list-items">
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='mensen-leerlingen' value='1'>
               </span>
               <span class='item-text'>Leerlingen</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='mensen-handen' value='1'>
               </span>
               <span class='item-text'>Handen</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='mensen-jongeren' value='1'>
               </span>
               <span class='item-text'>Jongeren</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='mensen-kantoor' value='1'>
               </span>
               <span class='item-text'>kantoor</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='mensen-infomarkt' value='1'>
               </span>
               <span class='item-text'>Infomarkt</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='mensen-kinderen' value='1'>
               </span>
               <span class='item-text'>Kinderen</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='mensen-klussen' value='1'>
               </span>
               <span class='item-text'>Klussen</span>
            </li>
         <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='mensen-sessies' value='1'>
               </span>
               <span class='item-text'>Sessies</span>
            </li>
         </ul>
      </div>
      <div class="subthema-box-3 hidden my-box">
         <div class="select-btn">
            <span class="btn-text">Selecteer de subthema</span>
            <span class="arrow-dwn">
               <i class="fa-sharp fa-solid fa-chevron-down"></i>
            </span>
         </div>
         <!-- Hier zit de subthema van de thema Natuur als je wilt subthema toevoegen -->
         <ul class="list-items">
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='omgeving-lente' value='1'>
               </span>
               <span class='item-text'>Lente</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='omgeving-zomer' value='1'>
               </span>
               <span class='item-text'>Zomer</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='omgeving-winter' value='1'>
               </span>
               <span class='item-text'>Winter</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='omgeving-tuinieren' value='1'>
               </span>
               <span class='item-text'>Tuinieren</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='omgeving-stad' value='1'>
               </span>
               <span class='item-text'>Stad</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='omgeving-platteland' value='1'>
               </span>
               <span class='item-text'>Platteland</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='omgeving-herfst' value='1'>
               </span>
               <span class='item-text'>Herfst</span>
            </li>
         <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='omgeving-gebouwen' value='1'>
               </span>
               <span class='item-text'>Gebouwen</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='omgeving-dorp' value='1'>
               </span>
               <span class='item-text'>Dorp</span>
            </li>
         </ul>
      </div>
      <div class="subthema-box-4 hidden my-box">
         <div class="select-btn">
            <span class="btn-text">Selecteer de subthema</span>
            <span class="arrow-dwn">
               <i class="fa-sharp fa-solid fa-chevron-down"></i>
            </span>
         </div>
         <!-- Hier zit de subthema van de thema Natuur als je wilt subthema toevoegen -->
         <ul class="list-items">
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='onderwijs-basisschool' value='1'>
               </span>
               <span class='item-text'>Basisschool</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='onderwijs-congressen' value='1'>
               </span>
               <span class='item-text'>Congressen</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='onderwijs-meetinstrumenten' value='1'>
               </span>
               <span class='item-text'>Meetinstrumenten</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='onderwijs-middelbre' value='1'>
               </span>
               <span class='item-text'>Middelbare school</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='onderwijs-schoolgebouw' value='1'>
               </span>
               <span class='item-text'>Schoolgebouw</span>
            </li>
         </ul>
      </div>
      <div class="subthema-box-5 hidden my-box">
         <div class="select-btn">
            <span class="btn-text">Selecteer de subthema</span>
            <span class="arrow-dwn">
               <i class="fa-sharp fa-solid fa-chevron-down"></i>
            </span>
         </div>
         <!-- Hier zit de subthema van de thema Natuur als je wilt subthema toevoegen -->
         <ul class="list-items">
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='water-strand' value='1'>
               </span>
               <span class='item-text'>Strand</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='water-rivier' value='1'>
               </span>
               <span class='item-text'>Rivier</span>
            </li>
            <li class='item'>
               <span class='checkbox'>
                  <i class='fa-sharp fa-solid fa-chevron-down'></i>
                  <input id='fa-check' type='checkbox' name='water-landschap' value='1'>
               </span>
               <span class='item-text'>Landschap</span>
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
