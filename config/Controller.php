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
        error_reporting (E_ALL ^ E_NOTICE);
    }

    private function filterThema($statement)
    {
        try {
            $this->db->query("SELECT imgtabel.id, thema.educatie, thema.Natuur,
            thema.`natuur_bossen`, thema.`natuur_sluis`, thema.`natuur_bergen`, 
            thema.klimaat, thema.energie, thema.leerlingen,
            thema.lucht, thema.omgeving, thema.onderwijs, thema.vervoer, 
            thema.voeding, thema.water, thema.woning,
            imgtabel.img, imgtabel.code, imgtabel.beschrijven FROM img as 
                                imgtabel INNER JOIN thema ON imgtabel.code = thema.img
            WHERE thema.$statement = 1");
            $get_result = $this->db->resultSet();
        } catch (PDOException $e) {
            print_r('Error: ' . $e->getMessage());
        }
        if($get_result == false){
            require_once('includes/empty.php');
        }
        foreach ($get_result as $result) {
            $thema  = $this->themaName([
                "thema-1" => $result->Natuur,
                "thema-2" => $result->educatie,
                "thema-3" => $result->klimaat,
                "thema-4" => $result->energie,
                "thema-5" => $result->leerlingen,
                "thema-6" => $result->lucht,
                "thema-7" => $result->omgeving,
                "thema-8" => $result->onderwijs,
                "thema-9" => $result->vervoer,
                "thema-10" => $result->voeding,
                "thema-11" => $result->water,
                "thema-12" => $result->woning,
                "subthema-1" => $result->natuur_bossen,
                "subthema-2" => $result->natuur_sluis,
                "subthema-3" => $result->natuur_bergen,
            ]);

            echo "<div class='card'>
            <a id='verwijder-kop' href='index.php?id=" . $result->id . "&img=" . $result->img . "" . $result->code . ".jpg'>Verwijderen</a>
                    <div class='img'>
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

        

        $thema_1 == 1 ? $thema_1  = "Natuur" : "";
        $thema_2 == 1 ? $thema_2 = " Educatie" : "";
        $thema_3 == 1 ? $thema_3 = " Klimaat" : "";
        $thema_4 == 1 ?  $thema_4 = " Energie" : "";
        $thema_5 == 1 ? $thema_5 = " Leerlingen" : "";
        $thema_6 == 1 ? $thema_6 = " Lucht" : "";
        $thema_7 == 1 ? $thema_7 = " Omgeving" : "";
        $thema_8 == 1 ? $thema_8 = " Onderwijs" : "";
        $thema_9 == 1 ? $thema_9 = " Vervoer" : "";
        $thema_10 == 1 ? $thema_10 = " Voeding" : "";
        $thema_11 == 1 ? $thema_11 = " Water" : "";
        $thema_12 == 1 ? $thema_12 = " Woning" : "";
        $subthema1 == 1 ? $subthema1  = "Bossen": "";
        $subthema2 == 1 ? $subthema2  = " Sluis": "";
        $subthema3 == 1 ? $subthema3  = " Bergen": "";
        $ar = [];
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
            $subthema3
        );
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
            $ar[11] ."</span></h3>
    </div>
    <div class='thema' id='subthema-row'>
        <h3>subthema: <span>". $ar[12] .
                            $ar[13] .
                            $ar[14] ."</span></h3>
    </div>
    </div>
    ";
    }

    private function multiFilter($data = [])
    {
        $input1 = $data['input-1'];
        $input2 = $data['input-2'];
        try {
            $this->db->query("SELECT imgtabel.id, thema.educatie, thema.Natuur, thema.klimaat, thema.energie, thema.leerlingen, imgtabel.img, imgtabel.code, imgtabel.beschrijven FROM img as 
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
            <a id='verwijder-kop' href='index.php?id=" . $result->id . "&img=" . $result->img . "" . $result->code . ".jpg'>Verwijderen</a>
                    <div class='img'>
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
                            <a href="index.php?id=' . $id . '&actie=verwijderen">Verwijderen</a>
                        </div>
                    </div>
                </div>
            </div>';
                if (isset($_GET['id']) && isset($_GET['actie'])) {
                    try {
                        $this->db->query('DELETE FROM thema where id = :id');
                        $this->db->bind(':id', $id);
                        $result = $this->db->execute();
                        unlink("upload-images/" . $img . "");
                    } catch (PDOException $e) {
                        print_r('Errror: ' . $e->getMessage());
                    }
                    if ($result == true) {
                        try {
                            $this->db->query('DELETE FROM img where id = :id');
                            $this->db->bind(':id', $id);
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
                isset($_POST['Natuur']) ? $natuur = $_POST['Natuur'] : "";
                isset($_POST['educatie']) ? $educatie = $_POST['educatie'] : "";
                isset($_POST['klimaat']) ? $klimaat = $_POST['klimaat'] : "";
                isset($_POST['energie']) ? $Energie = $_POST['energie'] : "";
                isset($_POST['leerlingen']) ? $Leerlingen = $_POST['leerlingen'] : "";
                isset($_POST['lucht']) ? $lucht = $_POST['lucht'] : "";
                isset($_POST['omgeving']) ? $omgeving = $_POST['omgeving'] : "";
                isset($_POST['onderwijs']) ? $onderwijs = $_POST['onderwijs'] : "";
                isset($_POST['vervoer']) ? $vervoer = $_POST['vervoer'] : "";
                isset($_POST['voeding']) ? $voeding = $_POST['voeding'] : "";
                isset($_POST['water']) ? $water = $_POST['water'] : "";
                isset($_POST['woning']) ? $woning = $_POST['woning'] : "";
                isset($_POST['natuur-bergen']) ? $bergen = $_POST['natuur-bergen'] : "";
                isset($_POST['natuur-sluis']) ? $sluis = $_POST['natuur-sluis'] : "";
                isset($_POST['natuur-bossen']) ? $bossen = $_POST['natuur-bossen'] : "";
                filter_input(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
                $this->db->query('INSERT INTO fotozoeker.thema (id, educatie, Natuur, natuur_bossen, natuur_sluis, natuur_bergen, klimaat, energie, leerlingen, lucht, omgeving, onderwijs, vervoer, voeding, water, woning, img)
                VALUES (NULL, :educatie, :natuur, :bossen, :sluis, :bergen, :klimaat, :energie, :leerlingen, :lucht, :omgeving, :onderwijs, :vervoer, :voeding, :water, :woning, :code);');
                // $this->db->query('INSERT INTO fotozoeker.thema (id, educatie, Natuur, `natuur_bossen`, `natuur_sluis`, `natuur_bergen`, klimaat, energie, leerlingen, lucht, omgeving, onderwijs, vervoer, voeding, water, woning, img) 
                // VALUES (NULL, :educatie, :natuur, :bergen, :sluis, :bossen, :klimaat, :energie, :leerlingen, :lucht, :omgeving, :onderwijs, :vervoer, :voeding, :water, :woning, :code);');
                $this->db->bind(':educatie', $educatie);
                $this->db->bind(':natuur', $natuur);
                $this->db->bind(':bergen', $bergen);
                $this->db->bind(':sluis', $sluis);
                $this->db->bind(':bossen', $bossen);
                $this->db->bind(':klimaat', $klimaat);
                $this->db->bind(':energie', $Energie);
                $this->db->bind(':leerlingen', $Leerlingen);
                $this->db->bind(':lucht', $lucht);
                $this->db->bind(':omgeving', $omgeving);
                $this->db->bind(':onderwijs', $onderwijs);
                $this->db->bind(':vervoer', $vervoer);
                $this->db->bind(':voeding', $voeding);
                $this->db->bind(':water', $water);
                $this->db->bind(':woning', $woning);
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
                        thema.`natuur_bossen`, thema.`natuur_sluis`, thema.`natuur_bergen`, 
                        thema.klimaat, thema.energie, thema.leerlingen,
                        thema.lucht, thema.omgeving, thema.onderwijs, thema.vervoer, 
                        thema.voeding, thema.water, thema.woning,
                        imgtabel.img, imgtabel.code, imgtabel.beschrijven FROM img as 
                                            imgtabel INNER JOIN thema ON imgtabel.code = thema.img
                        WHERE imgtabel.img LIKE :img');
                        $this->db->bind(":img", "%$img_name%");
                        $get_result = $this->db->resultSet();
                    } catch (PDOException $e) {
                        print_r('Error: ' . $e->getMessage());
                    }
                    if($get_result == false){
                       require_once('includes/empty.php');
                    }
                    foreach ($get_result as $result) {
                        $thema = $this->themaName([
                            "thema-1" => $result->Natuur,
                            "thema-2" => $result->educatie,
                            "thema-3" => $result->klimaat,
                            "thema-4" => $result->energie,
                            "thema-5" => $result->leerlingen,
                            "thema-6" => $result->lucht,
                            "thema-7" => $result->omgeving,
                            "thema-8" => $result->onderwijs,
                            "thema-9" => $result->vervoer,
                            "thema-10" => $result->voeding,
                            "thema-11" => $result->water,
                            "thema-12" => $result->woning,
                            "subthema-1" => $result->natuur_bossen,
                            "subthema-2" => $result->natuur_sluis,
                            "subthema-3" => $result->natuur_bergen,
                        ]);


                        echo "<div class='card'>
                        <a id='verwijder-kop' href='index.php?id=" . $result->id . "&img=" . $result->img . "" . $result->code . ".jpg'>Verwijderen</a>
                                <div class='img'>
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
                if (isset($_POST['leerlingen']) && $_POST['foto_naam'] == "") {
                    $this->filterThema($_POST['leerlingen']);
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

                if (isset($_POST['natuur']) && isset($_POST['educatie']) && $_POST['foto_naam'] == "") {
                    $this->multiFilter([
                        'input-1' => $_POST['natuur'],
                        'input-2' => $_POST['educatie']
                    ]);
                }
                break;
            case "GET":
                if(isset($_GET['subthema'])){
                   $this->filterThema($_GET['subthema']);
                }else{
                    try {
                        $this->db->query('SELECT imgtabel.id, thema.educatie, thema.Natuur,
                        thema.`natuur_bossen`, thema.`natuur_sluis`, thema.`natuur_bergen`, 
                        thema.klimaat, thema.energie, thema.leerlingen,
                        thema.lucht, thema.omgeving, thema.onderwijs, thema.vervoer, 
                        thema.voeding, thema.water, thema.woning,
                        imgtabel.img, imgtabel.code, imgtabel.beschrijven FROM img as 
                                            imgtabel INNER JOIN thema ON imgtabel.code = thema.img');
                        $get_result = $this->db->resultSet();
                    } catch (PDOException $e) {
                        print_r('Error: ' . $e->getMessage());
                    }
                    if($get_result == false){
                        require_once('includes/empty.php');
                    }
                    foreach ($get_result as $result) {
                        $thema = $this->themaName([
                            "thema-1" => $result->Natuur,
                            "thema-2" => $result->educatie,
                            "thema-3" => $result->klimaat,
                            "thema-4" => $result->energie,
                            "thema-5" => $result->leerlingen,
                            "thema-6" => $result->lucht,
                            "thema-7" => $result->omgeving,
                            "thema-8" => $result->onderwijs,
                            "thema-9" => $result->vervoer,
                            "thema-10" => $result->voeding,
                            "thema-11" => $result->water,
                            "thema-12" => $result->woning,
                            "subthema-1" => $result->natuur_bossen,
                            "subthema-2" => $result->natuur_sluis,
                            "subthema-3" => $result->natuur_bergen,
                        ]);
                        echo "<div class='card'>
                        <a id='verwijder-kop' href='index.php?id=" . $result->id . "&img=" . $result->img . "" . $result->code . ".jpg'>Verwijderen</a>
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
            thema.`natuur_bossen`, thema.`natuur_sluis`, thema.`natuur_bergen`, 
            thema.klimaat, thema.energie, thema.leerlingen,
            thema.lucht, thema.omgeving, thema.onderwijs, thema.vervoer, 
            thema.voeding, thema.water, thema.woning,
            imgtabel.img, imgtabel.code, imgtabel.beschrijven FROM img as 
            imgtabel INNER JOIN thema ON imgtabel.code = thema.img
            WHERE imgtabel.code = :code");
            $this->db->bind(":code", $code);
            $get_result = $this->db->single();
            $thema = $this->themaName([
                "thema-1" => $get_result->Natuur,
                "thema-2" => $get_result->educatie,
                "thema-3" => $get_result->klimaat,
                "thema-4" => $get_result->energie,
                "thema-5" => $get_result->leerlingen,
                "thema-6" => $get_result->lucht,
                "thema-7" => $get_result->omgeving,
                "thema-8" => $get_result->onderwijs,
                "thema-9" => $get_result->vervoer,
                "thema-10" => $get_result->voeding,
                "thema-11" => $get_result->water,
                "thema-12" => $get_result->woning,
                "subthema-1" => $get_result->natuur_bossen,
                "subthema-2" => $get_result->natuur_sluis,
                "subthema-3" => $get_result->natuur_bergen,
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
