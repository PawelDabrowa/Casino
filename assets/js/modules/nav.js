/**
 * Navigation Module
 * ================
 * Dynamically loaded navigation functionality
 */

/**
 * Initialize navigation functionality
 */
export function initNav() {
  console.log('Navigation module loaded');
  
  // Add mobile menu functionality
  initMobileMenu();
  
  // Add keyboard navigation
  initKeyboardNav();
  
  // Add scroll effects
  initScrollEffects();
}

/**
 * Mobile Menu Functionality
 */
function initMobileMenu() {
  const menuToggle = document.querySelector('.menu-toggle');
  const navMenu = document.querySelector('.nav-menu');
  
  if (!menuToggle || !navMenu) {
    return;
  }
  
  // Enhanced toggle functionality
  menuToggle.addEventListener('click', (e) => {
    e.preventDefault();
    toggleMobileMenu();
  });
  
  // Close menu when clicking outside
  document.addEventListener('click', (e) => {
    if (!navMenu.contains(e.target) && !menuToggle.contains(e.target)) {
      closeMobileMenu();
    }
  });
  
  // Close menu on escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      closeMobileMenu();
    }
  });
}

function toggleMobileMenu() {
  const menuToggle = document.querySelector('.menu-toggle');
  const navMenu = document.querySelector('.nav-menu');
  
  const isOpen = navMenu.classList.contains('is-open');
  
  if (isOpen) {
    closeMobileMenu();
  } else {
    openMobileMenu();
  }
}

function openMobileMenu() {
  const menuToggle = document.querySelector('.menu-toggle');
  const navMenu = document.querySelector('.nav-menu');
  
  menuToggle.setAttribute('aria-expanded', 'true');
  navMenu.classList.add('is-open');
  document.body.classList.add('menu-open');
}

function closeMobileMenu() {
  const menuToggle = document.querySelector('.menu-toggle');
  const navMenu = document.querySelector('.nav-menu');
  
  menuToggle.setAttribute('aria-expanded', 'false');
  navMenu.classList.remove('is-open');
  document.body.classList.remove('menu-open');
}

/**
 * Keyboard Navigation
 */
function initKeyboardNav() {
  const navMenu = document.querySelector('.nav-menu');
  
  if (!navMenu) {
    return;
  }
  
  const menuItems = navMenu.querySelectorAll('a');
  
  menuItems.forEach((item, index) => {
    item.addEventListener('keydown', (e) => {
      let targetIndex;
      
      switch (e.key) {
        case 'ArrowRight':
        case 'ArrowDown':
          e.preventDefault();
          targetIndex = (index + 1) % menuItems.length;
          menuItems[targetIndex].focus();
          break;
          
        case 'ArrowLeft':
        case 'ArrowUp':
          e.preventDefault();
          targetIndex = index === 0 ? menuItems.length - 1 : index - 1;
          menuItems[targetIndex].focus();
          break;
          
        case 'Home':
          e.preventDefault();
          menuItems[0].focus();
          break;
          
        case 'End':
          e.preventDefault();
          menuItems[menuItems.length - 1].focus();
          break;
      }
    });
  });
}

/**
 * Scroll Effects
 */
function initScrollEffects() {
  const header = document.querySelector('.site-header');
  
  if (!header) {
    return;
  }
  
  let lastScrollY = window.scrollY;
  let ticking = false;
  
  function updateHeader() {
    const currentScrollY = window.scrollY;
    
    if (currentScrollY > 100) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
    
    // Hide/show header on scroll
    if (currentScrollY > lastScrollY && currentScrollY > 200) {
      header.classList.add('header-hidden');
    } else {
      header.classList.remove('header-hidden');
    }
    
    lastScrollY = currentScrollY;
    ticking = false;
  }
  
  function requestTick() {
    if (!ticking) {
      requestAnimationFrame(updateHeader);
      ticking = true;
    }
  }
  
  window.addEventListener('scroll', requestTick, { passive: true });
}

// Export individual functions for testing
export {
  initMobileMenu,
  initKeyboardNav,
  initScrollEffects,
  toggleMobileMenu,
  openMobileMenu,
  closeMobileMenu
};
