
class StackSlider {
    constructor() {
        this.slider = document.querySelector('.stack-slider')
        this.slides = this.slider.querySelectorAll('.stack-slider__slide')
        this.active = 0
        this.activeElement = this.slides[this.active]
        
        this.navigation()
        this.update()
    }
    
    setActive() {
        this.activeElement.classList.remove('stack-slider__slide--active')
        this.activeElement = this.slides[this.active]
        this.activeElement.classList.add('stack-slider__slide--active')
        let i = this.slides.length - this.active

        this.slides.forEach((slide, index) => {
            if (index === this.active) {
                i = 0
            }

            if (i === this.slides.length - 1) {
                slide.style.transitionDelay = '0s'
            } else {
                slide.style.transitionDelay = ''
            }

            slide.style.opacity = `${1 - (i * .2)}`
            slide.style.filter = `blur(${i}px)`
            slide.style.transform = `translateY(-${i * 35}px) scale(${1 - i / 10})`
            slide.style.transitionDelay = `.${i}s)`
            slide.style.zIndex = `-${i}`
            
            i += 1

        })
    }

    navigation() {
        const prev = document.querySelector('.stack-slider__prev')
        const next = document.querySelector('.stack-slider__next')

        prev.addEventListener('click', this.prev.bind(this))
        next.addEventListener('click', this.next.bind(this))

        this.pagination()
    }

    pagination() {
        const pagination = this.slider.querySelector('.stack-slider__pagination')

        this.slides.forEach((_, index) => {
            pagination.append(this.createBullet(index))
        })
    }

    createBullet(index) {
        const bullet = document.createElement('div')

        bullet.className = 'stack-slider__bullet'

        bullet.addEventListener('click', this.bulletHandler.bind(this, index))

        return bullet
    }

    bulletHandler(index) {
        this.active = index

        this.update()
    }

    updateBullet() {
        const bullets = this.slider.querySelectorAll('.stack-slider__bullet')

        bullets.forEach(bullet => bullet.classList.remove('stack-slider__bullet--active'))
        bullets[this.active].classList.add('stack-slider__bullet--active')
    }
    
    next() {
        if (this.active === this.slides.length - 1) {
            this.active = 0
        } else {
            this.active += 1
        }

        this.update()
    }
    
    prev() {
        if (this.active === 0) {
            this.active = this.slides.length - 1
        } else {
            this.active -= 1
        }

        this.update()
    }

    changeTitle() {
        const title = this.slider.querySelector('.stack-slider__title')
        const titles = [...this.slides].map(slide => slide.dataset.title)

        title.innerHTML = titles[this.active]
    }

    update() {
        this.setActive()
        this.updateBullet()
        this.changeTitle()
    }
}

const slider = new StackSlider()
