$(document).ready(function () {
    // DataTable başlatılmamışsa başlat
    if (!$.fn.DataTable.isDataTable("#dataTable")) {
        $("#dataTable").DataTable();
    }
});

//Store

$(document).ready(function () {
    $("#storeTypeButton").click(function (e) {
        var formData = {
            type_name: $('input[name="type_name"]').val(),
            status: $('select[name="status"]').val(),
        };

        // updateType fonksiyonunu çağır
        storeType(formData);
    });

    function storeType(formData) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
            url: "/admin/tip-olustur",
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            data: formData,
            success: function (response) {
                toastr.success(response.success);

                location.reload();
            },
            error: function () {},
        });
    }
});

$(document).ready(function () {
    $("#storeSpecificationButton").click(function (e) {
        var formData = {
            specification_name: $('input[name="specification_name"]').val(),
            status: $('select[name="status"]').val(),
        };

        // updateType fonksiyonunu çağır
        storeSpecification(formData);
    });

    function storeSpecification(formData) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
            url: "/admin/teknik-ozellik-olustur",
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            data: formData,
            success: function (response) {
                toastr.success(response.success);

                location.reload();
            },
            error: function () {},
        });
    }
});

$(document).ready(function () {
    $("#storeElectronicButton").click(function (e) {
        var formData = {
            electronic_name: $('input[name="electronic_name"]').val(),
            status: $('select[name="status"]').val(),
        };

        // updateType fonksiyonunu çağır
        storeElectronic(formData);
    });

    function storeElectronic(formData) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
            url: "/admin/elektronik-sistem-olustur",
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            data: formData,
            success: function (response) {
                toastr.success(response.success);

                location.reload();
            },
            error: function () {},
        });
    }
});

$(document).ready(function () {
    $("#storeFaqButton").click(function (e) {
        e.preventDefault();
        var formData = {
            question: $('input[name="question"]').val(),
            answer: $('textarea[name="answer"]').val(),
            status: $('select[name="status"]').val(),
        };

        // updateType fonksiyonunu çağır
        storeFaq(formData);
    });

    function storeFaq(formData) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
            url: "/admin/sikca-sorulan-sorular/ekle",
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            data: formData,
            success: function (response) {
                toastr.success(response.success);

                setTimeout(function () {
                    location.reload();
                }, 1000);
            },
            error: function () {},
        });
    }
});

$(document).ready(function () {
    $("#storeYachtButton").click(function (e) {
        e.preventDefault();

        // Form verilerini al
        var formData = new FormData($("#storeForm")[0]);

        // CKEditor'ın içeriğini al
        var descriptionContent = CKEDITOR.instances.description.getData();

        // CKEditor içeriğini form verilerine ekle
        formData.append("description", descriptionContent);

        // Formu AJAX ile gönder
        storeYacht(formData);
    });

    function storeYacht(formData) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
            url: "tekne-olustur/kaydet",
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            processData: false, // FormData nesnesini işleme tabi tutma
            contentType: false, // Content-Type başlığını elle belirtme
            data: formData,
            success: function (response) {
                toastr.success(response.success);

                // Sunucu tarafında yapılan yönlendirme işlemi
                if (response.redirect) {
                    window.location.href = response.redirect;
                }
            },
            error: function (response) {
                if (response.responseJSON && response.responseJSON.error) {
                    $.each(
                        response.responseJSON.error,
                        function (index, value) {
                            toastr.error(value);
                        }
                    );
                } else {
                    toastr.error("Bir hata oluştu. Lütfen tekrar deneyin.");
                }
            },
        });
    }
});

//Update Status
function updateTypeStatus(typeId, status) {
    var csrfToken = $('meta[name="csrf-token"]').attr("content"); // CSRF token'ını al

    $.ajax({
        url: "/admin/update-status",
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": csrfToken, // CSRF token'ını başlık olarak ekle
        },
        data: {
            type_id: typeId,
            status: status,
        },
        success: function (response) {
            toastr.success(response.success);
        },
        error: function (error) {
            toastr.error(error);
        },
    });
}

function updateSpecificationStatus(specificationId, status) {
    var csrfToken = $('meta[name="csrf-token"]').attr("content"); // CSRF token'ını al

    $.ajax({
        url: "/admin/update-specification-status",
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": csrfToken, // CSRF token'ını başlık olarak ekle
        },
        data: {
            specification_id: specificationId,
            status: status,
        },
        success: function (response) {
            toastr.success(response.success);
        },
        error: function (error) {
            toastr.error(error);
        },
    });
}

function updateElectronicStatus(electronicId, status) {
    var csrfToken = $('meta[name="csrf-token"]').attr("content"); // CSRF token'ını al

    $.ajax({
        url: "/admin/update-electronic-status",
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": csrfToken, // CSRF token'ını başlık olarak ekle
        },
        data: {
            electronic_id: electronicId,
            status: status,
        },
        success: function (response) {
            toastr.success(response.success);
        },
        error: function (error) {
            toastr.error(error);
        },
    });
}

