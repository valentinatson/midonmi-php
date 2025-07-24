<?php $page = 'dashboard'; ?>

<section id="sidebar">
		<a href="#" class="brand">
			<!-- <i class='bx bxs-smile'></i> -->
			<!-- <span class="text">AdminZARTAN</span> -->
			<img class="logo" src="../img/pertolaLogo.png" alt="" srcset="">
		</a>
		<ul class="side-menu top">
    <li class="<?= ($page == 'dashboard') ? 'active' : '' ?>">
        <a href="../html/index.php">
            <i class='bx bxs-dashboard'></i>
            <span class="text">Tableau de bord</span>
        </a>
    </li>
    <li class="<?= ($page == 'service') ? 'active' : '' ?>">
        <a href="../html/service.php">
            <i class='bx bx-archive-in'></i>
            <span class="text">Services</span>
        </a>
    </li>
    <li class="<?= ($page == 'message') ? 'active' : '' ?>">
        <a href="../html/message.php">
            <i class='bx bxs-chat'></i>
            <span class="text">Messages</span>
        </a>
    </li>
    <li class="<?= ($page == 'newsletter') ? 'active' : '' ?>">
        <a href="../html/newsletter.php">
            <i class='bx bxs-envelope'></i>
            <span class="text">Newsletter</span>
        </a>
    </li>
    <li class="<?= ($page == 'temoignage') ? 'active' : '' ?>">
        <a href="../html/temoignage.php">
            <i class='bx bxs-user-voice'></i>
            <span class="text">Témoignages</span>
        </a>
    </li>
    <li class="<?= ($page == 'profilUtilisateur') ? 'active' : '' ?>">
        <a href="../html/profilUtilisateur.php">
            <i class='bx bx-group'></i>
            <span class="text">Gestion Utilisateur</span>
        </a>
    </li>
    <li class="<?= ($page == 'user-admin') ? 'active' : '' ?>">
        <a href="../html/user-admin.php">
            <i class='bx bxs-cog'></i>
            <span class="text">User Admin</span>
        </a>
    </li>
</ul>

		<ul class="side-menu">
			
			<li>
				<a href="../html/deconnexion.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Deconnexion</span>
				</a>
			</li>
		</ul>
	</section>


	<script>
	const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item => {
	const li = item.parentElement;
	const currentPage = window.location.pathname;

	if (item.href.includes(currentPage)) {
		allSideMenu.forEach(i => i.parentElement.classList.remove('active'));
		li.classList.add('active');
	}
});


	</script>