let slideIndex = 0;
const itemsToShow = 3; // Número de tarjetas visibles al mismo tiempo

function plusSlides(n) {
  slideIndex += n;
  const slides = document.querySelectorAll(".carousel-item");
  const totalSlides = slides.length;

  // Circularidad: ajusta el índice para que siempre sea válido y mantenga la rotación
  if (slideIndex >= totalSlides) {
    slideIndex = 0;
  } else if (slideIndex < 0) {
    slideIndex = totalSlides - itemsToShow;
  }

  showSlides();
}

function showSlides() {
  const slides = document.querySelectorAll(".carousel-item");
  const carousel = document.querySelector(".carousel");

  // Calcular el desplazamiento basado en el ancho de cada tarjeta
  const slideWidth = slides[0].offsetWidth + 20; // Ancho de la tarjeta + espacio entre ellas
  const offset = -slideIndex * slideWidth;
  carousel.style.transform = `translateX(${offset}px)`;
}

// Funciones para desplazar a la izquierda o derecha
function scrollLeft() {
  plusSlides(-1);
}

function scrollRight() {
  plusSlides(1);
}

// Ajuste automático cuando se cambia el tamaño de la ventana
window.addEventListener("resize", () => {
  showSlides();
});