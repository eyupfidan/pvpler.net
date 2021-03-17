<?php
session_start();
ob_start();
include "../kaynak/dbbaglanti.php";
include "../kaynak/fonksiyon.php";
include "../kaynak/linkduzenle.php";

$siteayarlaricek =mysqli_query($dbbaglanti,"select * from siteayarlari where id='1'");
$siteayarlari = mysqli_fetch_array($siteayarlaricek);

    if (isset($_SESSION["kullanici"])){ 
	  $uyekullaniciadi = $_SESSION["kullanici"];
$uyekullanicibilgicek =mysqli_query($dbbaglanti,"select * from uye where kadi='$uyekullaniciadi'");
$uyebilgi = mysqli_fetch_array($uyekullanicibilgicek);
$kullanicisession = $_SESSION["kullanici"];
		}else{
		$kullanicisession = $_SESSION["kullanici"];
		}


$serverurl = $_GET["serverurl"];
$serverbilgicek = mysqli_query($dbbaglanti,"select * from serverlar where serverurl='$serverurl'");
$serverbilgi = mysqli_fetch_array($serverbilgicek);
?>
<!DOCTYPE html>
<html lang="tr">
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="Cache-Control" content="no-cache">
<meta id="Content-Language" http-equiv="Content-Language" content="tr"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="rating" content="general"/>
<meta name="robots" content="all">
<meta name="robots" content="noindex,nofollow">
<meta name="revisit-after" content="1 days"/>
<meta name="keywords" content="yönetim, admin" />
<meta name="description" content="yönetim"/>
<meta name="keyphrases" content="yönetim">
<meta name="subject" content="yönetim">
<meta name="copyright" content="<?=$siteayarlari["copyright"]?>"/>
<meta name="author" content="byhazerfen, info@byhazerfen.com">
<meta name="designer" content="ByHazerfen">
<meta name="url" content="<?='http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>">
<meta name="generator" content="<?=$siteayarlari["surum"]?>"/>
<link rel='dns-prefetch' href='//fonts.googleapis.com'/>
<link rel="shortcut icon" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/images/favicon.ico"/>
<link rel="search" href="<?=$siteayarlari["siteadresi"]?>/arama-log.xml"/>
<link rel="canonical" href="<?=$siteayarlari["siteadresi"]?>/yönetim"/>
<meta name="x-canonical-url" content="/"/>
<meta name="google-site-verification" content="8dLU-coe3gpNfykS8Qs947RepkoqsU1xym4-M5Wg41g" />
<meta property="og:locale" content="tr_TR" />
<meta property="og:type" content="website" />
<meta property="og:title" content="yönetim" />
<meta property="og:description" content="yönetim" />
<meta property="og:url" content="<?='http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>">  
<meta property="og:site_name" content="<?=$siteayarlari["siteadi"]?>">  
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:description" content="yönetim" />
<meta name="twitter:title" content="yönetim" />
<meta name="twitter:site" content="@serverlarshcom" />
<meta name="twitter:creator" content="@serverlarshcom" />
<link rel="manifest" href="/manifest.json">
<title>Yönetim | <?=$siteayarlari["siteadi"]?></title>
<link rel="stylesheet" type="text/css" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/css/font.css" />
<link rel="stylesheet" type="text/css" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/css/style.min.css?v=0.2" />
<link rel="stylesheet" type="text/css" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/css/helper.min.css" />
<link rel="stylesheet" type="text/css" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/social-share/css/social-share-kit.css" />
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-45759128-12"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-45759128-12');
</script>

  </head>
  <body>
<?php include_once("../kaynak/ustkisim.php") ?>

    
    <div id="main" class="container">
    	<div class="row">
