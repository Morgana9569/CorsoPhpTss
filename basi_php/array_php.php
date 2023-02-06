<?php

$nome = "Mario";
// echo "\tciao $nome\n";
// echo 'ciao $nome';

// # Index Array
// //&colori = array();
// $colori =["green","red", "blue"];
// echo "\n\n" .$colori[2]. "\n" ;

// # Associative Array 
// $persona = [
//     "nome" => "Mario",
//     "cognome" => "Rossi",
//     "email" => "a@b.it"
// ];

// //serve come il console log in javascript, dice cosa c'è dentro
// print_r($persona);
// //serve per vedere il contenuto della variabile ma più specifico di print_r
// //var_dump($persona);

// /**Da errore Array to string conversion */
// //echo $persona;

// echo $persona["email"];

$classe = array(
    [
        "nome" => "Mario",
        "cognome" => "Rossi",
        "email" => "a@b.it"
    ],
    [
        "nome" => "Giovanni",
        "cognome" => "Verdi",
        "email" => "c@b.it"
    ]
);
// print_r($classe[1]["nome"]."\n");


#imperativo

echo "For Loop\n";
echo "\n";

for ($i=0; $i < count($classe); $i++) { 
    $allievo = $classe[$i];
    echo $allievo['nome']."\n";
};

echo "\n";
echo "------------------\n";
echo "\n";

echo "Foreach Loop\n";
echo "\n";

foreach ($classe as $i => $allievo) {
    echo ($i+1). ") " .$allievo["nome"];
    echo "\n";
};
echo "\n";

echo "------------------\n";
echo "\n";

#dichiarativo/funzionale
echo "map di un array";
echo "\n";

function stampaNome($allievo){
    echo $allievo["nome"]."\n";
};

echo "\n";

array_map("stampaNome", $classe);
