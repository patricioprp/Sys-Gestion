
$("#asigCurso").change(function(event){
    $.get("modalidads/"+event.target.value+"",function(response, asigCurso){
      $("#modalidad").empty();
      for(i=0;i<response.length;i++){
      $("#modalidad").append("<option value='"+response[i].IDMODALIDAD+"'> "+response[i].EVALUACION+"</option>");
      }
    });
    });
