// Añade botonera de navegación en el carousel Slick (plugin)
jQuery(document).ready(function($) {
  $('.slick-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide ) {
    $(this).closest('.slick-slider-wrapper').find('.slick-count-item').removeClass('slick-active');
    $(this).closest('.slick-slider-wrapper').find('.slick-count-item[data-slide-index="' + nextSlide + '"]').addClass('slick-active');
  });

  $('.slick-count-item').bind('click', function(e) {
    e.preventDefault();
    $(this).closest('.slick-slider-wrapper').find('.slick-slider').slick('slickGoTo', $(this).attr('data-slide-index') );
  });

});

// Toogle para Blog .toggle-filter-by
document.addEventListener('DOMContentLoaded', (event) => {
    const toggle = document.querySelector('.toggle-filter-by');

    // Si el elemento .toggle-filter-by existe
    if (toggle) {
        // Agrega un event listener para el evento click
        toggle.addEventListener('click', function() {
            // Obtén el elemento .filter-by
            const filterBy = document.querySelector('.filter-by--container');

            // Si el elemento .filter-by existe
            if (filterBy) {
                // Togglear la clase filter-by--is-open
                filterBy.classList.toggle('filter-by--container--is-open');
            }
        });
    }
});

// Añade drag para los elementos con scroll horizontal
document.addEventListener('DOMContentLoaded', (event) => {
  const sliders = document.querySelectorAll('.is-style-group-horizontal-scroll');
  let isDown = false;
  let startX;
  let scrollLeft;

  // Añade el evento a cada slider
  sliders.forEach(slider => {
      slider.addEventListener('mousedown', (e) => {
          isDown = true;
          slider.classList.add('active');
          startX = e.pageX - slider.offsetLeft;
          scrollLeft = slider.scrollLeft;
      });
      slider.addEventListener('mouseleave', () => {
          isDown = false;
          slider.classList.remove('active');
      });
      slider.addEventListener('mouseup', () => {
          isDown = false;
          slider.classList.remove('active');
      });
      slider.addEventListener('mousemove', (e) => {
          if(!isDown) return;
          e.preventDefault();
          const x = e.pageX - slider.offsetLeft;
          const walk = (x - startX) * 3; //scroll-fast
          slider.scrollLeft = scrollLeft - walk;
          console.log(walk);
      });
  });

});


// Añade clase a body cuando se hace scroll
window.addEventListener("scroll", function() {
  if (window.scrollY > 0) {
      document.body.classList.add("scrolled");
  } else {
      document.body.classList.remove("scrolled");
  }
});