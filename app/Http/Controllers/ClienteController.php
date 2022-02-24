<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Repositories\ClienteRepository;
use App\Http\Controllers\AppBaseController;
use App\Mail\EnviarEmailCliente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Flash;
use Response;

class ClienteController extends AppBaseController
{
    /** @var  ClienteRepository */
    private $clienteRepository;

    public function __construct(ClienteRepository $clienteRepo)
    {
        $this->clienteRepository = $clienteRepo;
    }

    /**
     * Display a listing of the Cliente.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $clientes = $this->clienteRepository->all();

        return view('clientes.index')
            ->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new Cliente.
     *
     * @return Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created Cliente in storage.
     *
     * @param CreateClienteRequest $request
     *
     * @return Response
     */
    public function store(CreateClienteRequest $request)
    {
        $input = $request->all();
        $anex = file_get_contents($input['arquivo_anexo']->getRealPath());
        $input['arquivo_anexo'] = 'arquivos_'.$input['nome'].'/'.Carbon::now().'.'. $input['arquivo_anexo']->getClientOriginalExtension();
        Storage::disk('local')->put($input['arquivo_anexo'], $anex);
        $input['ip'] = $request->ip();
        $cliente = $this->clienteRepository->create($input);
        $email = new EnviarEmailCliente($cliente);
        Mail::to(env('DESTINATION_MAIL'))->send($email);
        Flash::success('Cliente registrado com sucesso.');

        return redirect(route('clientes.index'));
    }

    /**
     * Display the specified Cliente.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cliente = $this->clienteRepository->find($id);

        if (empty($cliente)) {
            Flash::error(__('messages.not_found', ['model' => __('models/clientes.singular')]));

            return redirect(route('clientes.index'));
        }

        return view('clientes.show')->with('cliente', $cliente);
    }

    /**
     * Show the form for editing the specified Cliente.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cliente = $this->clienteRepository->find($id);

        if (empty($cliente)) {
            Flash::error(__('messages.not_found', ['model' => __('models/clientes.singular')]));

            return redirect(route('clientes.index'));
        }

        return view('clientes.edit')->with('cliente', $cliente);
    }

    /**
     * Update the specified Cliente in storage.
     *
     * @param int $id
     * @param UpdateClienteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClienteRequest $request)
    {
        $cliente = $this->clienteRepository->find($id);

        if (empty($cliente)) {
            Flash::error(__('messages.not_found', ['model' => __('models/clientes.singular')]));

            return redirect(route('clientes.index'));
        }

        $cliente = $this->clienteRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/clientes.singular')]));

        return redirect(route('clientes.index'));
    }

    /**
     * Remove the specified Cliente from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cliente = $this->clienteRepository->find($id);

        if (empty($cliente)) {
            Flash::error(__('messages.not_found', ['model' => __('models/clientes.singular')]));

            return redirect(route('clientes.index'));
        }

        $this->clienteRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/clientes.singular')]));

        return redirect(route('clientes.index'));
    }
}
