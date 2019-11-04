<html>
    <head>
        <style type="text/css">
            body, div, p {
                font-family:Arial;
                color:#333;
                font-size:18px;
                line-height:28px;
            }
            #top, #bot {
                padding:50px;
                font-size:20px;
                font-weight:bold;
                background-color:#f8fafc;
                color:#bbbfc3;
                text-align:center;
            }
            #top {
                border-bottom:1px solid #edeff2;
            }
            #bot {
                font-size:12px;
                border-top:1px solid #edeff2;
            }
            .div, #aut {
                margin:20px 0;
                padding:8px;
                border-radius: 5px;
                background-color:#e8e8fe;
            }
            #aut {
                background-color:#cc3333;
                color:#fff;
                text-align:center;
            }
</style>
    </head>
    <body>
        <div id="top">
            SinproSP
        </div>
        <div style="width:700px; margin:auto;">
            <p style="text-align:center"><strong>Nova sindicalização</strong></p>
            
            <div class="div">
                <strong>Ticket:</strong> {{ $ticket }}<br>
                <strong>Data:</strong> {{ date("d/m/Y H:i") }}
            </div>

            <div class="div">
                <strong>CPF:</strong> {{ $cpf }}<br>
                <strong>Nome:</strong> {{ $nome }}<br>
                <strong>Sexo:</strong>  @if($sexo==0) MASCULINO @else FEMININO @endif<br>
                <strong>Nascimento:</strong> {{ dataFormatted($nascimento) }}<br>
                <strong>RG:</strong> {{ $rg }}<br>
                <strong>Estado Civil:</strong> Casado(a)<br>
                <strong>Nacionalidade:</strong> {{ $nacionalidade }}
            </div>

            <div class="div">
                <strong>CEP:</strong> {{ $cep }}<br>
                <strong>Endereço:</strong> {{ $endereco }}<br>
                <strong>Nº:</strong> {{ $numero }}<br>
                @if($complemento != '') <strong>Complemento:</strong> {{ $complemento }}<br> @endif
                <strong>Bairro:</strong> {{ $bairro }}<br>
                <strong>Cidade:</strong> {{ $cidade }}<br>
                <strong>Estado:</strong> {{ $estado }}
            </div>

            <div class="div">
                <strong>E-mail:</strong> {{ $email }}<br>
                @if($telefoneresidencial != '') <strong>Telefone:</strong> {{ $telefoneresidencial }} <br> @endif
                <strong>Celular:</strong> {{ $celular }}
            </div>

            <div class="div">
                <strong>Disciplinas que Leciona:</strong> {{ $disciplina }}<br>
                <strong>Situação:</strong> {{ $situacao }}<br>
                <strong>Graus que leciona:</strong>
                @if($optInfantil != '') » Educação Infantil @endif
                @if($optFundI != '') » Ens. Fundamental (1ª a 5ª) @endif
                @if($optFundII != '') » Ens. Fundamental (6ª a 9ª) @endif
                @if($optMedio != '') » Ens. Médio @endif
                @if($optSuperior != '') » Ensino Superior @endif
                @if($optSupletivo != '') » Ensino Supletivo @endif
                @if($optCursosLivres != '') » Cursos Livres @endif
                @if($optTecnico != '') » Ensino Técnico @endif
            </div>

            <div class="div">
                <strong>Escolas ou Faculdades onde Leciona</strong><br><br>
                
                <strong>Escola:</strong> {{ $NomeInstI }}<br>
                <strong>Endereço:</strong> {{ $EndInstI }}<br>
                <strong>Fone:</strong> {{ $TelInstI }}<br>

                @if($NomeInstII != "")
                <br>
                <strong>Escola:</strong> {{ $NomeInstII }}<br>
                <strong>Endereço:</strong> {{ $EndInstII }}<br>
                <strong>Fone:</strong> {{ $TelInstII }}<br>
                @endif

                @if($NomeInstIII != "")
                <br>
                <strong>Escola:</strong> {{ $NomeInstIII }}<br>
                <strong>Endereço:</strong> {{ $EndInstIII }}<br>
                <strong>Fone:</strong> {{ $TelInstIII }}<br>
                @endif
            </div>

            <div id="aut">
                Autorizo o desconto em folha de pagamento da contribuição associativa, no valor e forma determinados pela Assembleia Geral dos Professores.
            </div>
        </div>
        <div id="bot">
            &copy; {{ date("Y") }} SinproSP. Todos os direitos reservados.
        </div>
    </body>
</html>