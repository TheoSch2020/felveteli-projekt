<?php include("inc-variabile.php"); ?>
<?php
$total = 0;
$total_question = 0;
$message = -1;
if (isset($_POST['new_action']) && (strlen($_POST['new_action']) == 1))
{
	$result_q = mysqli_query($conx,"SELECT * FROM ".$prefix."quiz WHERE id = '".$page."' LIMIT 1");
	while($row_q = mysqli_fetch_array($result_q))
	{
		$result_k = mysqli_query($conx,"SELECT * FROM ".$prefix."question WHERE quiz_id = '".$row_q['id']."'");
		while($row_k = mysqli_fetch_array($result_k))
		{
			$total_question++;
			//echo "question".$row_k['name'].": ".$_POST['question'.$row_k['id']]."<br>";
			$answer = $_POST['question'.$row_k['id']];
			$answer++;
			$answer--;
			$result_a = mysqli_query($conx,"SELECT * FROM ".$prefix."answer WHERE question_id = '".$row_k['id']."' AND correct = '1'");
			while($row_a = mysqli_fetch_array($result_a))
			{
				if ($row_a['id'] == $answer) $total++;
			}
		}
	}
	$percent = round(100 * $total / $total_question,0);
	$message = 10 * floor($percent/10);
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
	<title>eKvíz Elmék Csatatere</title>
	<meta name="Description" content="Ezen a csatatéren a lelkes rajongók Istenekkel kapcsolatos kérdésekre válaszolva nyerhetnek értékes virtuális ajándékokat!">
	<meta name="Keywords" content="kvíz csata kérdés">
	<meta name="Author" content="eVilág Design">
	<meta name="Copyright" content="ekviz.hu">
	<meta name="Generator" content="eVilág Design">
	<meta name="Robots" content="all">
	<meta name="Content-Language" content="HU">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">

	<meta property="og:title" content="eKvíz Elmék Csatatere">
	<meta property="og:description" content="Ezen a csatatéren a lelkes rajongók Istenekkel kapcsolatos kérdésekre válaszolva nyerhetnek értékes virtuális ajándékokat!">
	<meta property="og:url" content="https://ekviz.hu/">
	<meta property="og:image" content="https://ekviz.hu/img/fb_index.jpg">
	<meta property="og:image:alt" content="eKvíz Elmék Csatatere">
	<meta property="og:type" content="website">
	<meta property="og:locale" content="hu_HU">
	<meta property="og:locale:alternate" content="en_EN">
	<meta property="og:site_name" content="eKvíz Elmék Csatatere">
<!--	<meta property="fb:app_id" content="1784572334998969"> -->
	<meta name="twitter:title" content="eKvíz Elmék Csatatere">
	<meta name="twitter:description" content="Ezen a csatatéren a lelkes rajongók Istenekkel kapcsolatos kérdésekre válaszolva nyerhetnek értékes virtuális ajándékokat!">
	<meta name="twitter:url" content="https://ekviz.hu/">
	<meta name="twitter:image" content="https://ekviz.hu/img/fb_index.jpg">
	<meta name="twitter:card" content="summary">

	<link href="bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="favicon.ico">

	<link rel="stylesheet" type="text/css" href="cookieconsent.min.css">
	<script src="cookieconsent.min.js"></script>
	<!-- Edit the next line -->
	<script>window.addEventListener("load", function(){ window.cookieconsent.initialise({ "palette": { "popup": { "background": "#000000" }, "button": { "background": "#D3AF37" } }, "theme": "classic", "content": { "message": "A weboldalon cookie-kat használunk, hogy biztonságos böngészés mellett a legjobb felhasználói élményt nyújthassunk.", "dismiss": "Rendben!", "link": "Részletes leírás", "href": "policies.php" }})});</script>
</head>
<body>
<?php include("inc-header.php"); ?>
<form action="kviz.php?page=<?php echo $page; ?>" method="post">
<?php
$result_q = mysqli_query($conx,"SELECT * FROM ".$prefix."quiz WHERE id = '".$page."' LIMIT 1");
while($row_q = mysqli_fetch_array($result_q))
{
	if ((file_exists("images/".$row_q['image'])) && (strlen($row_q['image']) > 0)) echo "<div class=\"px-3 py-3 text-center mb-3\"><img src=\"images/".$row_q['image']."\" class=\"img-responsive mx-auto rounded\"></div>";
	if ($message > -1)
	{
		echo "<div class=\"px-3 py-3 mx-3 mb-3 text-center rounded bg50-white\">";
		echo "<h1 class=\"display-5 text-kviz-medium mx-auto text-center\"> Elért eredmény: ".$percent."%</h1>";
		echo "<h2 class=\"display-5 text-kviz-medium mx-auto text-center\"> A nyeremény</h2>";
		switch ($message)
		{
		case 0:
			echo "Bocsi, a semmire semmi a jutalom :(";
			break;
		case 10:
			echo "<img src=\"img/athene-owl.jpg\" class=\"img-responsive mx-auto\">";
			echo "Athéné baglya";
			break;
		case 20:
			echo "<img src=\"img/frey-sword.jpg\" class=\"img-responsive mx-auto\">";
			echo "Frey kardja";
			break;
		case 30:
			echo "<img src=\"img/aegis.jpg\" class=\"img-responsive mx-auto\">";
			echo "Aegisz";
			break;
		case 40:
			echo "<img src=\"img/gungnir.jpg\" class=\"img-responsive mx-auto\">";
			echo "Gungnir";
			break;
		case 50:
			echo "<img src=\"img/caduceus.png\" class=\"img-responsive mx-auto\">";
			echo "Caduceus";
			break;
		case 60:
			echo "<img src=\"img/helmet of awe.png\" class=\"img-responsive mx-auto\">";
			echo "Rettegés sisakja";
			break;
		case 70:
			echo "<img src=\"img/artemis-bow.png\" class=\"img-responsive mx-auto\">";
			echo "Artemisz íja";
			break;
		case 80:
			echo "<img src=\"img/sleipnir.jpg\" class=\"img-responsive mx-auto\">";
			echo "Sleipnir";
			break;
		case 90:
			echo "<img src=\"img/helmet of hades.png\" class=\"img-responsive mx-auto\">";
			echo "Hádész sisakja";
			break;
		case 100:
			echo "<img src=\"img/mjolnir.png\" class=\"img-responsive mx-auto\">";
			echo "Mjölnir";
			break;
		}
		echo "</div>";
	}
?>
	<div class="px-3 py-3 mx-3 text-center rounded bg50-white">
		<h1 class="display-5 text-kviz-medium mx-auto text-center"><?php echo $row_q['name'] ?></h1>
	</div>
	<div class="pt-4">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<p class="text-center text-kviz-dark">Hirdetés</p>
					<div class="mb-4">
						<div class="bg-dark mb-3 p-3"><a href="https://schdesign.hu/" target="_blank"><img src="img/sch_logo.svg" class="img-responsive mx-auto"></a></div>
						<div class="bg-light mb-3 p-3"><a href="https://kir-dev.sch.bme.hu/" target="_blank"><img src="img/kirdev_logo.svg" class="img-responsive mx-auto"></a></div>
						<div class="bg-light mb-3 p-3"><a href="https://sem.sch.bme.hu/" target="_blank"><img src="img/sem_logo.svg" class="img-responsive mx-auto"></a></div>
						<div class="bg-light mb-3 p-3"><a href="https://bsstudio.hu/" target="_blank"><img src="img/bss_logo.svg" class="img-responsive mx-auto"></a></div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card mb-4 bg50-white">

<?php
	$question_no = 1;
	$result_k = mysqli_query($conx,"SELECT * FROM ".$prefix."question WHERE quiz_id = '".$row_q['id']."'");
	while($row_k = mysqli_fetch_array($result_k))
	{
		if ((file_exists("images/".$row_k['image'])) && (strlen($row_k['image']) > 0)) echo "<img src=\"images/".$row_k['image']."\" class=\"img-responsive mx-auto rounded\">";
		echo "<div class=\"card-body\">";
		echo "<p class=\"card-text text-kviz-dark font-weight-bold h5\">".$question_no.". ".$row_k['name']."</p>";
		$question_no++;
		$answer_no = 1;
		$result_a = mysqli_query($conx,"SELECT * FROM ".$prefix."answer WHERE question_id = '".$row_k['id']."'");
		while($row_a = mysqli_fetch_array($result_a))
		{
			if ((file_exists("images/".$row_a['image'])) && (strlen($row_a['image']) > 0)) echo "<img src=\"images/".$row_a['image']."\" class=\"img-responsive mx-auto rounded\">";
			echo "<p class=\"text-kviz-dark h6\"><input type=\"radio\" name=\"question".$row_k['id']."\" value=\"".$row_a['id']."\"> ".$answer_no.". ".$row_a['name']."</p>";
			$answer_no++;
		}
		echo "</div>";
	}
?>
					</div>
				</div>
				<div class="col-md-3">
					<p class="text-center text-kviz-dark">Hirdetés</p>
					<div class="mb-4">
						<div class="bg-dark mb-3 p-3"><a href="https://www.simonyi.bme.hu/" target="_blank"><img src="img/simonyi_white.svg" class="img-responsive mx-auto"></a></div>
						<div class="bg-light mb-3 p-3"><a href="http://acstudio.sch.bme.hu/" target="_blank"><img src="img/ac_logo.svg" class="img-responsive mx-auto"></a></div>
						<div class="bg-light mb-3 p-3"><a href="https://ha5kfu.hu/" target="_blank"><img src="img/ha5kfu_logo.svg" class="img-responsive mx-auto"></a></div>
						<div class="bg-light mb-3 p-3"><a href="https://legokor.hu/" target="_blank"><img src="img/lego_logo.svg" class="img-responsive mx-auto"></a></div>
						<div class="bg-light mb-3 p-3"><a href="https://spot.sch.bme.hu/" target="_blank"><img src="img/spot_logo.svg" class="img-responsive mx-auto"></a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="px-3 py-3 mx-3 mb-3 text-center rounded bg50-white">
		<input type="hidden" name="new_action" value="1">
		<button type="submit" class="btn pull-left bg-kviz-medium text-white">Válaszok elküldése</button>
	</div>
<?php
}
?>
</form>
		<div class="mx-auto mb-3 text-center text-dark bg-light">
			<img src="img/kviz-footer.jpg" class="img-responsive">
		</div>
<?php include("inc-footer.php"); ?>
</body>
</html>
<?php include("inc-variabile-end.php"); ?>