function updateNavBar() {
    document.getElementById("create_nav").classList.remove('active');
    document.getElementById("home_nav").classList.remove('active');
    document.getElementById("recipes_nav").classList.remove('active');

    var sPath = window.location.pathname;
    var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
    if (sPage == "index.html") {
        document.getElementById("home_nav").classList.add('active');
    }
    else if (sPage == "create_recipe.php") {
        document.getElementById("create_nav").classList.add('active');
    }
    else {
        document.getElementById("recipes_nav").classList.add('active');
    }
}