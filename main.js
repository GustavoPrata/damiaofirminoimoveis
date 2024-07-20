const imgExample = document.querySelector('.stack-slider__slide1')
const imgExample2 = document.querySelector('.stack-slider__slide2')
const imgExample3 = document.querySelector('.stack-slider__slide3')
const imgExample4 = document.querySelector('.stack-slider__slide4')
const imgExample5 = document.querySelector('.stack-slider__slide5')
const imgExample6 = document.querySelector('.stack-slider__slide6')
const imgExample7 = document.querySelector('.stack-slider__slide7')
const imgExample8 = document.querySelector('.stack-slider__slide8')
const imgExample9 = document.querySelector('.stack-slider__slide9')
const imgExample10 = document.querySelector('.stack-slider__slide10')

function openQrCodea() {
        imgExample.classList.add('active') 
        imgExample2.classList.add('active')
        imgExample3.classList.add('active')
        imgExample4.classList.add('active')
        imgExample5.classList.add('active')
        imgExample6.classList.add('active')
        imgExample7.classList.add('active')
        imgExample8.classList.add('active')
        imgExample9.classList.add('active')
        imgExample10.classList.add('active')
    }

function closeQrCodea() {
    imgExample.classList.remove('active')
    imgExample2.classList.remove('active')
    imgExample3.classList.remove('active')
    imgExample4.classList.remove('active')
    imgExample5.classList.remove('active')
    imgExample6.classList.remove('active')
    imgExample7.classList.remove('active')
    imgExample8.classList.remove('active')
    imgExample9.classList.remove('active')
    imgExample10.classList.remove('active')
}

/*  abre e fecha o menu quando clicar no icone: hamburguer e x */
const nav = document.querySelector('#header nav')
const toggle = document.querySelectorAll('nav .toggle')

for (const element of toggle) {
  element.addEventListener('click', function () {
    nav.classList.toggle('show')
  })
}

/* quando clicar em um item do menu, esconder o menu */
const links = document.querySelectorAll('nav ul li a')

for (const link of links) {
  link.addEventListener('click', function () {
    nav.classList.remove('show')
  })
}

/* mudar o header da página quando der scroll */
const header = document.querySelector('#header')
const navHeight = header.offsetHeight

function changeHeaderWhenScroll() {
  if (window.scrollY >= navHeight) {
    // scroll é maior que a altura do header
    header.classList.add('scroll')
  } else {
    // menor que a altura do header
    header.classList.remove('scroll')
  }
}

/* Testimonials carousel slider swiper */
const swiper = new Swiper('.swiper-container', {
  slidesPerView: 1,
  pagination: {
    el: '.swiper-pagination'
  },
  mousewheel: true,
  keyboard: true,
  breakpoints: {
    767: {
      slidesPerView: 2,
      setWrapperSize: true
    }
  }
})

const swiperService = new Swiper('.swiper-container-service', {
    slidesPerView: 1,
    pagination: {
      el: '.swiper-pagination-service'
    },
    navigation: {
        nextEl: '.swiper-button-next1',
        prevEl: '.swiper-button-prev1',
      },
    mousewheel: true,
    keyboard: true,
    breakpoints: {
      767: {
        slidesPerView: 2,
        setWrapperSize: true,
      }
    }
  })

  const swiperGerenciamento = new Swiper('.swiper-container-gerenciamento', {
    slidesPerView: 1,
    navigation: {
        nextEl: '.swiper-button-next2',
        prevEl: '.swiper-button-prev2',
      },
      pagination: {
        el: '.swiper-pagination-gerenciamento'
      },
    mousewheel: true,
    keyboard: true,
    breakpoints: {
      767: {
        slidesPerView: 2,
        setWrapperSize: true,
      }
    }
  })

  const swiperConstruction = new Swiper('.swiper-container-construction', {
    slidesPerView: 1,
    pagination: {
      el: '.swiper-pagination-construction'
    },
    mousewheel: true,
    keyboard: true,
    breakpoints: {
      767: {
        slidesPerView: 4,
        setWrapperSize: true,
    
        
      }
    }
  })

  const swiperFinishing = new Swiper('.swiper-container-finishing', {
    slidesPerView: 1,
    pagination: {
      el: '.swiper-pagination-finishing'
    },
    mousewheel: true,
    keyboard: true,
    breakpoints: {
      767: {
        slidesPerView: 4,
        setWrapperSize: true,
    
        
      }
    }
  })

/* ScrollReveal: Mostrar elementos quando der scroll na página */
const scrollReveal = ScrollReveal({
  origin: 'left',
  distance: '30px',
  duration: 999,
  reset: true
})

scrollReveal.reveal(
  `#home .image, #home .text,
  #about .image, #about .text, #about .stats ,
  #services header, #services .service-card, #services .service-card2 ,
 #constructions .construction-title ,  #constructions .construction-title2 , 
  #constructions .construction-btn ,
  #testimonials header, #testimonials .testimonials
  #contact .text , #contact .links ,
  footer .brand, footer .social
  `,
  { interval: 200 }
)

