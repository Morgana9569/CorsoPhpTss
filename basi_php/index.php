<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        $nome = "Mario";
        $eta = 50;
        $passatempi = array("tennis", "cinema", "lettura");
        
        function saluta($nome){
            return "Ciao io sono $nome, come va?"; //double quote
            // return 'Ciao io sono ${nome}, come va?' // template literal
        }

        echo "<h1> scrivo un contenuto sullo schermo </h1>"; //serve per stampare
        //Chiamo la funzione
        echo saluta("Gianni");
        echo "<p>" .saluta($nome). "</p>";
        echo "<div>" .saluta($nome). "</div>";


        /*
        Genera un errore perchè echo non può stampare array ma neanche oggetti.
        può visualizzare solo stringhe o numeri
        
        echo $passatempi; 
        */

        //passatempi.length
        echo "<ul>";
        for ($i=0; $i < count($passatempi); $i++) { 
            echo "<li>$passatempi[$i]</li>"; //$passatempi[0], $passatempi[1], $passatempi[2]
        }
        echo "</ul>";

        $frase = "ciao sono una frase";
        $frase .= "sono unal'tro pezzo della frase";

        /**
         * contatore = 0
         * contatore++;
         * contatore = contatore +4;
         * contatore+= 4
         */
    ?>

</body>
</html>