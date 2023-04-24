<div class="mx-3 py-3">
    <form wire:submit.prevent="create">
        @csrf

        <div>
            <x-input-label for="content" :value="__('メッセージ')" class="hidden"/>
            <x-textarea id="content" name="content" title="メッセージ"
                        class="block mt-1 w-full"
                        rows="3"
                        wire:model="content"
                        wire:ignore
                        required autofocus>{{ old('content') }}</x-textarea>

            <x-input-error :messages="$errors->get('content')" class="mt-2"/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4 px-6" title="{{ __('送信') }}" :disabled="blank($content)">
                {{ __('送信') }}
            </x-primary-button>
        </div>

        @if(filled($content))
            <div class="px-3 mt-4 break-all border rounded-md shadow-sm dark:border-gray-700">
                <h4 class="font-bold text-gray-400">プレビュー</h4>
                <div class="p-1">{{ \App\Support\Markdown::parse($content) }}</div>
            </div>
        @endif
    </form>
</div>
