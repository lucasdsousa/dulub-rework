<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCurriculoRequest;
use App\Http\Requests\UpdateCurriculoRequest;
use App\Models\Curriculo;
use App\Mail\JobApply;
use Illuminate\Support\Facades\Mail;

class CurriculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCurriculoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCurriculoRequest $request)
    {
        
        /* 
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:curriculos'],
            'phone' => ['required', 'integer', 'max:11', 'unique:curriculos'],
            'pretensao_salarial' => ['required', 'float'],
            'resume' => ['required']
        ]);$curriculo = Curriculo::create([
            'nome' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'pretensao_salarial' => $request->pretensao_salarial,
            'resume' => $request->resume,
        ]); */
        
        //$path = '/home/dulubc51/public_html/curriculos';
        
        $extension = $request->file('resume')->getClientOriginalExtension();
        $fileNameToStore = $request->input('name') . '.' . $extension;

        $curriculo = new Curriculo();

        $curriculo->nome = $request->input('name');
        $curriculo->email = $request->input('email');
        $curriculo->phone = $request->input('phone');
        //$curriculo->pretensao_salarial = $request->input('pretensao');
        #$curriculo->resume = $request->file('resume')->storeAs('resumes', $fileNameToStore,['disk' => 'curriculos']);
        $curriculo->resume = $request->file('resume')->store('curriculos', 'curriculos_upload');
        $curriculo->job_id = $request->input('vaga');
        $curriculo->save();
        
        
        $path = substr(public_path(), 0, 26);
        //dd($path);

        $name = $curriculo->nome;
        $email = $curriculo->email;
        $resume = $curriculo->resume;
        
        $vaga = $request->input('vaga_title');

        $data = array('name' => $name, 'email' => $email, 'resume' => $resume, 'vaga' => $vaga);
        
        //Mail::to('recrutamento@dulub.com.br')->send(new JobApply($curriculo));

        Mail::send(['text' => 'emails.job_apply', 'name' => $name, 'email' => $email, 'resume' => $resume, 'vaga' => $vaga, 'curriculo' => 'curriculo'], $data, function($message) use ($name, $email, $resume, $vaga, $curriculo) {
            $message->from($email)
                    ->to('recrutamento@dulub.com.br')
                    ->subject('Candidatura Vaga ' . $vaga)
                    ->attachData(asset('curriculos/'.$resume), 'Curriculo');
        });
        

        return redirect()->route('vagas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curriculo  $curriculo
     * @return \Illuminate\Http\Response
     */
    public function show(Curriculo $curriculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curriculo  $curriculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Curriculo $curriculo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCurriculoRequest  $request
     * @param  \App\Models\Curriculo  $curriculo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCurriculoRequest $request, Curriculo $curriculo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curriculo  $curriculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curriculo $curriculo)
    {
        //
    }
}
