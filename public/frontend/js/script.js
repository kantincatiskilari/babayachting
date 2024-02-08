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
    console.log(id)
    document.getElementById("selectedType").innerText = typeName;
    document.getElementById("yacht_type_id").value = id;
}
