let form = {
    lieu: 0,
    types: 0,
    etablishment: "",
    accompaniment: 0,
    ceremony: 0,
}

let totalQuote = {
    lieu: 0,
    types: 0,
    etablishment: 0,
    accompaniment: 0,
    ceremony: 0
}


let currrentPage = 0;

let pages = ["lieu", "types", "devis", "more", "info"];
let currNamePage = pages[currrentPage]
let request;
$(function () {

    function addActiveCssQuoteNav() {
        // $("#btn-nav-quote-" + currNamePage).classList.add('active-nav-quote');
        // console.log($("#btn-nav-quote-" + currNamePage))
    }

    $.getJSON("http://localhost/Essenciel/src/Pages/Quote/request.json", function (data){
        request = data[0];
    });

    $("#ajax-test-0").click(function (e) {
        e.preventDefault();
        $.post('server.php', {form}, function (data) {
            // request = data;
        })
    })

    $("#next-quote-form").click(function (e) {
        currrentPage++;
        $("#formQuote").empty();
        $.ajax({
            url: "Components/Quote/" + pages[currrentPage].charAt(0).toUpperCase() + pages[currrentPage].slice(1) + "/" + pages[currrentPage] + ".php",
            success: function (html) {
                $("#formQuote").append(html);
            }
        });
    })

    $("#navQuote button").click(function () {
        currrentPage = $(this).attr("value");
        $("#formQuote").empty();
        $.ajax({
            url: "Components/Quote/" + pages[currrentPage].charAt(0).toUpperCase() + pages[currrentPage].slice(1) + "/" + pages[currrentPage] + ".php",
            success: function (html) {
                $("#formQuote").append(html);
            }
        });
        // console.log($(`#btn-nav-quote-${currNamePage}`).classList.add(''))

    })

    $('#formQuote').on("click", '.quote-input', function () {
        const btns = $('.quote-input');
        for (let i = 0; i < btns.length; i++) {
            btns[i].classList.remove('select-choice');
        }
        $(this.classList.add('select-choice'));
        const name = $(this).attr("name");
        const id = $(this).attr("value");
        form[name] = id;
        $.post('server.php', {[name]: id}, function (data) {
            console.log(data)
        })
        const service = request[name][id];
        if(service.add) {
            let total = 0;
            totalQuote[name] = service.add;
            for(let value of Object.values(totalQuote)) {
                total = total + value;
            }
            console.log(total)
            $('.price-quote').html(total + "<span class=\"euro\">€</span>")
        }
    })


    window.addEventListener('load', () => {
        const elemsSlideHelp = $('.elem-slide-help');
        const hideSlideHelp = $('#hide-slider-help');
        for (let i = 0; i < elemsSlideHelp.length; i++) {
            elemsSlideHelp[i].style.width = `${hideSlideHelp.offsetWidth}px !important`;
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