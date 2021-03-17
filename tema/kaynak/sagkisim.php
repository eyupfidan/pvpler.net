<?php

$metin2toplamcek =mysqli_query($dbbaglanti,"SELECT * FROM serverlar where serverkategori='Metin2'");
$metin2toplam = mysqli_num_rows($metin2toplamcek);

$knighttoplamcek =mysqli_query($dbbaglanti,"SELECT * FROM serverlar where serverkategori='Knight'");
$knighttoplam = mysqli_num_rows($knighttoplamcek);

$silkroadtoplamcek =mysqli_query($dbbaglanti,"SELECT * FROM serverlar where serverkategori='Silkroad'");
$silkroadtoplam = mysqli_num_rows($silkroadtoplamcek);

$minecrafttoplamcek =mysqli_query($dbbaglanti,"SELECT * FROM serverlar where serverkategori='Minecraft'");
$minecrafttoplam = mysqli_num_rows($minecrafttoplamcek);

$agariotoplamcek =mysqli_query($dbbaglanti,"SELECT * FROM serverlar where serverkategori='Agario'");
$agariotoplam = mysqli_num_rows($agariotoplamcek);

$transformicetoplamcek =mysqli_query($dbbaglanti,"SELECT * FROM serverlar where serverkategori='Transformice'");
$transformicetoplam = mysqli_num_rows($transformicetoplamcek);

$bombomtoplamcek =mysqli_query($dbbaglanti,"SELECT * FROM serverlar where serverkategori='Bombom'");
$bombomtoplam = mysqli_num_rows($bombomtoplamcek);

$wowtoplamcek =mysqli_query($dbbaglanti,"SELECT * FROM serverlar where serverkategori='Wow'");
$wowtoplam = mysqli_num_rows($wowtoplamcek);

$cstoplamcek =mysqli_query($dbbaglanti,"SELECT * FROM serverlar where serverkategori='CS'");
$cstoplam = mysqli_num_rows($cstoplamcek);

$uyetoplamcek =mysqli_query($dbbaglanti,"SELECT * FROM uye");
$uyetoplam = mysqli_num_rows($uyetoplamcek);

$gunluk_istatistik1 = mysqli_query($dbbaglanti,"SELECT * FROM gunlukistatistik ORDER BY id DESC LIMIT 1");

$reklam_cek1 = mysqli_query($dbbaglanti,"SELECT * FROM reklam WHERE reklamad='tanitimsag' ORDER BY id asc");
$reklam_cek = mysqli_fetch_array ($reklam_cek1);

$deger='778';

?>

