
<div class="m-3 sm:m-6 p-3 sm:p-6 bg-indigo-100 dark:bg-gray-800 border border-2 border-indigo-500 rounded-md">

    <form wire:submit="create">
        @csrf

        <div>
            <span class="font-bold">{{ auth()->user()->name ?? '匿名' }}</span>で回答
        </div>

        <div>
            <x-input-label for="content" :value="__('回答(Markdown)')" class="hidden"/>
            <x-textarea id="content" name="content" title="回答"
                        class="block mt-1 w-full"
                        rows="3"
                        wire:model.live="content"
                        wire:ignore
                        required>{{ old('content') }}</x-textarea>

            <x-input-error :messages="$errors->get('content')" class="mt-2"/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4 px-6" title="{{ __('送信') }}" :disabled="blank($content)">
                {{ __('回答を送信') }}
            </x-primary-button>
        </div>

        @if(filled($content))
            <div class="px-3 mt-4 break-all border rounded-md shadow-sm dark:border-gray-700 bg-white dark:bg-gray-900">
                <h4 class="font-bold text-gray-400">プレビュー</h4>
                <div class="p-1">{{ \App\Support\Markdown::escape($content) }}</div>
            </div>
        @endif
    </form>
</div>
