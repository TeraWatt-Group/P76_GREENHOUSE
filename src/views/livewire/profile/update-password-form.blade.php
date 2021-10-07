<form wire:submit.prevent="updatePassword">
    @csrf
    <div class="form-group mb-3">
        <x-label for="current_password" class="mb-2">{{ __('Current Password') }}</x-label>
        <x-input.input id="current_password" type="password" class="{{ $errors->has('current_password') ? 'is-invalid' : '' }}"
                     wire:model.defer="state.current_password" autocomplete="current-password" />
        <x-input.error for="current_password" />
    </div>
    <div class="form-group mb-3">
        <x-label for="password" class="mb-2">{{ __('New Password') }}</x-label>
        <x-input.input id="password" type="password" class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                     wire:model.defer="state.password" autocomplete="password" />
        <x-input.error for="password" />
    </div>
    <div class="form-group mb-3">
        <x-label for="password_confirmation" class="mb-2">{{ __('Confirm Password') }}</x-label>
        <x-input.input id="password_confirmation" type="password" class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                     wire:model.defer="state.password_confirmation" autocomplete="password_confirmation" />
        <x-input.error for="password_confirmation" />
    </div>
    <p class="note">{{ __('Make sure it\'s at least 15 characters OR at least 8 charactersincluding a number and a lowercase letter.') }}</p>
    <button type="submit" class="btn btn-light border border-1">
        {{ __('Save') }}
    </button>
</form>