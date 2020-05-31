window.onload = function() {
    var formHandler = document.forms.feedback;
    formHandler.onsubmit = todo;

    function todo() {
        alert("Thank You for your time !!!");
    }
}