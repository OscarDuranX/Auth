var Vue = require('vue');

new Vue({
    el: '#emailFormGroup',
    data: {
        exist: false
    },
    methods: {
        checkEmailExists: function(event){
            alert('Xivato');
            this.exist= false;
        }

    }
})