function updateYachtStatus(yachtId, status) {
    var csrfToken = $('meta[name="csrf-token"]').attr("content"); // CSRF token'ını al

    $.ajax({
        url: "/admin/update-yacht-status",
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": csrfToken, // CSRF token'ını başlık olarak ekle
        },
        data: {
            id: yachtId,
            status: status,
        },
        success: function (response) {
            toastr.success(response.success);
        },
        error: function (error) {
            toastr.error(error);
        },
    });
}

function updateFaqStatus(faqId, status) {
    var csrfToken = $('meta[name="csrf-token"]').attr("content"); // CSRF token'ını al

    $.ajax({
        url: "/admin/update-faq-status",
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": csrfToken, // CSRF token'ını başlık olarak ekle
        },
        data: {
            id: faqId,
            status: status,
        },
        success: function (response) {
            toastr.success(response.success);
        },
        error: function (error) {
            toastr.error(error);
        },
    });
}

function updatePageStatus(pageId, status) {
    var csrfToken = $('meta[name="csrf-token"]').attr("content"); // CSRF token'ını al

    $.ajax({
        url: "/admin/update-page-status",
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": csrfToken, // CSRF token'ını başlık olarak ekle
        },
        data: {
            pageId: pageId,
            status: status,
        },
        success: function (response) {
            toastr.success(response.success);
        },
        error: function (error) {
            toastr.error(error);
        },
    });
}

//Update

//Tip
$(document).ready(function () {
    $("#updateTypeButton").click(function (e) {
        var typeId = $("#id").val();
        let typeName = $("#type_name").val();

        // updateType fonksiyonunu çağır
        updateType(typeId, typeName);
    });

    function updateType(typeId, typeName) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
            url: "/admin/tip-duzenle",
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            data: {
                id: typeId,
                type_name: typeName,
            },
            success: function (response) {
                toastr.success(response.success);

                setTimeout(function () {
                    location.reload();
                }, 1000);
            },
            error: function () {},
        });
    }
});

//Teknik Özellik
$(document).ready(function () {
    $("#updateSpecificationButton").click(function () {
        var specificationId = $("#id").val();
        let specificationName = $("#specification_name").val();

        // updateType fonksiyonunu çağır
        updateSpecification(specificationId, specificationName);
    });

    function updateSpecification(specificationId, specificationName) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
            url: "/admin/teknik-ozellik-duzenle",
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            data: {
                id: specificationId,
                specification_name: specificationName,
            },
            success: function (response) {
                toastr.success(response.success);

                setTimeout(function () {
                    location.reload();
                }, 1000);
            },
            error: function () {},
        });
    }
});

//Elektronik sistem

$(document).ready(function () {
    $("#updateElectronicButton").click(function () {
        var electronicId = $("#id").val();
        let electronicName = $("#electronic_name").val();

        // updateType fonksiyonunu çağır
        updateElectronic(electronicId, electronicName);
    });

    function updateElectronic(electronicId, electronicName) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
            url: "/admin/elektronik-duzenle",
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            data: {
                id: electronicId,
                electronic_name: electronicName,
            },
            success: function (response) {
                toastr.success(response.success);

                setTimeout(function () {
                    location.reload();
                }, 1000);
            },
            error: function (xhr, status, error) {
                if (xhr.status == 422) {
                    var errorMessage = xhr.responseJSON.error; // Hata mesajını al
                    toastr.error(errorMessage); // Hata mesajını kullanıcıya göster
                } else {
                    // Diğer durumlar için
                    toastr.error(
                        "Sunucudan bir hata oluştu: " + xhr.responseText
                    );
                }
            },
        });
    }
});

//Yacht

$(document).ready(function () {
    $("#updateYachtButton").click(function (e) {
        e.preventDefault();

        // Form içindeki #yachtId öğesinin değerini al
        var yachtId = $("#updateForm #yachtId").val();
        var formData = new FormData($("#updateForm")[0]);
        console.log(formData);

        // updateYacht fonksiyonunu çağır
        updateYacht(yachtId, formData);
    });

    function updateYacht(yachtId, formData) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
            url: "/admin/tekne-guncelle/kaydet/" + yachtId,
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            processData: false, // FormData nesnesini işleme tabi tutma
            contentType: false, // Content-Type başlığını elle belirtme
            data: formData,
            success: function (response) {
                toastr.success(response.success);

                // Sunucu tarafında yapılan yönlendirme işlemi
                if (response.redirect) {
                    window.location.href = response.redirect;
                }
            },
            error: function (response) {
                if (response.responseJSON && response.responseJSON.error) {
                    $.each(
                        response.responseJSON.error,
                        function (index, value) {
                            toastr.error(value);
                        }
                    );
                } else {
                    toastr.error("Bir hata oluştu. Lütfen tekrar deneyin.");
                }
            },
        });
    }
});

