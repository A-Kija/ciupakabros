console.log('Hello');

function getRandomIntInclusive(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1) + min);
}

// Math.floor(Math.random() * 11 + 1);

const arr = [];

for (let i = 0; i < 10; i++) {
    arr.push(getRandomIntInclusive(1, 11));
}


const arr2 = [...Array(10)].map(_ => Math.floor(Math.random() * 11 + 1));

/* 

number
string
boolen
object

*/

let a = '1';

// a++; // auto konvertavimas
// a--;

a = +a;

console.log(a + 1);

console.log(arr2);


console.log(typeof a);

console.clear();

// undefined, null, NaN, 0, "" (empty string), and false of course.

if (0) {
    console.log('Yes');
} else {
    console.log('No');
}