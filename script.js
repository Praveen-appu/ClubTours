/* =========================================================
   CLUB TOURS JAVASCRIPT
========================================================= */


/* =========================================================
   PRELOADER
========================================================= */

window.addEventListener("load", () => {

    const preloader = document.getElementById("preloader");

    setTimeout(() => {

        preloader.classList.add("hide");

    }, 700);

});


/* =========================================================
   NAVBAR
========================================================= */

// const navbar = document.querySelector(".navbar");

// window.addEventListener("scroll", () => {

//     if (window.scrollY > 50) {

//         navbar.classList.add("scrolled");

//     } else {

//         navbar.classList.remove("scrolled");

//     }

// });

window.addEventListener("scroll", function () {
    const navbar = document.querySelector(".navbar");

    if (window.scrollY > 50) {
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }
});

/* =========================================================
   MOBILE MENU
========================================================= */

const menuBtn = document.getElementById("menuBtn");

const navMenu = document.getElementById("navMenu");

menuBtn.addEventListener("click", () => {

    navMenu.classList.toggle("open");

    const icon = menuBtn.querySelector("i");

    if (navMenu.classList.contains("open")) {

        icon.classList.remove("fa-bars");

        icon.classList.add("fa-xmark");

    } else {

        icon.classList.remove("fa-xmark");

        icon.classList.add("fa-bars");

    }

});


document.querySelectorAll("#navMenu a").forEach(link => {

    link.addEventListener("click", () => {

        navMenu.classList.remove("open");

        const icon = menuBtn.querySelector("i");

        icon.classList.remove("fa-xmark");

        icon.classList.add("fa-bars");

    });

});


/* =========================================================
   SCROLL REVEAL
========================================================= */

const revealElements =
    document.querySelectorAll(".reveal");


const revealObserver =
    new IntersectionObserver(
        entries => {

            entries.forEach(entry => {

                if (entry.isIntersecting) {

                    entry.target.classList.add("visible");

                    revealObserver.unobserve(entry.target);

                }

            });

        },
        {
            threshold: .12
        }
    );


revealElements.forEach(element => {

    revealObserver.observe(element);

});


/* =========================================================
   COUNTER ANIMATION
========================================================= */

const counters =
    document.querySelectorAll(".counter");

let countersStarted = false;


function animateCounters() {

    if (countersStarted) return;

    countersStarted = true;

    counters.forEach(counter => {

        const target =
            parseInt(counter.dataset.target);

        let current = 0;

        const increment =
            target / 80;

        const update = () => {

            current += increment;

            if (current < target) {

                counter.textContent =
                    Math.floor(current);

                requestAnimationFrame(update);

            } else {

                counter.textContent =
                    target.toLocaleString() + "+";

            }

        };

        update();

    });

}


const statsSection =
    document.querySelector(".stats");


const statsObserver =
    new IntersectionObserver(
        entries => {

            if (entries[0].isIntersecting) {

                animateCounters();

                statsObserver.disconnect();

            }

        },
        {
            threshold: .3
        }
    );


statsObserver.observe(statsSection);


/* =========================================================
   TESTIMONIAL SLIDER
========================================================= */

const testimonials =
    document.querySelectorAll(".testimonial");

let testimonialIndex = 0;


function showTestimonial(index) {

    testimonials.forEach(item => {

        item.classList.remove("active");

    });

    testimonials[index].classList.add("active");

}


showTestimonial(0);


document
    .getElementById("nextBtn")
    .addEventListener("click", () => {

        testimonialIndex++;

        if (testimonialIndex >= testimonials.length) {

            testimonialIndex = 0;

        }

        showTestimonial(testimonialIndex);

    });


document
    .getElementById("prevBtn")
    .addEventListener("click", () => {

        testimonialIndex--;

        if (testimonialIndex < 0) {

            testimonialIndex =
                testimonials.length - 1;

        }

        showTestimonial(testimonialIndex);

    });


/* Auto slider */

setInterval(() => {

    testimonialIndex++;

    if (testimonialIndex >= testimonials.length) {

        testimonialIndex = 0;

    }

    showTestimonial(testimonialIndex);

}, 5000);


/* =========================================================
   PACKAGE SELECT
========================================================= */

function selectPackage(packageName) {

    const select =
        document.getElementById("packageSelect");

    select.value = packageName;

}


/* =========================================================
   ENQUIRY FORM
========================================================= */

const enquiryForm =
    document.getElementById("enquiryForm");


