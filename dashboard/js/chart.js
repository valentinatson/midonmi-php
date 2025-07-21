// Données pour le graphique à lignes
const lineData = {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    datasets: [{
        label: 'Revenus (FCFA)',
        data: [1200000, 1500000, 1800000, 1700000, 1900000, 2100000, 2300000, 2500000, 2700000, 2900000, 3100000, 3300000],
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 2,
        fill: true,
        tension: 0.4 // Ajoute un effet de courbe douce
    }]
};

// Configuration du graphique à lignes
const lineConfig = {
    type: 'line',
    data: lineData,
    options: {
        responsive: true,
        maintainAspectRatio: false, // Permet au graphique de remplir le conteneur
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            legend: {
                display: true,
                position: 'top' // Position de la légende
            }
        }
    }
};

// Création du graphique à lignes
const lineChart = new Chart(
    document.getElementById('lineChart'),
    lineConfig
);
