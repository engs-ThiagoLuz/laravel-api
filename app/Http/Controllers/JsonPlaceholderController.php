<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JsonPlaceholderController extends Controller
{
    private string $Urlbase = 'https://jsonplaceholder.typicode.com';

    public function index()
    {
        $response = Http::get("{$this->Urlbase}/posts");

        if ($response->failed()) {
            return response()->json(['erro' => 'Falha ao consultar a API'], 502);
        }

        return response()->json($response->json());
    }

    public function show(int $id)
    {
        $response = Http::get("{$this->Urlbase}/posts/{$id}");

        if ($response->status() === 404) {
            return response()->json(['erro' => 'Post não encontrado'], 404);
        }

        return response()->json($response->json());
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'title'  => 'required|string',
            'body'   => 'required|string',
            'userId' => 'required|integer',
        ]);

        $response = Http::post("{$this->Urlbase}/posts", $dados);

        return response()->json($response->json(), $response->status());
    }
}