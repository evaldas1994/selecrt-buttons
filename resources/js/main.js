document.addEventListener("DOMContentLoaded", function() {

    Inputmask({
        mask: "V{20}",
        definitions: {
            "V": {
                validator: "[A-Za-z0-9_-]",
                casing: "upper"
            }
        },
        placeholder: '',
        showMaskOnHover: false
    }).mask(document.querySelectorAll('[id-pattern]'));

});
