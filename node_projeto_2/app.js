const express = require('express');
const app = express();
const mysql = require('mysql');

const bodyparser = require('body-parser');
const path = require('path');

app.listen('3000',()=>{
    console.log('servidor rodando altualizado23232!')
    console.log('online servidor onlisdsdsne')
    console.log('esta funcionando?')
});

//body parser
app.set('view engine','ejs');
app.set('views',path.join(__dirname,'views'));
app.use(bodyparser.json());
app.use(bodyparser.urlencoded({extended:false}));
app.use(express.static(path.join(__dirname,'public')));

//conexão com o banco
const db = mysql.createConnection({
    host:'localhost',
    user:'root',
    password:'',
    database:'node'
});

db.connect(function(err){
    if(err)
    {
        console.log("Não foi possivel conectar ao banco!")
    }
    var sql = "SELECT * FROM clientes"
    db.query(sql,function(err,results){
        console.log(results);
    });
});

//Rota
app.get('/',function(req,res){
    let query = db.query("SELECT * FROM clientes",(err,results)=>{
        res.render('index',{lista:results});
    })
})    

app.get('/sobre',function(req,res){
    res.render('sobre',{});
});

app.get('/registrar',function(req,res){
    res.render('cadastro',{});
});

app.post('/registrar',function(req,res){
    console.log('cadastro realizado com sucesso!');
    let nome = req.body.nome;
    let sobrenome = req.body.sobrenome;
    let empresas = req.body.empresas;

    db.query("INSERT INTO clientes (nome,sobrenome,empresas) VALUES (?,?,?)",(nome,sobrenome,empresas),function(err,results){});
        res.render('cadastro',{});
});