enquiryForm.addEventListener("submit", function(event) {

    event.preventDefault();

    const formData =
        new FormData(enquiryForm);

    const name =
        formData.get("name");

    const phone =
        formData.get("phone");

    const place =
        formData.get("place");

    const email =
        formData.get("email");

    const packageName =
        formData.get("package");

    const message =
        formData.get("message");


    const whatsappMessage =

        `Hello Club Tours!%0A%0A` +

        `Name: ${name}%0A` +

        `Phone: ${phone}%0A` +

        `Place: ${place}%0A` +

        `Email: ${email}%0A` +

        `Package: ${packageName}%0A` +

        `Message: ${message}`;


    const whatsappURL =
        `https://wa.me/919061580007?text=${whatsappMessage}`;


    window.open(
        whatsappURL,
        "_blank"
    );

});


/* =========================================================
   BACK TO TOP
========================================================= */

const backTop =
    document.getElementById("backTop");


window.addEventListener("scroll", () => {

    if (window.scrollY > 600) {

        backTop.classList.add("show");

    } else {

        backTop.classList.remove("show");

    }

});


backTop.addEventListener("click", () => {

    window.scrollTo({

        top: 0,

        behavior: "smooth"

    });

});


/* =========================================================
   ACTIVE NAV LINK
========================================================= */

const sections =
    document.querySelectorAll("section[id]");

const navLinks =
    document.querySelectorAll(
        "#navMenu a:not(.nav-btn)"
    );


window.addEventListener("scroll", () => {

    let current = "";

    sections.forEach(section => {

        const sectionTop =
            section.offsetTop - 180;

        if (
            window.scrollY >= sectionTop
        ) {

            current =
                section.getAttribute("id");

        }

    });


    navLinks.forEach(link => {

        link.classList.remove("active");

        if (
            link.getAttribute("href") ===
            `#${current}`
        ) {

            link.classList.add("active");

        }

    });

});


/* =========================================================
   IMAGE LIGHTBOX
========================================================= */

const galleryItems =
    document.querySelectorAll(".gallery-item");


galleryItems.forEach(item => {

    item.addEventListener("click", () => {

        const image =
            item.querySelector("img");

        const lightbox =
            document.createElement("div");

        lightbox.className =
            "lightbox";

        lightbox.innerHTML = `

            <div class="lightbox-close">
                <i class="fa-solid fa-xmark"></i>
            </div>

            <img src="${image.src}" alt="Gallery image">

        `;


        document.body.appendChild(lightbox);


        setTimeout(() => {

            lightbox.classList.add("active");

        }, 10);


        lightbox.addEventListener("click", () => {

            lightbox.classList.remove("active");

            setTimeout(() => {

                lightbox.remove();

            }, 300);

        });

    });

});


/* =========================================================
   LIGHTBOX STYLE
========================================================= */

const lightboxStyle =
document.createElement("style");


lightboxStyle.innerHTML = `

.lightbox {

    position: fixed;

    inset: 0;

    z-index: 99999;

    background: rgba(0,0,0,.9);

    display: grid;

    place-items: center;

    padding: 30px;

    opacity: 0;

    visibility: hidden;

    transition: .3s;

}

.lightbox.active {

    opacity: 1;

    visibility: visible;

}

.lightbox img {

    max-width: 90%;

    max-height: 85vh;

    width: auto;

    border-radius: 15px;

    transform: scale(.9);

    transition: .3s;

}

.lightbox.active img {

    transform: scale(1);

}

.lightbox-close {

    position: absolute;

    right: 30px;

    top: 25px;

    width: 45px;

    height: 45px;

    display: grid;

    place-items: center;

    border-radius: 50%;

    background: white;

    color: #092f2f;

    cursor: pointer;

    font-size: 20px;

}

`;


document.head.appendChild(lightboxStyle);


/* =========================================================
   CURSOR PARALLAX HERO
========================================================= */

const hero =
document.querySelector(".hero");


hero.addEventListener("mousemove", event => {

    const x =
        (event.clientX / window.innerWidth - .5);

    const y =
        (event.clientY / window.innerHeight - .5);


    const bg =
        document.querySelector(".hero-bg");


    bg.style.transform =
        `scale(1.05) translate(${x * -12}px, ${y * -12}px)`;

});


hero.addEventListener("mouseleave", () => {

    document.querySelector(".hero-bg")
        .style.transform = "scale(1)";

});