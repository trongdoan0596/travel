<body style="font-family: monospace;">
<?php
    $key = $_GET['key'];
    if($key!='dg!ff23%}@323'){
        die('Error!');
     } 
	include_once("minifier.php");	
	/* FILES ARRAYs
	 * Keys as input, Values as output */ 
    $fnj = "../themes/web/js/funtions.js"; 	
    $fnc = "../themes/web/css/style.css";
    $js  = array(
		"../themes/web/js/jquery.js"	=> $fnj,
		"../themes/web/js/uikit.min.js" 	=> $fnj,
        "../themes/web/js/components/slideset.min.js" 	=>$fnj,
        "../themes/web/js/components/slideshow.min.js" 	=>$fnj,
        "../themes/web/js/components/slideshow-fx.min.js"=>$fnj,
        "../themes/web/js/components/tooltip.min.js" 	=>$fnj,
        "../themes/web/js/components/accordion.min.js" 	=>$fnj,
        "../themes/web/js/funtions-local.js" 	=>$fnj
	); 
	$css = array(
	    "../themes/web/css/uikit.min.css"=>$fnc,
        "../themes/web/css/components/slidenav.min.css"=>$fnc,
        "../themes/web/css/components/dotnav.min.css"=>$fnc,
        "../themes/web/css/components/slideshow.min.css"=>$fnc,
        "../themes/web/css/components/tooltip.min.css"=>$fnc,
        "../themes/web/css/components/accordion.min.css"=>$fnc,
		"../themes/web/css/style-local.css"=>$fnc
	);
        
    //Mobi
    $fnj = "../themes/mobi/js/funtions.js";
    $fnc = "../themes/mobi/css/style.css";
    $jsm = array(
		"../themes/web/js/jquery.js" 	=> $fnj,
		"../themes/web/js/uikit.min.js" 	=> $fnj,
        "../themes/web/js/components/slideset.min.js" 	=> $fnj,
        "../themes/web/js/components/slideshow.min.js" 	=> $fnj,
        "../themes/web/js/components/slideshow-fx.min.js" 	=> $fnj,
        "../themes/web/js/components/tooltip.min.js" 	=> $fnj,
        "../themes/web/js/components/accordion.min.js" 	=>$fnj,
        "../themes/mobi/js/funtions-local.js" 	=>$fnj
	);        
	$cssm = array(
	    "../themes/web/css/uikit.min.css"=>$fnc,
        "../themes/web/css/components/slidenav.min.css"=>$fnc,
        "../themes/web/css/components/dotnav.min.css"=>$fnc,
        "../themes/web/css/components/slideshow.min.css"=>$fnc,
        "../themes/web/css/components/tooltip.min.css"=>$fnc,
        "../themes/web/css/components/accordion.min.css"=>$fnc,
		"../themes/mobi/css/style-local.css"=>$fnc
	);    	 
    //tablet
    $fnj = "../themes/tablet/js/funtions.js";
    $fnc = "../themes/tablet/css/style.css";
    $jsmtablet = array(
		"../themes/web/js/jquery.js" 	=> $fnj,
		"../themes/web/js/uikit.min.js" 	=> $fnj,
        "../themes/web/js/components/slideset.min.js" 	=> $fnj,
        "../themes/web/js/components/slideshow.min.js" 	=> $fnj,
        "../themes/web/js/components/slideshow-fx.min.js" 	=> $fnj,
        "../themes/web/js/components/tooltip.min.js" 	=> $fnj,
        "../themes/web/js/components/accordion.min.js" 	=>$fnj,
        "../themes/tablet/js/funtions-local.js" 	=>$fnj
	);        
	$csstablet = array(
	    "../themes/web/css/uikit.min.css"=>$fnc,
        "../themes/web/css/components/slidenav.min.css"=>$fnc,
        "../themes/web/css/components/dotnav.min.css"=>$fnc,
        "../themes/web/css/components/slideshow.min.css"=>$fnc,
        "../themes/web/css/components/tooltip.min.css"=>$fnc,
        "../themes/web/css/components/accordion.min.css"=>$fnc,
		"../themes/tablet/css/style-local.css"=>$fnc
	);  
    $type = $_GET['type'];
    if($type=='js'){
        $themes = $_GET['themes'];
        if($themes=='mobi'){
            minifyJS($jsm);
        }elseif($themes=='tablet'){
            minifyJS($jsmtablet);
        }else{
            minifyJS($js);
        }        
    }else{       
        $themes = $_GET['themes'];
        if($themes=='mobi'){
             minifyCSS($cssm);
        }elseif($themes=='tablet'){
             minifyCSS($csstablet);
        }else{
             minifyCSS($css);
        } 
    }	
   //Mobi js
   //https://authentikvietnam.com/tools/minify.php?key=dg!ff23%}@323&type=js&themes=mobi 
   //https://authentikvietnam.com/tools/minify.php?key=dg!ff23%}@323&themes=mobi
   
   //tablet 
   //https://authentikvietnam.com/tools/minify.php?key=dg!ff23%}@323&type=js&themes=tablet  
   //https://authentikvietnam.com/tools/minify.php?key=dg!ff23%}@323&themes=tablet
   
   //Web js
   //https://authentikvietnam.com/tools/minify.php?key=dg!ff23%}@323&type=js 
   //https://authentikvietnam.com/tools/minify.php?key=dg!ff23%}@323
   
   //link khac : https://jscompress.com/
?>
</body>
