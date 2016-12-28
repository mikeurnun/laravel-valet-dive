require('./bootstrap');

import ProcessForm from './directives/ProcessForm'

Vue.directive('ajax', ProcessForm);

const app = new Vue({
    el: '.container-fluid'
});
