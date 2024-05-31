const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

// App
const app = {
    //----- Function handle ------
    // Handle event
    handleEvent: function () {
        const toTop = $('#toTop');
        document.onscroll = function () {
            const scrollTop =
                document.documentElement.scrollTop || window.scrollY;

            // Handle button to top
            if (scrollTop >= 50) {
                toTop.style.display = 'flex';
            } else {
                toTop.style.display = 'none';
            }

            if (scrollTop > 100) {
                toTop.style.opacity = 1;
            } else {
                toTop.style.opacity = 0;
            }

            toTop.onclick = function () {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            };
        };
    },

    handleSliderProduct: function () {
        const imgBtns = document.querySelectorAll('.img-select a');
        const next = document.querySelector('#next');
        let imgId = 1;

        if (imgBtns.length > 0) {
            imgBtns.forEach((imgItem) => {
                imgItem.addEventListener('click', (event) => {
                    event.preventDefault();
                    imgId = imgItem.dataset.id;
                    slideImage();
                });
            });
        }

        function slideImage() {
            const imgShowcase = document.querySelector('.img-showcase');
            if (imgShowcase) {
                const displayWidth =
                    imgShowcase.querySelector('img:first-child').clientWidth;
                imgShowcase.style.transform = `translateX(${
                    -(imgId - 1) * displayWidth
                }px)`;
            }
        }

        window.addEventListener('resize', slideImage);
    },

    handleInputQuantityCart: function () {},

    // function start
    start: function () {
        this.handleEvent();
        this.handleSliderProduct();
        this.handleInputQuantityCart();
    },
};

// Init function start
app.start();

function handleParams(filter, value) {
    const currentUrl = window.location.href; // Lấy link hiện tại
    const newUrl = new URL(currentUrl); // Tạo URL object từ link hiện tại

    const currentValue = newUrl.searchParams.get(filter);

    // Nếu giá trị của value khác giá trị hiện tại của param thì toggle
    // Nếu value không được truyền vào, hoặc giá trị truyền vào là null hoặc undefined, xóa param đó đi
    if (value && value == currentValue) {
        newUrl.searchParams.delete(filter); // Xóa param filter
    } else {
        newUrl.searchParams.set(filter, value); // Thêm param filter với giá trị là value
    }

    const filteredUrl = newUrl.toString(); // Chuyển URL object thành string

    window.location.href = filteredUrl;
}

const message = document.querySelector('#message');

setTimeout(() => {
    if (message) {
        message.style.display = 'none';
    }
}, 5000);
