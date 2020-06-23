
//Show filters area

const navFilters = document.getElementById('filters');

function handleButtonFilter(){
  if(navFilters.classList.value.includes('hide')){
    navFilters.classList.remove('hide')
  }else{
    navFilters.classList.add('hide')
  }
}

class Gallery {
  constructor() {
    this.gallery = document.querySelector('[data-gallery="gallery"]');
    this.galleryList = document.querySelectorAll('[data-gallery="list"]');
    this.galleryMain = document.querySelector('[data-gallery="main"]');

    this.changeImage = this.changeImage.bind(this);
  }

  changeImage({currentTarget}) {
    this.galleryMain.src = currentTarget.src;
  }

  addChangeEvent() {
    this.galleryList.forEach(img => {
      img.addEventListener('click', this.changeImage);
      img.addEventListener('mouseover', this.changeImage);
    })
  }

  init() {
    if(this.gallery) {
      this.addChangeEvent();
    }
  }
}

const gallery = new Gallery();
gallery.init();




