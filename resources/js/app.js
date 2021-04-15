/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

if (document.querySelector('[data-delete-member]')) {
    document.querySelectorAll('[data-delete-member]').forEach(form => {
        form.addEventListener('submit', e => {
            document.querySelector('#mod').style.display = 'block';
            document.querySelector('#mod p').innerText = "Do you really want to delete member ID nr. " + form.dataset.memberId + "?";
            let att = document.createAttribute("value");
            att.value = form.dataset.memberId;
            document.querySelector('#mod form.destroy').setAttributeNode(att);
            const answer = false;
            if (answer) {
                return true;
            }
            e.preventDefault();

        });
    })
}