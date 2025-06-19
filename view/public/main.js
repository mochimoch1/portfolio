// セクションのフェードインアニメ
document.addEventListener("DOMContentLoaded", () => {
  const fadeElements = document.querySelectorAll('.fade');
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('inview');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.13 });
  fadeElements.forEach(el => observer.observe(el));

  // カルーセル
  const carousel = document.querySelector('.carousel');
  const leftBtn = document.querySelector('.carousel-btn.left');
  const rightBtn = document.querySelector('.carousel-btn.right');
  let scrollAmount = 0;

  const scrollCard = (dir) => {
    const card = carousel.querySelector('.work-card');
    const scrollBy = card.offsetWidth + 24; // gap
    if (dir === 'left') {
      carousel.scrollBy({ left: -scrollBy, behavior: 'smooth' });
    } else {
      carousel.scrollBy({ left: scrollBy, behavior: 'smooth' });
    }
  };
  leftBtn.addEventListener('click', () => scrollCard('left'));
  rightBtn.addEventListener('click', () => scrollCard('right'));

  // お問い合わせフォームの疑似送信（本番はPOST等に書き換えて下さい）
  document.getElementById('contactForm').addEventListener('submit', function(e){
    e.preventDefault();
    const msg = this.querySelector('.form-message');
    msg.textContent = "メッセージを送信しました。ありがとうございます。";
    this.reset();
    setTimeout(()=>{ msg.textContent = ''; }, 4000);
  });
});