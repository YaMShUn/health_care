<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('登録済みのメールアドレスを入力してください入力したアドレスに、再設定用のメールを送信します。') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('メールアドレス')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('再設定メールを送信する') }}
            </x-primary-button>
        </div>
    </form>
      <div  class="buttons inner">
            <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" href="/">戻る</a>
        </div>
</x-guest-layout>
