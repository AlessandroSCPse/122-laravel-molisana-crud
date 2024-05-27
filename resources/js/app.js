import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

// Modale conferma eliminazione pasta
// Dobbiamo togliere il comportamento di default del tasto elimina
// Quando l'utente clicca su Elimina
// Popolare il contenuto della modale
// Aprire la modale

// Quando l'utente clicca su conferma della modale
// Ci prendiamo il form che contiente il button elimina cliccato dall'utente
// Inviamo quel form
const allDeleteButtons = document.querySelectorAll('.js-delete-btn');
allDeleteButtons.forEach((deleteButton) => {
    deleteButton.addEventListener('click', function(event) {
        event.preventDefault();
        
        const deleteModal = document.getElementById('confirmDeleteModal');
        // Popolare il testo della modale con "Sei sicuro di voler eliminare permanentemente il prodotto [x]?"
        const pastaTitle = this.dataset.pastaTitle;
        deleteModal.querySelector('.modal-body').innerHTML = `Sei sicuro di voler eliminare permanentemente il prodotto ${pastaTitle}?`;

        const bsDeleteModal = new bootstrap.Modal(deleteModal);
        bsDeleteModal.show();

        const modalConfirmDeletionBtn = document.getElementById('modal-confirm-deletion');
        modalConfirmDeletionBtn.addEventListener('click', function() {
            // Prendo il padre del button (che è il form) e lo invio
            deleteButton.parentElement.submit();
        });
    });
});
