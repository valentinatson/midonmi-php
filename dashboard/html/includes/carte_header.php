
<?php include 'dashboard-stats.php'; ?>



<ul class="box-info">
	<li>
		<i class='bx bx-time'></i>
		<span class="text">
			<h3><?= $enCours ?></h3>
			<p>Demandes en cours</p>
		</span>
	</li>
	<li>
		<i class='bx bx-check-circle'></i>
		<span class="text">
			<h3><?= $traitees ?></h3>
			<p>Demandes traitées</p>
		</span>
	</li>
	<li>
		<i class='bx bx-x-circle'></i>
		<span class="text">
			<h3><?= $echouees ?></h3>
			<p>Demandes échouées</p>
		</span>
	</li>
	<li>
		<i class='bx bx-group'></i>
		<span class="text">
			<h3><?= $abonnes ?></h3>
			<p>Abonnés</p>
		</span>
	</li>
</ul>
