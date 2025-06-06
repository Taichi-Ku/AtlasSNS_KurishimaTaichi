function toggleAccordion(button) {
  const content = button.nextElementSibling;
  const arrow = button.querySelector('.accordion-arrow');

  // トグル表示
  const isOpen = content.style.display === "block";
  content.style.display = isOpen ? "none" : "block";

  // 矢印の回転
  if (isOpen) {
    arrow.classList.remove('open');
  } else {
    arrow.classList.add('open');
  }
}
