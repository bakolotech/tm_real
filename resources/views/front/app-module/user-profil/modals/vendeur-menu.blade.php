<div class="container" style="">
    <div class="rectangle-1">
        <a href="/" class="logo-copy" style="position: relative; left: -114px">
            <img src="assets/images2/Logo_t.png.svg" alt="logo" width="100%" height="100%">
        </a>
        <div class="parametrejj" style="position: relative; left: 117px;">
                <div class="drop-down" id="myDropDown" onclick="dropdownJs()">
                    Paramètre
                </div>
                <div class="dropdown-content" id="myDropdown">
                    <div class="d-none">
                        <form action="{{ url('/byebye') }}" method="post">
                            @csrf
                            <button class="btn btn-primary" type="submit" id="logout-btn" hidden>Déconnexion</button>
                        </form>
                    </div>
                    <a href="#" onclick="document.getElementById('logout-btn').click()" >Déconnexion</a>
                </div>
            <b></b>
        </div>
    </div>
</div>
