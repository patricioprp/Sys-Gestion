
$("#asigCurso").change(function(event){
    $.get("asignaturaCurso/"+event.target.value+"",function(response, asigCurso){
      $("#modalidad").empty();
      for(i=0;i<response.length;i++){
      $("#modalidad").append("<option value='"+response[i].IDMODALIDAD+"'> "+response[i].DESCRIPCION+"</option>");
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
