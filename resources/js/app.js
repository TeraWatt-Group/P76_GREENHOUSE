require('./bootstrap');

const bootstrap = window.bootstrap = require('bootstrap');

try {
	require('alpinejs');
} catch (e) {}

window.livewire.onError(statusCode => {
    alert('Livewire component error!')

    return false
})

require('trix');
// require('codemirror');

import flatpickr from 'flatpickr';
const ru = require('flatpickr/dist/l10n/ru.js').default.ru;
const uk = require('./vendor/flatpickr/uk.js').default.uk;