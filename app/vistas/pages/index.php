
<div id="app">
  <div class="container mt-5">


    <form >
      <div class="form-group">
        <label for="Tarea">Tarea</label>
        <input type="Tarea" v-model="titulo" class="form-control" id="Tarea" aria-describedby="Tarea">
      </div>

      <button @click="GrabarTarea()" class="btn btn-primary">Grabar</button>
    </form>

    <br>
    <hr>
    <br>


    <ul class="list-group">
      <li class="list-group-item">Cras justo odio</li>
    </ul>

  </div>
</div>
