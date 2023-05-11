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

    const initRemoveTag = tag => {
        const tags = tag.closest('.--tags');
        tag.addEventListener('click', _ => {
            axios.put(tags.dataset.url, { tag: tag.dataset.id })
                .then(res => {
                    if (res.data.status == 'ok') {
                        tag.remove();
                    }
                });
        });
    }

    const insertTag = (tagList, res) => {
        const add = tagList.closest('.--add');
        const bin = tagList.closest('.--tags');
        const div = document.createElement('div');
        div.classList.add('tag');
        div.dataset.id = res.data.id;
        const title = document.createTextNode(res.data.tag);
        div.appendChild(title);
        const i = document.createElement('i');
        div.appendChild(i);
        bin.insertBefore(div, add);
        initRemoveTag(div);
    }

    const initTagList = tagList => {
        tagList.querySelectorAll('.--list--tag')
            .forEach(t => {
                t.addEventListener('click', _ => {
                    axios.put(tagList.dataset.url, { tag: t.dataset.id })
                        .then(res => {
                            if (res.data.status == 'ok') {
                                insertTag(tagList, res);
                            }
                        });
                });
            });
    }

    document.querySelectorAll('.--new')
        .forEach(b => {
            b.addEventListener('click', _ => {
                const i = b.closest('.--add').querySelector('.--add--new');
                axios.post(b.dataset.url, { tag: i.value })
                    .then(res => {
                        insertTag(b.closest('.--add').querySelector('.--tags--list'), res);
                        console.log(res.data);
                    })
            });
        });

    document.querySelectorAll('.--add--new')
        .forEach(i => {
            i.addEventListener('input', e => {
                axios.get(e.target.dataset.url + '?t=' + e.target.value)
                    .then(res => {
                        i.closest('.--add').querySelector('.--tags--list').innerHTML = res.data.tags;
                        initTagList(i.closest('.--add').querySelector('.--tags--list'));
                    });
            });
            i.addEventListener('focus', e => {
                i.closest('.--add').querySelector('.--tags--list').style.display = 'block';
            });
            i.addEventListener('blur', e => {
                setTimeout(() => {
                    e.target.value = '';
                    i.closest('.--add').querySelector('.--tags--list').innerHTML = '';
                    i.closest('.--add').querySelector('.--tags--list').style.display = 'none';
                }, 200);
            });
        });

    document.querySelectorAll('.--tags')
        .forEach(tags => {
            tags.querySelectorAll('.--tag')
                .forEach(tag => {
                    initRemoveTag(tag)
                });
        });
}