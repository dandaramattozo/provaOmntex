function isValidBrackets(sequence) {
    const stack = [];
    const bracketPairs = {
        ')': '(',
        '}': '{',
        ']': '[',
    };

    for (let i = 0; i < sequence.length; i++) {
        const char = sequence[i];

        if (['(', '{', '['].includes(char)) {
            stack.push(char);
        } else if ([')', '}', ']'].includes(char)) {
            if (stack.length === 0 || stack[stack.length - 1] !== bracketPairs[char]) {
                return false;
            }
            stack.pop();
        }
    }

    return stack.length === 0;
}

function testarSequencia() {
    const inputSequence = document.getElementById("sequence").value;
    const resultado = isValidBrackets(inputSequence);

    alert(resultado ? "A sequência é válida" : "A sequência não é válida");
}