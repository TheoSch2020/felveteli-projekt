	<main class="container">
		<div class="mx-auto mb-3 text-center text-dark bg-light">
			<img src="img/kviz-header.jpg" class="img-responsive">
			<header>
				<nav class="navbar navbar-expand-lg navbar-dark bg-kviz-medium">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse justify-content-md-around" id="navbarsExample08">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link active" href="index.php" title="Előcsarnok">Előcsarnok</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="ki-vagyok-en.php" title="Ki vagyok én?">Ki vagyok én?</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link active dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Válassz egy Kvízt!</a>
								<div class="dropdown-menu" aria-labelledby="dropdown01">
<?php
$result = mysqli_query($conx,"SELECT * FROM ".$prefix."quiz ORDER BY name");
while($row = mysqli_fetch_array($result))
	echo "<a class=\"dropdown-item\" href=\"kviz.php?page=".$row['id']."\">".$row['name']."</a>";
?>
								</div>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="kisokos.php" title="Kisokos">Kisokos</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="virtualis-nyeremenyek.php" title="Virtuális nyeremények">Virtuális nyeremények</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="panasz-sarok.php" title="Panasz sarok">Panasz sarok</a>
							</li>
						</ul>
					</div>
				</nav>
			</header>
		</div>
