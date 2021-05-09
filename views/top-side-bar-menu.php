<header class="top-navbar">
    <div class="hamburguer">
        <div class="hamburguer-inner">
            <div class="one"></div>
            <div class="two"></div>
            <div class="three"></div>
        </div>
    </div>

    <div class="topbar-menu">
        <div class="inner-menu-left">
            <div class="imagem-logotipo"></div>
            <span>spefz - sigetes</span>
        </div>
        <div class="inner-menu-right">
            <ul>
                <li>
                    <span><i class="fas fa-cog"></i>Sistema</span>
                    <div class="submenu-inner-menu-right">
                        <div class="submenu-item"><a href="http://">Alterar senha</a></div>
                        <div class="submenu-item"><a href="">Meus dados</a></div>
                        <div class="submenu-item"><a href="./usuarios.php">Gestão usuários</a></div>
                        <div class="submenu-item"><a href="">Ajuda</a></div>
                        <div class="submenu-item"><a href="">Terminar sessão</a></div>

                    </div>
                </li>
            </ul>


        </div>
    </div>

</header>


<aside class="sidebar">
    <div class="sidebar-inner">
        <div class="user-data">
            <p>Bem-vindo,</p>
            <p class="username">[Nome do usuario]</p>

        </div>

        <div class="home-link">
            <span><a href="./home.php"> <i class="fas fa-home"></i>Página inicial</a></span>

        </div>
    </div>
    <ul class="sidebar-menu">

        <li class="sidebar-menu-item">
            <a href="./funcionarios.php">
                <span class="icon"><i class="fas fa-angle-right"></i></span>
                <span><span>Consultar/Registar</span> funcionários</span>
            </a>
        </li>

        <li class="sidebar-menu-item">
            <a href="">
                <span class="icon"><i class="fas fa-angle-right"></i></span>
                <span><span>Consultar</span> progressões</span>
            </a>
        </li>

        <li class="sidebar-menu-item">
            <a href="">
                <span class="icon"><i class="fas fa-angle-right"></i></span>
                <span><span>Consultar</span> promoções</span>
            </a>
        </li>

        <li class="sidebar-menu-item">
            <a href="">
                <span class="icon"><i class="fas fa-angle-right"></i></span>
                <span><span>Consultar</span> aposentados</span>
            </a>
        </li>

        <li class="sidebar-menu-item">
            <a href="./departamentos.php"/>
                <span class="icon"><i class="fas fa-angle-right"></i></span>
                <span><span>Consultar/Registar</span> departamentos</span>
            </a>
        </li>

    </ul>


</aside>

<script>
    $(document).ready(function() {
        $('.top-navbar .topbar-menu .inner-menu-right ul li span').on('click', function() {
            $('.topbar-menu .inner-menu-right ul li .submenu-inner-menu-right').toggleClass("active");
        });

        $('.hamburguer').on('click', function() {
            $('body').toggleClass("active");
        });

    });
</script>