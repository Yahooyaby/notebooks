<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotebookStoreRequest;
use App\Http\Resources\NotebookResource;
use App\Models\Notebook;
use Illuminate\Http\Response;
/**
 * @OA\Info(
 *     title="My Note API",
 *     version="0.0.1"
 * ),
 * @OA\PathItem(
 *     path="/api/v1/"
 * )
 */
class NotebookController extends Controller
{
    public function index()
    {
        return NotebookResource::collection(Notebook::paginate(5));

    }


    public function store(NotebookStoreRequest $request)
    {
       // $notebook = Notebook::create($request->validated());
        if($request->validated()) {
            $notebook = Notebook::create([
                'full_name' => $request->full_name,
                'company' => $request->company,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'date_of_birth' => $request->date_of_birth,
                'photo_path' => $request->file('photo_path')->store('apiNotes'),
            ]);
        }

        return new NotebookResource($notebook);
    }


    public function show(Notebook $notebook)
    {
        return new NotebookResource($notebook);
    }


    public function update(NotebookStoreRequest $request, Notebook $notebook)
    {
        $notebook->update($request->validated());
        return new NotebookResource($notebook);
    }


    public function destroy(Notebook $notebook)
    {
        $notebook->delete();

        return response(null,Response::HTTP_NO_CONTENT);
    }
}
