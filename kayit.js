document.getElementById('kayitFormu').addEventListener('submit', function(event) {
    event.preventDefault(); // Formun normal gönderimini engelle

    // Form verilerini topla
    var formData = new FormData(this);

    // AJAX isteği gönder
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'kayit.php', true);

    xhr.onload = function() {
        if (xhr.status === 200) {
            // Başarılı kayıt sonrası yönlendirme
            window.location.href = 'encoktiklananlar.html';
        } else {
            // Hata durumunda mesaj göster
            alert('Kayıt başarısız: ' + xhr.responseText);
        }
    };
    var ad = document.getElementById('ad').value;
    var soyad = document.getElementById('soyad').value;
    var mail = document.getElementById('mail').value;

    var adSoyadKontrol = /^[a-zA-ZğüşıöçĞÜŞİÖÇ ]+$/;
    var mailKontrol = /\S+@\S+\.\S+/;

    if (!adSoyadKontrol.test(ad)) {
        alert("Adınızda sadece harfler ve boşluklar kullanılabilir.");
        return false;
    }

    if (!adSoyadKontrol.test(soyad)) {
        alert("Soyadınızda sadece harfler ve boşluklar kullanılabilir.");
        return false;
    }

    if (!mailKontrol.test(mail)) {
        alert("Geçerli bir e-posta adresi girin.");
        return false;
    }

    window.location.href = 'encoktiklananlar.html';

    xhr.send(formData);
});
