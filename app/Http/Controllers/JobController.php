<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobsRequest;
use App\Http\Requests\UpdateJobsRequest;
use App\Models\Job;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = DB::table('jobs')->get();
        
        return view('trabalhe_conosco', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        
        if ($user->id == 8) {
        return view('recrutamento.nova_vaga');
        } else {
            return view('auth.unauthorized');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJobsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobsRequest $request)
    {
        
        $vaga = new Job();
            
        $vaga->title = $request->input('title');
        $vaga->local = $request->input('local');
        $vaga->descricao = $request->input('descricao');
        $vaga->requisitos = $request->input('requisitos');
        $vaga->jornada = $request->input('jornada');
        $vaga->beneficios = $request->input('beneficios');
        $vaga->salario = $request->input('salario');
        $vaga->vagas = $request->input('vagas');
            
        $vaga->save();
        
        return redirect()->route('show_vagas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $jobs
     * @return \Illuminate\Http\Response
     */
    public function show(Job $jobs)
    {
        $jobs = Job::all();
        return view('recrutamento.vagas', compact('jobs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $jobs
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $jobs, $id)
    {
        $job = Job::find($id);
        return view('recrutamento.editar_vaga', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJobsRequest  $request
     * @param  \App\Models\Job  $jobs
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobsRequest $request, Job $jobs, $id)
    {
        $job = Job::find($id);
            
        $job->title = $request->input('title');
        $job->local = $request->input('local');
        $job->descricao = $request->input('descricao');
        $job->requisitos = $request->input('requisitos');
        $job->jornada = $request->input('jornada');
        $job->beneficios = $request->input('beneficios');
        $job->salario = $request->input('salario');
        $job->vagas = $request->input('vagas');
            
        $job->save();

        return redirect()->route('show_vagas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $jobs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $jobs, $id)
    {
        $job = Job::find($id);

        $job->destroy($id);

        return redirect()->route('show_vagas');
    }
}
