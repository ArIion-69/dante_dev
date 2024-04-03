(function ($) {

    //mobile menu button
    $('.d_header-mobile-button').click(function () {
        $(this).toggleClass('active');
        $('.d_header').toggleClass('menuOpened');
    });
    $('.d_header-tablet-menu-overlay').click(function (e) {
        if (e.target == e.currentTarget) {
            $('.d_header-mobile-button').trigger('click');
        }
    });


    $('.desktop-menu li').click(function (ev) {
        $(this).find('>ul').slideToggle();
        $(this).toggleClass('menu-item-open');
        ev.stopPropagation();
    });


    $(function () {
        $('.tablet-menu__list > li').click(function (e) {
            e.stopPropagation();
            var $el = $('.tablet-menu__sub-list--level-1', this);
            $('.tablet-menu__list > li > .tablet-menu__sub-list--level-1').not($el).slideUp();
            $el.stop(true, true).slideToggle(400);
        });
        $('.tablet-menu__list > li > .tablet-menu__sub-list--level-1').click(function (e) {
            e.stopImmediatePropagation();
        });
    });


    $(function () {
        $('.tablet-menu__sub-list--level-1 > li').click(function (e) {
            e.stopPropagation();
            var $el = $('.tablet-menu__sub-list--level-2', this);
            $('.tablet-menu__sub-list--level-1 > li > .tablet-menu__sub-list--level-2').not($el).slideUp();
            $el.stop(true, true).slideToggle(400);
        });
        $('.tablet-menu__sub-list--level-1 > li > .tablet-menu__sub-list--level-2').click(function (e) {
            e.stopImmediatePropagation();
        });
    });



    //accordion
    $('.d_accordion-btn_clickable').click(function () {
        $(this).toggleClass('active');
        $(this).next().slideToggle();
    });

    //show phones
    $('.d_header-bottom-phones-show span').click(function () {
        $(this).closest('.d_header-bottom-phone').find('.d_header-bottom-phone-hidden').hide();
        $(this).closest('.d_header-bottom-phone').find('.d_header-bottom-phone-real').css('display', 'block');
        $(this).hide();
    });
    $('.d_header-bottom-phones-show-all span').click(function () {
        $('.d_header-bottom-phones-show span').trigger('click');
        $(this).hide();
    });




    //dropdowns
    var Dropdown = function (container) {
        this.container = container;
        this.button = $(container).find("[data-role=button]");
        this.body = $(container).find("[data-role=body]");
        this.items = $(container).find("[data-role=item]");
        this.closebtn = $(container).find("[data-role=close]");

        this.button.on("click", $.proxy(function (e) {
            if (!this.visible) {
                this.open();
            }
            else {
                this.close();
            }
        }, this));

        this.items.on("click", $.proxy(this.close, this));
        this.closebtn.on("click", $.proxy(this.close, this));
    };

    Dropdown.prototype = {
        "visible": false,
        "open": function () {
            this.body.show();
            this.button.addClass('active');
            this.button.closest('[data-role="container"]').addClass('active');
            this.visible = true;
            var just = true;
            $(document).on("click.dropdown" + this.container, $.proxy(function (e) {
                if (!just && !$(e.target).closest(this.body).length) {
                    this.close();
                }
                just = false;
            }, this));
        },
        "close": function () {
            this.body.hide();
            this.button.removeClass('active');
            this.button.closest('[data-role="container"]').removeClass('active');
            this.visible = false;
            $(document).off("click.dropdown" + this.container);
        }
    };

    $('[data-role="item"]').click(function () {
        var thisCont = $(this).closest('[data-role="container"]');

        var thisText = $(this).html();
        thisCont.find('[data-role="item"]').removeClass('selected');
        $(this).addClass('selected');
        thisCont.find('[data-role="button"]').html(thisText);
        if ($(this).attr('data-value') === 'default') {
            thisCont.removeClass('notDefault');
        } else {
            thisCont.addClass('notDefault');
        }
    });

    new Dropdown("#headerPhone");
    new Dropdown("#byCategories");
    new Dropdown("#byPop");
    new Dropdown("#byReadTime");
    new Dropdown("#byThemes");
    new Dropdown("#byAuthors");

    //spoiler
    $('.d_spoiler-show').click(function () {
        $(this).closest('.d_side-element').find('.d_spoiler-content-body').toggleClass('show');
        if ($(this).closest('.d_side-element').find('.d_spoiler-content-body').hasClass('show')) {
            $(this).text('Скрыть все содержание');
        } else {
            $(this).text('Показать все содержание');
        }
    });

    //tabs
    $('.d_tab').click(function () {
        var cont = $(this).closest('.d_tabs-container');
        var index = $(this).attr('data-index');
        $('.d_tab').removeClass('active');
        $(this).addClass('active');
        cont.removeClass('first-tab-active').removeClass('last-tab-active');
        if ($(this).is(':first-child')) {
            cont.addClass('first-tab-active');
        }
        if ($(this).is(':last-child')) {
            cont.addClass('last-tab-active');
        }
        $('.d_content').removeClass('active');
        $('.d_content[data-index="' + index + '"]').addClass('active');
    });

    //reviews slider
    new Swiper('.d_reviews-slider-wrapper .swiper-container', {
        slidesPerView: 'auto',
        spaceBetween: 0,
        loop: true,
        grabCursor: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

    //articles slider
    new Swiper('.d_articles-slider-wrapper .swiper-container', {
        slidesPerView: 'auto',
        spaceBetween: 14,
        loop: true,
        grabCursor: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

    //diplom slider
    new Swiper('.d_diplom-slider-wrapper .swiper-container', {
        slidesPerView: 3,
        spaceBetween: 21,
        loop: false,
        grabCursor: true,
        navigation: {
            nextEl: '.d_diplom-slider-wrapper .swiper-button-next',
            prevEl: '.d_diplom-slider-wrapper .swiper-button-prev',
        },
        breakpoints: {
            414: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        }
    });

    new Swiper('.d_doctor-component-diplom-imgs ', {
        slidesPerView: 3,
        spaceBetween: 21,
        loop: false,
        grabCursor: true,
        navigation: {
            nextEl: '.d_diplom-slider-wrapper .swiper-button-next',
            prevEl: '.d_diplom-slider-wrapper .swiper-button-prev',
        },
        breakpoints: {
            414: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        }
    });

    //main slider
    new Swiper('.d_main-slider-wrapper .swiper-container', {
        slidesPerView: 1,
        loop: false,
        autoplay: {
            delay: 5000,
        },
        grabCursor: true,
        navigation: {
            nextEl: '.d_main-slider-wrapper .swiper-button-next',
            prevEl: '.d_main-slider-wrapper .swiper-button-prev',
        },
    });

    //small doctors slider
    if ($('.d_small-doctors-mobile-check').is(':hidden')) {
        new Swiper('.d_small-doctors-slider-wrapper .swiper-container', {
            slidesPerView: 'auto',
            spaceBetween: 10,
            loop: false,
            grabCursor: true,
        });
    }
})(jQuery);



// modal


var modal = document.getElementById("book-modal");

var span = document.getElementsByClassName("close")[0];

span.onclick = function () {
    modal.style.display = "none";
}

document.onkeydown = function (evt) {
    evt = evt || window.event;
    var isEscape = false;
    if ("key" in evt) {
        isEscape = (evt.key === "Escape" || evt.key === "Esc");
    } else {
        isEscape = (evt.keyCode === 27);
    }
    if (isEscape) {
        modal.style.display = "none";
    }
};

window.onclick = function (event) {
    if (event.target == modal || event.target == modal2) {
        modal.style.display = "none";
        modal2.style.display = "none";
    }
}

var allButtons = document.querySelectorAll('button.book-button');

for (var i = 0; i < allButtons.length; i++) {
    allButtons[i].addEventListener('click', function () {
        modal.style.display = "block";
    });
}






var modal2 = document.getElementById("book-modal2");

var span2 = document.getElementsByClassName("close2")[0];

span2.onclick = function () {
    modal2.style.display = "none";
}

var allButtons2 = document.querySelectorAll('button.book-button2');

for (var i = 0; i < allButtons2.length; i++) {
    var button_value = allButtons2[i].value;
    allButtons2[i].addEventListener('click', function (e) {
        document.getElementById("action_name").innerHTML = e.target.value;
        document.getElementById("action_name_form").value = e.target.value;
        modal2.style.display = "block";
    });
}

jQuery(document).ready(function () {
    jQuery('.js-example-basic-single').select2();
});


Fancybox.bind("#gallery a", {
});





