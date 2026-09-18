//sign.php
document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault(); 
  
    basename = new FormData(this);

    fetch('../backend/actions/sign.php', {
        method: 'POST',
        body: basename
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = '../../index.php'; 
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error('Erreur :', error));
});
