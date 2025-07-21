/**
* Template Name: AgriCulture
* Template URL: https://bootstrapmade.com/agriculture-bootstrap-website-template/
* Updated: Aug 07 2024 with Bootstrap v5.3.3
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

(function() {
  "use strict";

  /**
   * Apply .scrolled class to the body as the page is scrolled down
   */
  function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('#header');
    if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
    window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  /**
   * Scroll up sticky header to headers with .scroll-up-sticky class
   */
  let lastScrollTop = 0;
  window.addEventListener('scroll', function() {
    const selectHeader = document.querySelector('#header');
    if (!selectHeader.classList.contains('scroll-up-sticky')) return;

    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop && scrollTop > selectHeader.offsetHeight) {
      selectHeader.style.setProperty('position', 'sticky', 'important');
      selectHeader.style.top = `-${header.offsetHeight + 50}px`;
    } else if (scrollTop > selectHeader.offsetHeight) {
      selectHeader.style.setProperty('position', 'sticky', 'important');
      selectHeader.style.top = "0";
    } else {
      selectHeader.style.removeProperty('top');
      selectHeader.style.removeProperty('position');
    }
    lastScrollTop = scrollTop;
  });

  /**
   * Mobile nav toggle
   */
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

  function mobileNavToogle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    mobileNavToggleBtn.classList.toggle('bi-list');
    mobileNavToggleBtn.classList.toggle('bi-x');
  }
  mobileNavToggleBtn.addEventListener('click', mobileNavToogle);

  /**
   * Hide mobile nav on same-page/hash links
   */
  document.querySelectorAll('#navmenu a').forEach(navmenu => {
    navmenu.addEventListener('click', () => {
      if (document.querySelector('.mobile-nav-active')) {
        mobileNavToogle();
      }
    });

  });

  /**
   * Toggle mobile nav dropdowns
   */
  document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
    navmenu.addEventListener('click', function(e) {
      e.preventDefault();
      this.parentNode.classList.toggle('active');
      this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
      e.stopImmediatePropagation();
    });
  });

  /**
   * Preloader
   */
  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }

  /**
   * Scroll top button
   */
  let scrollTop = document.querySelector('.scroll-top');

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
  }
  scrollTop.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  window.addEventListener('load', toggleScrollTop);
  document.addEventListener('scroll', toggleScrollTop);

  /**
   * Animation on scroll function and init
   */
  function aosInit() {
    AOS.init({
      duration: 600,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', aosInit);

  /**
   * Auto generate the carousel indicators
   */
  document.querySelectorAll('.carousel-indicators').forEach((carouselIndicator) => {
    carouselIndicator.closest('.carousel').querySelectorAll('.carousel-item').forEach((carouselItem, index) => {
      if (index === 0) {
        carouselIndicator.innerHTML += `<li data-bs-target="#${carouselIndicator.closest('.carousel').id}" data-bs-slide-to="${index}" class="active"></li>`;
      } else {
        carouselIndicator.innerHTML += `<li data-bs-target="#${carouselIndicator.closest('.carousel').id}" data-bs-slide-to="${index}"></li>`;
      }
    });
  });

  /**
   * Init swiper sliders
   */
  function initSwiper() {
    document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
      let config = JSON.parse(
        swiperElement.querySelector(".swiper-config").innerHTML.trim()
      );

      if (swiperElement.classList.contains("swiper-tab")) {
        initSwiperWithCustomPagination(swiperElement, config);
      } else {
        new Swiper(swiperElement, config);
      }
    });
  }

  window.addEventListener("load", initSwiper);

  /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  window.addEventListener('load', function() {
    const selectHeader = document.querySelector('#header');
    if (selectHeader && !selectHeader.classList.contains('fixed-top')) {
      selectHeader.classList.add('fixed-top');
    }
  });

  // Validation du formulaire "autreServiceForm" avec messages sous les inputs
  document.addEventListener('DOMContentLoaded', function() {
    const btn = document.querySelector('.btn-cta');
    if(btn) {
      btn.addEventListener('click', function(e) {
        e.preventDefault();
        const modal = new bootstrap.Modal(document.getElementById('autreServiceModal'));
        modal.show();
      });
    }

    const form = document.getElementById('autreServiceForm');
    if (!form) return;

    // Ajoute dynamiquement les messages d'erreur sous chaque input si pas déjà présents
    ['nom','prenoms','telephone','email','service'].forEach(id => {
      const input = document.getElementById(id);
      if (input && !input.nextElementSibling?.classList?.contains('invalid-feedback')) {
        const span = document.createElement('div');
        span.className = 'invalid-feedback';
        input.parentNode.appendChild(span);
      }
      // Retire l'attribut required pour laisser la validation JS gérer
      if (input) input.removeAttribute('required');
    });

    form.addEventListener('submit', function(e) {
      e.preventDefault();
      let valid = true;

      // Réinitialise les messages
      form.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');
      if (form.querySelector('.form-success')) form.querySelector('.form-success').remove();

      // Récupère les valeurs
      const nom = form.nom.value.trim();
      const prenoms = form.prenoms.value.trim();
      const tel = form.telephone.value.trim();
      const email = form.email.value.trim();
      const service = form.service.value.trim();

      // Validation
      if (!nom) {
        valid = false;
        form.nom.classList.add('is-invalid');
        form.nom.nextElementSibling.textContent = "Le nom est requis.";
      } else {
        form.nom.classList.remove('is-invalid');
      }

      if (!prenoms) {
        valid = false;
        form.prenoms.classList.add('is-invalid');
        form.prenoms.nextElementSibling.textContent = "Les prénoms sont requis.";
      } else {
        form.prenoms.classList.remove('is-invalid');
      }

      if (!tel.match(/^\+?\d{8,15}$/)) {
        valid = false;
        form.telephone.classList.add('is-invalid');
        form.telephone.nextElementSibling.textContent = "Numéro de téléphone invalide.";
      } else {
        form.telephone.classList.remove('is-invalid');
      }

      if (!email.match(/^[\w\.-]+@[\w\.-]+\.\w{2,}$/)) {
        valid = false;
        form.email.classList.add('is-invalid');
        form.email.nextElementSibling.textContent = "Adresse email invalide.";
      } else {
        form.email.classList.remove('is-invalid');
      }

      if (!service) {
        valid = false;
        form.service.classList.add('is-invalid');
        form.service.nextElementSibling.textContent = "Veuillez décrire le service souhaité.";
      } else {
        form.service.classList.remove('is-invalid');
      }

      // Si tout est valide, affiche le message de succès (pas d'alert)
      if (valid) {
        const success = document.createElement('div');
        success.className = 'form-success text-success mt-3';
        success.textContent = "Message soumis";
        form.appendChild(success);
        setTimeout(() => {
          bootstrap.Modal.getInstance(document.getElementById('autreServiceModal')).hide();
          form.reset();
          form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
          if(form.querySelector('.form-success')) form.querySelector('.form-success').remove();
        }, 1800);
      }
    });

    // Efface le message d'erreur au focus
    form.querySelectorAll('input, textarea').forEach(input => {
      input.addEventListener('input', function() {
        this.classList.remove('is-invalid');
        if(this.nextElementSibling?.classList?.contains('invalid-feedback')) {
          this.nextElementSibling.textContent = '';
        }
      });
    });
  });

})();
