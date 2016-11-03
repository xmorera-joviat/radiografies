// funcio per previsualitzar una imatge al seleccionarla a un input


	function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

    oFReader.onload = function (oFREvent) {
        document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
	};
// funcions per mostrar el valor als 4 sliders
		

	function outputUpdate1(vol) {
		document.querySelector('#slider1').value = vol;
	}
	function outputUpdate2(vol) {
		document.querySelector('#slider2').value = vol;
		getValue();
	}
	function outputUpdate3(vol) {
		document.querySelector('#slider3').value = vol;
		getValue();

	}
	function outputUpdate4(vol) {
	document.querySelector('#slider4').value = vol;
	}

// funcio per que slider4 s'actualitzi a temps real quan slider 2 o 3 canvien.
	function getValue(){
		val2 = document.getElementById("slider2").value;
		val3 = document.getElementById("slider3").value;
		document.getElementById("slider4").value=val2*val3;
		document.getElementById("fader4").value=val2*val3;	
	}

// funció per validar que els radios i combos tenen algun valor
	
	function validar() {
		var resultat = false;
		var bucky = false;
		var focus = false;
		var combos = false;

		if (document.getElementById('parametres').taula.checked || document.getElementById('parametres').mural.checked || document.getElementById('parametres').directe.checked){
			bucky = true;
		}
		if (document.getElementById('parametres').fi.checked || document.getElementById('parametres').gruixut.checked){
			focus =true;
		}
		if ((document.getElementById('parametres').zona.value > 0) && (document.getElementById('parametres').os.value > 0) && (document.getElementById('parametres').posicio.value > 0) && (document.getElementById('parametres').centratge.value > 0)){
			combos=true;
		}
		if (bucky==true && focus==true && combos==true){
			resultat = true;
			document.getElementById('sub').disabled = false;

		}
		return resultat;
			
	}
    function validar2() {
        
        var anunciat = false;
        var radiografia = false;
        

        if (document.getElementById('anunciat').value){
            anunciat = true;
        }
        if (document.getElementById('radiografia').value){
            radiografia =true;
        }
        if (anunciat==true && radiografia==true){
            
            document.getElementById('sub2').disabled = false;

        }
        
            
    }
    function validar3() {
        var resultat = false;
        
        if (document.getElementById('zona').value > 1 && document.getElementById('zona').value < 999 && document.getElementById('os').value>0){
            
            document.getElementById('sub3').disabled = false;

        } else if (document.getElementById('zona').value == 999){

            document.getElementById('sub3').disabled = false;
        }
        
            
    }



        //funció que retorna l'objecte xml http
        function getXMLHTTP() {
            var xmlhttp=false;  
            try{
                xmlhttp=new XMLHttpRequest();
            }
            catch(e){       
                try{            
                    xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
                }
                catch(e){
                    try{
                    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                    }
                    catch(e1){
                        xmlhttp=false;
                    }
                }
            }   
            return xmlhttp;
        }
        
        function getOs(zonaId) {        
            
            var strURL="menus_ajax/obteOs.php?zona="+zonaId;
            var req = getXMLHTTP();
            
            if (req) {
                
                req.onreadystatechange = function() {
                    if (req.readyState == 4) {
                        // only if "OK"
                        if (req.status == 200) {                        
                            document.getElementById('osdiv').innerHTML=req.responseText;
                            document.getElementById('posdiv').innerHTML='<select name="posicio" class="form-control">'+
                            '<option>Selecciona una posició</option>'+
                            '</select>';
                            document.getElementById('centdiv').innerHTML='<select name="centratge" class="form-control">'+
                            '<option>Selecciona un centratge</option>'+
                            '</select>';                        
                        } else {
                            alert("Problem while using XMLHTTP:\n" + req.statusText);
                        }
                    }               
                }           
                req.open("GET", strURL, true);
                req.send(null);
            }       
        }

            function getOs2(zonaId,radId) {        
            
            var strURL="../pujar/menus_ajax/obteOsValidacio.php?zona="+zonaId+"&id="+radId;
            var req = getXMLHTTP();
            
            if (req) {
                
                req.onreadystatechange = function() {
                    if (req.readyState == 4) {
                        // only if "OK"
                        if (req.status == 200) {                        
                            document.getElementById('osdiv').innerHTML=req.responseText;                        
                        } else {
                            alert("Problem while using XMLHTTP:\n" + req.statusText);
                        }
                    }               
                }          
                req.open("GET", strURL, true);
                req.send(null);
            }       
        }

        function getPosicio(osId) {     
            var strURL="menus_ajax/obtePos.php?os="+osId;
            var req = getXMLHTTP();
            
            if (req) {
                
                req.onreadystatechange = function() {
                    if (req.readyState == 4) {
                        // only if "OK"
                        if (req.status == 200) {                        
                            document.getElementById('posdiv').innerHTML=req.responseText;                       
                        } else {
                            alert("Problem while using XMLHTTP:\n" + req.statusText);
                        }
                    }               
                }           
                req.open("GET", strURL, true);
                req.send(null);
            }
                    
        }

        function getPosicio2(osId,radId) {     
            var strURL="../pujar/menus_ajax/obtePosValidacio.php?os="+osId+"&id="+radId;
            var req = getXMLHTTP();
            
            if (req) {
                
                req.onreadystatechange = function() {
                    if (req.readyState == 4) {
                        // only if "OK"
                        if (req.status == 200) {                        
                            document.getElementById('posdiv').innerHTML=req.responseText;                       
                        } else {
                            alert("Problem while using XMLHTTP:\n" + req.statusText);
                        }
                    }               
                }           
                req.open("GET", strURL, true);
                req.send(null);
            }
                    
        }

        function getCentratge(osId) {       
            var strURL="menus_ajax/obteCent.php?os="+osId;
            var req = getXMLHTTP();
            
            if (req) {
                
                req.onreadystatechange = function() {
                    if (req.readyState == 4) {
                        // only if "OK"
                        if (req.status == 200) {                        
                            document.getElementById('centdiv').innerHTML=req.responseText;                      
                        } else {
                            alert("Problem while using XMLHTTP:\n" + req.statusText);
                        }
                    }               
                }           
                req.open("GET", strURL, true);
                req.send(null);
            }
                    
        }
        function getCentratge2(osId,radId) {       
            var strURL="../pujar/menus_ajax/obteCentValidacio.php?os="+osId+"&id="+radId;
            var req = getXMLHTTP();
            
            if (req) {
                
                req.onreadystatechange = function() {
                    if (req.readyState == 4) {
                        // only if "OK"
                        if (req.status == 200) {                        
                            document.getElementById('centdiv').innerHTML=req.responseText;                      
                        } else {
                            alert("Problem while using XMLHTTP:\n" + req.statusText);
                        }
                    }               
                }           
                req.open("GET", strURL, true);
                req.send(null);
            }
                    
        }
        function resetInputs(input){
            var inputs = ['zona','os','posicio','centratge'];
            switch (input){
                case zona:
                    document.getElementById("os").selectedIndex = 0;
                    document.getElementById("posicio").selectedIndex = 0;
                    document.getElementById("centrate").selectedIndex = 0;
                    break;
                case os:
                    document.getElementById("posicio").selectedIndex = 0;
                    document.getElementById("centratge").selectedIndex = 0;
                    break;
                case posicio:
                    document.getElementById("select").selectedIndex = 0;
                    break;
                case centratge:
                    break;
            }


        }


<!--    js gallery       -->


//   jQuery(document).ready(function($) {
 
//         $('#myCarousel').carousel({
//                 interval: 5000
//         });
 
//         //Handles the carousel thumbnails
//         $('[id^=carousel-selector-]').click(function () {
//         var id_selector = $(this).attr("id");
//         try {
//             var id = /-(\d+)$/.exec(id_selector)[1];
//             console.log(id_selector, id);
//             jQuery('#myCarousel').carousel(parseInt(id));
//         } catch (e) {
//             console.log('Regex failed!', e);
//         }
//     });
//         // When the carousel slides, auto update the text
//         $('#myCarousel').on('slid.bs.carousel', function (e) {
//                  var id = $('.item.active').data('slide-number');
//                 $('#carousel-text').html($('#slide-content-'+id).html());
//         });
// });
