import 'bootstrap';
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const randColor = _ => {
    return '#' + Math.floor(Math.random() * 16777215).toString(16).padEnd(6, '0');
}


document.querySelectorAll('.--random--color')
    .forEach(div => div.style.backgroundColor = randColor());

if (document.querySelector('.--colors--counter')) {
    const range = document.querySelector('input.--colors--counter');
    const print = document.querySelector('span.--colors--counter');
    range.addEventListener('change', _ => print.innerText = range.value);
}

if (document.querySelector('.--cat--select')) {
    const select = document.querySelector('.--cat--select');
    select.addEventListener('change', _ => {
        axios.get(select.dataset.url + '?cat=' + select.value)
            .then(res => {
                const bin = document.querySelector('.--colors--selectors');
                bin.innerHTML = res.data.html;
                addNameEvents(bin, select);
                // console.log(res.data);
            })
    })

}
const addNameEvents = (bin, select) => {
    bin.querySelectorAll('[type=color]')
        .forEach(i => {
            i.addEventListener('change', _ => {
                i.closest('.one-color').querySelector('.color-view').style.backgroundColor = i.value;
                axios.get(select.dataset.urlName + '?color=' + i.value.substring(1))
                    .then(res => {
                        i.closest('.one-color').querySelector('.color-view').innerText = res.data.name;
                        i.closest('.one-color').querySelector('[type=hidden]').value = res.data.name;
                    });
            });
        });
}

// puslapio krovimo metu
if (document.querySelector('.--colors--selectors')) {
    addNameEvents(
        document.querySelector('.--colors--selectors'),
        document.querySelector('.--cat--select')
    );
}