<div class="col-md-8">
	<div class="panel panel-black">
	   <div class="panel-heading">
	   			   			<h1 class="panel-title">Yönetim</h1>
	   				</div>
		<div class="panel-body">
		<? if($uyebilgi["yonetici"] == "hayir" or $uyebilgi["yonetici"] == ""){
  echo '<div class="alert alert-danger">

<div class="message">Yetkisiz Erişim Yaptınız.</div></div>';
}else{  			?>

					
<table class="table table-server-list no-margin-bottom"  > 
      <thead>
        <tr>
          <th><a href="<?=$siteayarlari["siteadresi"]?>/yonetim/uye" style="color:white">Tüm Üyeler</a></th>
          <th><a href="<?=$siteayarlari["siteadresi"]?>/yonetim/reklam" style="color:white">Reklam Ayarları</a></th>
          <th><a href="<?=$siteayarlari["siteadresi"]?>/yonetim/blogyaziekle" style="color:white">Blog Yazı Ekle</a></th>
          <th><a href="<?=$siteayarlari["siteadresi"]?>/yonetim/iletisim" style="color:white">İletişim Düzenle</a></th>
          <th><a href="<?=$siteayarlari["siteadresi"]?>/yonetim/sifirla" style="color:white">Sıfırla</a></th>		  
        </tr>
      </thead>
	   <tbody><tr>
               <th colspan="5">Yukarıdaki menüler sayesinde işlem yapabilirsiniz. </th>                  
									
	</tr></tbody>
	  	                  

    </table><br>
			 			<?
	if($_POST['duzenle'])
	{
	    $bugun = date("Y-m-d");
		$serverurl = $_GET["serverurl"];

	$baslik = addslashes($_POST["baslik"]);
	$vip = addslashes($_POST["vip"]);
	$durum = addslashes($_POST["durum"]);
	$site = addslashes($_POST["site"]);
	$tanitim = addslashes($_POST["article"]);
	$goruntulenme = addslashes($_POST["goruntulenme"]);


	{
mysqli_query($dbbaglanti,"update serverlar set serverbaslik='$baslik', servervip='$vip', serverdurum='$durum', serversite='$site', servergoruntulenme='$goruntulenme', servertarih='$bugun' where serverurl='$serverurl'") or die("Hata Olustu!".mysqli_error());	
echo"<center>Server Güncellendi.<br><a href='".$siteayarlari->siteadresi."/yonetim/serverduzenle/".$serverurl."'>Geri Dön</a></center>";}
	} 
	
	?>
				<form class="form-fv" method="post" action="#" data-process="hideBtn" data-ckeditor="true">


			  <div class="form-group">
			    <label for="username">Başlık</label>
			    <input type="text" class="form-control input-black" id="name" value="<?=$serverbilgi["serverbaslik"]?>" name="baslik" placeholder="Konu Başlık"
			    maxlength="2555" data-fv-stringlength-trim="true" autocomplete="off" required>
			  </div>
			  	  			  <div class="form-group">
			    <label for="username">Vip</label>
			    <select class="form-control input-black" name="vip" id="subType" required>
								<option value="<? echo $serverbilgi["servervip"];?>" ><? echo $serverbilgi["servervip"];?> | Seçili</option>

					<option value="evet">Evet</option>
					<option value="hayir">Hayir</option>
			    </select>
			  </div></br>
			  
			  <?php if ($serverbilgi["servervip"] == "evet") { ?>
				<div class="form-group">
			    <label for="username"><a style="font-weight: normal; color: #969595;">Vip Olarak Eklendiği Tarih: </a><? echo $serverbilgi["servertarih"];?></label>
			    </div>
								
                <?php } ?>
			  
			  			  	  			  </br><div class="form-group">
			    <label for="username">Durum</label>
			    <select class="form-control input-black" name="durum" id="subType" required>
								<option value="<? echo $serverbilgi["serverdurum"];?>" ><? echo $serverbilgi["serverdurum"];?> | Seçili</option>
					<option value="Sunucu Kapalı">Sunucu Kapalı</option>
					<option value="Sunucu Açık">Sunucu Açık</option>
			    </select>
			  </div>
			  
			  		  <div class="form-group">
			    <label for="username">Site</label>
			    <input type="text" class="form-control input-black" id="name" value="<?=$serverbilgi["serversite"]?>" name="site" placeholder="Site"
			    maxlength="2555" data-fv-stringlength-trim="true" autocomplete="off" required>
			  </div>
		 
			  <div class="form-group">
			    <label for="article">Tanıtım </label>
			    <textarea class="form-control" name="article" id="tanitim"><?=$serverbilgi["serverdetay"]?></textarea>
			    <span class="help-block">Boş, bilgi vermeyen, karmaşık ve kopyala yapıştır tanıtımlar onaylanmaz. Lütfen sade ve anlaşılır bir dille tanıtımınızı yazınız</span>
			  </div>
			                  <input type="submit" name ="duzenle" class="btn btn-primary" value="Düzenle">

			</form>
		

		<? 
							
						} ?>
		</div>
	</div>

	
	
	
		
	
