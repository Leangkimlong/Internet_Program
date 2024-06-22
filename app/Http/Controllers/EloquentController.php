<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Audience;
use App\Models\Author;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class EloquentController extends Controller
{
    public function createAuthor(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string'
        ]);

        $user = User::create([
            'name' => $request->get('username'),
        ]);

        Author::create([
            'name' => $request->get('name'),
            'user_id' => $user->id,
        ]);

        return response("Auther Created Successfully");
    }

    public function createArticle(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string',
        ]);

        $author = Author::where('name','=', $request->get('author'))->first();

        Article::create([
            'name' => $request->get('name'),
            'author_id' => $author->id
        ]);

        return response("Article have Created successfully for author ". $author->name);

    }

    public function createAudience(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = User::create([
            'name' => Str::lower($request->get('name')),
        ]);

        if($user!=null){
            Audience::create(['name' => $request->get('name'), 'user_id' => $user->id]);
            return response("Audience have Created successfully");
        }
        return response("Failed to create Audience");
    }

    public function subscribe(Request $request){
        $request->validate([
            'name' => "required|string|max:255",
            'article' => 'required|string|max:255'
        ]);

        $a = Audience::where('name' , '=', $request->get('name'))->first();
        $article = Article::where('name' , '=', $request->get('article'))->first();

        if($a!=null || $article != null){
            if($a->article_id==null){
                $a->article_id = $article->id;
                $a->save();
                return response("Audience have Subscribed to article ". $article->id);
            }else{
                Audience::create(['name'=>$a->name,'user_id' => $a->user_id, 'article_id'=>$article->id]);
                return response("Audience have Subscribed to article ". $article->id);
            }
        }else{
            return response("Audience or Article does not exist");
        }

    }

    public function comment(Request $request){
        $request->validate([
            'name' => 'string|max:255|required',
            'comment' => 'required|max:255|string',
            'comment_type' => 'required|max:255|string',
            'comment_to' => 'nullable|max:255|string'
        ]);

        $author = Author::where('name', '=', $request->get('name'))->first();
        $audience = Audience::where('name', '=', $request->get('name'))->first();

        if (!$audience && !$author) {
            return response("User with " . $request->get('name') . " does not exist");
        }

        $comment = new Comment([
            'name' => $request->get('comment'),
            'user_id' => $author ? $author->user_id : ($audience ? $audience->user_id : null),
        ]);

        switch($request->get('comment_type')){
            case 'article':
                $article = Article::where('name', $request->get('comment_to'))->first();
                if ($article) {
                    $article->comment()->save($comment);
                } else {
                    return response("Article with name " . $request->get('name') . " does not exist");
                }
                break;

            case 'audience':
                $a = Audience::where('name', '=',$request->get('comment_to'))->first();
                if ($a) {
                    $a->comment()->save($comment); // Notice the use of `comment()` instead of `comments()`
                } else {
                    return response("Audience with name " . $request->get('comment_to') . " does not exist");
                }
                break;

            case 'author':
                $a = Author::where('name', '=',$request->get('comment_to'))->first();
                if ($a) {
                    $a->comment()->save($comment); // Notice the use of `comment()` instead of `comments()`
                } else {
                    return response("Author with name " . $request->get('comment_to') . " does not exist");
                }
                break;
        }

        return response("Commented Successfully");
    }

    public function getArticles($name){
        $article = Author::with('article')->where('name', '=',$name)->first();

        return $article->article;
    }
    public function getAudience($article){
        $audience = Article::with('audiences')->where('name', '=', $article)->first();

        return $audience->audiences;
    }

    public function getAudienceByAuthor($author){
        $author = Author::with('audiences')->where('name', '=', $author)->first();
        $audience = collect([]);

        foreach($author->audiences as $a){
            if(!$audience->contains($a->name)){
                $audience->push($a);
            }
        }

        return $audience->unique('name')->values();
        // return $author;
    }

    public function getCommentByA($audience){
        $a = Audience::with('comment')->where('name', '=', $audience)->get();

        $comments = [];

        foreach ($a as $b) {
            if (!empty($b->comment)) {
                foreach ($b->comment as $comment) {
                    // $comments .= $comment; // You can customize the separator
                    $comments[] = $b->comment;
                }
            }
        }

        return $comments;
    }

    public function getComment($topic, $info = null){
        switch($topic){
            case 'author':
                $author = Author::with('comments')->where('name','=',$info)->get();

                foreach ($author as $a) {
                    if (!empty($a->comments)) {
                        // foreach ($a->comment as $comment) {
                            // $comments .= $comment; // You can customize the separator
                            return $a->comments;
                        // }
                    }
                }

                // return $author;
            case 'audience':
                $audience = Audience::with('comments')->where('name','=',$info)->get();

                foreach ($audience as $a) {
                    if (!empty($a->comments)) {
                        // foreach ($a->comment as $comment) {
                            // $comments .= $comment; // You can customize the separator
                            $comments = collect($a->comments);
                        // }
                    }
                }

                return $comments->unique('name');
            case 'article':
                $article = Article::with('comment')->where('name','=',$info)->get();

                foreach ($article as $a) {
                    if (!empty($a->comment)) {
                        // foreach ($a->comment as $comment) {
                            // $comments .= $comment; // You can customize the separator
                            $comments[] = $a->comment;
                        // }
                    }
                }

                return $comments;
        }
    }
}
