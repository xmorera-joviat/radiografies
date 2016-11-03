<?php
$dir1 = "imatges/importar/";
$dir = "imatges/temp/";

if (is_dir($dir)) {
	if ($dh = opendir($dir)) {
		while ((($file = readdir($dh)) !== false)) {
			if (strcmp(filetype($dir . $file), "file") == 0 ){
				
				$info = pathinfo($dir.$file);
				if ((strcmp(strtolower($info['extension']), "jpg") == 0 ) || 
					(strcmp(strtolower($info['extension']), "png") == 0 )||
					(strcmp(strtolower($info['extension']), "gif") == 0 )){
					

				$files = glob($dir."*");
				$now   = time();

//agafa les fotos de la carpeta temp que tinguin una data de modificació anterior a un dia i
//les mou a la carpeta importar.

				foreach ($files as $file)
				if (is_file($file)){
					rename ($file, $dir1."*");   //s'ha de desactivar un cop la Laura puji les radios i descomentar l'if 25-27
					     // if ($now - filemtime($file) >= 60 * 60 * 24 * 1){
					     // 	rename ($file, $dir1."*");	
					     // }
					  }
					}
				}
			}
		}
		closedir($dh);

	}

	?>