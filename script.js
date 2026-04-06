function showform(formId) {
    document.querySelectorAll(".form_box_active, .form_box_none")
    //Remove both forms first
        .forEach(form => {
            form.classList.remove("form_box_active");
            form.classList.add("form_box_none");
        });
    //Display one form at a time that is clicked
    document.getElementById(formId)
        .classList.remove("form_box_none");
    document.getElementById(formId)
        .classList.add("form_box_active");
}