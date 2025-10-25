/**
 * Casino Theme Main JavaScript
 * ============================
 */

// DOM Ready Helper
function domReady(fn) {
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', fn);
  } else {
    fn();
  }
}

// Main initialization
domReady(() => {
  console.log('Casino theme loaded');
  
  // Initialize lazy loading for older browsers
  initLazyLoading();
  
  // Initialize score circles animation
  initScoreCircles();
  
  // Initialize dynamic navigation loading
  initDynamicNav();
});

/**
 * Lazy Loading Enhancement
 * Fallback for browsers without native lazy loading
 */
function initLazyLoading() {
  if ('loading' in HTMLImageElement.prototype) {
    // Native lazy loading is supported
    return;
  }
  
  // Fallback for older browsers
  const images = document.querySelectorAll('img[loading="lazy"]');
  
  if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          img.src = img.dataset.src || img.src;
          img.classList.remove('lazy');
          observer.unobserve(img);
        }
      });
    });
    
    images.forEach(img => {
      imageObserver.observe(img);
    });
  } else {
    // Fallback for very old browsers - load all images immediately
    images.forEach(img => {
      img.src = img.dataset.src || img.src;
    });
  }
}

/**
 * Dynamic Navigation Loading
 * Load navigation module only when needed
 */
function initDynamicNav() {
  if (!('IntersectionObserver' in window)) {
    return;
  }
  
  const navTarget = document.querySelector('.js-nav');
  if (!navTarget) {
    return;
  }
  
  const navObserver = new IntersectionObserver(async (entries) => {
    if (entries.some(entry => entry.isIntersecting)) {
      try {
        // Dynamic import with webpack chunk name
        const { initNav } = await import(/* webpackChunkName: "nav" */ './modules/nav');
        initNav();
        navObserver.disconnect();
      } catch (error) {
        console.warn('Failed to load navigation module:', error);
      }
    }
  }, {
    threshold: 0.1
  });
  
  navObserver.observe(navTarget);
}

/**
 * Menu Toggle Enhancement
 * Add click handler for mobile menu toggle
 */
domReady(() => {
  const menuToggle = document.querySelector('.menu-toggle');
  const navMenu = document.querySelector('.nav-menu');
  
  if (menuToggle && navMenu) {
    menuToggle.addEventListener('click', () => {
      const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
      
      menuToggle.setAttribute('aria-expanded', !isExpanded);
      navMenu.classList.toggle('is-open');
    });
  }
});

/**
 * Smooth Scroll Enhancement
 * Add smooth scrolling for anchor links
 */
domReady(() => {
  const anchorLinks = document.querySelectorAll('a[href^="#"]');
  
  anchorLinks.forEach(link => {
    link.addEventListener('click', (e) => {
      const targetId = link.getAttribute('href').substring(1);
      const targetElement = document.getElementById(targetId);
      
      if (targetElement) {
        e.preventDefault();
        targetElement.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  });
});

// Initialize score circles animation
function initScoreCircles() {
  const scoreCircles = document.querySelectorAll('.score-circle');
  
  scoreCircles.forEach((circle, index) => {
    const scoreNumber = circle.querySelector('.score-number');
    const score = parseFloat(circle.getAttribute('data-score') || scoreNumber.textContent);
    const percentage = (score / 10) * 100;
    const cssValue = percentage / 100;
    
    // Debug logging
    console.log(`Score: ${score}, Percentage: ${percentage}%, CSS Value: ${cssValue}`);
    
    // Set CSS custom property for the conic gradient
    circle.style.setProperty('--score', cssValue);
    
    // Also set it as a data attribute for debugging
    circle.setAttribute('data-css-score', cssValue);
    
    // Add a small delay for staggered animation
    setTimeout(() => {
      // Animate the number
      let current = 0;
      const increment = score / 30; // Faster animation
      const timer = setInterval(() => {
        current += increment;
        if (current >= score) {
          current = score;
          clearInterval(timer);
        }
        scoreNumber.textContent = current.toFixed(1);
      }, 30);
    }, index * 100); // Stagger each circle by 100ms
  });
}

// Export for potential external use
window.CasinoTheme = {
  domReady,
  initLazyLoading,
  initDynamicNav,
  initScoreCircles
};
