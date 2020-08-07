let form = {
    lieu: 0,
    types: 0,
    etablishment: "",
    accompaniment: 0,
    ceremony: 0,
}

let pages = ["lieu", "types", "devis", "more", "info"];

let request;
$(function () {


    $.getJSON("http://localhost/Essenciel/src/Pages/Quote/request.json", function (data) {
        request = data[0];
    });

    $("#ajax-test-0").click(function (e) {
        e.preventDefault();
        $.post('server.php', {form}, function (data) {
            // request = data;
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
        const service = request[name][id];
        if (!service.add) {
            service.add = 0;
        }
        let sessionPrice = parseInt($(".price-quote").text());
        const priceForName = $(`#info-price-hidden-${name}`);
        if (priceForName) {
            sessionPrice = sessionPrice - priceForName.text();
        }
        sessionPrice = sessionPrice + service.add;
        $.post('/Essenciel/quote/total', {"total": {[name]: service.add}}, function (data) {
            // $('.price-quote').html(sessionPrice + "<span class=\"euro\">€</span>")
        })

        $.post('/Essenciel/server.php', {"total": {[name]: service.add}}, function (data) {
            console.log(data)
            $('.price-quote').html(data + "<span class=\"euro\">€</span>")
        })

    }

    function addNextTypes(id) {
        const ctn = $("#ctn-types-next");
        ctn.empty();
        let c = request.ceremony[id];
        console.log(request.ceremony)
        let html = `<div id="ctn-quote-input" > 
 <label id="question-ceremony">${c.text}</label>
            <div id="ctn-checkbox-quote">
                <div>
                    <input name="ceremony" value="${c.answer[0].id}" class="quote-input ceremony-input" type="checkbox" id="ceremony-0">
                        <label for="ceremony-0">${c.answer[0].text}</label>
                        <div class='add-price-quote'>
                            <img src='http://192.168.1.18/Essenciel/assets/png-x2/euroinacircle.svg' alt=''/>
                            <span>+ 300</span>
                        </div>
                </div>
                <div>
                    <input name="ceremony" value="${c.answer[1].id}" class="quote-input ceremony-input" type="checkbox" id="ceremony-1">
                        <label for="ceremony-1">${c.answer[1].text}</label>
                </div>
            </div>
</div>`
        ctn.append(html)
    }

    $('#formQuote').on("click", '.quote-input', function () {
        changeColorBtnQuote(this)
        const name = $(this).attr("name");
        const id = $(this).attr("value");
        $.post('/Essenciel/quote/' + name, {[name]: id}, function (data) {
        })
        sendTotal(name, id);
        if (name === "ceremony") {
            $("#ceremony-1").prop('checked', false);
            $("#ceremony-0").prop('checked', false);
            $(`#ceremony-${id}`).prop('checked', true);
        }
        if (name === "types") {
            addNextTypes(id);
        }
    })


    $(".btn-nav-quote").click(function () {
        const indexLink = $(this).attr("value");
        const redirectLinkName = pages[indexLink];
        const nextValidation = [
            ['lieu'],
            ['types', 'ceremony'],
        ]
        let validNext = true;
        const keys = [];
        for (let i = 0; i < indexLink; i++) {
            nextValidation[i].forEach(key => {
                keys.push(key)
            })
        }
        $.post('/Essenciel/server.php', {"redirect": keys}, function (data) {
            validNext = data;
        })
        if (validNext) {
            window.location.href = `http://localhost/Essenciel/quote/${redirectLinkName}`;
        }
    })

    if ($("ctn-types-next")) {
        $.post('/Essenciel/server.php', {"types": ""}, function (data) {
            if (data) {
                addNextTypes(data);
                $.post('/Essenciel/server.php', {"ceremony": ""}, function (ceremonyId) {
                    if (ceremonyId) {
                        $(`#ceremony-${ceremonyId}`).prop('checked', true);
                    }
                })
            }
        })
    }

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