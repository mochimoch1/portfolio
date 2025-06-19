document.getElementById('contactForm').addEventListener('submit', async function(e){
  e.preventDefault();
  const msgEl = this.querySelector('.form-message');
  const data = {
    name: this.name.value,
    email: this.email.value,
    message: this.message.value
  };
  msgEl.textContent = "送信中…";
  try {
    const res = await fetch('/api/index.php', {
      method: "POST",
      headers: {"Content-Type": "application/x-www-form-urlencoded"},
      body: new URLSearchParams(data)
    });
    const json = await res.json();
    msgEl.textContent = json.message;
    if(json.success) this.reset();
  } catch (e) {
    msgEl.textContent = "送信に失敗しました。しばらくしてお試しください。";
  }
  setTimeout(()=>{ msgEl.textContent = ''; }, 4200);
});