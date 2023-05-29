<?php
    defined('YII_DEBUG') or define('YII_DEBUG', false);
    //defined('YII_ENV') or define('YII_ENV', 'dev');
    require('../vendor/autoload.php');
    require('../vendor/yiisoft/yii2/Yii.php');
    require('../common/config/bootstrap.php');
    require('../config/bootstrap.php');
    $config = yii\helpers\ArrayHelper::merge(
        require('../common/config/main.php'),
        require('../config/web.php')
    );
    $application = new yii\web\Application($config);
    ini_set('max_execution_time',8000);
    ini_set('memory_limit', '256M');
    use yii\helpers\Url;
    use common\models\Blog; 
    use common\models\Blogcate; 
    use common\models\Article; 
    use common\models\Tourcate;  
    use common\models\Tour;   
    use common\models\Ourteam;     
    use common\models\Review; 
    //use common\models\Menu;  
    use common\helper\StringHelper;  
    $key = Yii::$app->request->get('key','');
    if($key!='ayM342@)23fg'){
        die('Error!');
     }     
     $lang = 'en';
     $domain_root = 'https://authentiktravel.com';
     $xmldata = '<?xml version="1.0" encoding="utf-8"?>'; 
	 $xmldata .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"';
	 $xmldata .= ' xmlns:news="http://www.google.com/schemas/sitemap-news/0.9" ';
	 $xmldata .= ' >';
     $lastmod = date("Y-m-d");   
     $i=0;	
     $xmldata .= '<url>';    
     $xmldata .= ' <loc xml:lang="'.$lang.'">'.$domain_root.'</loc>';   
     $xmldata .= ' <changefreq>Daily</changefreq>';
     $xmldata .= ' <priority>1.0</priority>';				  
     $xmldata .= ' </url>';   
    
     /*********Article*************/
        /*********Tourcate*************/
     $rows = Tourcate::find()->where('status=1 AND id>1')->orderBy('id desc')->all(); 
     if(!empty($rows)){
         foreach ($rows as $row) {	
            	    $id        =  $row->id;
					if($row->last_update=='0000-00-00 00:00:00'){
                        $lastmod  = date("Y-m-d",strtotime($row->create_date));
                    }else{
                        $lastmod  = date("Y-m-d",strtotime($row->last_update));
                    }
                    $titlelink = '#'; 
                    if(trim($row->alias)!=''){
                            $titlelink  = StringHelper::formatUrlKey($row->alias); 
                       }else{
                            $titlelink  = StringHelper::formatUrlKey($row->title);
                       }      
                    $link      = 'https://authentiktravel.com/'.$titlelink; 
 			    	$xmldata .= '<url>';
					$xmldata .= ' <loc xml:lang="'.$lang.'">'.$link.'</loc>';
					//$xmldata .= ' <lastmod>'.$lastmod.'</lastmod>';
					$xmldata .= ' <changefreq>Daily</changefreq>';
					$xmldata .= ' <priority>0.8</priority>';				  
					$xmldata .= ' </url>';
					$i++;
          }        
     } 
     /*********Tour*************/
     $rows = Tour::find()->where('status=1')->orderBy('id desc')->all(); 
     if(!empty($rows)){
         foreach ($rows as $row) {	
            	    $id        =  $row->id;
					if($row->last_update=='0000-00-00 00:00:00'){
                        $lastmod  = date("Y-m-d",strtotime($row->create_date));
                    }else{
                        $lastmod  = date("Y-m-d",strtotime($row->last_update));
                    }
                    $titlelink = '#'; 
                    if(trim($row->alias)!=''){
                            $titlelink  = StringHelper::formatUrlKey($row->alias); 
                       }else{
                            $titlelink  = StringHelper::formatUrlKey($row->title);
                       }                          
                    $link      = 'https://authentiktravel.com/package-holidays-tours/'.$titlelink;                         
 			    	$xmldata .= '<url>';
					$xmldata .= ' <loc xml:lang="'.$lang.'">'.$link.'</loc>';
					//$xmldata .= ' <lastmod>'.$lastmod.'</lastmod>';
					$xmldata .= ' <changefreq>Daily</changefreq>';
					$xmldata .= ' <priority>0.8</priority>';				  
					$xmldata .= ' </url>';
					$i++;
          }        
     } 
     /*********Blogcate*************/
     $rows = Blogcate::find()->where('status=1 AND id>1')->orderBy('id desc')->all(); 
     if(!empty($rows)){
         foreach ($rows as $row) {	
            	    $id        =  $row->id;
					if($row->last_update=='0000-00-00 00:00:00'){
                        $lastmod  = date("Y-m-d",strtotime($row->create_date));
                    }else{
                        $lastmod  = date("Y-m-d",strtotime($row->last_update));
                    }
                    $titlelink = '#'; 
                    if(trim($row->alias)!=''){
                            $titlelink  = StringHelper::formatUrlKey($row->alias); 
                       }else{
                            $titlelink  = StringHelper::formatUrlKey($row->title);
                       }      
                    $link      = 'https://authentiktravel.com/blog-travel-vietnam/'.$titlelink;                      
 			    	$xmldata .= '<url>';
					$xmldata .= ' <loc xml:lang="'.$lang.'">'.$link.'</loc>';
					//$xmldata .= ' <lastmod>'.$lastmod.'</lastmod>';
					$xmldata .= ' <changefreq>Daily</changefreq>';
					$xmldata .= ' <priority>0.8</priority>';				  
					$xmldata .= ' </url>';
					$i++;
          }        
     } 
     /*********Blog*************/
     $rows = Blog::find()->where('status=1')->orderBy('id desc')->all(); 
     if(!empty($rows)){
         foreach ($rows as $row) {	
            	    $id        =  $row->id;
					if($row->last_update=='0000-00-00 00:00:00'){
                        $lastmod  = date("Y-m-d",strtotime($row->create_date));
                    }else{
                        $lastmod  = date("Y-m-d",strtotime($row->last_update));
                    }
                    $titlelink = '#'; 
                    if(trim($row->alias)!=''){
                            $titlelink  = StringHelper::formatUrlKey($row->alias); 
                       }else{
                            $titlelink  = StringHelper::formatUrlKey($row->title);
                       }      
                    $link      = 'https://authentiktravel.com/'.$titlelink; 
                    //$link      = 'http://authentikvietnam.com/'.Blog::createUrl($row);
 			    	$xmldata .= '<url>';
					$xmldata .= ' <loc xml:lang="'.$lang.'">'.$link.'</loc>';
					//$xmldata .= ' <lastmod>'.$lastmod.'</lastmod>';
					$xmldata .= ' <changefreq>Daily</changefreq>';
					$xmldata .= ' <priority>0.8</priority>';				  
					$xmldata .= ' </url>';
					$i++;
          }        
     }    
   //Review  
        $rows = Review::find()->where('status=1')->orderBy('id desc')->all(); 
        if(!empty($rows)){
                 foreach ($rows as $row) {	
                    	    $id  =  $row->id;
        					if($row->last_update=='0000-00-00 00:00:00'){
                                $lastmod  = date("Y-m-d",strtotime($row->create_date));
                            }else{
                                $lastmod  = date("Y-m-d",strtotime($row->last_update));
                            }
                            $titlelink = '#'; 
                            if(trim($row->alias)!=''){
                                    $titlelink  = StringHelper::formatUrlKey($row->alias); 
                               }else{
                                    $titlelink  = StringHelper::formatUrlKey($row->title);
                            }                            
                            $link      = 'https://authentiktravel.com/clients-reviews/'.$titlelink;                           
         			    	$xmldata .= '<url>';
        					$xmldata .= ' <loc xml:lang="'.$lang.'">'.$link.'</loc>';
        					//$xmldata .= ' <lastmod>'.$lastmod.'</lastmod>';
        					$xmldata .= ' <changefreq>Daily</changefreq>';
        					$xmldata .= ' <priority>0.8</priority>';				  
        					$xmldata .= ' </url>';
        					$i++;
                  }        
             }
    /*********ourteam*************/
    $rows = Ourteam::find()->where('status=1')->orderBy('id desc')->all(); 
     if(!empty($rows)){
         foreach ($rows as $row) {	
            	    $id        =  $row->id;
					if($row->last_update=='0000-00-00 00:00:00'){
                        $lastmod  = date("Y-m-d",strtotime($row->create_date));
                    }else{
                        $lastmod  = date("Y-m-d",strtotime($row->last_update));
                    }
                    $titlelink  = StringHelper::formatUrlKey($row->title);                       
                    $link      = 'https://authentiktravel.com/authentik-travel-team/'.$id.'/'.$titlelink;                   
 			    	$xmldata .= '<url>';
					$xmldata .= '<loc xml:lang="'.$lang.'">'.$link.'</loc>';
					//$xmldata .= '<lastmod>'.$lastmod.'</lastmod>';
					$xmldata .= '<changefreq>Daily</changefreq>';
					$xmldata .= '<priority>0.8</priority>';				  
					$xmldata .= '</url>';
					$i++;
          }        
     }
     $xmldata .= '<url>';
     $xmldata .= ' <loc xml:lang="'.$lang.'">'.$domain_root.'/package-holidays-tours</loc>';
     //$xmldata .= ' <lastmod>'.$lastmod.'</lastmod>';
     $xmldata .= ' <changefreq>Daily</changefreq>';
     $xmldata .= ' <priority>0.8</priority>';				  
     $xmldata .= ' </url>'; 
     $xmldata .= '<url>';
     $xmldata .= ' <loc xml:lang="'.$lang.'">'.$domain_root.'/clients-reviews</loc>';
     //$xmldata .= ' <lastmod>'.$lastmod.'</lastmod>';
     $xmldata .= ' <changefreq>Daily</changefreq>';
     $xmldata .= ' <priority>0.8</priority>';				  
     $xmldata .= ' </url>'; 
     $xmldata .= '<url>';
     $xmldata .= ' <loc xml:lang="'.$lang.'">'.$domain_root.'/authentik-travel-team</loc>';
     //$xmldata .= ' <lastmod>'.$lastmod.'</lastmod>';
     $xmldata .= ' <changefreq>Daily</changefreq>';
     $xmldata .= ' <priority>0.8</priority>';				  
     $xmldata .= ' </url>';    
     $xmldata .= '<url>';
     $xmldata .= ' <loc xml:lang="'.$lang.'">'.$domain_root.'/before-the-trips</loc>';
     //$xmldata .= ' <lastmod>'.$lastmod.'</lastmod>';
     $xmldata .= ' <changefreq>Daily</changefreq>';
     $xmldata .= ' <priority>0.8</priority>';				  
     $xmldata .= ' </url>';
     $xmldata .= '<url>';
     $xmldata .= ' <loc xml:lang="'.$lang.'">'.$domain_root.'/useful-information</loc>';
     //$xmldata .= ' <lastmod>'.$lastmod.'</lastmod>';
     $xmldata .= ' <changefreq>Daily</changefreq>';
     $xmldata .= ' <priority>0.8</priority>';				  
     $xmldata .= ' </url>';
     $xmldata .= '<url>';    
     $xmldata .= ' <loc xml:lang="'.$lang.'">'.$domain_root.'/blog-travel-vietnam-myanmar</loc>';
     //$xmldata .= ' <lastmod>'.$lastmod.'</lastmod>';
     $xmldata .= ' <changefreq>Daily</changefreq>';
     $xmldata .= ' <priority>0.8</priority>';				  
     $xmldata .= ' </url>'; 
     $xmldata .= '<url>';    
     $xmldata .= ' <loc xml:lang="'.$lang.'">'.$domain_root.'/contact-us</loc>';
     //$xmldata .= ' <lastmod>'.$lastmod.'</lastmod>';
     $xmldata .= ' <changefreq>Daily</changefreq>';
     $xmldata .= ' <priority>0.8</priority>';				  
     $xmldata .= ' </url>'; 
     $xmldata .= '<url>';    
     $xmldata .= ' <loc xml:lang="'.$lang.'">'.$domain_root.'/a-propos-de-nous</loc>';
     //$xmldata .= ' <lastmod>'.$lastmod.'</lastmod>';
     $xmldata .= ' <changefreq>Daily</changefreq>';
     $xmldata .= ' <priority>0.8</priority>';				  
     $xmldata .= ' </url>';  
     $xmldata .= '<url>';     
     $xmldata .= ' <loc xml:lang="'.$lang.'">'.$domain_root.'/before-the-trips</loc>';
     //$xmldata .= ' <lastmod>'.$lastmod.'</lastmod>';
     $xmldata .= ' <changefreq>Daily</changefreq>';
     $xmldata .= ' <priority>0.8</priority>';				  
     $xmldata .= ' </url>';       
     $xmldata .= '</urlset>';
 if(file_put_contents('../sitemap.xml',$xmldata)){	
        ini_set('memory_limit','8M');   
        echo "DONE :".($i);
        die();
 }    
/**********************************/        
//config on godaday: /usr/bin/wget -O - -q "https://authentiktravel.com/tools/cronsitemap.php?key=ayM342@)23fg" > /dev/null 2>&1 
//https://authentiktravel.com/sitemap.xml
//https://authentiktravel.com/tools/cronsitemap.php?key=ayM342@)23fg
?>