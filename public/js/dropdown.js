
$("#tipoNota").change(function(event){
    $.get("asignaturaCurso/"+event.target.value+"",function(response, asigCurso){
      $("#asignaturaCurso").empty();
      for(i=0;i<response.length;i++){
      $("#asignaturaCurso").append("<option value='"+response[i].ASIGNATURAID+"'> "+response[i].NOMBRE+"</option>");
      }
    });
    });

    $("#modalidad").change(function(event){
        $.get("tipoNota/"+event.target.value+"",function(response, modalidad){
          $("#tipoNota").empty();
          for(i=0;i<response.length;i++){
          $("#tipoNota").append("<option value='"+response[i].TIPONOTAID+"'> "+response[i].DESCRIPCION+"</option>");
          }
        });
        });
