const btn_insert = document.getElementById('btn_insert');
btn_insert.addEventListener('click', () => {
    modal_containerform.classList.add('show');
});

// Llama a la funcion de mostrar el formulario Editar Cancion
// para editar sus datos en base a su id
$(".list_songs").on("click", ".edit_song", function(e){
    e.preventDefault();
    //alert("Update");
    var song_id = $(this).attr('data-id');
    //alert(song_id);
    var form_update_o_insert = "update";
    // window.location.href = window.location.href + "?song_id=" + song_id + "&form_update_o_insert=" + form_update_o_insert;
    modal_containerform.classList.add('show');
  });
// Para borrar cancion
$(".list_songs").on("click", ".delete_song", function(e){
    e.preventDefault();
    //alert("Update");
    var song_id = $(this).attr('data-id');
    //alert(song_id);
    var form_update_o_insert = "delete";
    // window.location.href = window.location.href + "?song_id=" + song_id + "&form_update_o_insert=" + form_update_o_insert;
    modal_containerform.classList.add('show');
  });