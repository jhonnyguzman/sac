// function to show data's pagination
function setPagination(pag,loader)
{	 
	 $("#" + pag + " a").click(function(e){
    	// stop normal link click
    	e.preventDefault();
    	$('#'+loader).load($(this).attr("href"));
  	 });
}

function deleteRow(url)
{
	if(confirm("¿Estás seguro de eliminar este item?")){
		window.open(url,'_top');
	}

}

function deleteItemModal(url, div)
{
    if(confirm("¿Estás seguro de eliminar este item?")){
        $.get(url, function(data){
            $('#'+div).html(data);
        });
    }

}

function searchData(form,loader)
{    
	$("#"+form).submit(function() 
    {
   	  $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: $(this).serialize(),	
        success: function(data) {
        		$("#"+loader).html(data);
        }
    	});        
      return false;
    });	  
}


function updateContent(url,div)
{
    $.get(url, function(data){
        $('#'+div).html(data);
    });
}


// function to send form through ajax
function submitData(idform,loader_div)
{    
    $("#"+idform).submit(function() 
    {
     $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: $(this).serialize(),
        success: function(data) {
               $("#"+loader_div).html(data);
        }
        })        
    return false;
    }); 
}

function getLocalidades(url, loc_selected)
{
    var options = '';
    var url_f = url + $("#departamento_id").val()
    $.getJSON(url_f, function(data) {
        $("#localidad_id").find("option").remove();
        if(data != 'none'){
            $.each(data, function(key, val) {
                if(loc_selected){
                    if(loc_selected == val.id){
                        options = options + "<option value='"+val.id+"' selected>"+ val.nombre +"</options>";
                    }else{
                        options = options + "<option value='"+val.id+"'>"+ val.nombre +"</options>";
                    }
                }else{
                    options = options + "<option value='"+val.id+"'>"+ val.nombre +"</options>";
                }
            });
            $("#localidad_id").append(options);
            $("#localidad_id").trigger("liszt:updated");
        }
    });
}

function loadModal(url,div)
{
    $('div#'+div).load(url,function(){
        $(this).modal({
            keyboard:true,
            backdrop:false
        });
    }).modal('show'); 
}

function showContentTabMenu(url, div)
{
    $("#"+div).load(url + $("#perfiles_id").val());
}

function showContentTabLineaAccion(url, div)
{
    $("#"+div).load(url + $("#escuela_id").val());
}

function asignMenu(url)
{
    document.location.href =url + $("#perfiles_id").val();
}

