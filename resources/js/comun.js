
window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);



if(document.getElementById('app')){
                const app = new Vue({
    el: '#app',
});
            };
if(document.getElementById('apicategoria')){
              require('./adminjs/apicategoria');  
            };
if(document.getElementById('apiproducto')){
              require('./adminjs/apiproducto');  
            };
if(document.getElementById('apirol')){
              require('./adminjs/apirol');  
            };
if(document.getElementById('apiUsuario')){
              require('./adminjs/apirol-usuario');  
            };
if(document.getElementById('apiconfirmareliminar')){
               require('./apiconfirmareliminar'); 
            };

