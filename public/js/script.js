function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('rua').value = (conteudo.logradouro);
        document.getElementById('bairro').value = (conteudo.bairro);
        document.getElementById('cidade').value = (conteudo.localidade);
        document.getElementById('estado').value = (conteudo.uf);
    } //end if.
    else {
        //CEP não Encontrado.
        alert("CEP não encontrado.");
        this.limpa_formulário_cep();
    }
}

function soNumero(num) {
    //so aceita numero.
    let str = document.getElementById(num).value;
    let res = str.replace(/\D/g, "");
    document.getElementById(num).value = res;
    if (num == "cep") {

        let a = document.getElementById(num).value;
        let b = a.replace(/^(\d{5})(\d)/, "$1-$2");
        document.getElementById(num).value = b;
    }
    if (num == "telefone") {
        let a = document.getElementById(num).value;
        if (a.length >= 9) {
            let b = a.replace(/^(\d{2})(\d{4})(\d{3})/, "($1) $2-$3");
            document.getElementById(num).value = b;
        }
        if (a.length >= 10) {
            let b = a.replace(/^(\d{2})(\d{5})(\d{3})/, "($1) $2-$3");
            document.getElementById(num).value = b;
        }
       
    }
    if (num == "cc-date") {

        let a = document.getElementById(num).value;
        let b = a.replace(/^(\d{2})(\d)/, "$1/$2");
        document.getElementById(num).value = b;
    }
    if (num == "cc_card") {
        let a = document.getElementById(num).value;
        if (a.length >= 15) {
            let b = a.replace(/^(\d{4})(\d{4})(\d{4})(\d)/, "$1 $2 $3 $4");
            document.getElementById(num).value = b;
        }
       
    }
}


    let cadastro = {

        cep: {

            pesquisacep: function (valor) {
               
                //Nova variável "cep" somente com dígitos.
                let cep1 = valor.replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep1 != "") {

                    //Expressão regular para validar o CEP.
                    let validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if (validacep.test(cep1)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        document.getElementById('rua').value = "...";
                        document.getElementById('bairro').value = "...";
                        document.getElementById('cidade').value = "...";
                        document.getElementById('estado').value = "...";


                        //Cria um elemento javascript.
                        let script = document.createElement('script');

                        //Sincroniza com o callback.
                        script.src = 'https://viacep.com.br/ws/' + cep1 + '/json/?callback=meu_callback';

                        //Insere script no documento e carrega o conteúdo.
                        document.body.appendChild(script);

                    } //end if.
                    else {
                        //cep é inválido.

                        alert("Formato de CEP inválido.");
                        this.limpa_formulário_cep();
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    this.limpa_formulário_cep();

                }

            },
            limpa_formulário_cep: function () {
                //Limpa valores do formulário de cep.
                document.getElementById('cep').value = ("");
                document.getElementById('rua').value = ("");
                document.getElementById('bairro').value = ("");
                document.getElementById('cidade').value = ("");
                document.getElementById('uf').value = ("");

            }

        }

    }
