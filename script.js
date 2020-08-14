let form = {
    lieu: 0,
    types: 0,
    etablishment: "",
    accompaniment: 0,
    ceremony: 0,
}

const ip = "http://192.168.1.18/Essenciel/";

let pages = ["lieu", "types", "devis", "more", "info"];

$(function () {


    $("#submit-form").click(function (e) {
        // e.preventDefault();
        console.log("submit");
        $.post('/Essenciel/server.php', {form: ""}, function (data) {
            console.log(data)
        })
    })


    function changeColorBtnQuote(btn) {
        const btns = $('.quote-input');
        for (let i = 0; i < btns.length; i++) {
            btns[i].classList.remove('select-choice');
        }
        btn.classList.add('select-choice');
    }

    function sendTotal(name, id) {
        $.post('/Essenciel/server.php', {"amount": ''}, function (data) {
            console.log(data)
            $('.price-quote').html(JSON.parse(data)["total"] + "<span class=\"euro\">€</span>")
            $.post('/Essenciel/quote/total', {"total": {[name]:JSON.parse(data)["total"]}}, function (data) {
                // console.log(data)
            })
        })
        // $.post('/Essenciel/quote/total', {"total": {[name]: service.add}}, function (data) {
        //     // $('.price-quote').html(sessionPrice + "<span class=\"euro\">€</span>")
        // })
        //


    }

    function addNextTypes(id) {
        const ctn = $("#ctn-types-next");
        ctn.empty();
        $.post('/Essenciel/server.php', {"type_options": id}, function (data) {
            // console.log(data);
            const c = JSON.parse(data);
        let html = `<div id="ctn-quote-input" >
 <label id="question-ceremony">${c.type_option}</label>
            <div id="ctn-checkbox-quote">
                <div>
                    <input name="type_option_answer" value="${c.answers[0].id_type_option_answer}" class="quote-input ceremony-input" type="checkbox" id="ceremony-1">
                        <label for="ceremony-1">${c.answers[0].type_option_answer}</label>
                        <div class='add-price-quote'>
                            <img src='http://192.168.1.18/Essenciel/assets/png-x2/euroinacircle.svg' alt=''/>
                            <span>+ 300</span>
                        </div>
                </div>
                <div>
                    <input name="type_option_answer" value="${c.answers[1].id_type_option_answer}" class="quote-input ceremony-input" type="checkbox" id="ceremony-2">
                        <label for="ceremony-2">${c.answers[1].type_option_answer}</label>
                </div>
            </div>
</div>`
        ctn.append(html)
        })
    }





    $("#ctn-quote-input").on('change', '.text-field', function(e) {
        const {name,value} = e.target;
        $.post('/Essenciel/quote/' + name, {[name]: value}, function (data) {
        })
    })


    $("#ctn-quote-input").on('change', '.select', function(e) {
        const {name,value} = e.target;
        console.log(value)
        $.post('/Essenciel/quote/' + name, {[name]: value}, function (data) {
        })
    })




    $('#formQuote').on("click", '.quote-input', function () {

        const name = $(this).attr("name");
        const id = $(this).attr("value");
        console.log(name)
        if(name !== "type_option_answer") {
            changeColorBtnQuote(this)
        }
        $.post('/Essenciel/quote/' + name, {[name]: id}, function (data) {
        })
        console.log(name, id)
        sendTotal(name, id);
        if (name == "type_option_answer") {
            $("#ceremony-2").prop('checked', false);
            $("#ceremony-1").prop('checked', false);
            $(`#ceremony-${id}`).prop('checked', true);
        }
        if (name === "type") {
            addNextTypes(id);
        }
    })

    // $('#formQuote').on("click", ".type-checkbox", function() {
    //
    // })


    $(".btn-nav-quote").click(function () {
        console.log("TROLOLOL")
        const indexLink = $(this).attr("value");
        const redirectLinkName = pages[indexLink];
        const nextValidation = [
            ['location', 'etablishment_address'],
            ['type', 'type_option_answer'],
            [''],
            ['accompaniment', 'civi_def', 'last_name-def', 'first_name_def', 'def_link']
        ]
        let validNext = true;
        const keys = [];
        for (let i = 0; i < indexLink; i++) {
            nextValidation[i].forEach(key => {
                keys.push(key)
            })
        }
        console.log(keys)
        if (redirectLinkName === "lieu") {
            window.location.href = `${ip}quote/${redirectLinkName}`;
        } else {
            $.post('/Essenciel/server.php', {"redirect": keys}, function (data) {
                console.log(data)
                console.log(redirectLinkName)
                validNext = data;
                if (validNext) {
                    window.location.href = `${ip}quote/${redirectLinkName}`;
                }
            })
        }

    })

    if ($("ctn-types-next")) {
        $.post('/Essenciel/server.php', {"type": ""}, function (data) {
            if (data) {
                addNextTypes(data);
                $.post('/Essenciel/server.php', {"type_option_answer": ""}, function (ceremonyId) {
                    if (ceremonyId) {

                        $(`#ceremony-${ceremonyId}`).prop('checked', true);
                    }
                })
            }
        })
    }

    $("#btn-slider-help-prev").click(function () {

        if(Math.round(document.getElementById("hide-slider-help").getBoundingClientRect().left) !== Math.round(document.getElementById("slider-help").getBoundingClientRect().left)) {
            const hideSlider = $("#hide-slider-help");
            const sliderWidth = hideSlider.width();
            const elemPerSlide = 4;
            const elemWidth = $(".elem-slide-help").width();
            const dec = elemWidth * elemPerSlide;
            console.log(dec)
            const slider = $("#slider-help");
            slider.css("left", `${document.getElementById("slider-help").getBoundingClientRect().right - dec}px`);
        }
    })

    $("#btn-slider-help-next").click(function () {
        if(Math.round(document.getElementById("hide-slider-help").getBoundingClientRect().right) !== Math.round(document.getElementById("slider-help").getBoundingClientRect().right)) {
            const hideSlider = $("#hide-slider-help");
            const sliderWidth = hideSlider.width();
            const elemPerSlide = 4;
            const elemWidth = $(".elem-slide-help").width();
            const dec = elemWidth * elemPerSlide;
            console.log(dec)
            const slider = $("#slider-help");
            slider.css("left", `-${document.getElementById("slider-help").getBoundingClientRect().left + dec}px`);
        }
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