<?php
class Controller extends Database
{
    protected $db;
    private $themaName;
    private $result;
    private $n = 1;
    private $code;
    public function __construct()
    {
        $this->db = new Database();
        error_reporting(0);
    }



    private function filterThema($statement)
    {
        try {
            $this->db->query("SELECT imgtabel.id, thema.educatie, thema.Natuur,
            thema.`natuur_vogels`, thema.`natuur_planten`, thema.`natuur_bloemen`,
            thema.natuur_dieren, thema.natuur_paddenstoelen,  thema.klimaat, thema.energie, thema.energie_zonnepanelen, thema.energie_windmolens,
            thema.energie_lampen, thema.energie_koken, thema.energie_isolatie,
             thema.energie_elektriciteit, thema.lucht, thema.omgeving,
             thema.omgeving_lente, thema.omgeving_zomer, thema.omgeving_winter, thema.omgeving_tuinieren,
             thema.omgeving_stad, thema.omgeving_platteland, thema.omgeving_herfst, thema.omgeving_gebouwen,
             thema.omgeving_dorp, thema.onderwijs,
             thema.onderwijs_middelbre, thema.onderwijs_meetinstrumenten, thema.onderwijs_congressen,
             thema.onderwijs_schoolgebouw, onderwijs_basisschool,
            thema.vervoer, thema.voeding, thema.water, thema.woning,
            thema.mensen, thema.mensen_sessies, thema.mensen_klussen, thema.mensen_kinderen,
            thema.mensen_infomarkt, thema.mensen_kantoor, thema.mensen_jongeren, mensen_handen,
            thema.mensen_leerlingen, imgtabel.img, imgtabel.code, imgtabel.beschrijven FROM img as 
                                imgtabel INNER JOIN thema ON imgtabel.code = thema.img
            WHERE thema.$statement = 1");
            $get_result = $this->db->resultSet();
        } catch (PDOException $e) {
            print_r('Error: ' . $e->getMessage());
        }
        if ($get_result == false) {
            require_once('includes/empty.php');
        }
        foreach ($get_result as $result) {
            $thema  = $this->themaName([
                "thema-1" => $result->Natuur,
                "thema-2" => $result->educatie,
                "thema-3" => $result->klimaat,
                "thema-4" => $result->energie,
                "thema-5" => $result->lucht,
                "thema-6" => $result->omgeving,
                "thema-7" => $result->onderwijs,
                "thema-8" => $result->vervoer,
                "thema-9" => $result->voeding,
                "thema-10" => $result->water,
                "thema-11" => $result->woning,
                "thema-12" => $result->mensen,
                "subthema-1" => $result->natuur_vogels,
                "subthema-2" => $result->natuur_planten,
                "subthema-3" => $result->natuur_bloemen,
                "subthema-4" => $result->natuur_dieren,
                "subthema-5" => $result->natuur_paddenstoelen,
                "subthema-6" => $result->energie_zonnepanelen,
                "subthema-7" => $result->energie_windmolens,
                "subthema-8" => $result->energie_lampen,
                "subthema-9" => $result->energie_koken,
                "subthema-10" => $result->energie_isolatie,
                "subthema-11" => $result->energie_elektriciteit,
                "subthema-12" => $result->mensen_sessies,
                "subthema-13" => $result->mensen_klussen,
                "subthema-14" => $result->mensen_kinderen,
                "subthema-15" => $result->mensen_infomarkt,
                "subthema-16" => $result->mensen_kantoor,
                "subthema-17" => $result->mensen_jongeren,
                "subthema-18" => $result->mensen_handen,
                "subthema-19" => $result->mensen_leerlingen,
                "subthema-20" => $result->omgeving_lente,
                "subthema-21" => $result->omgeving_zomer,
                "subthema-22" => $result->omgeving_winter,
                "subthema-23" => $result->omgeving_tuinieren,
                "subthema-24" => $result->omgeving_stad,
                "subthema-25" => $result->omgeving_platteland,
                "subthema-26" => $result->omgeving_herfst,
                "subthema-27" => $result->omgeving_gebouwen,
                "subthema-28" => $result->omgeving_dorp,
                "subthema-29" => $result->onderwijs_middelbre,
                "subthema-30" => $result->onderwijs_meetinstrumenten,
                "subthema-31" => $result->onderwijs_congressen,
                "subthema-32" => $result->onderwijs_schoolgebouw,
                "subthema-33" => $result->onderwijs_basisschool,
            ]);

            echo "<div class='card'>
            <a id='verwijder-kop' href='index.php?id=" . $result->id . "&img=" . $result->code . "'>Verwijderen</a>                    <div class='img'>
                        <img alt='img is niet gevonden' src='/upload-images/" . $result->img . $result->code . ".jpg'>
                    </div>
                    <div class='adres'>
                        <h3>naam: <span>" . $result->img . "</span></h3>
                    </div>
                   $thema
                    <a href='" . URLROOT . "/read.php?img=" . $result->img . "&code=" . $result->code . "' class='info'>Meer informatie <i class='fa-sharp fa-solid fa-circle-info'></i></a>
                </div>";
        }
    }

    protected function themaName($data = [])
    {
        /** Alles wat zit in de beveiligde fucntie verstop ik achter een variable,
         * Om uiteindelijk alle thema en subthema's weer te geven
         */
        $thema_1 = $data['thema-1'];
        $thema_2 = $data['thema-2'];
        $thema_3 = $data['thema-3'];
        $thema_4 = $data['thema-4'];
        $thema_5 = $data['thema-5'];
        $thema_6 = $data['thema-6'];
        $thema_7 = $data['thema-7'];
        $thema_8 = $data['thema-8'];
        $thema_9 = $data['thema-9'];
        $thema_10 = $data['thema-10'];
        $thema_11 = $data['thema-11'];
        $thema_12 = $data['thema-12'];
        $subthema1 = $data['subthema-1'];
        $subthema2 = $data['subthema-2'];
        $subthema3 = $data['subthema-3'];
        $subthema4 = $data['subthema-4'];
        $subthema5 = $data['subthema-5'];
        $subthema6 = $data['subthema-6'];
        $subthema7 = $data['subthema-7'];
        $subthema8 = $data['subthema-8'];
        $subthema9 = $data['subthema-9'];
        $subthema10 = $data['subthema-10'];
        $subthema11 = $data['subthema-11'];
        $subthema12 = $data['subthema-12'];
        $subthema13 = $data['subthema-13'];
        $subthema14 = $data['subthema-14'];
        $subthema15 = $data['subthema-15'];
        $subthema16 = $data['subthema-16'];
        $subthema17 = $data['subthema-17'];
        $subthema18 = $data['subthema-18'];
        $subthema19 = $data['subthema-19'];
        $subthema20 = $data['subthema-20'];
        $subthema21 = $data['subthema-21'];
        $subthema22 = $data['subthema-22'];
        $subthema23 = $data['subthema-23'];
        $subthema24 = $data['subthema-24'];
        $subthema25 = $data['subthema-25'];
        $subthema26 = $data['subthema-26'];
        $subthema27 = $data['subthema-27'];
        $subthema28 = $data['subthema-28'];
        $subthema29 = $data['subthema-29'];
        $subthema30 = $data['subthema-30'];
        $subthema31 = $data['subthema-31'];
        $subthema32 = $data['subthema-32'];
        $subthema33 = $data['subthema-33'];

        /** Als de geselecteerde thema heeft een waarde van 1 dan zit ik de juiste naam in,
         * om die weer te geven
         */
        $thema_1 == 1 ? $thema_1  = "Natuur" : "";
        $thema_2 == 1 ? $thema_2 = " Educatie" : "";
        $thema_3 == 1 ? $thema_3 = " Klimaat" : "";
        $thema_4 == 1 ?  $thema_4 = " Energie" : "";
        $thema_5 == 1 ? $thema_5 = " Lucht" : "";
        $thema_6 == 1 ? $thema_6 = " Omgeving" : "";
        $thema_7 == 1 ? $thema_7 = " Onderwijs" : "";
        $thema_8 == 1 ? $thema_8 = " Vervoer" : "";
        $thema_9 == 1 ? $thema_9 = " Voeding" : "";
        $thema_10 == 1 ? $thema_10 = " Water" : "";
        $thema_11 == 1 ? $thema_11 = " Woning" : "";
        $thema_12 == 1 ? $thema_12 = " Mensen" : "";
        $subthema1 == 1 ? $subthema1  = "Vogels" : "";
        $subthema2 == 1 ? $subthema2  = " Planten" : "";
        $subthema3 == 1 ? $subthema3  = " Bloemen" : "";
        $subthema4 == 1 ? $subthema4  = " Dieren" : "";
        $subthema5 == 1 ? $subthema5  = " paddenstoelen" : "";
        $subthema6 == 1 ? $subthema6  = " Zonnepanelen" : "";
        $subthema7 == 1 ? $subthema7  = " Windmolens" : "";
        $subthema8 == 1 ? $subthema8  = " Lampen" : "";
        $subthema9 == 1 ? $subthema9  = " Koken" : "";
        $subthema10 == 1 ? $subthema10  = " Isolatie" : "";
        $subthema11 == 1 ? $subthema11  = " Elektriciteit" : "";
        $subthema12 == 1 ? $subthema12  = " sessies" : "";
        $subthema13 == 1 ? $subthema13  = " klussen" : "";
        $subthema14 == 1 ? $subthema14  = " kinderen" : "";
        $subthema15 == 1 ? $subthema15  = " Infomarkt" : "";
        $subthema16 == 1 ? $subthema16  = " Kantoor" : "";
        $subthema17 == 1 ? $subthema17  = " Jongeren" : "";
        $subthema18 == 1 ? $subthema18  = " Handen" : "";
        $subthema19 == 1 ? $subthema19  = " Leerlingen" : "";
        $subthema20 == 1 ? $subthema20  = " Lente" : "";
        $subthema21 == 1 ? $subthema21  = " Zomer" : "";
        $subthema22 == 1 ? $subthema22  = " Winter" : "";
        $subthema23 == 1 ? $subthema23  = " Tuinieren" : "";
        $subthema24 == 1 ? $subthema24  = " Stad" : "";
        $subthema25 == 1 ? $subthema25  = " PLatteland" : "";
        $subthema26 == 1 ? $subthema26  = " Herfst" : "";
        $subthema27 == 1 ? $subthema26  = " Gebouwen" : "";
        $subthema28 == 1 ? $subthema26  = " Dorp" : "";
        $subthema29 == 1 ? $subthema29  = " Middelbare" : "";
        $subthema30 == 1 ? $subthema30  = " Meetinstrumenten" : "";
        $subthema31 == 1 ? $subthema31  = " Congressen" : "";
        $subthema32 == 1 ? $subthema32  = " Schoolgebouw" : "";
        $subthema33 == 1 ? $subthema33  = " Basisschool" : "";
        $ar = [];
        // De laatste stap om die in een lege array te zitten
        array_push(
            $ar,
            $thema_1,
            $thema_2,
            $thema_3,
            $thema_4,
            $thema_5,
            $thema_6,
            $thema_7,
            $thema_8,
            $thema_9,
            $thema_10,
            $thema_11,
            $thema_12,
            $subthema1,
            $subthema2,
            $subthema3,
            $subthema4,
            $subthema5,
            $subthema6,
            $subthema7,
            $subthema8,
            $subthema9,
            $subthema10,
            $subthema11,
            $subthema12,
            $subthema13,
            $subthema14,
            $subthema15,
            $subthema16,
            $subthema17,
            $subthema18,
            $subthema19,
            $subthema20,
            $subthema21,
            $subthema22,
            $subthema23,
            $subthema24,
            $subthema25,
            $subthema26,
            $subthema27,
            $subthema28,
            $subthema29,
            $subthema30,
            $subthema31,
            $subthema32,
            $subthema33,
        );
        // Hier wordt de naam van de thema en de subthema weergegeven
        return "
        <div id='subthema-row'>
        <div class='thema'>
        <h3>thema: <span>" . $ar[0]
            . $ar[1]
            . $ar[2] .
            $ar[3]
            . $ar[4] .
            $ar[5] .
            $ar[6] .
            $ar[7] .
            $ar[8] .
            $ar[9] .
            $ar[10] .
            $ar[11] . "</span></h3>
    </div>
    <div class='thema' id='subthema-row'>
        <h3>subthema: <span>" . $ar[12] .
            $ar[13] .
            $ar[14] .
            $ar[15] .
            $ar[16] .
            $ar[17] .
            $ar[18] .
            $ar[19] .
            $ar[20] .
            $ar[21] .
            $ar[22] .
            $ar[23] .
            $ar[24] .
            $ar[25] .
            $ar[26] .
            $ar[27] .
            $ar[28] .
            $ar[29] .
            $ar[30] .
            $ar[31] .
            $ar[32] .
            $ar[33] .
            $ar[34] .
            $ar[35] .
            $ar[36] .
            $ar[37] .
            $ar[38] .
            $ar[39] .
            $ar[40] .
            $ar[41] .
            $ar[42] .
            $ar[43] .
            $ar[44] . "</span></h3>
    </div>
    </div>
    ";
    }

    private function multiFilter($data = [])
    {
        $input1 = $data['input-1'];
        $input2 = $data['input-2'];
        try {
            $this->db->query("SELECT imgtabel.id, thema.educatie, thema.Natuur, thema.klimaat, thema.energie, imgtabel.img, imgtabel.code, imgtabel.beschrijven FROM img as 
                                imgtabel INNER JOIN thema ON imgtabel.code = thema.img
                                WHERE thema.$input1 = 1 AND thema.$input2 = 1");
            $get_result = $this->db->resultSet();
        } catch (PDOException $e) {
            print_r('Error: ' . $e->getMessage());
        }
        foreach ($get_result as $result) {
            $result->Natuur == 1 ? $result->Natuur  = "Natuur" : "";
            $result->educatie == 1 ? $result->educatie = " Educatie" : "";
            $result->klimaat == 1 ? $result->klimaat = " Klimaat" : "";
            $result->energie == 1 ?  $result->energie = " Energie" : "";
            $result->leerlingen == 1 ? $result->leerlingen = " Leerlingen" : "";

            echo "<div class='card'>
            <a id='verwijder-kop' href='index.php?id=" . $result->id . "&img=" . $result->code . "'>Verwijderen</a>                    <div class='img'>
                        <img alt='img is niet gevonden' src='/upload-images/" . $result->img . $result->code . ".jpg'>
                    </div>
                    <div class='adres'>
                        <h3>naam: <span>" . $result->img . "</span></h3>
                    </div>
                    <div class='thema'>
                        <h3>thema: <span>" . $result->Natuur
                . $result->educatie
                . $result->klimaat .
                $result->energie
                . $result->leerlingen . "</span></h3>
                    </div>
                    <a href='" . URLROOT . "/read.php?img=" . $result->img . "&code=" . $result->code . "&thema=" . $this->themaName . "' class='info'>Meer informatie <i class='fa-sharp fa-solid fa-circle-info'></i></a>
                </div>";
        }
    }

    public function getThema()
    {
        try {
            $this->db->query('SELECT id, themaname FROM thema');
            $get_result = $this->db->resultSet();
        } catch (PDOException $e) {
            print_r('Error: ' . $e->getMessage());
        }
        $tablesRow = "";
        foreach ($get_result as $result) {
            echo "<input type='checkbox' class='$result->themaname' id='thema' name='thema' value='$result->id'>$result->themaname</input>";
        }
    }

    public function getAantalFoto()
    {
        try {
            $this->db->query('SELECT * FROM img');
            $this->db->execute();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            print_r('Error: ' . $e->getMessage());
        }
    }


    private function uploadImg($img_name, $error, $size, $tmp, $name)
    {
        $this->db->query('SELECT    code
        FROM      img
        ORDER BY  id DESC
        LIMIT     1;');
        $result = $this->db->single();
        foreach ($result as $record) {
            $code = $record;
        }
        $fileExt = explode('.', $img_name);
        $fileActualExt = strtolower(end($fileExt));
        $this->moveFiles = $img_name;
        $fileDestination =  './upload-images/' .  $name . $code . '.jpg';
        return move_uploaded_file($tmp, $fileDestination);
    }

    public function img()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $image_name = $_FILES['img']['name'];
            $image_error = $_FILES['img']['error'];
            // CHECK the file type
            $fileExt = explode('.', $image_name);
            $fileActualExt = strtolower(end($fileExt));
            $allowd = array('jpg', 'jpeg', 'png');
            if ($image_error === 4) {
                header('Location: /public.php?melding=undifend-foto');
            } elseif (!in_array($fileActualExt, $allowd)) {
                header('Location: /public.php?melding=acces-type');
            } else {
                try {
                    $img_name = $_FILES['img']['name'];
                    $img_type = $_FILES['img']['type'];
                    $img_tmp = $_FILES['img']['tmp_name'];
                    $img_error = $_FILES['img']['error'];
                    $img_size = $_FILES['img']['error'];
                    $img = $_POST['image_naam'];
                    $desc = $_POST['beschrijving'];
                    $code = hexdec(uniqid());
                    $this->db->query('INSERT INTO fotozoeker.img (id, img, beschrijven, code) VALUES (NULL, :img, :desc, :code);');
                    $this->db->bind(':img', $img);
                    $this->db->bind(':desc', $desc);
                    $this->db->bind(':code', $code);
                    $information_verzenden =  $this->db->execute();
                    if ($information_verzenden == true) {
                        $this->uploadImg($img_name, $img_error, $img_size, $img_tmp, $img);
                        header('Location: index.php?melding=succes');
                    }
                } catch (PDOException $e) {
                    print_r('Error: ' . $e->getMessage());
                }
            }
        }
    }

    public function verwijderen()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $img = $_GET['img'];
                echo '<div class="container__model">
                <div class="wrapper">
                    <div class="model">
                        <a href="/index.php" class="exit">X</a>
                        <h3>Weet u zeker dat u wilt deze record verwijderen?</h3>
                        <div class="btn">
                            <a href="/index.php">terug</a>
                            <a href="index.php?id=' . $id . '&actie=verwijderen&code=' . $img . '">Verwijderen</a>
                        </div>
                    </div>
                </div>
            </div>';
                if (isset($_GET['id']) && isset($_GET['actie'])) {
                    try {
                        $img = $_GET['code'];
                        $this->db->query('DELETE FROM thema where thema.img = :img');
                        $this->db->bind(':img', $img);
                        $result = $this->db->execute();
                        unlink("upload-images/" . $img . "");
                    } catch (PDOException $e) {
                        print_r('Errror: ' . $e->getMessage());
                    }
                    if ($result == true) {
                        try {
                            $img = $_GET['code'];
                            $this->db->query('DELETE FROM img where img.code = :code');
                            $this->db->bind(':code', $img);
                            $result = $this->db->execute();
                        } catch (PDOException $e) {
                            print_r('Errror: ' . $e->getMessage());
                        }
                        $result ? header('Location: /index.php?melding=actie-succes') : header('Location: /index.php?melding=actie-mislukt');
                    }
                }
            }
        }
    }

    public function selectCode()
    {
        try {
            $this->db->query('SELECT    code
            FROM      img
            ORDER BY  id DESC
            LIMIT     1;');
            $result = $this->db->single();
            if ($result !== false) {
                foreach ($result as $record) {
                    $this->code = $record;
                }
            }
        } catch (PDOException $e) {
            print_r('Error: ' . $e->getMessage());
        }
    }

    public function thema()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                /**
                 * hier roep ik de variable in als die is wel beschikbaar dan verstop ik die in een variable,
                 * als dat niet dan zeg ik die mag leeg door ("") te gbruiken
                 *  */
                isset($_POST['Natuur']) ? $natuur = $_POST['Natuur'] : "";
                isset($_POST['educatie']) ? $educatie = $_POST['educatie'] : "";
                isset($_POST['klimaat']) ? $klimaat = $_POST['klimaat'] : "";
                isset($_POST['energie']) ? $Energie = $_POST['energie'] : "";
                isset($_POST['lucht']) ? $lucht = $_POST['lucht'] : "";
                isset($_POST['omgeving']) ? $omgeving = $_POST['omgeving'] : "";
                isset($_POST['onderwijs']) ? $onderwijs = $_POST['onderwijs'] : "";
                isset($_POST['vervoer']) ? $vervoer = $_POST['vervoer'] : "";
                isset($_POST['voeding']) ? $voeding = $_POST['voeding'] : "";
                isset($_POST['water']) ? $water = $_POST['water'] : "";
                isset($_POST['woning']) ? $woning = $_POST['woning'] : "";
                isset($_POST['mensen']) ? $mensen = $_POST['mensen'] : "";
                isset($_POST['natuur-vogels']) ? $vogels = $_POST['natuur-vogels'] : "";
                isset($_POST['natuur-planten']) ? $planten = $_POST['natuur-planten'] : "";
                isset($_POST['natuur-bloemen']) ? $bloemen = $_POST['natuur-bloemen'] : "";
                isset($_POST['natuur-dieren']) ? $dieren = $_POST['natuur-dieren'] : "";
                isset($_POST['natuur-paddenstoelen']) ? $paddenstoelen = $_POST['natuur-paddenstoelen'] : "";
                isset($_POST['energie-zonnepanelen']) ? $zonnepanelen = $_POST['energie-zonnepanelen'] : "";
                isset($_POST['energie-windmolens']) ? $windmolens = $_POST['energie-windmolens'] : "";
                isset($_POST['energie-lampen']) ? $lampen = $_POST['energie-lampen'] : "";
                isset($_POST['energie-koken']) ? $koken = $_POST['energie-koken'] : "";
                isset($_POST['energie-isolatie']) ? $isolatie = $_POST['energie-isolatie'] : "";
                isset($_POST['energie-elektriciteit']) ? $elektriciteit = $_POST['energie-elektriciteit'] : "";
                isset($_POST['mensen-leerlingen']) ? $sub_leerlingen = $_POST['mensen-leerlingen'] : "";
                isset($_POST['mensen-handen']) ? $handen = $_POST['mensen-handen'] : "";
                isset($_POST['mensen-jongeren']) ? $jongeren = $_POST['mensen-jongeren'] : "";
                isset($_POST['mensen-kantoor']) ? $kantoor = $_POST['mensen-kantoor'] : "";
                isset($_POST['mensen-infomarkt']) ? $infomarkt = $_POST['mensen-infomarkt'] : "";
                isset($_POST['mensen-kinderen']) ? $kinderen = $_POST['mensen-kinderen'] : "";
                isset($_POST['mensen-klussen']) ? $klussen = $_POST['mensen-klussen'] : "";
                isset($_POST['mensen-sessies']) ? $sessies = $_POST['mensen-sessies'] : "";
                isset($_POST['omgeving-lente']) ? $lente = $_POST['omgeving-lente'] : "";
                isset($_POST['omgeving-zomer']) ? $zomer = $_POST['omgeving-zomer'] : "";
                isset($_POST['omgeving-winter']) ? $winter = $_POST['omgeving-winter'] : "";
                isset($_POST['omgeving-tuinieren']) ? $tuinieren = $_POST['omgeving-tuinieren'] : "";
                isset($_POST['omgeving-stad']) ? $stad = $_POST['omgeving-stad'] : "";
                isset($_POST['omgeving-platteland']) ? $platteland = $_POST['omgeving-platteland'] : "";
                isset($_POST['omgeving-herfst']) ? $herfst = $_POST['omgeving-herfst'] : "";
                isset($_POST['omgeving-gebouwen']) ? $gebouwen = $_POST['omgeving-gebouwen'] : "";
                isset($_POST['omgeving-dorp']) ? $dorp = $_POST['omgeving-dorp'] : "";
                isset($_POST['onderwijs-basisschool']) ? $basisschool = $_POST['onderwijs-basisschool'] : "";
                isset($_POST['onderwijs-congressen']) ? $congressen = $_POST['onderwijs-congressen'] : "";
                isset($_POST['onderwijs-meetinstrumenten']) ? $meetinstrumenten = $_POST['onderwijs-meetinstrumenten'] : "";
                isset($_POST['onderwijs-middelbre']) ? $middelbare = $_POST['onderwijs-middelbre'] : "";
                isset($_POST['onderwijs-schoolgebouw']) ? $scjool_gebouw = $_POST['onderwijs-schoolgebouw'] : "";
                filter_input(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
                /** Hier maak ik de statement om dat te insrten in de database */
                $this->db->query('INSERT INTO fotozoeker.thema (id, educatie, Natuur, natuur_vogels,
                natuur_planten, natuur_bloemen, natuur_dieren, natuur_paddenstoelen, klimaat, energie,
                energie_zonnepanelen, energie_windmolens, energie_lampen, energie_koken, energie_isolatie, energie_elektriciteit,
                 lucht, omgeving, omgeving_lente, omgeving_zomer, omgeving_winter, omgeving_tuinieren, omgeving_stad,
                 omgeving_platteland, omgeving_herfst, omgeving_gebouwen, omgeving_dorp, onderwijs,
                 onderwijs_middelbre, onderwijs_meetinstrumenten, onderwijs_congressen, onderwijs_schoolgebouw,
                 onderwijs_basisschool, vervoer, voeding, water, woning, mensen,
                 mensen_sessies, mensen_klussen, mensen_kinderen, mensen_infomarkt, mensen_kantoor, mensen_jongeren, mensen_handen, mensen_leerlingen,
                img) VALUES (NULL, :educatie, :natuur, :vogels, :planten, :bloemen, :dieren, :paddenstoelen,
                :klimaat, :energie, :zonnepanelen, :windmolens, :lampen, :koken, :isolatie,
                :elektriciteit, :lucht, :omgeving,:lente, :zomer, :winter, :tuinieren,
                :stad, :platteland, :herfst, :gebouwen, :dorp, :onderwijs,
                :middelbare, :meetinstrumenten, :congressen, :schoolgebouw, :basisschool, :vervoer,
                :voeding, :water, :woning, :mensen,
                 :sessie, :klus, :kind, :infomarkt, :kantoor, :jongeren, :handen, :leerlingen, :code);');
                /**Bij de query zeg ik dat de values mag onder (:themanaam) en daarna vil ik die
                 * door $this->db->bind() functie
                 */
                $this->db->bind(':educatie', $educatie);
                $this->db->bind(':natuur', $natuur);
                $this->db->bind(':vogels', $vogels);
                $this->db->bind(':planten', $planten);
                $this->db->bind(':bloemen', $bloemen);
                $this->db->bind(':dieren', $dieren);
                $this->db->bind(':paddenstoelen', $paddenstoelen);
                $this->db->bind(':klimaat', $klimaat);
                $this->db->bind(':energie', $Energie);
                $this->db->bind(':zonnepanelen', $zonnepanelen);
                $this->db->bind(':windmolens', $windmolens);
                $this->db->bind(':lampen', $lampen);
                $this->db->bind(':koken', $koken);
                $this->db->bind(':isolatie', $isolatie);
                $this->db->bind(':elektriciteit', $elektriciteit);
                $this->db->bind(':lucht', $lucht);
                $this->db->bind(':omgeving', $omgeving);
                $this->db->bind(':lente', $lente);
                $this->db->bind(':zomer', $zomer);
                $this->db->bind(':winter', $winter);
                $this->db->bind(':tuinieren', $tuinieren);
                $this->db->bind(':stad', $stad);
                $this->db->bind(':platteland', $platteland);
                $this->db->bind(':herfst', $herfst);
                $this->db->bind(':gebouwen', $gebouwen);
                $this->db->bind(':dorp', $dorp);
                $this->db->bind(':onderwijs', $onderwijs);
                $this->db->bind(':meetinstrumenten', $meetinstrumenten);
                $this->db->bind(':congressen', $congressen);
                $this->db->bind(':schoolgebouw', $scjool_gebouw);
                $this->db->bind(':basisschool', $basisschool);
                $this->db->bind(':middelbare', $middelbare);
                $this->db->bind(':vervoer', $vervoer);
                $this->db->bind(':voeding', $voeding);
                $this->db->bind(':water', $water);
                $this->db->bind(':woning', $woning);
                $this->db->bind(':mensen', $mensen);
                $this->db->bind(':sessie', $sessies);
                $this->db->bind(':klus', $klussen);
                $this->db->bind(':kind', $kinderen);
                $this->db->bind(':infomarkt', $infomarkt);
                $this->db->bind(':kantoor', $kantoor);
                $this->db->bind(':jongeren', $jongeren);
                $this->db->bind(':handen', $handen);
                $this->db->bind(':leerlingen', $sub_leerlingen);
                $this->db->bind(':code', $this->code);

                $result = $this->db->execute();
            } catch (PDOException $e) {
                print_r('Error: ' . $e->getMessage());
            }
        }
    }
    public function getFotos()
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case "POST":
                if ($_POST['foto_naam'] !== "") {
                    $img_name = $_POST['foto_naam'];
                    try {
                        $this->db->query('SELECT imgtabel.id, thema.educatie, thema.Natuur,
                        thema.`natuur_vogels`, thema.`natuur_planten`, thema.`natuur_bloemen`,
                        thema.natuur_dieren, thema.natuur_paddenstoelen,  thema.klimaat, thema.energie, thema.energie_zonnepanelen, thema.energie_windmolens,
                        thema.energie_lampen, thema.energie_koken, thema.energie_isolatie,
                         thema.energie_elektriciteit, thema.lucht, thema.omgeving,
                         thema.omgeving_lente, thema.omgeving_zomer, thema.omgeving_winter, thema.omgeving_tuinieren,
                         thema.omgeving_stad, thema.omgeving_platteland, thema.omgeving_herfst, thema.omgeving_gebouwen,
                         thema.omgeving_dorp, thema.onderwijs,
                         thema.onderwijs_middelbre, thema.onderwijs_meetinstrumenten, thema.onderwijs_congressen,
                         thema.onderwijs_schoolgebouw, onderwijs_basisschool,
                        thema.vervoer, thema.voeding, thema.water, thema.woning,
                        thema.mensen, thema.mensen_sessies, thema.mensen_klussen, thema.mensen_kinderen,
                        thema.mensen_infomarkt, thema.mensen_kantoor, thema.mensen_jongeren, mensen_handen,
                        thema.mensen_leerlingen, imgtabel.img, imgtabel.code, imgtabel.beschrijven FROM img as 
                                            imgtabel INNER JOIN thema ON imgtabel.code = thema.img
                        WHERE imgtabel.img LIKE :img');
                        $this->db->bind(":img", "%$img_name%");
                        $get_result = $this->db->resultSet();
                    } catch (PDOException $e) {
                        print_r('Error: ' . $e->getMessage());
                    }
                    if ($get_result == false) {
                        require_once('includes/empty.php');
                    }
                    foreach ($get_result as $result) {
                        /** Alles wat heb ik geselecteerd vanuit de database zit ik in mijn gemaakte fucntie
                         * om de juiste thema en subthema namen weer te geven
                         */
                        $thema = $this->themaName([
                            "thema-1" => $result->Natuur,
                            "thema-2" => $result->educatie,
                            "thema-3" => $result->klimaat,
                            "thema-4" => $result->energie,
                            "thema-5" => $result->lucht,
                            "thema-6" => $result->omgeving,
                            "thema-7" => $result->onderwijs,
                            "thema-8" => $result->vervoer,
                            "thema-9" => $result->voeding,
                            "thema-10" => $result->water,
                            "thema-11" => $result->woning,
                            "thema-12" => $result->mensen,
                            "subthema-1" => $result->natuur_vogels,
                            "subthema-2" => $result->natuur_planten,
                            "subthema-3" => $result->natuur_bloemen,
                            "subthema-4" => $result->natuur_dieren,
                            "subthema-5" => $result->natuur_paddenstoelen,
                            "subthema-6" => $result->energie_zonnepanelen,
                            "subthema-7" => $result->energie_windmolens,
                            "subthema-8" => $result->energie_lampen,
                            "subthema-9" => $result->energie_koken,
                            "subthema-10" => $result->energie_isolatie,
                            "subthema-11" => $result->energie_elektriciteit,
                            "subthema-12" => $result->mensen_sessies,
                            "subthema-13" => $result->mensen_klussen,
                            "subthema-14" => $result->mensen_kinderen,
                            "subthema-15" => $result->mensen_infomarkt,
                            "subthema-16" => $result->mensen_kantoor,
                            "subthema-17" => $result->mensen_jongeren,
                            "subthema-18" => $result->mensen_handen,
                            "subthema-19" => $result->mensen_leerlingen,
                            "subthema-20" => $result->omgeving_lente,
                            "subthema-21" => $result->omgeving_zomer,
                            "subthema-22" => $result->omgeving_winter,
                            "subthema-23" => $result->omgeving_tuinieren,
                            "subthema-24" => $result->omgeving_stad,
                            "subthema-25" => $result->omgeving_platteland,
                            "subthema-26" => $result->omgeving_herfst,
                            "subthema-27" => $result->omgeving_gebouwen,
                            "subthema-28" => $result->omgeving_dorp,
                            "subthema-29" => $result->onderwijs_middelbre,
                            "subthema-30" => $result->onderwijs_meetinstrumenten,
                            "subthema-31" => $result->onderwijs_congressen,
                            "subthema-32" => $result->onderwijs_schoolgebouw,
                            "subthema-33" => $result->onderwijs_basisschool,
                        ]);


                        echo "<div class='card'>
                        <a id='verwijder-kop' href='index.php?id=" . $result->id . "&img=" . $result->code . "'>Verwijderen</a>                                <div class='img'>
                                    <img alt='img is niet gevonden' src='/upload-images/" . $result->img . $result->code . ".jpg'>
                                </div>
                                <div class='adres'>
                                    <h3>naam: <span>" . $result->img . "</span></h3>
                                </div>
                                $thema
                                <a href='" . URLROOT . "/read.php?img=" . $result->img . "&code=" . $result->code . "' class='info'>Meer informatie <i class='fa-sharp fa-solid fa-circle-info'></i></a>
                            </div>";
                    }
                }
                /** Om de filter functie te laten werken check als eerst of de input is wel gevonden
                 * Als dat wel van toepassing zijn dan zit ik de variable in de fucntie filterThema() 
                 */
                if (isset($_POST['natuur']) && !isset($_POST['educatie']) && $_POST['foto_naam'] == "") {
                    $this->filterThema($_POST['natuur']);
                }
                if (isset($_POST['educatie']) && !isset($_POST['natuur'])  && $_POST['foto_naam'] == "") {
                    $this->filterThema($_POST['educatie']);
                }
                if (isset($_POST['klimaat']) && $_POST['foto_naam'] == "") {
                    $this->filterThema($_POST['klimaat']);
                }
                if (isset($_POST['energie']) && $_POST['foto_naam'] == "") {
                    $this->filterThema($_POST['energie']);
                }
                if (isset($_POST['lucht']) && $_POST['foto_naam'] == "") {
                    $this->filterThema($_POST['lucht']);
                }
                if (isset($_POST['omgeving']) && $_POST['foto_naam'] == "") {
                    $this->filterThema($_POST['omgeving']);
                }
                if (isset($_POST['onderwijs']) && $_POST['foto_naam'] == "") {
                    $this->filterThema($_POST['onderwijs']);
                }
                if (isset($_POST['vervoer']) && $_POST['foto_naam'] == "") {
                    $this->filterThema($_POST['vervoer']);
                }
                if (isset($_POST['voeding']) && $_POST['foto_naam'] == "") {
                    $this->filterThema($_POST['voeding']);
                }
                if (isset($_POST['water']) && $_POST['foto_naam'] == "") {
                    $this->filterThema($_POST['water']);
                }
                if (isset($_POST['woning']) && $_POST['foto_naam'] == "") {
                    $this->filterThema($_POST['woning']);
                }
                if (isset($_POST['mensen']) && $_POST['foto_naam'] == "") {
                    $this->filterThema($_POST['mensen']);
                }
                if (isset($_POST['mensen']) && $_POST['foto_naam'] == "") {
                    $this->filterThema($_POST['mensen']);
                }

                if (isset($_POST['natuur']) && isset($_POST['educatie']) && $_POST['foto_naam'] == "") {
                    $this->multiFilter([
                        'input-1' => $_POST['natuur'],
                        'input-2' => $_POST['educatie']
                    ]);
                }
                break;
            case "GET":
                if (isset($_GET['subthema'])) {
                    $this->filterThema($_GET['subthema']);
                } else {
                    try {
                        $this->db->query('SELECT imgtabel.id, thema.educatie, thema.Natuur,
                        thema.`natuur_vogels`, thema.`natuur_planten`, thema.`natuur_bloemen`,
                        thema.natuur_dieren, thema.natuur_paddenstoelen,  thema.klimaat, thema.energie, thema.energie_zonnepanelen, thema.energie_windmolens,
                        thema.energie_lampen, thema.energie_koken, thema.energie_isolatie,
                         thema.energie_elektriciteit, thema.lucht, thema.omgeving,
                         thema.omgeving_lente, thema.omgeving_zomer, thema.omgeving_winter, thema.omgeving_tuinieren,
                         thema.omgeving_stad, thema.omgeving_platteland, thema.omgeving_herfst, thema.omgeving_gebouwen,
                         thema.omgeving_dorp, thema.onderwijs,
                         thema.onderwijs_middelbre, thema.onderwijs_meetinstrumenten, thema.onderwijs_congressen,
                         thema.onderwijs_schoolgebouw, onderwijs_basisschool,
                        thema.vervoer, thema.voeding, thema.water, thema.woning,
                        thema.mensen, thema.mensen_sessies, thema.mensen_klussen, thema.mensen_kinderen,
                        thema.mensen_infomarkt, thema.mensen_kantoor, thema.mensen_jongeren, mensen_handen,
                        thema.mensen_leerlingen, imgtabel.img, imgtabel.code, imgtabel.beschrijven FROM img as 
                                            imgtabel INNER JOIN thema ON imgtabel.code = thema.img');
                        $get_result = $this->db->resultSet();
                    } catch (PDOException $e) {
                        print_r('Error: ' . $e->getMessage());
                    }
                    if ($get_result == false) {
                        require_once('includes/empty.php');
                    }
                    foreach ($get_result as $result) {
                        $thema = $this->themaName([
                            "thema-1" => $result->Natuur,
                            "thema-2" => $result->educatie,
                            "thema-3" => $result->klimaat,
                            "thema-4" => $result->energie,
                            "thema-5" => $result->lucht,
                            "thema-6" => $result->omgeving,
                            "thema-7" => $result->onderwijs,
                            "thema-8" => $result->vervoer,
                            "thema-9" => $result->voeding,
                            "thema-10" => $result->water,
                            "thema-11" => $result->woning,
                            "thema-12" => $result->mensen,
                            "subthema-1" => $result->natuur_vogels,
                            "subthema-2" => $result->natuur_planten,
                            "subthema-3" => $result->natuur_bloemen,
                            "subthema-4" => $result->natuur_dieren,
                            "subthema-5" => $result->natuur_paddenstoelen,
                            "subthema-6" => $result->energie_zonnepanelen,
                            "subthema-7" => $result->energie_windmolens,
                            "subthema-8" => $result->energie_lampen,
                            "subthema-9" => $result->energie_koken,
                            "subthema-10" => $result->energie_isolatie,
                            "subthema-11" => $result->energie_elektriciteit,
                            "subthema-12" => $result->mensen_sessies,
                            "subthema-13" => $result->mensen_klussen,
                            "subthema-14" => $result->mensen_kinderen,
                            "subthema-15" => $result->mensen_infomarkt,
                            "subthema-16" => $result->mensen_kantoor,
                            "subthema-17" => $result->mensen_jongeren,
                            "subthema-18" => $result->mensen_handen,
                            "subthema-19" => $result->mensen_leerlingen,
                            "subthema-20" => $result->omgeving_lente,
                            "subthema-21" => $result->omgeving_zomer,
                            "subthema-22" => $result->omgeving_winter,
                            "subthema-23" => $result->omgeving_tuinieren,
                            "subthema-24" => $result->omgeving_stad,
                            "subthema-25" => $result->omgeving_platteland,
                            "subthema-26" => $result->omgeving_herfst,
                            "subthema-27" => $result->omgeving_gebouwen,
                            "subthema-28" => $result->omgeving_dorp,
                            "subthema-29" => $result->onderwijs_middelbre,
                            "subthema-30" => $result->onderwijs_meetinstrumenten,
                            "subthema-31" => $result->onderwijs_congressen,
                            "subthema-32" => $result->onderwijs_schoolgebouw,
                            "subthema-33" => $result->onderwijs_basisschool,
                        ]);
                        echo "<div class='card'>
                        <a id='verwijder-kop' href='index.php?id=" . $result->id . "&img=" . $result->code . "'>Verwijderen</a>
                                <div class='img'>
                                    <img alt='img is niet gevonden' src='/upload-images/" . $result->img . $result->code . ".jpg'>
                                </div>
                                <div class='adres'>
                                    <h3>naam: <span>" . $result->img . "</span></h3>
                                </div>
                                " . $thema . "
                                <a href='" . URLROOT . "/read.php?img=" . $result->img . "&code=" . $result->code . "' class='info'>Meer informatie <i class='fa-sharp fa-solid fa-circle-info'></i></a>
                            </div>";
                    }
                }
                break;
        }
    }

    public function fotoInformation()
    {
        try {
            $img = $_GET['img'];
            $code = $_GET['code'];
            $filename = './upload-images/' . $_GET['img'] . $_GET['code'] . '.jpg';
            $size = getimagesize($filename);
            $pixels = number_format($size[0] * $size[1], 0) . ' pixels';
            $filesize = filesize($filename);
            $filesize = round($filesize / 1024, 2) . ' KiloBytes';
            $this->db->query("SELECT imgtabel.id, thema.educatie, thema.Natuur,
            thema.`natuur_vogels`, thema.`natuur_planten`, thema.`natuur_bloemen`,
            thema.natuur_dieren, thema.natuur_paddenstoelen,  thema.klimaat, thema.energie, thema.energie_zonnepanelen, thema.energie_windmolens,
            thema.energie_lampen, thema.energie_koken, thema.energie_isolatie,
             thema.energie_elektriciteit, thema.lucht, thema.omgeving,
             thema.omgeving_lente, thema.omgeving_zomer, thema.omgeving_winter, thema.omgeving_tuinieren,
             thema.omgeving_stad, thema.omgeving_platteland, thema.omgeving_herfst, thema.omgeving_gebouwen,
             thema.omgeving_dorp, thema.onderwijs,
             thema.onderwijs_middelbre, thema.onderwijs_meetinstrumenten, thema.onderwijs_congressen,
             thema.onderwijs_schoolgebouw, onderwijs_basisschool,
            thema.vervoer, thema.voeding, thema.water, thema.woning,
            thema.mensen, thema.mensen_sessies, thema.mensen_klussen, thema.mensen_kinderen,
            thema.mensen_infomarkt, thema.mensen_kantoor, thema.mensen_jongeren, mensen_handen,
            thema.mensen_leerlingen, imgtabel.img, imgtabel.code, imgtabel.beschrijven FROM img as 
                                imgtabel INNER JOIN thema ON imgtabel.code = thema.img
            WHERE imgtabel.code = :code");
            $this->db->bind(":code", $code);
            $get_result = $this->db->single();
            $thema = $this->themaName([
                "thema-1" => $get_result->Natuur,
                "thema-2" => $get_result->educatie,
                "thema-3" => $get_result->klimaat,
                "thema-4" => $get_result->energie,
                "thema-5" => $get_result->lucht,
                "thema-6" => $get_result->omgeving,
                "thema-7" => $get_result->onderwijs,
                "thema-8" => $get_result->vervoer,
                "thema-9" => $get_result->voeding,
                "thema-10" => $get_result->water,
                "thema-11" => $get_result->woning,
                "thema-12" => $get_result->mensen,
                "subthema-1" => $get_result->natuur_vogels,
                "subthema-2" => $get_result->natuur_planten,
                "subthema-3" => $get_result->natuur_bloemen,
                "subthema-4" => $get_result->natuur_dieren,
                "subthema-5" => $get_result->natuur_paddenstoelen,
                "subthema-6" => $get_result->energie_zonnepanelen,
                "subthema-7" => $get_result->energie_windmolens,
                "subthema-8" => $get_result->energie_lampen,
                "subthema-9" => $get_result->energie_koken,
                "subthema-10" => $get_result->energie_isolatie,
                "subthema-11" => $get_result->energie_elektriciteit,
                "subthema-12" => $get_result->mensen_sessies,
                "subthema-13" => $get_result->mensen_klussen,
                "subthema-14" => $get_result->mensen_kinderen,
                "subthema-15" => $get_result->mensen_infomarkt,
                "subthema-16" => $get_result->mensen_kantoor,
                "subthema-17" => $get_result->mensen_jongeren,
                "subthema-18" => $get_result->mensen_handen,
                "subthema-19" => $get_result->mensen_leerlingen,
                "subthema-20" => $get_result->omgeving_lente,
                "subthema-21" => $get_result->omgeving_zomer,
                "subthema-22" => $get_result->omgeving_winter,
                "subthema-23" => $get_result->omgeving_tuinieren,
                "subthema-24" => $get_result->omgeving_stad,
                "subthema-25" => $get_result->omgeving_platteland,
                "subthema-26" => $get_result->omgeving_herfst,
                "subthema-27" => $get_result->omgeving_gebouwen,
                "subthema-28" => $get_result->omgeving_dorp,
                "subthema-29" => $get_result->onderwijs_middelbre,
                "subthema-30" => $get_result->onderwijs_meetinstrumenten,
                "subthema-31" => $get_result->onderwijs_congressen,
                "subthema-32" => $get_result->onderwijs_schoolgebouw,
                "subthema-33" => $get_result->onderwijs_basisschool,
            ]);
            echo ' <div class="left-col">
            <div class="header">
                <h1>Informatie</h1>
            </div>
            <ul class="info-list">
                <li>
                    <i class="fa-regular fa-file-signature"></i>
                    <h3>Image naam:<span>' . $get_result->img . '</span></h3>
                </li>
                <li>
                    <i class="fa-solid fa-audio-description"></i>
                    <h3>Image beschrijving:<span>' . $get_result->beschrijven . '</span></h3>
                </li>
                <li>
                    <i class="fa-sharp fa-solid fa-sitemap"></i>
                    <h3><span>' . $thema . '</span></h3>
                </li>
                <li>
                <i class="fa-solid fa-audio-description"></i>
                    <h3>Image size:<span>' . $size[3] . '</br> ' . $pixels . ' </br> ' . $filesize . '</span></h3>
                </li>
                <li>
                <i class="fa-solid fa-audio-description"></i>
                    <h3>Image type:<span>' . $size['mime'] . '</span></h3>
                </li>
            </ul>
        </div>
        <div class="right-col">
        <a href="index.php" class="terug">
        <i class="fa-solid fa-backward"></i>
        </a>
            <img src="/upload-images/' . $img . $code . '.jpg">
        </div>';
        } catch (PDOException $e) {
            print_r('Error: ' . $e->getMessage());
        }
    }
}
