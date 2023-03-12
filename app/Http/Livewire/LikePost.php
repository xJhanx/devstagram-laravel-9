<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLiked;
    public $likes;

    // mount es el constructor de live wire , es lo mismo que el contructor de php
    //ojo que solo se ejecuta cuando se carga 1 sola vez , de resto hay que cambiar los valores
    public function mount($post)
    {
        $this->isLiked = $post->checkLike(auth()->user());
        $this->likes = $post->likes()->count();
    }

    public function render()
    {
        return view('livewire.like-post');
    }

    public function like()
    {
        // $this->isLiked = $this->post->checkLike(auth()->user());
        //this hace referencia a la variable ya definida en la clase
        if ($this->post->checkLike(auth()->user())) {
            $this->post->likes()->where('post_id', $this->post->id)->delete();
            
            $this->isLiked = false;
            $this->likes = $this->post->likes()->count();
        } else {
            $this->post->likes()->create([
                'user_id' => auth()->user()->id,
            ]);
            $this->isLiked = true;
            $this->likes = $this->post->likes()->count();
        }
    }
}
