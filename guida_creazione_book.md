# 📘 CRUD Books — Guida Completa Step-by-Step
Questa guida ti accompagna nella creazione di un CRUD completo per la gestione dei Books in Laravel.

## ✅ 1. Creazione del Model + Migration
Genera il modello Book con la migrazione:

nel bash
    php artisan make:model Book -m
    
    Laravel crea:

    app/Models/Book.php

    database/migrations/xxxx_xx_xx_create_books_table.php

### ✅ 2. Modifica della Migrazione
Apri la migrazione e aggiungi le colonne:


    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->integer('year');
            $table->timestamps();
        });
    }

### ✅ 3. Eseguire la Migrazione

nel bash
    php artisan migrate

### ✅ 4. Preparare il Model Book
Apri app/Models/Book.php e aggiungi i campi fillable:


    protected $fillable = ['title', 'author', 'year'];
### ✅ 5. Creare tutte le pagine Blade

Crea la cartella:

Codice
    resources/views/books/
    E dentro crea:

    - index.blade.php
    - show.blade.php
    - create.blade.php
    - edit.blade.php

📄 Struttura minima consigliata

    books/index.blade.php

    Lista dei libri

    books/create.blade.php
    Form di creazione

    books/edit.blade.php
    Form di modifica

    books/show.blade.php
    Dettaglio del libro

### ✅ 6. Creare il BookController

nel bash
    php artisan make:controller BookController
🧪 7. Test della rotta create()

Modifica temporaneamente il metodo:
    public function create()
    {
        return 'Test del funzionamento';
    }

Avvia il server:

nel bash
    php artisan serve

    Visita:

    Codice
    http://127.0.0.1:8000/books/create
    Se vedi “Test del funzionamento”, la rotta funziona.

### ✅ 8. Aggiungere la Route Resource

#### Apri:

Codice
    routes/web.php
    Aggiungi:

    php
    use App\Http\Controllers\BookController;

    Route::resource('books', BookController::class);
    Laravel crea automaticamente tutte le rotte CRUD:

- books.index
- books.create
- books.store
- books.show
- books.edit
- books.update
- books.destroy
- Verifica:

nel bash

    php artisan route:list
### ✅ 9. Implementare il CRUD nel BookController

Ecco la struttura completa:

php
    class BookController extends Controller
    {
        public function __construct()
        {
            $this->middleware('auth');
        }

        public function index()
        {
            $books = Book::latest()->get();
            return view('books.index', compact('books'));
        }

        public function create()
        {
            return view('books.create');
        }

        public function store(Request $request)
        {
            $request->validate([
                'title'  => 'required',
                'author' => 'required',
                'year'   => 'required|integer',
            ]);

            Book::create($request->all());

            return redirect()->route('books.index')
                            ->with('success', 'Libro creato con successo');
        }

        public function show(Book $book)
        {
            return view('books.show', compact('book'));
        }

        public function edit(Book $book)
        {
            return view('books.edit', compact('book'));
        }

        public function update(Request $request, Book $book)
        {
            $request->validate([
                'title'  => 'required',
                'author' => 'required',
                'year'   => 'required|integer',
            ]);

            $book->update($request->all());

            return redirect()->route('books.index')
                            ->with('success', 'Libro aggiornato');
        }

        public function destroy(Book $book)
        {
            $book->delete();

            return redirect()->route('books.index')
                            ->with('success', 'Libro eliminato');
        }
    }


### ✅ 10. Aggiungere autenticazione (opzionale ma consigliato)

Nel tuo web.php:

    Route::middleware('auth')->group(function () {
        Route::resource('books', BookController::class);
    });

### ✅ 11. Reindirizzare l’utente ai Books dopo la registrazione
Apri:

    app/Http/Controllers/Auth/RegisteredUserController.php
Modifica:
    return redirect()->route('books.index');

##### 🎉 CRUD Book completato!
Hai ora:

✔ Model
✔ Migrazione
✔ Controller
✔ Rotte
✔ Views
✔ Validazione
✔ Autenticazione
✔ Redirect dopo registrazione