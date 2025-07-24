// Récupère tous les liens du menu
const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

// Réinitialise tous les liens au cas où
allSideMenu.forEach(i => i.parentElement.classList.remove('active'));

// Détecte l'URL actuelle
const currentPage = window.location.pathname.split("/").pop(); // ex: "service.php"

allSideMenu.forEach(item => {
	const li = item.parentElement;
	const linkPage = item.getAttribute("href").split("/").pop(); // ex: "service.php"

	if (linkPage === currentPage) {
		li.classList.add('active');
	}
});





// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})



























// Fonction pour calculer le pourcentage de progression
function calculateProgress() {
    const currentDate = new Date();
    const currentMonth = currentDate.getMonth();
    const nextMonth = new Date(currentDate.getFullYear(), currentMonth + 1, 1);
    const totalDays = (nextMonth - new Date(currentDate.getFullYear(), currentMonth, 1)) / (1000 * 60 * 60 * 24);
    const elapsedDays = currentDate.getDate();
    return Math.round((elapsedDays / totalDays) * 100);
}

// Fonction pour mettre à jour la barre de progression circulaire
function updateProgressCircle() {
    const progress = calculateProgress();
    const progressBar = document.querySelector('.progress-bar');
    const progressText = document.getElementById('progressText');

    // Calcul du décalage
    const circleCircumference = 2 * Math.PI * 45; // r=45
    const offset = circleCircumference - (progress / 100) * circleCircumference;

    // Mise à jour de la barre et du texte
    progressBar.style.strokeDashoffset = offset;
    progressText.textContent = `${progress}%`;
}

// Mise à jour automatique au chargement de la page
document.addEventListener('DOMContentLoaded', updateProgressCircle);









document.getElementById('nombre-parts').addEventListener('input', function () {
	const parts = parseInt(this.value) || 0;
	const estimation = parts * 100; // Exemple : 1 part = 100 unités monétaires
	document.getElementById('estimation').value = estimation + ' FCFA';
  });

















  document.getElementById('vente-parts-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    let isValid = true;
    const fields = [
        {id: 'nom', message: 'Le nom est requis.'},
        {id: 'prenoms', message: 'Les prénoms sont requis.'},
        {id: 'telephone', message: 'Le numéro de téléphone est requis.', pattern: /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/},
        {id: 'email', message: 'L\'email est requis.', pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/},
        {id: 'nombre-parts', message: 'Le nombre de parts est requis.', pattern: /^[1-9]\d*$/}
    ];

    fields.forEach(field => {
        const input = document.getElementById(field.id);
        const errorElement = document.querySelector(`#${field.id} + .error`);
        
        if (!input.value.trim()) {
            errorElement.textContent = field.message;
            isValid = false;
        } else if (field.pattern && !field.pattern.test(input.value)) {
            errorElement.textContent = `${field.message} Le format n'est pas valide.`;
            isValid = false;
        } else {
            errorElement.textContent = '';
        }
    });

    if (isValid) {
        // Si tout est valide, vous pouvez soumettre le formulaire ou effectuer une action avec les données
        console.log('Formulaire valide, prêt à être soumis.');
        // event.target.submit(); // Dé-commenter pour soumettre le formulaire si tout est valide
    }
});















