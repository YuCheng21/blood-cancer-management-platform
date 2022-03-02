// window._ = require('lodash');

window.$ = window.jQuery = require('../../node_modules/jquery/dist/jquery.min');
window.bootstrap = require('../../node_modules/bootstrap/dist/js/bootstrap.bundle.min');
window.bootstrapTable = require('../../node_modules/bootstrap-table/dist/bootstrap-table.min');
require('../../node_modules/bootstrap-table/dist/locale/bootstrap-table-zh-TW.min');
window.Swal = require('../../node_modules/sweetalert2/dist/sweetalert2.all.min');
window.axios  = require('../../node_modules/axios/dist/axios.min');
window.Chart = require('../../node_modules/chart.js/dist/chart.min');
require('../../node_modules/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min');
window.Fancybox = require('../../node_modules/@fancyapps/ui/dist/fancybox.umd')
window.zoomPlugin = require('../../node_modules/chartjs-plugin-zoom/dist/chartjs-plugin-zoom.min')
window.Hammer = require('../../node_modules/hammerjs/hammer.min')

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

// window.axios = require('axios');

// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
