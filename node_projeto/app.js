const express = require('express');
const app = express();

const bodyparser = require('body-parser');
const path = require('path');

app.listen('3000',()=>{
    console.log('servidor rodando altualizado23232!')
    console.log('online servidor onlisdsdsne')
});

//body parser
app.set('view engine','ejs');
app.set('views',path.join(__dirname,'views'));
app.use(bodyparser.json());
app.use(bodyparser.urlencoded({extended:false}));
app.use(express.static(path.join(__dirname,'public')));


//Rota
app.get('/',function(req,res){
    res.render('index',{'nome':'joao pedro','cargo':'programador'});
});
app.get('/sobre',function(req,res){
    res.render('sobre',{});
});