//Ciclo while
var num = 0;


while(num <= 100){
    console.log(num);
    num = num+2;
}



//Do while
var pago = 0;
var totalPago = 0;

do{
    pago = Number (prompt("Monto del pago: "));
    totalPago = totalPago + pago;
}while(pago);//Cualquier cantidad diferente de cero, sera false


alert("tu pago fue de: " + totalPago);




//For
for(var num = 0; num <=  100; num = num +2){
    console.log(num);
}