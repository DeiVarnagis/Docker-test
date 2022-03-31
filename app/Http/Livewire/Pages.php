<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Livewire\Component;
use Livewire\WithPagination;

class Pages extends Component
{
    use WithPagination;
    public $modalVisable = false;
    public $slug;
    public $title;
    public $content;

    public function read()
    {
        return Page::paginate(5);
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'content' => 'required'
        ];
    }
    /**
     *
     */
    public function createShowModal()
    {
        $this->modalVisable = true;
    }

    public function updatedTitle($value)
    {
        $this->content = $value;
    }

    public function create()
    {
        $this->validate();
        Page::create([
            'content' => $this->content,
            'title' => $this->title
        ]);
        $this->clearForm();
        $this->modalVisable = false;
    }

    public function cancel()
    {
        $this->clearForm();
        $this->modalVisable = false;
    }

    public function render()
    {
        return view('livewire.pages', ['data' => $this->read()]);
    }

    public function clearForm()
    {
        $this->content = null;
        $this->title = null;
        $this->slug = null;
    }
}
