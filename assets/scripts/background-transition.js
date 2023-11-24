document.addEventListener("DOMContentLoaded", () => {
  const images = [
    "main-bg.jpg",
    // "bg2.jpg",
    // "bg3.jpg"
  ];

  let currentIndex = 0;

  function changeBackground() {
    document.body.style.backgroundImage = `url('./assets/images/${images[currentIndex]}')`;
    document.body.style.backgroundSize = "cover";
    let body = document.body.style;
    body.backgroundRepeat = "no-repeat";
    body.backgroundPosition = "center";
    // body.filter = "grayscale(100)";
    console.log(currentIndex);
    currentIndex = (currentIndex + 1) % images.length;
  }

  setInterval(changeBackground, 1000);
});
