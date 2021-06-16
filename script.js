function onLoad() {
    
}

function setActive(elt) {
    let el = document.getElementById(elt);
    for (let item of document.getElementsByClassName('nav-link')) item.classList.remove('active');
    if (!el.classList.contains('disabled')) el.classList.add('active');
}