document.addEventListener("DOMContentLoaded", () => {

    const checkboxes = document.querySelectorAll('input[type=checkbox]');


    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
           
            document.querySelectorAll('.galeri').forEach(function(galeri) {
                galeri.style.display = 'none';
            });


            const checkedCheckboxes = document.querySelectorAll('input[type=checkbox]:checked');


            if (checkedCheckboxes.length === 0) {
                document.querySelectorAll('.galeri').forEach(function(galeri) {
                    galeri.style.display = 'block';
                });
            } else {
             
                checkedCheckboxes.forEach(function(checkedCheckbox) {
                    document.getElementById(checkedCheckbox.id + 'Galeri').style.display = 'block';
                });
            }
        });
    });


   
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightboxImg');
    const close = document.getElementsByClassName('close')[0];


   
    document.querySelectorAll('.trackable').forEach(img => {
        img.addEventListener('click', (event) => {
            const src = event.target.src;
            const imageId = event.target.dataset.id;
            const category = event.target.dataset.category;


        
            fetch('zendaya_baglanti.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ imageId: imageId, category: category })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data.message);
            })
            .catch(error => {
                console.error('Error:', error);
            });


            lightbox.style.display = 'block';
            lightboxImg.src = src;
        });
    });


 
    close.addEventListener('click', () => {
        lightbox.style.display = 'none';
    });


   
    lightbox.addEventListener('click', (event) => {
        if (event.target === lightbox) {
            lightbox.style.display = 'none';
        }
    });
});



