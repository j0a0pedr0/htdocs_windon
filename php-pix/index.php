
<?php


    require __DIR__.'/vendor/autoload.php';

    

    use \App\Pix\Payload;
    use Mpdf\QrCode\QrCode;
    use Mpdf\QrCode\Output;
    
    use Mpdf\QrCode\QrCodeException;

    //INSTANCIA PRINCIPAL DO PAYLOAD PIX
    $obPayload = (new Payload)->setPixkey('48203928838')
                              ->setDescription('Pagamento do pedido 12234')
                              ->setMerchantName('Joao Pedro')
                              ->setMerchantCity('Sao Paulo')
                              ->setAmount(10.00)
                              ->setTxid('1223423ppp');

    //CÓDIGO DE PAGAMENTO PIX
    $payloadQrCode = $obPayload->getPayload();

    //QR CODE
    $obQrCode = new QrCode($payloadQrCode);

    //IMAGEM DO QRCODE
    (string)$imagem = (new Output\Html)->output($obQrCode);
   
    
?>
<style type="text/css">
    .classQrImg{
        width:100%;
        height:280px;
        display: flex;
        flex-wrap:wrap;
        justify-content:center;
        align-items:center;
    }
    .classQrInfo{
        width:100%;
        text-align:center;
    }
    h5{
        margin:0;
        display: inline-block;
        font-size:20px;
        height:30px !important;
    }
    .h2-qrcode{
        font-size:16px;
        max-width:100%;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    echo '<div class="classQrImg">'.$imagem.'</div>';
?>
<div class="classQrInfo">
    <h5>Qr CODE PIX</h5>
    <p class="h2-qrcode"><?=$payloadQrCode?></p>
</div>
</body>
</html>
