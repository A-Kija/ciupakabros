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

if (document.querySelector('.--add--gallery')) {
    let g = 0;
    document.querySelector('.--add--gallery')
        .addEventListener('click', _ => {
            const input = document.querySelector('[data-gallery="0"]').cloneNode(true);
            g++;
            input.dataset.gallery = g;
            input.querySelector('input').setAttribute('name', 'gallery[]');
            input.querySelector('span')
                .addEventListener('click', e => {
                    e.target.closest('.mb-3').remove();
                });
            document.querySelector('.gallery-inputs').append(input);
        });
}

if (document.querySelector('.--tags--list')) {
    const listDom = document.querySelector('.--tags--list');
    const modalDom = document.querySelector('.--modal--bin');
    const messagesDom = document.querySelector('.--messages--bin');
    const msgOk = messagesDom.querySelector('.--ok');
    const msgInfo = messagesDom.querySelector('.--info');
    const msgError = messagesDom.querySelector('.--error');
    const listUrl = listDom.dataset.url;
    const loader = document.querySelector('.loader');
    const createButton = document.querySelector('.--create');
    const createTitle = document.querySelector('[name=create-title]');

    const showLoader = _ => loader.style.display = 'flex';
    const hideLoader = _ => loader.style.display = 'none';

    const showMessage = ($text, $type) => {
        switch ($type) {
            case 'ok':
                msgOk.style.display = 'block';
                msgOk.innerText = $text;
                setTimeout(() => {
                    msgOk.style.display = null;
                    msgOk.innerText = '';
                }, 5000);
                break;
            case 'info':
                msgInfo.style.display = 'block';
                msgInfo.innerText = $text;
                setTimeout(() => {
                    msgInfo.style.display = null;
                    msgInfo.innerText = '';
                }, 5000);
                break;
            case 'error':
                msgError.style.display = 'block';
                msgError.innerText = $text;
                setTimeout(() => {
                    msgError.style.display = null;
                    msgError.innerText = '';
                }, 5000);
        }
    }

    const getList = _ => axios.get(listUrl).then(res => showList(res));

    const showList = res => {
        listDom.innerHTML = res.data.html;
        hideLoader();
        listDom.querySelectorAll('.--edit')
            .forEach(b => {
                b.addEventListener('click', _ => {
                    showLoader();
                    axios.get(b.dataset.url)
                        .then(res => {
                            hideLoader();
                            modalDom.innerHTML = res.data.html;
                            // close
                            modalDom.querySelectorAll('.--close')
                                .forEach(b => {
                                    b.addEventListener('click', _ => {
                                        modalDom.innerHTML = '';
                                    });
                                });
                            // edit
                            modalDom.querySelector('.--edit')
                                .addEventListener('click', e => {
                                    const title = modalDom.querySelector('[name=edit-title]').value;

                                    showLoader();
                                    axios.put(e.target.dataset.url, { title })
                                        .then(res => {
                                            if (res.data.status == 'ok') {
                                                modalDom.innerHTML = '';
                                                getList();
                                                showMessage(res.data.message, 'ok');
                                            }
                                            if (res.data.status == 'error') {
                                                hideLoader();
                                                showMessage(res.data.message, 'error');
                                            }
                                            if (res.data.status == 'info') {
                                                showMessage(res.data.message, 'info');
                                                hideLoader();
                                                modalDom.innerHTML = '';
                                            }

                                        });
                                });
                        })
                        .catch(_ => {
                            hideLoader();
                            showMessage('Ooops... Server Error', 'error');
                        });
                });
            });

        listDom.querySelectorAll('.--delete')
            .forEach(b => {
                b.addEventListener('click', _ => {
                    showLoader();
                    axios.delete(b.dataset.url).then(res => {
                            getList();
                            showMessage('Tag was deleted', 'ok');
                        })
                        .catch(_ => {
                            hideLoader();
                            showMessage('Ooops... Server Error', 'error');
                        });
                })

            });
    }

    getList();
    createButton.addEventListener('click', _ => {
        showLoader();
        axios.post(createButton.dataset.url, { title: createTitle.value })
            .then(res => {
                if (res.data.status == 'ok') {
                    getList();
                    createTitle.value = '';
                } else {
                    hideLoader();
                    console.log('error', res.data.message)
                }
            })
    })

}