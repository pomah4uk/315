document.addEventListener('DOMContentLoaded', function() {
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.createElement('div');
    
    // Создаем оверлей
    overlay.className = 'overlay';
    document.body.appendChild(overlay);

    // Обработчик кнопки
    sidebarToggle.addEventListener('click', function() {
        sidebar.classList.toggle('show');
        overlay.classList.toggle('show');
    });

    // Закрытие при клике на оверлей
    overlay.addEventListener('click', function() {
        sidebar.classList.remove('show');
        overlay.classList.remove('show');
    });

    // Закрытие при нажатии Esc
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        }
    });

    // Закрытие при клике на пункт меню на мобильных
    const navLinks = sidebar.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth < 992) {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
            }
        });
    });
});
