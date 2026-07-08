<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // da non dimenticare 

class PostController extends Controller
{
    /**
     * Post::latest() 
     * ordina la query mediante "created_atin" ordine decrescente, 
     * quindi i post più recenti appaiono per primi. 
     * paginate(10)limita i risultati a 10 per pagina 
     * e genera automaticamente collegamenti di paginazione. 
     * 
     * Il compact('posts')funzione passa la $postsvariabile alla vista Blade.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     *  $request->merge()genera una lumaca dal titolo utilizzando Str::slug(). . Ad esempio, "Il mio primo post" diventa "il mio primo-post". Questo viene unito nei dati di richiesta prima della convalida.
     *  $request->validate()controlli che tutti i campi richiesti sono presenti e validi. Il unique:posts,slugregola assicura che non esistano lumache duplicate nel database. Il in:draft,publishregola limita lo status solo a questi due valori. Se la convalida non riesce, Laravel reindirizza automaticamente al modulo con messaggi di errore.
     *  Post::create($validatedData)inserisce un nuovo record nel poststabella utilizzando solo i campi convalidati. Questo funziona perché abbiamo definito la #[Fillable]attributo sul modello precedente.
     *  redirect()->route('posts.index')->with('success', ...)rimanda l'utente alla pagina di inserzione con un messaggio flash che conferma che il post è stato creato.
     */
    public function store(Request $request)
    {
        $request->merge([
            'slug' => Str::slug($request->title),
        ]);

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts,slug|max:255',
            'content' => 'required',
            'status' => 'required|in:draft,publish',
        ]);

        Post::create($validatedData);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Il Post $postparametro utilizza il linking del modello di percorso di Laravel. 
     * Quando un utente visita /posts/1, Laravel trova automaticamente il Postcon ID 1 
     * e lo inietta nel metodo. Se non viene trovato alcun record di corrispondenza, 
     * Laravel restituisce una risposta 404.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Come il show() metodo, 
     * edit() utilizza il modello di percorso vincolante per recuperare il post. 
     * 
     * I dati post esistenti vengono passati alla vista in modo che il modulo possa essere preriempito.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Il update()metodo segue un modello simile a store(), 
     * ma con una differenza importante nella regola di convalida. 
     * 
     * Il controllo di unicità della lumaca include $post->idcome eccezione: 
     *      unique:posts,slug,' . $post->id. . 
     * 
     * Questo dice a Laravel di ignorare il post corrente quando si verifica la presenza di lumache duplicate. 
     * Senza questa eccezione, l'aggiornamento di un post senza cambiare il suo titolo fallirebbe la convalida 
     * perché la lumaca esistente sarebbe contrassegnata come un duplicato di se stesso.
     */
    public function update(Request $request, Post $post)
    {
        $request->merge([
            'slug' => Str::slug($request->title),
        ]);

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts,slug,' . $post->id . '|max:255',
            'content' => 'required',
            'status' => 'required|in:draft,publish',
        ]);

        $post->update($validatedData);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Il destroy()metodo è semplice. 
     * Si chiama $post->delete() 
     *  per rimuovere il record dal database, 
     *  quindi reindirizza alla pagina di inserzione con un messaggio di successo. 
     * 
     * Il pulsante di eliminazione nella visualizzazione dell'indice include già un JavaScript confirm()
     * finestra di dialogo, in modo che l'utente riceva un prompt di conferma prima dell'esecuzione dell'eliminazione.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
