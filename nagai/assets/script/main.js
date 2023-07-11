// ハンバーガー
// active付与
// inview
$(function () {
  $('.title').on('inview', function (event, isInView, visiblePartX, visiblePartY) {
    if (isInView) {
      //表示領域に入った時
      $(this).addClass('fadeInDown');
      $(this).css('opacity', 1);
    } else {
      //表示領域から出た時
      $(this).removeClass('fadeInDown');
      $(this).css('opacity', 0); //非表示にしておく
    }
  })
  $('.menu__toggle').on('click', function () {
    $('.menu__toggle, .nav, .header, .header').toggleClass('show');
    $('body').toggleClass('fixed');
  });
});

//英語⇔日本語
$(function() {
  $(".stmt:not(:first-child)").hide();
  setInterval(function() {
    $(".stmt:first-child").fadeOut(1500).next(".stmt").fadeIn(2000).end().appendTo(".hero__text");
  }, 6000);
});



// headerスクロール透過
$(function () {
  var breakPoint = 1100;
  if ($(window).innerWidth() <= breakPoint) {
    var mainVisualHeight = 700;
    var header = $('header');
    $(window).scroll(function () {
      $(this).scrollTop() > mainVisualHeight ? header.css('opacity', '0') : header.css('opacity', '1');
    });
  }
});

window.onload = function () {
  fade_effect();

  $(window).scroll(function () {
    fade_effect();
  });

  function fade_effect() {
    $('.slider__box').each(function () {
      const targetElement = $(this).offset().top;
      const scroll = $(window).scrollTop();
      const windowHeight = $(window).height();
      if (scroll > targetElement - windowHeight) {
        $(this).addClass('view');
      }
    });
  }
};
//nav
function underlineCurrentCategory() {
  var currentCategory = window.location.pathname.split('/')[2];
  var lis = document.querySelectorAll('.pc_nav_ul li');
  for (var i = 0; i < lis.length; i++) {

    // Get the href attribute of the current li element.
    var href = lis[i].querySelector('a').getAttribute('href');

    // If the href attribute matches the current category, add the 'current' class to the li element.
    if (href === currentCategory && is_category(currentCategory)) {
      lis[i].classList.add('current');
    } else {
      lis[i].classList.remove('current');
    }
  }
}

$(document).ready(function() {
  $('.slider__image, .company__img, .profile__img,.img-wrap').bind('inview', function(event, isInView) {
    if (isInView) {
      var $element = $(this);
      setTimeout(function() {
        $element.addClass('in-view');
      }, 300); // 0.5秒後にクラスを追加
    } else {
      $(this).removeClass('in-view');
    }
  });
});