</div>
<?php include_once("../kaynak/sagkisim.php") ?>

			<div class="col-md-12">
	<div class="col-md-8 no-padding hidden-xs">
		<ul class="list-unstyled list-inline">
			<li><a href="<?=$siteayarlari["siteadresi"]?>/" class="color-grey-500" title="pvp serverler">Pvp Serverler </a> |</li>
			<li><a href="<?=$siteayarlari["siteadresi"]?>/metin2-pvp-serverler" class="color-grey-500" title="metin2 pvp">Metin2 pvp serverler listesi </a> |</li>
			<li><a href="<?=$siteayarlari["siteadresi"]?>bombom" class="color-grey-500" title="BomBom pvp serverler">BomBom Pvp Serverler</a> |</li>
			<li><a href="<?=$siteayarlari["siteadresi"]?>/knight" class="color-grey-500" title="Knight pvp serverler">Knight Pvp Serverler</a></li>
			</li>
		</ul>
	</div>
	<div class="col-md-4 no-padding text-right">
		Copyright <a href="<?=$siteayarlari["siteadresi"]?>/">www.pvpler.net</a>
	</div> 
</div>    	</div>
    </div>
    <div class="modal fade" id="generalModal" tabindex="-1" role="dialog" aria-labelledby="generalModal" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
			
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<script type="text/javascript" src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/jquery.min.js"></script>
<script type="text/javascript" src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/social-share/js/social-share-kit.min.js"></script>
<script type="text/javascript" src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/js/app.js"></script>
<script type="text/javascript" src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/js/modal.js"></script>
<script type="text/javascript" src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>
<script type="text/javascript" src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/js/form.js"></script>
<script type="text/javascript" src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/jquery-form/jquery.form.min.js"></script>
<script type="text/javascript" src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/formvalidation/dist/js/formValidation.min.js"></script>
<script type="text/javascript" src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/formvalidation/dist/js/framework/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/formvalidation/dist/js/language/tr_TR.js"></script>
<script type="text/javascript" src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>


	<script>
	$("img").error(function () {
		  $(this).remove();
	});
	</script>
	<script type="text/javascript">
			SocialShareKit.init({
			    selector: '.ssk',
			    url: '<?=$siteayarlari["siteadresi"]?>/',

			});


	</script>
	<script type="text/javascript">
			
            CKEDITOR.replace( 'tanitim',
                {
                    toolbar :
                    [
                ['Undo','Redo'],
                ['Image','Link','Unlink'],
                ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
                ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],	
                ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
                ['BidiLtr', 'BidiRtl'],
                '/',
                ['Styles','Format','Font','FontSize'],
                ['TextColor','BGColor'],
                ['Maximize', 'ShowBlocks']
            
                    ]
					
					
                });
				
            
            CKEDITOR.replace("tanitim");
            </script>
			 <script type="text/javascript" src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/ckeditor/ckeditor.js"></script>

  </body>

</html>