<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>

    <!-- Reikia is serverio puses net neatvaizduoti sios formos -->

    <?php if (!isset($_COOKIE["prisijungti"])) { ?>
        <form action="index.php" method="get">
            <input type="text" placeholder="Suveskite prisijungimo varda" name="vardas" />
            <input type="password" placeholder="Slaptazodis" name="slaptazodis" />
            <button type="submit" name="prisijungti">Prisijungti</button>
        </form>

    <?php } else ?>



    <?php

    // 3. Sukurkite du input laukelius. Vienas -  vardas, kitas - slaptažodis. 
    // Susikurkite registruotu vartotoju masyva(bent 10).
    //Registruotu vartotoju masyve suvesti teisiu duomenis.
    // 1 - administratorius
    // 2 - vartotojas
    // 3 - turinio redaguotojas 
    // Jei sugalvota kombinacija sutampa su tuo, 
    // kas įvesta į input laukelius.
    //*Jei duomenys yra įvesti teisingi, vartotojas nukreipiamas į failą - manopaskyra.php.
    //Kuriame mato pranesima, su "Sveikas atvykes" ir savo varda.
    //*Kitu atveju, vartotojas nukreipiamas į puslapį - 404.php
    // Svetaine turi atsiminti, kad vartotojas yra prisijunges(Cookies)
    // Taip pat manopaskyra.php turi buti mygtukas "Atsijungti".   

    if (isset($_GET["prisijungti"])) {

        //1 vartotojas turi varda, slaptazodi, teisiu duomenis
        $registruotiVartotojai = array(
            array(
                "vardas" => "admin",
                "slaptazodis" => "admin",
                "teises" => 1
            ),

            array(
                "vardas" => "admmmmin",
                "slaptazodis" => "admiin",
                "teises" => 1
            ),

            array(
                "vardas" => "admiiiiiiiiiiiin",
                "slaptazodis" => "admiiiin",
                "teises" => 3
            ),

            array(
                "vardas" => "aaaaaaaaadmin",
                "slaptazodis" => "addddddddddddmin",
                "teises" => 1
            ),

            array(
                "vardas" => "adminnnnnnnnnnn",
                "slaptazodis" => "admmmmmmmminnnnnnnnnnnnnnn",
                "teises" => 3
            ),

            array(
                "vardas" => "admimmmmmmmmnnnnnnnnnnn",
                "slaptazodis" => "admmmmmmmmmminnnnnnnnnnnnnnn",
                "teises" => 1
            ),

            array(
                "vardas" => "adminnnnnnnnnnn12345",
                "slaptazodis" => "adminnnnnnnnnnnnnnn",
                "teises" => 4
            ),

            array(
                "vardas" => "adminnnnnnnnnnn",
                "slaptazodis" => "adminnnnnnnnnnnnnnn1112",
                "teises" => 4
            ),

            array(
                "vardas" => "adminnnnnnnnnnn",
                "slaptazodis" => "adminnnnnnnnnnnnnnn",
                "teises" => 2
            ),

            array(
                "vardas" => "adddddddminnnnnnnnnnn",
                "slaptazodis" => "addddddddminnnnnnnnnnnnnnn",
                "teises" => 5
            ),

        );
    }

    if (isset($_GET["vardas"]) && !empty($_GET["vardas"]) && isset($_GET["slaptazodis"]) && !empty($_GET["slaptazodis"])) {

        $vardas = $_GET["vardas"];
        $slaptazodis = $_GET["slaptazodis"];




        foreach ($registruotiVartotojai as $elementas) {
            $teisingasDuomuo = false;
            $laikinasis_vardas = "";
            $laikinasis_teises = "";

            if ($vardas == $elementas["vardas"] && $slaptazodis == $elementas["slaptazodis"]) {
                $teisingasDuomuo = true;
                $laikinasis_vardas = $elementas["vardas"];
                $laikinasis_teises = $elementas["teises"];
                break;
            }
        }

        if ($teisingasDuomuo) {
            echo "Sveikas atvykes, " . $laikinasis_vardas . " " . $laikinasis_teises;
            setcookie("prisijungti", $laikinasis_vardas, time() + 3600 * 24, "/");
            setcookie("teises", $laikinasis_teises, time() + 3600 * 24, "/");
            header("Location: manopaskyra.php");
        } else {
            echo "Bandykite jungtis is naujo";
        }
    } else {
        echo "Laukeliai tusti";
    }




    ?>
</body>

</html>