<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111733615-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-111733615-2');
</script>
<header class="banner-area"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!--banner nav-->
	<div class="nav-header">
		<!-- header-top -->
		<div class="header-top">
			<div class="container">
				<div class="top-flex">
					<div class="top-area-right text-right">
						<div class="right-header-top">
							<ul>
								<? if($_SESSION["kullanici"] == ""){  ?>
								<a href="<?=$siteayarlari["siteadresi"]?>/serverekle"><i class="fa fa-plus header-top-icon"></i>&nbsp;Server Ekle</a>&nbsp;
								<a href="<?=$siteayarlari["siteadresi"]?>/iletisim"><i class="fa fa-comment header-top-icon"></i>&nbsp;İletişim & Reklam</a>&nbsp;&nbsp;
								<a href="<?=$siteayarlari["siteadresi"]?>/kullanici/uyeol"><i class="fa fa-user-plus header-top-icon"></i>&nbsp;Üye Ol</a>&nbsp;&nbsp;
								<a href="<?=$siteayarlari["siteadresi"]?>/kullanici/uyegiris"><i class="fa fa-sign-in header-top-icon"></i>&nbsp;Giriş Yap</a>&nbsp;&nbsp;
								<? } else { ?>
								<? if($uyebilgi["yonetici"] == "evet"){ ?>
								<a href="<?=$siteayarlari["siteadresi"]?>/yonetim"><i class="fa fa-cog header-top-icon"></i>Yönetim</a>
								<? } ?>
								<a href="<?=$siteayarlari["siteadresi"]?>/serverekle"><i class="fa fa-plus header-top-icon"></i>Server Ekle</a>&nbsp;&nbsp;
								<a href="<?=$siteayarlari["siteadresi"]?>/iletisim"><i class="fa fa-comment header-top-icon"></i>İletişim & Reklam</a>&nbsp;&nbsp;
								<a href="<?=$siteayarlari["siteadresi"]?>/kullanici/cikisyap"><i class="fa fa-sign-out header-top-icon"></i>Çıkış Yap</a>
								<? } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- nav-menu -->
		<div class="eco_nav">
			<div class="container">
	            <nav class="navbar navbar-expand-md navbar-light bg-faded">
	                <?php $reklam_cek1 = mysqli_query($dbbaglanti,"SELECT * FROM reklam WHERE reklamad='logoyani' ORDER BY id asc"); $reklam_cek = mysqli_fetch_array ($reklam_cek1); ?>
	                <a class="navbar-brand navbar-logo" href="<?=$siteayarlari["siteadresi"]?>/"><img src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/images/logo.png" width="225px" height="60px" alt="Pvpler.NET Logo"></a>
                    <div class="nedirnedegildir" style="background-color: white;float: right;width: 65%;"><a href="<?php echo $reklam_cek['reklamtikurl']; ?>"><img src="<?php echo $reklam_cek['reklamresimurl']; ?>" alt="Üst reklam" title="Üst reklam" width="100%" height="100%"></a></div>
					<div style="clear:both;margin-bottom:15px"></div>
					<div class="collapse navbar-collapse main-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav nav ml-auto">
							<li class="nav-item single_nav"><a href="https://www.pvpler.net/metin2-pvp-serverler" rel="follow" title="Metin2 Pvp Serverler" class="nav-link nav-menu">Metin2</a></li>
							<li class="nav-item single_nav"><a href="https://www.pvpler.net/knight" rel="follow" title="Knight Pvp Serverler" class="nav-link nav-menu">Knight</a></li>
							<li class="nav-item single_nav"><a href="https://www.pvpler.net/silkroad" rel="follow" title="Silkroad Pvp Serverler" class="nav-link nav-menu">Silkroad</a></li>
							<li class="nav-item single_nav"><a href="https://www.pvpler.net/minecraft" rel="follow" title="Minecraft" class="nav-link nav-menu">Minecraft</a></li>
							<li class="nav-item single_nav"><a href="https://www.pvpler.net/agario" rel="follow" title="Agario Pvp Serverler" class="nav-link nav-menu">Agario</a></li>
							<li class="nav-item single_nav"><a href="https://www.pvpler.net/transformice" rel="follow" title="Transformice Pvp Serverler" class="nav-link nav-menu">Transformice</a></li>
							<li class="nav-item single_nav"><a href="https://www.pvpler.net/bombom" rel="follow" title="BomBom Pvp Serverler" class="nav-link nav-menu">BomBom</a></li>
							<li class="nav-item single_nav"><a href="https://www.pvpler.net/wow" rel="follow" title="WoW Pvp Serverler" class="nav-link nav-menu">WoW</a></li>
							<li class="nav-item single_nav"><a href="https://www.pvpler.net/cs" rel="follow" title="Conter-Strike Pvp Serverler" class="nav-link nav-menu">Counter-Strike</a></li>
							<li class="nav-item single_nav"><a href="https://www.pvpler.net/blog" rel="follow" title="Blog" class="nav-link nav-menu">Blog</a></li>
							<li class="nav-item single_nav"><a href="https://www.pvpler.net/iletisim" rel="follow" title="Reklam Ver" class="nav-link nav-menu">Reklam VER</a></li>
                        </ul>
                    </div>  
                </nav><!-- END NAVBAR -->
            </div> 
        </div>
	</div><!--banner area-->

</header><!-- End Header -->
  
    <div class="ads-horizontal margin-top-10 margin-bottom-10 hide">
    	<div class="container">
    		<div class="row">
    			<div class="col-sm-12 col-md-12"></div>
    		</div>
    	</div>
    </div>