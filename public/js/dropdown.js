
$("#asigCurso").change(function(event){
    $.get("asignatura/"+event.target.value+"",function(response, asigCurso){
      $("#modalidad").empty();
      for(i=0;i<response.length;i++){
          console.log(response);
      $("#modalidad").append("<option value='"+response[i].IDMODALIDAD+"'> "+response[i].DESCRIPCION+"</option>");
      }
    });
    });
