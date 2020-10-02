var app = new Vue({

  el: '#app',

  data: {

    errors: [],
    tasks: [],

    //task
    titulo: '',
    estado: true,


  },

  mounted: function(){

    this.LeerTask();

  },


  methods: {

    // lee todas las tareas
    LeerTask: function(){

          console.log("asdasd");

    },

    // agrega una tarea a la base de datos
    GrabarTarea: function(){

      axios({
        method: 'POST',
        url: '/clase2/pages/InsertTask',
        data: {

          titulo_tarea: this.titulo,
          estado_tarea: this.estado,

        }

      }).then(function (response) {
        // handle success
        if(response.data == true){
          alert("success");
        }else{
          alert("error");
        }

      }).catch(function (error) {
        console.log(error);
      });

      this.titulo = '';

      this.LeerTask();
    }

  },


})
