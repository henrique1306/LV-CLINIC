document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.getElementById('menu-toggle');
    const navList = document.getElementById('nav_list');

    if (!menuToggle || !navList) {
        console.warn('Menu hambúrguer: elementos não encontrados.');
        return;
    }

    menuToggle.addEventListener('click', function (e) {
        e.stopPropagation();
        const isOpen = navList.classList.toggle('active');
        menuToggle.classList.toggle('active', isOpen);
        menuToggle.setAttribute('aria-expanded', isOpen);
        menuToggle.setAttribute('aria-label', isOpen ? 'Fechar menu' : 'Abrir menu');
    });

    navList.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () {
            if (window.innerWidth <= 1170) closeMenu();
        });
    });

    document.addEventListener('click', function (e) {
        if (window.innerWidth <= 1170 &&
            navList.classList.contains('active') &&
            !navList.contains(e.target) &&
            !menuToggle.contains(e.target)) {
            closeMenu();
        }
    });

    window.addEventListener('resize', function () {
        if (window.innerWidth > 1170) closeMenu();
    });

    function closeMenu() {
        navList.classList.remove('active');
        menuToggle.classList.remove('active');
        menuToggle.setAttribute('aria-expanded', 'false');
        menuToggle.setAttribute('aria-label', 'Abrir menu');
    }
});