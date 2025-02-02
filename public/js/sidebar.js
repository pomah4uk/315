document.addEventListener('DOMContentLoaded', function() {
    const sidebarToggle = document.querySelector('.navbar-toggler');
    const sidebar = document.getElementById('sidebar');
    sidebarToggle.addEventListener('click', function() {
        sidebar.classList.toggle('hidden');
    });
});
