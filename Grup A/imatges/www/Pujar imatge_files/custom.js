

//funció per crear una barra slider 1

$(document).on('ready', function(){

	function moveSlider(e){
		e.preventDefault();

		var pos 	= $(e.currentTarget).offset()
		,	posX	= e.pageX - pos.left
		,	value	= posX*150/$(e.currentTarget).outerWidth();

		if(posX >= 0 && posX <= $(e.currentTarget).outerWidth()){

			$('.slider > .progress').css('width', posX+'px');
			$('.slider > .indicator').css('left', posX+'px');

			$('#valueSlider').val(Math.round(value));

		}
	}

	$('.slider').on('mousedown', function(e){

		moveSlider(e);

		$(this).on('mousemove', function(e){
			moveSlider(e);
		});

	}).on('mouseup', function(){
		$(this).off('mousemove');
	});


});
// slider 2
$(document).on('ready', function(){

	function moveSlider(e){
		e.preventDefault();

		var pos 	= $(e.currentTarget).offset()
		,	posX	= e.pageX - pos.left
		,	value	= posX*150/$(e.currentTarget).outerWidth();

		if(posX >= 0 && posX <= $(e.currentTarget).outerWidth()){

			$('.slider2 > .progress2').css('width', posX+'px');
			$('.slider2 > .indicator2').css('left', posX+'px');

			$('#valueSlider2').val(Math.round(value));

		}
	}

	$('.slider2').on('mousedown', function(e){

		moveSlider(e);

		$(this).on('mousemove', function(e){
			moveSlider(e);
		});

	}).on('mouseup', function(){
		$(this).off('mousemove');
	});

	
});
// slider 3
$(document).on('ready', function(){

	function moveSlider(e){
		e.preventDefault();

		var pos 	= $(e.currentTarget).offset()
		,	posX	= e.pageX - pos.left
		,	value	= posX*1/$(e.currentTarget).outerWidth();

		if(posX >= 0 && posX <= $(e.currentTarget).outerWidth()){

			$('.slider3 > .progress3').css('width', posX+'px');
			$('.slider3 > .indicator3').css('left', posX+'px');

			$('#valueSlider3').val(Math.round(value));

		}
	}

	$('.slider3').on('mousedown', function(e){

		moveSlider(e);

		$(this).on('mousemove', function(e){
			moveSlider(e);
		});

	}).on('mouseup', function(){
		$(this).off('mousemove');
	});

	
});
//slider 4

$(document).on('ready', function(){

	function moveSlider(e){
		e.preventDefault();

		var pos 	= $(e.currentTarget).offset()
		,	posX	= e.pageX - pos.left
		,	value	= posX*200/$(e.currentTarget).outerWidth();

		if(posX >= 0 && posX <= $(e.currentTarget).outerWidth()){

			$('.slider4 > .progress4').css('width', posX+'px');
			$('.slider4 > .indicator4').css('left', posX+'px');

			$('#valueSlider4').val(Math.round(value));

		}
	}

	$('.slider4').on('mousedown', function(e){

		moveSlider(e);

		$(this).on('mousemove', function(e){
			moveSlider(e);
		});

	}).on('mouseup', function(){
		$(this).off('mousemove');
	});

	
});


// funcio per previsualitzar una imatge al seleccionarla a un input


	function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

    oFReader.onload = function (oFREvent) {
        document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
	};

	

































