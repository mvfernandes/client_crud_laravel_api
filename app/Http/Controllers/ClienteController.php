<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Types\BaseResponse;

class ClienteController extends Controller
{
    private $clienteRequiredFields = [
        'nome',
        'data_nascimento',
        'sexo',
    ];

    private $enderecoRequiredFields = [
        'cep',
        'logradouro',
        'numero',
        'UF',
    ];

    public function index()
    {
        return response()->json(new BaseResponse(Cliente::all()));
    }


    public function store(Request $request)
    {
        foreach ($this->clienteRequiredFields as $key) {
            if (!$request->get($key)) {
                return response()->json(new BaseResponse(['field' => $key], false, 'Campos requeridos'));
            }
        }

        Cliente::create([
            'nome' => $request->get('nome'),
            'data_nascimento' => $request->get('data_nascimento'),
            'sexo' => $request->get('sexo'),
        ]);

        return response()->json(new BaseResponse(null, true, 'Cliente criado com sucesso'));
    }

    public function show($id)
    {
        $cliente = Cliente::with('enderecos')->find($id);
        if ($cliente) {
            return response()->json(new BaseResponse($cliente));
        }
        return response()->json(new BaseResponse(null, false, 'Cliente não encontrado'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            foreach ($this->requiredFields as $key) {
                if (!$request->get($key)) {
                    return response()->json(new BaseResponse(['field' => $key], false, 'Campos requeridos'));
                }
            }

            $cliente->update([
                'nome' => $request->get('nome'),
                'data_nascimento' => $request->get('data_nascimento'),
                'sexo' => $request->get('sexo'),
            ]);

            return response()->json(new BaseResponse(null, true, 'Cliente atualizado com sucesso'));
        }
        return response()->json(new BaseResponse(null, false, 'Cliente não encontrado'));
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $cliente->delete();
            return response()->json(new BaseResponse(null, true, 'Cliente removido'));
        }
        return response()->json(new BaseResponse(null, false, 'Cliente não encontrado'));
    }

    public function storeAddress(Request $request, $id)
    {
        foreach ($this->enderecoRequiredFields as $key) {
            if (!$request->get($key)) {
                return response()->json(new BaseResponse(['field' => $key], false, 'Campos requeridos'));
            }
        }

        $cliente = Cliente::find($id);
        if ($cliente) {
            $cliente->enderecos()->create(
                [
                    'cep' => $request->get('cep'),
                    'logradouro' => $request->get('logradouro'),
                    'numero' => $request->get('numero'),
                    'UF' => $request->get('UF'),
                    'tipo' => $request->get('tipo') ?? 'Residencial',
                    'bairro' => $request->get('bairro') ?? null,
                    'complemento' => $request->get('complemento') ?? null,
                ]
            );

            return response()->json(new BaseResponse(null, true, 'Endereço criado com sucesso'));
        }
        return response()->json(new BaseResponse(null, false, 'Cliente não encontrado'));
    }

    public function updateAddress(Request $request, $idUser, $idAddress)
    {
        foreach ($this->enderecoRequiredFields as $key) {
            if (!$request->get($key)) {
                return response()->json(new BaseResponse(['field' => $key], false, 'Campos requeridos'));
            }
        }

        $cliente = Cliente::find($idUser);
        if ($cliente) {
            $address = $cliente->enderecos()->find($idAddress);
            if ($address) {
                $address->update(
                    [
                        'cep' => $request->get('cep'),
                        'logradouro' => $request->get('logradouro'),
                        'numero' => $request->get('numero'),
                        'UF' => $request->get('UF'),
                        'tipo' => $request->get('tipo') ?? 'Residencial',
                        'bairro' => $request->get('bairro') ?? null,
                        'complemento' => $request->get('complemento') ?? null,
                    ]
                );
                return response()->json(new BaseResponse(null, true, 'Endereço atualizado'));
            }

            return response()->json(new BaseResponse(null, false, 'Endereço não encontrado'));
        }
        return response()->json(new BaseResponse(null, false, 'Cliente não encontrado'));
    }

    public function destroyAddress($idUser, $idAddress)
    {
        $cliente = Cliente::find($idUser);
        if ($cliente) {
            $address = $cliente->enderecos()->find($idAddress);
            if ($address) {
                $address->delete();
                return response()->json(new BaseResponse(null, true, 'Endereço removido'));
            }

            return response()->json(new BaseResponse(null, false, 'Endereço não encontrado'));
        }
        return response()->json(new BaseResponse(null, false, 'Cliente não encontrado'));
    }
}
