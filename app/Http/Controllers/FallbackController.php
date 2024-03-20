<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class FallbackController extends Controller
{
    public function __invoke() // Redireciona para a página de Fallback
    {
        //$data = Carbon::now()->format('d/m/Y H:i:s A');
        //$ip_user = request()->ip();
        //$mensagem = "Houve um redirecionamento de rota para a Fallback utilizando o IP {$ip_user} em {$data}.";
        //Log::channel('daily')->error("Houve um redirecionamento de rota para a Fallback utilizando o IP {$ip_user} em {$data}.");
        return view('fallback');
    }
}
