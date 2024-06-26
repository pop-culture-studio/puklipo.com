<?php

namespace App\Livewire;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;
use Livewire\Component;

class StatusCreate extends Component
{
    #[Validate('required|string')]
    public string $content = '';

    #[Validate('nullable|string')]
    public ?string $title = '';

    /**
     * @throws AuthorizationException
     */
    public function create(Request $request): void
    {
        $this->authorize('admin');

        $this->validate();

        $request->user()->statuses()->create([
            'content' => trim($this->content),
            'title' => trim($this->title),
        ]);

        $this->reset('content', 'title');

        $this->dispatch('statusCreated');
    }
}
