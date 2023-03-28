

/*sistema de pesquisa da pagina de vendas */

$(function(){

    var currentValue = 0;
    var isDrag = false;
    var preco_maximo = 90000;
    var preco_atual = 0;

    $('.pointer-barra').mousedown(function(){
        isDrag = true;
        console.log('pressionado');


    });
    $(document).mouseup(function(){
        isDrag = false;
    });
    $('.barra-preco').mousemove(function(e){
        if(isDrag == true){
            var elBase = $(this)
            var mouseX = e.pageX - elBase.offset().left;
            if(mouseX < 0){
                mouseX = 0;
            }
            if(mouseX > elBase.width()){
                mouseX = elBase.width();
            }

            $('.pointer-barra').css('left',mouseX-15+'px');//fazendo referencia ao elbase.off().left!!!

            currentValue = (mouseX / elBase.width()) * 100;
            $('.barra-preco-fill').css('width',currentValue+'%');


            preco_atual = (currentValue/100) * preco_maximo;
            preco_atual = formatarpreco(preco_atual);
            $('.preco_pesquisa').html('R$'+preco_atual);
            
            
        }
    });
    

    function formatarpreco(preco_atual){
        preco_atual = preco_atual.toFixed(2);
        preco_arr = preco_atual.split('.');
        
        
        var novo_preco = formatarTotal(preco_arr);

        return novo_preco;   
    }
    

    function formatarTotal(preco_arr){
        
        if(preco_arr[0] < 1000){
            return preco_arr[0]+','+preco_arr[1];
        }
        else if(preco_arr[0] < 10000){
            return preco_arr[0][0]+'.'+preco_arr[0].substr(1,preco_arr[0].length)+
            ','+preco_arr[1];
        }else{
            return preco_arr[0][0]+preco_arr[0][1]+'.'+preco_arr[0].substr(2,preco_arr[0].length)+
            ','+preco_arr[1];
        }
    }

    /*FIM DO SISTEMA DE PESQUISA DA PAGINA DE VENDAS*/



    /* SISTEMA DE NAVEGAÇAO DE SLIDER DA PAGINA SINGLE DE VENDAS*/

    var maxIndex = Math.ceil($('.mini-img-wraper').length/3) - 1;
    var curIndex = 0;

    initSlider();
    navegateSlider();
    clickSlider();
    function initSlider(){
        var amt = $('.mini-img-wraper').length * 33.3;
        var elScroll = $('.nav-galeria-wraper');
        var elSingle = $('.mini-img-wraper');
        elScroll.css('width',amt+'%');
        elSingle.css('width',33.3*(100/amt)+'%');
    }

    function navegateSlider(){
        $('.arrow-right-nav').click(function(){
            if(curIndex < maxIndex){
                curIndex++;
                var elOff = $('.mini-img-wraper').eq(curIndex*3).offset().left - $('.nav-galeria-wraper').offset().left;
                $('.nav-galeria').animate({'scrollLeft':elOff+'px'});
            }else{
                console.log('chegamos ate o final!!');
            }
        });


        $('.arrow-left-nav').click(function(){
            if(curIndex > 0){
                curIndex--;
                var elOff = $('.mini-img-wraper').eq(curIndex*3).offset().left - $('.nav-galeria-wraper').offset().left;
                $('.nav-galeria').animate({'scrollLeft':elOff+'px'});
            }else{
                console.log('chegamos ate o talo!!!')
            }
        })

    }
    
  
    function clickSlider(){
        $('.mini-img-wraper').click(function(){
            $('.mini-img-wraper').css('background-color','transparent');
            $(this).css('background-color','rgb(210,210,210)');
            var img = $(this).children().css('background-image');
            $('.foto-destaque').css('background-image',img);
        });

        $('.mini-img-wraper').eq(0).click();
    }

    /*FIM DO SISTEMA DE NAVEGAÇAOO DE SÇIDER DA PAGINA DE VENDAS */



    /*CLICAR E IR PARA A DIV DE CONTATO COM BASE NO ATRIBUTO GOTO */


    var directory = '/programação-2022/6-PROJETO;DANKI-CODE/'

    $('[goto=contato]').click(function(){
        location.href=directory+'index.html?contato';
        return false;
    })

    checkUrl();

    function checkUrl(){
        var url = location.href.split('/');
        var curPage = url[url.length-1].split('?');

        if(curPage[1] != undefined && curPage[1] == 'contato'){
            $('html,body').animate({'scrollTop':$('#contato').offset().top});
        }
    }



    $('[goto=contato]').click(function(){
        $('html,body').animate({'scrollTop':$('#contato').offset().top}); 
        return false;
    });

    /*FIM DAS FUNÇOES URL */

    /*INICIO DAS FUNCOES DO SLIDER DE DEPOIMENTOS */


    navegardepoimentos();
    navegarnomesdepoimento();
    iniciardepoimentos();
    iniciarnomedepoimentos();


    var amtDepoimento = $('.depoimento-single p').length;
    var amtnomedepoimento = $('.nome-depoimento h2').length
    var curIndex = 0;
    var curIndex2 = 0;


    function iniciardepoimentos(){
        $('.depoimento-single p').hide();
        $('.depoimento-single p').eq(0).show();
    }

    function iniciarnomedepoimentos(){
        $('.nome-depoimento h2').hide();
        $('.nome-depoimento h2').eq(0).show();
    }

    function navegarnomesdepoimento(){
        $('[next]').click(function(){
            curIndex2++;
            if(curIndex2 >= amtnomedepoimento){
                curIndex2 = 0;
            }
            $('.nome-depoimento h2').hide();
            $('.nome-depoimento h2').eq(curIndex2).show();

        });

        $('[prev]').click(function(){
            curIndex2--;
            if(curIndex2 < 0){
                curIndex2 = amtnomedepoimento-1;
            }
            $('.nome-depoimento h2').hide();
            $('.nome-depoimento h2').eq(curIndex2).show(); 
        });
    }



    function navegardepoimentos(){
        $('[next]').click(function(){
            curIndex++;
            if(curIndex >= amtDepoimento){
                curIndex = 0;
            }
            $('.depoimento-single p').hide();
            $('.depoimento-single p').eq(curIndex).show();

        });
        

        $('[prev]').click(function(){
            curIndex--;
            if(curIndex < 0){
                curIndex = amtDepoimento-1;
                
            }
            $('.depoimento-single p').hide();
            $('.depoimento-single p').eq(curIndex).show();
 
        });
    }
    /*FIM DOS SISTEMA DE SLIDER DA DIV DEPOIMENTOS NOMES.... DO INDEX.HTML */

    /*INICIO DO SISTEMA DE IMG DA GALERIA DE IMAGENS */


    cliqueimgGaleria();

    function cliqueimgGaleria(){
        $('.mini-img-galeria').click(function(){
            $('.mini-img-galeria').css('border','8px solid white');
            $(this).css('border','8px solid #ccc');
            var imggaleria = $(this).css('background-image')
            $('.img-destaque-galeria').css('background-image',imggaleria);
        });
    }

    

    
    




});