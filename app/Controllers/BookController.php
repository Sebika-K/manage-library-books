<?php

namespace App\Controllers;

use App\Models\BookModel;
use CodeIgniter\Controller;

class BookController extends Controller
{
    public function index()
    {
        $bookModel = new BookModel();
        $data['books'] = $bookModel->findAll();

        return view('books/index', $data);
    }

    public function create()
    {
        return view('books/create');
    }

    public function store()
    {
        $bookModel = new BookModel();

        // Basic validation
        $validation = \Config\Services::validation();

        $rules = [
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|numeric',
        ];

        if (!$this->validate($rules)) {
            return view('books/create', [
                'validation' => $this->validator
            ]);
        }

        // For now: no image upload in Phase 3
        $bookModel->save([
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'genre' => $this->request->getPost('genre'),
            'year' => $this->request->getPost('year'),
        ]);

        return redirect()->to('/books')->with('success', 'Book added successfully.');
    }

    public function edit($id)
    {
        $bookModel = new BookModel();
        $data['book'] = $bookModel->find($id);

        return view('books/edit', $data);
    }

    public function update($id)
    {
        $bookModel = new BookModel();

        $rules = [
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|numeric',
        ];

        if (!$this->validate($rules)) {
            return view('books/edit', [
                'validation' => $this->validator,
                'book' => $bookModel->find($id)
            ]);
        }

        $bookModel->update($id, [
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'genre' => $this->request->getPost('genre'),
            'year' => $this->request->getPost('year'),
        ]);

        return redirect()->to('/books')->with('success', 'Book updated successfully.');
    }

    public function delete($id)
    {
        $bookModel = new BookModel();
        $bookModel->delete($id);

        return redirect()->to('/books')->with('success', 'Book deleted successfully.');
    }
}