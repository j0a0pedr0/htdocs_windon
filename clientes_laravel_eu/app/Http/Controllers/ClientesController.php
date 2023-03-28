<?php

	namespace App\Http\Controllers;
    
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Models\Clientes;
	
	class ClientesController extends Controller
	{
		
		public static function index(){
            //Clientes::find(5)->delete();
            $obg = Clientes::find(17);
            $obg->nome = "João Atualizado";
            $obg->save();
            $data['clientes'] = Clientes::all();

            return view('clientes',$data);
		}

        public function getCliente($id){
            $info = Clientes::find($id);
            $data['nome'] = $info['nome'];
            $data['email'] = $info['email'];
            return view('clientes_single',$data);
        }
        public function inserir(Request $req){
            if($req->has('inserir_cliente')){
                $nome = $req->input('nome');
                $email = $req->input('email');
                
                $clientes = new Clientes();
                $clientes->nome = $nome;
                $clientes->email = $email;
                $clientes->save();
                echo '<script>alert("Cliente Cadastrado Com Sucesso!!!")</script>';
                echo '<script>location.href="http://localhost/clientes_laravel_eu/public/"</script>';
            }
        }
	}
?>