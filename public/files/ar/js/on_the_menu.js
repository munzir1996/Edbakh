$(window).scroll(function(){

    var week1 = document.getElementById('week1');

    var offset1 = document.getElementById('offset1');

    var offset1_value = offset1.offsetTop;

    var week1_placeholder = document.getElementById('week1_placeholder');

    if (window.pageYOffset > offset1_value) {

        week1.classList.add("fixedMealWrapper");

        week1_placeholder.classList.add('after_fixed');

    } else {

        week1.classList.remove("fixedMealWrapper");

        week1_placeholder.classList.remove('after_fixed');

    }

    /////////////////////////

    var week2 = document.getElementById('week2');

    var offset2 = document.getElementById('offset2');

    var offset2_value = offset2.offsetTop;

    var week2_placeholder = document.getElementById('week2_placeholder');

    if (window.pageYOffset > offset2_value) {

        week2.classList.add("fixedMealWrapper");

        week2_placeholder.classList.add('after_fixed');

    } else {

        week2.classList.remove("fixedMealWrapper");

        week2_placeholder.classList.remove('after_fixed');

    }


    /////////////////////////

    var week3 = document.getElementById('week3');

    var offset3 = document.getElementById('offset3');

    var offset3_value = offset3.offsetTop;

    var week3_placeholder = document.getElementById('week3_placeholder');

    if (window.pageYOffset > offset3_value) {

        week3.classList.add("fixedMealWrapper");

        week3_placeholder.classList.add('after_fixed');

    } else {

        week3.classList.remove("fixedMealWrapper");

        week3_placeholder.classList.remove('after_fixed');

    }


    /////////////////////////

    var week4 = document.getElementById('week4');

    var offset4 = document.getElementById('offset4');

    var offset4_value = offset4.offsetTop;

    var week4_placeholder = document.getElementById('week4_placeholder');

    if (window.pageYOffset > offset4_value) {

        week4.classList.add("fixedMealWrapper");

        week4_placeholder.classList.add('after_fixed');

    } else {

        week4.classList.remove("fixedMealWrapper");

        week4_placeholder.classList.remove('after_fixed');

    }


});