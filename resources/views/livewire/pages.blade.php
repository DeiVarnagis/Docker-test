<div>

    <table class="table-auto border-separate border border-green-900" style="width: 100%">
        <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
        </tr>
        </thead>
        <tbody>
        @if($data->count())
            @foreach($data as $page)
            <tr>
                <td>{{$page->title}}</td>
                <td>{{$page->content}}</td>
            </tr>
            @endForeach
        @endif
        </tbody>
    </table>

        {{  $data->links() }}

    <x-jet-button wire:click="createShowModal">
        {{ __('Create') }}
    </x-jet-button>

    <x-jet-dialog-modal wire:model="modalVisable">
        <x-slot name="title">
            {{ __('Save Page') }}
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="title" value="{{ __('Page Title') }}" />
                <x-jet-input id="title" type="text" wire:model="title" class="mt-1 block w-full"> </x-jet-input>
                <x-jet-input-error for="title" class="mt-2" />

                <x-jet-label for="content" value="{{ __('Content') }}" />
                <x-jet-input id="content" type="text" wire:model="content" class="mt-1 block w-full"> </x-jet-input>
                <x-jet-input-error for="content" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="cancel" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-3" wire:click="create" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
