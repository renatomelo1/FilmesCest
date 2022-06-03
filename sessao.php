<?php
if (!isset($_SESSION)) {
    session_start();
}

?>

<?php
include "index.html";
if (!isset($_SESSION['id'])) { ?>
    <!-- Button trigger modal -->
    <div class="text-center" style="margin-top: 200px;">
        <button type="button" class="btn col-md-3 item-center btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">
            continuar
        </button>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Caminho Incorreto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Você não está logado!
                </div>
                <div class="modal-footer">
                    <a href="cadastrousuario.php">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cadastrar-se</button>
                    </a>
                    <a href="login.php">
                        <button type="button" class="btn btn-primary">Login</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php
    die("");
}
?>