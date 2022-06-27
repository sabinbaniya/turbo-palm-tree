document.addEventListener("DOMContentLoaded", () => {
  const slider = document.getElementById("slider1");
  const testimonials = document.getElementById("testimonials");
  const button_forward = document.getElementById("button_forward");
  const button_backward = document.getElementById("button_backward");
  let isDown = false;
  let startX;
  let scrollLeft;

  slider.addEventListener("mousedown", (e) => {
    isDown = true;
    slider.classList.add("active");
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
  });
  slider.addEventListener("mouseleave", () => {
    isDown = false;
    slider.classList.remove("active");
  });
  slider.addEventListener("mouseup", () => {
    isDown = false;
    slider.classList.remove("active");
  });
  slider.addEventListener("mousemove", (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - slider.offsetLeft;
    const walk = (x - startX) * 1; //scroll-fast
    slider.scrollLeft = scrollLeft - walk;
  });

  let testimonials_number = 0;
  button_forward.onclick = () => {
    if (testimonials_number === 3) {
      testimonials_number = 0;
      return (testimonials.scrollLeft = 0);
    }
    testimonials_number++;
    testimonials.scrollLeft =
      (testimonials.scrollWidth / 4) * testimonials_number;
  };

  button_backward.onclick = () => {
    console.log(testimonials_number);
    if (testimonials_number === 0) {
      testimonials_number = 3;
      return (testimonials.scrollLeft = testimonials.scrollWidth);
    }
    testimonials_number--;
    testimonials.scrollLeft =
      (testimonials.scrollWidth / 4) * testimonials_number;
  };
});
