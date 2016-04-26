

//enable checkbocks and other from informacion basica to edit them
  $(document).ready(function(){
    $('#infoBasicaCheck').click(function(){
       for(var i=1;i<=4;i++){
		   document.getElementById("infobasica"+i).disabled= false;
	   }
		document.getElementById("years").disabled= false; 
		document.getElementById("months").disabled= false; 
		document.getElementById("days").disabled= false; 
		document.getElementById("countries").disabled= false; 
		document.getElementById("Provincia").disabled= false; 
		document.getElementById("Canton").disabled= false;
		document.getElementById("Distrito").disabled= false; 	
		document.getElementById("Region").disabled= false; 		
			var div = document.getElementById('infoBasica'); //botones para editar
			div.style.display = 'block'; //hide
			document.getElementById('infoBasicaCheck').style.display = 'none';
		
    });
  });
  
  $(document).ready(function(){
    $('#cancelInfoBasica').click(function(){
       for(var i=1;i<=4;i++){
		   document.getElementById("infobasica"+i).disabled= true;
	   }
		document.getElementById("years").disabled= true; 
		document.getElementById("months").disabled= true; 
		document.getElementById("days").disabled= true; 
		document.getElementById("countries").disabled= true; 
		document.getElementById("Provincia").disabled= true; 
		document.getElementById("Canton").disabled= true; 
			var div = document.getElementById('infoBasica'); //botones para editar
			div.style.display = 'none'; //show
			document.getElementById('infoBasicaCheck').style.display = 'block';
    });
  });
  
    $(document).ready(function(){
    $('#actualizaInfoBasica').click(function(){
       for(var i=1;i<=4;i++){
		   document.getElementById("infobasica"+i).disabled= true;
	   }
		document.getElementById("years").disabled= true; 
		document.getElementById("months").disabled= true; 
		document.getElementById("days").disabled= true; 
		document.getElementById("countries").disabled= true; 
		document.getElementById("Provincia").disabled= true; 
		document.getElementById("Canton").disabled= true; 
			var div = document.getElementById('infoBasica'); //botones para editar
			div.style.display = 'none'; //show
			document.getElementById('infoBasicaCheck').style.display = 'block';
			
    });
  });
  
  
  //-----------------------------------------------------------------
  //enable checkbocks and other from informacion CONTACTO to edit them
  $(document).ready(function(){
    $('#contactoCheck').click(function(){
       for(var i=1;i<=8;i++){
		   document.getElementById("infocontacto"+i).disabled= false;
	   }

			var div = document.getElementById('divcontacto'); //botones para editar
			div.style.display = 'block'; //hide
			document.getElementById('contactoCheck').style.display = 'none';
			
    });
  });
  
  $(document).ready(function(){
    $('#cancelcontacto').click(function(){
       for(var i=1;i<=8;i++){
		   document.getElementById("infocontacto"+i).disabled= true;
	   }

			var div = document.getElementById('divcontacto'); //botones para editar
			div.style.display = 'none'; //show
			document.getElementById('contactoCheck').style.display = 'block';
    });
  });
  
    $(document).ready(function(){
    $('#actualizacontacto').click(function(){
       for(var i=1;i<=8;i++){
		   document.getElementById("infocontacto"+i).disabled= true;
	   }

			var div = document.getElementById('divcontacto'); //botones para editar
			div.style.display = 'none'; //show
			document.getElementById('contactoCheck').style.display = 'block';
			
    });
  });
  
     //-----------------------------------------------------------------
  //enable checkbocks and other from informacion PERSONAL to edit them
  $(document).ready(function(){
    $('#personalCheck').click(function(){
       for(var i=1;i<=5;i++){
		   document.getElementById("infopersonal"+i).disabled= false;
	   }
			document.getElementById("Genero").disabled= false;  
			document.getElementById("Talla").disabled= false; 
			document.getElementById("Lateralidad").disabled= false;
			var div = document.getElementById('divpersonal'); //botones para editar
			div.style.display = 'block'; //hide
			document.getElementById('personalCheck').style.display = 'none';
			
    });
  });
  
  $(document).ready(function(){
    $('#cancelpersonal').click(function(){
       for(var i=1;i<=5;i++){
		   document.getElementById("infopersonal"+i).disabled= true;
	   }
			document.getElementById("Genero").disabled= true;  
			document.getElementById("Talla").disabled= true; 
			document.getElementById("Lateralidad").disabled= true; 
			var div = document.getElementById('divpersonal'); //botones para editar
			div.style.display = 'none'; //show
			document.getElementById('personalCheck').style.display = 'block';
    });
  });
  
    $(document).ready(function(){
    $('#actualizapersonal').click(function(){
       for(var i=1;i<=5;i++){
		   document.getElementById("infopersonal"+i).disabled= true;
	   }
			document.getElementById("Genero").disabled= true;  
			document.getElementById("Talla").disabled= true; 
			document.getElementById("Lateralidad").disabled= true; 
			var div = document.getElementById('divpersonal'); //botones para editar
			div.style.display = 'none'; //show
			document.getElementById('personalCheck').style.display = 'block';
			
    });
  }); 
	
	
	
	
	
	
	
  //-----------------------------------------------------------------
//enable checkbocks and other from formulario medico to edit them
  $(document).ready(function(){
    $('#enableCheck').click(function(){
       for(var i=1;i<=38;i++){
		   document.getElementById("checkbox"+i).disabled= false;
	   }
			document.getElementById("checktext1").disabled= false;  
			document.getElementById("checktext2").disabled= false; 	
			document.getElementById("checktextarea").disabled= false; 	
			var div = document.getElementById('newpost'); //botones para editar
			div.style.display = 'block'; //hide
			document.getElementById('enableCheck').style.display = 'none';
			
			/*if (div.style.display !== 'none') {
				div.style.display = 'none'; //show
			}
			else {
				div.style.display = 'block'; //hide
			} */
    });
  });
  
  $(document).ready(function(){
    $('#cancelChek').click(function(){
       for(var i=1;i<=38;i++){
		   document.getElementById("checkbox"+i).disabled= true;
	   }
			document.getElementById("checktext1").disabled= true;  
			document.getElementById("checktext2").disabled= true; 	
			document.getElementById("checktextarea").disabled= true; 	
			var div = document.getElementById('newpost'); //botones para editar
			div.style.display = 'none'; //show
			document.getElementById('enableCheck').style.display = 'block';
    });
  });
  
    $(document).ready(function(){
    $('#actualizacheck').click(function(){
       for(var i=1;i<=38;i++){
		   document.getElementById("checkbox"+i).disabled= true;
	   }
			document.getElementById("checktext1").disabled= true;  
			document.getElementById("checktext2").disabled= true; 	
			document.getElementById("checktextarea").disabled= true; 	
			var div = document.getElementById('newpost'); //botones para editar
			div.style.display = 'none'; //show
			document.getElementById('enableCheck').style.display = 'block';
			
    });
  });
  