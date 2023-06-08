//smarttwizard

function onFinish() { alert('Finish Clicked'); }
function onCancel(elm) { elm.smartWizard("reset"); }

$('#smartwizard').smartWizard({
  selected: 0,
  theme: 'dots', // basic, arrows, square, round, dots
  transition: {
    animation: 'none' // none|fade|slideHorizontal|slideVertical|slideSwing|css
  },
  anchor: {
    enableNavigation: true, // Enable/Disable anchor navigation
    enableNavigationAlways: true, // Activates all anchors clickable always
    enableDoneState: true, // Add done state on visited steps
    markPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
    unDoneOnBackNavigation: false, // While navigate back, done state will be cleared
    enableDoneStateNavigation: false // Enable/Disable the done state navigation
  },
  toolbarSettings: {
    showNextButton: true, // show/hide a Next button
    showPreviousButton: true, // show/hide a Previous button
    /* extraHtml: `<button class="btn btn-success" onclick="onFinish()">Complete</button>` */
  },
  lang: { // Language variables for button
    next: 'Suivant',
    previous: 'Précédent'
  },
});

// Écouteur d'événements pour le bouton "Next"
$("#smartwizard").on("click", ".btn-next", function () {
  // Appel de la méthode next() de Smart Wizard
  $("#smartwizard").smartWizard("next");
});

// Écouteur d'événements pour le bouton "Prev"
$("#smartwizard").on("click", ".btn-prev", function () {
  // Appel de la méthode prev() de Smart Wizard
  $("#smartwizard").smartWizard("prev");
});


//header sticky
if (window.innerWidth >= 950) {
  // Votre code pour le header sticky
  var header = document.querySelector('.navbar');

  window.addEventListener('scroll', function () {
    if (window.innerWidth >= 950) {
      header.classList.toggle("sticky", window.scrollY > 0);
    } else {
      header.classList.remove("sticky");
    }
  });
}

/* swiper */
const mySwiper = new Swiper('.swiper', {
  pagination: {
    el: '.swiper-pagination',
    type: 'bullets',
  },

  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
    pauseOnMouseEnter: true,
  },
});

//overlay dons
const closeButton = document.querySelectorAll('.close_button');
const overlayContainer = document.querySelector('.overlay_don');

closeButton.forEach(trigger => trigger.addEventListener("click", overLay))

function overLay() {
  overlayContainer.classList.toggle("overlay");
}

//button toggler
const hamburgerButton = document.querySelector(".nav_toggler");
const navigation = document.querySelector(".navbar-nav");

hamburgerButton.addEventListener("click", toggleNav);

function toggleNav() {
  hamburgerButton.classList.toggle("active");
  navigation.classList.toggle("active");
}



/* component pop up desciption activite */
const galleryImages = document.querySelectorAll('.gallery-image');
const modalContainer = document.querySelector('.modal-container');
const modalImage = document.querySelector('.modal-image');
const modalCloseButton = document.querySelector('.modal-close-button');
const modalPrevButton = document.querySelector('.modal-prev-button');
const modalNextButton = document.querySelector('.modal-next-button');
let currentImageIndex = 0;

// hide all images except for the first one
for (let i = 1; i < galleryImages.length; i++) {
  galleryImages[i].style.display = "none";
}

// add click event listener to each image
galleryImages.forEach((image, index) => {
  image.addEventListener('click', () => {
    // show the modal container
    modalContainer.style.display = "flex";
    // set the source of the modal image to the source of the clicked image
    modalImage.src = image.src;
    // set the current image index
    currentImageIndex = index;
    // show only the clicked image and hide all other images
    for (let i = 0; i < galleryImages.length; i++) {
      if (i === currentImageIndex) {
        galleryImages[i].style.display = "block";
      } else {
        galleryImages[i].style.display = "none";
      }
    }
  });
});

// add click event listener to the close button
modalCloseButton.addEventListener('click', () => {
  // hide the modal container
  modalContainer.style.display = "none";
  // show all gallery images except for the first one
  for (let i = 1; i < galleryImages.length; i++) {
    galleryImages[i].style.display = "none";
  }
  galleryImages[0].style.display = "block";
});

// add click event listener to the previous button
modalPrevButton.addEventListener('click', () => {
  // decrement the current image index
  currentImageIndex--;
  if (currentImageIndex < 0) {
    // set the current image index to the last image
    currentImageIndex = galleryImages.length - 1;
  }
  // set the source of the modal image to the source of the current image
  modalImage.src = galleryImages[currentImageIndex].src;
});

// add click event listener to the next button
modalNextButton.addEventListener('click', () => {
  // increment the current image index
  currentImageIndex++;
  if (currentImageIndex >= galleryImages.length) {
    // set the current image index to the first image
    currentImageIndex = 0;
  }
  // set the source of the modal image to the source of the current image
  modalImage.src = galleryImages[currentImageIndex].src;
});









