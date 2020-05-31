window.onload = function() {
    var formHandle = document.forms.form_ship;
    formHandle.onsubmit = processForm;

    function processForm() {
        alert("Thanks, room is booked for you!!!!");
    }
}