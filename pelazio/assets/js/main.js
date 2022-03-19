jQuery(document).ready(function ($) {
//first slide show
    $(".slider-discount").owlCarousel({
        items: 5,
        loop: false,
        nav: true,
        dots: false,
        slideSpeed: 1e3,
        stagePadding: 0,
        margin: 0,
        autoplay: true,
        rtl: true,
        autoplayHoverPause: true,
        navText: ["", ""],
        responsive: {
            0: {items: 1},
            600: {items: 2},
            769: {items: 2},
            950: {items: 3},
            1025: {items: 4},
            1441: {items: 5}
        }
    });

//logo slide show
    $(".slider-logo").owlCarousel({
        items: 6,
        loop: true,
        nav: true,
        dots: false,
        margin: 0,
        rtl: true,
        autoplay: true,
        smartSpeed: 2500,
        slideTransition: 'linear',
        // autoplayTimeout: 1000,
        autoplaySpeed: 6000,
        autoplayHoverPause: true,
        navText: ["", ""],
        responsive: {
            0: {items: 1},
            370: {items: 2},
            576: {items: 3},
            769: {items: 3},
            1025: {items: 5},
            1441: {items: 6}
        }
    });

    $(".slider-pro").owlCarousel({
        items: 2,
        loop: true,
        nav: false,
        dots: true,
        slideSpeed: 1e3,
        stagePadding: 0,
        margin: 0,
        autoplay: true,
        rtl: true,
        autoplayHoverPause: true,
        navText: ["", ""],
        responsive: {
            0: {items: 1},
            550: {items: 2},
            767: {items: 2},
        }
    });

    $(".slider-banner").owlCarousel({
        items: 2,
        loop: true,
        nav: false,
        dots: true,
        slideSpeed: 1e3,
        stagePadding: 0,
        margin: 0,
        autoplay: true,
        rtl: true,
        autoplayHoverPause: true,
        navText: ["", ""],
        responsive: {
            0: {items: 1},
            400: {items: 2},
        }
    });

    $(".slider-top").owlCarousel({
        items: 1,
        loop: true,
        nav: true,
        dots: true,
        slideSpeed: 1e3,
        stagePadding: 0,
        margin: 0,
        autoplay: true,
        rtl: true,
        autoplayHoverPause: true,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        navText: ["", ""],
    });
});

const darkBackground = document.querySelector('.dark-background');

//small footer menu
const small_right_menu = document.querySelectorAll('.top-menu__lg-fixed-title');
const small__right_menu_items = document.querySelectorAll('.top-menu__lg__dropdown')
if (small_right_menu) {
    for (let j = 0; j < small_right_menu.length; j++) {
        small_right_menu[j].addEventListener('click', () => {
            small__right_menu_items[j].classList.toggle('top-menu__lg__dropdown-active');
            small_right_menu[j].classList.toggle('assign');
        })
    }
}
//small footer menu
const small_menu = document.querySelectorAll('.footer-menu__small ul li span');
const small_menu_items = document.querySelectorAll('.footer-menu__dropdown')
if (small_menu) {
    for (let j = 0; j < small_menu.length; j++) {
        small_menu[j].addEventListener('click', () => {
            small_menu_items[j].classList.toggle('footer-menu__dropdown-active');
            small_menu[j].classList.toggle('assign');
        })
    }
}

//small menu
const main = document.getElementsByTagName('main')[0];
const small_bars_menu = document.querySelector('.top-menu__lg');
if (small_bars_menu) {
    small_bars_menu.addEventListener('click', () => {
        document.querySelector('.top-menu__lg-fixed').classList.toggle('top-menu__lg-fixed__display');
        darkBackground.style.display = 'block'
    });
    darkBackground.addEventListener('click', () => {
        document.querySelector('.top-menu__lg-fixed').classList.remove('top-menu__lg-fixed__display');
        darkBackground.style.display = 'none'
    })
}
// each product des button
const productInfoBTN = document.querySelectorAll('.extra-container__btn li');
const productInfoContent = document.querySelectorAll('.extra-container__text-info');
if (productInfoBTN) {
    for (let i = 0; i < productInfoBTN.length; i++) {
        productInfoBTN[i].addEventListener('click', () => {
            for (let i = 0; i < productInfoBTN.length; i++) {
                productInfoBTN[i].classList.remove("active");
            }
            productInfoBTN[i].classList.add("active");
        })
    }
}
if (productInfoContent) {
    for (let i = 0; i < productInfoBTN.length; i++) {
        productInfoBTN[i].addEventListener('click', () => {
            for (let j = 0; j < productInfoContent.length; j++) {
                productInfoContent[j].classList.remove('extra-container__text-active');
            }
            productInfoContent[i].classList.add('extra-container__text-active')
        })
    }
}

