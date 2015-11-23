var Vue = require('vue');

var Vue = require('jquery');

//new Vue({
//    el: '#emailFormGroup',
//    data: {
//        exist: false
//    },
//    methods: {
//        checkEmailExists: function(event){
//            alert('Xivato');
//            this.exist= false;
//        }
//
//    }
//})

var vm = new Vue({
    el: '#email',
    data: {
        exists: false,
        placeholder: "Youremail@gmail.com",
        msg: "Hello",
        url:"http://auth.app/checkEmailExists"
    },
    methods: {
        sayHello: function(){
            alert('hola');
        },
        checkEmailExists: function(){
            var email = $('#email').val();
            console.debug(email);
            console.debug(this.url);
            var url = this.url + '?email=' + email;
            console.debug(url);

            $.ajax(url).done(function (data) {
                console.debug(data);

                if(data == "true"){
                    //TODO email està lliure
                }else{
                    alert("Email ocupat");
                }

            }).fail(function(){
                console.debug("a petat");
            }).always(function(data){
                console.debug("Xivato!");
            });

        }




    }

})