// suppression avec confirmation
function confirmDelete(idAbsence) {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette absence ?')) {
        document.getElementById('deleteForm_' + idAbsence).submit();
    }
}

// bascule le statut entre ABI 0 et ABJ 1
function toggleStatus(idAbsence, currentStatus) {
    const form = document.getElementById('statusForm_' + idAbsence);
    const justifieeInput = form.querySelector('input[name="justifiee"]');
    justifieeInput.value = currentStatus ? 0 : 1;
    form.submit();
}

// suppression par double-clic sur une ligne
function setupDoubleClick(idAbsence) {
    const row = document.getElementById('absence-row-' + idAbsence);
    if (row) {
        row.addEventListener('dblclick', function() {
            confirmDelete(idAbsence);
        });
    }
}