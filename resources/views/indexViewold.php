<!DOCTYPE html>
<html > <!-- Cambia 'es' por el código de idioma deseado -->
  <head>
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/locales/es.js'></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script>
var calendario;

      document.addEventListener('DOMContentLoaded', function() {
       
        var calendarEl = document.getElementById('calendar');
         calendario = new FullCalendar.Calendar(calendarEl, {
          timeZone: 'local',
          //  initialDate: new Date(2018, 8, 1),
          locale: 'es', // Cambia 'es' por el código de idioma deseado,
          headerToolbar: {
            start: 'today,prev,next',
            center: 'title',
            end: 'dayGridMonth,dayGridWeek,dayGridDay,timeGridWeek,timeGridDay'
          },
          buttonText: {
            today: 'Hoy',
            prev: 'Anterior',
            next: 'Siguiente',
            dayGridMonth: 'Mes',
            dayGridWeek: 'Semana',
            dayGridDay: 'Día',
            timeGridWeek: 'Semana Horaria',
            timeGridDay: 'Día Horario'
          },
          initialView: 'dayGridMonth',


          dateClick: function(info) {
            var fechaFormateada = calendario.formatDate(info.date, { // Utilizamos el método formatDate proporcionado por FullCalendar
             //  weekday: 'long',
               year: 'numeric',
               month: '2-digit',
               day: '2-digit'
            });



            var ahora = new Date();
            var horaActual = ahora.getHours();
            var minutosActuales = ahora.getMinutes();

            // Formatea la hora y los minutos con dos dígitos
            var horaFormateada = horaActual < 10 ? '0' + horaActual : horaActual;
            var minutosFormateados = minutosActuales < 10 ? '0' + minutosActuales : minutosActuales;

            // Construye la cadena de tiempo en formato HH:mm
            var horaActualCompleta = horaFormateada + ':' + minutosFormateados;


            //info.dayEl.style.background = 'red';
            $('#modalEventos').modal();
            $('#txtFecha').val(fechaFormateada);
          //  console.log("Valor Seleccionado: " + fechaFormateada);
            $('#txtID').val(''); 
          //  $('#txtID').css('display','none'); 
            $('#labelID').css('display','none'); 
            $('#txtTitulo').val('');
            $('#txtDescripcion').val('');
            $('#txtHorainicio').val(horaActualCompleta);
            $('#txtHorafin').val(horaActualCompleta);
            $('#exampleModalLabel').html('Asignar Cita');
            $('#editar').css('display','none');
            $('#eliminar').css('display','none');
            $('#agregar').css('display','');



          },
        events:'http://localhost/cuenta/public/index.php/citas',
          // events:[{
          //   title:'biblioteca parque',
          //   descripcion:'Juan carlos rodriguez',
          //   start:'2024-04-06T12:30:00',
          //   end: '2024-04-06T14:30:00', // La hora de finalización es 2 horas después de la hora de inicio
          //   allDay:false
          // }],

          eventClick:function(info){
            $('#txtTitulo').val(info.event.title);
            $('#txtDescripcion').val(info.event.extendedProps.descripcion);

            var fechainicio = new Date(info.event.start); // Aquí debes pasar tu fecha en el formato que tienes actualmente
              // Obtenemos los componentes de la fecha y hora
              var añoinicio = fechainicio.getFullYear();
              var mesinicio = ('0' + (fechainicio.getMonth() + 1)).slice(-2); // Agregamos 1 al mes porque los meses en JavaScript van de 0 a 11
              var díainicio = ('0' + fechainicio.getDate()).slice(-2);
              var horasinicio = ('0' + fechainicio.getHours()).slice(-2);
             var minutosinicio = ('0' + fechainicio.getMinutes()).slice(-2);
              $('#txtHorainicio').val(horasinicio+':'+minutosinicio);
              // Construimos la fecha en el formato deseado
              var fechaFormateadaInicio = añoinicio + '-' + mesinicio + '-' + díainicio ;
              $('#txtFecha').val(fechaFormateadaInicio); 

              var fechafin = new Date(info.event.end); // Aquí debes pasar tu fecha en el formato que tienes actualmente
              var horasfin = ('0' + fechafin.getHours()).slice(-2);
             var minutosfin = ('0' + fechafin.getMinutes()).slice(-2);
             $('#txtHorafin').val(horasfin+':'+minutosfin);
            // $('#txtID').css('display',''); 
           // $('#labelID').css('display',''); 
             $('#txtID').val(info.event.id); 
            $('#modalEventos').modal();
          //  console.log(info.event);
           $('#exampleModalLabel').html('Editar Cita');
           $('#editar').css('display','');
           $('#eliminar').css('display','');
           $('#agregar').css('display','none');
          }
          
        });
        calendario.render();
        
      });
      
    </script>
  </head>
  <body>
