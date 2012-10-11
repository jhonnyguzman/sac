$(document).ready(function(){
	
		$('#formAdddocentes').validate({
		    rules: {
		      dni: {
		        digits:true,
		        minlength: 8,
		        required: true
		      },
		      apellido: {
		      	maxlength: 45,
		        required: true
		      },
		      nombre: {
		      	maxlength: 45,
		        required: true
		      },
		      telefono: {
		        maxlength: 16,
		        minlength: 7,
		        digits: true,
		        required: true
		      },
		      email: {
		        required: true,
		        email: true
		      },
		      titulo: {
		      	maxlength: 50,
		        required: true
		      }
		    },
		    highlight: function(label) {
		    	$(label).closest('.control-group').addClass('error');
		    },
		    success: function(label) {
		    	label
		    		.text('OK!').addClass('valid')
		    		.closest('.control-group').addClass('success');
		    }
	   });


	   $('#formEditdocentes').validate({
		    rules: {
		      dni: {
		        digits:true,
		        minlength: 8,
		        required: true
		      },
		      apellido: {
		      	maxlength: 45,
		        required: true
		      },
		      nombre: {
		      	maxlength: 45,
		        required: true
		      },
		      telefono: {
		        maxlength: 16,
		        minlength: 7,
		        digits: true,
		        required: true
		      },
		      email: {
		        required: true,
		        email: true
		      },
		      titulo: {
		      	maxlength: 50,
		        required: true
		      }
		    },
		    highlight: function(label) {
		    	$(label).closest('.control-group').addClass('error');
		    },
		    success: function(label) {
		    	label
		    		.text('OK!').addClass('valid')
		    		.closest('.control-group').addClass('success');
		    }
	   });


	   $('#formAdddirectores').validate({
		    rules: {
		      dni: {
		        digits:true,
		        minlength: 8,
		        required: true
		      },
		      apellido: {
		      	maxlength: 45,
		        required: true
		      },
		      nombre: {
		      	maxlength: 45,
		        required: true
		      },
		      telefono: {
		        maxlength: 16,
		        minlength: 7,
		        digits: true,
		        required: true
		      },
		      email: {
		        required: true,
		        email: true
		      }
		    },
		    highlight: function(label) {
		    	$(label).closest('.control-group').addClass('error');
		    },
		    success: function(label) {
		    	label
		    		.text('OK!').addClass('valid')
		    		.closest('.control-group').addClass('success');
		    }
	   });


	   $('#formEditdirectores').validate({
		    rules: {
		      dni: {
		        digits:true,
		        minlength: 8,
		        required: true
		      },
		      apellido: {
		      	maxlength: 45,
		        required: true
		      },
		      nombre: {
		      	maxlength: 45,
		        required: true
		      },
		      telefono: {
		       maxlength: 16,
		        minlength: 7,
		        digits: true,
		        required: true
		      },
		      email: {
		        required: true,
		        email: true
		      }
		    },
		    highlight: function(label) {
		    	$(label).closest('.control-group').addClass('error');
		    },
		    success: function(label) {
		    	label
		    		.text('OK!').addClass('valid')
		    		.closest('.control-group').addClass('success');
		    }
	   });


	   $('#formAddescuelas').validate({
		    rules: {
		      cue: {
		        min: 900000000,
		        max: 999999999,
		        digits:true,
		        required: true
		      },
		      nombre: {
		      	maxlength: 80,
		        required: true
		      },
		      direccion: {
		        maxlength: 80,
		        required: true
		      },
		      telefono: {
		        maxlength: 16,
		        minlength: 7,
		        digits:true,
		        required: true
		      },
		      email: {
		        email: true
		      }
		    },
		    highlight: function(label) {
		    	$(label).closest('.control-group').addClass('error');
		    },
		    success: function(label) {
		    	label
		    		.text('OK!').addClass('valid')
		    		.closest('.control-group').addClass('success');
		    }
	   });


	   $('#formEditescuelas').validate({
		    rules: {
		      cue: {
		        min: 900000000,
		        max: 999999999,
		        digits:true,
		        required: true
		      },
		      nombre: {
		      	maxlength: 80,
		        required: true
		      },
		      direccion: {
		        maxlength: 80,
		        required: true
		      },
		      telefono: {
		        maxlength: 16,
		        minlength: 7,
		        digits:true,
		        required: true
		      },
		      email: {
		        email: true
		      }
		    },
		    highlight: function(label) {
		    	$(label).closest('.control-group').addClass('error');
		    },
		    success: function(label) {
		    	label
		    		.text('OK!').addClass('valid')
		    		.closest('.control-group').addClass('success');
		    }
	   });


	   $('#formAddlineas_accion').validate({
		    rules: {
		      nombre: {
		      	maxlength: 80,
		        required: true
		      }
		    },
		    highlight: function(label) {
		    	$(label).closest('.control-group').addClass('error');
		    },
		    success: function(label) {
		    	label
		    		.text('OK!').addClass('valid')
		    		.closest('.control-group').addClass('success');
		    }
	   });


	   $('#formEditlineas_accion').validate({
		    rules: {
		      nombre: {
		      	maxlength: 50,
		        required: true
		      }
		    },
		    highlight: function(label) {
		    	$(label).closest('.control-group').addClass('error');
		    },
		    success: function(label) {
		    	label
		    		.text('OK!').addClass('valid')
		    		.closest('.control-group').addClass('success');
		    }
	   });


	   $('#formAddperiodos').validate({
		    rules: {
		      fecha_inicio: {
		      	dateITA: true,
		        required: true
		      },
		      fecha_fin: {
		        dateITA: true,
		        required: true
		      },
		      costo_hora: {
		        digits: true,
		        required: true
		      }
		    },
		    highlight: function(label) {
		    	$(label).closest('.control-group').addClass('error');
		    },
		    success: function(label) {
		    	label
		    		.text('OK!').addClass('valid')
		    		.closest('.control-group').addClass('success');
		    }
	   });


	   $('#formEditperiodos').validate({
		    rules: {
		      costo_hora: {
		        digits: true,
		        required: true
		      }
		    },
		    highlight: function(label) {
		    	$(label).closest('.control-group').addClass('error');
		    },
		    success: function(label) {
		    	label
		    		.text('OK!').addClass('valid')
		    		.closest('.control-group').addClass('success');
		    }
	   });


	   $('#formAddusuarios').validate({
		    rules: {
		      username: {
		        required: true
		      },
		      password: {
		      	minlength: 6,
		        required: true
		      },
		      passwordconf: {
		        equalTo: "#password"
		      },
		      apellido: {
		      	maxlength: 45,
		        required: true
		      },
		      nombre: {
		      	maxlength: 45,
		        required: true
		      },
		      telefono: {
		        maxlength: 15,
		        digits: true
		      },
		      email: {
		        email: true,
		        required: true
		      }
		    },
		    highlight: function(label) {
		    	$(label).closest('.control-group').addClass('error');
		    },
		    success: function(label) {
		    	label
		    		.text('OK!').addClass('valid')
		    		.closest('.control-group').addClass('success');
		    }
	   });


	   $('#formEditusuarios').validate({
		    rules: {
		      password: {
		      	minlength: 6
		      },
		      passwordconf: {
		        equalTo: "#password"
		      },
		      apellido: {
		      	maxlength: 45,
		        required: true
		      },
		      nombre: {
		      	maxlength: 45,
		        required: true
		      },
		      telefono: {
		        maxlength: 15,
		        digits: true
		      },
		      email: {
		        email: true,
		        required: true
		      }
		    },
		    highlight: function(label) {
		    	$(label).closest('.control-group').addClass('error');
		    },
		    success: function(label) {
		    	label
		    		.text('OK!').addClass('valid')
		    		.closest('.control-group').addClass('success');
		    }
	   });


	   
});