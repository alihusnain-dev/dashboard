let input = document.querySelector("#search-input");
let searchIcon = document.querySelector("#search-icon");
let crossIcon = document.querySelector("#cross-icon")


searchIcon.addEventListener('click', function(){
    input.classList.add("input-show");
    crossIcon.classList.add("show-cross");
}
);
crossIcon.addEventListener('click', function(){
    input.classList.remove("input-show");
    crossIcon.classList.remove("show-cross");

}
);