//Profil
$(document).ready(function () {
    $("#updateProfileButton").click(function (e) {
        e.preventDefault();

        // Form içindeki #profileForm öğesinin değerini al
        var formData = new FormData($("#profileForm")[0]);

        // updateProfile fonksiyonunu çağır
        updateProfile(formData);
    });

    function updateProfile(formData) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
            url: "/admin/profil-guncelle",
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            processData: false, // Veriyi işleme
            contentType: false, // İçerik tipini belirleme
            data: formData,
            success: function (response) {
                toastr.success(response.success);
                setTimeout(function () {
                    location.reload();
                }, 1000);

                // Sunucu tarafında yapılan yönlendirme işlemi
                if (response.redirect) {
                    window.location.href = response.redirect;
                }
            },
            error: function (error) {
                toastr.error("Bir hata oluştu.");
                console.error(error);
            },
        });
    }
});


$(document).ready(function () {
    // SEO butonlarına click event handler'ları ekleme
    $("#seoAboutButton, #seoHomepageButton, #seoYachtsButton, #seoFaqButton, #seoContactButton").click(function (e) {
        e.preventDefault();
        // meta_description alanının değerini al
        let meta_description = $("#meta_description").val();
        let page_title = $("#page_title").val();

        // Tıklanan butona göre ilgili AJAX işlemini yap
        if ($(this).attr('id') === 'seoAboutButton') {
            updateSeo('/admin/hakkimizda-seo/ekle', page_title, meta_description);
        } else if ($(this).attr('id') === 'seoHomepageButton') {
            updateSeo('/admin/anasayfa-seo/ekle', page_title, meta_description);
        } else if ($(this).attr('id') === 'seoYachtsButton') {
            updateSeo('/admin/tekneler-seo/ekle', page_title, meta_description);
        } else if ($(this).attr('id') === 'seoFaqButton') {
            updateSeo('/admin/sss-seo/ekle', page_title, meta_description);
        } else if ($(this).attr('id') === 'seoContactButton') {
            updateSeo('/admin/iletisim-seo/ekle', page_title, meta_description);
        }
    });

    // SEO bilgilerini güncellemek için genel bir fonksiyon
    function updateSeo(endpoint,page_title, meta_description) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
            url: endpoint,
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            data: {
                meta_description: meta_description,
                page_title: page_title
            },
            success: function (response) {
                toastr.success(response.success);
                setTimeout(function () {
                    location.reload();
                }, 1000);
            },
            error: function () {},
        });
    }
});


//Delete
$(document).ready(function () {
    var csrfToken = $('meta[name="csrf-token"]').attr("content");

    function bindDeleteEvent(selector, url) {
        $(selector)
            .unbind()
            .click(function () {
                var itemId = $(this).data("delete-id");
                Swal.fire({
                    title: "Silmek istediğinize emin misiniz?",
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: "Sil",
                    denyButtonText: `Vazgeç`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url + itemId,
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": csrfToken,
                            },
                            success: function (response) {
                                toastr.success(response.success);
                                setTimeout(function () {
                                    location.reload();
                                }, 1000);
                            },
                            error: function (response) {
                                toastr.error(response.responseJSON.error);
                            },
                        });
                    }
                });
            });
    }

    // DataTable'ın draw.dt olayını dinle
    $("#dataTable").on("draw.dt", function () {
        // Silme butonlarına olayı tanımla
        bindDeleteEvent(".deleteTypeBtn", "/admin/tip-sil/");
        bindDeleteEvent(
            ".deleteSpecificationBtn",
            "/admin/teknik-ozellik-sil/"
        );
        bindDeleteEvent(".deleteElectronicBtn", "/admin/elektronik-sil/");
        bindDeleteEvent(".deleteYachtBtn", "/admin/tekne-sil/");
        bindDeleteEvent(".deleteFaqBtn", "/admin/s.s.s-sil/");
        bindDeleteEvent(".deleteContactBtn", "/admin/iletisim-sil/");
    });

    // İlk yükleme için silme butonlarına olayı tanımla
    bindDeleteEvent(".deleteTypeBtn", "/admin/tip-sil/");
    bindDeleteEvent(".deleteSpecificationBtn", "/admin/teknik-ozellik-sil/");
    bindDeleteEvent(".deleteElectronicBtn", "/admin/elektronik-sil/");
    bindDeleteEvent(".deleteYachtBtn", "/admin/tekne-sil/");
    bindDeleteEvent(".deleteFaqBtn", "/admin/s.s.s-sil/");
    bindDeleteEvent(".deleteContactBtn", "/admin/iletisim-sil/");
});
