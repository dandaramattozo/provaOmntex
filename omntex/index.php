<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>

<h1>Teste OMNTEX PHP</h1>

<form method="post" action="">
    <label for="sequence">Digite a entrada: </label>
    <input type="text" name="sequence" id="sequence">
    <button type="submit">Testar</button>
</form>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém a sequência de parênteses do formulário
    $inputSequence = $_POST["sequence"];

    // Testa a sequência de parênteses
    echo isValidBrackets($inputSequence) ? "A sequência é válida\n" : "A sequência não é válida\n";
}



function isValidBrackets($sequence) {
    $stack = [];

    $bracketPairs = [
        ')' => '(',
        '}' => '{',
        ']' => '[',
    ];

    for ($i = 0; $i < strlen($sequence); $i++) {
        $char = $sequence[$i];

        if (in_array($char, ['(', '{', '['])) {
            array_push($stack, $char);
        } elseif (in_array($char, [')', '}', ']'])) {
            if (empty($stack) || $stack[count($stack) - 1] != $bracketPairs[$char]) {
                return false;
            }
            array_pop($stack);
        }
    }

    return empty($stack);
}

?>
    
</body>
</html>
