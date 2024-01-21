<nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-darker text-white">
    <div class="container-fluid">
        <div id="logoContainer" class="d-flex">
            <a href="#" class="d-flex justify-content-center align-items-center">
                <img src="assets/images/logo.svg" itemprop="logo" title="WallysHub" alt="Logo WallysHub" class="img-fluid ratio ratio-1x1">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <form id="navForm" class="d-flex">
                <div class="input-group rounded-pill bg-searchbarDark">
                    <div class="input-group-prepend align-self-center justify-content-center ps-3">
                        <button class="btn btn-outline-secondary bg-transparent border-0 bi bi-search text-white" type="submit bi bi-search"></button>
                    </div>
                    <input type="text" class="form-control form-control-lg bg-transparent border-0 text-white border-0" id="inlineFormInputGroupSearch" placeholder="Zoeken op wallysHub" style="width: 400px;">
                </div>
            </form>
        </div>
        <div class="d-flex">
            <a class="nav-link fs-1" href="#"><i class="bi bi-person-circle"></i></a>
        </div>
    </div>
</nav>
<script>
    // Get a reference to the input field and the form
    const inputField = document.getElementById('inlineFormInputGroupSearch');
    const navForm = document.getElementById('navForm');

    // Add a class to change the outline when the input field is focused
    inputField.addEventListener('focus', () => {
        navForm.classList.add('custom-outline');
    });

    // Remove the class when the input field loses focus
    inputField.addEventListener('blur', () => {
        navForm.classList.remove('custom-outline');
    });
</script>