/* Botão voltar para o topo */
const backToTopButton = document.querySelector('.back-to-top')

function backToTop() {
  if (window.scrollY >= 560) {
    backToTopButton.classList.add('show')
  } else {
    backToTopButton.classList.remove('show')
  }
}

/* Menu ativo conforme a seção visível na página */
const sections = document.querySelectorAll('main section[id]')
function activateMenuAtCurrentSection() {
  const checkpoint = window.pageYOffset + (window.innerHeight / 8) * 4

  for (const section of sections) {
    const sectionTop = section.offsetTop
    const sectionHeight = section.offsetHeight
    const sectionId = section.getAttribute('id')

    const checkpointStart = checkpoint >= sectionTop
    const checkpointEnd = checkpoint <= sectionTop + sectionHeight

    if (checkpointStart && checkpointEnd) {
      document
        .querySelector('nav ul li a[href*=' + sectionId + ']')
        .classList.add('active')
    } else {
      document
        .querySelector('nav ul li a[href*=' + sectionId + ']')
        .classList.remove('active')
    }
  }
}

/* When Scroll */
window.addEventListener('scroll', function () {
  changeHeaderWhenScroll()
  backToTop()
  activateMenuAtCurrentSection()
    })


const openGallery = document.querySelector('.construction-btn')
const openGalleryFinishing = document.querySelector('.construction-btn-finishing')
const gallery = document.querySelector('.construction-gallery')
const galleryAnimation = document.querySelector('.construction-animation')
const galleryFinishing = document.querySelector('.construction-gallery-finishing')
const galleryAnimationFinishing = document.querySelector('.construction-animation-finishing')

function galleryActive () {
        gallery.classList.toggle('gallery-active')
        galleryAnimation.classList.toggle('gallery-show')
    } 

function galleryActiveFinishing () {
    galleryFinishing.classList.toggle('gallery-active-finishing')
    galleryAnimationFinishing.classList.toggle('gallery-show-finishing')
} 


let valueDisplays = document.querySelectorAll(".num")
let interval = 5000
let about = document.getElementById("about")

valueDisplays.forEach((valueDisplay) => {
    let startValue = 0
    let endValue = parseInt(valueDisplay.getAttribute("data-val"))
    let duration = Math.floor(interval / endValue)
    let counter = setInterval(function () {
        if (window.pageYOffset >= about.offsetTop) {
            startValue += 15
            valueDisplay.textContent = startValue
        }
         if (startValue == endValue) {
            clearInterval(counter)
        }
    }, duration)
})

function populateTimeOptions() {
  const timeSelect = document.getElementById('time');
  const startTime = 8; // 08:00
  const endTime = 19; // 18:00
  const interval = 60; // Intervalo de 30 minutos

  for (let hour = startTime; hour < endTime; hour++) {
      for (let minute = 0; minute < 60; minute += interval) {
          let timeLabel = `${String(hour).padStart(2, '0')}:${String(minute).padStart(2, '0')}`;
          let option = document.createElement('option');
          option.value = timeLabel;
          option.textContent = timeLabel;
          timeSelect.appendChild(option);
      }
  }
}

function adjustAvailableDates() {
  const dateInput = document.getElementById('date');
  const today = new Date();
  const minDate = new Date(today.getFullYear(), today.getMonth(), today.getDate() + 1); // Próximo dia

  const minYear = minDate.getFullYear();
  const minMonth = String(minDate.getMonth() + 1).padStart(2, '0'); // Meses começam em 0
  const minDay = String(minDate.getDate()).padStart(2, '0');

  dateInput.setAttribute('min', `${minYear}-${minMonth}-${minDay}`);
}

// Inicializa as funções
populateTimeOptions();
adjustAvailableDates();

function formatPhone(value) {
  // Remove todos os caracteres que não sejam números
  value = value.replace(/\D/g, '');

  // Aplica a formatação
  if (value.length > 11) {
      value = value.substring(0, 11);
  }
  if (value.length > 7) {
      value = value.substring(0, 7) + '-' + value.substring(7);
  }
  if (value.length > 2) {
      value = '(' + value.substring(0, 2) + ') ' + value.substring(2);
  }
  return value;
}

// Adiciona evento ao campo de telefone
document.getElementById('phone').addEventListener('input', function(event) {
  const phoneInput = event.target;
  phoneInput.value = formatPhone(phoneInput.value);
});

document.getElementById('appointmentForm').addEventListener('submit', function(event) {
  event.preventDefault();
  var form = event.target;

  fetch(form.action, {
      method: form.method,
      body: new FormData(form)
  })
  .then(response => response.json())
  .then(data => {
      if (data.status === 'success') {
          // Limpa os campos do formulário
          form.reset();
          
          // Exibe a notificação de sucesso
          var notification = document.getElementById('notification');
          notification.textContent = data.message;
          notification.style.display = 'block';
          
          // Remove a notificação após 3 segundos
          setTimeout(function() {
              notification.style.display = 'none';
          }, 3000);
      } else {
          alert('Erro: ' + data.message);
      }
  })
  .catch(error => {
      console.error('Erro:', error);
  });
});

  
