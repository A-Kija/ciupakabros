import 'bootstrap';
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


document.querySelectorAll('.--add--to--cart').forEach(section => {
    section.querySelector('button').addEventListener('click', _ => {
        const data = {};
        section.querySelectorAll('input').forEach(input => {
            data[input.getAttribute('name')] = input.value;
        });

        axios.put(section.dataset.url, data)
            .then(res => {
                console.log(res.data);
                document.querySelector('.--count').innerText = res.data.count;
                document.querySelector('.--total').innerText = res.data.total.toFixed(2);
            });
    });
});

if (document.querySelector('.--top--cart')) {
    window.addEventListener('load', _ => {
        const url = document.querySelector('.--top--cart').dataset.url;
        axios.get(url)
            .then(res => {
                document.querySelector('.--count').innerText = res.data.count;
                document.querySelector('.--total').innerText = res.data.total.toFixed(2);
                document.querySelector('.--cart-info').style.opacity = 1;
            })
    })
}

document.querySelectorAll('.stars input')
    .forEach(i => {
        i.addEventListener('change', _ => {
            const star = i.dataset.star;
            const isChecking = i.checked;

            if (isChecking) {
                i.closest('.stars').querySelectorAll('input')
                    .forEach(s => s.dataset.star <= star ? s.checked = true : s.checked = false);
            } else {
                i.closest('.stars').querySelectorAll('input')
                    .forEach(s => s.dataset.star >= star ? s.checked = false : s.checked = true);
            }
            i.closest('.stars').querySelectorAll('label')
                .forEach(l => l.classList.remove('half'));
            // i.closest('form').submit(); // old skool style
        });
    });


if (document.querySelector('.--tags')) {
    document.querySelectorAll('.--add--new')
        .forEach(i => {
            i.addEventListener('input', e => {
                axios.get(e.target.dataset.url + '?t=' + e.target.value)
                    .then(res => {
                        i.closest('.--add').querySelector('.--tags--list').innerHTML = res.data.tags;
                        initTagList();


                    })
            })
        })
}





const initTagList = _ => {

}