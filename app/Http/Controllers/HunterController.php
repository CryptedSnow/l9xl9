<?php

namespace App\Http\Controllers;

use App\Models\{AvatarHunterModel,HunterModel,TipoHunterModel,TipoNenModel,TipoSanguineoModel};
use Illuminate\Support\Facades\{File,Storage,Log};
use Illuminate\Support\{Carbon,Str};
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\HunterRequest;
use ZipArchive;
use Twilio\Rest\Client;

class HunterController extends Controller
{
    public function index()
    {
        $hunter = HunterModel::all();
        return view('index', compact('hunter'));
    }

    public function create()
    {
        $tipo_hunter = TipoHunterModel::all();
        $tipo_nen = TipoNenModel::all();
        $tipo_sanguineo = TipoSanguineoModel::all();
        return view('create', compact(['tipo_hunter','tipo_nen','tipo_sanguineo']));
    }

    public function store(HunterRequest $request)
    {
        $validacoes = $request->validated();
        $validacoes['serial'] = Str::upper(Str::random(10));

        $registro_hunter = HunterModel::create($validacoes);
        $registro_id = $registro_hunter->id;

        if ($request->hasFile('imagem_hunter')) {

            $imagens_paths = [];

            foreach ($request->file('imagem_hunter') as $imagem) {
                $nome_original = $imagem->getClientOriginalName();
                $caminho_imagem = $imagem->storeAs("avatars/$registro_id", $nome_original);
                AvatarHunterModel::create([
                    'hunter_id' => $registro_id,
                    'imagem' => $caminho_imagem,
                ]);
                $imagens_paths[] = $caminho_imagem;
            }

            if (!empty($imagens_paths)) {
                $registro_hunter->save();
            } else {
                dd("Não foi possível inserir a(s) imagem(ns) de {$validacoes['nome_hunter']}, refaça a operação.");
            }
        }

        $data = Carbon::now()->format('d/m/Y H:i:s A');
        $ip_user = request()->ip();
        Log::channel('daily')->info("Hunter $request->nome_hunter foi cadastrado(a) utilizando o IP $ip_user em $data");

        // $registro_hunter->sendEmailToHunter(); // Enviar mensagem para o e-mail do Hunter

        // // Utilizando o Twilio para enviar mensagens pelo WhatsApp
        // $sid = env('TWILIO_ACCOUNT_SID');
        // $token = env('TWILIO_AUTH_TOKEN');
        // $twilio = new Client($sid, $token);

        // $twilio->messages->create("whatsapp:+557712345678", // Receptor
        //     array(
        //         "from" => "whatsapp:+14155238886", // Emissor
        //         "body" => "*Hunter {$validacoes['nome_hunter']}* agora está presente no sistema pelo IP $ip_user em $data."
        //     )
        // );

        return redirect('/')->with('success_store',"{$validacoes['nome_hunter']} está presente no sistema.");
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $hunter = HunterModel::find($id);
        $tipo_hunter = TipoHunterModel::all();
        $tipo_nen = TipoNenModel::all();
        $tipo_sanguineo = TipoSanguineoModel::all();
        return view('update', compact(['hunter','tipo_hunter','tipo_nen','tipo_sanguineo']));
    }

    public function update(HunterRequest $request, $id)
    {
        $hunter = HunterModel::find($id);
        $validacoes = $request->validated();

        if ($request->hasFile('imagem_hunter')) {

            $imagens_antigas = AvatarHunterModel::where('hunter_id', $id)->get();

            foreach ($imagens_antigas as $imagem_antiga) {
                $imagem_antiga->forceDelete();
                Storage::delete($imagem_antiga->imagem);
            }

            $imagens_paths = [];

            foreach ($request->file('imagem_hunter') as $imagem) {
                $nome_original = $imagem->getClientOriginalName();
                $caminho_imagem = $imagem->storeAs("avatars/$id", $nome_original);
                AvatarHunterModel::create([
                    'hunter_id' => $id,
                    'imagem' => $caminho_imagem,
                ]);
                $imagens_paths[] = $caminho_imagem;
            }

            if (!empty($imagens_paths)) {
                $hunter->update($validacoes);
            } else {
                dd("Não foi possível atualizar a(s) imagem(ns) de {$validacoes['nome_hunter']}, refaça a operação.");
            }

        }

        $data = Carbon::now()->format('d/m/Y H:i:s A');
        $ip_user = request()->ip();
        Log::channel('daily')->info("Hunter {$validacoes['nome_hunter']} teve suas informações atualizadas utilizando o IP $ip_user em $data.");

        // $hunter->sendEmailToHunter(); // Enviar e-mail para o endereço eletrônico do Hunter

        return redirect('/')->with('success_update',"{$validacoes['nome_hunter']} obteve atualização em suas informações.");
    }

