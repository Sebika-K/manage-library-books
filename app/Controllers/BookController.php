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

        // Handle image upload
        $imageFile = $this->request->getFile('image');
        $imageName = null;

        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $imageName = $imageFile->getRandomName();
            $imageFile->move('uploads', $imageName);
        } else {
            $imageName = 'default.jpg';
        }

        $bookModel->save([
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'genre' => $this->request->getPost('genre'),
            'year' => $this->request->getPost('year'),
            'image_path' => $imageName
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

        // Get existing book
        $book = $bookModel->find($id);
        $oldImage = $book['image_path'];

        // Handle new image if uploaded
        $imageFile = $this->request->getFile('image');

        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $imageName = $imageFile->getRandomName();
            $imageFile->move('uploads', $imageName);

            // Delete old image if not default
            if ($oldImage && $oldImage !== 'default.jpg' && file_exists('uploads/' . $oldImage)) {
                unlink('uploads/' . $oldImage);
            }
        } else {
            $imageName = $oldImage; // Keep existing
        }

        $bookModel->update($id, [
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'genre' => $this->request->getPost('genre'),
            'year' => $this->request->getPost('year'),
            'image_path' => $imageName
        ]);

        return redirect()->to('/books')->with('success', 'Book updated successfully.');
    }

    public function delete($id)
    {
        $bookModel = new BookModel();
        $book = $bookModel->find($id);

        // Delete image file if not default
        if ($book['image_path'] && $book['image_path'] !== 'default.jpg') {
            $filePath = 'uploads/' . $book['image_path'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Delete DB row
        $bookModel->delete($id);

        return redirect()->to('/books')->with('success', 'Book deleted successfully.');
    }
}