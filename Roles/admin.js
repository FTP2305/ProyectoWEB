function showSection(sectionId) {
    // Ocultar todas las secciones del dashboard
    document.querySelectorAll('.dashboard-section').forEach(section => {
        section.style.display = 'none';
    });
    // Mostrar la sección específica que se pasó como argumento
    document.getElementById(sectionId).style.display = 'block';
}