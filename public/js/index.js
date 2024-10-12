const book_slider = document.querySelector(".books-slider");
const left_btn = document.querySelector(".left-btn");
const right_btn = document.querySelector(".right-btn");

const firstBookWidth = book_slider.querySelector(".book-container").offsetWidth;

let isDragging = false, startX, startScrollLeft;

right_btn.addEventListener('click', () => {
    book_slider.scrollLeft += firstBookWidth;
})

left_btn.addEventListener('click', () => {
    book_slider.scrollLeft += -firstBookWidth;
})

const dragStart = (e) => {
    isDragging = true;
    book_slider.classList.add("dragging");
    startX = e.pageX;
    startScrollLeft = book_slider.scrollLeft;
}

const dragging = (e) => {
    if(!isDragging) return;
    book_slider.scrollLeft = startScrollLeft - (e.pageX - startX);
}

const dragStop = () => {
    isDragging = false;
    book_slider.classList.remove("dragging");
}

book_slider.addEventListener("mousedown", dragStart);
book_slider.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);