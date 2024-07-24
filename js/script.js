      // Menganimasikan card saat di viewport
      function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
          rect.top >= 0 &&
          rect.left >= 0 &&
          rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
          rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
      }
    
      function handleScroll() {
        const elements = document.querySelectorAll('.animate');
        elements.forEach((element) => {
          if (isInViewport(element)) {
            element.classList.add('visible');
          }
        });
      }

      window.addEventListener('scroll', handleScroll);
      handleScroll();

      

      // buat scroll ke atas
      document.addEventListener('DOMContentLoaded', function() {
        const backToTop = document.getElementById('backToTop');
        
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) { // Ganti 300 dengan jarak scroll yang diinginkan
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });
    });


  
  

  
    
    