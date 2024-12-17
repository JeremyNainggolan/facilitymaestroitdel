<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Storage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StorageAPI extends Controller
{
    public function index(): JsonResponse
    {
        $storage = Storage::all();

        if ($storage->count() > 0) {
            return response()->json([
                'status' => 200,
                'message' => 'success',
                'data' => $storage,
                'links' => $this->get_links('index'),
            ]);
        }

        return response()->json([
            'status' => 200,
            'message' => 'No data found',
            'data' => [],
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'capacity' => 'required',
        ]);

        $insert = Storage::create([
            'name' => $request->input('name'),
            'detail' => $request->input('detail'),
            'capacity' => $request->input('capacity'),
        ]);

        if ($insert) {
            return response()->json([
                'status' => 201,
                'message' => 'success',
                'data' => $insert,
                'links' => $this->get_links('show', $insert->id),
            ]);
        }

        return response()->json([
            'status' => 400,
            'message' => 'fail',
        ]);
    }

    public function show($id): JsonResponse
    {
        $storage = Storage::find($id);
        if ($storage) {
            return response()->json([
                'status' => 200,
                'message' => 'success',
                'data' => $storage,
                'links' => $this->get_links('show', $storage->id),
            ]);
        }

        return response()->json([
            'status' => 404,
            'message' => 'Data not found',
        ]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $storage = Storage::find($id);
        if ($storage) {
            $update = $storage->update([
                'name' => $request->input('name'),
                'detail' => $request->input('detail'),
                'capacity' => $request->input('capacity'),
            ]);

            if ($update) {
                return response()->json([
                    'status' => 200,
                    'message' => 'success',
                    'data' => $storage,
                    'links' => $this->get_links('show', $storage->id),
                ]);
            }

            return response()->json([
                'status' => 304,
                'message' => 'Data not updated',
            ]);
        }

        return response()->json([
            'status' => 404,
            'message' => 'Data not found',
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $storage = Storage::find($id);
        if ($storage) {
            $storage->delete();
            return response()->json([
                'status' => 204,
                'message' => 'success',
            ]);
        }

        return response()->json([
            'status' => 404,
            'message' => 'Data not found',
        ]);
    }

    private function get_links($action, $id = null): array
    {
        $baseUri = '/api/storage/';
        $links = [
            'self' => [
                'href' => $baseUri,
                'method' => 'GET',
                'type' => 'application/json',
                'description' => 'Get Storage list',
            ],
        ];

        if ($id) {
            $links['self'] = [
                'href' => $baseUri . $id,
                'method' => 'GET',
                'type' => 'application/json',
                'description' => 'Get Storage details',
            ];
            $links['update'] = [
                'href' => $baseUri . $id,
                'method' => 'PUT',
                'type' => 'application/json',
                'description' => 'Update Storage details',
            ];
            $links['delete'] = [
                'href' => $baseUri . $id,
                'method' => 'DELETE',
                'type' => 'application/json',
                'description' => 'Delete Storage',
            ];
        }

        return $links;
    }
}
