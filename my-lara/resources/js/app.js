import * as bootstrap from "bootstrap";
import axios from "axios";
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

const cartDelete = () => {
    document.querySelectorAll(".delete--cert--item").forEach((b) => {
        b.addEventListener("click", () => {
            const id = b.dataset.itemId;
            axios.delete(mySmallCart + "?id=" + id).then((_) => {
                cartUpdate();
            });
        });
    });
};

const cartUpdate = () => {
    axios.get(mySmallCart).then((res) => {
        document.querySelector(".small--cart").innerHTML = res.data.html;
        cartDelete();
    });
};

window.addEventListener("load", () => {
    if (document.querySelector(".small--cart")) {
        cartUpdate();
    }
});

if (document.querySelector(".magic--link")) {
    // const showUrl = "{{route('colors-show-route')}}";
    const selector = document.querySelector("[name=color_id]");
    const magicLink = document.querySelector(".magic--link");
    const linkText = magicLink.querySelector("span");

    const doLink = () => {
        magicLink.setAttribute("href", showUrl + "/" + selector.value);
        linkText.innerText = selector.options[selector.selectedIndex].text;
    };

    selector.addEventListener("change", (e) => {
        doLink();
    });
    window.addEventListener("load", () => {
        doLink();
    });
}

if (document.querySelector(".add--cart")) {
    document.querySelectorAll(".add--cart").forEach((b) => {
        b.addEventListener("click", () => {
            const row = b.closest(".row");
            const animalId = row.querySelector("[name=animals_id]").value;
            const animalCount = row.querySelector("[name=animals_count]").value;
            axios.post(addToCartUrl, { animalCount, animalId }).then((res) => {
                // axios.get(mySmallCart).then((res) => {
                //     document.querySelector(".small--cart").innerHTML =
                //         res.data.html;
                //     cartDelete();
                // });
                cartUpdate();
            });
        });
    });
}
