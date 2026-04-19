<?php

use App\Models\AnonymousStory;
use Flux\Flux;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('Dashboard')] class extends Component {
    use WithPagination;

    public bool $showDeleteModal = false;

    public ?int $storyIdToDelete = null;

    #[Computed]
    public function stories(): LengthAwarePaginator
    {
        return AnonymousStory::query()
            ->latest()
            ->paginate(20);
    }

    public function confirmDelete(int $storyId): void
    {
        $this->storyIdToDelete = $storyId;
        $this->showDeleteModal = true;
    }

    public function deleteStory(): void
    {
        if (! is_int($this->storyIdToDelete)) {
            return;
        }

        AnonymousStory::query()->whereKey($this->storyIdToDelete)->delete();

        $this->showDeleteModal = false;
        $this->storyIdToDelete = null;

        $this->resetPage();

        Flux::toast(variant: 'success', text: 'Cerita berhasil dihapus.');
    }
};
?>

<section class="w-full">
    <div class="flex items-start justify-between gap-4">
        <div class="space-y-1">
            <flux:heading size="lg">Stories</flux:heading>
            <flux:text class="text-zinc-600 dark:text-zinc-300">Moderasi cerita anonim yang masuk.</flux:text>
        </div>
    </div>

    <div class="mt-6 overflow-hidden rounded-xl border border-zinc-200 bg-white dark:border-zinc-700 dark:bg-zinc-900">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-zinc-200 dark:divide-zinc-700">
                <thead class="bg-zinc-50 dark:bg-zinc-800/60">
                    <tr class="text-left text-xs font-semibold text-zinc-600 dark:text-zinc-300">
                        <th scope="col" class="px-4 py-3">ID</th>
                        <th scope="col" class="px-4 py-3">Cerita</th>
                        <th scope="col" class="px-4 py-3">Dibuat</th>
                        <th scope="col" class="px-4 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                    @forelse ($this->stories as $story)
                        <tr wire:key="story-{{ $story->id }}" class="text-sm text-zinc-700 dark:text-zinc-200">
                            <td class="px-4 py-3 align-top text-zinc-500 dark:text-zinc-400">{{ $story->id }}</td>
                            <td class="px-4 py-3 align-top">
                                <div class="max-w-2xl">
                                    <div class="font-medium text-zinc-800 dark:text-zinc-100">
                                        {{ \Illuminate\Support\Str::limit($story->story, 160, '...') }}
                                    </div>
                                    <div class="mt-1">
                                        <a href="{{ route('anonymous-stories.show', $story) }}" class="text-xs font-medium text-safe-600 hover:text-safe-800 transition-colors" target="_blank" rel="noopener">
                                            Lihat halaman detail
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 align-top text-zinc-500 dark:text-zinc-400">
                                {{ $story->created_at?->format('Y-m-d H:i') }}
                            </td>
                            <td class="px-4 py-3 align-top text-right">
                                <flux:button size="sm" variant="danger" wire:click="confirmDelete({{ $story->id }})">
                                    Hapus
                                </flux:button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-8 text-center text-sm text-zinc-500 dark:text-zinc-400">
                                Belum ada cerita.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="border-t border-zinc-200 bg-zinc-50 px-4 py-3 text-sm text-zinc-600 dark:border-zinc-700 dark:bg-zinc-800/60 dark:text-zinc-300">
            {{ $this->stories->links() }}
        </div>
    </div>

    <flux:modal wire:model="showDeleteModal">
        <flux:heading size="lg">Hapus Cerita?</flux:heading>
        <flux:text class="mt-2 text-zinc-600 dark:text-zinc-300">Aksi ini tidak bisa dibatalkan.</flux:text>

        <div class="mt-6 flex justify-end gap-3">
            <flux:button variant="ghost" wire:click="$set('showDeleteModal', false)">Batal</flux:button>
            <flux:button variant="danger" wire:click="deleteStory">Hapus</flux:button>
        </div>
    </flux:modal>
</section>