    public function destroy($id)
    {
        $nome = HunterModel::find($id)->nome_hunter;
        $imagens_hunter = AvatarHunterModel::where('hunter_id', $id)->pluck('imagem')->toArray();

        if (!empty($imagens_hunter)) {
            foreach ($imagens_hunter as $imagem) {
                if (Storage::exists($imagem)) {
                    $imagens_apagadas = "trash/avatars/$id/" . basename($imagem);
                    Storage::move($imagem, $imagens_apagadas);
                }
            }
            AvatarHunterModel::where('hunter_id', $id)->delete();
        }

        HunterModel::where('id', $id)->delete();
        File::deleteDirectory(storage_path("app/avatars/$id"));

        $data = Carbon::now()->format('d/m/Y H:i:s A');
        $ip_user = request()->ip();
        Log::channel('daily')->warning("Hunter $nome foi redirecionado(a) para a lixeira utilizando o IP $ip_user em $data.");

        return redirect('/')->with('success_trash',"$nome agora está na lixeira.");
    }

    public function trashRegister()
    {
        $hunter = HunterModel::onlyTrashed()->get();
        $avatar = AvatarHunterModel::onlyTrashed()->get();
        return view('trash', compact('hunter'));
    }

    public function restoreRegisterTrash($id)
    {
        $nome = HunterModel::onlyTrashed()->find($id)->nome_hunter;
        $hunter = HunterModel::onlyTrashed()->find($id);
        $hunter->restore();

        $imagens_hunter = AvatarHunterModel::onlyTrashed()->where('hunter_id', $id)->get();

        if (!$imagens_hunter->isEmpty()) {
            foreach ($imagens_hunter as $imagem) {
                $imagem->restore();
            }
        }

        File::moveDirectory(storage_path("app/trash/avatars/$id"), storage_path("app/avatars/$id"));

        $data = Carbon::now()->format('d/m/Y H:i:s A');
        $ip_user = request()->ip();
        Log::channel('daily')->notice("Hunter $nome foi restaurado(a) da lixeira para a página principal utilizando o IP $ip_user em $data.");

        return redirect('/')->with('success_restored',"$nome retornou a listagem de Hunters.");
    }

    public function destroyRegisterTrash($id)
    {
        $nome = HunterModel::onlyTrashed()->find($id)->nome_hunter;
        AvatarHunterModel::where('hunter_id', $id)->delete();
        $hunter = HunterModel::onlyTrashed()->find($id);
        $hunter->forceDelete();
        File::deleteDirectory(storage_path("app/trash/avatars/$id"));

        $data = Carbon::now()->format('d/m/Y H:i:s A');
        $ip_user = request()->ip();
        Log::channel('daily')->alert("Hunter $nome foi excluído(a) permanentemente da lixeira utilizando o IP $ip_user em $data.");

        return redirect('/')->with('success_destroy',"$nome foi excluído(a) permanentemente do sistema.");
    }

    public function exportPDF()
    {
        $hunter = HunterModel::all();

        if ($hunter->isNotEmpty()){

            $hunter = HunterModel::all();
            $pdf = PDF::loadView('listagem_pdf', compact(['hunter']));

            $data = Carbon::now()->format('d/m/Y H:i:s A');
            $ip_user = request()->ip();
            Log::channel('daily')->debug("Foi feito a exportação dos Hunters para PDF utilizando o IP $ip_user em $data.");

            return $pdf->setPaper('A4')->stream("Lista de Hunters.pdf");
        } else {
            return redirect('/')->with('export_pdf_error',"É necessário haver no mínimo 1 registro para exportar em arquivo PDF.");
        }
    }

    public function downloadZip($id)
    {
        $zip_archive = new ZipArchive();
        $nome_hunter = DB::table('hunters')->where('id','=', $id)->value('nome_hunter');
        $nome_zip = "Hunter $nome_hunter".'.zip';

        if ($zip_archive->open(storage_path($nome_zip), ZipArchive::CREATE) == TRUE){
            $files = File::files(storage_path('app/avatars/' . $id));
            foreach($files as $key => $value){
                $name_file = basename($value);
                $zip_archive->addFile($value, $name_file);
            }
            $zip_archive->close();
        } else {
            dd("Não foi possível realizar a zipagem da(s) imagem(ns) de $nome_hunter.");
        }

        $data = Carbon::now()->format('d/m/Y H:i:s A');
        $ip_user = request()->ip();
        Log::channel('daily')->debug("Foi feito a zipagem da(s) imagem(ns) de $nome_hunter na página inicial utilizando o IP $ip_user em $data.");

        return response()->download(storage_path($nome_zip))->deleteFileAfterSend(true);
    }

    public function downloadZipRegisterTrash($id)
    {
        $zip_archive = new ZipArchive();
        $nome_hunter = DB::table('hunters')->where('id','=', $id)->value('nome_hunter');
        $nome_zip = "Hunter $nome_hunter (deleted)".'.zip';

        if ($zip_archive->open(storage_path($nome_zip), ZipArchive::CREATE) == TRUE){
            $files = File::files(storage_path('app/trash/avatars/' . $id));
            foreach($files as $key => $value){
                $name_file = basename($value);
                $zip_archive->addFile($value, $name_file);
            }
            $zip_archive->close();
        } else {
            dd("Não foi possível realizar a zipagem da(s) imagem(ns) de $nome_hunter, sendo esse registro localizado na lixeira.");
        }

        $data = Carbon::now()->format('d/m/Y H:i:s A');
        $ip_user = request()->ip();
        Log::channel('daily')->debug("Foi feito a zipagem da(s) imagem(ns) de $nome_hunter que está na lixeira utilizando o IP $ip_user em $data.");

        return response()->download(storage_path($nome_zip))->deleteFileAfterSend(true);
    }

}
