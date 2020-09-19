var intranet = new Vue({

  el: '#intranet',

  data: {

  },

  mounted: function(){

  },

  methods: {

    Leido: function(id){

      axios({
        method: 'POST',
        url: '/Aleria/pages/MensajeLeido',
        data: {
          id_mensaje: id,
        }

      }).then(function (response) {

         console.log(response.data);

      });


    },


  },


})
