<?php
session_start();
ob_start();
include "../kaynak/dbbaglanti.php";
include "../kaynak/fonksiyon.php";

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
?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>Güncel Blog Yazıları | <?=$siteayarlari["siteadi"]?></title>
<meta name="rating" content="general"/>
<meta name="robots" content="all">
<meta name="robots" content="index,follow">
<meta name="revisit-after" content="1 days"/>
<meta name="description" content="Pvp serverlerle ilgili, güncel haberler, admin komutları, gm kodları, oyun içi şifreler gibi bir çok makalemizi blogumuzda bulabilirsiniz."/>
<meta name="copyright" content="<?=$siteayarlari["copyright"]?>"/>
<meta name="url" content="<?='http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>">
<link rel='dns-prefetch' href='//fonts.googleapis.com'/>
<link rel="shortcut icon" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/images/favicon.ico"/>
<link rel="canonical" href="<?=$siteayarlari["siteadresi"]?>/blog"/>
<meta name="x-canonical-url" content="/"/>

<meta property="og:locale" content="tr_TR" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Güncel Blog Yazıları | <?=$siteayarlari["siteadi"]?>" />
<meta property="og:description" content="Pvp serverlerle ilgili, güncel haberler, admin komutları, gm kodları, oyun içi şifreler gibi bir çok makalemizi blogumuzda bulabilirsiniz." />
<meta property="og:url" content="<?='http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>">  
<meta property="og:site_name" content="<?=$siteayarlari["siteadi"]?>">  

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:description" content="Pvp serverlerle ilgili, güncel haberler, admin komutları, gm kodları, oyun içi şifreler gibi bir çok makalemizi blogumuzda bulabilirsiniz." />
<meta name="twitter:title" content="Güncel Blog Yazıları | <?=$siteayarlari["siteadi"]?>" />
<meta name="twitter:site" content="@pvpler_net" />
<meta name="twitter:creator" content="@pvpler_net" />

<link rel="stylesheet" type="text/css" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/css/font.css" />
<link rel="stylesheet" type="text/css" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/css/style.min.css?v=0.2" />
<link rel="stylesheet" type="text/css" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/css/helper.min.css" />
<link rel="stylesheet" type="text/css" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/social-share/css/social-share-kit.css" />

  </head>
  <body>
<?php include_once("../kaynak/ustkisim.php") ?>

    
    <div id="main" class="container">
    	<div class="row">
<div class="col-md-8">
	<div class="panel panel-black">
	   <div class="panel-heading">
	   			   			<h1 class="panel-title font-size-24">Blog</h1>
	   				</div>
		<div class="panel-body" >

	   					<table class="table table-server-list no-margin-bottom"  > 
				<thead> 
					<tr> 
						<th>#</th> 
						<th>Kategori</th>
						<th>Başlık</th> 
						<th>Tarih</th>  
						<th>Görüntülenme</th>  
						<th>Durum</th>  

					</tr> 
				</thead> 
				<tbody> 
		
<?
  $sayfada = 30; // sayfada gösterilecek içerik miktarını belirtiyoruz.
 
$sorgu =mysqli_query($dbbaglanti,'SELECT COUNT(*) AS toplam FROM blog where durum = "aktif"');
$sonuc = mysqli_fetch_assoc($sorgu);
$toplam_icerik = $sonuc['toplam'];
 
$toplam_sayfa = ceil($toplam_icerik / $sayfada);
//
// eğer sayfa girilmemişse 1 varsayalım.
$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
 if($_GET['sayfa']==1)
 {
	   $iz = 1;

 }else{
	  $deger = 30;
	  $carp = $_GET['sayfa'];
	  $iz = $deger*$carp;
 }
// eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
if($sayfa < 1) $sayfa = 1; 
 
// toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 
//
// kaçıncı içerikten başlanacağını ifade edecek limit değeri.
$limit = ($sayfa - 1) * $sayfada;
 
$sorgu =mysqli_query($dbbaglanti,'SELECT * FROM blog where durum = "aktif"  order by id desc LIMIT ' . $limit . ', ' . $sayfada);

  while($sonal = mysqli_fetch_array($sorgu))
  {

  echo'
  
  	<tr> 
<th>'.$iz++.'</th> 
<td>'.$sonal["kategori"].'</td>		
<td><strong><a href="'.$siteayarlari["siteadresi"].'/blog/'.$sonal["url"].'">'.$sonal["baslik"].'</a></strong></td> 
<th>'.$sonal["tarih"].'</td>		 
<th>'.$sonal["goruntulenme"].'</td>		 
<td style="color:#0C3;">'.$sonal["durum"].'</td>
</tr>
  
 				
 
  ';
  
  $i++;
  }  //Fonksiyon
?>
	  		
								
									</tbody> 
			</table>
			<div class="col-md-12 no-padding margin-top-10">
			  <?

 
if($sayfa != 0) echo '<a href="'.$siteayarlari["siteadresi"].'/blog/s/1" class="btn btn-black pull-left margin-right-5"><i class="fa fa-angle-double-left"></i></a> ';
 
if($sayfa == 1){

}else{
	$sayfadeger = $sayfa-1;
echo'	<a href="'.$siteayarlari["siteadresi"].'/blog/s/'.$sayfadeger.'" class="btn btn-black pull-left">Geri</a>';

}
 if($sayfa != $toplam_sayfa){ echo '
									<a href="'.$siteayarlari["siteadresi"].'/blog/s/'.$toplam_sayfa.'" class="btn btn-black pull-right"> <i class="fa fa-angle-double-right"></i></a>

';}
 if($sayfa == $toplam_sayfa){

}else{
	$sayfadeger = $sayfa+1;
echo'	<a href="'.$siteayarlari["siteadresi"].'/blog/s/'.$sayfadeger.'" class="btn btn-black pull-right margin-right-5">İleri</a>';

}
 


			?>
													

				  
				<div class="clearfix"></div>        
			</div>
		</div>
	</div>

	
	
	
		
	
</div>
<?php include_once("../kaynak/sagkisim.php") ?>

			<div class="col-md-12">
	<div class="col-md-8 no-padding hidden-xs">
		<ul class="list-unstyled list-inline">
			<li><a href="<?=$siteayarlari["siteadresi"]?>/" class="color-grey-500" title="pvp serverler">Pvp Serverler </a> |</li>
			<li><a href="<?=$siteayarlari["siteadresi"]?>/metin2-pvp-serverler" class="color-grey-500" title="metin2 pvp">Metin2 pvp serverler listesi </a> |</li>
			<li><a href="<?=$siteayarlari["siteadresi"]?>/bombom" class="color-grey-500" title="BomBom pvp serverler">BomBom Pvp Serverler</a> |</li>
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
  </body>

</html>