<style>.a-title-pvpler {color: #FFF;padding-bottom: 10px;font-weight: 400!important;font-size: 20px!important;font-family: Tahoma;}</style>

<div class="col-md-4">
	<div class="panel panel-black">
		<div class="panel-heading">
			<a class="a-title-pvpler">Reklam alanı</a>
		</div>
		<div class="panel-body text-center">
			<div class="ssk-group">
			    <a href="<?php echo $reklam_cek['reklamtikurl']; ?>" target="_blank"><img src="<?php echo $reklam_cek['reklamresimurl']; ?>" alt="Sağ reklam" title="Sağ reklam" width="100%" height="100%"/></a>
			</div>			
		</div>
	</div>
<br />

    <div class="panel panel-black">
		<div class="panel-heading">
			<a class="a-title-pvpler">Blog Son Eklenenler</a>
		</div>
		<div class="panel-body">
			<ul class="panel-list">
							    	 <?php
  	$byhazerfenselinayblogceksorgu = mysqli_query($dbbaglanti,"SELECT * FROM blog where durum='aktif' order by id limit 10");
	while($blogdetay = mysqli_fetch_array($byhazerfenselinayblogceksorgu)){ 			
echo'
<li>
<a href="'.$siteayarlari["siteadresi"].'/blog/'.$blogdetay["url"].'" title="'.$blogdetay["baslik"].'">'.$blogdetay["baslik"].'</a>
<span class="count pull-right">'.$blogdetay["goruntulenme"].'</span>
<span class="clearfix"></span>
</li>';  }
		?>
							    	
							</ul>
		</div></div> 
		<?php
		$tanitimsagcek =mysqli_query($dbbaglanti,"select * from reklam where reklamad='tanitimsag'");
$tanitimsagdetay = mysqli_fetch_array($tanitimsagcek); ?>
			<div class="visible-md visible-lg margin-bottom-15 <?=$tanitimsagdetay["reklamaktif"]?>">

	</div>
	<div class="panel panel-black">
	  <div class="panel-heading">
	    <a class="a-title-pvpler">Alt Navigasyon Menü</a>
	  </div>
	  <div class="panel-body">
	    <ul class="panel-list unstyled">
	    	<li>
	    		
	    		<a class="footericin" href="https://www.pvpler.net/metin2-pvp-serverler"><img src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/images/metin2.png" width="20" height="20" alt="Metin2 pvp serverler" title="Metin2 pvp serverler"> Metin2 Pvp Serverler</a>
	    		<span class="count pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?echo''.$metin2toplam.'';?></span>
	    	</li>
			<br />
	    	<li>
	    		<a class="footericin" href="https://www.pvpler.net/knight"><img src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/images/knight.png" width="20" height="20" alt="Knight Pvp Serverler"> Knight Pvp Serverler</a>
	    		<span class="count pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?echo''.$knighttoplam.'';?></span>
	    	</li>	
			<br />
	    	<li>
	    		<a class="footericin" href="https://www.pvpler.net/silkroad"><img src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/images/silkroad.png" width="20" height="20" alt="Silkroad Pvp Serverler"> Silkroad Pvp Serverler</a>
	    		<span class="count pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?echo''.$silkroadtoplam.'';?></span>
	    	</li>	
			<br />
				    	<li>
	    		<a class="footericin" href="https://www.pvpler.net/minecraft"><img src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/images/minecraft.png" width="20" height="20" alt="Minecraft Pvp Serverler"> Minecraft Pvp Serverler</a>
	    		<span class="count pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?echo''.$minecrafttoplam.'';?></span>
	    	</li>	  
			<br />
			<li>
	    		<a class="footericin" href="https://www.pvpler.net/agario"><img src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/images/agario.png" width="20" height="20" alt="Agario Pvp Serverler"> Agario Pvp Serverler</a>
	    		<span class="count pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?echo''.$agariotoplam.'';?></span>
	    	</li>
			<br />
				    	<li>
	    		<a class="footericin" href="https://www.pvpler.net/transformice"><img src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/images/transformice.png" width="20" height="20" alt="Transformice Pvp Serverler"> Transformice Pvp Serverler</a>
	    		<span class="count pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?echo''.$transformicetoplam.'';?></span>
	    	</li>
			<br />
						<li>
	    		<a class="footericin" href="https://www.pvpler.net/bombom"><img src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/images/bombom.png" width="20" height="20" alt="Bombom Pvp Serverler"> Bombom Pvp Serverler</a>
	    		<span class="count pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?echo''.$bombomtoplam.'';?></span>
	    	</li><br />
						<li>
	    		<a class="footericin" href="https://www.pvpler.net/wow"><img src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/images/wow.png" width="20" height="20" alt="World of warcraft Pvp Serverler"> World of Warcraft Pvp Serverler</a>
	    		<span class="count pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?echo''.$wowtoplam.'';?></span>
	    	</li><br />
			<li>
	    		<a class="footericin" href="https://www.pvpler.net/cs"><img src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/images/counter-strike.png" width="20" height="20" alt="Counter-Strike Serverler"> Counter-Strike Serverler</a>
	    		<span class="count pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?echo''.$cstoplam.'';?></span>
	    	</li><br />
	    	<li>
	    		<a class="footericin" href="#"><img src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/images/user.png" width="20px" height="20px" alt="Kayıtlı Kullanıcılar"> Kayıtlı Kullanıcı</a>
	    		<span class="count pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?echo '10'.$uyetoplam+$deger.'';?></span>
	    	</li><br />
	    	<li>
	    		<a class="footericin" href="#"><img src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/images/sayac.png" width="20px" height="15px" alt="Günlük Sayaç"> Bugün Giren Ziyaretçiler</a>
	    		<span class="count pull-right" title="Günlük Ziyaretçi Sayısı"><?php print $yeni; ?></span>
	    	</li>
	    </ul>
	  </div>
	</div></div>