(function () {
    "use strict";

    // =================================================================
    // Utility
    // =================================================================
    const select = (el, all = false) => {
        el = el.trim();
        if (all) {
            return [...document.querySelectorAll(el)];
        } else {
            return document.querySelector(el);
        }
    };
    const on = (type, el, listener, all = false) => {
        let selectEl = select(el, all);
        if (selectEl) {
            if (all) {
                selectEl.forEach((e) => e.addEventListener(type, listener));
            } else {
                selectEl.addEventListener(type, listener);
            }
        }
    };

    // ================================================================
    // Initialize Bootstrap toast
    // ================================================================
    let liveToast = select("#liveToast");
    if (liveToast) {
        document.getElementById("hideToast").onclick = function () {
            const myAlert = document.getElementById('liveToast');
            const bsAlert = new bootstrap.Toast(myAlert);
            bsAlert.hide();
        };
    }

    // =================================================================
    // Preloader
    // =================================================================
    let preloader = select("#preloader");
    if (preloader) {
        window.addEventListener("load", () => {
            setTimeout(function () {
                preloader.remove()
            }, 100);
        });
    }


})();