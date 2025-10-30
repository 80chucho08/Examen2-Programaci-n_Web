<footer class="bg-mlibre text-dark position-relative mt-5 pt-5">
  <!-- Olas decorativas azules -->
  <div class="position-absolute top-0 start-0 w-100" style="transform: translateY(-100%); overflow:hidden; height:80px;">
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-100 h-100">
      <path d="M0,0 C300,100 900,0 1200,100 L1200,120 L0,120 Z" fill="rgba(52,131,250,.2)">
        <animate attributeName="d" dur="12s" repeatCount="indefinite"
          values="M0,0 C300,100 900,0 1200,100 L1200,120 L0,120 Z;
                  M0,0 C250,80 950,40 1200,90 L1200,120 L0,120 Z;
                  M0,0 C300,100 900,0 1200,100 L1200,120 L0,120 Z" />
      </path>
    </svg>
  </div>

  <div class="container">
    <div class="row g-4">
      <div class="col-12 col-md-6 col-lg-3">
        <h5 class="fw-bold">Sobre el sitio</h5>
        <p class="text-secondary mb-3">
          Proyecto de la materia <strong>Programación Web</strong>. Prácticas con PHP, HTML, CSS, JS y MySQL.
        </p>
        <div class="d-flex gap-2">
          <a class="btn btn-outline-dark btn-sm rounded-3 hover-glow" href="#" title="GitHub"><i class="bi bi-github"></i></a>
          <a class="btn btn-outline-dark btn-sm rounded-3 hover-glow" href="#" title="YouTube"><i class="bi bi-youtube"></i></a>
          <a class="btn btn-outline-dark btn-sm rounded-3 hover-glow" href="#" title="X"><i class="bi bi-twitter-x"></i></a>
          <a class="btn btn-outline-dark btn-sm rounded-3 hover-glow" href="#" title="Facebook"><i class="bi bi-facebook"></i></a>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-3">
        <h5 class="fw-bold">Enlaces rápidos</h5>
        <ul class="list-unstyled">
          <li class="mb-1"><a class="link-dark link-opacity-75-hover text-decoration-none" href="inicio.php">Inicio</a></li>
          <li class="mb-1"><a class="link-dark link-opacity-75-hover text-decoration-none" href="inicio.php?op=rptProducto">Productos</a></li>
        </ul>
      </div>

      <div class="col-12 col-md-6 col-lg-3">
        <h5 class="fw-bold">Contacto</h5>
        <ul class="list-unstyled text-secondary mb-0">
          <li><i class="bi bi-geo-alt-fill me-1 text-primary"></i> Instituto Tecnológico de Pachuca</li>
          <li><i class="bi bi-envelope-at me-1 text-primary"></i> contacto@pachuca.tecnm.mx</li>
          <li><i class="bi bi-telephone-fill me-1 text-primary"></i> (771) 000 0000</li>
        </ul>
      </div>

      
    </div>

    <hr class="border-secondary-subtle my-4">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center pb-4">
      <span class="text-secondary small">© <?php echo date('Y'); ?> Tienda Web — Hecho con 💻 + ☕</span>
      <div class="d-flex gap-3 small mt-2 mt-md-0">
        <a href="#" class="link-dark text-decoration-none">Bello Gonzalez Jetsamin 22200715</a>
        <a href="#" class="link-dark text-decoration-none">Navarro Carbajal Jesus Alfonso 22200964</a>
        <a href="#" class="link-dark text-decoration-none">Quijano Gonzalez Erik Ivan 22200759</a>
        <a href="#" class="link-dark text-decoration-none">Términos</a>
        <a href="#" class="link-dark text-decoration-none">Privacidad</a>
      </div>
    </div>
  </div>

  <!-- Botón volver arriba -->
  <button id="pfTopBtn" class="btn btn-primary rounded-circle shadow-lg position-fixed"
          type="button" style="right:16px; bottom:16px; transform: translateY(120%); transition:.25s ease;">
    <i class="bi bi-arrow-up text-white"></i>
  </button>
</footer>

<style>
  /* Fondo principal Mercado Libre */
  .bg-mlibre {
    background-color: #e7de7dff;
  }

  .btn-mlibre {
    background-color: #3483fa;
    color: #fff;
    border: none;
    border-radius: 8px;
    transition: all 0.3s ease;
  }
  .btn-mlibre:hover {
    background-color: #2a6fd0;
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
  }

  /* Animación hover general */
  .hover-glow {
    transition: all 0.3s ease;
  }
  .hover-glow:hover {
    background-color: #3483fa !important;
    color: #fff !important;
    transform: translateY(-2px);
  }

  .hover-lift {
    transition: all 0.3s ease;
  }
  .hover-lift:hover {
    transform: translateY(-3px);
    box-shadow: 0 1rem 2rem rgba(0,0,0,.15) !important;
  }

  /* Aparición del botón arriba */
  #pfTopBtn.show { transform: translateY(0) !important; }
</style>

<script>
  function pfNewsletterThanks(){
    const err = document.getElementById('pfEmailError');
    err.style.display = 'none';
    alert('¡Gracias por suscribirte!');
  }

  // Mostrar botón volver arriba
  (function(){
    const topBtn = document.getElementById('pfTopBtn');
    const goTopLink = document.getElementById('pfGoTopLink');
    const onScroll = () => {
      if (window.scrollY > 280) topBtn.classList.add('show');
      else topBtn.classList.remove('show');
    };
    window.addEventListener('scroll', onScroll);
    topBtn.addEventListener('click', () => window.scrollTo({top:0, behavior:'smooth'}));
    goTopLink?.addEventListener('click', (e)=>{ e.preventDefault(); window.scrollTo({top:0, behavior:'smooth'}); });
    onScroll();
  })();
</script>
