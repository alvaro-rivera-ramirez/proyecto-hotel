    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('js/jquery-3.6.0.min.js') ?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var menu_btn =document.querySelector("#menu-btn")
        var nav_lateral =document.querySelector("#sidebar-container")
        var contenido =document.querySelector("#contenido")
        var cerrar_btn =document.querySelector("#cerrar-navlateral")
        
        menu_btn.addEventListener("click", function(){
            nav_lateral.classList.toggle("nav-lateral-active")
        })
    </script>