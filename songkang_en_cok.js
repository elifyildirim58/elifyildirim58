function fetchDataAndProcess() {

    fetch('songkang_en_cok.php')
        .then(response => response.json()) 
        .then(data => {
            console.log(data); 
            processCategories(data);

        })
        .catch(error => {
            console.error('Hata:', error);
        });
}

fetchDataAndProcess();

function processCategories(categories) {
    var imgElements = document.querySelectorAll('img.trackable');
    imgElements.forEach(img => {
        var imgId = img.getAttribute('data-id');   
        if (categories.includes(imgId)) {
            img.style.display = 'block'; // veya istediğiniz başka bir görünüm ayarı
        } else {
            img.style.display = 'none'; // veya istediğiniz başka bir görünüm ayarı
        }
    });
}
