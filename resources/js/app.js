import * as bootstrap from 'bootstrap';
import axios from 'axios';
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.addEventListener('load', () => {
   axios.get(smallCart).then(res =>{
    document.querySelector('.small--cart').innerHTML=res.data.html;
   })
});

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
    if (document.querySelector('.add--cart')) {

        document.querySelectorAll('.add--cart')
        .forEach(button => {
            button.addEventListener('click', () => {
                const row = button.closest('.controls');
                const animalId = row.querySelector('[name=animal_id]').value;
                const animalCount = row.querySelector('[name=animal_count]').value;
                axios.post(addToCartUrl, {animalCount, animalId}).then(response =>{
                    axios.get(smallCart).then(res =>{
                        document.querySelector('.small--cart').innerHTML=res.data.html;
                       })
                });
            })
        })
    }