<div class="modal fade" id="modalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Asignar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <input type="text" class="form-control" disabled id="txtID" name="txtID" style="display:">
        <label for="">Titulo</label>
          <input type="text" class="form-control" id="txtTitulo"><br>
        <label for="">Fecha</label>
        <input type="text" class="form-control" id="txtFecha" name="txtFecha"><br>
        <label for="">Hora inicio</label>
        <input type="time" class="form-control" id="txtHorainicio"  value="<?php echo date('H:i'); ?>"><br>
        <label for="">Hora fin</label>
        <input type="time" class="form-control" id="txtHorafin"  value="<?php echo date('H:i'); ?>"><br>
        <label for="">Descripción</label>
        <textarea name="" class="form-control" id="txtDescripcion" cols="" rows=""></textarea><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="agregar">Agregar</button>
        <button type="button" class="btn btn-primary" id="editar">Modificar</button>
        <button type="button" class="btn btn-danger" id="eliminar">Borrar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>


      </div>
    </div>
  </div>
</div>

<div class="container pt-4">
<div id='calendar'></div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script>
var nuevoEvento;
document.getElementById('agregar').addEventListener('click', function() {
 // $('#agregar').click(function(){
    recolectarDatos()
    //  $('#modalEventos').modal('toggle');
     
         // $('#txtFecha').val('');
         // $('#txtHorainicio').val('')
        //  $('#txtHorafin').val('')
      if(nuevoEvento['title']=='' ){
        $('#txtTitulo').addClass('is-invalid');
      }else if (nuevoEvento['descripcion']==''){
        $('#txtTitulo').removeClass('is-invalid');
        $('#txtDescripcion').addClass('is-invalid');
       } else{
        $('#txtTitulo').removeClass('is-invalid');
        $('#txtDescripcion').removeClass('is-invalid');
        $('#txtID').val(''); 
        $('#txtTitulo').val('');
      $('#txtDescripcion').val('');
        $.ajax({
          url:'index.php/agregar',
          type:'get',
          data:nuevoEvento,
          dataType:'json',
          success: function response(data){
            nuevoEvento.id = data;
            calendario.addEvent(nuevoEvento); // Agregar evento al calendario
            console.log(nuevoEvento)
            $('#modalEventos').modal('toggle');
          }, error:function(){
            console.log("Error");
          }

        })
      }
       

   // console.log(nuevoEvento) 
    });


    function recolectarDatos(){
      nuevoEvento = {
        id:$('#txtID').val(),
        title: $('#txtTitulo').val(),
        descripcion: $('#txtDescripcion').val(),
        start: $('#txtFecha').val().split('/').reverse().join('-') + 'T' + $('#txtHorainicio').val(),
        end: $('#txtFecha').val().split('/').reverse().join('-') + 'T' + $('#txtHorafin').val(),
        allDay: false
    };
    };

    document.getElementById('editar').addEventListener('click', function() {
 // $('#agregar').click(function(){
    recolectarDatos();
    //  calendario.updateEvent(nuevoEvento); // Agregar evento al calendario
      $('#modalEventos').modal('toggle');
      $('#txtID').val(''); 
      $('#txtTitulo').val('');
      $('#txtDescripcion').val('');
         // $('#txtFecha').val('');
         // $('#txtHorainicio').val('')
        //  $('#txtHorafin').val('')

        $.ajax({
          url:'index.php/editar',
          type:'get',
          data:nuevoEvento,
          dataType:'json',
          success: function response(data){
           // calendario.updateEvent(data);
           location.reload();
          //calendario.refetchEvents();
          console.log(data)
          }, error:function(){
            console.log("Error");
          }

        })
      
   // console.log(nuevoEvento) 
    });


    document.getElementById('eliminar').addEventListener('click', function() {
    recolectarDatos();
        $.ajax({
          url:'index.php/eliminar',
          type:'get',
          data:nuevoEvento,
          dataType:'json',
          success: function response(data){
           // calendario.updateEvent(data);
            location.reload();
          console.log(data)
          }, error:function(){
            console.log("Error");
          }

        })
    });


  
</script>

  </body>
</html>
