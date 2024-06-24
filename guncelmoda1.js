document.addEventListener("DOMContentLoaded", () => {
    const checkboxes = document.querySelectorAll('input[type=checkbox]');

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            document.querySelectorAll('.galeri').forEach(galeri => {
                galeri.style.display = 'none';
            });

            const checkedCheckboxes = document.querySelectorAll('input[type=checkbox]:checked');

            if (checkedCheckboxes.length === 0) {
                document.querySelectorAll('.galeri').forEach(galeri => {
                    galeri.style.display = 'flex';
                });
            } else {
                checkedCheckboxes.forEach(checkedCheckbox => {
                    document.getElementById(checkedCheckbox.id + 'Galeri').style.display = 'flex';
                });
            }
        });
    });

    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightboxImg');
    const close = document.querySelector('.close');

    document.querySelectorAll('.trackable').forEach(img => {
        img.addEventListener('click', event => {
            const src = event.target.src;
            const dataId = event.target.getAttribute('data-id');
            lightbox.style.display = 'block';
            lightboxImg.src = src;

            // AJAX isteği gönderme
            fetch('M_guncelmodaTikla.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'data-id=' + dataId
            });
        });
    });

    close.addEventListener('click', () => {
        lightbox.style.display = 'none';
    });

    lightbox.addEventListener('click', event => {
        if (event.target === lightbox) {
            lightbox.style.display = 'none';
        }
    });
});
