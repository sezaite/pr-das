/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

if (document.querySelector('.book-delete')) {
    document.querySelectorAll('.book-delete').forEach(form => {
        form.addEventListener('submit', e => {

            document.querySelector('#mod').style.display = 'block';
            document.querySelector('#mod').innerHTML = "Do you really want to delete member nr. " + form.dataset.memberId;

            const answer = false;
            if (answer) {
                return true;
            }
            e.preventDefault();

        });
    })
}