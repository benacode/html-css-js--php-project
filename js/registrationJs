let GlobalSlideNo;

function NextSlide(SlideNo) {
    GlobalSlideNo = SlideNo;
    event.preventDefault();

    if (SlideNo === 1) {
        const goBackButton = document.querySelector(".GoBack");
        goBackButton.style.animation = "GoBackBtnVisible 0.25s ease";
        goBackButton.onanimationend = function () {
            this.style.animation = "";
            this.style.left = "10px";
        };
    }

    const scroller = document.querySelector("scroller");
    const currentMargin = parseInt(window.getComputedStyle(scroller).getPropertyValue("margin-left"));
    scroller.style.marginLeft = `${currentMargin - 478}px`;
    
    MoveIndicationBar(SlideNo);
}

const IndicatorObj = {
    startVal: 0,
    EndVal: 25,
    currentWidth: 0,
    StepNo: 0
};

function MoveIndicationBar(i) {
    IndicatorObj.StepNo = i;
    IndicatorObj.EndVal = i * 25;
    ZerotoHeroWidth();
}

function ZerotoHeroWidth() {
    const bar = document.querySelector(".active");
    const step = document.querySelectorAll(".steps")[IndicatorObj.StepNo - 1];
    const barStyle = parseInt(window.getComputedStyle(bar).width);

    if (IndicatorObj.currentWidth > IndicatorObj.EndVal / 2) {
        step.classList.add("PassedStep");
    }
    if (IndicatorObj.currentWidth < IndicatorObj.EndVal) {
        IndicatorObj.currentWidth += 1;
        bar.style.width = `${IndicatorObj.currentWidth}%`;
        window.requestAnimationFrame(ZerotoHeroWidth);
    }
}

function GoBack() {
    event.preventDefault();

    if (GlobalSlideNo < 2) {
        const goBackButton = document.querySelector(".GoBack");
        goBackButton.style.animation = "GoBackBtnInvisible 0.25s ease";
        goBackButton.onanimationend = function () {
            this.style.animation = "";
            this.style.left = "-50px";
        };
    }

    GlobalSlideNo -= 1;

    const scroller = document.querySelector("scroller");
    const currentMargin = parseInt(window.getComputedStyle(scroller).getPropertyValue("margin-left"));
    scroller.style.marginLeft = `${currentMargin + 478}px`;

    document.querySelector(".GoBack").onclick = function (event) {
        event.preventDefault();
    };

    setTimeout(() => {
        document.querySelector(".GoBack").onclick = GoBack;
    }, 500);

    MoveIndicationBarMinus(GlobalSlideNo);
}

function MoveIndicationBarMinus(i) {
    IndicatorObj.StepNo = i;
    IndicatorObj.EndVal = i * 25;
    HerotoZeroWidth();
}

function HerotoZeroWidth() {
    const bar = document.querySelector(".active");
    const step = document.querySelectorAll(".steps")[IndicatorObj.StepNo - 1];
    const barStyle = parseInt(window.getComputedStyle(bar).width);

    if (IndicatorObj.currentWidth > IndicatorObj.EndVal) {
        IndicatorObj.currentWidth -= 1;
        bar.style.width = `${IndicatorObj.currentWidth}%`;
        window.requestAnimationFrame(HerotoZeroWidth);
    }
}
