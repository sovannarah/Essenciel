
const ip = "http://localhost/Essenciel/";

let pages = ["lieu", "types", "devis", "plus", "info"];



$(function () {

    const paramUrl = window.location.pathname.split("/");
    const lastParamUrl = paramUrl[paramUrl.length - 1];
    const pageParamUrl = paramUrl[paramUrl.length - 2];

    $("#submit-form").click(function (e) {
        e.preventDefault();
        const submitValid = ["civi", "last_name", "first_name", "phone_number", "email"];
        $.post(ip + 'server.php', {"redirect": submitValid}, function (data) {
            const errors = JSON.parse(data);
            if (errors.length === 0) {
                $.post(ip + 'server.php', {form: ""}, function (data) {
                    if(data === "success") {
                        window.location.href = `${ip}quote/valide`;
                    }
                })
            } else {
                errors.forEach(field => {
                    $(`#error-` + field).removeClass('d-none');
                })
            }
        })

    })

    $("#submit-form-contact").click(function (e) {
        e.preventDefault();
        const submitValid = ["civi", "last_name", "first_name", "phone_number", "email"];
        $.post(ip + 'server.php', {"redirect": submitValid}, function (data) {
            const errors = JSON.parse(data);
            if (errors.length === 0) {
                $.post(ip + 'server.php', {formContact: ""}, function (data) {
                    if(data === "success") {
                        window.location.href = `${ip}contact/valide`;
                    }
                })
            } else {
                errors.forEach(field => {
                    $(`#error-` + field).removeClass('d-none');
                })
            }
        })

    })

    function redirectLinkQuote(redirectLinkName, indexLink) {
        const nextValidation = [
            ['location', 'etablishment_address'],
            ['type', 'type_option_answer'],
            [''],
            ['accompaniment', 'civi_def', 'last_name_def', 'first_name_def', 'def_link']
        ]
        let validNext = true;
        const keys = [];
        for (let i = 0; i < indexLink; i++) {
            nextValidation[i].forEach(key => {
                keys.push(key)
            })
        }
        if (redirectLinkName === "lieu") {
            window.location.href = `${ip}quote/${redirectLinkName}`;
        } else {
            $.post(ip + 'server.php', {"redirect": keys}, function (data) {
                validNext = JSON.parse(data);
                if (validNext.length == 0) {
                    window.location.href = `${ip}quote/${redirectLinkName}`;
                } else {
                    validNext.forEach(field => {
                        $(`#error-` + field).removeClass('d-none');
                    })
                }
            })
        }
    }

    function changeColorBtnQuote(btn) {
        const btns = $('.quote-input');
        for (let i = 0; i < btns.length; i++) {
            btns[i].classList.remove('select-choice');
        }
        btn.classList.add('select-choice');
    }

    function sendTotal(name, id) {
        $.post(ip + 'server.php', {"amount": ''}, function (data) {
            $('.price-quote').html(JSON.parse(data)["total"] + "<span class=\"euro\">€</span>")
        })
    }

    function addNextTypes(id) {
        const ctn = $("#ctn-types-next");
        ctn.empty();
        $.post(ip + 'server.php', {"type_options": id}, function (data) {
            const c = JSON.parse(data);
            let html = `<div id="ctn-quote-input" >
 <label id="question-ceremony">${c.type_option}</label>
            <div id="ctn-checkbox-quote">
                <div>
                    <input name="type_option_answer" value="${c.answers[0].id_type_option_answer}" class="quote-input ceremony-input" type="checkbox" id="ceremony-1">
                        <label for="ceremony-1">${c.answers[0].type_option_answer}</label>
                        <div class='add-price-quote'>
                            <img src='http://localhost/Essenciel/assets/png-x2/euroinacircle.svg' alt=''/>
                            <span>+ 300</span>
                        </div>
                </div>
                <div>
                    <input name="type_option_answer" value="${c.answers[1].id_type_option_answer}" class="quote-input ceremony-input" type="checkbox" id="ceremony-2">
                        <label for="ceremony-2">${c.answers[1].type_option_answer}</label>
                </div>
            </div>
            
</div><span id="error-type_option_answer" class="error-choice error-checkbox d-none">*Choix requis</span>`
            ctn.append(html)
        })
    }


    $("#ctn-quote-input").on('change', '.text-field', function (e) {
        const {name, value} = e.target;
        $.post(ip + 'quote/' + name, {[name]: value}, function (data) {
        })
    })


    $("#ctn-quote-input").on('change', '.select', function (e) {
        const {name, value} = e.target;
        $.post(ip + 'quote/' + name, {[name]: value}, function (data) {
        })
    })


    $('#formQuote').on("click", '.quote-input', function () {

        const name = $(this).attr("name");
        let id = $(this).attr("value");
        if (name !== "type_option_answer") {
            changeColorBtnQuote(this)
        }
        $.post(ip + 'quote/' + name, {[name]: id}, function (data) {
        })
        sendTotal(name, id);
        if (name == "type_option_answer") {
            if (id > 2) {
                id = id - 2;
            }
            $("#ceremony-2").prop('checked', false);
            $("#ceremony-1").prop('checked', false);
            $(`#ceremony-${id}`).prop('checked', true);
        }
        if (name === "type") {
            addNextTypes(id);
        }
    })


    $(".btn-nav-quote").click(function () {
        const indexLink = $(this).attr("value");
        const redirectLinkName = pages[indexLink];
        redirectLinkQuote(redirectLinkName, indexLink);

    })

    if (lastParamUrl === "type" && $("ctn-types-next")) {
        $.post(ip + 'server.php', {"type": ""}, function (data) {
            if (data) {
                addNextTypes(data);
                $.post(ip + 'server.php', {"type_option_answer": ""}, function (ceremonyId) {
                    if (ceremonyId) {

                        $(`#ceremony-${ceremonyId}`).prop('checked', true);
                    }
                })
            }
        })
    }

    let posSlider = 0;
    let offsetElem = 1
    $("#btn-slider-help-prev").click(function () {
        if (Math.round(document.getElementById("hide-slider-help").getBoundingClientRect().left) !== Math.round(document.getElementById("slider-help").getBoundingClientRect().left)) {
            const slider = $("#slider-help");
            slider.css("left", `${document.getElementById("hide-slider-help").getBoundingClientRect().left - document.getElementsByClassName("elem-slide-help")[posSlider].getBoundingClientRect().left}px`);
            posSlider = posSlider - offsetElem;
        }
    })

    $("#btn-slider-help-next").click(function () {
        if (Math.round(document.getElementById("hide-slider-help").getBoundingClientRect().right) !== Math.round(document.getElementById("slider-help").getBoundingClientRect().right)) {
            posSlider = posSlider + offsetElem;
            const slider = $("#slider-help");
            slider.css("left", `${document.getElementById("hide-slider-help").getBoundingClientRect().left - document.getElementsByClassName("elem-slide-help")[posSlider].getBoundingClientRect().left}px`);
        }
    })


    let posSlider2 = 0;
    let offsetElem2 = 1
    $("#btn-slider-concept-prev").click(function () {
        if (Math.round(document.getElementById("hide-slider-concept-4").getBoundingClientRect().left) !== Math.round(document.getElementById("slider-concept-4").getBoundingClientRect().left)) {
            const slider = $("#slider-concept-4");
            slider.css("left", `${document.getElementById("hide-slider-concept-4").getBoundingClientRect().left - document.getElementsByClassName("elem-slide-concept-4")[posSlider2].getBoundingClientRect().left}px`);
            posSlider2 = posSlider2 - offsetElem2;
        }
    })

    $("#btn-slider-concept-next").click(function () {
        if (Math.round(document.getElementById("hide-slider-concept-4").getBoundingClientRect().right) !== Math.round(document.getElementById("slider-concept-4").getBoundingClientRect().right)) {
            posSlider2 = posSlider2 + offsetElem2;
            const slider = $("#slider-concept-4");
            console.log(document.getElementsByClassName("elem-slide-concept-4"))
            slider.css("left", `${document.getElementById("hide-slider-concept-4").getBoundingClientRect().left - document.getElementsByClassName("elem-slide-concept-4")[posSlider2].getBoundingClientRect().left}px`);
        }
    })

    function renderRowQuote(data) {
        $("#admin-rows").empty();
        data.forEach(row => {
            let type;
            switch (row.id_type_option_answer) {
                case "1":
                    type = "Crémation avec cérémonie";
                    break;
                case "2":
                    type = "Crémation sans cérémonie";
                    break;
                case "3":
                    type = "Inhumation caveau existant";
                    break;
                case "4":
                    type = "Inhumation dans une sepulture pleine terre";
                    break;
                default:
                    break;
            }
            const arrDate = row.createdAt.split(' ')[0].split('-')
            const refactorDate = `${arrDate[2]}/${arrDate[1]}/${arrDate[0]}`;
            let html = `<div class="tr admin-row-quote txt-info">
                        <div class="main-tr">
                            <div class="col-admin col-date"><span>${refactorDate}</span></div>
                            <div class="col-admin col-name"><span>${row.last_name}</span></div>
                            <div class="col-admin col-firstname"><span>${row.first_name}</span></div>
                            <div class="col-admin col-number">
<img src="${ip}/assets/png-x2/phone.svg" alt="" />
<span>${row.phone_number}</span>
</div>
                            <div class="col-admin col-mail">
<img src="${ip}/assets/png-x2/mail.svg" alt="" />
<span>${row.email}</span>
</div>
                            <div class="col-admin col-total"><span>${row.total}€</span></div>
                            <div class="col-admin col-status"><span>En attente</span></div>
                            <div class="col-admin col-action">
                            <button class="btn-view-quote" value="${row.id_formule}">
                            <img class="img-btn-view-quote" src="${ip}/assets/png-x2/eye.svg" alt="" />
                            </button>
                            <button class="btn-archive-quote" value="${row.id}">
                            <img class="img-btn-archive-quote" src="${ip}/assets/png-x2/archive.svg" alt="" />
                            </button>
</div>
                        </div>
                        <div class="hide-clp hide-details">
                            <div class="clp">
                                <div class="admin-row-1">
                                    <div>
                                        <label>Lieu où se situe le défunt</label>
                                        <span>${row.location}</span>
                                        <span>${row.etablishment_address}</span>
                                    </div>
                                    <div>
                                        <label>Type d'obsèque</label>
                                        <span>${type}
                                    </span>
                                    </div>
                                    <div>
                                        <label>Accompagnement</label>
                                        <span>${row.accompaniment}</span>
                                    </div>
                                    <div>
                                        <label>Information sur le défunt</label>
                                        <span>
                                        ${row.civility_def} ${row.last_name} ${row.first_name}. Lien avec le client:${row.link}
                                    </span>
                                    </div>
                                </div>
                                <div class="admin-row-2">
                                    <label>Message du client</label>
                                    <p>${row.message ? row.message : "Le client n'a pas laissé de messsage."}</p>
                               </div>
                            </div>
                        </div>
                    </div>`
            $("#admin-rows").append(html)
        })
    }

    $("#admin-rows").on("click", ".admin-row-quote", function (e) {
        console.log(e.target.className)
        if(e.target.className !== "btn-view-quote" && e.target.className !== "img-btn-view-quote" &&
            e.target.className !== "btn-archive-quote" && e.target.className !== "img-btn-archive-quote") {
            console.log('troko')
        $hideCtn = $(".hide-clp");
        $rows = $(".admin-row-quote");
        $rows.removeClass("txt-black");
        $rows.addClass("txt-info");
        $hideCtn.removeClass("show-details");
        $hideCtn.addClass("hide-details");
        $(this).removeClass("txt-info");
        $(this).addClass("txt-black");
        console.log($(this).hasClass('hide-details'))
        $(this).find('.hide-clp').removeClass("hide-details");
        $(this).find('.hide-clp').addClass("show-details");
        }
    })


    let objSearch = {
        table: lastParamUrl,
        search: "",
        id_type: "",
        id_accompaniment: "",
        id_status: ""
    }
    if (pageParamUrl === "admin" && $("#admin-rows")) {
        $.post(ip + 'server.php', {"search_quote": objSearch}, function (data) {
            console.log(data)
            renderRowQuote(JSON.parse(data))
        })
    }

    $("#text-field-search").change(function (e) {
        const {name, value} = e.target;
        objSearch.search = value;
        $.post(ip + "server.php", {"search_quote": objSearch}, function (data) {
            renderRowQuote((JSON.parse(data)))
        })
    })

    $('#popover-filter').on("click", ".checkbox-filter", function (e) {
        const {name, value} = e.target;
        if (!$(this).prop("checked")) {
            $(this).prop('checked', false);
            objSearch[name] = "";
        } else {
            const checkboxes = $(`#ctn-checkbox-${name.split('_')[1]}`).find(".checkbox-filter");
            for (let i = 0; i < checkboxes.length; i++) {
                checkboxes.prop('checked', false)
            }
            $(this).prop("checked", true);
            objSearch[name] = value;
        }
        $.post(ip + "server.php", {"search_quote": objSearch}, function (data) {
            renderRowQuote((JSON.parse(data)))
        })
    })

    $("#filter-admin").click(function () {
        $("#popover-filter").toggleClass("d-none");
    })

    $("#next-quote-form").click(function (e) {
        e.preventDefault()
        const nextStepIndex = pages.indexOf(e.target.value);
        const nextStepName = pages[nextStepIndex + 1];
        redirectLinkQuote(nextStepName, nextStepIndex + 1)
    })

    $("#admin-rows").on("click", ".btn-archive-quote", function (e) {
        console.log("rerere")
        $value = $(this).attr("value");
        $.post(ip + "server.php" , {"getQuote": $value}, function(data) {
            console.log(data)
        })
        $.post(ip + 'server.php', {"search_quote": objSearch}, function (data) {
            renderRowQuote(JSON.parse(data))
        })
    })

    $("#admin-rows").on("click", ".btn-view-quote", function (e) {
        $value = $(this).attr("value");
        $.post(ip + "server.php", {"getFormule": $value}, function (data) {
            let rowPerCat = "";
            for (let [key, value] of Object.entries(JSON.parse(data))) {
                rowPerCat += '<div>'
                rowPerCat += `<h5>${key}</h5>`
                rowPerCat += "<ul>";
                for (let [row, text] of Object.entries(value)) {
                    rowPerCat += `<li>${text.prestation}</li>`
                }
                rowPerCat += "</ul>";
                rowPerCat += '</div>';
            }
            let html = `
<div id="main-ctn-quote">
<h2>Devis</h2>
                <div id="ctn-devis">
                    <h4>Prestations</h4><div>${rowPerCat}</div></div>
</div>`;

            $("#view-quote").removeClass("d-none");
            $("#view-quote").append(html)
        })
    })

    $("#close-view-quote").click(function(e) {
        $("#view-quote").addClass("d-none");
    })
})
function disabledButtonsConceptSlide(bool) {
    const buttons = document.getElementsByClassName('dot-slide-concept');
    for (let i = 0; i < buttons.length; i++) {
        if (bool === 'true') {
            buttons[i].setAttribute('disabled', bool);
        } else {
            buttons[i].removeAttribute('disabled');
        }
    }
}

function sliderConceptAnim() {
    disabledButtonsConceptSlide('true');
    const hideDiv = document.getElementById('hide-concept-slider')
    const hideSliderRight = hideDiv.getBoundingClientRect().right;
    const lastElemSlider = document.getElementsByClassName('elem-slide-concept');
    const offSetSlider = hideSliderRight - lastElemSlider[lastElemSlider.length - 1].getBoundingClientRect().right;
    const slider = document.getElementById('concept-slider');
    slider.style.left = `${offSetSlider}px`;
    slider.style.transition = `left 800ms`;
    setTimeout(() => {
        disabledButtonsConceptSlide('false');
    }, 800)
    const dots = document.getElementsByClassName('dot-slide-concept');
    if (offSetSlider === 0) {
        dots[0].classList.add('active-concept-slider');
        dots[1].classList.remove('active-concept-slider');
    } else {
        dots[1].classList.add('active-concept-slider');
        dots[0].classList.remove('active-concept-slider');
    }
}