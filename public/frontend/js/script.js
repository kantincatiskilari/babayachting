$(document).ready(function () {
    $(".dropdown-menu")
        .find("input")
        .click(function () {
            var selectedType = $(this).val();
            var selectedName = $(this).attr("value");
            $("#search_concept").text(selectedName); // Seçilen değeri search_concept span'ine yansıt
        });
});

function selectType(typeName, id) {
    console.log(id);
    document.getElementById("selectedType").innerText = typeName;
    document.getElementById("yacht_type_id").value = id;
}

window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
    ) {
        document.getElementById("scrollToTopBtn").style.display = "block";
    } else {
        document.getElementById("scrollToTopBtn").style.display = "none";
    }
}

// Sayfanın en üstüne kaydırmak için bu işlevi çağırın
function scrollTopFunction() {
    document.body.scrollTop = 0; // Safari
    document.documentElement.scrollTop = 0; // Chrome, Firefox, IE, Opera
}