//price sidebar
const priceSidebar = document.querySelector('.product-price-range .product-sidebar__top');
const priceSidebarItems = document.querySelector('.product-price__bottom')
if (priceSidebar) {
    priceSidebar.addEventListener('click', () => {
        priceSidebarItems.classList.toggle('product-price__bottom-active');
        priceSidebar.classList.toggle('assign');
    })
}
//filter menu sm
const productPageFilter = document.querySelector('.all-products__sidebar-sm button');
const filterMenuSm = document.querySelector('.product-sidebar-sm');
const filterMenuBackSm = document.querySelector('.product-sidebar-sm__close');
if (productPageFilter) {
    productPageFilter.addEventListener('click', () => {
        filterMenuSm.style.display = 'block';
        darkBackground.style.display = 'block'
    });
    filterMenuBackSm.addEventListener('click', () => {
        filterMenuSm.style.display = 'none';
        darkBackground.style.display = 'none'
    });
    darkBackground.addEventListener('click', () => {
        filterMenuSm.style.display = 'none'
    })

}
const productPageOrdered = document.querySelector('.product-page__btn-ordered');
const productPageOrderedBox = document.querySelector('.product-page__ordered-box');
const productPageOrderedCross = document.querySelector('.product-page__ordered-box h6 i')
if (productPageOrdered) {
    productPageOrdered.addEventListener('click', () => {
        darkBackground.style.display = 'block'
        productPageOrderedBox.style.display = 'flex'
    })
    darkBackground.addEventListener('click', () => {
        darkBackground.style.display = 'none'
        productPageOrderedBox.style.display = 'none'
    })
}
if (productPageOrderedCross) {
    productPageOrderedCross.addEventListener('click', () => {
        darkBackground.style.display = 'none'
        productPageOrderedBox.style.display = 'none'
    })
}
// ordered by in category page on sm screen
const orderByItem = document.querySelectorAll('.product-page__ordered-box ul li');
if (orderByItem) {
    for (let j = 0; j < orderByItem.length; j++) {
        orderByItem[j].addEventListener('click', () => {
            for (let i = 0; i < orderByItem.length; i++) {
                orderByItem[i].classList.remove("active");
            }
            orderByItem[j].classList.add("active");
        })
    }
}
//click checkbox is shopping basket
const checked = document.querySelector('#another-add');
const checkedText = document.querySelector('.another-add-input');
if (checked) {
    checked.addEventListener('click', () => {
        if (checked.checked == true) {
            checkedText.style.display = "flex";
        } else {
            checkedText.style.display = "none";
        }
    })
}
//go up
const scrollToTopButton = document.querySelector(".go-up");
//scroll
window.addEventListener('scroll', () => {
    scrollFunc();
})
const scrollFunc = () => {
    let y = window.scrollY;

    if (scrollToTopButton) {
        if (y > 0) {
            scrollToTopButton.style.visibility = 'visible';
            scrollToTopButton.style.opacity = '1';
        } else {
            scrollToTopButton.style.visibility = 'hidden';
            scrollToTopButton.style.opacity = '0';
        }
    }
}
const scrollToTop = () => {
    const c = document.documentElement.scrollTop || document.body.scrollTop;
    if (c > 0) {
        window.requestAnimationFrame(scrollToTop);
        window.scrollTo(0, c - c / 10);
    }
};
if (scrollToTopButton) {
    scrollToTopButton.onclick = function (e) {
        e.preventDefault();
        scrollToTop();
    }
}
//about site in the footer
const aboutUsContent = document.querySelector('.description-section__content');
if (aboutUsContent) {
    aboutUsContent.addEventListener('click', () => {
        aboutUsContent.classList.toggle('active')
    })
}
//sm top menu
jQuery(document).ready(function ($) {
    $('.top-menu-sm .menu-item-has-children > a').on("click", function (event) {
        event.preventDefault()
        $(this).parent().find('ul').first().toggle(300, 'swing');
        $(this).parent().first().toggleClass('assign');
        $(this).parent().siblings().find('ul').hide(200);
        $(this).parent().find('ul').mouseleave(function () {
            var thisUI = $(this);
            $('html').click(function () {
                thisUI.hide();
                $('html').unbind('click');
            });
        });
    });
});
//lg top menu
jQuery(document).ready(function ($) {
    $(".top-menu-lg li.menu-item-has-children").hover(function () {
        var isHovered = $(this).is(":hover");
        if (isHovered) {
            $(this).children("ul").stop().slideDown(100);
        } else {
            $(this).children("ul").stop().slideUp(100);
        }
    });
    $(".top-menu-lg .menu__items__cat>.sub-menu>li.menu-item-has-children>.sub-menu li.menu-item-has-children").hover(function () {
        var isHovered = $(this).is(":hover");
        if (isHovered) {
            $(this).children("ul").css('display', 'flex')
        } else {
            $(this).children("ul").css('display', 'none')
        }
    });
});
//add button to sidebar shop page
jQuery(document).ready(function ($) {
    $('.wc-block-product-categories').append(
        "<div class=\"product-sidebar product-category__see-all\">\n" +
        "    <button>\n" +
        "      <span>مشاهده همه</span>\n" +
        "      <div class=\"product-category__btn-icon\"></div>\n" +
        "    </button>\n" +
        "  </div>");
    //category sidebar
    $(".product-category__see-all button").click(function () {
        $(".wc-block-product-categories.is-list").toggleClass("active");
        $(".product-category__btn-icon").toggleClass("assign");
    });
});
//input single product +/-
jQuery(document).ready(function ($) {
    $('.quantity .minus').one().on('click', function () {
        $input = $(this).next('input.qty');
        var val = parseInt($input.val());
        var step = $input.attr('step');
        step = 'undefined' !== typeof (step) ? parseInt(step) : 1;
        if (val > 1) {
            $input.val(val - step).change();
        }
    });

    $('.quantity .plus').one().on('click', function () {
        $input = $(this).prev('input.qty');
        var val = parseInt($input.val());
        var step = $input.attr('step');
        step = 'undefined' !== typeof (step) ? parseInt(step) : 1;
        if (val < 10) {
            $input.val(val + step).change();
        }
    });

});
//modal login and sign up
const modal = document.getElementById("myModal");
var span = document.querySelector(".modal-header .close");
if (span && modal) {
    span.onclick = function () {
        modal.style.display = "none";
    }
// When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}