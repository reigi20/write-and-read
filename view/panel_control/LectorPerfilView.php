<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<?php require_once 'view/layout/header.php';?>
<div class="row profile">

    <div class="col-md-3">
        <div class="perfil-sidebar text-center">
            <!-- SIDEBAR FOTO AVATAR -->
            <div class="perfil-userpic">
                <img src="<?= $_SESSION['usuari']->avatar_url_imagen ?>" alt="Imatge de <?= $_SESSION['usuari']->nom_i_cognoms ?>" />
            </div>
            <!-- FI FOTO AVATAR -->
            <!-- SIDEBAR USER TITOL -->
            <div class="perfil-usertitol">
                <div class="perfil-usertitol-nom">
                    <?= $_SESSION['usuari']->nom_i_cognoms ?>
                </div>
                <div class="perfil-usertitol-rol">
                    Lector
                </div>
            </div>
            <hr />
            <!-- FI SIDEBAR USER TITOL -->
            <!-- SIDEBAR MENU -->
            <div class="perfil-usermenu">

                <!-- Tab navs -->
                <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="perfil-tab" data-bs-toggle="tab" data-bs-target="#perfil" type="button" role="tab" aria-controls="perfil" aria-selected="true">
                            <i class="fas fa-user-circle"></i>
                            <p>Perfil</p>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="favorits-tab" data-bs-toggle="tab" data-bs-target="#favorits" type="button" role="tab" aria-controls="favorits" aria-selected="false">
                            <i class="fas fa-heart"></i>
                            <p>Favorits</p>
                        </button>
                    </li>
                    <!-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="ajuda-tab" data-bs-toggle="tab" data-bs-target="#ajuda" type="button" role="tab" aria-controls="ajuda" aria-selected="false">
                            <i class="fas fa-question-circle"></i>
                            <p>Ajuda</p>
                        </button>
                    </li> -->
                    <li>
                        <a href="<?= base_url ?>usuari/logoutUser">
                            <button class="nav-link">
                                <i class="fas fa-user-edit"></i>
                                <p>Logout</p>
                            </button>
                        </a>
                    </li>
                </ul>
                <!--boton logout-->

                <!--Fi boton logout-->
            </div>

            <!-- FI MENU -->
        </div>
    </div>

    <div class="col-md-9">

        <!-- Tab Dades de perfil -->
        <div class="tab-content">
            <div class="tab-pane active" id="perfil" role="tabpanel" aria-labelledby="perfil-tab">

                <div class="row">
                    <div class="col">
                        <h3 class="card-header">Edita aquí les teves dades personals</h3>
                    </div>
                </div>

                <form class="row g-3" action="<?= base_url ?>usuari/saveCanvis" method="POST">

                    <div class="col-md-6">
                        <label class="form-label" for="autoSizingInputGroup">Username</label>
                        <div class="input-group">
                            <div class="input-group-text">@</div>
                            <input type="text" name="nickname" class="form-control" id="autoSizingInputGroup" value="<?= $_SESSION['usuari']->nickname ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail4" value="<?= $_SESSION['usuari']->email ?> ">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="specificSizeInputName">Nom i cognoms</label>
                        <input type="text" name="nom_i_cognoms" class="form-control" id="specificSizeInputName" value="<?= $_SESSION['usuari']->nom_i_cognoms ?> ">
                    </div>
                    <!-- 
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Nova contrasenya">
                    </div>
                     -->

                    <div class="col-md-6">
                        <label class="form-label" for="specificSizeInputName">DNI</label>
                        <input type="text-area" name="dni" class="form-control" id="specificSizeInputName" value="<?= $_SESSION['usuari']->dni ?> ">
                    </div>

                    <!-- 
                    <div class="col-md-6">
                        <label class="form-label" for="specificSizeInputName">Data de Naixement</label>
                        <input type="date" class="form-control" id="specificSizeInputName" value="<?= $_SESSION['usuari']->data_naixement ?> ">
                    </div>
                     -->

                    <!-- Avatars imatges -->
                    <?php require_once 'view/elements/seleccionarAvatar.php'?>
                
                    <div class="col-12">
                        <button type="submit" class="btn boto_llegeix">Guardar Canvis</button>
                    </div>

                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck" checked>
                            <label class="form-check-label" for="gridCheck">
                                Subscriu-me
                            </label>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck" checked>
                            <label class="form-check-label" for="gridCheck">
                                Dono el meu consentiment perquè guardeu les meves dades
                            </label>
                        </div>
                    </div>


                </form>

            </div>

            <!-- Tab Favorits -->
            <div class="tab-pane" id="favorits" role="tabpanel" aria-labelledby="favorits-tab">
                <div class="row">
                    <div class="col">
                        <h3 class="card-header">Els teus preferits</h3>
                        <p class="text-center mt-5 font_subtitle">Aquests son els llibres que t'agraden</p>
                    </div>
                </div>

                <!-- Fitxes llibres -->
                <div class="container">
                    <section class="row">
                        <div class="col-10 mx-auto">
                            <!--card llibre-->
                            <?php require_once 'view/elements/FitxesLlibres.php' ; ?>
                            
                        </div>
                    </section>
                </div>
            </div>

            <!-- <div class="tab-pane" id="ajuda" role="tabpanel" aria-labelledby="ajuda-tab">
                3
            </div> -->

        </div>
    </div>
    <?php require_once 'view/layout/footer.php'; ?>