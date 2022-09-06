<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\HunterModel;

class HunterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hunter = HunterModel::paginate(10);
        return view('index', compact('hunter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacoes = $request->validate(
        [
            'nome_hunter' => 'required|max:50',
            'idade_hunter' => 'required|numeric',
            'altura_hunter' => 'required|numeric',
            'peso_hunter' => 'required|numeric',
            'tipo_hunter' => 'required|max:30',
            'tipo_nen' => 'required|max:30',
            'tipo_sangue' => 'required|max:3'
        ],
        [
            'nome_hunter.required' => 'É obrigatório definir o nome do Hunter.',
            'nome_hunter.max' => 'O nome do Hunter deve possui no máximo 50 caracteres.',
            'idade_hunter.required' => 'É obrigatório definir a idade do Hunter.',
            'idade_hunter.numeric' => 'A idade do Hunter precisa ser um valor numérico.',
            'altura_hunter.required' => 'É obrigatório definir a altura do Hunter.',
            'altura_hunter.numeric' => 'A altura do Hunter precisa ser um valor numérico.',
            'peso_hunter.required' => 'É obrigatório definir o peso do Hunter.',
            'peso_hunter.numeric' => 'O peso do Hunter precisa ser um valor numérico.',
            'tipo_hunter.required' => 'É obrigatório definir o tipo de Hunter.',
            'tipo_hunter.max' => 'O tipo do Hunter deve possui no máximo 30 caracteres.',
            'tipo_nen.required' => 'É obrigatório definir o tipo de Nen do Hunter.',
            'tipo_nen.max' => 'O tipo de Nen do Hunter deve possui no máximo 30 caracteres.',
            'tipo_sangue.required' => 'É obrigatório definir o tipo sanguíneo do Hunter.',
            'tipo_sangue.max' => 'O tipo sanguíneo do Hunter deve possui no máximo 3 caracteres.'
        ]);
        HunterModel::saved($validacoes);
        return view('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hunter = HunterModel::find($id)->first();
        return view('update', compact('hunter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hunter = HunterModel::find($id)->first();
        return view('update', compact('hunter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validacoes = $request->validate(
        [
            'nome_hunter' => 'required|max:50',
            'idade_hunter' => 'required|numeric',
            'altura_hunter' => 'required|numeric',
            'peso_hunter' => 'required|numeric',
            'tipo_hunter' => 'required|max:30',
            'tipo_nen' => 'required|max:30',
            'tipo_sangue' => 'required|max:3'
        ],
        [
            'nome_hunter.required' => 'É obrigatório definir o nome do Hunter.',
            'nome_hunter.max' => 'O nome do Hunter deve possui no máximo 50 caracteres.',
            'idade_hunter.required' => 'É obrigatório definir a idade do Hunter.',
            'idade_hunter.numeric' => 'A idade do Hunter precisa ser um valor numérico.',
            'altura_hunter.required' => 'É obrigatório definir a altura do Hunter.',
            'altura_hunter.numeric' => 'A altura do Hunter precisa ser um valor numérico.',
            'peso_hunter.required' => 'É obrigatório definir o peso do Hunter.',
            'peso_hunter.numeric' => 'O peso do Hunter precisa ser um valor numérico.',
            'tipo_hunter.required' => 'É obrigatório definir o tipo de Hunter.',
            'tipo_hunter.max' => 'O tipo do Hunter deve possui no máximo 30 caracteres.',
            'tipo_nen.required' => 'É obrigatório definir o tipo de Nen do Hunter.',
            'tipo_nen.max' => 'O tipo de Nen do Hunter deve possui no máximo 30 caracteres.',
            'tipo_sangue.required' => 'É obrigatório definir o tipo sanguíneo do Hunter.',
            'tipo_sangue.max' => 'O tipo sanguíneo do Hunter deve possui no máximo 3 caracteres.'
        ]);
        HunterModel::where('id',$id)->update($validacoes);
        return view ('index');     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HunterModel::where('id',$id)->delete();
        return view('index');     
    }
}