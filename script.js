document.addEventListener('DOMContentLoaded', function() {
  const navbar = document.querySelector('.navbar');
  const navbarTeks = document.querySelector('.navbar-teks');

  if (!document.querySelector('.hamburger')) {
    const hamburger = document.createElement('div');
    hamburger.className = 'hamburger';
    hamburger.innerHTML = '<span></span><span></span><span></span>';
    
    const navbarIcon = document.querySelector('.navbar-icon');
    if (navbarIcon) {
      navbarIcon.insertAdjacentElement('afterend', hamburger);
    } else {
      navbar.appendChild(hamburger);
    }
  }
  
  if (!document.querySelector('.menu-overlay')) {
    const overlay = document.createElement('div');
    overlay.className = 'menu-overlay';
    document.body.appendChild(overlay);
  }
  
  const hamburger = document.querySelector('.hamburger');
  const navMenu = document.querySelector('.navbar-teks');
  const overlay = document.querySelector('.menu-overlay');
  
  function toggleMenu() {
    if (!hamburger || !navMenu) return;
    
    hamburger.classList.toggle('active');
    navMenu.classList.toggle('active');
    if (overlay) overlay.classList.toggle('active');
    document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : '';
  }

  if (hamburger) {
    hamburger.addEventListener('click', toggleMenu);
  }

  if (overlay) {
    overlay.addEventListener('click', toggleMenu);
  }
  
  if (navMenu) {
    navMenu.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        if (window.innerWidth <= 992) {
          if (hamburger) hamburger.classList.remove('active');
          navMenu.classList.remove('active');
          if (overlay) overlay.classList.remove('active');
          document.body.style.overflow = '';
        }
      });
    });
  }
  
  // Dropdown toggle untuk mobile
  const dropdownParents = document.querySelectorAll('.navbar-teks > li:has(ul)');
  dropdownParents.forEach(parent => {
    const link = parent.querySelector('> a');
    if (link) {
      link.addEventListener('click', (e) => {
        if (window.innerWidth <= 992) {
          e.preventDefault();
          parent.classList.toggle('active-dropdown');
        }
      });
    }
  });
  
  window.addEventListener('resize', () => {
    if (window.innerWidth > 992) {
      if (navMenu && navMenu.classList.contains('active')) {
        if (hamburger) hamburger.classList.remove('active');
        navMenu.classList.remove('active');
        if (overlay) overlay.classList.remove('active');
        document.body.style.overflow = '';
      }
      dropdownParents.forEach(parent => {
        parent.classList.remove('active-dropdown');
      });
    }
  });
});