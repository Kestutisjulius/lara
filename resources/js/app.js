import * as bootstrap from 'bootstrap';
import axios from 'axios';
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

    if (document.querySelector('.magic--see')) {

        const selector = document.querySelector('[name=color_id]');
        const magicSee = document.querySelector('.magic--see');
        const linkSpanText = magicSee.querySelector('span');

        const doSee = () => {
            magicSee.setAttribute('href', showUrl + '/' + selector.value);
            linkSpanText.innerText = selector.options[selector.selectedIndex].text;
        }

        selector.addEventListener('change', e => {
            doSee();
        })
        window.addEventListener('load', () => {
            doSee();
        })
    }
