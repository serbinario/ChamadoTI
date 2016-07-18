$(document).ready(function(){
    
    //######## Mascaras para formulário candidato ##########
    
    //Cpf
    $('.cpf').mask('000.000.000-00', {reverse: true});
    //RG
    $('.rg').mask('0.000.000', {reverse: true});
    //CEP
    $('.cep').mask('00000-000');
    //money
     $('.money').mask('000.000.000,00', {reverse: true});
    //CNPJ
    $('.cnpj').mask('00.000.000.0000-00');

    $('.date').mask('00/00/0000');

    //Telefone
    $('.phone').mask('(00) 00000.000');

    //##### Submeter formulário
    $('#formAluno').submit(function() {
        $('.cpf').unmask();
    });
     
    //######## Mascaras para formulário empreendedor ##########

     
     //Vaga disponível
     $('#serbinario_sad_bundle_sadbundle_vagasdisponiveis_qtdVagas').mask('0000000000000000000', {reverse: true});

    $(document).on('focus', ".telefone", function () {
        var maskBehavior = function (val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            options = {onKeyPress: function (val, e, field, options) {
                field.mask(maskBehavior.apply({}, arguments), options);
            }
            };
        $('.telefone').mask(maskBehavior, options);
    });
});