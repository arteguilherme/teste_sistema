<?php

namespace App\Http\Controllers;

use App\{ Sistema, Justificativa };
use App\Http\Requests\SistemaStoreRequest;
use App\Http\Requests\SistemaUpdateRequest;

class SistemaController extends Controller
{
    private $sistema;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Sistema $sistema)
    {

        $this->sistema = $sistema;

    }

    /**
     * @OA\Get(
     *     path="/sistema",
     *     operationId="/sistema",
     *     tags={"sistema"},
     *     @OA\Response(
     *         response="200",
     *         description="Retorna a lista de Sistemas",
     *         @OA\JsonContent()
     *     ),
     * )
     */
    public function index()
    {

        $sistemas = $this->sistema->paginate(10);

        return response()->json(['success' => true, 'code' => 200, 'data' => $sistemas], 200);

    }

    public function show($id)
    {

        $sistema = $this->sistema->findOrFail($id);

        return response()->json(['success' => true, 'code' => 200, 'data' => $sistema], 200);


    }

    public function store(SistemaStoreRequest $request)
    {

        $this->sistema->create($request->all());

        return response()->json(['success' => true, 'code' => 200, 'data' => ['message', 'Adicionado com sucesso']], 200);

    }

    public function update($id, SistemaUpdateRequest $request)
    {

        $sistema = $this->sistema->findOrFail($id);
        
        return response()->json(['success' => true, 'code' => 200, 'data' => $sistema], 200);


    }

    public function destroy($id)
    {

        $this->sistema->findOrFail($id)->delete();

        return response()->json(['success' => true, 'code' => 200, 'data' => ['message', 'Deletado com sucesso']], 200);

    }
}
