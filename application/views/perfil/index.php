<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo; ?></title>

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/site.css'); ?>">
</head>
<body>
	<!--header-->
	<div class="header">
        <div class="container">
            <div class="logo">
                <a href="<?= base_url(''); ?>">
                    <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo Buscajobs" />
                </a>
            </div>

            <div class="menu">
                <div class="abrir-menu"><a href="#">MENU</a></div>
                <div class="menu-main disable">
                <ul class="menu-list">
                    <li class="menu-item"><a href="<?= base_url(''); ?>">Início</a></li>
                    <li class="menu-item"><a href="<?= base_url('sobre'); ?>">Sobre</a></li>
                    <li class="menu-item"><a href="<?= base_url('contato'); ?>">Contato</a></li>
                </ul>
                <div class="menu-line"></div>
                <?php if($lista === false): ?>
                <div class="menu-featured"><a href="<?= base_url('login'); ?>">Login</a></div>
                <div class="menu-featured"><a href="<?= base_url('cadastrar'); ?>">Cadastrar</a></div>

                <?php else: ?>
               

                <?php if($lista[0]['opcao'] == 'EMPRESA'): ?>
                <div class="menu-acesso-featured"><a href=""><?= $lista[0]['nm_empresa']; ?></a></div>
                <div class="menu-acesso-logoff-featured"><a href="<?= base_url('login/sair'); ?>">Sair</a></div>
                <?php elseif($lista[0]['opcao'] == 'USUARIO'): ?>
                <div class="menu-acesso-featured"><a href=""><?= $lista[0]['nm_usuario']; ?></a></div>
                <div class="menu-acesso-logoff-featured"><a href="<?= base_url('login/sair'); ?>">Sair</a></div>
                <?php endif; ?>

                <?php endif; ?>
                </div>

            </div>



	        <div class="header-group">
	        <h2 class="header-title">Os melhores profissionais, você encontra aqui!</h2>
	        </div>
        </div>
    </div>

    <!--page-->
    <div class="page">
        <div class="container">
            <div class="page-container">
                <span class="font-media-1"><?= $filter_vaga[0]['nm_usuario']; ?></span>
                <span class="font-small-1"><?= $filter_vaga[0]['nm_profissao']; ?> - <?= $filter_vaga[0]['nivel_experiencia']; ?> - <?= $filter_vaga[0]['nm_cidade']; ?></span>
        
                <?php if($lista !== false && $lista[0]['opcao'] == 'EMPRESA'): ?>
                <a href="javascript:void(0);" class="btn-subscriber" id="add-inscricao" data-usuario="<?= $filter_vaga[0]['id_usuario'] ?>" data-empresa="<?= $lista[0]['id_empresa']; ?>">Tem Interesse?</a>
                <?php endif; ?>
            </div>
            <div class="page-description">
                <p>
                    <?= $filter_vaga[0]['desc_usuario']?>
                </p>
            </div>

        </div>
    </div>


    <script src="<?= base_url('assets/js/jquery-3.6.0.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/script.js'); ?>"></script>
    <script>
            $("#add-inscricao").click(function(e){
                let usuario = $(this).data('usuario');
                let empresa = $(this).data('empresa');
                
                $.ajax({
                    url: "<?= base_url('inscricao/add'); ?>",
                    type: "POST",
                    data: {
                        empresa: empresa,
                        usuario: usuario
                    },
                    beforeSend: function(){
                        $("#add-inscricao").html('Solicitado Enviada!');
                    },
                    success: function(data){
                        if(data == "existe"){
                            alert("Você já enviou uma notificação para o candidato!");
                        }else if(data == "insert"){
                            alert("Notificação de interesse enviada!");
                        }
                    }
                })

                e.preventDefault();
            });
    </script>
</body>
</html>