require('./bootstrap');
$(document).ready(function(){
    $('#header-button').click(function() {
        $('#icon').toggleClass('fa-times');
        $('#icon').toggleClass('fa-bars');
    });

    $('.feedback-detail').slick({
      infinite: true,
      slidesToShow: 2,
      slidesToScroll: 1,
      adaptiveHeight: false,
      autoplay: true,
      autoplaySpeed : 3000,
      pauseOnFocus: true,
      pauseOnHover: true,
      prevArrow: $('.next-left'),
      nextArrow: $('.next-right'),
    
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
    });
});



$(function () {
  $('[data-toggle="tooltip"]').tooltip();
})

$('#modalLogin').click(function() {
  $('#modalLogin').removeClass('modal-register').addClass('modal-login');
  $('#modalRegister').removeClass('modal-login').addClass('modal-register');
  $('#formLogin').removeClass('d-none').addClass('d-block');
  $('#formRegister').removeClass('d-block').addClass('d-none');
})

$('#modalRegister').click(function() {
  $('#modalRegister').removeClass('modal-register').addClass('modal-login');
  $('#modalLogin').removeClass('modal-login').addClass('modal-register');
  $('#formLogin').removeClass('d-block').addClass('d-none');
  $('#formRegister').removeClass('d-none').addClass('d-block');
})

$('.close-login').click(function() {
  $('.modal').modal('hide');
})

var fullRating = $('#fiveStarVal').val();
var fourStar = $('#fourStarVal').val();
var threeStar = $('#threeStarVal').val();
var twoStar = $('#twoStarVal').val();
var oneStar = $('#oneStarVal').val();
$('#fiveStar').width(fullRating);
$('#fourStar').width(fourStar);
$('#threeStar').width(threeStar);
$('#twoStar').width(twoStar);
$('#oneStar').width(oneStar);

function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
      $('#avatarUpload').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]); 
  }
}

$("#avatar").change(function() {
  readURL(this);
  $('#avatarUpload').removeClass('d-none').addClass('d-block');
});
