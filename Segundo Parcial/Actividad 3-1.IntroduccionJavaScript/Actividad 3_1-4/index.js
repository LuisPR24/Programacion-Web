var num1 = 5, num2 = 7, cadena="1001010";

console.log("Operadores aritmeticos");
console.log(num1 + num2);//Suma
console.log(num2 - num2);//Resta
console.log(num1 * num2);//Mutiplicacion
console.log(num2 / num1);//Divide
console.log(num2 % num1);//Residou

console.log(num1 + cadena);//Concatena
console.log(cadena + cadena);//Concatena




//Unario
console.log("Operador unario");
console.log(typeof(num1));
console.log(typeof(cadena));
console.log(typeof(true));


//Comparacion
console.log(num1===num2);//Retorna false
console.log(num1 !== num2);//Retornara true
console.log(num1 < num2);//Retornara true
console.log(num1 > num2);//Retornara false
console.log(num1 <= num2);//retornara true
console.log(num1 >= num2);//Retoenara fals



//Logicos
console.log("OPERADOR &&");
console.log(false && false);//false
console.log(false && false);//false
console.log(true && true);//true
console.log((7 > 5) && (5 > 7));//false
console.log((7 > 5)&&( 5 < 7));//true

console.log("OPERADOR ||");
console.log(false || true);//true
console.log(false || false);//false
console.log(true || true);//true
console.log((7 > 5) || (5 > 7));//true
console.log((7 > 5)||(5 < 7));//true

console.log("OPERADOR !");
console.log(!(7 > 5));//false
console.log(!(7<5));//true



//OPERADOR TERNARIO
console.log(true ? 2 : 1);
console.log(false ? 2 : 1);
