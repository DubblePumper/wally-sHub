<section>
    <header>
        <h2 class="text-lg font-medium text-white">
            {{ __('About Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-300">
            {{ __("Update your account's prefenrences and personal details here.") }}
        </p>
    </header>

    <form method="post" action="{{ route('userdata.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="gender" :value="__('Gender')" />
            <x-text-input id="gender" name="gender" type="text" class="mt-1 block w-full" :value="old('gender', $user->userData->gender)" autofocus autocomplete="gender" />
            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
        </div>

        <div>
            <x-input-label for="relationship" :value="__('Relationship Status')" />
            <x-text-input id="relationship" name="relationship" type="relationship" class="mt-1 block w-full" :value="old('relationship', $user->userData->relationship)" autocomplete="relationship" />
            <x-input-error class="mt-2" :messages="$errors->get('relationship')" />
        </div>

        <div>
            <x-input-label for="interested_in" :value="__('Interested In')" />
            <x-text-input id="interested_in" name="interested_in" type="interested_in" class="mt-1 block w-full" :value="old('interested_in', $user->userData->interested_in)" autocomplete="interested_in" />
            <x-input-error class="mt-2" :messages="$errors->get('interested_in')" />
        </div>

        <div>
            <x-input-label for="country" :value="__('Country')" />
            <x-text-input id="country" name="country" type="country" class="mt-1 block w-full" :value="old('country', $user->userData->country)" autocomplete="country" />
            <x-input-error class="mt-2" :messages="$errors->get('country')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            @if (session('status') === 'userdata-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-500"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
