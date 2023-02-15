console.log('Hello 002');

// deklaracija
const hello = function(param, a) {
    // console.log('Hello Fun');
    return param + ' *** ' + a;
}


console.log('code');


// vykdymas
const hello2 = hello('racoon');
// hello();
// hello();
console.log(hello2);

const param = 'fox'

console.log(hello('beaver', param))

// hello2();

console.clear();

function fancy0() {
    return 'Fancy0';
}

const fancy = function() {
    return 'Fancy';
}

const fancy1 = () => {
    return 'Fancy1';
}

const fancy2 = () => 'Fancy2';


const fancy3 = a => 'Fancy' + a;


console.log(fancy0());
console.log(fancy());
console.log(fancy1());
console.log(fancy2());
console.log(fancy3(3));

console.clear();


const fun = (fn) => {
    const result = fn();
    return result;
}


const miau = () => {
    return 'Miau miau';
}

const colors = [
    'pink',
    'crimson',
    'skyblue',
    'coral'
];

const animals = [
    'racoon',
    'fox',
    'beaver',
    'wolf'
]

const print = what => {
    console.log('*** ' + what + ' ***');
}


// for (let i = 0; i < colors.length; i++) {
//     print(colors[i]);
// }

// for (let i = 0; i < animals.length; i++) {
//     print(animals[i]);
// }

// const myForeach = (arr, fn) => {
//     for (let i = 0; i < arr.length; i++) {
//         fn(arr[i]);
//     }
// }

// myForeach(colors, print);
// myForeach(animals, print);


Array.prototype.myForeach = function(fn) {
    for (let i = 0; i < this.length; i++) {
        fn(this[i]);
    }
}


// colors.myForeach(print);

// colors.forEach(what => console.log('*** ' + what + ' ***'));

const animals2 = [
    { id: 5, title: 'racoon' },
    { id: 7, title: 'fox' },
    { id: 102, title: 'wolf' },
    { id: 88, title: 'beaver' },
    { id: 20, title: 'wolf' },
    { id: 77, title: 'wolf' }
]

console.clear();

const WAT1 = animals.forEach(v => console.log(v));
const WAT2 = animals.map((v, i) => v + '---' + i);
const WAT3 = animals.filter(v => v != 'fox');
const WAT4 = animals.find(v => v == 'racoon');

const WATO2 = animals2.map((v, i) => v.title + '---' + i);
const WATO3 = animals2.filter(v => v.title != 'fox');
const WATO4 = animals2.find(v => v.id == 88);

// animals2.sort((a, b) => b.id - a.id);
// animals2.sort((a, b) => b.title.localeCompare(a.title));

animals2.sort((a, b) => {
    if (a.title < b.title) return -1;
    if (a.title > b.title) return 1;
    return a.id - b.id;
});


// animals2.sort((a, b) => {
//     if (a.id < b.id) return -1;
//     if (a.id > b.id) return 1;
//     return 0;
// })


// console.log(WAT1);
console.log(animals2);


// console.log(fun(miau));

console.clear();

let A = 5;
let B = A;
A = A + 1;
console.log(A, B);

const C = [5, 7];
const D = [...C, 6];

// C.push(6);
// D.push(8);

const V = { id: 77, title: 'wolf', show: false }

const V2 = {...V, show: true }

console.log(V2);

// console.log([...C], {...C });




const sum = (a, b) => {
    console.log(a + b);
}

sum(...C);

console.clear();

const obj = { animalId: 77, Title: 'wolf', Show: false };


const { Title } = obj;

const animalId = obj.animalId;

console.log(Title, animalId);


const obj1 = { Title, animalId };

console.log(obj1);


const arr45 = [45, 25, 444, 888];

const [F, Y, L] = arr45;

console.log(F, Y, L);