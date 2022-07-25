<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    use ApiResponser;

    public function index()
    {
        return $this->successResponse(Author::all());
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'gender' => 'required|max:255|in:male,female',
            'country' => 'required|max:255',
        ];

        $this->validate($request, $rules);

        $author = Author::create($request->all());
        return $this->successResponse($author, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return $this->successResponse(Author::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'max:255',
            'gender' => 'max:255|in:male,female',
            'country' => 'max:255',
        ];

        $this->validate($request, $rules);
        $author = Author::findOrFail($id);
        $author->fill($request->all());

        if ($author->isClean()) {
            return $this->errorResponse("At least one value must change.", Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            $author->save();
            return $this->successResponse($author);
        }
    }

    public function delete($id)
    {
        $author = Author::findOrFail($id)->delete();
        return $this->successResponse($author);
    }
}
