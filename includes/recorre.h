 <?php
$dir = $base."assets/imatges/importar/";
$dir1 = $base."assets/imatges/temp/";
$copiat = 0;


if ( $dh = opendir($dir1) ){
    while(false !== ($fileName = readdir($dh))){
        if (!in_array($fileName, array('.','..'))){
            rename($dir1.$fileName, $dir.$fileName);
        }
    }
}

// Open a known directory, and proceed to read its contents
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
		while ((($file = readdir($dh)) !== false) && ($copiat == 0)) {
			if (strcmp(filetype($dir . $file), "file") == 0 ){
				
				$info = pathinfo($dir.$file);
				if ((strcmp(strtolower($info['extension']), "jpg") == 0 ) || 
				(strcmp(strtolower($info['extension']), "png") == 0 )||
				(strcmp(strtolower($info['extension']), "gif") == 0 )){
					
					if (file_exists($dir1.$file)) {
					} else {
    				rename ($dir.$file, $dir1.$file);
    				$_SESSION['filetreb']=$dir1.$file;
    				$_SESSION['exten']=strtolower($info['extension']);
    				$copiat = 1;
					}					
				}
			}
	   }
        closedir($dh);

    }
}

?>
