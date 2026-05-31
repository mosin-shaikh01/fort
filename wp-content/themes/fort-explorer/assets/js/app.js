/* ========================================
   Fort Explorer Theme - Main JavaScript
   ======================================== */

(function() {
  'use strict';

  // Initialize theme
  document.addEventListener('DOMContentLoaded', function() {
    initTheme();
    handleNavigation();
  });

  /**
   * Initialize theme features
   */
  function initTheme() {
    console.log('Fort Explorer theme initialized');
  }

  /**
   * Handle navigation interactions
   */
  function handleNavigation() {
    const navLinks = document.querySelectorAll('.site-navigation a');

    navLinks.forEach(link => {
      if (link.href === window.location.href) {
        link.classList.add('is-active');
      }
    });
  }

  // Lazy load images
  if ('IntersectionObserver' in window) {
    const images = document.querySelectorAll('img[loading="lazy"]');

    images.forEach(img => {
      if (!img.src && img.dataset.src) {
        img.src = img.dataset.src;
      }
    });
  }
})();
