$(function()
{
	$('#control1').on('change',onSelectAsignaturaCambia);
	$('#control2').on('change',onSelectTipoNotaCambia);

});

function onSelectAsignaturaCambia()
{

	//ctrl+shift+j abre consala
	var idmod_asig=$(this).val();

	$.get('/api/asignatura/'+idmod_asig+'/modalidad', function(data)
	{
		var html_select_mod = '<option value=""></option>';
		for (var i=0; i<data.length; ++i)
			html_select_mod +='<option value="'+data[i].IDMODALIDAD+'">'+data[i].EVALUACION+'</option>';
			$('#control2').html(html_select_mod);
	});
}

function onSelectTipoNotaCambia()
{

	//ctrl+shift+j abre consala
	var idtiponota_asig=$(this).val();

	$.get('/api/modalidad/'+idtiponota_asig+'/tiponota', function(data)
	{
		var html_select_tiponota = '<option value=""></option>';
		for (var i=0; i<data.length; ++i)
			html_select_tiponota +='<option value="'+data[i].TIPONOTAID+'">'+data[i].DESCRIPCION+'</option>';
			$('#control3').html(html_select_tiponota);
	});
}