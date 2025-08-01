
function toggleAccordion(button) {
  const content = button.parentElement.nextElementSibling;
  const arrow = button.querySelector('.accordion-arrow');

  const isOpen = content.style.display === "block";
  content.style.display = isOpen ? "none" : "block";

  if (isOpen) {
    arrow.classList.remove('open');
  } else {
    arrow.classList.add('open');
  }
}

// モーダルウィンドー
$(function () {
  $('.js-modal-open').on('click', function () {
    $('.js-modal').fadeIn();

    var post = $(this).attr('post');
    var post_id = $(this).attr('post_id');

    $('.modal_post').text(post);
    $('.modal_id').val(post_id);
    return false;
  });

  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});
