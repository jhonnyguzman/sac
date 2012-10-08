// function to show data's pagination
function setPagination(pag,loader)
{	 
	 $("#" + pag + " a").click(function(e){
    	// stop normal link click
    	e.preventDefault();
    	$('#'+loader).load($(this).attr("href"));
  	 });
}

// function to show data's pagination
function setPaginationModal(pag, loader, p_data)
{    
     $("#"+ pag + " a").click(function(e)
     {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr("href"),
            data: p_data,
            success: function(data) {
                    $('#'+loader).html(data);
            }
        }) ; 
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

// function to send form through ajax
function submitDataTwo(idform,loader_div)
{    
    
     $.ajax({
        type: 'POST',
        url: $("#"+idform).attr('action'),
        data: $("#"+idform).serialize(),
        success: function(data) {
               $("#"+loader_div).html(data);
        }
    })        
    
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
                        options = options + "<option value='"+val.id+"' selected>"+ val.nombre +"</option>";
                    }else{
                        options = options + "<option value='"+val.id+"'>"+ val.nombre +"</option>";
                    }
                }else{
                    options = options + "<option value='"+val.id+"'>"+ val.nombre +"</option>";
                }
            });
            $("#localidad_id").append(options);
            $("#localidad_id").trigger("liszt:updated");
        }
    });
}

function getMeses(url, mes_selected, select1, select2)
{
    var options = '';
    var url_f = url + $("#"+select1).val()
    $.getJSON(url_f, function(data) {
        $("#"+select2).find("option").remove();
        if(data != 'none'){
            options = options + "<option value='' >Todos</option>";
            $.each(data, function(key, val) {
                if(mes_selected){
                    if(mes_selected == val.id){
                        options = options + "<option value='"+val.id+"' selected>"+ val.mes_descripcion +"</option>";
                    }else{
                        options = options + "<option value='"+val.id+"'>"+ val.mes_descripcion +"</option>";
                    }
                }else{
                    options = options + "<option value='"+val.id+"'>"+ val.mes_descripcion +"</option>";
                }
            });
            $("#"+select2).append(options);
        }
    });
}


function getMesesConsultas(url, mes_selected, select1, select2)
{
    var options = '';
    var a = $("#"+select1).val().split("-");
    if(a[0] != "undefined")
    {
        var url_f = url + a[1];
        $.getJSON(url_f, function(data) {
            $("#"+select2).find("option").remove();
            if(data != 'none'){
                options = options + "<option value='' >Todos</option>";
                $.each(data, function(key, val) {
                    if(mes_selected){
                        if(mes_selected == val.id){
                            options = options + "<option value='"+val.id+"' selected>"+ val.mes_descripcion +"</option>";
                        }else{
                            options = options + "<option value='"+val.id+"'>"+ val.mes_descripcion +"</option>";
                        }
                    }else{
                        options = options + "<option value='"+val.id+"'>"+ val.mes_descripcion +"</option>";
                    }
                });
                $("#"+select2).append(options);
            }
        });
    }


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

