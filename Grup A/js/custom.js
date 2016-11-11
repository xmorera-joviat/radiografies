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
