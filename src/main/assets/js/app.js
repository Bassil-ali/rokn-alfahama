(function ($) {

    $('.product .slider').owlCarousel({
        loop: 1,
        autoplay: true,
        nav: true,
        margin: 5,
        navText: ['<i class="bi bi-arrow-right-short"></i>', '<i class="bi bi-arrow-left-short"></i>'],
        responsive: {
            0: {
                items: 1,
            },
            460: {
                items: 2,
            },
            767: {
                items: 2,
            },
            992: {
                items: 4,
            }
        },
    });


    var thumbsize = 14;

    function draw(slider, splitvalue) {

        /* set function vars */
        var min = slider.querySelector('.min');
        var max = slider.querySelector('.max');
        var lower = slider.querySelector('.lower');
        var upper = slider.querySelector('.upper');
        var legend = slider.querySelector('.legend');
        var thumbsize = parseInt(slider.getAttribute('data-thumbsize'));
        var rangewidth = parseInt(slider.getAttribute('data-rangewidth'));
        var rangemin = parseInt(slider.getAttribute('data-rangemin'));
        var rangemax = parseInt(slider.getAttribute('data-rangemax'));

        /* set min and max attributes */
        min.setAttribute('max', splitvalue);
        max.setAttribute('min', splitvalue);

        /* set css */
        min.style.width = parseInt(thumbsize + ((splitvalue - rangemin) / (rangemax - rangemin)) * (rangewidth - (2 * thumbsize))) + 'px';
        max.style.width = parseInt(thumbsize + ((rangemax - splitvalue) / (rangemax - rangemin)) * (rangewidth - (2 * thumbsize))) + 'px';
        min.style.left = '0px';
        max.style.left = parseInt(min.style.width) + 'px';
        min.style.top = lower.offsetHeight + 'px';
        max.style.top = lower.offsetHeight + 'px';
        legend.style.marginTop = min.offsetHeight + 'px';
        // slider.style.height = (lower.offsetHeight + min.offsetHeight + legend.offsetHeight) + 'px';

        /* correct for 1 off at the end */
        if (max.value > (rangemax - 1)) max.setAttribute('data-value', rangemax);

        /* write value and labels */
        max.value = max.getAttribute('data-value');
        min.value = min.getAttribute('data-value');
        lower.innerHTML = min.getAttribute('data-value');
        upper.innerHTML = max.getAttribute('data-value');

    }

    function init(slider) {
        /* set function vars */
        var min = slider.querySelector('.min');
        var max = slider.querySelector('.max');
        var rangemin = parseInt(min.getAttribute('min'));
        var rangemax = parseInt(max.getAttribute('max'));
        var avgvalue = (rangemin + rangemax) / 2;
        var legendnum = slider.getAttribute('data-legendnum');

        /* set data-values */
        min.setAttribute('data-value', rangemin);
        max.setAttribute('data-value', rangemax);

        /* set data vars */
        slider.setAttribute('data-rangemin', rangemin);
        slider.setAttribute('data-rangemax', rangemax);
        slider.setAttribute('data-thumbsize', thumbsize);
        slider.setAttribute('data-rangewidth', slider.offsetWidth);

        /* write labels */
        var lower = document.createElement('span');
        var upper = document.createElement('span');
        lower.classList.add('lower', 'value');
        upper.classList.add('upper', 'value');
        lower.appendChild(document.createTextNode(rangemin));
        upper.appendChild(document.createTextNode(rangemax));
        slider.insertBefore(lower, min.previousElementSibling);
        slider.insertBefore(upper, min.previousElementSibling);

        /* write legend */
        var legend = document.createElement('div');
        legend.classList.add('legend');
        var legendvalues = [];
        for (var i = 0; i < legendnum; i++) {
            legendvalues[i] = document.createElement('div');
            var val = Math.round(rangemin + (i / (legendnum - 1)) * (rangemax - rangemin));
            legendvalues[i].appendChild(document.createTextNode(val));
            legend.appendChild(legendvalues[i]);

        }
        slider.appendChild(legend);

        /* draw */
        draw(slider, avgvalue);

        /* events */
        min.addEventListener("input", function () { update(min); });
        max.addEventListener("input", function () { update(max); });
    }

    function update(el) {
        /* set function vars */
        var slider = el.parentElement;
        var min = slider.querySelector('#min');
        var max = slider.querySelector('#max');
        var minvalue = Math.floor(min.value);
        var maxvalue = Math.floor(max.value);

        /* set inactive values before draw */
        min.setAttribute('data-value', minvalue);
        max.setAttribute('data-value', maxvalue);

        var avgvalue = (minvalue + maxvalue) / 2;

        /* draw */
        draw(slider, avgvalue);
    }

    var sliders = document.querySelectorAll('.min-max-slider');
    sliders.forEach(function (slider) {
        init(slider);
    });


    /**
     * Star Input
     */

    var activeclass = document.querySelectorAll('#star');
    for (var i = 0; i < activeclass.length; i++) {
        activeclass[i].addEventListener('click', activateClass);
    }

    function activateClass(e) {
        for (var i = 0; i < activeclass.length; i++) {
            activeclass[i].classList.remove('active');
        }
        this.classList.add('active');
    }




    /**
     * 
     * Slider Product
     * 
     */


    // var sync1 = $("#sync1");
    // var sync2 = $("#sync2");
    // var slidesPerPage = 5; //globaly define number of elements per page
    // var syncedSecondary = true;

    // sync1.owlCarousel({
    //     items: 1,
    //     slideSpeed: 2000,
    //     nav: false,
    //     autoplay: false,
    //     dots: true,
    //     loop: true,
    //     responsiveRefreshRate: 200,
    // }).on('changed.owl.carousel', syncPosition);

    // sync2
    //     .on('initialized.owl.carousel', function() {
    //         sync2.find(".owl-item").eq(0).addClass("current");
    //     })
    //     .owlCarousel({
    //         items: slidesPerPage,
    //         dots: true,
    //         nav: true,
    //         smartSpeed: 200,
    //         slideSpeed: 500,
    //         slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
    //         responsiveRefreshRate: 100,
    //         navText: ['<i class="bi bi-chevron-right"></i>', '<i class="bi bi-chevron-left"></i>'],
    //     }).on('changed.owl.carousel', syncPosition2);

    // function syncPosition(el) {
    //     //if you set loop to false, you have to restore this next line
    //     //var current = el.item.index;

    //     //if you disable loop you have to comment this block
    //     var count = el.item.count - 1;
    //     var current = Math.round(el.item.index - (el.item.count / 2) - .5);

    //     if (current < 0) {
    //         current = count;
    //     }
    //     if (current > count) {
    //         current = 0;
    //     }

    //     //end block

    //     sync2
    //         .find(".owl-item")
    //         .removeClass("current")
    //         .eq(current)
    //         .addClass("current");
    //     var onscreen = sync2.find('.owl-item.active').length - 1;
    //     var start = sync2.find('.owl-item.active').first().index();
    //     var end = sync2.find('.owl-item.active').last().index();

    //     if (current > end) {
    //         sync2.data('owl.carousel').to(current, 100, true);
    //     }
    //     if (current < start) {
    //         sync2.data('owl.carousel').to(current - onscreen, 100, true);
    //     }
    // }

    // function syncPosition2(el) {
    //     if (syncedSecondary) {
    //         var number = el.item.index;
    //         sync1.data('owl.carousel').to(number, 100, true);
    //     }
    // }

    // sync2.on("click", ".owl-item", function(e) {
    //     e.preventDefault();
    //     var number = $(this).index();
    //     sync1.data('owl.carousel').to(number, 300, true);
    // });







    /**
     *  quantity 
     */


    var minus_B = document.querySelector("#quantity .btn-subtract")
    var add_B = document.querySelector("#quantity .btn-add");
    var quantity_B = document.querySelector("#quantity .item-quantity");

    // includes button minus disablement if at minimum or below
    const minimum = 0;

    minus_B.addEventListener("click", function () {
        if (quantity_B.value <= minimum) {
            minus_B.disabled = true;
            return; // return to avoid decrementing
        } else {
            minus_B.disabled = false;
        }
        quantity_B.value--;
    });

    add_B.addEventListener("click", function () {
        if (quantity_B.value > minimum) {
            minus_B.disabled = false;
        }
        quantity_B.value++;

    });


})(jQuery);