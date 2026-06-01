/* ========================================
   Fort Explorer Theme - Main JavaScript
   ======================================== */

(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {
    initMobileMenu();
    markActiveNavLinks();
  });

  function initMobileMenu() {
    const toggle = document.querySelector('.menu-toggle');
    const nav    = document.getElementById('primary-menu');

    if (!toggle || !nav) {
      return;
    }

    toggle.addEventListener('click', function () {
      const expanded = toggle.getAttribute('aria-expanded') === 'true';

      toggle.setAttribute('aria-expanded', String(!expanded));
      nav.classList.toggle('site-navigation--open', !expanded);
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && nav.classList.contains('site-navigation--open')) {
        toggle.setAttribute('aria-expanded', 'false');
        nav.classList.remove('site-navigation--open');
        toggle.focus();
      }
    });

    document.addEventListener('click', function (e) {
      if (!toggle.contains(e.target) && !nav.contains(e.target)) {
        toggle.setAttribute('aria-expanded', 'false');
        nav.classList.remove('site-navigation--open');
      }
    });
  }

  function markActiveNavLinks() {
    const navLinks = document.querySelectorAll('.site-navigation a');

    navLinks.forEach(function (link) {
      if (link.href === window.location.href) {
        link.setAttribute('aria-current', 'page');
      }
    });
  }
})();
